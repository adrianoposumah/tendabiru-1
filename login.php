<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login page tendaBiru!</title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
         <!-- Custom Style -->
        <style>

        .form-custom {
            min-height: 100vh;
        }

        #layoutAuthentication {
            height: 100vh;
        }

        .login-logo {
            text-align: center;
            margin-top: 8rem;
            color: #fff;
        }

        .card {
            width: 100%;
            border-radius: 15px;
        }

        .card-header {
            border: none;
        }

        .btn-full-width {
            width: 100%;
        }

         .form-custom {
            margin-top: 2rem;
        }

        .form-floating i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.25rem;
            color: #6c757d;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid #d5eafc; /* Warna garis bawah */
            border-radius: 0;
            padding: 0.75rem 0; /* Sesuaikan padding sesuai kebutuhan */
            box-shadow: none;
        }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center form-custom">
                            <div class="col-lg-5">
                                <div class="login-logo">
                                    <h2>TendaBiru</h2>
                                </div>
                                <div class="card border-0 rounded-lg mt-4">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Masuk</h3></div>
                                    <div class="card-body">
                                    <form action="cek_login.php" method="post">
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" name="username" id="inputUsername" type="username" placeholder="name@example.com" />
                                                <label for="inputUsername">Username
                                                    </label>
                                                    <i class="bx bxs-user"></i>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password
                                                    </label>
                                                    <i class="bx bxs-lock-alt"></i>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary btn-full-width" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
