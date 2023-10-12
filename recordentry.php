<?php include '../../head.php' //simple form to create (or edit) a record ?>
<body>
<div id="wrapper">
<?php include '../../banner.php' ?>
<?php include '../../navbar.php' ?>

<div id="main">
<?php breadcrumbs(); ?>
<h1>Record Entry</h1>
<p>This is a simple form to create (or edit) a record.</p>

<!--if this comes from edit, then you have to get the posts into the values otherwise make them generic -->
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$key = $_POST['sid'];
$sf = $_POST['file']; //sending file
$cmd = $_POST['submit'];
//echo "<div><p>The key is ".$key." from ".$sf." and the cmd is ".$cmd."</p></div>"; DEBUG LINE


if ($sf == 'index') {
    $sf = 'recordchoose';
}
//global $key, $commando;
//    if (isset($_SERVER['HTTP_REFERER'])) {
//        $refURL = $_SERVER['HTTP_REFERER'];
//        $file = basename($refURL, ".php");

//        $switch = $_POST[submit]; //could be used to prompt delete assurance

        if ($sf == 'recordchoose') {
            switch ($cmd) {
                case ("Edit") :
                    $commando = 'UPDATE'; 
                    $sql = "SELECT * FROM tasks WHERE TASKID = '$key';";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $uid = $row["TASKID"];
                    $title =  $row["TITLE"];
                    $descript = $row['DESCRIPT'];
                    $section = $row['SECTION'];
                    $tags = $row['TAGS'];
                    $dateadded = $row['DATEADDED'];
                    $datedone = $row['DATEDONE'];            
                    $notes = $row['NOTES'];
                    echo "<div>\n<h2>\neditItem</h2>\n<form action='recordadd.php' method='POST'>\n";
                    echo"<p>Task: <input type='text' name='TITLE' value='".$title."' maxlength='50' size='120'></p>";
                    echo"<p>Description: <input type='text' name='DESCRIPT' value='".$descript."' maxlength='128' size='120'></p>";
                    echo"<p>Section: <input type='text' name='SECTION' value='".$section."' maxlength='12' size='12'>&nbsp;&nbsp;&nbsp;";
                    echo"Tags: <input type='text' name='TAGS' value='".$tags."' maxlength='12' size='12'></p>";
                    echo"<p>Date Added: <input type='date' name='DATEADDED' value='".$dateadded."' maxlength='12' size='12'>&nbsp;&nbsp;&nbsp;";
                    echo"Date Done: <input type='date' name='DATEDONE' value=".$datedone."' maxlength='12' size='12'></p>";
                    echo"<p>Notes: <input type='text' name='NOTES' value='".$notes."' maxlength='500' size='120'></p>";
                    echo"<p><input type='submit' value='Submit' name='submit'>";
                    echo"<input type=hidden name=required value=TITLE,DESCRIPT>";
                    echo"<input type=hidden value=".$key." name='sid'>";
                    echo"<input type=hidden value=".$commando." name='commando'>";
                    echo"</p>\n</form>\n</div>\n";
                    break;
                case ("Del") :
                    $commando = 'DELETE'; //instead of a fast delete, populate the form below & prompt
                    $sql = "DELETE FROM `tasks` WHERE TASKID = '$key'; ";
                    $result = mysqli_query($link, $sql);//$link->query($sql);
                    console_log ("TaskID $key was deleted.");
                    mysqli_close($link);
                    $url = "https://codebox.mutable.agency/mysql/tbd";
                    header( "refresh: 1; url=$url" );
                    break;
                case ("Insert") : 
                        $commando = 'INSERT';
                        $title = "Title of Task to be Done";
                        $descript = "Long Description of Task";
                        $section = "PHP? MySQL? JavaScript?";
                        $tags = "#something";
                        $dateadded = date('Y-m-d');
                        $datedone = "";           
                        $notes = "Anything to remember?";
                        echo "<div>\n<h2>\n<a name='addfrm'>addItem</a></h2>\n<form action='recordadd.php' method='POST'>\n";
                        echo"<p>Task: <input type='text' name='TITLE' value='".$title."' maxlength='50' size='50'></p>";
                        echo"<p>Description: <input type='text' name='DESCRIPT' value=' ".$descript."' maxlength='128' size='50'></p>";
                        echo"<p>Section: <input type='text' name='SECTION' value='".$section."' maxlength='12' size='12'>&nbsp;&nbsp;&nbsp;";
                        echo"Tags: <input type='text' name='TAGS' value='".$tags."' maxlength='12' size='12'></p>";
                        echo"<p>Date Added: <input type='date' name='DATEADDED' value='".$dateadded."' maxlength='12' size='12'>&nbsp;&nbsp;&nbsp;";
                        echo"Date Done: <input type='date' name='DATEDONE' value='".$datedone."' maxlength='12' size='12'></p>";
                        echo"<p>Notes: <input type='text' name='NOTES' value='".$notes."' maxlength='500' size='50'></p>";
                        echo"<p><input type='submit' value='Submit' name='submit'>";
                        echo"<input type=hidden name=required value=TITLE,DESCRIPT>";
                        echo"<input type=hidden value=".$key." name='sid'>";
                        echo"<input type=hidden value=".$commando." name='commando'>";
                        echo"</p>\n</form>\n</div>\n";
                        break;
                default :
                    mysqli_close($link);
                    $url = "https://codebox.mutable.agency/mysql/tbd";
                    header( "refresh: 2; url=$url" );
            }
        } 
      
        //console_log ("refURL= ".$file);
    //} else {
    //    console_log ("No referer URL");

        //}
    unset($file);
?>

<div class="clear"></div>
</div><!-- main -->
<?php $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<p class='small'>This page $filename last modified: " . date ("F d Y H:i:s.", filemtime($filename)).'</p>';
    }
    include('../../pagebottom.php'); 
?>