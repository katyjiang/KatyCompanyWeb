<?php
    include_once 'config.php';

    function dbConnect()
    {
        $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, SERVER_PORT);
        return $mysqli;
    }

    function dbClose($mysqli) 
    {
      mysqli_close($mysqli);
    }

    function searchByFirstName($firstName)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM user where first_name = '$firstName'");
        return $result;
    }

    function searchByLastName($lastName)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM user where last_name = '$lastName'");
        return $result;
    }

    function searchByEmail($email)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM user where email = '$email'");
        return $result;
    }

    function searchByPhonenum($phoneNum)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM user where home_phone = '$phoneNum' or cell_phone = $phoneNum");
        return $result;
    }

    function searchAll()
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT last_name, first_name, email, home_address, home_phone,cell_phone FROM user");
        return $result;
    }

    function listAllProduct()
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT product_name FROM Product ORDER BY product_id");
        return $result;
    }

    function listOneProduct($product_name)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT product_id, product_name, description, price, product_image FROM Product WHERE product_name='$product_name'");
        return $result;
    }

    function addVisitStatus($email, $product_id)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("INSERT INTO `market_user` (`email`, `product_id`,`time_stamp`) VALUES ('$email', '$product_id',CURRENT_TIMESTAMP())");
        dbClose($mysqli);

    }

    function checkPrevRating($product_id, $email)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT `product_id`, `email` FROM `star_rating` WHERE `product_id` = '$product_id' AND `email`='$email'");
        return $result;
    }

    function avgRating($product_id)
    {

        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT AVG(`rating`) `avg` FROM `star_rating` WHERE `product_id`= '$product_id'");
        $row = mysqli_fetch_assoc($result);
        return $row['avg'];

    }

    function saveRatingStar($product_id, $email, $rating, $comment)
    {              
        $set = checkPrevRating($product_id,$email);
        if(mysqli_num_rows($set) != 0){
            updateRating($product_id, $email, $rating, $comment);
        }else{
            $mysqli = dbConnect();
            $mysqli->query("INSERT INTO `star_rating` (`product_id`, `email`, `rating`, `comment`) VALUES ('$product_id', '$email', '$rating', '$comment')");
            dbClose($mysqli);
        }
        saveAvgRating($product_id, avgRating($product_id));
    }

    function saveAvgRating($id, $avg_rating)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("UPDATE `Product` SET `avg_rating`='$avg_rating' WHERE `product_id` = '$id'");
        dbClose($mysqli); 
    }

    function updateRating($product_id, $email, $rating, $comment)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("UPDATE `star_rating` SET `rating`='$rating',`comment`='$comment' WHERE `product_id` = '$product_id' AND `email` = '$email'");
        dbClose($mysqli);
    }

    function get_product_comments($product_id)
    {
        //file_put_contents('log.txt', $product_id);

        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT email, rating, comment FROM `star_rating` WHERE `product_id`= '$product_id'");

        return $result;
    }

    function get_last_five_visit($email)
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT sub.product_id AS product_id, sub.product_name AS product_name, sub.product_image AS product_image, MAX(sub.time_stamp) AS time_stamp FROM 
                                    (SELECT market_user.product_id, Product.product_name, Product.product_image, market_user.time_stamp 
                                    FROM `Product`RIGHT JOIN `market_user` 
                                    ON market_user.product_id = Product.product_id 
                                    WHERE market_user.email = '$email') AS sub 
                                GROUP BY sub.product_id, sub.product_name, sub.product_image 
                                ORDER BY time_stamp DESC 
                                LIMIT 5");
        return $result;
    }

    function get_most_visit()
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM 
                                    (SELECT COUNT(product_id) number, product_id 
                                    FROM market_user GROUP BY product_id) AS mostVisit 
                                LEFT JOIN `Product` 
                                ON mostVisit.product_id = Product.product_id 
                                ORDER BY number DESC 
                                LIMIT 5");
        return $result;
    }

    function get_high_score()
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT product_name, avg_rating, product_image FROM Product ORDER BY avg_rating DESC LIMIT 5");

        return $result;

    }

    function updateP()
    {
        $mysqli = dbConnect();
        $result = $mysqli->query("DELETE FROM star_rating;");
                $result = $mysqli->query("ALTER TABLE Product MODIFY avg_rating float;");
        return $result;
    }



?>