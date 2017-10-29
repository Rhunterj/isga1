<?php
   include("../php/config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: profile.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
  <head>
<meta charset="utf-8"/>
<title>Eindopdracht</title>
<link rel="stylesheet" href="../media/fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
<link href="../media/style/style.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
<div class="overlay"></div>
<aside class="sidebar">
  <section class="sidebar">
    <div class="sidebar-head"><img src="http://via.placeholder.com/200x200"/>
      <p>bas</p>
    </div>
    <div class="sidebar-content">
      <ul>
        <li><a href="list.html"><i class="fa fa-list" aria-hidden="true"><span>List</span></i></a></li>
        <li><a href="routes.html"><i class="fa fa-map-marker" aria-hidden="true"><span>Routes</span></i></a></li>
        <li><a href="gyms.html"><i class="fa fa-trophy" aria-hidden="true"><span>Gyms</span></i></a></li>
        <li><a href="sports.html"><i class="fa fa-soccer-ball-o" aria-hidden="true"><span>Sports</span></i></a></li>
        <li><a href="profile.html"><i class="fa fa-user" aria-hidden="true"><span>Profile</span></i></a></li>
        <li><a href="#"><i class="fa fa-users" aria-hidden="true"><span>Social</span></i></a></li>
        <li><a href="log-in.html"><i class="fa fa-sign-out" aria-hidden="true"><span>Log out</span></i></a></li>
      </ul>
    </div>
  </section>
</aside>
    <header>
<nav><i class="fa fa-bars" aria-hidden="true"></i>
  <p>ISGA</p><i class="fa fa-search" aria-hidden="true"></i>
</nav>
    </header>
    <main>
      <section class="log-in">
        <div class="log-in-container">
          <form action="" method="post">
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <input class="button" type="submit" value="submit"/>
          </form>
          <div class="account"><a href="create.html">Create account</a><span>|</span><a href="forgot.html">Forgot password</a></div>
        </div>
      </section>
    </main>
    <footer>
<script src="../media/scripts/main.js"></script>
    </footer>
  </body>
</html>