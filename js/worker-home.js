function fillTest(title) {
  document.getElementById('test').value = title;
}

const changeColor = () => { //change the color + add the feature where you can press alt(or command) and click to redo the coloring
  $('.workerQueryTitle').click(function(e) {
    let title = e.target;
    // console.log(e.target);
    console.log(title.nodeName);
    let color = '#F00';
    $('.workerQueryTitle').css("color", 'black');
    $(title).css("color", color);
  })
};

changeColor();