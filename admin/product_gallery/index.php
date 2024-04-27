<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../include/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../include/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../include/css/font.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include "../include/header.php";
    ?>

    <?php

    include "../include/sidebar.php"
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1 class="m-0 text-dark">Product</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>

                <li class="breadcrumb-item active">Product</li>

              </ol>

            </div><!-- /.col -->

          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" id="product" name="product" method="POST" action="insert.php" onsubmit="return do_insert();">
              <div class="card-body">
                <div class="form-group">
                  <label for="product_name">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name">
                  <br>
                  <span class="error_productname" id="error_productname" name="error_productname" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="product_description">Product Description</label>
                  <textarea class="form-control" rows="10" id="product_description" name="product_description" placeholder="Enter product description"></textarea>
                  <br>
                  <span class="error_productdescription" id="error_productdescription" name="error_productdescription" style="color:red;"></span>
                </div>


                <div class="form-group">
                  <label for="product_image">Product Image</label>

                  <br>

                  <img id="preview_img" src="" alt="your image" style="display: none; height: 250px; width:350px" />
                  <input type="file" id="product_image" name="product_image">

                  <br>

                  <br>
                  <span class="error_productimg" id="error_productimg" name="error_productimg" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="brand_name">Product Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price">
                  <br>
                  <span class="error_productprice" id="error_productprice" name="error_productprice" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="product_category">Select Category</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="category" name="category">
                        <option value='' default>-- select category --</option>

                      </select>
                    </div>
                  </div>
                  <span class="error_categoryname" id="error_category" name="error_category" style="color:red;"></span>
                </div>



                <div class="form-group">
                  <label for="product_brand">Select Brand</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="brand" name="brand">
                        <option value='' default>-- select Brand --</option>

                      </select>
                    </div>
                  </div>
                  <span class="error_brandname" id="error_brand" name="error_brand" style="color:red;"></span>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.content -->
          <br><br>

          <table id="product_tbl" name="product_tbl">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Actions</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </section> <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      <!-- Main Footer -->
      <?php
      include "../include/footer.php";
      ?>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
      <!-- jQuery -->
      <script src="../include/js/jquery.min.js"></script>

      <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

      <!-- Bootstrap -->
      <script src="../include/js/bootstrap.bundle.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="../include/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../include/js/adminlte.js"></script>



      <!-- OPTIONAL SCRIPTS -->
      <script src="../include/js/demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

      <!-- PAGE PLUGINS -->
      <!-- jQuery Mapael -->
      <script src="../include/js/jquery.mousewheel.js"></script>
      <script src="../include/js/raphael.min.js"></script>
      <script src="../include/js/jquery.mapael.min.js"></script>
      <script src="../include/js/usa_states.min.js"></script>
      <!-- ChartJS -->
      <script src="../include/js/Chart.min.js"></script>

      <!-- PAGE SCRIPTS -->
      <script src="../include/js/dashboard2.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script>
        $(document).ready(function() {

          $('#product_tbl').DataTable({

            "bProcessing": true,
            "sAjaxSource": "product_data.php",
            "aoColumns": [{
                data: "product_id",
                render: function(data, type, full, meta) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '">' + (meta.row + 1) + '</span>';
                  }
                }
              },
              {
                data: "product_name",
                render: function(data, type, row) {
                  
                  return '<b>' + data + '</b>';
                }
              },
              {
                data: "product_img",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<img src="' + data + '" style="height:100px;width:200px;"/>';
                  }
                }
              },
              {
                data: "product_price",
                render: function(data, type, row) {
                  return '<b>' + data + '</b>';
                }
              },
              {
                data: "cat_name",
                render: function(data, type, row) {
                  return '<b>' + data + '</b>';
                }
              },
              {
                data: "brand_name",
                render: function(data, type, row) {
                  return '<b>' + data + '</b>';
                }
              },
              {
                data: "product_id",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<button class="btn btn-warning btnEdit" data-id="' + data + '"><i class="fas fa-edit"></i></button>' + '  ' + '<button class="btn btn-danger btnRemove" data-id="' + data + '"><i class="fas fa-trash"></i></button>';
                  }
                }
              },
              {
                data: "is_active",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else if (data == 1) {
                    return '<button class="btn btn-success btnS">Active</button><br><label>click to disable</label>';
                  } else {
                    return '<button class="btn btn-danger btnD">Disabled</button><br><label>click to activate</label>';
                  }
                }
              }


            ]


          });


        });


        $("#product").validate({
          rules: {
            product_name: {
              required: true,
            },
            product_description: {
              required: true,
            },
            product_image: {
              required: true,
            },
            product_price: {
              required: true,
            },
            category: {
              required: true,
            },
            brand: {
              required: true,
            }
          },
          messages: {
            product_name: {
              required: "Please enter your product name*",
            },
            product_image: {
              required: "Please enter your product image*",
            },
            product_desc: {
              required: "Please enter your product description*",
            },
            product_price: {
              required: "Please enter your product price*",
            },
            category: {
              required: "Please select category*",
            },
            brand: {
              required: "Please select brand*",
            }
          },
          errorPlacement: function(error, element) {
            if (element.attr("id") == "product_name") {
              $("#error_productname").html(error);
            } else if (element.attr("id") == "product_image") {
              $("#error_productimg").html(error);
            } else if (element.attr("id") == "product_description") {
              $("#error_productdescription").html(error);
            } else if (element.attr("id") == "category") {
              $("#error_category").html(error);
            } else if (element.attr("id") == "brand") {
              $("#error_brand").html(error);
            } else if (element.attr("id") == "product_price") {
              $("#error_productprice").html(error);
            }
          }

        });

        function do_insert() {
          // Get form
          var form = $('#product')[0];

          // Create an FormData object 
          var data = new FormData(form);

          if ($("#product").valid()) {

            $.ajax({
              type: 'post',
              enctype: 'multipart/form-data',
              url: 'insert.php',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 800000,
              success: function(response) {
                if (response == "success") {
                  $('#product_tbl').DataTable().ajax.reload();
                  swal("New product added successfully!", "", "success");
                } else {
                  alert("Please fill form correctly!");
                }
              }
            });
          }

          return false;
        }

        $.ajax({
          type: "POST",
          url: "categories_data.php",
          data: {}
        }).done(function(data) {
          $("#category").append(data);
        });

        $.ajax({
          type: "POST",
          url: "brands_data.php",
          data: {}
        }).done(function(data) {
          $("#brand").append(data);
        });


        $(document).on('click', '.btnEdit', function() {

          var product_id = $(this).data("id");

          window.location.href = "edit.php?id=" + product_id;

        });

        $(document).on('click', '.btnRemove', function() {

          var product_id = $(this).data("id");

          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {

              $.ajax({
                type: 'post',
                url: 'delete.php',
                data: {
                  product_id: product_id
                },
                success: function(response) {
                  if (response == "success") {
                    $('#product_tbl').DataTable().ajax.reload();
                    swal("Product removed successfully!", "", "success");
                  } else {
                    swal("Something went wrong, Try again!", "", "error");
                  }
                }
              });

            }
          })

        });


        $(document).on('change', '#product_image', function() {

          var ext = $('#product_image').val().split('.').pop().toLowerCase();

          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {

            $("#product_image").val('');
            $('#preview_img').css("display", "none");
            $('#preview_img').attr("src", "");
            swal('invalid extension!', "", "error");

          } else {

            $('#preview_img').css("display", "block");
            $('#preview_img').attr("src", URL.createObjectURL(event.target.files[0]));
          }

        });

        $(document).on('click', '.btnS', function(e) {

          var $row = $(this).closest("tr"), // Finds the closest row <tr> 
            $tds = $row.find("td:eq(0)");

          var product_id = $tds.find('span.btnId').toArray().map(span => $(span).attr('data-id'));

          var p_id = product_id.toString();

          $.ajax({
            type: 'post',
            url: 'visibility.php',
            data: {
              p_id: p_id
            },
            success: function(response) {
              if (response == "disabled") {
                $('#product_tbl').DataTable().ajax.reload();
                swal("Product disabled successfully!", "", "success");
              } else if (response == "activated") {
                $('#product_tbl').DataTable().ajax.reload();
                swal("Product activated successfully!", "", "success");
              } else {
                swal("Something went wrong, Try again!", "", "error");
              }
            }
          });

        });

        $(document).on('click', '.btnD', function(e) {

          var $row = $(this).closest("tr"), // Finds the closest row <tr> 
            $tds = $row.find("td:eq(0)");

          var product_id = $tds.find('span.btnId').toArray().map(span => $(span).attr('data-id'));

          var p_id = product_id.toString();

          $.ajax({
            type: 'post',
            url: 'visibility.php',
            data: {
              p_id: p_id
            },
            success: function(response) {
              if (response == "disabled") {
                $('#product_tbl').DataTable().ajax.reload();
                swal("Product disabled successfully!", "", "success");
              } else if (response == "activated") {
                $('#product_tbl').DataTable().ajax.reload();
                swal("Product activated successfully!", "", "success");
              } else {
                swal("Something went wrong, Try again!", "", "error");
              }
            }
          });

        });



        var url = window.location.pathname;
        var str = url;


        var arr = str.split('/');

        var filename = arr[arr.length - 2];

        if (filename == "product") {
          $("#products_sb").css({
            "background-color": "#007bff",
            "color": "#fff"
          });
        }
      </script>
</body>

</html>