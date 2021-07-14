<?php

  require('./resources/config.php');

?>

<?php


  $search_value = $_POST["search"];

  $query = query("SELECT * FROM products WHERE product_title LIKE '%{$search_value}%'");
  confirm($query);

  if(mysqli_num_rows($query) > 0){

    while($row = mysqli_fetch_assoc($query)){
      $output = <<<DELIMITER

          <div class="product-main">
          <div class="card-sub-cont align-items">

          <div class="card" style="width: 18rem;">
          <img src="./images/uploads/{$row['product_img']}" class="card-img-top" alt="...">
          <div class="card-body card-b">
            <h4 class="card-title">{$row['product_title']}</h4>
            <h5 class="card-price">{$row['product_price']}PKR</h5>
            <p class="card-text">{$row['product_desc']}</p>
            <a href="#" class="btn btn-primary" style="width:50% !important;">Add to Cart</a>
          </div>
        </div>

            </div>

          </div>
      DELIMITER;

      echo $output;
    }
  }
  else{
    echo "<h2>No Record Found.</h2>";
  }


 ?>
