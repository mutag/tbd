<?php include '../../head.php' //simple form to create (or edit) a record ?>
<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>Record Entry</h1>
<p>This is a simple form to create (or edit) a record.</p>
<img src="additemform.png">

<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>