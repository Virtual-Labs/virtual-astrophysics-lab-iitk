<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>virtual Astronomy/Astrophysics Laboratory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="main" align="center">
   <div id="content">
      <div class="inner_copy"></div>
      <div id="header">
         <div class="menu1"></div>
         <div class="top1">Virtual<br />Astronomy/Astrophysics<br />Laboratory</div>
         <div class="menu">
            <a href="index.html">Objectives</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="listexp.html">List of Experiments</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="futurework.html">Future Work</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="software.html">Software</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="downloads.php">Downloads</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="contact.html">Contact Us</a>
         </div>

	  <td width="90%">
         <table width="100%" border="0" cellspacing="0">
         <tr>
         <td>

         <h1>Downloads</h1>
         <h2>
         <div style="height:300px;padding: 20px; overflow:scroll" align="justify"class="content">

         <?php
            $filelist = explode("\n",`ls  downloads/ |sort`);

            // for each item (file) in the array...

            for ($count=0;$count<count($filelist);$count++)
            {
            // get the filename (including preceding directory, ie: ./software/gth1.0.9.tar.gz)

            $filename=$filelist[$count];

            // if it's not a directory, display linked

            if (!is_dir($filename))

               printf("<a href=\"%s\">%s</a><br>\n",$filename,$filename);

            // otherwise tell the user it's a "category"
         
            else
               printf("<p>Category: %s<p>\n",$filename);
            }

         ?>  

         </div>
         </h2>

         </td>
         </tr>
         </table>
         </td>

         <div class="menu"></div>
      </div>
   </div>
</div>

</body>

</html>
