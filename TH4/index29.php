<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><i>TÌM KIẾM THÔNG TIN SỮA</i></h2>
    <form action="index29.php" method="post">
<div class="tb2">
        <table>
            <tr>
                <td style="color: #E25081; font-weight: bold;background-color: pink;">Tên sữa: </td>
                <td><input type="text" name="ten_sua" value = "<?php echo isset($_POST['ten_sua']) ? $_POST['ten_sua'] : ''?>" required></td>
                <td><input type="submit" value="Tìm kiếm"></td>
            </tr>
        </table>
</div>
    </form>
</body>
<?php
include_once("config.php");
if($_SERVER["REQUEST_METHOD"] ==  "POST" && isset($_POST['ten_sua'])){
    $ten_sua = $_POST['ten_sua'];
    if(empty($ten_sua)){
        echo "<div>Vui lòng nhập tên sữa cần tìm kiếm</div>";
    }
    else{
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query("SELECT * FROM sua WHERE Ten_sua LIKE '%".$_POST['ten_sua']."%'");
        if($result->num_rows > 0){
            echo "<div>Có <b>" .$result->num_rows. "</b> sản phẩm được tìm thấy</div>";
            echo "<table class='tb'><tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<td style='text-align: center; font-weight: bold; font-size: 25px; color: orange; background-color: #FEEFE6;' colspan='2'>".$row['Ten_sua']."</td></tr>";
                echo "<tr><td><img src='images/".$row['Hinh']."'></td>";
                echo "<td><b><i>Thành phần dinh dưỡng: </i></b><br>".$row['TP_Dinh_Duong']."<br><b><i>Lợi ích: </i></b><br>".$row['Loi_ich']."<br><b><i>Trọng lượng: </i></b>".$row['Trong_luong']." gr - "."<b><i>Đơn giá: </i></b>".number_format($row['Don_gia'])." VNĐ"."</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "<div class='mes'>Không tìm thấy sản phẩm nào</div>";
        }
    }
}
?>
<style>
    h2{
        text-align: center;
        background-color: pink;
        color: #E25081;
        width: 40%;
        margin: 0 auto;

    }
    .tb{
        width: 40%;
        margin: 20px auto;
        border: 2px solid brown;

    }
    tr,td{
        border: 1px solid #000000;
    }
    div{
        text-align: center;
        font-weight: bold;
    }
    table{
        margin: 0 auto;
    }
    img{
        width: 120px;
        height: 120px;
        margin: 0 auto;
        display: block;
    }
    .tb2{
        background-color: pink !important;
        margin-top: -20px;
    }
    body{
        background-color: #FDFEF0;
    }
</style>
</html>