;(function () {
	
	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
	    
	    	
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#fh5co-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#fh5co-offcanvas').append(clone2);

		$('#fh5co-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#fh5co-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};
	

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};


	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};


	var counterWayPoint = function() {
		if ($('#fh5co-counter').length > 0 ) {
			$('#fh5co-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	var sliderMain = function() {
		
	  	$('#fh5co-hero .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	};



	$(function(){
		mobileMenuOutsideClick();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		sliderMain();
		dropdown();
		goToTop();
		loaderPage();
		counterWayPoint();
	});


}());

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

function loginRequester(showhide) {
	if(showhide == "show"){
		document.getElementById('boxRequester').style.visibility="visible";
	} else if(showhide == "hide") {
		document.getElementById('boxRequester').style.visibility="hidden"; 
	}
}

function loginWorker(showhide) {
	if(showhide == "show"){
		document.getElementById('boxWorker').style.visibility="visible";
	} else if(showhide == "hide") {
		document.getElementById('boxWorker').style.visibility="hidden"; 
	}
}

function alertMessage(message) {
	alert(message);
}

function downloadResult(taskTitle) {
  window.location = "../php/download-result.php?test=" + taskTitle;
}

function createListClass() {
  classNumber = parseInt(document.getElementById('numberOfClasses').value);
  // featuresNumber = parseInt(document.getElementById('numberOfFeatures').value);
  
  //check classNumber and featuresNumber valid
  // if (!classNumber || !featuresNumber || classNumber <=0 || featuresNumber <= 0) {
	if (!classNumber || classNumber <=0 ) {
    alert("Please fill the number of class and feature correctly!");
  } else {
		var detailClass = document.getElementById('detailClass');
		var class_feature = `<tr>
		<td>How many classes do you want:</td>
		<td><input type="number" name="classNumber" id="numberOfClasses"  required/></td>
	</tr>
	<!-- <tr>
		<td>How many features each classes have:</td>
		<td><input type="number" name="featureNumber" id="numberOfFeatures"  required/></td>
	</tr> -->
	<tr>
		<td></td>
		<td><button type="button" onclick="createListClass()" id="createDetails">Create Class Details</button></td>
	</tr>`;
    class_feature += '<tr id="space"><td></td><td></td></tr>';
    class_feature += '<tr><td colspan="2" class="table-header">Name of Class</td></tr>';
    for (var numclass = 0; numclass < classNumber; numclass++) {
      class_feature += '<tr id="space"><td>Class ' + (numclass+1) + '</td><td><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '"></td></tr>';
      // class_feature += '<tr><td rowspan="' + featuresNumber + '"><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '"></td>';
      // class_feature += '<td><input type="text" name="feature' + numclass + "0" + '" placeholder="feature' + numclass + "0" + '"></td></tr>';
      // for (var numfeature = 1; numfeature < featuresNumber; numfeature++) {
        // class_feature += '<tr><td><input type="text" name="feature' + numclass + numfeature + '" placeholder="feature'+ numclass + numfeature + '"></td></tr>';
      // }
      // class_feature += '<tr id="space"><td></td><td></td></tr>';
      class_feature += '<tr id="space"><td></td><td></td></tr>';
		}
    detailClass.innerHTML = class_feature;
    // document.getElementById('numberOfFeatures').value = featuresNumber;
    document.getElementById('numberOfClasses').value = classNumber;
		document.getElementById('createDetails').style.display = 'none';
		
    // var class_feature = '<tr id="space"><td></td><td></td></tr>';
    // class_feature += '<tr><td class="table-header">Name of Class</td><td class="table-header">Features of Class</td></tr>';
    // for (var numclass = 0; numclass < classNumber; numclass++) {
    //   class_feature += '<tr id="space"><td colspan="2" style="background-color:;">Class ' + (numclass+1) + '</td><td></td></tr>';
    //   class_feature += '<tr><td rowspan="' + featuresNumber + '"><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '"></td>';
    //   class_feature += '<td><input type="text" name="feature' + numclass + "0" + '" placeholder="feature' + numclass + "0" + '"></td></tr>';
    //   for (var numfeature = 1; numfeature < featuresNumber; numfeature++) {
    //     class_feature += '<tr><td><input type="text" name="feature' + numclass + numfeature + '" placeholder="feature'+ numclass + numfeature + '"></td></tr>';
    //   }
    //   class_feature += '<tr id="space"><td></td><td></td></tr>';
    //   class_feature += '<tr id="space"><td></td><td></td></tr>';
    // }
    // detailClass.innerHTML += class_feature;
    // // document.getElementById('numberOfFeatures').value = featuresNumber;
    // document.getElementById('numberOfClasses').value = classNumber;
    // document.getElementById('createDetails').style.display = 'none';
    // console.log(classNumber + featuresNumber);
  } 
}

function helpButton() {
  alert(`This upload txt file button allows you to uplaod a txt file and will automatically fill the form below with structure like:
    (name of class ex.Dog)
    (name of another class ex.Cat)
    (name of another class ex.Bird)
    (name of another class ex.Car)
    (name of another class ex.Motor)
  NOTE THAT number of features for every class must be equal
  `);
}

///////////////////////////////READ TXT FILE//////////////////
var reader; //GLOBAL File Reader object for demo purpose only

/**
 * Check for the various File API support.
 */
function checkFileAPI() {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        reader = new FileReader();
        return true; 
    } else {
        alert('The File APIs are not fully supported by your browser. Fallback required.');
        return false;
    }
}

/**
 * read text input
 */
function readText(filePath) {
    var output = ""; //placeholder for text output
    if(filePath.files && filePath.files[0]) {           
        reader.onload = function (e) {
            output = e.target.result;
            // displayContents(output);
            setDetails(output);
        };//end onload()
        reader.readAsText(filePath.files[0]);
    }//end if html5 filelist support
    else if(ActiveXObject && filePath) { //fallback to IE 6-8 support via ActiveX
        try {
            reader = new ActiveXObject("Scripting.FileSystemObject");
            var file = reader.OpenTextFile(filePath, 1); //ActiveX File Object
            output = file.ReadAll(); //text contents of file
            file.Close(); //close file "input stream"
            setDetails(output);
            // displayContents(output);
            // console.log(output + "HAHA");
        } catch (e) {
            if (e.number == -2146827859) {
                alert('Unable to access local files due to browser security settings. ' + 
                'To overcome this, go to Tools->Internet Options->Security->Custom Level. ' + 
                'Find the setting for "Initialize and script ActiveX controls not marked as safe" and change it to "Enable" or "Prompt"'); 
            }
        }       
    }
    else { //this is where you could fallback to Java Applet, Flash or similar
        return false;
    }       
    return true;
}   

/**
 * display content using a basic HTML replacement
 */
function displayContents(txt) {
    var el = document.getElementById('main'); 
    el.innerHTML = txt; //display output in DOM
}

function setDetails(txt) {
  var classNumber = 0;
  // var featuresNumber = 0;
  var classes = [];
  // var features = [];
  var strings = ""; //temp strings

  var stringarray = txt.split("\n");
  for (var i = 0; i < stringarray.length; i++) {

		classes.push(stringarray[i]);
		classNumber++;

    // if (stringarray[i][0] == "-") {
    //   classes.push(stringarray[i].substring(1));
    //   classNumber++;
    //   featuresNumber = 0;
    // } else {
    //   if (features[classNumber - 1] == undefined) {
    //     features.push([]);
    //   }
    //   features[classNumber - 1][featuresNumber] = stringarray[i];
    //   featuresNumber++;
    // }
  }
  // console.log(classNumber, featuresNumber);
	console.log(classNumber);
	
	var detailClass = document.getElementById('detailClass');
	var class_feature = `<tr>
	<td>How many classes do you want:</td>
	<td><input type="number" name="classNumber" id="numberOfClasses"  required/></td>
</tr>
<!-- <tr>
	<td>How many features each classes have:</td>
	<td><input type="number" name="featureNumber" id="numberOfFeatures"  required/></td>
</tr> -->
<tr>
	<td></td>
	<td><button type="button" onclick="createListClass()" id="createDetails">Create Class Details</button></td>
</tr>`;
  class_feature += '<tr id="space"><td></td><td></td></tr>';
	class_feature += '<tr><td colspan="2" class="table-header">Name of Class</td></tr>';

  for (var numclass = 0; numclass < classNumber; numclass++) {
    class_feature += '<tr id="space"><td>Class ' + (numclass+1) + '</td><td><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '" value="' + classes[numclass] + '"></td></tr>';
    // class_feature += '<tr><td rowspan="' + featuresNumber + '"><input type="text" name="class' + numclass + '" placeholder="class' + numclass + '" value="' + classes[numclass] + '"></td>';
    // class_feature += '<td><input type="text" name="feature' + numclass + "0" + '" placeholder="feature' + numclass + "0" + '" value="' + features[numclass][0] + '"></td></tr>';
    // for (var numfeature = 1; numfeature < featuresNumber; numfeature++) {
      // class_feature += '<tr><td><input type="text" name="feature' + numclass + numfeature + '" placeholder="feature'+ numclass + numfeature + '" value="' + features[numclass][numfeature] + '"></td></tr>';
    // }
    // class_feature += '<tr id="space"><td></td><td></td></tr>';
    class_feature += '<tr id="space"><td></td><td></td></tr>';
  }
  detailClass.innerHTML = class_feature;
  // document.getElementById('numberOfFeatures').value = featuresNumber;
  document.getElementById('numberOfClasses').value = classNumber;
}
/////////////////////////////////////////////////////////////
function changeColor() { //change the color + add the feature where you can press alt(or command) and click to redo the coloring
  $('.workerQueryTitle').click(function(e) {
		let title = e.target;
    // console.log(e.target);
    console.log(title.nodeName);
    let color = '#F00';
    $('.workerQueryTitle').css("color", '');
    $(title).css("color", color);
  })
};

changeColor();

function fillTest(title) { //This function will determine the title that you choose.
	document.getElementById('test').value = title;
	// alert("HAHAHA");
	// alert(title);
}