<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Document</title>
    <style>
    .home h3 {
        text-align: center;
    }

    table {
        margin: 0 auto;
    }

    form {
        text-align: center;
        margin-bottom: 50px;
    }

    .login {
        text-align: right;
    }

    button {
        margin: 50px 200px 0px 0px;
    }

    button a {
        color: #ffffff;
    }
    </style>
</head>

<body>
    <div class="login">
        <button class="btn btn-primary"><a href="login.php">Đăng nhập</a></button>
    </div>

    <div class="home">
        <h3>Bảng Khoa</h3><br>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
            <?php 
            include('connect.php');
            $sql = "SELECT * FROM khoa";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id'].'</td>';
                    echo    '<td>'.$row['name'].'</td>';
                    echo '</tr>';
                }
            }
        
        ?>
        </table><br>
        <form action="search.php" method="get">
            Search: <input type="text" name="searchkhoa" />
            <input type="submit" name="search1" value="search" />
        </form>

        <h3>Bảng Bộ Môn</h3><br>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Khoa trực thuộc</th>
            </tr>
            <?php 
            include('connect.php');
            $sql = "SELECT bomon.id,bomon.name, khoa.name AS khoaname FROM bomon JOIN khoa ON bomon.khoa_id = khoa.id";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id'].'</td>';
                    echo    '<td>'.$row['name'].'</td>';
                    echo    '<td>'.$row['khoaname'].'</td>';
                    echo '</tr>';
                }
            }
        
        ?>
        </table><br>
        <form action="search.php" method="get">
            Tên: <input type="text" name="searchbomon" /><br><br>
            Khoa: <select name="lockhoa" id="">
                <?php 
                include('connect.php');
                $sql = "SELECT * FROM khoa";
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while ( $row = mysqli_fetch_assoc($result) ) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            ?>
            </select><br><br>
            <input type="submit" name="search2" value="search" />
        </form>

        <h3>Bảng Cán Bộ</h3><br>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Id</th>
                <th>Họ tên</th>
                <th>Chức vụ</th>
                <th>Điện thoại cơ quan</th>
                <th>Email</th>
                <th>Điện thoại di động</th>
                <th>Bộ môn trực thuộc</th>
            </tr>
            <?php 
            include('connect.php');
            $sql = "SELECT canbo.id, canbo.hoten, canbo.chucvu, canbo.dtcoquan, canbo.email, canbo.dtdidong, bomon.name as bomonname FROM canbo JOIN  bomon ON bomon.id = canbo.bomon_id";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<tr>';
                    echo    '<td>'.$row['id'].'</td>';
                    echo    '<td>'.$row['hoten'].'</td>';
                    echo    '<td>'.$row['chucvu'].'</td>';
                    echo    '<td>'.$row['dtcoquan'].'</td>';
                    echo    '<td>'.$row['email'].'</td>';
                    echo    '<td>'.$row['dtdidong'].'</td>';
                    echo    '<td>'.$row['bomonname'].'</td>';
                    echo '</tr>';
                }
            }
        
        ?>
        </table><br>
        <form action="search.php" method="get">
            Search: <input type="text" name="searchcanbo" /><br><br>
            Bộ môn: <select name="locbomon" id="">
                <?php 
                include('connect.php');
                $sql = "SELECT * FROM bomon";
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while ( $row = mysqli_fetch_assoc($result) ) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            ?>
            </select><br><br>
            <input type="submit" name="search3" value="search" />
        </form>
    </div>
</body>

</html>