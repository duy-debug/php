<?php
try {
    if (!isset($_GET["id"])) {
        header("Location: index.php");
        exit;
    }
    $Ma_sua = $_GET["id"];
    $conn = new mysqli("localhost", "root", "84648337", "quan_ly_ban_sua", 3306);

    
    $data_sua = $conn->query("SELECT * FROM `sua` WHERE Ma_sua = '$Ma_sua'")->fetch_assoc();
    if ($data_sua) {
        $Ten_sua = $data_sua['Ten_sua'];
        $Trong_luong = $data_sua['Trong_luong'];
        $Don_gia = $data_sua['Don_gia'];
        $hangsua = $data_sua['Ma_hang_sua'];
        $loaisua = $data_sua['Ma_loai_sua'];
        $TP_Dinh_Duong = $data_sua['TP_Dinh_Duong'];
        $Loi_ich = $data_sua['Loi_ich'];
    }
    
    $data_hangsua = $conn->query("SELECT * FROM `hang_sua`;");
    $data_loaisua = $conn->query("SELECT * FROM `loai_sua`;");
} catch (mysqli_sql_exception) {
    echo "Truy vấn thất bại.";
}

if (isset($_POST["btnsend"])) {
    $Ma_sua = $_POST["Ma_sua"];
    $Ten_sua = $_POST["Ten_sua"];
    $Trong_luong = $_POST["Trong_luong"];
    $Don_gia = $_POST["Don_gia"];
    $hangsua = $_POST["hangsua"];
    $loaisua = $_POST["loaisua"];
    $TP_Dinh_Duong = $_POST["TP_Dinh_Duong"];
    $Loi_ich = $_POST["Loi_ich"];
    
    // Debug output
    echo "<!-- Debug POST: hangsua = " . $hangsua . " -->";
    echo "<!-- Debug POST: loaisua = " . $loaisua . " -->";
    $Hinh = "default.jpg";

    try {
        $sql = "UPDATE `sua` SET `Ten_sua`='$Ten_sua', `Ma_hang_sua`='$hangsua', `Ma_loai_sua`='$loaisua', `Trong_luong`='$Trong_luong', `Don_gia`='$Don_gia', `TP_Dinh_Duong`='$TP_Dinh_Duong', `Loi_ich`='$Loi_ich', `Hinh`='$Hinh' WHERE `Ma_sua`='$Ma_sua'";
        $data = $conn->query($sql);
        
        if ($data === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Cập nhật thất bại! Lỗi: " . $conn->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Cập nhật thất bại! Lỗi: " . $e->getMessage();
    }
}

function echoElements(&$var)
{
    if (isset($var)) {
        echo $var;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sữa</title>
    <style>
        h3 {
            text-align: center;
        }

        table {
            width: 500px;
        }

        td>input[type="text"] {
            width: 100%;
        }

        .note {
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <form action="update.php?id=<?php echo $Ma_sua; ?>" method="post">
            <table>
                <tr>
                    <td colspan="2">
                        <h3>CẬP NHẬT THÔNG TIN SỮA</h3>
                    </td>
                </tr>
                <tr>
                    <td>Mã sữa</td>
                    <td><input type="text" name="Ma_sua" readonly value="<?php echoElements($Ma_sua) ?>"></td>
                </tr>
                <tr>
                    <td>Tên sữa</td>
                    <td><input type="text" name="Ten_sua" required value="<?php echoElements($Ten_sua) ?>"></td>
                </tr>
                <tr>
                    <td>Hãng sữa</td>
                    <td>
                        <select name="hangsua">
                            <?php foreach ($data_hangsua as $item) { 
                                $selected = (trim($item["Ma_hang_sua"]) === trim($hangsua)) ? 'selected' : '';
                            ?>
                                <option value="<?= $item["Ma_hang_sua"] ?>">
                                    <?= $item["Ten_hang_sua"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Loại sữa</td>
                    <td>
                        <select name="loaisua">
                            <?php foreach ($data_loaisua as $item) { 
                            ?>
                                <option value="<?= $item["Ma_loai_sua"] ?>">
                                    <?= $item["Ten_loai"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Trọng lượng</td>
                    <td><input type="text" name="Trong_luong" required value="<?php echoElements($Trong_luong) ?>"></td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td><input type="text" name="Don_gia" required value="<?php echoElements($Don_gia) ?>"></td>
                </tr>
                <tr>
                    <td>Thành phần dinh dưỡng</td>
                    <td><input type="text" name="TP_Dinh_Duong" required value="<?php echoElements($TP_Dinh_Duong) ?>"></td>
                </tr>
                <tr>
                    <td>Lợi ích</td>
                    <td><input type="text" name="Loi_ich" required value="<?php echoElements($Loi_ich) ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Sửa sản phẩm" name="btnsend">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>