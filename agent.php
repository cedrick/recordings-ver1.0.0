<html>
<head>
<title>MAIN_PAGE</title>
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
<?php
	session_start();
     if(!session_is_registered('username'))
		{
 		 header("location:index.php");
		}
		include ("includes/rec_class.php");
		$check= new Check();
		if($check->is_logged_checker()){
			
		//$check->is_logged_checker();	
			$check->activity_on($user);
		}else{
			
			header ("location:logout.php");
		}
?>
<div class="header">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="logout.php" style="text-decoration:underline;">
        <font color="#FFFBF0" size="3" face="Arial Rounded MT Bold">
        	Logout
        </font>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
   	 <font color="#FFFBF0" size="3" face="Arial Rounded MT Bold">
        Hello!
        <?php echo $_COOKIE['user']; ?>
      </font>

</div>
<?php include ("templates/template.php"); ?>
<!--   <form id="form1" name="form1" method="post" action="" style="margin:40 0 20 0;">    	
    <div class="head_top" style="width:413px; height:20px;"></div>
  <table style="margin-left:188px;">
        <tr>
         <th>
           <div id="search" style=" background-color:#A9C8D3; width:410px; height:24px; margin-bottom:0px;">
               <input type="text" size="50" name="txtsearch" id="txtsearch" value=""          title=" 10 digits Phonenumber/Call_ID<br><em style='font-size:11px;'>note: For multiple search, separate it by COMMA &quot;,&quot;</em>"/>
               <input type="submit" name="search" id="search" value="    Search    " style="width:70px;"/>
           </div>
          </th>
</tr>
        <tr>
          <td>
           <div style="background-color:#E0FFFF; width:410px; height:44px; margin-top:0px;"> 
              <div style="margin-left: 20px; float:left;top:79px; left:9px;	">                   
                <strong>
                  Search By:  
                </strong>
              </div>
              <div style="margin-left: 20px; float:left;top:79px; left:9px;	">
               <input name="rad_id" type="radio" id="radio3" value="0" 
                Call_ID
              </div>
              <div style="margin-left: 80px; float:left;top:79px; left:9px;	">
             	 <input name="rad_id" type="radio" id="radio4" value="1" 
               	Phone_Number
              </div>
              <br />
              <div style="margin-left: 20px; float:left;top:79px; left:9px;	">
                 <strong>
                  Sort By:  
                </strong >
              </div>
              <div style="margin-left: 37px; float:left;top:79px; left:9px;	">
                <input name="rad_sort" type="radio" id="radio" value="0" 
                  Phone_Number
             </div>
             <div style="margin-left: 33px; float:left;top:79px; left:9px;	">
              <input name="rad_sort" type="radio" id="radio2" value="1" <    
                Date
            </div>
             </div>
           </td>
        </tr>
      </table>
  </form>
   -->
	<style>
		body{
		font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
		}
		p, h1, form, button{border:0; margin:0; padding:0;}
		.spacer{clear:both; height:1px;}
		/* ----------- My Form ----------- */
		.myform{
		margin:0 auto;
		width:400px;
		hiegth:312px;
		padding:14px;
		}
		
		/* ----------- stylized ----------- */
		#stylized{
		border:solid 2px #b7ddf2;
		background:#ebf4fb;
		margin: 30px 0 30px 130px;
		}
		#stylized h1 {
		font-size:14px;
		font-weight:bold;
		margin-bottom:8px;
		}
		#stylized p{
		font-size:11px;
		color:#666666;
		margin-bottom:20px;
		border-bottom:solid 1px #b7ddf2;
		padding-bottom:10px;
		}
		#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:140px;
		float:left;
		}
		#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:140px;
		}
		#stylized .inp_text{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		width:200px;
		margin:2px 0 20px 10px;
		}
		#stylized button{
		clear:both;
		margin-left:150px;
		width:125px;
		height:31px;
		background:#666666 url(img/button.png) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:11px;
		font-weight:bold;
		}
		.radioFields {
			padding:4px 2px;
			border:solid 1px #aacfe4;
			width:195px;
			margin:2px 0 20px 10px;
			float: left;
			background-color: #FFFFFF;
		}
		.inp_radio{
			width: 20px;
		}
	</style>
	<div id="stylized" class="myform">
		<form id="form1" name="form1" method="post" action="">
			
			<font size = "3">
				<label>
					Action:
				</label>
			</font>
				<div>
	               	<a href="main.php"><span><font size="2" color="BLACK">Phone/Call ID</font></span> </a>
	                
	            </div>
	            <div>
	            	<a href="agent.php"><span><font size="2" color="BLACK">Agent</font></span> </a>
	               	
	            </div>
		
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				
	 <table>
		<tr>
		<td>
			<label><font size="2">Enter Agent ID:</font>
				<span class="small">Example:Mavis.b</span>
			</label>
		</td>
		<td>
			<input type="text" name="txtsearch" id="txtsearch" value="<?php echo $search=trim($_POST['txtsearch']);?> " />
		</td>
		</tr>
		<tr>
		<td>
			<label><font size="2">Start Date:</font>
				<span class="small">Example:5/10/2010 10:13:40 AM</span>
			</label>
		</td>
		<td>
			 <input type="text" name="txtstart" id="example1" value = "<?php echo  $start=trim($_POST['txtstart']); ?> ">
		</td>
		</tr>
		<tr>
		<td>
			<label><font size="2">End Date:</font>
				<span class="small">Example:6/10/2010 10:13:40 PM</span>
			</label>
		</td>
		<td>
			<input type="text" name="txtend" id="example2" value = " <?php echo  $end=trim($_POST['txtend']); ?> " />
		</td>
		</tr>
	 </table>             
	           
	   
		
			
			
			<button type="submit" name="search" id="search">Search</button>
			<div class="spacer"></div>
		
		</form>
	</div>
<center>
<div class="content">
<?php
  if(isset($_POST['search']))
	  { 
			$search=trim($_POST['txtsearch']);
			$start=trim($_POST['txtstart']);
			$end=trim($_POST['txtend']);
			$check->agent_id($search,$start,$end);
			$check->search_logs2($search,$start,$end);
			$check->activity_on($user);
	  }
?>
<br />
</div>
</center>
 <?php include ("templates/footer.php"); ?>
</body>
</html>

