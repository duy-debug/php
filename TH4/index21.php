<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            border: 1px solid #000000;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        h2{
            text-align: center;
            color: #000000;
        }
        body{
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<?php 
include_once("config.php");
//1. mo ket noi
$conn=new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM `hang_sua`");

if (!$result) {
    $error = "Error";
} else {
    $error = "New record created successfully";
}
?>

<body>
    <table>
        <h2><i>THÔNG TIN HÀNG SỮA</i></h2>
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row["Ma_hang_sua"]; ?></td>
            <td><?php echo $row["Ten_hang_sua"]; ?></td>
            <td><?php echo $row["Dia_chi"]; ?></td>
            <td><?php echo $row["Dien_thoai"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>