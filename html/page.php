<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Wear Weather</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>    
<link rel='stylesheet' type='text/css' href='css/jquery-ui-1.8.11.custom.css' />
<link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
<style type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  body {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    margin: 0;
  }

  h1 {
    margin: 0 0 1em;
    padding: 0.5em;
  }

  p.description {
    font-size: 0.8em;
    padding: 1em;
    position: absolute;
    top: 3.2em;
    margin-right: 400px;
  }

  #message {
	font-color: #333;
    font-size: 0.7em;
    position: absolute;
    top: 7em;
    right: 1em;
    width: 350px;
    display: none;
    padding: 1em;
    background: #e06d5e;
    border: 1px solid #dda;
  }
  </style>

  <script type='text/javascript' src='js/jquery-1.4.4.min.js'></script>
  <script type='text/javascript' src='js/jquery-ui-1.8.11.custom.min.js'></script>

  <script type="text/javascript" src="js/date.js"></script>
  <script type='text/javascript' src='js/jquery.weekcalendar.js'></script>
 
  <script type='text/javascript'>
  var year = new Date().getFullYear();
  var month = new Date().getMonth();
  var day = new Date().getDate();

  var eventData = {
    events : [
      {'id':1, 'start': new Date(year, month, day, 9), 'end': new Date(year, month, day, 11),'title':'Class Ubiquitous Computing','place': "Funchal"},
	  {'id':2, 'start': new Date(year, month, day, 11), 'end': new Date(year, month, day, 12),'title':'Final Presentation','place': "Funchal"},
      {'id':3, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 16),'title':'Run','place': "Machico"},
      {'id':4, 'start': new Date(year, month, day + 1, 10), 'end': new Date(year, month, day + 1, 12, 30),'title':'Beach','place': "Porto da Cruz"},
      {'id':5, 'start': new Date(year, month, day - 1, 10), 'end': new Date(year, month, day - 1, 20, 00),'title':'Meeting UC','place': "Funchal"},
      {'id':6, 'start': new Date(year, month, day + 1, 13), 'end': new Date(year, month, day + 1, 14),'title':'Lunch with Friends','place': ""},
	  {'id':7, 'start': new Date(year, month, day + 1, 20), 'end': new Date(year, month, day + 1, 22,30),'title':'Coffee with Sofia','place': "Funchal"},
	  {'id':8, 'start': new Date(year, month, day + 2, 7), 'end': new Date(year, month, day + 2, 10),'title':'house keeping','place': "Funchal"},
    ]
  };

  $(document).ready(function() {
    $('#calendar').weekCalendar({
      timeslotsPerHour: 6,
      timeslotHeigh: 30,
      hourLine: true,
      data: eventData,
      height: function($calendar) {
        return $(window).height() - $('h1').outerHeight(true);
      },
      eventRender : function(calEvent, $event) {
		$event.append('<div class="added-info">'+calEvent.place+'</div>');
        if (calEvent.end.getTime() < new Date().getTime()) {
          $event.css('backgroundColor', '#aaa');
          $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
        }
      },
      eventNew: function(calEvent, $event) {
        displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
        alert('You\'ve added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.');
      },
      eventDrop: function(calEvent, $event) {
        displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventResize: function(calEvent, $event) {
        displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventClick: function(calEvent, $event) {
        displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventMouseover: function(calEvent, $event) {
        displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventMouseout: function(calEvent, $event) {
        displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      noEvents: function() {
        displayMessage('There are no events for this week');
      }
    });

    function displayMessage(message) {
      $('#message').html(message).fadeIn();
    }

    $('<div id="message" class="ui-corner-all"></div>').prependTo($('body'));
  });
  
  var nameE1 = eventData.events[0].title;
  var nameE2 = eventData.events[1].title;
  var nameE3 = eventData.events[2].title;
  
  var startE1 = eventData.events[0].start;
  var startE2 = eventData.events[1].start;
  var startE3 = eventData.events[2].start;
  
  var placeE1 = eventData.events[0].place;
  var placeE2 = eventData.events[1].place;
  var placeE3 = eventData.events[2].place;
  // var list = document.getElementsByTagName("body")[0];
   // list.innerHTML=responseText;
  
  
  window.onload = function() {
       //when the document is finished loading, replace everything
       //between the <a ...> </a> tags with the value of splitText
   document.getElementById("EventName").innerHTML=nameE1;
   document.getElementById("EventStart").innerHTML=startE1;
   document.getElementById("EventPlace").innerHTML=placeE1;
   
   document.getElementById("EventName1").innerHTML=nameE2;
   document.getElementById("EventStart1").innerHTML=startE2;
   document.getElementById("EventPlace1").innerHTML=placeE2;
   
   document.getElementById("EventName2").innerHTML=nameE3;
   document.getElementById("EventStart2").innerHTML=startE3;
   document.getElementById("EventPlace2").innerHTML=placeE3;
   
   // document.getElementById("EventTemp").innerHTML=list;
   } 

	
	// function httpGet("http://10.2.110.81/new/temperatures.html")
		// {
			// if (window.XMLHttpRequest)
			// {// code for IE7+, Firefox, Chrome, Opera, Safari
				// xmlhttp=new XMLHttpRequest();
			// }
			// else
			// { // code for IE6, IE5
				// xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			// }
			// xmlhttp.onreadystatechange=function()
			// {
				// if (xmlhttp.readyState==4 && xmlhttp.status==200)
				// {
					// createDiv(xmlhttp.responseText);
				// }
			// }
			// xmlhttp.open("GET","http://10.2.110.81/new/temperatures.html",false);
			// xmlhttp.send();

				
		// }
		
		// function createDiv(responsetext)
		// {
			// var _body = getElementsByTagName('body');
			// var _div = document.createElement('div');
			// _div.innerHTML = responsetext;
			// _body.appendChild(_div)
			
			// //document.getElementsByTagName('body')[0].innerHTML=responsetext;
		// }
	
</script>
</head>

<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<h1 class="brand"><a href="index.php">Wear Weather</a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">
					<li><a href="disp.html">Display</a></li>
					<li><a href="page.php">My Calendar</a></li>
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
</head>
<body>
<div id="header-calendar" class="headercalendar-slider"> 
	<div id="calendar-left">
		<div id='calendar'></div>
	</div>
	<div id="calendar-right">
		<div class="weather_container" id='weather'>
		<header>
		</header>
		
		<nav >
			<ul>
				
				 <h2> Current Local Temperature:
				 
				 <?php 
			 
						$page = file_get_contents('http://10.2.110.81/new/temperatures.html');
						print_r($page);
						?>
					
				</h2>;			
			</ul>
			
			<div class="mySlides">
				<ul class="table">
				<li id="weather-left">
					<p class="title" style="strong">Event</p>
					<b><p>Event Name<h6 id="EventName"></h6></p>
					<p>Start Hour <h6 id="EventStart"></h6></p>
					<p>Location <h6 id="EventPlace"></h6></p>
				</li>
				<li id="weather-right">
					<p class="title" style="strong">Forecast</p>
					<p>Temperature:<h6>21?C</h6></p>
					<p>Humidity:<h6>87%</h6></p>
					<p>Precipitation:<h6>0.1mm</h6></p></b>
				</li>
				</ul>
				<ul id="tips">
				<h3> It is gonna be mild but don't forget about your coat. </h3>
				</ul>

			</div>
			<div class="mySlides">
				<ul class="table">
				<li id="weather-left">
					<p class="title" style="strong">Event</p>
					<b><p>Event Name<h6 id="EventName1"></h6></p>
					<p>Start Hour <h6 id="EventStart1"></h6></p>
					<p>Location <h6 id="EventPlace1"></h6></p>
				</li>
				<li id="weather-right">
					<p class="title" style="strong">Forecast</p>
					<p>Temperature:<h6>21?C</h6></p>
					<p>Humidity:<h6>87%</h6></p>
					<p>Precipitation:<h6>0.1mm</h6></p></b>
				</li>
				</ul>
				<ul id="tips">
				<h3>If you are going to be outside put some fresh clothes. </h3>
			</ul>
			</div>
			<div class="mySlides">
			<ul class="table">
			<li id="weather-left">
					<p class="title" style="strong">Event</p>
					<b><p>Event Name<h6 id="EventName2"></h6></p>
					<p>Start Hour <h6 id="EventStart2"></h6></p>
					<p>Location <h6 id="EventPlace2"></h6></p>
				</li>
				<li id="weather-right">
					<p class="title" style="strong">Forecast</p>
					<p>Temperature:<h6>20?C</h6></p>
					<p>Humidity:<h6>81%</h6></p>
					<p>Precipitation:<h6>0.2mm</h6></p></b>
				</li>
			</ul>
			<ul id="tips">
				<h3>Rainfall, bring an umbrella maybe you will need it.</h3>
			</ul>
			</div>
		</nav>
		</div>
	</div>
</div>	
<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 4000); 
}
</script>
</body>
</html>

