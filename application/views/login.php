<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> APP INVENTORY </title>
    <link href="<?= base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?= base_url();?>home/proses_login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/dist/js/sb-admin-2.js"></script>
</body>
</html>
