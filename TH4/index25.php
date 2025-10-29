<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
include_once("config.php");
//1. mo ket noi
$conn=new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM `sua` JOIN 
hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua JOIN
loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua");

if (!$result) {
    $error = "Error";
} else {
    $error = "New record created successfully";
}
?>
<style>
    table{
        width: 35%;
        margin: 0 auto;
        border-collapse: collapse;  
    }
    td{
        border: 1px solid #000000;
    }

    h3{
        text-align: center;
        color: orange;
        margin: 5px 5px;
    }
    img {
    width: 80px;
    height: auto;
    display: block;
    margin: 0px 40px;
}
p{
    margin: 1px 5px;
}
div{
    margin: 10px 5px;
}
</style>
<body>
    <table>
        <tr>
            <td style="background-color: #FEE0C1;" colspan="2"><h3>THÔNG TIN CÁC SẢN PHẨM</h3></td>
        </tr>
    <?php 
         while($row = mysqli_fetch_array($result)){?>
            <tr>
                    <td><img src="images/<?php echo $row['Hinh']; ?>" alt="<?php echo $row['Ten_sua']; ?>"></td>
                    <td>
                    <div>
                        <b><?php echo $row['Ten_sua'];?></b>
                    </div>
                    <p>Nhà sản xuất: <?php echo $row['Ten_hang_sua'];?></p>
                    <p><?php echo $row['Ten_loai'];?> - <?php echo $row['Trong_luong'];?> gr - <?php echo number_format($row['Don_gia']); ?> VNĐ</p>
                </td>
            </tr>
        <?php } ?>
        </table>
</body>
</html>