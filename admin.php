<!DOCTYPE html>
<html>
  <head>
    <title>about</title>
    <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
  </head>

  <body>    
    <form action="admin_page.php" method="post">
      <div class="imgcontainer">
        <img src="katy.jpeg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Admin</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="container">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </body>

</html>
