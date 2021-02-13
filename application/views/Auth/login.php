<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= base_url("assets/style.css");  ?>"> -->
    <title>Form Login</title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/fontawesome-free/css/all.min.css");  ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url("assets/css/sb-admin-2.min.css");  ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon/vote2.png'); ?>">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                                        <?= $this->session->flashdata('message');  ?>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('Auth');  ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username..." value="<?= set_value('username');  ?>">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <marquee>Aplikasi Sistem Company Cash Management !!</marquee>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <!-- <a class="small" href="<?= base_url('umum');  ?>">Kembali</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>