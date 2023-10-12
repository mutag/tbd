<?php include '../head.php' //returns the chosen row and presents for editing?>
<body>
<div id="wrapper">
<?php include '../banner.php' ?>
<?php include '../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>Record Edit</h1>

<?php
$sql = "SELECT * FROM tasks WHERE taskid = '$sid' ";

$result = mysqli_query ($sql); // or die ("Error in query: $query. ".mysql_error());

if (! $result)
	echo "failure";
else
print "<head><title>Willi Brown task Database Edit Page</title>\n";
print "<link rel='stylesheet' type='text/css' href='../me.css' />\n";
print "</head>\n";
print "<body>\n";

$fields = mysql_list_fields($db, "tasks", $link); 
$columns = mysql_num_fields($fields); 
$fdata = mysql_fetch_array($result);
$date = date("F d, Y");
print "<a href='http://www.moksha.net/tasks'>HOME</a>&nbsp;&nbsp;&nbsp;";
print "Willi Brown task Database Edit Page&nbsp; $date<P>\n";
print "<BR>";

		
print "<form action='taskupdate.php' method='POST'>\n";
print "<table width=80% border=1>\n";


//Spew out each field name and data in a row
for ($i = 0; $i < $columns; $i++) 
{ 
  $sid = $fdata[taskid];
  print "<tr>\n";
  $fname = mysql_field_name($fields, $i);

  $field = $fdata[$i];
    if (is_null($field))
       $field = "x";
  print "\t<td><font face=arial size=2/>".$fname."</font></td>\n"; 
  print "\t<td><font face=arial size=2/><input type='text' size=100 value=\"".$field."\" name=$fname></td>\n";
 // print "\t<td><font face=arial size=2/>$field</font></td>\n"; 
  print "</tr>\n";
}

print "</table>\n";
print "<BR>";
print "\t&nbsp;<input type='submit' value='Update' name='submit'>";print "</form>\n";
mysql_close($link);
?> 
