<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <title>Stellar Admin</title>
  <!-- header -->
  
    <?php require('../public/header.php'); ?>
    <!-- <link rel="stylesheet" href="style.css"> -->
  
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
        <h3>User Manangement</h3>
        
        
        <div class="card shadow">
            <div class="card-body">
              


           


<table id="example" class="table table-dark" style="width:100%">

                   
                  </table>
                

            </div>
          </div>




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
<!-- <script type="text/javascript" src="js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  /*function deletefunc(_id , _name) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });

  }*/

  /* function delete_ajax(_id) {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         window.location.href = './user_manage.php';
       }
     };
     xhttp.open("POST", "delete.php", true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(`id=${_id}`);
   }*/


  $(document).ready(function() {
 
        let user_id;
        let name;
        let surname;
        let email;
        let permission;
        let status;
        $('.btn-outline-danger').click(function(){
          delClick();
        })
        function delClick(){
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
});
        }
        $("#edit_modal").click(function() {
              //$(this).attr("data-toggle", "modal")
              user_id = $(this).attr("d-user_id");
              name = $(this).attr("d-name");
              surname = $(this).attr("d-surname");
              email = $(this).attr("d-email");
              permission = $(this).attr("d-permission");
              status = $(this).attr("d-status");

              $("#e_user_id").val(user_id);
              $("#e_name").val(name);
              $("#e_surname").val(surname);
              $("#e_email").val(email);
              $("#e_permission").val(permission);
              $("#e_status").val(status);


              console.log(name);
        })
        
    $('#example').DataTable();
    

  })
</script>