function SQS
%SQS is the main function for requesting new questions and uploading answers.
%   Detailed explanation goes here
%Input:
%   DatasetID (scalar): indicate use it for which dataset.
%   TaskID (scalar): indicate which image the question and answer is to.
%   varargin (vector): the first round of the new Task has no answer. So no input parameter in the first round.
%                      in the following rounds you must input the answer to the previous question.
%Output:
%   RemainningClass (vector): indicate the class to each row in NQuestions (need more rounds).
%                             if it only has one element, this element is the answer to this task (stop now).
%   NQuestions (matrix):  if length(RemainningClass) == 1, it should be 0. (so the server can check if it's 0)
%                         if length(RemainningClass) > 1, Now it's the question matrix.
%
fileID = fopen('matlab_input.txt','r');
A = fscanf(fileID, '%d');
fclose(fileID);
DatasetID = A(1);
TaskID = A(2);
datafolder = ['./' num2str(DatasetID)];
q = 4;
rounds = 20;
if ~exist(datafolder,'dir');
    error('System doesn''t have this DatasetID, PLS initialize first.');
end
load([datafolder '/init']);
if length(A) > 2
    AnswerVector = A(3:end);
    load([datafolder '/' num2str(TaskID)]);
    codesize = size(matrixC{q-1});
    C = matrixC{newq-1};
    dist = inf(1, newq);
    for j = 1:newq
        dist(j) = pdist2(C(j,:), transpose(AnswerVector(:)) ,'hamming')*codesize(2);
    end
    h = 1;
    [sortdist, index] = sort(dist);
    while sortdist(h) == sortdist(h+1)
        h = h+1;
        if h+1>length(dist)
            break;
        end
    end
    if h == 1
        decision = index(1);
    else
        decision = index(randi(h,1,1));
    end
    bb = find(nonzero>0);
    decision= bb(decision);
    [ state ] = QaryNextState( state, question, decision, indexno );
    statelement = [];
    for ii = 1:length(state)
        statelement = [statelement state{ii}];
    end
    RemainingClass = statelement;
    if size(statelement,2)>1
        svector = zeros(ClassesNum,1);
        svector(statelement) = 1:length(statelement);
        [ question, indexno ]= QaryQuestion( state, 4, rounds);
        [nonzero, fullquestion] = Reliability1(question, state);
        newq =  sum(nonzero);
        NQuestions = zeros(length(statelement),workers);
        for i = 1:workers
            C = matrixC{newq-1};
            is1 = find(C(:,i)>0);
            temp = [];
            for j = 1:length(is1)
                set1 = [temp fullquestion{is1(j)}];
            end
            NQuestions(svector(set1),i) = 1;
        end
        save([datafolder '/' num2str(TaskID)],'question', 'indexno', 'fullquestion', 'newq', 'nonzero', 'state','NQuestions','RemainingClass');
    else
        NQuestions = 0;
    end
    
else
    if ~exist([datafolder '/' num2str(TaskID) '.mat'],'file')
        state = cell(1,num_error+1);
        state{1} = [1:ClassesNum];
        RemainingClass = state{1};
        [ question, indexno ]= QaryQuestion( state, 4, rounds);
        [nonzero, fullquestion] = Reliability1(question, state);
        newq =  sum(nonzero);
        NQuestions = zeros(ClassesNum, workers);
        for i = 1:workers
            C = matrixC{newq-1};
            is1 = find(C(:,i)>0);
            set1 = [];
            for j = 1:length(is1)
                set1 = [set1 fullquestion{is1(j)}];
            end
            NQuestions(set1,i) = 1;
        end
        save([datafolder '/' num2str(TaskID)],'question', 'indexno', 'fullquestion', 'newq', 'nonzero', 'state','NQuestions','RemainingClass');
    else
        load([datafolder '/' num2str(TaskID)]);
    end
end
dlmwrite('./matlab_output.txt',size(NQuestions)','delimiter','\t');
dlmwrite('./matlab_output.txt',NQuestions','-append','delimiter','\t');
dlmwrite('./matlab_output.txt',RemainingClass,'-append','delimiter','\t');
end

function [nonzero, fullquestion] = Reliability1(question, state)
%this function is to get the Reliability of each worker when they decide
%yes or no answer.
q = size(question,1);
num_error = length(state)-1;
allquesmember = cell(q,1);
%reliable = zeros(q,1);
nonzero = zeros(q,1);
for i = 1:q
    for j = 1:num_error+1
        allquesmember{i} = [allquesmember{i} question{i,j}];
    end
    if ~isempty(allquesmember{i})
        nonzero(i) = 1;
    end
end
fullquestion = allquesmember(nonzero>0);

end

