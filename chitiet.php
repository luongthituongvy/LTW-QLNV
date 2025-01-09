<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thông tin Nhân Viên</title>
    <link rel="stylesheet" href="stylechitiet.css">
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
    <H2>CHI TIẾT THÔNG TIN NHÂN VIÊN</H2>
    <?php
    require_once "config.php";
    if(isset($_GET['maNV'])){
        $id= $_GET['maNV'];

        $sql ="select n.*  
                from nhanvien n, taikhoan_nv t
                where n.maNV=t.maNV and n.maNV = '$id'";
        
        $result = $conn->query($sql);

        if($result){
            $nhanvien = $result->fetch_assoc();
    ?>
            <div style="float:left; mergin-left:20px;">
                <form class="form">
                <b> Mã nhân viên: </b> <?php echo $nhanvien["maNV"];?> <br> 
                <b> Tên nhân viên: </b> <?php echo $nhanvien["ten_NV"];?> <br>
                <b> Giới tính: </b> <?php echo $nhanvien["gioitinh"];?><br>
                <b> Ngày sinh: </b> <?php echo $nhanvien["ngaysinh"];?><br>
                <b> Email: </b> <?php echo $nhanvien["email"];?><br>
                <b> Số điện thoại: </b> <?php echo $nhanvien["soDienThoai"];?><br>
                <b> CCCD: </b> <?php echo $nhanvien["cccd"];?><br>
                <b> Vai trò: </b> <?php echo $nhanvien["vaitro"];?><br>
                <b> Địa chỉ tạm trú: </b> <?php echo $nhanvien["diachitamtru"];?><br>
                <b> Địa chỉ thường trú: </b> <?php echo $nhanvien["diachithuongtru"];?><br>
               
                </form>
            </div>
            <br style="clear:both"> <!-- xóa định dạng ở trên nhunsxg cái sau bthuong -->
        <?php
        }
    }  
        ?>


</body>
</html>