<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h>

<p>
  <select  id="data">
    <option value="0"> Select Image    </option>
    
    <?php
$dirFiles = array();
// opens images folder
if ($handle = opendir('data/expt5/')) {
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
</p>
<p>&nbsp;</p>
</body>
</html>
