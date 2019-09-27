<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- header -->
    <link rel='stylesheet' href='./colorselect/spectrum.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="dist/bootstrap-colorselector.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/docs.css" />
    <!-- +++++++++++++++++++++++ -->
  


 
   

   



    <!-- <link rel="stylesheet" href="theme/assets/css/shared/style.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <style>
    .dot {
        height: 25px;
        width: 25px;
        border-radius: 50%;
        display: inline-block;
    }

    .picker {
        border-radius: 5px;
        width: 40px;
        height: 40px;
        cursor: pointer;
        border: thin solid #eee;
    }

    /*Styling for errors on form*/
    .form_error span {
        width: 80%;
        height: 35px;
        margin: 3px 10%;
        font-size: 1.1em;
        color: #D83D5A;
    }

    .form_error input {
        border: 1px solid #D83D5A;
    }

    .buttonText {
        color: black;
    }
    
    </style>
    <?php require('../public/header.php'); ?>
    <link rel="stylesheet" href="style.css">
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
                    
                <div class="grid-item">
                        <h3>Plant Manangement</h3>
                        <button type="button" class="btn btn-primary btn-icon-text btn-add" data-target="#addplantmodal" data-toggle="modal">
                        <i class="icon-plus btn-icon-prepend" ></i>create plant</button>
                    </div>    
                    <div class="card">
                        <div class="card-body shadow">
                        <?php include("./connectdb.php"); ?>
                        <?php
                        $sql="SELECT * FROM plant,color 
                        WHERE plant.p_color=color.p_color";
                        $result=$con->query($sql);

                        $sql_c ="SELECT * FROM color";
                        $result_c=$con->query($sql_c);

                        $sql_c1 ="SELECT * FROM color";
                        $result_c1=$con->query($sql_c1);

                        ?>

                        <table id="example"  class="table table-dark table-responsive"  id="tableplant" style="text-align: center; width:100%">
                                    <colgroup>
                                        <col width=13%>
                                        <col width=13%>
                                        <col width=13%>
                                        <col width=7%>
                                        <col width=7%>
                                        <col width=10%>
                                        <col width=10%>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold"> Species </th>
                                            <th class="font-weight-bold"> Genus </th>
                                            <th class="font-weight-bold"> Alias </th>
                                            <th class="font-weight-bold"> Color </th>
                                            <th class="font-weight-bold"> Icon </th>
                                            <th class="font-weight-bold"> Settng Detail </th>
                                            <th class="font-weight-bold"> Manage </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){  ?>
                                        <tr>
                                            <td> <?php echo $row["p_species"]; ?> </td>
                                            <td> <?php echo $row["p_genus"]; ?> </td>
                                            <td> <?php echo $row["p_alias"]; ?> </td>
                                            <!-- <input type="hidden" name="p_id" id="p_id1"
                                                        value="<?php echo $row["p_id"]; ?>"> -->
                                                        <td>
                                                <span class="dot"
                                                    style="background-color: <?php echo $row["code_color"]; ?>"></span>
                                            </td>
                                            <td>
                                                <img src="./tomato/<?php echo $row["p_icon"];?>"
                                                    style="width: 40px; height: 40px;">
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-square btn-sm active" title="Passport"
                                                    data-toggle="tooltip">
                                                    <b>P
                                                </a>
                                                <a class="btn btn-danger btn-square btn-sm active" title="Charactor"
                                                    data-toggle="tooltip">
                                                    <b>C
                                                </a>
                                                <a class="btn btn-warning btn-square btn-sm active" title="DNA"
                                                    data-toggle="tooltip">
                                                    <b>D
                                                </a>
                                            </td>
                                            <td>

                                                <button class="btn btn-outline-warning btn-fw edit_plant" style="min-width: 100px;"
                                                    data-target="#editplantmodal" data-toggle="modal"
                                                   id=<?php echo $row["p_id"];?> 
                                                    d-id="<?php echo $row["p_id"]; ?>"
                                                    d-species="<?php echo $row["p_species"]; ?>"
                                                    d-genus="<?php echo $row["p_genus"]; ?>"
                                                    d-alias="<?php echo $row["p_alias"]; ?>"
                                                    d-color="<?php echo $row["p_color"]; ?>"
                                                    d-icon="<?php echo $row["p_icon"]; ?>"
                                                    d-description="<?php echo $row["p_description"]; ?>">edit
                                                </button>
                                                <!-- delete_1(<?php echo $row["p_id"]; ?>) -->
                                                <button class="btn btn-outline-danger btn-fw" style="min-width: 100px;"
                                                    onclick="delfunction('<?php echo $row["p_alias"]; ?>' , '<?php echo $row["p_id"] ?>')">
                                                    delete
                                                </button>
                                                <button class="btn btn-outline-info btn-fw" style="min-width: 100px;">
                                                    export
                                                </button>

                                            </td>
                                        </tr>
                                        <?php
                                             }
                                            }else{
                                                echo "0 row";
                                            }
                                            
                                                  $con->close(); 
                                            ?>


                                    </tbody>

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

      <!-- modal addplant -->
      <div id="addplantmodal" class="modal fade" style="background-color: rgba(0,0,0,0);">
                <form method="post" id="form1" name="form1" class="modal-dialog modal-lg onSubmit=" return check1()"
                    action="./process_add.php" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3E49BB">
                            <h4 class="modal-title" style="color:white">Add Plant</h4>
                        </div>
                        <div class="modal-body" id="addModalBody">
                            <div class="container">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Species </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_species" value=""
                                            placeholder="Please enter the spedies" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Genus </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_genus" value=""
                                            placeholder="Please enter the genus" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Alias </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_alias" value=""
                                            placeholder="Please enter the alias" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Color</span>
                                    </div>

                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                                        <section id="colorselectors">


                                            <select id="colorselector_1" class="form-control" name="p_color">
                                                <?php if($result_c->num_rows>0){
                                            while($row=$result_c->fetch_assoc()){  ?>

                                                <option value="<?php echo $row["p_color"]; ?>"
                                                    data-color="<?php echo $row["code_color"]; ?>"></option>
                                                <?php
                                            }
                                            }else{
                                                echo "0 row";
                                            }
                                            
                                                $con->close(); 
                                            ?>

                                            </select>

                                            </select>


                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Icon</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <div class="form-group">

                                            <input name="p_icon" type="file" class="filestyle"
                                                data-buttonText="Select a File">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Description</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_description" value=""
                                            placeholder="Please enter the description" maxlength="50">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirm</button>
                            <button type="button" class="btn btn-danger" onclick="closeForm()"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- end modal addplant-->

            <!-- modal editplant -->
            <div id="editplantmodal" class="modal fade" style="background-color: rgba(0,0,0,0);">
                <form method="post" id="form2" name="form2" class="modal-dialog modal-lg " onSubmit="return check2()"
                    action="./process_update.php">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#ffaf00">
                            <h4 class="modal-title" style="color:white">Edit Plant</h4>
                        </div>
                        <div class="modal-body" id="editModalBody" style="background-color:#FCFDFF">
                            <div class="container">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Species </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_species" id="p_species" value=""
                                            placeholder="Please enter the spedies" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Genus </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_genus" id="p_genus" value=""
                                            placeholder="Please enter the genus" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Alias </span>
                                        <span style="color:#ff4040">*</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_alias" id="p_alias" value=""
                                            placeholder="Please enter the alias" maxlength="50">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Color</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">


                                        <select id="colorselector2" class="form-control" name="p_color">

                                        </select>


                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Icon</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <div class="form-group">

                                            <input name="p_icon" id="p_icon" type="file" class="filestyle"
                                                data-buttonText="Select a File">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="p_id" id="p_id" value="">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                                        <span>Description</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="p_description" id="p_description"
                                            value="" placeholder="Please enter the description" maxlength="50">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="confirmedit" id="confirmedit"
                                class="btn btn-success">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </form>
            </div>
  </body>
</html>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    

    <script src='./colorselect/spectrum.js'></script>

    <script type="text/javascript" src="./addphoto/bootstrap-filestyle.min.js"> </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>


    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/bootstrap-colorselector.min.js"></script>

    <!-- table -->

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
     $('#example').DataTable();
let t = "";

// $(document).ready(function() {
//     addColor()
//     console.log(t);
//     // $(".addplant").click(function(){
//     //     alert($("#colorselector_1").attr("name"));


//     // })
// })
</script>
<script>
/*$(document).ready(function() {
    $('[data-toggle=tooltip]').tooltip({
        boundary: 'window',
        trigger: 'hover'
    });
});*/
</script>
<script>
$(document).ready(function(){
    addColor();
let p_id;
let p_species;
let p_genus;
let p_alias;
let p_color;
let p_icon;
let p_description;
$(".edit_plant").click(function() {
    //$(this).attr("data-toggle", "modal")
    // console.log('edit');
    p_id = $(this).attr("d-id");
    p_species = $(this).attr("d-species");
    p_genus = $(this).attr("d-genus");
    p_alias = $(this).attr("d-alias");
    p_color = $(this).attr("d-color");
    p_icon = $(this).attr("d-icon");
    p_description = $(this).attr("d-description");

    $("#p_id").val(p_id);
    $("#p_species").val(p_species);
    $("#p_genus").val(p_genus);
    $("#p_alias").val(p_alias);
    $("#p_color").val(p_color);
    $("#p_description").val(p_description);
    //$("#p_icon").val(p_icon);

    console.log(p_color);
 
   
    $("#colorselector2").colorselector("setValue", p_color);
    //$('#colorselector_2').val('p_color').prop('selected','selected');
    //$("option[data-color='#6495ED']").attr("selected","selected");
})
})

</script>
<script language="javascript">
function check1() {
    console.log('tt');
    if (document.form1.p_species.value == "" || document.form1.p_genus.value == "" || document.form1.p_alias.value ==
        "" || document.form1.p_color.value == "") {
        alert('Please complete the information.');
        document.form1.p_species.focus();
        return false;
    } else {
        return true;
    }

}

function check2() {
    console.log('tt');
    if (document.form2.p_species.value == "" || document.form2.p_genus.value == "" || document.form2.p_alias.value ==
        "" || document.form2.p_color.value == "") {
        alert('Please complete the information.');
        document.form2.p_species.focus();
        return false;
    } else {
        return true;
    }

}
</script>
<script>
// let t = "";

// $(document).ready(function() {
//     addColor()
//     console.log(t);
//     // $(".addplant").click(function(){
//     //     alert($("#colorselector_1").attr("name"));


//     // })
// })

function delete_1(_id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = 'plant_manage.php';
        }
    };
    xhttp.open("POST", "process_del.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${_id}`);
}

function addColor() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            //   console.log(JSON.parse(JSON.stringify(this.responseText)));
            let text = "";
            for (index in data) {
                console.log(1);
                let value = data[index].p_color;
                let color = data[index].code_color;
                let title = "title";
                $('#colorselector2').append(`<option value=${value} data-color=${color}>pinto</option>`);
                
        }
        $('#colorselector2').colorselector();
   
               // $('#colorselector_2').colorselector(data[index].p_color,data[index].code_color,"title")
        
            }
            // for (index in data) {
            //     $('#colorselector_2').append($('<option>', {
            //         value: `${data[index].p_color}`,
            //         text: `${data[index].code_color}`
            //     }));
            // }
            // console.log(text);
            // $('#colorselector_2').append("<option>ssss</option>");




        
    };
    xhttp.open("POST", "datacolor.php", true);
    xhttp.send();

}


function delfunction(_alias, _id) {

    swal({
            title: "Do you want to delete",
            text: `${_alias} ?`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-secondary",
            confirmButtonText: "confirm",
            cancelButtonText: "cancel",
            closeOnConfirm: false,
            closeOnCancel: function() {
                $('[data-toggle=tooltip]').tooltip({
                    boundary: 'window',
                    trigger: 'hover'
                });
                return true;
            }
        },
        function(isConfirm) {
            if (isConfirm) {

                swal({

                    title: "delete success",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "ok",
                    closeOnConfirm: false,

                }, function(isConfirm) {
                    if (isConfirm) {
                        delete_1(_id)
                    }

                });
            } else {

            }
        });

}
</script>
<script>
$(function() {

    window.prettyPrint && prettyPrint();

    $('#colorselector_1').colorselector();
    $('#colorselector_2').colorselector({
        callback: function(value, color, title) {
            $("#colorValue").val(value);
            $("#colorColor").val(color);
            $("#colorTitle").val(title);
        }
    });

    $("#setColor").click(function(e) {
        $("#colorselector_2").colorselector("setColor", "#008B8B");
    })

    $("#setValue").click(function(e) {
        $("#colorselector_2").colorselector("setValue", 18);
    })

});
</script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
        '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();
</script>