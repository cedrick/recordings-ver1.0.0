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
	            	<a href="recent_logs.php"><input name="rad_id" type="radio" id="radio3" class = "inp_radio" value="0" <?php if($_REQUEST['rad_id'] == "0" || $_REQUEST['rad_id'] == NULL ) echo "checked";  ?>/></a>
		             <span>Recent:</span> 
	            </td>
	            <td>
	            	<a href="admin_logs.php"><input name="rad_id" type="radio" id="radio3" class = "inp_radio" value="1"<?php if($_REQUEST['rad_id'] == "1") echo "checked";  ?>/></a>
		             <span>Search:</span> 
	            </td>
           </tr>
        </table> 
      </form>
      <div class="rightcontent">
      	<?php 
      		/*
					 include"includes/admin_class.php";
					 $search=trim($_POST['txtsearch']);
					 $rad_id=$_POST['rad_id'];
					 $check= new Check();
					 	//if(isset($_POST['search']))
						 // { 		
							//$check->manageuser_search($search,$rad_id);		
						 // }else
						 // {
						  	//$check= new Check();
							$check->manageuser2($search);
						 // }
			 */
      			?>
		
		<?php 
			//pagination
			 include"includes/paginate_class.php";
			 
			 $page = !isset($_GET['page']) ? 1 : $_GET['page'];
			 $result_count = 30;
			 
			 $query_count = "SELECT logId FROM rec_logs";
			 
			 $query_data = "
			 	SELECT top $result_count logId,name,logDate,logDetail,otherDetail
					FROM rec_logs
						INNER JOIN rec_user ON rec_logs.userId = rec_user.id
					WHERE logId not in (
						SELECT TOP ".($page - 1) * $result_count." logId
						FROM rec_logs
						ORDER BY logId DESC
					)
					ORDER BY logId DESC
			 ";
			 
			 $paginate = new Paginate($page, $result_count, $query_count, $query_data);
			 
			 //generate links
			 $paginate->generate_links();
		?>
      </div>
    </div>
		<?php include ("templates/footer.php"); ?>    
    
  </center>
</body>
</html>
