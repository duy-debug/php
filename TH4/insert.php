<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>THÊM KHÁCH HÀNG</h2>
    <form action="insert.php" method="post">
        <table style="margin: 0 auto; background-color: #E6D4B7;">
            <tr>
                <td>Mã khách hàng:</td>
                <td><input type="text" name="ma_khach_hang" value="<?php echo isset($ma) ? $ma : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Tên khách hàng:</td>
                <td><input type="text" name="ten_khach_hang" value="<?php echo isset($ten) ? $ten : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Gioi tính: </td>
                <td>
                    <input type="radio" name="phai" value="Nam" value="<?php echo isset($phai) ? $phai : ''; ?>" checked required> Nam
                    <input type="radio" name="phai" value="Nữ" value="<?php echo isset($phai) ? $phai : ''; ?>" required> Nữ
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="dia_chi" value="<?php echo isset($diachi) ? $diachi : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="number" name="dien_thoai" value="<?php echo isset($dienthoai) ? $thoai : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required></td>
            </tr>
            <tr>
                <td style="text-align:center;"><input class="btn" type="submit" name="submit" value="Thêm mới"></td>
                <td><input class="btn" type="reset" name="submit" value="Reset">
            </td>
            </tr>
            <tr>
                <td>
                    <a href="index212.php">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
    <!-- Nút XEM KẾT QUẢ được tách riêng -->
    <form method="post" style="text-align:center; margin-bottom:150px;">
        <input class="btn" type="submit" name="view" value="Xem kết quả">
    </form>
        
    <?php
    include_once("config.php");
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['view'])){
        header("Location: viewkh.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        $ma = $_POST['ma_khach_hang'];
        $ten = $_POST['ten_khach_hang'];
        $phai = $_POST['phai'];
        $diachi = $_POST['dia_chi'];
        $dienthoai = $_POST['dien_thoai'];
        $email = $_POST['email'];
        $check = $conn->query("SELECT * FROM khach_hang WHERE Ma_khach_hang = '$ma'");
        if ($check->num_rows > 0) {
            echo "<p style='color: red; text-align: center;'>Mã khách hàng đã tồn tại!</p>";
        } else {
            $sql = "INSERT INTO khach_hang (Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email)
                VALUES ('$ma', '$ten', '$phai', '$diachi', '$dienthoai', '$email')";
            if ($conn->query($sql)) {
                echo "<p style='text-align: center;'>Thêm khách hàng thành công!</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Lỗi khi thêm: " . $conn->error . "</p>";
            }
        }
    }
    ?>
</body>

<style>
    h2 {
        text-align: center;
        color: brown;
        background-color: yellow;
    }

    .btn {
        margin-top: 15px;
    }

    img {
        width: 120px;
        height: 120px;
    }

    .td1 {
        border: 1px solid #000000;
    }
</style>

</html>