<?php

 include "../classes/userlogin.php";

?>





<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php
	$log = new userlogin();
	$db = new Database();
	$fm = new Format();
	
        if($_SERVER['REQUEST_METHOD'] =='POST'){
		    $username =$fm->validation($_POST['username']);
			$password = $fm->validation(md5($_POST['password']));

			$login = $log->userLogin($username, $password);

		}
	?>



		<form action="login.php" method="post">
			<h1>Admin Login</h1>

			<?php
			if (isset($login)) {
				echo "$login";
			}

			?>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>