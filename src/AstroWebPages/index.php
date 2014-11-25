<html>
<head>
<style>
body{
	margin:0px;
/*	background-color:#FFFFCC;*/
}
#header {
	width:100%;
	height:100px;
	border:1px solid black;
	position:fixed;
	background-color:black;
	background-image:url(images/name.jpg);
	background-repeat:no-repeat;
	background-position:270 0;
}

#title {
	display:table;
	padding-left:20px;
	padding-top:10px;
	color:white;
	font:16pt arial;
}
#content {
	width:86%;
	margin:auto;
	padding-top:120px;
	font:16px Book Antiqua;
}

#menu {
	float:left;
	width:100px;
	position:fixed;
	padding-top:20px;
	text-decoration:none;
	background-color:white;
}

#menu a
{   position:relative;
    display:block;
    margin:0;
    padding:5px 10px;
    width:auto;
    white-space:nowrap;
    text-align:left;
    text-decoration:none;
    color:#2875DE;
    font:14px arial;
}

#menu a:hover
{   background: #49A3FF;
    color: #FFF;
}

.menu_selected {
    background: #49A3FF;
    color: #FFF;
}

.popup
{   position: fixed;
    visibility: hidden;
    margin: 0;
    padding: 0;
    background: #EAEBD8;
    border: 1px solid #5970B2;
	z-index:100;
	margin-left:100px;
}


.popup a
{   position: relative;
    display: block;
    margin: 0;
    padding: 5px 10px;
    width: auto;
    white-space: nowrap;
    text-align: left;
    text-decoration: none;
    background: #EAEBD8;
    color: #2875DE;
    font: 14px arial;
}


.popup a:hover
{   background: #49A3FF;
    color: #FFF;
}
	

#exp {
/*	float:left;*/
	padding-left:130px;
	background-color:white;
}

#list{
	position:absolute;
	display:none;
	width:200px;
	background-color:white;
	border:1px solid black;
}



</style>

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="mathjax/MathJax.js?config=TeX-AMS_HTML-full"></script>

<script>
//-----------------------------------------
//http://www.openjs.com/scripts/dom/class_manipulation.php 

function hasClass(ele,cls) {
 return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}
function addClass(ele,cls) {
 if (!this.hasClass(ele,cls)) ele.className += " "+cls;
}
function removeClass(ele,cls) {
 if (hasClass(ele,cls)) {
  var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
  ele.className=ele.className.replace(reg,' ');
 }
}

//-----------------------------------------



//-----------------------------------------
//http://stackoverflow.com/questions/442404/dynamically-retrieve-html-element-x-y-position-with-javascript
function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.parentNode;
    }
    return { top: _y, left: _x };
}


//-----------------------------------------
// Copyright 2006-2007 javascript-array.com


var timeout    = 500;
var closetimer    = 0;
var ddmenuitem    = 0;
var selected_menu = 0;


// open hidden layer
function mopen(id, menu)
{   
    // cancel close timer
    mcancelclosetime();


    // close old layer
    if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';


    // get new layer and show it
    ddmenuitem = document.getElementById(id);

    ddmenuitem.style.visibility = 'visible';

	addClass(menu,"menu_selected");
	selected_menu=menu;



}
// close showed layer
function mclose()
{
    if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
	removeClass(selected_menu,"menu_selected");
}


// go close timer
function mclosetime()
{
    closetimer = window.setTimeout(mclose, timeout);
}


// cancel close timer
function mcancelclosetime()
{
    if(closetimer)
    {
        window.clearTimeout(closetimer);
        closetimer = null;
    }
}


// close layer when click-out
document.onclick = mclose;
//-----------------------------------------
</script>
</head>
<body>
<div id="header">
	<div id="title">Virtual<br>
Astronomy/Astrophysics<br>
Laboratory</div>
</div>
<div id="content">
	<div id="menu">
		<a href="?page=objectives" onMouseOver="mclose()">Objective</a>
		<a href="?page=listexp"
        onmouseover="mopen('m1',this)"
        onmouseout="mclosetime()" id="experiments">Experiments</a>

		<a href="?page=futurework" onMouseOver="mclose()">Future Work</a>
		<a href="?page=software">Software</a>
		<a href="?page=downloads">Downloads</a>
		<a href="?page=contact">Contact Us</a>
		
		<div class="popup" id="m1"
  		  onmouseover="mcancelclosetime()"
		  onmouseout="mclosetime()">
			<a href="?page=exp1">Experiment 1</a>
			<a href="?page=exp2">Experiment 2</a>
			<a href="?page=exp3">Experiment 3</a>
			<a href="?page=exp4">Experiment 4</a>
			<a href="?page=exp5">Experiment 5</a>
			<a href="?page=exp6">Experiment 6</a>
			<a href="?page=exp7">Experiment 7</a>
			<a href="?page=exp8">Experiment 8</a>
			<a href="?page=exp9">Experiment 9</a>
			<a href="?page=exp10">Experiment 10</a>
			<a href="?page=exp11">Experiment 11</a>
			<a href="?page=exp12">Experiment 12</a>
			<a href="?page=exp13">Experiment 13</a>
			
			
			<script>
			    ddmenuitem = document.getElementById("m1");
				menu=document.getElementById("experiments");
			    ddmenuitem.style.top=getOffset(menu).top-1;
    		//	ddmenuitem.style.left=getOffset(menu).left+30;
			</script>
		</div>

		 
	</div>

	<div id="exp">
	<?php
		if (isset($_GET["page"])){
			$page_name = $_GET["page"];
		}
		else{
			$page_name = "objectives";
		}
		$filename=$page_name.".html";
		include($filename);
	?>
	</div>
</div>


</body>
</html>



