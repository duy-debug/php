<?php
try {
    if (!isset($_GET["id"])) {
        header("Location: index.php");
        exit;
    }
    $Ma_sua = $_GET["id"];
    $conn = new mysqli("localhost", "root", "84648337", "quan_ly_ban_sua", 3306);

    $data_sua = $conn->query("SELECT s.*, h.Ten_hang_sua, l.Ten_loai 
                             FROM sua s 
                             JOIN hang_sua h ON s.Ma_hang_sua = h.Ma_hang_sua 
                             JOIN loai_sua l ON s.Ma_loai_sua = l.Ma_loai_sua 
                             WHERE Ma_sua = '$Ma_sua'")->fetch_assoc();
    if ($data_sua) {
        $Ten_sua = $data_sua['Ten_sua'];
        $Trong_luong = $data_sua['Trong_luong'];
        $Don_gia = $data_sua['Don_gia'];
        $Ten_hang_sua = $data_sua['Ten_hang_sua'];
        $Ten_loai = $data_sua['Ten_loai'];
        $TP_Dinh_Duong = $data_sua['TP_Dinh_Duong'];
        $Loi_ich = $data_sua['Loi_ich'];
    } else {
        header("Location: index.php");
        exit;
    }
} catch (mysqli_sql_exception) {
    echo "Truy vấn thất bại.";
}

if (isset($_POST["btndelete"])) {
    try {
        $sql = "DELETE FROM `sua` WHERE `Ma_sua`='$Ma_sua'";
        $data = $conn->query($sql);
        
        if ($data === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Xoá thất bại! Lỗi: " . $conn->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Xoá thất bại! Lỗi: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá sản phẩm sữa</title>
    <style>
        h3 {
            text-align: center;
            color: red;
        }

        table {
            width: 500px;
        }

        td>input[type="text"] {
            width: 100%;
            background-color: #f0f0f0;
        }

        .note {
            text-align: center;
        }

        .warning {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-delete {
            background-color: red;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>
    <center>
        <form action="delete.php?id=<?php echo $Ma_sua; ?>" method="post">
            <table>
                <tr>
                    <td colspan="2">
                        <h3>XÓA THÔNG TIN SỮA</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="warning">
                        ⚠️ Bạn có chắc chắn muốn xóa sản phẩm này?
                    </td>
                </tr>
                <tr>
                    <td>Mã sữa</td>
                    <td><input type="text" disabled value="<?php echo $Ma_sua ?>"></td>
                </tr>
                <tr>
                    <td>Tên sữa</td>
                    <td><input type="text" disabled value="<?php echo $Ten_sua ?>"></td>
                </tr>
                <tr>
                    <td>Hãng sữa</td>
                    <td><input type="text" disabled value="<?php echo $Ten_hang_sua ?>"></td>
                </tr>
                <tr>
                    <td>Loại sữa</td>
                    <td><input type="text" disabled value="<?php echo $Ten_loai ?>"></td>
                </tr>
                <tr>
                    <td>Trọng lượng</td>
                    <td><input type="text" disabled value="<?php echo $Trong_luong ?>"></td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td><input type="text" disabled value="<?php echo $Don_gia ?>"></td>
                </tr>
                <tr>
                    <td>Thành phần dinh dưỡng</td>
                    <td><input type="text" disabled value="<?php echo $TP_Dinh_Duong ?>"></td>
                </tr>
                <tr>
                    <td>Lợi ích</td>
                    <td><input type="text" disabled value="<?php echo $Loi_ich ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="Xác nhận xóa" name="btndelete" class="btn-delete">
                        <a href="index.php" style="margin-left: 10px; text-decoration: none;">Hủy</a>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
