<?php include '../../head.php'//this file will enable editing?>

<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>Tasklist (PHP MySQL Example)</h1>
<p><img class="imgRight" src="../../images/phpmyadmin-logo_right.png">MySQL db and table manually created in the hosting 
backend using phpMyAdmin.
</p>
<ul>
	<li>
		<a href="recordlist.php">Display Columns and Rows of Table</a>
	</li>
	<li>
		<a href="recordchoose.php">Choose Record to Edit or Delete</a>
	</li>
	<li>
	<form method='POST' action='recordentry.php'><input type='hidden' value='index' name='file'>
		<input type='hidden' value='Insert' name='submit'><a href="recordentry.php">
		<button>Create New Record</button></a></form>
	</li>
	<li>
		<a href="#">TBD Sort Columns</a>
	</li>
	<li>
		<a href="fieldproplist.php">Output Column Info</a>
	</li>
</ul>
<p>The Edit, Delete and Add commands (from this navigation) are all sent to the same page/script for processing
	through a switch statement. The delete does not yet display a confirmation prompt! (10/10/23)
</p>
<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>