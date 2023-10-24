<?php 
//this file takes the post and decides whether to insert (change), update, or delete the row
require_once ('../../inc/atad.php'); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Check connection
if ($link->connect_error) {
	$fail = $link->connect_error;
  die("Connection failed: " . $fail);
}
//foreach ($_POST as $key => $value){
//  console_log ("{$key} = {$value}");}

$myid = $_POST['sid'];
$title =  $_POST['TITLE'];
$descript = $_POST['DESCRIPT'];
$section = $_POST['SECTION'];
$tags = $_POST['TAGS'];
$dateadded = $_POST['DATEADDED'];
$datedone = $_POST['DATEDONE'];
$notes = $_POST['NOTES'];

$switcher = $_POST['commando'];
console_log("cmd=".$switcher);

switch ($switcher) {
  case ('INSERT') :
    //$dateadded = date('Y-m-d');
    $sql = "INSERT INTO `tasks` ( `TITLE` , `DESCRIPT` , `SECTION` , `TAGS` , `DATEADDED` , `NOTES` ) VALUES ( '$title', '$descript', '$section', '$tags', '$dateadded', '$notes'); "; 
    $result = mysqli_query($link, $sql);//$link->query($sql);
    $deal = mysqli_affected_rows($link);
    console_log("result ".$deal." rows");
    $last_id = $link->insert_id;
    console_log("insertion done on ".$last_id);
   // mysqli_free_result($result);
    break;
  case ('UPDATE'):
    $sql = "UPDATE `tasks` SET TITLE='$title', DESCRIPT='$descript', SECTION='$section', TAGS='$tags', DATEADDED='$dateadded', DATEDONE='$datedone', NOTES='$notes' WHERE TASKID = '$myid'; ";
    $result = mysqli_query($link, $sql);//$link->query($sql);
    $deal = mysqli_affected_rows($link);
    console_log("result ".$deal." rows");
    $last_id = $myid;
    break;
  case ('DELETE'):
    $sql = "DELETE FROM `tasks` WHERE TASKID = '$myid'; ";
    $result = mysqli_query($link, $sql);//$link->query($sql);
    $deal = mysqli_affected_rows($link);
    console_log("result ".$deal." rows");
    $last_id = $myid;
    break;
  default :
    break;   
} 

//mysqli_free_result($result); ONLY NEEDED IF YOU DO A SELECT
mysqli_close($link);
console_log ("Task number ".$last_id." has been ".$switcher);
$url = "https://codebox.mutable.agency/mysql/tbd";
header( "refresh: 3; url=$url" );
//
//if ($result === TRUE) {
//  mysqli_free_result($result);
//  mysqli_close($link);
//  console_log ("Task number $last_id has been $switcher");
//  $url = "https://codebox.mutable.agency/mysql/tbd";
//  header( "refresh: 3; url=$url" );
//} else {
//  console_log( "Error: " . $sql . "<br>" . $link->error);
//  mysqli_free_result($result);
//  mysqli_close($link);
//}
?>