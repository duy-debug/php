<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
}

td {
    border: 1px solid #000;
}

h2 {
    text-align: center;
    color: rgb(148, 59, 19);
    background-color: #FEE0C1;
    width: 80%;
    margin: 0 auto;
    border: 1px solid #000;
    padding: 5px 0;
}

.tieude {
    font-weight: bold;
    font-size: 16px;
    min-height: 20px; /* Giúp chiều cao tiêu đề đều nhau */
    text-align: center;
}

.tieude1 {
    font-size: 14px;
    min-height: 20px; /* Giúp dòng mô tả giá/thể tích đều nhau */
    text-align: center;
}

img {
    display: block;
    margin: 10px auto;
    width: 100px;
    height: 120px; /* Giữ kích thước ảnh đồng đều */
    object-fit: contain;
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
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr>";
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        echo "<td>";
        echo "<div class='tieude'>" . $row['Ten_sua'] . "</div>";
        echo "<div class='tieude1'>" . $row['Trong_luong'] . " gr - " . number_format($row['Don_gia']) . " VNĐ</div>";
        echo "<img src='images/" . $row['Hinh'] . "' alt='" . $row['Ten_sua'] . "'>";
        echo "</td>";

        $count++;
        if ($count % 5 == 0) echo "</tr><tr>"; // Xuống dòng sau mỗi 5 sản phẩm
    }
    echo "</tr></table>";
}
?>
<body>
</body>
</html>