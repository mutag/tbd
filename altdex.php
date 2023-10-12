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
		<a href="recordlist.php">Output Columns and Rows</a>
	</li>
	<li>
		<a href="fieldproplist.php">Output Column Info</a>
	</li>
	<li>
		<form method='POST' action='recordentry.php'><input type='hidden' value='index' name='file'><input type='hidden' value='Insert' name='submit'><a href="recordentry.php"><button>Create New Record</button></a></form>
	</li>
	<li>
		<a href="recordchoose.php">Choose Record to Edit or Delete</a>
	</li>
	<li>
		<a href="#">TBD Sort Columns</a>
	</li>
</ul>
<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>