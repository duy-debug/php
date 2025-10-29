<?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);
$id = ""; // tránh lỗi undefined
$row = [];

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM khach_hang WHERE Ma_khach_hang = '$id'");
    $row = mysqli_fetch_array($result);
}

?>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $ma = $_POST['ma_khach_hang'];
    $ten = $_POST['ten_khach_hang'];
    $phai = $_POST['Phai'];
    $diachi = $_POST['dia_chi'];
    $dienthoai = $_POST['dien_thoai'];
    $email = $_POST['email'];
    if($conn->query("UPDATE khach_hang SET
Ten_khach_hang='$ten',
Phai = '$phai',
Dia_chi = '$diachi',
Dien_thoai = '$dienthoai',
Email = '$email' WHERE  Ma_khach_hang='$ma'") === TRUE){
    echo "<p style='text-align: center; display:flex; justify-content: center; margin: 0 auto; color: green;'>Cập nhật thành công</p>";
            // Lấy lại dữ liệu mới để hiển thị
        $result = $conn->query("SELECT * FROM khach_hang WHERE Ma_khach_hang = '$ma'");
        if ($result && $result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
        }
}
else{
    echo "<p style='text-align: center; display:flex; justify-content: center; margin: 0 auto;'>Lỗi khi cập nhật</p>";
}
}

 ?>
<form action="update.php" method="post">
    <table>
    <tr>
        <td colspan="2">
            <h2><i>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</i></h2>
        </td>
    </tr>
    <tr>
        <td>Mã khách hàng: </td>
        <td><input type="text" name="ma_khach_hang" value="<?php echo $row['Ma_khach_hang'] ?>" readonly>
</td>
    </tr>
    <tr>
        <td>Tên khách hàng: </td>
        <td><input type="text" name="ten_khach_hang" value="<?php echo $row['Ten_khach_hang'] ?>"></td>
    </tr>
    <tr>
        <td>Phái: </td>
        <td> <label>
                    <input type="radio" name="Phai" value="0"
                        <?php if ($row['Phai'] == 0) echo 'checked'; ?>>
                    Nam
                </label>
                <label>
                    <input type="radio" name="Phai" value="1"
                        <?php if ($row['Phai'] == 1) echo 'checked'; ?>>
                    Nữ
                </label></td>
    </tr>
    <tr>
        <td>Địa chỉ: </td>
        <td><input type="text" name="dia_chi" value="<?php echo $row['Dia_chi'] ?>"></td>
    </tr>
    <tr>
        <td>Điện thoại: </td>
        <td><input type="text" name="dien_thoai" value="<?php echo $row['Dien_thoai'] ?>"></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><input type="text" name="email" value="<?php echo $row['Email'] ?>"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;background-color: yellow; padding: 5px 0;"><input type="submit" name="submit" value="Cập nhật"> </td>
    </tr>
    <tr><td>
        <a href="index212.php">Quay lại</a>
    </td></tr>
    </table>
</form>
<style>
    table{
        margin: 0 auto;
        background-color: #EFDDBE;
    }
    h2{
        color: brown;
        background-color: yellow;
    }
</style>