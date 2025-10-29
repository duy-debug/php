<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    th, td {
        border: 1px solid #000000;
    }
    table {
        border-collapse: collapse;
        width: 60%;
        margin: 0 auto;
    }
    h2 {
        text-align: center;
        color: rgb(148, 59, 19);
    }
    th {
        color:rgb(148, 59, 19);
    }
    tr:nth-of-type(even) td{
        background-color: #fff;
        color: rgb(148, 59, 19);
    }
    tr:nth-of-type(odd) td,th{
        background-color: #FEE0C1;
    }
</style>
<?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);
// Cấu hình phân trang
$rowPerPage = 5; // số dòng mỗi trang
if ( ! isset($_GET['page']))
{
    $_GET['page'] = 1;
}
$offset =($_GET['page']-1)*$rowPerPage;
$result = $conn->query("SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia
 FROM sua 
 JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
 JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
 LIMIT $offset, $rowPerPage");
 // 👉 THÊM: tính tổng số trang
$totalRows = $conn->query("SELECT COUNT(*) AS total FROM sua")->fetch_assoc()['total'];
$maxPage = ceil($totalRows / $rowPerPage);
?>
<body>
<h2><i>THÔNG TIN SỮA</i></h2>
    <table>
    <tr>
        <th>Số TT</th>
        <th>Tên sữa</th>
        <th>Hãng sữa</th>
        <th>Loại sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
    </tr>
        <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)){ ?>
            <?php $i++; ?>
            <tr>
            <td style="text-align: center;"><?php echo $i;?></td>
            <td><?php echo $row['Ten_sua']; ?></td>
            <td><?php echo $row['Ten_hang_sua']; ?></td>
            <td><?php echo $row['Ten_loai'];?></td>
            <td><?php echo $row['Trong_luong'] . ' gram'; ?></td>
            <td><?php echo number_format((int)$row['Don_gia'], 0, ',', '.') . ' VNĐ'; ?></td>
            </tr>
            <?php
            }
        ?>
    </table>
<!-- 👉 THÊM THANH PHÂN TRANG -->
<div style="text-align:center; margin-top:10px;">
    <?php
    if ($_GET['page'] > 1) {
        echo "<a href='?page=".($_GET['page']-1)."' style='margin-right:10px;'><<<</a>";
    }
    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page'])
            echo "<strong>$i</strong> ";
        else
            echo "<a href='?page=$i'>$i</a> ";
    }

    if ($_GET['page'] < $maxPage) {
        echo "<a href='?page=".($_GET['page']+1)."' style='margin-left:10px;'>>>></a>";
    }
    ?>
</div>
</body>
</html>