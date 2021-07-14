<?php

  require('./resources/config.php');

?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


    <div class="modal" tabindex="-1" id="newUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">

                  <?php postProducts(); ?>

                  <div class="mb-3">
                      <label for ="name" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="name" name="product_title">
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="price" name="product_price">
                  </div>
                  <div class="mb-3">
                    <label for="quantity" class="form-label">Product Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="product_quantity">
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="product_desc">
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Featured?</label>
                    <input type="text" class="form-control" id="description" name="featured">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="postProduct" class="btn btn-primary">Add Product</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="product-main">
        <button class="btn btn-primary" id="addNew" data-bs-toggle="modal" data-bs-target="#newUser">Add New</button>
        <button class="btn btn-dark" onclick="location.href='admin.php'">Back</button>
    <div class="card-sub-cont">

      <?php deleteProduct(); ?>

      <?php getAdminProducts(); ?>

      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
