<?php
$name= $_POST["name"];
$exp= $_POST["experimentId"];
$help= $_POST["sysHelp"];
$problem= $_POST["sysPblm"];
$tell= $_POST["tellUs"];
$rate= $_POST["expPerformance"];
$links= $_POST["expObjectives"];
$results= $_POST["expResult"];
$under= $_POST["understandExp"];
$confi= $_POST["confidence"];
$moti= $_POST["expMotivation"];
$step= $_POST["stepmethdExp"];
$three= $_POST["threePblms"];
$things= $_POST["threeThings"];
$sql_connection = mysql_connect("localhost", "root", "virtualastro");
if (!$sql_connection)
  {
  die("Failed to connect to MySQL: " . mysql_error());
  }
    mysql_select_db("feedback", $sql_connection);

$sql="INSERT INTO feedback (Name,Experiment,Helpfull,Experience,Extra,Rate,Links,Results,Understanding,Confident,Motivation,ReadManual,Problems,InterestingThings,Date)
VALUES('$name','$exp','$help','$problem','$tell','$rate','$links','$results','$under','$confi','$moti','$step','$three','$things',NOW())";
if (!mysql_query($sql,$sql_connection))
  {
  die('Error: ' . mysql_error($con));
  }

echo "Thank You For Submitting Your Valuable Feedback!!!";
    mysql_close($sql_connection);
?>
