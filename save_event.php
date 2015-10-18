<head><meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<?php
?>
<?php
include_once 'connect.php';

$cur_date = date("Y-m-d");

$sql = "INSERT INTO event_dtl ("
        . "txtdetail,txtdestination,"
        . "start_date,end_date,"
        . "date_added,status)"
        . "VALUES ("
        . "'" . $_POST['txtdetail'] . "',"
        . "'" . $_POST['txtdestination'] . "',"
        . "'" . $_POST['start_date'] . "',"
        . "'" . $_POST['end_date'] . "',"
        . "'" . $cur_date . "',"
		. "'" . $_POST['status'] . "'"
        . ")";
$qry = mysql_query($sql);

if ($qry) {
    echo '<center>INSERT Complete</center>';
	echo "<meta http-equiv='refresh' content='1;URL=calendar.php'>";
} else {
    echo 'Error Insert';
	echo $sql;
}

?>
