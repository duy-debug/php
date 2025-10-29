<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sữa mới</title>
</head>
<body>
    <h2>THÊM SỮA MỚI</h2>
<form action="index211.php" method="post" enctype="multipart/form-data">
    <table style="margin: 0 auto; background-color: #FDDEDC;">
        <tr><td>Mã sữa:</td><td><input type="text" name="ma_sua" required></td></tr>
        <tr><td>Tên sữa:</td><td><input type="text" name="ten_sua" required></td></tr>
        <tr><td>Hãng sữa:</td>
            <td>
                <select name="hang_sua" required>
                    <?php
                    include_once("config.php");
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $result = $conn->query("SELECT * FROM hang_sua");
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='".$row['Ma_hang_sua']."'>".$row['Ten_hang_sua']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr><td>Loại sữa:</td>
            <td>
                <select name="loai_sua" required>
                    <?php
                    $result2 = $conn->query("SELECT * FROM loai_sua");
                    while($row2 = mysqli_fetch_array($result2)){
                        echo "<option value='".$row2['Ma_loai_sua']."'>".$row2['Ten_loai']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr><td>Trọng lượng (gram):</td><td><input type="number" name="trong_luong" required></td></tr>
        <tr><td>Đơn giá (VNĐ):</td><td><input type="number" name="don_gia" required></td></tr>
        <tr><td>Thành phần dinh dưỡng:</td><td><textarea name="tp_dinh_duong" rows="3" required></textarea></td></tr>
        <tr><td>Lợi ích:</td><td><textarea name="loi_ich" rows="3" required></textarea></td></tr>
        <tr><td>Hình ảnh:</td><td><input type="file" name="hinh"></td></tr>
        <tr><td colspan="2" style="text-align:center;"><input class="btn" type="submit" name="submit" value="Thêm mới"></td></tr>
    </table>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])){
    $ma = $_POST['ma_sua'];
    $ten = $_POST['ten_sua'];
    $hang = $_POST['hang_sua'];
    $loai = $_POST['loai_sua'];
    $trongluong = $_POST['trong_luong'];
    $dongia = $_POST['don_gia'];
    $tpdd = $_POST['tp_dinh_duong'];
    $loiich = $_POST['loi_ich'];
    $hinh = "";

    if(isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0){
        $hinh = basename($_FILES['hinh']['name']);
        move_uploaded_file($_FILES['hinh']['tmp_name'], "images/".$hinh);
    }
    $check = $conn->query("SELECT * FROM sua WHERE Ma_sua = '$ma'");
    if($check->num_rows > 0){
        echo "<p style='color: red; text-align: center;'>Mã sữa đã tồn tại!</p>";
    } else {
        $sql = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
                VALUES ('$ma', '$ten', '$hang', '$loai', '$trongluong', '$dongia', '$tpdd', '$loiich', '$hinh')";
        if($conn->query($sql)){
            echo "<div style='text-align: center;'>KẾT QUẢ SAU KHI THÊM MỚI THÀNH CÔNG</div>";
            echo "<p style='text-align: center;'>Thêm sữa thành công!</p>";

            echo "<table style='margin: 0 auto; border: 2px solid brown;'>
            <tr>
                <td class='td1' colspan='2' style='text-align: center; color: orange; background-color: pink;'>
                    <h3>".$ten."</h3>
                </td>
            </tr>
            <tr>
                <td class='td1'><img src='images/".$hinh."' width='120' height='120'></td>
                <td class='td1'>
                    <b><i>Thành phần dinh dưỡng:</i></b><br>".$tpdd."<br>
                    <b><i>Lợi ích:</i></b><br>".$loiich."<br>
                    <b><i>Trọng lượng:</i></b> ".$trongluong." gr - 
                    <b><i>Đơn giá:</i></b> ".$dongia."
                </td>
            </tr>
            </table>";
        } else {
            echo "<p style='color: red; text-align: center;'>Lỗi khi thêm: ".$conn->error."</p>";
        }
    }
}
?>
</body>

<style>
h2{
    text-align: center;
    color: #fff;
    background-color: #FE6C6C;
}
.btn{
    margin-top: 15px;
}
img{
    width: 120px;
    height: 120px;
}
.td1{
    border: 1px solid #000000;
}
</style>
</html>
