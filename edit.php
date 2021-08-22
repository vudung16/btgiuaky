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
        // Kết nối Database
        include 'connect.php';
        if (isset($_REQUEST['khoaid'])){
            $id1=$_GET['khoaid'];
            $query1=mysqli_query($connect,"select * from khoa where id='$id1'");
            $row1=mysqli_fetch_assoc($query1);
        }
        if (isset($_REQUEST['bomonid'])){
            $id2=$_GET['bomonid'];
            $query2=mysqli_query($connect,"select * from bomon where id='$id2'");
            $row2=mysqli_fetch_assoc($query2);
        }
        if (isset($_REQUEST['canboid'])){
            $id3=$_GET['canboid'];
            $query3=mysqli_query($connect,"select * from canbo where id='$id3'");
            $row3=mysqli_fetch_assoc($query3);
        }

    ?>
    <?php
       if (isset($_REQUEST['khoaid'])){
        echo '<form method="POST" class="form">';
        echo '<h2>Sửa tên khoa</h2>';
        echo '<label>Name: <input type="text" value="'.$row1['name'].'" name="name"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['khoaid'];
                $name=$_POST['name'];

                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "UPDATE `khoa` SET name='$name' WHERE id='$id'";

                if ($connect->query($sql) === TRUE) {
                    echo "Sửa thành công";
                    header("Location: admin.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
       }


       if (isset($_REQUEST['bomonid'])){
        echo '<form method="POST" class="form">';
        echo '<h2>Sửa tên bộ môn</h2>';
        echo '<label>Name: <input type="text" value="'.$row2['name'].'" name="name"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['bomonid'];
                $name=$_POST['name'];

                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "UPDATE `bomon` SET name='$name' WHERE id='$id'";

                if ($connect->query($sql) === TRUE) {
                    echo "Sửa thành công";
                    header("Location: admin.php");
                } else {
                    echo "lỗi: " . $connect->error;
                }

                $connect->close();
            }
        echo '</form>';
       }



       if (isset($_REQUEST['canboid'])){
        echo '<form method="POST" class="form">';
        echo '<h2>Sửa tên bộ môn</h2>';
        echo '<label>Tên: <input type="text" value="'.$row3['hoten'].'" name="hoten"></label><br />';
        echo '<label>Chức vụ: <input type="text" value="'.$row3['chucvu'].'" name="chucvu"></label><br />';
        echo '<label>Điện thoại cơ quan: <input type="text" value="'.$row3['dtcoquan'].'" name="dtcoquan"></label><br />';
        echo '<label>Email: <input type="text" value="'.$row3['email'].'" name="email"></label><br />';
        echo '<label>Điện thoại di động: <input type="text" value="'.$row3['dtdidong'].'" name="dtdidong"></label><br />';
        echo '<input type="submit" value="Update" name="update_name">';
            if (isset($_POST['update_name'])){
                $id=$_GET['canboid'];
                $hoten=$_POST['hoten'];
                $chucvu=$_POST['chucvu'];
                $dtcoquan=$_POST['dtcoquan'];
                $email=$_POST['email'];
                $dtdidong=$_POST['dtdidong'];

                // Create connection
                $connect = new mysqli("localhost", "root", "", "btgiuaky");
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $connect->connect_error);
                }

                $sql = "UPDATE `canbo` SET hoten='$hoten', chucvu='$chucvu', dtcoquan='$dtcoquan', email='$email', dtdidong='$dtdidong' WHERE id='$id'";

                if ($connect->query($sql) === TRUE) {
                    echo "Sửa thành công";
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