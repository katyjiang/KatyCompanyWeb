<!DOCTYPE html>
<html>
  <head>
    <title>about</title>
    <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
  </head>

  <body>

    <form action="search_action.php" method="post">
      <div class="imgcontainer">
        <img src="katy.jpeg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="first_name"><b>First Name</b></label>
        <input type="text" placeholder="Enter first name" name="first_name" >

        <label for="last_name"><b>Last Name</b></label>
        <input type="text" placeholder="Enter last name" name="last_name" >

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" >
       
        <label for="phone_number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="phone_number" >
       
        <button type="submit">Search</button>

      </div>
    </form>
  </body>

</html>
