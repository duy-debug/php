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
        }
        th{
            color: red;
        }
        tr:nth-of-type(even) td {
            background-color: #FEE0C1;
        }
        tr:nth-of-type(odd) td {
            background-color: transparent;
        }
        .gender-icon {
            width: 30px;
            height: 30px;
            object-fit: contain;
        }
        img{
            display: block;
            margin: 0 auto;
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

$result = $conn->query("SELECT * FROM `khach_hang`");

if (!$result) {
    $error = "Error";
} else {
    $error = "New record created successfully";
}
$femaleIcon = 'images/famale.png';
$maleIcon = 'images/male.png';
?>

<body>
<h2>THÔNG TIN KHÁCH HÀNG</h2>
    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row["Ma_khach_hang"]; ?></td>
            <td><?php echo $row["Ten_khach_hang"]; ?></td>
            <td style="text-align: center;">
                <?php if ((string)$row["Phai"] === "1") { ?>
                    <img class="gender-icon" src="<?php echo $femaleIcon; ?>" alt="Nữ">
                <?php } else { ?>
                    <img class="gender-icon" src="<?php echo $maleIcon; ?>" alt="Nam">
                <?php } ?>
            </td>
            <td><?php echo $row["Dia_chi"]; ?></td>
            <td><?php echo $row["Dien_thoai"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>