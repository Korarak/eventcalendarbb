<html>
    <head>
        <title>B Event on Calendar</title>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" media="all">
        

    </head>
    <body>
        <?php
        include 'connect.php';
        
        $strSQL2 = "SELECT * FROM `event_dtl` WHERE `event_no` ='".$_GET['event_no']."'";
        $objQuery2 = mysql_query($strSQL2) or die("Error Query [" . $strSQL2 . "]");
        ?><br/>
    <center>&nbsp;&nbsp;event detail
        <?php
        while ($objResult2 = mysql_fetch_array($objQuery2)) {
            ?>
            <table border="1" class="table table-striped table-hover"> 
                <tr >
                    <td width="20%"  class="info">no</td><td width="300px"><?php echo $objResult2["event_no"]; ?></td></tr>
                <tr> <td class="info" >event</td><td><?php echo $objResult2["txtdetail"]; ?></td></tr>
                <tr> <td class="info" >destination</td><td><?php echo $objResult2["txtdestination"]; ?></td></tr>
                <tr> <td class="info" >start date</td><td><?php echo $objResult2["start_date"]; ?></td></tr>
                <tr> <td class="info" >end date</td><td><?php echo $objResult2["end_date"]; ?></td></tr>
                <tr> <td class="info" >date added</td><td><?php echo $objResult2["date_added"]; ?></td></tr>
<tr> <td class="info" >status</td><td><?php echo $objResult2["status"]; ?></td></tr>                  
               
                <?php
            }
            ?>
            </table><A HREF="#" onclick="window.close();" class="btn btn-danger">close</A></center>
    </center><hr/>
</body>
</html>
