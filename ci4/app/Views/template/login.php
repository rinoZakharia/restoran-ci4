<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto">
                <?php
                if (!empty($info)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $info;
                    echo '</div>';
                }
                ?>
                <span>
                    <h1>Login Admin</h1>
                </span>
                <hr>
                <form action="<?= base_url('/admin/login') ?>" method="post">
                    <div class="form-group">
                        <label for="kategori">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>