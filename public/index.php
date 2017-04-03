<html>

    <head>
        <title>Login</title>

        <style type="text/css">
            .input {
                padding-top: 10px;
                border-style: solid;
                border-width: 5px;
                border-color: #dddddd;
                width: auto;
                height: auto;
                border-radius: 10px;
                font-family: callibri;
                margin-left: 35%;
                margin-top: 15%;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3), 7px 7px 7px rgba(0, 0, 0, .03);
            }

            .login {
                padding-left: 27%;
            }

            .lg {
                padding-left: 50px
            }

            .bg {
                background-color: dddddd;
                position: absolute;
            }
        </style>
        <link rel="stylesheet" href="http://localhost/SIA/public/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="input login col-md-offset-4 col-md-4">
                    <form action="http://localhost/SIA/auth/login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn-block btn btn-primary">Masuk</button>
                    </form>
                </div>
            </div>
        </div>

    </body>

</html>
