<?php
  session_start();
  include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <?php
        if(isset($_POST['email'])){

            $username = $_POST['email'];
            $password = md5($_POST['password']);
            $userQuery = $db->query("SELECT uid, email, password FROM users WHERE email = '$username' and password = '$password' and status = 1");
            $userData = $userQuery->fetch_assoc();
            if($userData['email']!=$username){
              echo 'invalid Username or password.';
            }elseif($userData['password']!=$password){
              echo 'invalid Username or password.';
            }else{
              if($_POST['remember']=='remember-me'){
                setcookie('amiloginkoreachi', base64_encode($username), time()+60*60*24*7 );
              }
              $_SESSION['amibangali'] = base64_encode($username);
              header('location: index.php');
              exit();
            }
          }
        ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword"  class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </body>
</html>