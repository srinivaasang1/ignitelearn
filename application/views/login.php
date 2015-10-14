<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Marck+Script' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/custome.css">


</head>
<body>



<div id="container">

	<div id="body">
		<p><h1>Login Page</h1></p>

		<?php echo form_open('login/data_submitted');?>
		  <label for="username_lbl">username</label>
    <input type="text" name="username" id="usernameid"/>
		  <label for="password_lbl">password</label>
    <input type="password" name="password" id="passwordid"/>
		  <input type="submit" value="Submit">
		<?php echo form_close( ); ?>
	</div>
	<?php
		if (isset($user_name)) 
		{
			echo "<h3>You have submitted these values</h3>";
			echo "<label>Entered User Name : </label>";echo $user_name;
			echo "<label>Entered Password : </label>";echo $password;
		}
			
	?>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>