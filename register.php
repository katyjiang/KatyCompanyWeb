<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
  </head>

  <body>

    <form action="register_action.php" method="post">
      <div class="imgcontainer">
        <img src="./images/register.JPG" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="first_name"><b>First name</b></label>
        <input type="text" placeholder="First name" name="first_name" required>

        <label for="last_name"><b>Last name</b></label>
        <input type="text" placeholder="Last name" name="last_name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="home_address"><b>Home address</b></label>
        <input type="text" placeholder="Home address" name="home_address">

        <label for="home_phone"><b>Home phone</b></label>
        <input type="text" placeholder="Home phone" name="home_phone">

        <label for="cell_phone"><b>Cell phone</b></label>
        <input type="text" placeholder="Cell phone" name="cell_phone">

        <button type="submit">Register</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
    </form>
  </body>
</html>
