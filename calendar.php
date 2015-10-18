<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
include_once 'connect.php';
?>

<html>
    <head>
        <title>User Calendar</title>
        <link href="css/font-awesome.css" rel="stylesheet" media="all">
		<link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" media="all">
        <script>

            function goLastMonth(month, year) {
                if (month == 1) {
                    --year;
                    month = 13;
                }

                document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + (month - 1) + "&year=" + year;
            }

            function goNextMonth(month, year) {
                if (month == 12) {
                    ++year;
                    month = 0;
                }

                document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + (month + 1) + "&year=" + year;
            }


        </script>
        <style>
            .today {
                background-color : #AAAAAA;
            }
            .event {
                background-color : #FFFFCC;
            }
            .cancel
            {
                background-color : #FF0000;
            }
            .wait
            {
                background-color : #FFFF00;
            }
            h1 {
                text-align: center;
            }

            h99 {
                text-align: center;
                font:normal 15px Trebuchet MS, Tahoma;

            }

            h3 {
                text-align: right;
            } 
        </style>
<script type="text/javascript">
	function MM_openBrWindow(theURL,winName,features) {
  		window.open(theURL,winName,features);
	}
</script>
    </head>

    <body>

            <?php
            if (isset($_GET['day'])) {
                $day = $_GET['day'];
            } else {
                $day = date("j");
            }
            if (isset($_GET['month'])) {
                $month = $_GET['month'];
            } else {
                $month = date("n");
            }
            if (isset($_GET['year'])) {
                $year = $_GET['year'];
            } else {
                $year = date("Y");
            }


            $currentTimeStamp = strtotime("$year-$month-$day");
            $monthName = date("F", $currentTimeStamp);
            $numDays = date("t", $currentTimeStamp);
            $counter = 0;
            ?>



            <table align='center' class="table tabl-striped" >
                <tr>
                    <td  width='150px' height='50px' align='center' class="active"  ><input style='width:50px;' type = 'button' class='hvr-bubble-float-right' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month . "," . $year ?>)"></td>
                    <td colspan='5'  height='50px' align='center' class="active"> <?php echo $monthName . "," . $year; ?></td>
                    <td  width='150px' height='50px' align='center'  class="active"><input style='width:50px;' type = 'button' class='hvr-bubble-float-left' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month . "," . $year ?>)"></td>

                </tr>
                <tr>
                    <td width='200px' height='50px' align='center'bgcolor='#6699CC'>Sun</td>
                    <td width='200px' height='50px' align='center'bgcolor='#6699CC'>Mon</td>
                    <td width='200px' height='50px'align='center'bgcolor='#6699CC'>Tue</td>
                    <td width='200px' height='50px'align='center'bgcolor='#6699CC'>Wed</td>
                    <td width='200px' height='50px'align='center'bgcolor='#6699CC'>Thu</td>
                    <td width='200px' height='50px'align='center'bgcolor='#6699CC'>Fri</td>
                    <td width='200px' height='50px'align='center'bgcolor='#6699CC'>Sat</td>
                </tr>
                <?php
                echo "<tr>";

                for ($i = 1; $i < $numDays + 1; $i++, $counter++) {

                    $timeStamp = strtotime("$year-$month-$i");

                    if ($i == 1) {
                        $firstDay = date("w", $timeStamp);

                        for ($j = 0; $j < $firstDay; $j++, $counter++) {
                            //blank space
                            echo "<td width='200px' height='50px'bgcolor='#DDDDDD'>&nbsp;</td>";
                        }
                    }

                    if ($counter % 7 == 0) {
                        echo "</tr><tr>";
                    }
                    $monthstring = $month;
                    $monthlength = strlen($monthstring);
                    $daystring = $i;
                    $daylength = strlen($daystring);
                    if ($monthlength <= 1) {
                        $monthstring = "0" . $monthstring;
                    }
                    if ($daylength <= 1) {
                        $daystring = "0" . $daystring;
                    }
                    $todayDate = date("Y-m-d");
                    $dateToCompare = $year . '-' . $monthstring . '-' . $daystring;
                    echo "<td width='200px' height='50px' align = 'center' class='active' ";
                    if ($todayDate == $dateToCompare) {
                        echo "class='today'";
                    } else {

                        $sqlCount = "select * from event_dtl where start_date='" . $dateToCompare . "'";
                        @$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
                        if (@$noOfEvent >= 1) {

                            echo "class='event'";
                        }
                    }
                    $strSQL = "SELECT * FROM `event_dtl` WHERE start_date='" . $dateToCompare . "'";
                    $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
                    echo ">"
                    . "" . $i . ""
                    . "<br/>";
                    while ($objResult = mysql_fetch_array($objQuery)) {
                       $dd = $objResult["status"];
                        if ($dd == 'cancel') {
                            echo "<a href='#'onClick=MM_openBrWindow('calendar_event_detail.php?event_no=$objResult[event_no]','','width=570,height=650'); class='btn btn-danger'>" . @$objResult[txtdetail] . "";
                        } else
                        if ($dd == 'waiting') {
                            echo "<a href='#'onClick=MM_openBrWindow('calendar_event_detail.php?event_no=$objResult[event_no]','','width=570,height=650'); class='btn btn-warning'>" . @$objResult[txtdetail] . "";
                        } else {
                            echo "<a href='#' onClick=MM_openBrWindow('calendar_event_detail.php?event_no=$objResult[event_no]','','width=570,height=650'); class='btn btn-success'>" . @$objResult[txtdetail] . "";
                        }
                    }
                    echo "<br/>";
                }

                echo "</td></tr></table >";
                ?> 

                <h5><center><span class="label label-success">confirm</span>
                        <span class="label label-warning">waiting</span>
                        <span class="label label-danger">cancel</span></center></h5>
<center>
        <?php

include 'eventform.php';

        ?>
		</center>
    </body>
</html>

