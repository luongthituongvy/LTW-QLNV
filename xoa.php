<?php
    require_once "config.php";
    if(isset($_GET['maNV'])){
        $id= $_GET['maNV'];

        $sql ="delete n,t from nhanvien n, taikhoan_nv t
                        where n.maNV=t.maNV and n.maNV='$id'";
        
        $result = $conn->query($sql);

        if($result)
        {
            echo "<script>alert('Xóa nhân viên thành công');window.location.href = './quanlynhanvien.php';</script>";

        }
        else
        {
            echo "Xóa nhân viên thất bại";

        }
    }
    ?>