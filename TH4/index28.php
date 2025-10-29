<?php
include_once("config.php");
include_once("Pager.php");

$conn = new mysqli($servername, $username, $password, $dbname);
$result_all = $conn->query("SELECT * FROM sua");
$num_row = $result_all->num_rows;

$pager = new Pager();
$limit = 2;
$start = $pager->findStart($limit);
$pages = $pager->findPages($num_row, $limit);

$result = $conn->query("SELECT * FROM sua LIMIT $start, $limit");

if(!$result){
    $error = "Error";
} else {
    $error = "New record created successfully";
}

// ✅ Hiển thị danh sách sản phẩm
while($row = mysqli_fetch_array($result)){
    echo "<table>";
    echo "<tr><td style='text-align: center;color: orange;
        background-color: #FEE0C1; font-size: 25px;' colspan='2'>".$row['Ten_sua']."</td></tr>";
    echo "<tr><td><img src='images/".$row['Hinh']."' alt='".$row['Ten_sua']."'></td>";
    echo "<td><i>Thành phần dinh dưỡng:</i><br>".$row['TP_Dinh_Duong']."<br>".
         "<i>Lợi ích:</i><br>".$row['Loi_ich']."<br>".
         "<i>Trọng lượng: </i><span>".$row['Trong_luong']."</span> gr - ".
         "<i>Đơn giá: </i><span>".number_format($row['Don_gia'])."</span></td></tr>";
    echo "</table>";
}

// ✅ Thanh phân trang ở giữa, cách đều, đẹp
echo "<div class='pagination'>";
echo $pager->pageList($_GET['page'] ?? 1, $pages);
echo "</div>";
?>
<style>
    table {
        width: 50%;
        margin: 1px auto;
        border-collapse: collapse;
    }
    td {
        border: 1px solid #000000;
    }
    img {
        width: 120px;
        height: 120px;
        margin: 15px 15px;
    }
    span {
        color: red;
    }
    i {
        font-weight: bold;
    }
    .pagination {
        text-align: center;
        font-size: 20px;
    }
</style>
