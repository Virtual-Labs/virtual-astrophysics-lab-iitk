<html>
   <head>
      <title> test random </title>
   </head>

   <body>

      <?PHP

      $dir=opendir("data/expt5/");

      $i=0;
      while($file=readdir($dir))
      {
         if ($file != "." && $file!="..")
         {
         echo "$file<br>";
         $filearray[$i]=$file ;
         $i++ ;
         }
      }

      closedir($dir);

      // FILE 1

      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file1="data/expt5/$file[$rand]" ;

      // FILE 2

      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file2="data/expt5/$file[$rand]" ;

      // FILE 3

      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file3="data/expt5/$file[$rand]" ;

      // FILE 4

      $rand=rand(0,count($filearray)-1) ;

      if($rand >= 0) $file4="data/expt5/$file[$rand]" ;

      ?>

   </body>

</html>
