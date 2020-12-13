<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container ">
        <nav class="navbar navbar-default" align= "center"> <center> <h2> <font color=”blue”>Selamat Datang di Yxuthel Shop<font color=”blue”> </h2> </center></nav>
        <div class="content center" >
            <hr>
            <div class="col-md-offset-4 col-md-4 ">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password"  name="password" class="form-control" >
                        <span><?=(isset($msg))?$msg:'';?></span>
                        <hr>
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-default"><font color=”blue”>Submit<font color=”blue”></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>