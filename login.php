<?php
    session_start();
    session_unset();
    if(isset($_SESSION["username"])) {
      header("location:/index.php");
    }
    
    if (isset($_POST["login"])) {
      $username = $_POST['uname'];
      $password = $_POST['password'];
      
      include('database.php');

      $db = Database::getDB();
      
      $stmt=$db->prepare("SELECT * FROM users WHERE username=:username");

      $stmt->execute(["username" => $username]);
      
      $result=$stmt->rowCount();

      $error="";

      if($username=="" || $username=="") {
        $error="Mindent mezőt kötelező kitölteni.";
      } else if($result==0) {
        $error="Ez a felhasználó nem létezik!";
      } else {
        $stmt=$db->prepare("SELECT password FROM users WHERE username=:username");
        $stmt->execute(["username" => $username]);

        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password,$result["password"])){
          session_destroy();
          session_start();
          $_SESSION["username"]=$username;
          header("location:/index.php");
        } else{
          $error="A megadott jelszó hibás!";
        }

      }
    }
    

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <?php include("menu.php") ?>

</head>
<body>
  <div class="header">
  	<h2>Bejelentkezés</h2>
  </div>
  <form method="post" action="login.php" >
    <?php 
      if(!empty($error)) {
        echo("<div class='error'> <p>".$error."<p></div>");
      }
    ?>
  	<div class="input-group">
  		<label>Felhasználónév</label>
  		<input type="text" name="uname" >
  	</div>
  	<div class="input-group">
  		<label>Jelszó</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login">Bejelentkezés</button>
  	</div>
  	<p>
  		Még nem regisztrált? <a href="register.php">Regisztrálás</a>
  	</p>
    <p>
      <br>Üdvözlöm a LaCinema oldalán! Néhány opció bejelentkezés után lesz elérhető!
    </p>
  </form>

</body>
</html>