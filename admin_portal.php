<?php
        session_start();
           if(!session_is_registered('username1'))
          {
           header("location:admin.php");
          }
 ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin_Portal</title>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>
<body>
<div class="header">
  	<?php include ("templates/navigation.php"); ?> 
</div>
<?php include ("templates/template.php"); ?>
  <center>
    <div style="width: 1200px;">
      <div class="rightcontent">
      	<?php 
					include"includes/admin_class.php";
					$check= new Check();
					echo $check->manage_user1();
      	?> 
      </div>
    </div>
		<?php include ("templates/footer.php"); ?>    
    
  </center>
</body>