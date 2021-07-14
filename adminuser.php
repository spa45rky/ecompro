<?php

  require('./resources/config.php');

?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <?php deleteUser(); ?>

    <div class="users-main">
        <button class="btn btn-dark" onclick="location.href='admin.html'">Back</button>

          <?php getUsers(); ?>


    </div>
    <script src="./js/adminuser.js"></script>
</body>

</html>
