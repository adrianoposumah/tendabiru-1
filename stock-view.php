<?php 

session_start();
	// cek apakah yang mengakses halaman ini sudah login

	if($_SESSION['level']==""){
		header("location:login.php?pesan=login_dulu_kakak^^");
	}
    $_SESSION['table'] = 'products';
    $_SESSION['redirect_to'] = 'stock.php';
    //$user = isset($_SESSION['products']) ? $_SESSION['products'] : null;
    $products = include('show.php');
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>tendaBiru - Stock</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="scss/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        .list-stock-Field {
        flex: 0 0 100%;
        padding: 20px;
        }

        .stocks {
        margin-right: 2rem;
        }

        .stocks table,
        th,
        td {
        border: 1px solid #00a6ffc0;
        border-collapse: collapse;
        }

        .stocks table {
        margin-left: 1rem;
        width: 100%;
        }

        .stocks table th {
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        background-color: #e7e7e7;
        text-align: center;
        }

        .stocks table td {
        font-size: 1rem;
        text-transform: capitalize;
        text-align: center;
        }

        .btn-addstock {
            margin-right: 1rem;
        }
        .product-image img {
        width: 150px; 
        height: 150px;
        object-fit: cover; 
        border-radius: 50%;
        }

        .product-description {
        max-width: 200px; /* Adjust the value as needed */
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        word-wrap: break-word;
        }

        @media only screen and (min-width: 600px) {
        .stocks table th {
            font-size: 1.2rem;
        }
        .stocks table td {
            font-size: 1rem;
        }
        }

        /* Media query for small devices like phones (portrait) */
        @media only screen and (max-width: 599px) {
        .container-fluid {
            margin-left: -1rem;
        }
        .stocks table th {
            font-size: 0.6rem;
        }
        .stocks table td {
            font-size: 0.5rem;
        }

        .product-image img {
        width: 50px; 
        height: 50px;
        object-fit: cover; 
        border-radius: 50%;
        }
        .product-description {
            display: none;
        } 
        .description-title {
            display: none;
        }

        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">tenda <sup>Biru</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Stock -->
            <li class="nav-item">
                <a class="nav-link" href="stock.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Stock</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="stock.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Stock View</span></a>
            </li>

            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link" href="orders.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Orders</span></a>
            </li>

                 <!-- Nav Item - Delivery -->
                 <li class="nav-item">
                <a class="nav-link" href="delivery.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Delivery</span></a>
            </li>

                 <!-- Nav Item - Inventory Report -->
                 <li class="nav-item">
                <a class="nav-link" href="inventoryReport.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory Report</span></a>
            </li>

                 <!-- Nav Item - Daily usage -->
                 <li class="nav-item">
                <a class="nav-link" href="dailyUsage.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daily usage</span></a>
            </li>

                <!-- Nav Item - User Management -->
                 <li class="nav-item">
                <a class="nav-link" href="usermanagement.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="list-stock-Field">
                        <div class="content-title d-flex justify-content-between align-items-center">
                            <h2 href="">
                                <i class="fas fa-fw fa-table"></i>List Produk
                            </h2>
                        </div>
                        <div class="section_content">
                            <div class="stocks">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th class="description-title">Deskripsi</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Flag</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($products as $index => $product){ ?>
                                            <tr>
                                                <td><?= $index +1 ?></td>
                                                <td class="firstname product-image">
                                                    <img src="uploads/products/<?= $product['image'] ?>" alt="">    
                                                </td>
                                                <td class="lastname"><?= $product['productName'] ?> </td>
                                                <td class="username product-description"><?= $product['description'] ?></td>
                                                <td class="level">100</td>
                                                <td>Kritis : Sedang : Banyak</td>
                                                <td>Tersedia : Tidak Tersedia</td>
                                                <!-- <td ></td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Add Modal -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->

    <!-- Modal Notification -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalNotificationTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalNotificationMessage">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Script -->
    <script src="js/script.js"></script>
    <script>
    function Script() {
    var vm = this;

    this.initialize = function () {
        this.registerEvents();
    };

    this.registerEvents = function () {
        document.addEventListener('click', function (e) {
            var targetElement = e.target;
            var classList = targetElement.classList;

            if (classList.contains('deleteProduct')) {
                e.preventDefault();

                var pId = targetElement.dataset.pid;
                var pName = targetElement.dataset.pname;

                if (window.confirm('Apa anda yakin ingin menghapus produk ' + pName + ' ?')) {
                    $.ajax({
                        method: 'POST',
                        data: {
                            id: pId,
                            table: 'products',
                        },
                        url: 'delete.php',
                        dataType: 'json',
                        success: function (data) {
                            var message = data.success ?
                                pName + ' Berhasil Dihapus!' : 'Gagal Dihapus!';

                            if (data.success) {
                                $('#modalNotificationTitle').text('SUCCESS');
                                $('#modalNotificationMessage').text(message);
                                $('#notificationModal').modal('show');
                                $('#notificationModal').find('.btn-primary').click(function () {
                                    location.reload();
                                });
                            } else {
                                window.alert(message);
                            }
                        },
                    });
                } else {
                    console.log('will not delete');
                }
            }

            if (classList.contains('updateProduct')) {
                e.preventDefault();

                var productId = targetElement.dataset.pid;
                vm.showEditDialog(productId);
            }
        });
    };

    this.showEditDialog = function (productId) {
    // TODO: Add logic to show edit dialog
    $.get('get-product.php', { productId: productId }, function (productDetails) {
        console.log(productDetails);
        $('#modalTitle').text('Update Produk ' + productDetails.productName + ' ?');
        $('#modalBody').html(`
            <form action="user-add.php" method="post" enctype="multipart/form-data" id="editProductForm">
                <fieldset>
                     <div class="form-group">
                                <label for="productName">Masukan Nama Produk</label>
                                <input type="text" id="productName" name="productName" value="${productDetails.productName}" class="form-control" placeholder="Nama Produk">
                            </div>
                            <div class="form-group">
                                <label for="description">Masukan Deskripsi</label>
                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Deskripsi">${productDetails.description}</textarea>
                            </div>
                            <div class="custom-file">
                                <input type="file" id="image" name="image" class="custom-file-input">
                                <label for="image" class="custom-file-label">Masukan Gambar Produk</label>
                            </div>
                </fieldset>
                <input type="hidden" name="productId" value="${productDetails.productId}" />
                <button id="editProductModal" type="submit" class="btn btn-primary" style="float: right; margin-top: 2rem;">OK</button>
            </form>
        `);

            $('#editModal').find('.modal-footer').hide();

            // Unbind previous click event handlers
            $('#editProductModal').off('click');

            // Bind the click event after updating the form
            $('#editModal').find('#editProductForm').submit(function (e) {
                e.preventDefault();
                vm.saveUpdateData(this);
            });

            // Bind the click event to close the modal
            $('#editProductModal').click(function () {
                $('#editModal').modal('hide');
            });
        }, 'json');
    };


    this.saveUpdateData = function (form) {
    $.ajax({
        method: 'POST',
        data: new FormData(form),
        processData: false,
        contentType: false,
        dataType: 'json',
        url: 'update-product.php',
        success: function (data) {
            console.log(data);
            if(data.success == TRUE){
                console.log('apakah runing?')
                $('#editModal').modal('hide');
                $('#modalNotificationTitle').text('SUCCESS');
                $('#modalNotificationMessage').text(data.message);
                $('#notificationModal').modal('show');
                // Unbind previous click event handlers
                $('#notificationModal').find('.btn-primary').click(function () {
                                            location.reload();
                                        });
            } else {
                    $('#editModal').modal('hide');
                    $('#modalNotificationTitle').text('GAGAL');
                    $('#modalNotificationMessage').text(data.message);
                    $('#notificationModal').modal('show');
                    // Unbind previous click event handlers
                    $('#notificationModal').find('.btn-primary').click(function () {
                        location.reload();
                    });
            }
            
        },
    });
};


}

var scriptInstance = new Script();
scriptInstance.initialize();
</script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>