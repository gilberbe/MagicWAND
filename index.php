<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="css/stylesheet.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css.map" rel="stylesheet">
<link rel="shortcut icon" href="img/MagicWandIconTrans.png">
</head>
<body>

 <ul>
   <li><a class="active" href="/index">Home</a></li>
   <li><a href="/mission">Mission</a></li>
   <li><a href="/contact">Contact</a></li>
   <ul style="float:right;list-style-type:none;">
      <?php include "logoutMenu.php"; ?> 
   </ul>
 </ul>

 <center>
 	<img id="mainpic" src="img/MagicWandIconTrans.png" alt="Magic Wand">
 </center>

   <div class="row">
  	<div class="col-sm-4 col-xs-6">
  		<center>
      	<p><img src="img/wand.png" class="img-responsive" height="130px" width="130px"></p>
          <h4>What is Magic Wand?</h4>
          <p>Hear our brief overview of what our application is and how we plan on implementing it</p>
          <p><a href="mission.php" class="btn btn-sm btn-primary">Mission >></a></p>
      	</center>
      </div>
      <div class="col-sm-4 col-xs-6">
      	<center>
          <p><img src="img/team.png" class="img-responsive" height="200px" width="200px"></p>
          <h4>More About Us</h4>
          <p>Learn more about our team and how we came together to develop a fully functional application!</p>
          <p><a href="contact.php" class="btn btn-sm btn-primary">About Us >></a></p>
      	</center>
      </div>
      <div class="col-sm-4 col-xs-6">
      	<center>
          <p><img src="img/register.png" class="img-responsive" height="140px" width="140px"></p>
          <h4>Register today for your account!</h4>
          <p>Follow this link to create your free account with us today, No strings attached!</p>
          <p><a href="createAccount.php" class="btn btn-sm btn-primary">Register >></a></p>
      	</center>
      </div>
  </div>
 	<footer class="row">
      <p>This application is not yet finished and is still under production</p>
      <p>All rights reserved</p>
  </footer>
</div><!-- end container -->

<!-- javascript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
