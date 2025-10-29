<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        table-layout: fixed; /* ✅ cố định kích thước cột */
    }
    td{
        border: 1px solid #000000;
        text-align: center;
    }
    img{
        width: 120px;
        height: 120px;

    }
    .tieude{
        font-weight: bold;
    }
    .content{
        font-size: 14px;
        margin-top: 5px;
    }
    h2{
        text-align: center;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        border-top: 1px solid #000;
        width: 80%;
        margin: 0 auto;
        color: orange;
        background-color: #FEE0C1;
    }
</style>
<?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM sua");
if(!$result){
    $error = "Error";
}
else{
    $error = "New record created successfully";
}
echo "<h2>THÔNG TIN CÁC SẢN PHẨM</h2>";
if(mysqli_num_rows($result)>0){
    $count = 0;
    echo "<table> <tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<td>";
        echo "<div class ='tieude'>"."<a href='details.php?id=".$row['Ma_sua']."'>".$row['Ten_sua']."</a>"."</div>";
        echo "<p class = 'content'>".$row['Trong_luong']."gr - ".number_format($row['Don_gia'])."VNĐ"."</P>";
        echo "<img src='images/".$row['Hinh']."'alt='".$row['Ten_sua']."'>";
        echo "</td>";
        $count++;
        if($count % 5 ==0) echo "<tr></tr>";
    }
    echo "</tr></table>";
}
?>
<body>
</body>
</html>