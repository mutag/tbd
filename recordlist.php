<?php include '../../head.php' //simple outout of fields and properties?>
<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>TASKLIST</h1>
<p>This gets <em>all</em> records.</p>

<?php
// Check connection
//if ($link->connect_error) {
//    $fail = $link->connect_error;
//    console_log ($fail);
//    die("Connection failed: " . $fail);
//  }

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$sql = ("SELECT * FROM tasks ORDER BY TASKID");
$result = mysqli_query($link, $sql);

//if ($result === FALSE) {
//    console_log( "Error: " . $sql . "<br>" . $link->error);
//  } else {

echo "\t<table width=100% border=1>\n<tr>\n";

$fields = mysqli_fetch_fields($result); //returns info not data https://www.php.net/manual/en/mysqli-result.fetch-fields.php
    
    foreach ($fields as $val) {            //loop thru and output field names for header row
      echo "\t<td class='centerstuff'>$val->name</td>\n"; 
    }
    echo "</tr>\n";
    
    //loop thru rows then loop through fields and output data

    while($row = mysqli_fetch_assoc($result)) { 
      echo "<tr>\n";
      foreach ($row as $key=>$value) {
        //if (is_null($value))
        //  $value = 'x';  
        echo "\t<td class='small'>" .$value ."</td>\n";  //    foreach field make a cell, echo out the value, close the cell
        }
      echo "</tr>\n"; //close the row  
    }

    echo "</table>\n";
    unset($sid);
    mysqli_free_result($result);
    mysqli_close($link);
//  }
// need error catch here
?>
<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>