<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Experiment-10</title>
<script src="js/raphael-min.js"></script>



<script src="js/jquery-1.7.1.min.js"></script>

<script>
	Array.prototype.max = function() {
		var max = this[0];
		var len = this.length;
		for (var i = 1; i < len; i++) if (this[i] > max) max = this[i];
		return max;
	}
	
	Array.prototype.min = function() {
		var min = this[0];
		var len = this.length;
		for (var i = 1; i < len; i++) if (this[i] < min) min = this[i];
		return min;
	}

	function roundNumber(num, dec) {
		var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
		return result;
	}

	var BV=[];
	var Mv=[];
	var Mv_mod=[];

	function add_Mv(add){
		for (var i=0; i<Mv.length; i++)
			Mv_mod[i]=Mv[i]+add;
		plot();
	}
	
	function plot(){
		// Creates canvas 320 × 200 at 10, 50
		var plot_width=378;
		var plot_height=495;

		var paper = Raphael("holder", plot_width, plot_height);

		var log10=Math.log(10);

/*		var x=Array();
		var y=Array();
		$(".x").each(function(){x.push(parseFloat($(this).html()))});
*/		$(".y").each(function(){y.push(parseFloat($(this).html()))});

		if (BV.length!=Mv.length){
			alert("Bad data: mV and B-V have different number of entries");
			return;
		}
		
		for (var i=0; i<BV.length; i++){
			// Creates circle at x = 50, y = 40, with radius 10
			//var circle = paper.circle(BV[i]*146+49, 252-Math.log(Mv_mod[i])/log10*42, 2);
			var circle = paper.circle(BV[i]*146+49, 169+Mv_mod[i]*17, 2);
			// Sets the fill attribute of the circle to red (#f00)
			circle.attr("fill", "red");
			// Sets the stroke attribute of the circle to white
			circle.attr("stroke", "red");
		}
	}
	
	$(document).ready(function(){
		$("#data").change(function(){
			// Assign handlers immediately after making the request,
			// and remember the jqxhr object for this request
			if ($(this).val()!=0){
				var url="data/expt10/Star_Database/"+encodeURIComponent($(this).children(":selected").html())+".txt";

				$("#back_image").addClass('hidden');
				$("#holder").addClass('hidden');
				$("#throbber").removeClass('hidden');

				$.ajax({
					url: url,
					async:true,
					success: function(data) {
						//alert(local_data);
						//console.log("1 : "+local_data);

						$("#back_image").removeClass('hidden');
						$("#holder").removeClass('hidden');
						$("#throbber").addClass('hidden');

//						$("#raw_data").html(data.replace(/\n/g, '<br />').replace('\s', '&nbsp;'));

						var entry=[];
						BV=[];
						Mv=[];
						Mv_mod=[];

						var lines=data.split('\n');
						for (var i=0; i<lines.length-4; i++){
							entry.push(lines[i+4].replace(/\s{2,}/g, ',').split(','));
							for (var j=0; j<entry[i].length; j++)
								entry[i][j]=parseFloat(entry[i][j]);

							BV.push(entry[i][3]);
							Mv.push(entry[i][2]);
							Mv_mod.push(entry[i][2]);
						}

						$("#add_value").val("0");
						plot();
					}
				});


			}

		});

		$('#add_value').keypress(function(e){
//			alert(e.which+' '+e.charCode+' '+ e.keyCode);
			if ( (e.which<48 || e.which>57) && e.which!=13 && e.which!=45 && e.which!=46 && e.which!=8 && e.keyCode!=37 && e.keyCode!=39 && e.keyCode!=46 && e.keyCode!=34 && e.keyCode!=35 && e.keyCode!=116) return false;

			if(e.which == 13){
				var add_val=parseFloat($("#add_value").val());
				if (isNaN(add_val)) add_val=0;
				add_Mv(add_val);
			}
		});

		
		$("#add_button").click(function(){
			var add_val=parseFloat($("#add_value").val());
			if (isNaN(add_val)) add_val=0;
			add_Mv(add_val);
		});
	});
</script>

<style>
	.header{
		font-weight:bold;
	}
	td {
		border:1px solid black;
	}
body {
	background-color: #FFFFCC;
}

.hidden{
	display:none;
}
</style>

</head>
<body>
<select id="data">
 <option value="0">... Select Data File ..</option>

<?php
$dirFiles = array();
// opens images folder
if ($handle = opendir('data/expt10/Star_Database/')) {
    while (false !== ($file = readdir($handle))) {

        // strips files extensions      
        $crap   = array(".txt");    

        $newstring = str_replace($crap, " ", $file );   

        //asort($file, SORT_NUMERIC); - doesnt work :(

        // hides folders, writes out ul of images and thumbnails from two folders

        if ($file != "." && $file != ".." && $file != "index.php" && $file != "Thumbnails") {
                $dirFiles[] = $file;
        }
    }
    closedir($handle);
}

sort($dirFiles);
$c=0;
foreach($dirFiles as $file)
{
	echo "<option value='".$c."'>".substr($file,0,-4)."</option>";
	$c++;
}

?>
</select>
<span class="hidden" id="throbber" style="color:red">Loading ...</span>
<br>
<br>
Add value with the column m<sub>v</sub> <input id="add_value"/> <button id="add_button">Add</button><br/>

<!-- <div id="raw_data" style="width:50%; float:left;">
</div> -->

<div style="width:480px !important; float:left; height:547px; border:1px solid black; position:relative;">
	<img id="back_image" src="images/expt10/HRDiagram.png" style="width:100%"/>
	<div class="hidden" id="holder" style="position:relative; top:-523px; left:52px; width:378px; height:495px; overflow:hidden"></div> 
</div>


</body>
</html>
