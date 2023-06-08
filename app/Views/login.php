<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <?= $this->include('layouts/head') ?>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div style="background-color: white;" class="card-header d-flex justify-content-center">
                        <img src=<?= base_url('logo1.png') ?> style="width:250px">
                        <!-- <h3 class="text-center">Login O’Petto</h3> -->
                    </div>
                    <div class="card-body">
                        <form action="/login" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <?= isset($error) ? '<div class="text-danger my-4">' . $error . '</div>' : '' ?>
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                            <a href="register" class="d-flex justify-content-center btn btn-link">Register account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('layouts/scripts') ?>
</body>

</html>