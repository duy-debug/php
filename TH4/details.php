<?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$result = $conn->query("SELECT * FROM sua WHERE Ma_sua = '$id'");
if(!$result){
    $error = "Error";
}
else{
    $error = "New record created successfully";
}
echo "<table>";
$row = mysqli_fetch_array($result);
    echo "<tr>"."<td style='text-align: center;color: orange;
        background-color: #FEE0C1; font-size: 40px; ' colspan='2'>".$row['Ten_sua']."</td>";
    echo "</tr>";
    echo "<tr><td>"."<img src='images/".$row['Hinh']."'alt='".$row['Ten_sua']."'>"."</td>";
    echo "<td>"."<b>Thành phần dinh dưỡng:</b>"."</br>".$row['TP_Dinh_Duong']."</br>"."<b>Lợi ích:</b>"."</br>".$row['Loi_ich']."</br>"."<b>Trọng lượng: </b>".$row['Trong_luong']."gr -"."<b>Đơn giá: </b>".number_format($row['Don_gia'])."</td>"."</tr>";
    echo "<tr><td><a href='index27.php'>Quay về</a></td><td class='footer-right'></td></tr>";
echo "</table>";
?>
<style>
    table{
        width: 50%;
        margin: 0 auto;
        border: 5px solid brown;
    }
    td{
        border: 1px solid #000000;
    }
    img{
        width: 120px;
        height: 120px;
        margin: 20px;
    }
    .footer-right{
        border: none !important;
    }
    .tl{

    }
    a{
        float: right;
    }

</style>