<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin Nhân Viên</title>
    <link rel="stylesheet" href="stylesua.css">
</head>
</head>
<body>
<div class="menu_container">
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
            function toggleMenu() {
                document.getElementById('sideMenu').classList.toggle('open');
            }
        </script>
   
   <h2> THÊM NHÂN VIÊN</h2><br>
   <form action="" method="POST">

            <div style="float:left; margin-left:50px;">
                <label style="font-size:24px; font-weight: bold ; ">Tên tài khoản</label><br>
                <input style="padding:10px; font-size:18px;" type="text" name="idUser" required ><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Mật khẩu</label><br>
                <input style="padding:10px; font-size:18px;" type="text" name="password" required ><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Xác Nhận Mật khẩu</label><br>
                <input style="padding:10px; font-size:18px;" type="text" name="password" required ><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Vai trò </label><br>
                <select style="padding:10px; font-size:18px;" name="vaitro" required >
                                    <option >Quản lý</option><br><br>
                                    <option >Nhân viên</option>
                                </select> <br><br>
            </div>

            <div style="float:left; margin-left:120px;">
                <label style="font-size:24px; font-weight: bold ; ">Họ và tên </label><br>
                <input style="padding:10px; font-size:18px;" type="text" name="hovaten" required ><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Giới tính </label><br>
                <select style="padding:10px; font-size:18px;" name="gioitinh">
                                    <option value="Nam">Nam</option><br><br>
                                    <option value="Nữ">Nữ</option>
                                </select> <br><br>
                <label style="font-size:24px; font-weight: bold ; ">Ngày sinh </label><br>
                <input style="padding:10px;font-size:18px;" type="date" name="ngaysinh" required><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Email </label><br>
                <input style="padding:10px;font-size:18px;" type="text" name="email" required><br><br>

                
            </div>

            <div style="float:left; margin-left:120px;" >
                

                <label style="font-size:24px; font-weight: bold ; ">Số điện thoại </label><br>
                <input style="padding:10px;font-size:18px;" type="text" name="sdt" required ><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Căn cước công dân </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 30ch;" type="text" name="cccd" required><br><br>
            
                <label style="font-size:24px; font-weight: bold ; ">Dân tộc </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 30ch;" type="text" name="dantoc" required><br><br>
            </div>   
            <div style="float:left; margin-left:120px;" >  


                <label style="font-size:24px; font-weight: bold ; ">Địa chỉ tạm trú </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 50ch;" type="text" name="diachitamtru" required> </input><br><br>

                <label style="font-size:24px; font-weight: bold ; ">Địa chỉ thường trú </label><br>
                <input style="padding:10px;font-size:18px; width:auto;min-width: 50ch;" type="text" name="diachithuongtru" required> </input><br><br>

            </div>
            <br style="clear:both"> <!-- xóa định dạng ở trên nhunsxg cái sau bthuong -->
            <input class="them" type="submit" name="them" value="Thêm">
            </form>
            
       
</body>
</html>


<?php
        if (isset($_POST["them"])) {
            require_once "config.php";
            $tenDangNhap = $_POST['idUser'];
            $matkhau = $_POST['password'];
            $ten_NV = $_POST['hovaten'];
            $email = $_POST['email']; 
            $gioitinh = $_POST['gioitinh'];
            $vaitro = $_POST['vaitro'];
            $soDienThoai = $_POST['sdt'];
            $ngaysinh= $_POST['ngaysinh'];
            $cccd=$_POST["cccd"];
            $dantoc=$_POST["dantoc"];
            $tamtru=$_POST["diachitamtru"];
            $thuongtru=$_POST["diachithuongtru"];
        
            if ($ten_NV == "") {
                echo "Vui lòng nhập tên nhân viên!<br />";
            }
            if ($email == "") {
                echo "Vui lòng nhập Email!<br />";
            }
            if ($soDienThoai == "") {
                echo "Vui lòng nhập số điện thoại!<br />";
            }
        
            if ($tenDangNhap  && $email != "" && $soDienThoai != "") {
                // Câu lệnh SQL
                $sql1 = "INSERT INTO nhanvien (maNV, ten_NV, email, gioitinh,cccd,dantoc, soDienThoai,ngaysinh, vaitro, diachitamtru,diachithuongtru, ngaytao) 
                VALUES ('','$ten_NV','$email','$gioitinh','$cccd','$cccd','$soDienThoai','$ngaysinh','$vaitro','$tamtru','$thuongtru', NOW() )";
                // Thực hiện query

                if ($conn->query($sql1) ==TRUE) {
                $sql2 = "INSERT INTO taikhoan_nv ( tenDangNhap, matKhau, ngaytao, vaitro) 
                    VALUES ('$tenDangNhap', '$matkhau', NOW(), '$vaitro')";
                } 
                if ($conn->query($sql2) == TRUE) {
                    echo '<span style="color: dark-green;">Thêm dữ liệu thành công!</span>';
                } else {
                    echo "Lỗi: " . $conn->error;
                } 
            } else {
                echo "Vui lòng nhập đầy đủ dữ liệu.";
            }
        }
    ?>
    