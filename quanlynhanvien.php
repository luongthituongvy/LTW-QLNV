<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quanlynhanvien</title>
    <link rel="stylesheet" href="style_trangchinh.css">

    
</head>
<body>
    
    <div class="container">
        <header>
            <div class="logo">
                <button class="menu-toggle" onclick="toggleMenu()">☰</button>
                <a href="#"><img src="./img/CGV_Cinemas.svg" alt="Logo"/></a>
            </div>
            <ul class="taikhoan">
                <li><a href="#" class="imgacc"><img src="./img/icon_account.png"/></a>
                    <ul class="dangxuat">
                        <li><a href="#">Đăng xuất</a></li>
                    </ul>
                </li>
                <li><a href="" class="tb">🔔</a>
                    <ul class="note">
                        <li><a href="#">Không có thông báo </a></li>
                    </ul>
                </li>
            </ul>
        </header>
        <div class="side-menu" id="sideMenu">
            <h2>Menu</h2><a href="#">Trang Chủ</a>
            <a href="#">Quản lý phim</a>
            <a href="#">Quản lý lịch chiếu</a>
            <a href="#">Quản lý phòng chiếu</a>
            <a href="#">Quản lý nhân viên</a>
        </div>
        <script>
            function toggleMenu() 
            {
                document.getElementById('sideMenu').classList.toggle('open');
            }
        </script>
    </div>
    
    <H2>QUẢN LÝ NHÂN VIÊN</H2>
    <div class="timkiem_themmoi">
        <div class="timkiem">
            <form action="" method="post">
                Nhân viên: <input class="nhap" type ="text" name="timkiem" placeholder="Nhập từ khóa cần tìm">
                <input class="btn-timkiem" name= "search" type="submit" value="Tìm kiếm">
            </form>
        </div>

        
            <div>
            <form>
                <a href="them.php" class="them_moi">Thêm Nhân Viên</a>  
            </div>
            </form>
    </div>

    <table class="table-nv">
        <tr> 
            <th>ID Nhân viên</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Vai trò</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr> 
    
        <?php 
        
        require_once "config.php";
        //Viết câu lệnh SQL
            // Hiển thị kết quả
            $sql = "SELECT * FROM nhanvien order by maNV ASC";

            $isSearching = false;
            if(isset($_POST["search"])){
                $isSearching = true;
                $value = $_POST["timkiem"];
                if( $value == ""){
                    echo "Vui lòng nhập vào thanh tìm kiếm";
                }else{
                    $sql ="select * from nhanvien where ten_nv like '%$value%' order by maNV ASC ";
                   
                    }
                }
                $result =$conn->query($sql);
                if ($result) 
                {
                    if($isSearching ){
                        $count = $result ->num_rows; 
                    if($count ==0 )
                    {
                        echo"<h3 style='color: green; text-align: left; margin-left:5px;'>Không tìm thấy kết quả nào với từ khóa!</h3>  ";
                    }else {
                        echo "<h3 style='color: green; text-align: left;margin-left:5px;'>Tìm thấy ".$count." kết quả</h3>";
                         
                    }
                    }
                    
                    // Lấy và chuyển tất cả các bộ dữ liệu sang dạng mảng kết hợp
                    $nhanvien = $result->fetch_all(MYSQLI_ASSOC);
                
        ?>
        <?php   
        foreach ($nhanvien as $row) 
        {
        ?>
            <tr>
                <td><?php echo $row["maNV"];?></td>
                <td><?php echo $row["ten_NV"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["gioitinh"];?></td>
                <td><?php echo $row["soDienThoai"];?></td>
                <td><?php echo $row["vaitro"];?></td>
                <td><?php echo $row["ngaytao"];?></td>
                <td class="hanh-dong">
                    <a href="./sua.php?maNV=<?php echo $row['maNV'];?>">Sửa</a> |
                    <a href="./chitiet.php?maNV=<?php echo $row['maNV'];?>" class="detail">Chi tiết</a> |
                    <a href="./xoa.php?maNV=<?php echo $row['maNV'];?>" onclick="return checkdelete()" >Xóa</a>
                </td>
            </tr>
        <?php
        }
        echo "</table>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
    $conn->close();
    ?>

    <script>
       function checkdelete()
       {
        return confirm('Bạn có chắc chắn muốn xóa nhân viên hay không ')
       }

    </script>
        

</body>
</html>
