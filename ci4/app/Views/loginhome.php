<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Login Page</title>
    <style>
        body {
            background-image: url(<?= base_url('/icon/burger.jpg') ?>);
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Quicksand', sans-serif;
        }

        .boxLogin {
            box-shadow: 3px 3px 6px 5px black;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="boxLogin col-5 mx-auto p-5">
                <?php
                if (!empty($info)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $info;
                    echo '</div>';
                }
                ?>
                <span>
                    <h1 class="text-white text-center font-weight-bold font-italic">Login Pelanggan</h1>
                </span>
                <hr class="bg-white">
                <form class="text-white" action="<?= base_url('/loginhome') ?>" method="post">
                    <div class="form-group">
                        <label for="kategori">Email</label>
                        <input type="email" class="form-control text-dark font-weight-bolder" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-dark btn-block font-weight-bolder" type="submit" name="Login" value="Login">
                    </div>
                    <div class="form-group mt-4">
                        <a href="<?= base_url('loginhome/daftar') ?>" class="btn btn-block text-decoration-none font-weight-bolder" style="background-color: #F9A826;">Belum punya akun? Daftar!!!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>