<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
     <h1><img src="img/logo-small.png" style="width: 15%;">
      <a href="index.php" id="body" class="scrollto">LINKING GENERAL</a></h1> 
   </div>


  <nav id="nav-menu-container">
    <ul class="nav-menu">
      <li class="menu-active"><a href="index.php" style="font-size: large;">Home</a></li>
      <li><a href="about.php" style="color: #0099ff; font-size: large;">About Us</a></li>
      <li><a href="car_list.php" style="color: #0099ff; font-size: large;">Our Fleets</a></li>
      <li><a href="contact.php" style="color: #0099ff; font-size: large;">Contact</a></li>
      <li><a href="portfolio.php" style="color: #0099ff; font-size: large;">Gallery</a></li>
      <?php   if(strlen($_SESSION['login'])!=0)
      { 
        ?>
        <?php 
        $email=$_SESSION['login'];
        $sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
          foreach($results as $result)
          {
            ?>
            <li class="menu-has-children"><a href=""><?php echo htmlentities($result->FullName);?></a>
              <ul>
                <li><a href="profile.php">Profile Settings</a></li>
                <li><a href="update_password.php">Update Password</a></li>
                <li><a href="my_booking.php">My Booking</a></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            </li>
            <?php 
          }
        }
      } ?>
    </ul>
  </nav><!-- #nav-menu-container -->
</div>
  </header><!-- #header -->