<?php
       		 session_start();
	           if(!session_is_registered('username1'))
	          {
	           header("location:admin.php");
	          }
     	 ?>
<html>
<head>
<title>LOGS</title>
<link rel="stylesheet" href="library/jquery-ui/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="library/jquery/jquery.js"></script>
<script type="text/javascript" src="library/jquery-ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="library/css/blue/style.css" rel="stylesheet" />
<script type="text/javascript" src="library/jquery/datetimepicker.js"></script>
<script>
$(function() {
	$('#example1').datetimepicker({
					ampm: true,
					dateFormat: 'mm/dd/yy'
				});	
	
	$('#example2').datetimepicker({
					ampm: true,
					dateFormat: 'mm/dd/yy'
				});	

});

</script> 
</head>
<body>
<div class="header">
  	<?php include ("templates/navigation.php"); ?> 
</div>
<?php include ("templates/template.php"); ?>
  <center>
    <div style="width: 1200px;">
    	  <form id="form1" name="form1" method="post" action="">
          <table>
          <tr>
          	<td>
            	<a href="recent_logs.php"><input name="rad_id" type="radio" id="radio3" class = "inp_radio" value="0" <?php if($_REQUEST['rad_id'] == "0") echo "checked";  ?> /></a>
	             <span>Recent:</span> 
            </td>
            <td>
            	<a href="admin_logs.php"><input name="rad_id" type="radio" id="radio3" class = "inp_radio" value="1" <?php if($_REQUEST['rad_id'] == "1" || $_REQUEST['rad_id'] == NULL ) echo "checked";  ?>/></a>
	             <span>Search:</span> 
            </td>
         </tr>
          <tr>
          <td>
              <div>
              		<font face="Arial">
                  	Username/Phone#:
                  </font>
              </div>
            </td>
            <td>
              <div>
                  <input type="text" name="txtsearch" id="txtsearch" value="<?php echo $search=trim($_POST['txtsearch']); ?>" />
              </div>
            </td>
          </tr>
          <tr>
          <td>
              <div>
              		<font face="Arial">
                  		Start Date:
                   </font>
              </div>
            </td>
            <td>
              <div>
                  <input type="text" name="sdate" id="example1" value="<?php echo $sdate=trim($_POST['sdate']); ?>" />
              </div>
            </td>
          </tr>
          <tr>
          <td>
              <div>
              		<font face="Arial">
                 		Start Date:
                 	</font>
              </div>
            </td>
            <td>
              <div>
                  <input type="text" name="edate" id="example2" value="<?php echo $edate=trim($_POST['edate']); ?>" />
              </div>
            </td>
          </tr>
          <tr>
          	<td>
              <div>
                  <input type="submit" name="search" id="search" value="Search" />
              </div>
            </td>
          </tr>
        </table> 
      </form>
      <div class="leftcontent">
      	<?php
					
		?>
      </div>
      <div class="rightcontent">
      	<?php 
					 include"includes/admin_class.php";
					 $search=trim($_POST['txtsearch']);
					 $sdate=trim($_POST['sdate']);
					 $edate=trim($_POST['edate']);
					 $rad_id=$_POST['rad_id'];
					 $check= new Check();
					 	if(isset($_POST['search']))
						  { 		
							$check->manageuser_search($search,$rad_id,$sdate,$edate);		
						  }else
						  {
						  	//$check= new Check();
							//$check->manageuser2($search);
						  }
			
					
      			?> 
      </div>
    </div>
		<?php include ("templates/footer.php"); ?>    
    
  </center>
</body>
</html>
