<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<head>
    <title>Booking Form</title>
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                
              
            });
        });
    </script>
    <script>
        $(function () {
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd',
              
                
            });
        });

    </script>
   <style>
          
            h999 {
                text-align: left;
                font:normal 15px;

            }

        </style>


</head>
<body>

    <form method="POST" action="save_event.php" class="form-horizontal">
        <fieldset>

           <b>Event Detail</b>
            <div class="form-group">
                event&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea name='txtdetail'></textarea><br/><br/>
                destination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea name='txtdestination'></textarea><br/><br/>
                start date &nbsp;&nbsp;&nbsp;
                <input type="text" id="datepicker" name="start_date" placeholder="click to choose date" onclick="$('#datepicker').datepicker();
                        $('#datepicker').datepicker('show');"><br/><br/>
                end date&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <input type="text" id="datepicker2" name="end_date" placeholder="click to choose date" onclick="$('#datepicker2').datepicker();
                        $('#datepicker2').datepicker('show');"><br/><br/>
						<select name='status'>
						<option value='confirm'>confirm</option>
						<option value='cancel'>cancel</option>
						<option value='waiting'>waiting</option>
						</select>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    </fieldset>
                    </form>

                    </body>

