<?php
  function renderHeader(){
    echo "<table style=\"text-align:center;\">
  		<tr style=\"text-align:center;\">
				<th style=\"text-align:center;\"><a href='index.php'>Home</a></th>
    		<th style=\"text-align:center;\"><a href='about.php'>About</a></th>
    		<th style=\"text-align:center;\"><a href='products_services.php'>Products</a></th>
    		<th style=\"text-align:center;\"><a href='news.php'>News</a></th>
    		<th style=\"text-align:center;\"><a href='contacts.php'>Contacts</a></th>
        <th style=\"text-align:center;\"><a href='popular_products.php'>What's Popular</a></th>
        <th style=\"text-align:center;\"><a href='market_place.php'>Market Place</a></th>
  		</tr>
		</table>";
	}

  function renderRegisterLogin(){
    if(isset($_SESSION['valid_user_email'])){
      $useremail = $_SESSION['valid_user_email'];

      echo "<p align=\"center\">$useremail&nbsp;<a href='my_account.php'>&nbsp;&nbsp;My Account</a><a href='logout.php'>&nbsp;&nbsp;&nbsp;Logout</a></p>";
    }else{
      echo "<p align=\"center\"><a href='fb_login.php'>Login</a></p>";
    }
  }

  function visitTracker(){
    echo "<p><a href='last_visit.php'>History Visits</a>/<a href='most_visit.php'>Popular 5</a></p>";
  }

  function marketTop(){
       echo " 
      <table align=\"center\">
      <tr align=\"center\">
        <th align=\"center\"><a href='topOfEachCompany.php'>What's Popular of Our Friends</a></th>
        <th align=\"center\"><a href='topOfMarket.php'>Hottest Product of Our Market</a></th>
        <th align=\"center\"><a href='recentMarketVisit.php'>Recently Visits within Market</a></th>
      </tr>
    </table>
    <p align=\"left\"><a href ='index.php'>Back to Katy.Co </a></p>";
  }

  function backToMarket(){
    echo " <p align=\"left\"n><a href = 'market_place.php'>Back to Market Place</a></p>";
  }
?>