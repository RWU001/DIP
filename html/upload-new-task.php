<!DOCTYPE html>
<html>
  <head>
    <title>Upload Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/general.css">
    <script src="../js/upload-new-task.js"></script>
  </head>

  <body onload="checkFileAPI();">
       <ul>
        <a href="../php/querytask.php">Requester Home</a>&nbsp;&nbsp;
        <a href="worker home.php">Worker Home</a>&nbsp;&nbsp;
        <a href="homepage.php" id="logout">Logout</a>&nbsp;&nbsp;
      </ul>

    <h1>REQUESTER UPLOAD</h1>
    <br>
    <form enctype="multipart/form-data" method="post" action="../php/upload-new-task.php">
      <div class="container">
        <div class="taskQuestion">
          <label for="taskTitle">
            Task Title: 
            <input type="text" class="inputTask" id="taskName" name="taskTitle" required>
          </label>
          <br><br>
          <label for="taskBudget">
            Budget: 
            <div class="inputTask">
              $<input type="number" step="0.01" id="taskBudget" name="taskBudget" required>
            </div>
          </label>
          <br><br>
          <label for="taskReward">
            Reward for each binary question: 
            <div class="inputTask">
              $<input type="number" step="0.01" name="taskReward" id="taskReward" required>
            </div>
          </label>
          <br><br>
          <label for="taskDescription">
            Description of task: <br>
            <textarea name="taskDescription" id="taskDescription" maxlength="370" required></textarea>
          </label>
          <br><br><br><br><br><br><br><br>
          <label for="taskName">
            Upload your images(in zip file): 
            <br>
            <input type="file" name="zip_file" id="zip_file" required></label>
          <br><br><br><br>
          <div style="width:100%">
            <center>
              <input type="submit" value="Create Task" style="font-size:100px;width:30%;">
            </center>
          </div>
        </div>

        <table id="detailClass" border="2px">
          <tr>
            <td>Upload .txt file(automatically fill the details)</td>
            <td><input type="file" onchange="readText(this)" id="classDetails"/><button type="button" onclick="helpButton()">HELP</button></td>
          </tr>
          <tr>
            <td>How many classes do you want:</td>
            <td><input type="number" name="classNumber" id="numberOfClasses"  required/></td>
          </tr>
          <tr>
            <td>How many features each classes have:</td>
            <td><input type="number" name="featureNumber" id="numberOfFeatures"  required/></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="button" onclick="createListClass()" id="createDetails">Create Class Details</button></td>
          </tr>
        </table>
      </div>
    </form>
  </body>
</html>