<?php
$stmt="";
if (isset($_POST["btnsend"])) {
    $loaisua = $_POST["loaisua"];
    $hangsua = $_POST["hangsua"];
    $keyword = $_POST["keyword"];

    $is_and = false;

    if (!empty($keyword)) {
        if ($is_and) {
            $stmt .= " AND sua.Ten_sua LIKE '%$keyword%'";
        } else {
            $stmt .= "WHERE sua.Ten_sua LIKE '%$keyword%'";
            $is_and = true;
        }
    }

    if (!empty($loaisua)) {
        if ($is_and) {
            $stmt .= " AND sua.Ma_loai_sua = '$loaisua'";
        } else {
            $stmt .= "WHERE sua.Ma_loai_sua = '$loaisua'";
            $is_and = true;
        }
    }

    if (!empty($hangsua)) {
        if ($is_and) {
            $stmt .= " AND sua.Ma_hang_sua = '$hangsua'";
        } else {
            $stmt .= "WHERE sua.Ma_hang_sua = '$hangsua'";
            $is_and = true;
        }
    }
}

function echoElements(&$var)
{
    if (isset($var)) {
        echo $var;
    }
}

try {
    $conn = new mysqli("localhost", "root", "", "ql_ban_sua", 3306);

    $data_hangsua = $conn->query("SELECT * FROM `hang_sua`;");
    $data_loaisua = $conn->query("SELECT * FROM `loai_sua`;");

    $row_per_page = 5;
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    if ($page < 1) $page = 1;
    $start_at = ($page - 1) * $row_per_page;
    
    $result = $conn->query("SELECT COUNT(*) AS total FROM sua JOIN hang_sua ON hang_sua.Ma_hang_sua = sua.Ma_hang_sua JOIN loai_sua ON loai_sua.Ma_loai_sua = sua.Ma_loai_sua $stmt");
    $row = $result->fetch_assoc();
    $count = $row['total'];

    $data = $conn->query("SELECT * FROM sua JOIN hang_sua ON hang_sua.Ma_hang_sua = sua.Ma_hang_sua JOIN loai_sua ON loai_sua.Ma_loai_sua = sua.Ma_loai_sua $stmt LIMIT $row_per_page OFFSET $start_at");
} catch (mysqli_sql_exception) {
    echo "Kết nối không thành công.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        h2 {
            color: #000000;
        }

        table {
            border-collapse: collapse;
            width: 900px;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 2px 5px;
        }

        th {
            color: #000000;
            background-color: #FFFFFF;
            text-align: center;
        }

        tr:nth-child(odd) {
            background-color: #FFFFFF;
        }

        tr:nth-child(even) {
            background-color: #FFFFFF;
        }
    </style>
</head>

<body>
    <center>
        <form action="index.php" method="post">
            <table>
                <tr>
                    <th colspan="2">
                        <h3>THÔNG TIN SỮA</h3>
                    </th>
                </tr>
                <tr>
                    <th>
                        Hãng sữa:
                        <select name="hangsua">
                            <option value="">Tất cả</option>
                            <?php foreach ($data_hangsua as $key) { ?>
                                <option value="<?= $key["Ma_hang_sua"] ?>" <?= $key["Ma_hang_sua"] == $hangsua ? "selected" : "" ?>>
                                    <?= $key["Ten_hang_sua"] ?>
                                </option>
                            <?php } ?>
                        </select>
                        Loại sữa:
                        <select name="loaisua">
                            <option value="">Tất cả</option>
                            <?php foreach ($data_loaisua as $key) { ?>
                                <option value="<?= $key["Ma_loai_sua"] ?>" <?= $key["Ma_loai_sua"] == $loaisua ? "selected" : "" ?>>
                                    <?= $key["Ten_loai"] ?>
                                </option>
                            <?php } ?>
                        </select>
                        Tên sữa:
                        <input type="text" name="keyword">
                        <input type="submit" value="Tìm kiếm" name="btnsend">
                        <a href="insert.php">
                            <button type="button">Thêm</button>
                        </a>
                    </th>
                </tr>
            </table>
        </form>
        <table>
            <?php
            if (empty($data)) {
                echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
            } else {
            ?>
                <tr>
                    <th>Mã sữa</th>
                    <th>Tên sữa</th>
                    <th>Tên loại</th>
                    <th>Tên hãng sữa</th>
                    <th>Đơn giá</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                <?php
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?= $row["Ma_sua"] ?></td>
                        <td><?= $row["Ten_sua"] ?></td>
                        <td><?= $row["Ten_loai"] ?></td>
                        <td><?= $row["Ten_hang_sua"] ?></td>
                        <td><?= $row["Don_gia"] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row["Ma_sua"] ?>">
                                <button type="button">Sửa</button>
                            </a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $row["Ma_sua"] ?>">
                                <button type="button">Xoá</button>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
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
</body>

</html>