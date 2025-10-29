    <?php
    include_once("config.php");
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = "";
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
    $check = $conn->query("SELECT * FROM hoa_don WHERE Ma_khach_hang = '$ma'");
    if ($check && $check->num_rows > 0) {
        echo "<p style='color:red; text-align:center;'>Khách hàng này đã mua hàng, không thể xóa!</p>";
    } else {
        if($conn->query("DELETE FROM khach_hang WHERE Ma_khach_hang = '$ma'") === TRUE){
            echo "<p style='color:green; text-align:center;'>Xóa khách hàng thành công!</p>";
            $row = null;
        } else {
            echo "<p style='color:red; text-align:center;'>Lỗi khi xóa khách hàng!</p>";
        }
    }
}

    ?>
<?php if ($row) { ?>   

<form action="delete.php" method="post">
    <table>
    <tr>
        <td colspan="2">
            <h2><i>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</i></h2>
        </td>
    </tr>
    <tr>
        <td>Mã khách hàng: </td>
        <td><input type="text" name="ma_khach_hang" value="<?php echo $row['Ma_khach_hang'] ?>" readonly></td>
    </tr>
    <tr>
        <td>Tên khách hàng: </td>
        <td><input type="text" name="ten_khach_hang" value="<?php echo $row['Ten_khach_hang'] ?>"></td>
    </tr>
    <tr>
        <td>Phái: </td>
        <td>
            <label>
                <input type="radio" name="Phai" value="0" <?php if ($row['Phai'] == 0) echo 'checked'; ?>> Nam
            </label>
            <label>
                <input type="radio" name="Phai" value="1" <?php if ($row['Phai'] == 1) echo 'checked'; ?>> Nữ
            </label>
        </td>
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
        <td colspan="2" style="text-align: center;background-color: yellow; padding: 5px 0;">
            <input type="submit" name="submit" value="Xóa">
        </td>
    </tr>
    <tr><td><a href="index212.php">Quay lại</a></td></tr>
    </table>
</form>

<?php } ?>
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