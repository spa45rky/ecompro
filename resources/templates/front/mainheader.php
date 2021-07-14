<?php

  require('./resources/config.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </script>
    <title></title>
  </head>

  <script type="text/javascript">

  $(document).ready(function(){
    $("#search").on("keyup", function(){
      var search_term = $(this).val();

      $.ajax({
        url: "ajax-live-search.php",
        type: 'POST',
        data: {search:search_term},
        success: function(data) {
          $("#display").html(data);
        }
      })
    });
  });

  </script>


  <body>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">HardWare Point</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php if($_SESSION['username'] == "admin") { ?>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./admin.php">Admin</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="authentication.php" tabindex="-1" aria-disabled="true">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['username']; ?></a>
              </li>
            </ul>

          <?php }else if($_SESSION['username'] !== "admin"){ ?>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" href="./shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="authentication.php" tabindex="-1" aria-disabled="true">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['username']; ?></a>
              </li>
            </ul>

            <?php

          } ?>
            <form class="d-flex">
              <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <a href="./logout.php" class="logout m-lg-3 btn-warning">Log out</a>
          </div>
        </div>
      </nav>
