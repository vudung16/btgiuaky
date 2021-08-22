<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        include ('connect.php');
        if(isset($_REQUEST['khoa'])){
            echo '<form method="POST" class="form">';
            echo '<h2>Thêm Khoa</h2>';
            echo '<label>Name: <input type="text" name="name"></label><br />';
            echo '<input type="submit" value="ADD" name="add_khoa">';
            if (isset($_POST['add_khoa'])){
                $name=$_POST['name'];

                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "INSERT INTO `khoa` (name) VALUES ('$name') ";
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
                    header("Location: admin.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
        }

        if(isset($_REQUEST['bomon'])){
            $sql = "SELECT * FROM khoa";
            $result = mysqli_query($connect, $sql);
            echo '<form method="POST" class="form">';
            echo '<h2>Thêm Bộ Môn</h2>';
            echo '<label>Name: <input type="text" name="name"></label><br />';
            if(mysqli_num_rows($result) > 0) {
                echo '<lable>Bộ Môn: <lable>';
                echo '<select name="khoa">';
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                echo '</select></br>';
            }
            echo '<input type="submit" value="ADD" name="add_bomon">';
            if (isset($_POST['add_bomon'])){
                $name=$_POST['name'];
                $khoaid=$_POST['khoa'];

                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "INSERT INTO `bomon` (name,khoa_id) VALUES ('$name','$khoaid') ";
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
                    header("Location: admin.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
        }

        if(isset($_REQUEST['canbo'])){
            $sql = "SELECT * FROM bomon";
            $result = mysqli_query($connect, $sql);
            
            echo '<form method="POST" class="form">';
            echo '<h2>Sửa tên bộ môn</h2>';
            echo '<label>Tên: <input type="text"  name="hoten"></label><br/><br/>';
            echo '<label>Chức vụ: <input type="text" name="chucvu"></label><br/><br/>';
            echo '<label>Điện thoại cơ quan: <input type="text" name="dtcoquan"></label><br/><br/>';
            echo '<label>Email: <input type="text" name="email"></label><br/><br/>';
            echo '<label>Điện thoại di động: <input type="text" name="dtdidong"></label><br/><br/>';
            if(mysqli_num_rows($result) > 0) {
                echo '<lable>Bộ Môn: <lable>';
                echo '<select name="bomon">';
                while ( $row = mysqli_fetch_assoc($result) ) {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                echo '</select></br><br/>';
            }
            echo '<input type="submit" value="ADD" name="add_canbo">';
            if (isset($_POST['add_canbo'])){
                $hoten=$_POST['hoten'];
                $chucvu=$_POST['chucvu'];
                $dtcoquan=$_POST['dtcoquan'];
                $email=$_POST['email'];
                $dtdidong=$_POST['dtdidong'];
                $bomon=$_POST['bomon'];
                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "INSERT INTO `canbo` (hoten, chucvu, dtcoquan, email, dtdidong, bomon_id) VALUES ('$hoten','$chucvu','$dtcoquan','$email','$dtdidong','$bomon') ";

                if ($connect->query($sql) === TRUE) {
                    echo "Thêm thành công";
                    header("Location: admin.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
        }
    ?>
</body>

</html>