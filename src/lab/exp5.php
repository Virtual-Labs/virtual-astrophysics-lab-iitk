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
         <h1>Experiment 5: Spectral classification of stars</h1>
         <h2>
         <div style="height:300px; padding: 20px; overflow:scroll; font-weight:normal" align="justify" class="content">

            <p> <i>Objective</i> : To get familiar with the spectra of different stars</p>

            <p> <i>Introduction</i> : In this experiment we will get familiar with the spectra of different stars. You will be given a set of five spectra at random
                corresponding to five different stars from a large sample of spectral data from various stars. You will identify the spectral lines in each of these
                data sets and correlate with the reference sample of lines. On the basis of the observed spectral lines you will make a broad classification of these
                stars according to the Harvard OBAFGKM.</p>

<!-- -->
<!-- PHP code to randomly select star spectra -->
<!-- -->
      <?PHP

      $dir=opendir("data/expt5/");

      $i=0;
      while($file=readdir($dir))
      {
         if ($file != "." && $file!="..")
         {
      //   echo "$file<br>";
         $filearray[$i]=$file ;
         $i++ ;
         }
      }

      closedir($dir);

//      echo count($filearray);

      // FILE 1
      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file1="data/expt5/$filearray[$rand]" ;

      // FILE 2
      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file2="data/expt5/$filearray[$rand]" ;

      // FILE 3
      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file3="data/expt5/$filearray[$rand]" ;

      // FILE 4
      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file4="data/expt5/$filearray[$rand]" ;

      ?>

<!-- -->
<!-- -->

            <ul><li>Step 1: Download the following five spectra provided randomly from a large sample of star spectra.<br />
                    <a href="<?PHP echo $file1 ?>">File1</a><br />
                    <a href="<?PHP echo $file2 ?>">File2</a><br />
                    <a href="<?PHP echo $file3 ?>">File3</a><br />
                    <a href="<?PHP echo $file4 ?>">File4</a><br />
                    In each data file the first column is wavelength in Angstroms and the second column is flux. Ignore the remaining columns.
                    Plot those spectra and correlate the absorbtion lines with those provided in the <a href="data/ReferenceSpectralLine.txt">reference list</a> of various
                    atomic spectral lines. To identify the spectral lines easily, you may find it useful to plot the reference lines also on the spectral plot. A plot with
                    those two data sets will look like <br /> <br />
                    <img border="5" src="images/expt5/RandomStarSpectrum.png" alt="RandomStarSpectrum.png" width="200" height="140px" onclick="location.href=this.src" />
                    </li><br /><br />
                <li>Step 2: Classify the stars according to the Harvard classification scheme. Give reasons for your classification.</li><br /><br />
                <li>Step 3: Check your classification from the code provided.</li><br /><br />
            </ul>

            <br /><br />
            <br /><br />

         </div>
         </td>
         </tr>
         </table>
         </td>

         <div class="menu">
            Experiment
            <a href="exp1.html">1</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp2.html">2</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp3.html">3</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp4.html">4</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp5.php">5</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp6.html">6</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp7.html">7</a><img src="images/s_p.gif" align="middle" alt="" />
	    <a href="exp8.html">8</a><img src="images/s_p.gif" align="middle" alt="" />
            <a href="exp9.html">9</a>
         </div>

      </div>
   </div>
</div>

</body>

</html>
<!--
   <div class="menu">
      Experiment
      <a href="exp1.html">1</a><img src="images/s_p.gif" align="middle" alt="" />
      <a href="exp2.html">2</a><img src="images/s_p.gif" align="middle" alt="" />
      <a href="exp3.html">3</a><img src="images/s_p.gif" align="middle" alt="" />
      <a href="exp4.html">4</a><img src="images/s_p.gif" align="middle" alt="" />
      <a href="exp5.php">5</a>
   </div>

</body>

</html>
-->
