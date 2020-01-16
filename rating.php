<?php
  require_once('database.php');
  class Rating {

    function save ($product_id, $email, $rating, $comment) {

      try {
        saveRatingStar($product_id, $email, $rating, $comment);
      } catch (Exception $ex) {
        return true;
      }
      return true;
    }

    function avg ($product_id) {
      try {
        return avgRating($product_id);
      } catch (Exception $ex) {
        return 0;
      }
      return 0;
    }
  }
  
?>