<?php

  error_reporting(0);

  session_start();

  include("database.php");

  $query="SELECT * FROM shouts ORDER BY id DESC";

  $shouts=mysqli_query($con, $query);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project: ShoutIt Shout Box</title>
    <link rel="stylesheet" href="style.css" type="text/css">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container-fluid">

      <div class="row topRow">

        <h1> SHOUT BOX </h1>
          <p class="lead"> Want to shout your heart out? This is the right place to do that. </p>

        <div class="col-md-6 col-md-offset-3 backWhite">

          

          <div class="shouts">

            <ul class="list-group">

              <?php 
                
                while($row=mysqli_fetch_assoc($shouts))
                {
              ?>

                <li class="list-group-item list-group-item-success shout"><span class="text-muted"> <?php echo $row['time'] ?> </span> - <strong><?php echo $row['username'] ?></strong>: <em> <?php echo $row['message'] ?> </em></li>




              <?php } ?>
              
              
            </ul>

          </div>

          <form method="post" action="process.php">

                <div class="form-group">


          
                  <input type="text" class="form-control" placeholder="Name" required="true" name="username" value="<?php echo $_SESSION['name']; ?>">

                  
                </div>

                <div class="form-group">

                  <input type="text" class="form-control" placeholder="Message" required="true" name="message">

                </div>
                

                <input type="submit" class="btn btn-success btn-lg" name="submit" value="Shout Out!">



          </form>

        </div>


      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>