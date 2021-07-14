<?php

  function redirect($location){
    return header("location: $location");
  }


  function query($sql_query){

    global $connection;

    return mysqli_query($connection, $sql_query);
  }


  function confirm($result){

    global $connection;

    if(!$result) {

      die("QUERY FAILED" . mysqli_error($connection));
    }

  }

  function fetch_array($result){

    return mysqli_fetch_array($result);

  }


  function loginSystem(){

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = query("SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0){

          echo "<span style='color:red; font-size: 10px;'>Passwords/Email dont match</span>";

        }
        else{
          while($row = fetch_array($query)){

            $db_usrname = $row['username'];
            $db_email = $row['email'];
            $db_password = $row['password'];

          }

          if($email == $db_email && $password == $db_password){

            $_SESSION['username'] = $db_usrname;

            redirect("index.php");
          }
        }

    }

  }


  function registerSystem(){

    if(isset($_POST['register'])){

      $usrname = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      $query = query("SELECT * FROM users WHERE email = '$email'");

      confirm($query);

      $rows = mysqli_num_rows($query);

      if($rows > 0){
        echo "<span style='color:red; font-size: 10px;'>Email already exists</span>";
      }
      else{
        if($password == $confirm_password){

          $query_in = query("INSERT INTO users(username, email, password) VALUES('$usrname', '$email', '$password')");

          confirm($query_in);

          redirect("authentication.php");
        }

          else{
            echo "<span style='color:red; font-size: 10px;'>Passwords dont match</span>";
        }
        }

    }
  }


  function postProducts() {

    if(isset($_POST['postProduct'])){

      $product_title = $_POST['product_title'];
      $product_desc = $_POST['product_desc'];
      $product_price = $_POST['product_price'];
      $product_quantity = $_POST['product_quantity'];
      $product_img = $_FILES['image']['name'];
      $product_temp_img = $_FILES['image']['tmp_name'];
      $featured = $_POST['featured'];

      move_uploaded_file($product_temp_img, "./images/uploads/$product_img");

      $query = query("INSERT INTO products(product_title, product_desc, product_price, product_quantity, product_img, featured) VALUES('$product_title', '$product_desc', '$product_price', '$product_quantity', '$product_img', '$featured')");

      confirm($query);

      echo "<span style='color:green; font-size: 10px;'>Product Uploaded Successfully</span>";

    }

  }


  function getProducts() {

    $query = query("SELECT * FROM products");

    confirm($query);

    while($row = fetch_array($query)){

      $product = <<<DELIMITER
          <div class="card" style="width: 18rem;">
          <img src="./images/uploads/{$row['product_img']}" class="card-img-top" alt="...">
          <div class="card-body card-b">
            <h4 class="card-title">{$row['product_title']}</h4>
            <h5 class="card-price">{$row['product_price']}PKR</h5>
            <p class="card-text">{$row['product_desc']}</p>
            <a href="#" class="btn btn-primary" style="width:50% !important;">Add to Cart</a>
          </div>
        </div>
      DELIMITER;

      echo $product;

    }

  }

  function getAdminProducts() {

    $query = query("SELECT * FROM products");

    confirm($query);

    while($row = fetch_array($query)){

      $product = <<<DELIMITER
          <div class="card" style="width: 18rem;">
          <img src="./images/uploads/{$row['product_img']}" class="card-img-top" alt="...">
          <div class="card-body card-b">
            <h4 class="card-title">{$row['product_title']}</h4>
            <h5 class="card-price">{$row['product_price']}PKR</h5>
            <p class="card-text">{$row['product_desc']}</p>
            <a href="adminproduct.php?id={$row['product_id']}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      DELIMITER;

      echo $product;
    }
  }

  function deleteProduct(){

    if(isset($_GET['id'])){

      $product_id = $_GET['id'];

      $query = query("DELETE FROM products WHERE product_id = '$product_id'");

      confirm($query);

      echo "<span style='color:red; font-size: 10px;'>Product Successfully Deleted</span>";

    }
  }


  function getUsers() {

    $query = query("SELECT * FROM users");

    confirm($query);

    while($row = fetch_array($query)){

      $users = <<<DELIMITER

          <div class="container-fluid">
              <div class="offset-2 col-8">
                  <table class="table table-dark table-responsive-lg">
                  <thead>
                    <tr>
                      <th scope="col">User Id</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{$row['user_id']}</td>
                          <td>{$row['username']}</td>
                          <td>{$row['email']}</td>
                          <td><a href="adminuser.php?id={$row['user_id']}" class="btn btn-danger user-del">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
              </div>
          </div>

      DELIMITER;

      echo $users;


    }

  }


  function deleteUser(){
    if(isset($_GET['id'])){

      $usr_id = $_GET['id'];

      $query = query("DELETE FROM users WHERE user_id = '$usr_id'");

      confirm($query);

      echo "<span style='color:red; font-size: 10px;'>User Successfully Deleted</span>";

    }
  }

  function getFeaturedProducts(){

    $query = query("SELECT * FROM products WHERE featured='yes'");

    confirm($query);

    while($row = fetch_array($query)){

      $product = <<<DELIMITER
          <div class="card" style="width: 18rem;">
          <img src="./images/uploads/{$row['product_img']}" class="card-img-top" alt="...">
          <div class="card-body card-b">
            <h4 class="card-title">{$row['product_title']}</h4>
            <h5 class="card-price">{$row['product_price']}PKR</h5>
            <p class="card-text">{$row['product_desc']}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      DELIMITER;

      echo $product;

  }

}






 ?>
