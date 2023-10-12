<?php include '../../head.php' //simple read only display of the table's field's properties?>
<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>TASKLIST</h1>
<p>This is a simple read only display of the table's field's properties.</p>

<?php

//if (! $link)
 // need error catch here // die("Couldn't connect to MySQL");
//what db to open ?
 //mysqli_select_db($db , $link) 
// need error catch here  // or die("Couldn't open $db: ".mysql_error());
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$query = ("SELECT * FROM tasks ORDER BY DATEADDED");
$result = mysqli_query($link, $query);
// need error catch here

$fields = mysqli_fetch_fields($result); //returns info not data https://www.php.net/manual/en/mysqli-result.fetch-fields.php
$num_cols = mysqli_num_fields($result); 

echo "<table width=100% border=1>\n<tr>\n\t";
echo "<td class='small'>FieldName</td>\n";
echo "<td class='small'>MaxLength</td>\n";
echo "<td class='small'>Length</td>\n";
echo "<td class='small'>Flags</td>\n";
echo "<td class='small'>Type</td>\n";
echo "\n</tr>\n";

foreach ($fields as $val) { //loop thru and output field names for header row
  $vType = ($val->type);
    //h_type2txt($val->type);
  echo "<tr>\n\t<td class='small'>$val->name</td>\n"; 
  echo "\t<td class='small'>$val->max_length</td>\n";  
  echo "\t<td class='small'>$val->length</td>\n";  
  echo "\t<td class='small'>$val->flags</td>\n";  
  echo "\t<td class='small'>$val->type</td>\n";  
  echo "\n</tr>\n";
  }

echo "</table>\n";
echo "</form>\n";
mysqli_free_result($result);
mysqli_close($link);
?>

<!--
<div>
<h2><a name='addfrm'>Add a task</a></h2>
<form action="taskadd.php" method="POST">
Task<input type="text" name="task" value="" maxlength="50" size="50"><br>
Description<input type="text" name="desc" value="" maxlength="128" size="50"><br>
Client<input type="text" name="client" value="" maxlength="50" size="50"><br>
Notes<input type="text" name="notes" value="" maxlength="128" size="50"><br>


<input type="submit" value="Submit" name="submit">
<input type=hidden name=required value=task,desc>
</form>
</div>
-->
<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>