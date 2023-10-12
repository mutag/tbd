<?php include '../../head.php' //shows all rows and allows edit or delete?>
<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>TASKLIST</h1>
<p>This is an <em>image</em> of a table showing all records with buttons to choose to edit or delete a row.</p>
<img src="rowchoicetable.png">
<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>