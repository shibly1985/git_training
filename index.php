<?php
//phpinfo();
require_once 'dbconfig.php';
if(isset($_POST['btn-login']))
{
	$uname = $user-> post('txt_uname_email');
	$upass = $user-> post('txt_password');
	$pass = md5($upass);		
	if($user->login($uname,$pass))
	{
		$user->redirect('home.php');
	}
	else
	{
		$error = "User Name or Password did not match !";
	}	
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin CRO</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
    	<div class="form-container">
    	  <form method="post">
            <h2 align="center">CRO Admin </h2><hr />
            <?php
			if(isset($error))
			{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> 
                     </div>
                     <?php
			}
			?>
            <div class="form-group">
            	<input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" name="btn-login" class="btn btn-block btn-primary">
                	<i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                </button>
            </div>
            <br />
    	  </form>
       </div>
</div>

</body>
</html>