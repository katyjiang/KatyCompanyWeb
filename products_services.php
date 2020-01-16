
<!DOCTYPE html>
<html>
    <head>
        <title>Katy's Sweets</title>
        <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
    </head>

    <body>
    	
        <?php 
            include_once './mypage.php'; 
            session_start(); 
            renderHeader(); 
            renderRegisterLogin(); 
        ?>

        <h2 align="center">Menu</h2>

        <?php
	       include_once './database.php';
	       $result = [];
	       $result = listAllProduct();

            while($row = mysqli_fetch_row($result)) {
        	   foreach ($row as $column) {
                    echo "<p align=\"center\"><a href='pro_details.php?product_name=";
                    echo $column;
                    echo "'>";
                    echo $column;
                    echo "</a></p>";
                }
            }
        ?>
    </body>
</html>
