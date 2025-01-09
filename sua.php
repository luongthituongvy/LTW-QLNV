<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thông tin Nhân Viên</title>
    <link rel="stylesheet" href="stylesua.css">
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
    <H2>CẬP NHẬT THÔNG TIN NHÂN VIÊN</H2><br>
    <?php
    require_once "config.php";
    if(isset($_GET['maNV'])){
        $id= $_GET['maNV'];

        $sql ="select * from nhanvien where maNV = '$id'";
        
        $result = $conn->query($sql);

        if($result){
            $nhanvien = $result->fetch_assoc();
    ?>

    <?php
        if(isset($_POST["update"]))
        {
            $s_id= $_GET["maNV"];

            $hovaten= $_POST["name"];
            $gioitinh= $_POST["gioitinh"];
            $ngaysinh= $_POST["ngaysinh"];
            $email= $_POST["email"];
            $sdt= $_POST["sdt"];
            $cccd=$_POST["cccd"];
            $dantoc=$_POST["dantoc"];
            $tamtru=$_POST["diachitamtru"];
            $thuongtru=$_POST["diachithuongtru"];
            
            $sql="UPDATE nhanvien set ten_NV='$hovaten',email='$email', gioitinh='$gioitinh',
                                        cccd='$cccd',dantoc='$dantoc',ngaysinh='$ngaysinh',soDienThoai='$sdt',
                                        diachithuongtru='$thuongtru', diachitamtru='$tamtru' 
                                        where maNV='$s_id'";

            $result =$conn->query($sql);
            if ($result) 
            {
                echo "<script>alert('Cật nhập dữ liệu thành công');window.location.href = './quanlynhanvien.php';</script>";
            exit;
            }
     
        }
    ?>

        <form action="" method="POST">
            <div style="float:left; margin-left:50px;">
                <label style="font-size:24px; font-weight: bold ; ">Họ và tên </label><br>
                <input style="padding:10px; font-size:18px;" type="text" name="name" value="<?php echo $nhanvien["ten_NV"];?>"><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Giới tính </label><br>
                <select style="padding:10px; font-size:18px;" name="gioitinh">
                                    <option value="Nam">Nam</option><br><br>
                                    <option value="Nữ">Nữ</option>
                                </select> <br><br>
                <label style="font-size:24px; font-weight: bold ; ">Ngày sinh </label><br>
                <input style="padding:10px;font-size:18px;" type="date" name="ngaysinh" value="<?php echo $nhanvien["ngaysinh"];?>"><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Email </label><br>
                <input style="padding:10px;font-size:18px;" type="text" name="email" value="<?php echo $nhanvien["email"];?>"><br><br>
            </div>

            <div style="float:left; margin-left:200px;" >
                <label style="font-size:24px; font-weight: bold ; ">Số điện thoại </label><br>
                <input style="padding:10px;font-size:18px;" type="text" name="sdt" value="<?php echo $nhanvien["soDienThoai"];?>"><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Căn cước công dân </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 30ch;" type="text" name="cccd" value="<?php echo $nhanvien["cccd"];?>"><br><br>
            
                <label style="font-size:24px; font-weight: bold ; ">Dân tộc </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 30ch;" type="text" name="dantoc" value="<?php echo $nhanvien["dantoc"];?>"><br><br>
                
                <label style="font-size:24px; font-weight: bold ; ">Địa chỉ tạm trú </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 50ch;" type="text" name="diachitamtru" value="<?php echo $nhanvien["diachitamtru"];?>"> </input><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Địa chỉ thường trú </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 50ch;" type="text" name="diachithuongtru" value="<?php echo $nhanvien["diachithuongtru"];?>"> </input><br><br>

            </div>
            <br style="clear:both"> <!-- xóa định dạng ở trên nhunsxg cái sau bthuong -->
            <input class="them" type="submit" name="update" value="Cập nhật">
            </form>
            
        <?php
        }
    }  
        ?>


</body>
</html>