<?php

  require('./resources/config.php');

?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

      <div class="main-home-container">

        <!-- bootstrap cards -->
        <a href="./adminproduct.php">
        <div class="card" style="width: 18rem; height: 15rem;">
          <img src="./images/products-icon.svg" class="card-img-top" alt="Products">
          <h4>Product Management</h4>
        </div>
        </a>

        <a href="./adminuser.php">
        <div class="card" style="width: 18rem; height: 15rem;">
          <img src="./images/users-icon.svg" class="card-img-top" alt="User Management">
          <h4>User Management</h4>
        </div>
        </a>
      </div>
    </div>
</body>

</html>
