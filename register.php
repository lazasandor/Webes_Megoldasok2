<?php
	session_start();
	if(isset($_SESSION["username"])) {
		header("location:/index.php");
	}

	if(isset($_POST["registration"])){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$uname = $_POST["uname"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$error="";
		$success="";

		if($fname=="" || $lname=="" || $uname=="" || $email=="" || $password==""){
			$error="Minden mezőt kötelező kitölteni!";

		} else{
			include('database.php');
			$db = Database::getDB();
			
			$password=password_hash($password, PASSWORD_BCRYPT);
			$stmt = $db->prepare('INSERT INTO users(first_name,last_name,email,password,username)
																		VALUES(:fname,:lname,:email,:pass,:username)');
			$stmt->execute(["fname" => $fname, "pass" => $password, "email"=>$email, "username"=>$uname, "lname"=>$lname]);
			$success="Sikeres regisztráció!";

		}

		

	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Regisztráció</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Regisztráció</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php 
      if(!empty($error)) {
        echo("<div class='error'> <p>".$error."<p></div>");
	  } 
	  
	  if(!empty($success)){
		echo("<div class='success'> <p>".$success."<p></div>");
	  }

    ?>
  	<div class="input-group">
  	  <label>Keresztnév</label>
  	  <input type="text" name="fname">
  	</div>
    <div class="input-group">
      <label>Vezetéknév</label>
      <input type="text" name="lname">
    </div>
    <div class="input-group">
      <label>Felhasználónév</label>
      <input type="text" name="uname" >
    </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Jelszó</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="registration">Regisztráció</button>
  	</div>
  	<p>
  		Már regisztráltál? <a href="login.php">Lépj be</a>
  	</p>
  </form>
</body>
</html>