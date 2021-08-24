<?php
    if (isset($_REQUEST['search1'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['searchkhoa']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from khoa where name like '%$search%'";
 
                // Kết nối sql
                include('connect.php');
                
                // Thực thi câu truy vấn
                $result = mysqli_query($connect, $sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num Kết quả trả về với từ khóa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Name</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }



        if (isset($_REQUEST['search2'])) 
        {
            $search1 = $_GET['searchbomon'];
            $search2 = $_GET['lockhoa'];
            
            if (empty($search1)) {
                echo "Bạn chưa nhập gì";
            } 
            else
            {
                
                $sql = "select * from bomon where name like '%$search1%' and khoa_id like '%$search2%'";
                // Kết nối sql
                include('connect.php');
                
                $result = mysqli_query($connect, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0 && $search1 != "" && $search2 != "") 
                {
                    echo "$num Kết quả trả về với từ khóa <b>$search1</b></br>";

                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Tên</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }


        if (isset($_REQUEST['search3'])) 
        {

            $search1 = $_GET['searchcanbo'];
            $search2 = $_GET['locbomon'];

            if (empty($search1)) {
                echo "Bạn chưa nhập dữ liệu";
            } 
            else
            {

                $sql = "select * from canbo where hoten like '%$search1%' and bomon_id like '%$search2%'";

                include('connect.php');
                

                $result = mysqli_query($connect, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0 && $search1 != "" && $search2 != "") 
                {

                    echo "$num Kết quả trả về với từ khóa <b>$search1</b>";
 
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Họ Tên</th>';
                    echo '<th>Chức Vụ</th>';
                    echo '<th>Điện thoại cơ quan</th>';
                    echo '<th>Email</th>';
                    echo '<th>Điện thoại di động</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo    '<td>'.$row['id'].'</td>';
                        echo    '<td>'.$row['hoten'].'</td>';
                        echo    '<td>'.$row['chucvu'].'</td>';
                        echo    '<td>'.$row['dtcoquan'].'</td>';
                        echo    '<td>'.$row['email'].'</td>';
                        echo    '<td>'.$row['dtdidong'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Không tìm thấy kết quả phù hợp với từ khóa!";
                }
            }
        }
?>