<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Information</title>
</head>

<body>
		<?php
       		 session_start();
	           if(!session_is_registered('username1'))
	          {
	           header("location:admin.php");
	          }
     	 ?>
 <div class="header">
  	<?php include ("templates/navigation.php"); ?> 
  </div>
<?php include ("templates/template.php"); ?>
<center>
  <br /><br /><br /><br /><br />
<?php 
				include ("includes/connection.php");
				$connect= new Connection();
					 
					 if($connect->connectdb("db_recordings"))
					{
							$id = $_GET['id'];
							$result = mssql_query("select * from rec_user INNER JOIN rec_logs ON rec_user.id = rec_logs.userid where logId = '$id' order by logdate desc") or die(mssql_error());	
							echo "<table border=0 align=center cellspacing=1 bgcolor=	#AFC7C7>";	
							while($row=mssql_fetch_array($result))
									{
										if($x%2==0)
										{
											$color = " bgcolor = '#C6DEFF' ";
										}else
										{
											$color=" bgcolor='#FFF5EE'";
									  	}
		
						        		$x++;
										echo '<tr'.$color.'>';
										echo"<td>"."<b>"."LOG_ID"."</b>"."</td>";
										echo"<td>". $row['logId'] ."</td>";
										echo '<tr '.$color.' >';
										echo"<td>"."<b>"."USER_ID"."</b>"."</td>";
										echo"<td>". $row['userId'] ."</td>";
										echo '<tr '.$color.' >';
										echo"<td>"."<b>"."USERNAME"."</b>"."</td>";
										echo"<td>". $row['username'] ."</td>";
										echo '<tr '.$color.' >';
										echo"<td>"."<b>"."LOG_DATE" ."</b>"."</td>";
										echo"<td>". $row['logDate'] ."</td>";
										echo '<tr '.$color.' >';
										echo"<td>"."<b>"."LOG_DETAIL" ."</b>"."</td>";
										echo"<td>". $row['logDetail']."</td>";
									    echo '<tr '.$color.' >';
										echo"<td>"."<b>"."OTHER_DETAIL" ."</b>"."</td>";
										echo'<td width="80%">'.$row['otherDetail'].'</td>';
			
									}
									echo"</tr>";
				    				 echo "</table>";
				 }else
				 {
					 echo'<div class="counter">'. "Database Error!".'</div>';
				 }
					$connect->closedb();
?>
  
</div>
<br /><br />
<br />
<?php include ("templates/footer.php"); ?>
</center>
</body>
</html>
