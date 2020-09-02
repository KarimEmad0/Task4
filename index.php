<?php
   session_start();
    ?>
<!DOCTYPE html>
<html>
   <head>
      <title>User Log in And Registration </title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
   </head>
   <body>
      <div class="container">
      <div class="login-box">
         <div class="row">
            <div class="col-md-6 login-left">
               <h1>Login</h1>
               <?php
                  if (isset($_SESSION['success'])) {
                  		echo('<p style="color: green;">' . htmlentities($_SESSION['success']) . "</p>\n");
                  		unset($_SESSION['success']);
                  }
                  else if (isset($_SESSION['error'])) {
                  	 echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
                  	 unset($_SESSION['error']);
                  }
                  ?>
               <form action="log in.php" method="post">
                  <div class="form-group">
                     <label for="email"><b>Email Address</b></label>
                     <input class="form-control" id="email"  type="email" name="email"   >
                  </div>
                  <div class="form-group">
                     <label for="password"><b>Password</b></label>
                     <input class="form-control" id="password"  type="password" name="password" >
                  </div>
                  <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign In">
               </form>
            </div>
            <div class="col-md-6 login-right">
               <h1>Registration</h1>
               <form action="registration.php" method="post">
                  <div class="form-group">
                     <label for="name"><b>Name</b> </label>
                     <input class="form-control" type="text" name='name' required> <br>  <!--class form control 3shan yzbt shakl input -->
                  </div>
                  <div class="form-group">
                     <label for="email"><b>Email Address</b></label>
                     <input class="form-control" id="email"  type="email" name="email" required  >
                  </div>
                  <div class="form-group">
                     <label for="Password"><b>Password</b> </label>
                     <input class="form-control"  type="password" name="password" required> <br>
                  </div>
                  <div class="form-group">
                     <label for="Address"><b>Address</b> </label>
                     <input  class="form-control" type="text" name="address" required> <br>
                  </div>
                  <div class="form-group">
                     <label for="Phone number"><b>Phone number</b> </label>
                     <input class="form-control" type="tel" name="phone" required> <br>
                  </div>
                  <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
