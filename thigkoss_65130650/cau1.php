<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include_once("config.php");
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM sua WHERE Don_gia > 100000 ORDER BY Don_gia DESC");
$result1 = $conn->query("SELECT * FROM sua JOIN hang_sua ON hang_sua.Ma_hang_sua=sua.Ma_hang_sua WHERE Trong_luong!=900");
$stmt="";
$row_per_page = 5;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
if ($page < 1) $page = 1;
$start_at = ($page - 1) * $row_per_page;

$result = $conn->query("SELECT COUNT(*) AS total FROM sua WHERE Don_gia > 100000 ORDER BY Don_gia DESC $stmt");
$row = $result->fetch_assoc();
$count = $row['total'];
$sql = "SELECT * FROM sua WHERE Don_gia > 100000 ORDER BY Don_gia DESC $stmt LIMIT $row_per_page OFFSET $start_at";
$result = $conn->query($sql);
    ?>
<center>
        <table>
        <tr>
            <th>Tên sữa</th>
            <th>Đơn giá</th>
            <th>Trọng lượng</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr><td> <?php echo $row['Ten_sua']; ?></td>
            <td> <?php echo number_format($row['Don_gia']); ?> VNĐ</td>
            <td><?php echo $row['Trong_luong']; ?></td>
            </tr>
        <?php }?>
    </table>
                    <div class="pagination" style="margin-top: 10px;">
        <?php
        $total_pages = (int) ceil($count / $row_per_page);
    
        if ($page > 1) {
            echo "<a href='?page=1' style='margin: 0 5px;'><<</a>";
            echo "<a href='?page=" . ($page - 1) . "' style='margin: 0 5px;'><</a>";
        }
    
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<strong style='margin: 0 5px;'>" . $i . "</strong>";
            } else {
                echo "<a href='?page=" . $i . "' style='margin: 0 5px;'>" . $i . "</a>";
            }
        }
    
        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "' style='margin: 0 5px;'>></a>";
            echo "<a href='?page=" . $total_pages . "' style='margin: 0 5px;'>>></a>";
        }
        ?>
    </div>
</center>

<center>
    <br>
        <table>
        <tr>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Trọng lượng</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result1)){ ?>
            <tr><td> <?php echo $row['Ten_hang_sua']; ?></td>
            <td> <?php echo $row['Dia_chi']; ?></td>
            <td><?php echo $row['Dien_thoai']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Trong_luong']; ?></td>
            </tr>
        <?php }?>

    </table>

</center>

</body>
<style>
    table{
        border-collapse: collapse;
        width: 40%;
    }
    th,td{
        border: 1px solid #000000;
    }
    tr:first-child {
        text-align: center;
        background-color: blue;
        color: #fff;
    }

    tr:nth-of-type(even) td {
        background-color: #FEE0C1;
    }
</style>
</html>