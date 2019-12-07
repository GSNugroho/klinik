<!DOCTYPE html>
<?php include 'koneksi.php';
if (isset($_GET['Message'])) {
    echo '
        <script type="text/javascript">
            alert("LOGIN GAGAL"); 
            window.location.href = "index.php";</script>';    
}
?>
<html>
    <head>
        <title>Klinik Pratama Panti Waluyo Surakarta</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white">Klinik Pratama Panti Waluyo Surakarta</a>
                </div>

<!--                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Cabang</a></li>
                        <li><a href="#">User</a></li>
                        <li><a href="#">Log In</a></li>	          
                    </ul>
                </div>-->

            </div>
        </nav>

        <div class="container">

            <div class="main">

                <h4 class="sub-header">Login</h4>
                <div class="center">
                    <form action="login.php" method="POST">
                        <label class="sr-only" for="inputUserName">
                            User Name
                        </label>
                        <input id="inputUserName" name="username" class="form-control" type="text" autofocus="" required="" placeholder="User Name" maxlength="20" style="margin-bottom:5px;" oncopy="return false;" onpaste="return false;" oncut="return false;">
                        <label class="sr-only" for="inputPassword">
                            Password
                        </label>
                        <input id="inputPassword" name="password" class="form-control" placeholder="Password" required="" type="password" style="margin-bottom:10px;" oncopy="return false;" onpaste="return false;" oncut="return false;">
                        <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</body>
</html>