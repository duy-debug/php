<?php
include_once("config.php");

// Nếu người dùng ấn nút tìm kiếm
if (isset($_POST['submit'])) {
    $ten_khach_hang = trim($_POST['ten_khach_hang']);
}

if (!empty($ten_khach_hang)) {
    $stmt = "WHERE Ten_khach_hang LIKE '%$ten_khach_hang%'";
} else {
    $stmt = "";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<div class='mes'>Lỗi kết nối CSDL: " . $conn->connect_error . "</div>");
}


$row_per_page = 5;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
if ($page < 1) $page = 1;
$start_at = ($page - 1) * $row_per_page;

$result = $conn->query("SELECT COUNT(*) AS total FROM khach_hang $stmt");
$row = $result->fetch_assoc();
$count = $row['total'];
$sql = "SELECT * FROM khach_hang $stmt LIMIT $row_per_page OFFSET $start_at";
$result = $conn->query($sql);



function echoValue(&$var)
{
    if (isset($var)) echo $var;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <style>
        h2 {
            text-align: center;
            margin: 0 auto;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 1200px;
            ;
        }

        th {
            color: brown;
            border: 1px solid #000000;
            padding: 5px 10px;
        }

        td {
            border: 1px solid #000000;
            padding: 5px 10px;
        }

        tr:nth-of-type(even) td {
            background-color: #FEE0C1;
        }

        .tb {
            width: 50%;
            margin: 15px auto;
            border: 2px solid brown;
        }

        .tb td {
            border: 1px solid brown;
        }

        .mes {
            text-align: center;
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body>
    <form action="index212.php" method="post">
        <table>
            <h2>THÔNG TIN KHÁCH HÀNG</h2>
            <tr>
                <td>
                    <a href="insert.php">Thêm</a>
                </td>
                <td style="padding: 10px;">
                    <input type="text" name="ten_khach_hang" placeholder="Nhập tên khách hàng" value="<?php echoValue($ten_khach_hang) ?>">
                    <button type="submit" name="submit">Tìm kiếm</button>
                </td>
            </tr>
        </table>
    </form>



    <!-- Hiển thị toàn bộ danh sách khách hàng -->
    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['Ma_khach_hang'] ?></td>
                <td><?php echo $row['Ten_khach_hang'] ?></td>
                <td style="text-align: center;"><?php echo ($row['Phai'] == 1) ? "Nữ" : "Nam"; ?></td>
                <td><?php echo $row['Dia_chi'] ?></td>
                <td><?php echo $row['Dien_thoai'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td style="text-align:center;">
                    <a href="update.php?id=<?php echo $row['Ma_khach_hang']; ?>">Sửa</a>
                </td>
                <td style="text-align:center;">
                    <a href="delete.php?id=<?php echo $row['Ma_khach_hang']; ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<center>
    
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
</body>

</html>