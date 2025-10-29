<?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);


$result = $conn->query("SELECT DISTINCT khach_hang.* FROM khach_hang JOIN hoa_don ON khach_hang.Ma_khach_hang = hoa_don.Ma_khach_hang");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách khách hàng</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 30px auto;
            width: 80%;
            background-color: #FAF3E0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #E6D4B7;
        }
        h2 {
            text-align: center;
            color: brown;
            background-color: yellow;
        }
        a {
            display: block;
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h2>DANH SÁCH KHÁCH HÀNG</h2>

    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên KH</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['Ma_khach_hang']; ?></td>
            <td><?php echo $row['Ten_khach_hang']; ?></td>
            <td><?php echo $row['Phai']; ?></td>
            <td><?php echo $row['Dia_chi']; ?></td>
            <td><?php echo $row['Dien_thoai']; ?></td>
            <td><?php echo $row['Email']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="insert.php">← Quay lại trang thêm khách hàng</a>
</body>
</html>
