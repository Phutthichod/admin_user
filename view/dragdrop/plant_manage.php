<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>plan_manage</title>
    <!-- header -->
    <?php require('../public/header.php'); ?>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php require('../public/navbar.php') ?>
      <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require('../public/sidebar.php') ?>
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="page-header">
                    <h3 class="page-title"> user plant </h3>>
                  </div>
                <?php require('drag_drop.php') ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php require('../public/footer.php') ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  </body>
</html>