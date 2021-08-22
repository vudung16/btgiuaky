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
    h3 {
        text-align: center;
    }

    table {
        margin: 0 auto;
    }

    form {
        text-align: center;
        margin-bottom: 50px;
    }

    .button {
        text-align: center;
        margin: 20px 0px 30px 0px;
    }

    .button a {
        text-decoration: none;
        color: #ffffff;
    }
    </style>
</head>

<body>
    <?php 
        session_start();
        if (!isset($_SESSION['username'])){
            die('bạn chưa đăng nhập');
        }
    ?>
    <h3>Khoa</h3>
    <div class="button">
        <button class="btn btn-success"><a href="add.php?khoa">ADD</a></button><br>
    </div>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
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
                    echo    ' <td><a href="edit.php?khoaid='.$row['id'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?khoaid='.$row['id'].'">Delete</a></td>';
                    echo '</tr>';
            }
        }

        ?>
    </table><br>
    <form action="search.php" method="get">
        Search: <input type="text" name="searchkhoa" />
        <input type="submit" name="search1" value="search" />
    </form>

    <h3>Bộ Môn</h3>
    <div class="button"><button class="btn btn-success"><a href="add.php?bomon">ADD</a></button><br></div>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Khoa trực thuộc</th>
            <th>Edit</th>
            <th>Delete</th>
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
                    echo    ' <td><a href="edit.php?bomonid='.$row['id'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?bomonid='.$row['id'].'">Delete</a></td>';
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

    <h3>Cán bộ</h3>
    <div class="button"><button class="btn btn-success"><a href="add.php?canbo">ADD</a></button><br></div>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Họ tên</th>
            <th>Chức vụ</th>
            <th>Điện thoại cơ quan</th>
            <th>Email</th>
            <th>Điện thoại di động</th>
            <th>Bộ môn trực thuộc</th>
            <th>Edit</th>
            <th>Delete</th>
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
                    echo    '<td><a href="edit.php?canboid='.$row['id'].'">Edit</a></td>';
                    echo    '<td><a href="delete.php?canboid='.$row['id'].'">Delete</a></td>';
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
</body>

</html>