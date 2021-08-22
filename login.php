<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Document</title>
    <style>
    .login {
        margin-top: 100px;
        text-align: center;
    }

    .login label {
        font-weight: 700;
    }

    .login input {
        border-radius: 6px;
    }
    </style>
</head>

<body>
    <div class="login">
        <h1>Đăng nhập hệ thống</h1>
        <form action='login.php' class="dangnhap" method='POST'>
            <div class="form-group">
                <div class="card-body">
                    <label>Tên đăng nhập: </label><br>
                    <input class="form-group" type='text' name='username' /><br>
                </div>
                <div class="card-body">
                    <label>Mật Khẩu: </label><br>
                    <input type='password' name='password' /><br><br>
                </div>
                <div class="card-body">
                    <input type='submit' class="btn btn-success" name="dangnhap" value='Đăng nhập' />
                </div>
                <?php require 'xuly.php';?>
            </div>
            <form>
    </div>
</body>

</html>