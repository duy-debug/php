<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng và tính toán</title>
</head>
<?php
function taoMang($n) {
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = rand(0, 20);
    }
    return $arr;
}

function xuatMang($arr) {
    return implode(" ", $arr);
}

function tinhTong($arr) {
    return array_sum($arr);
}

function timMin($arr) {
    return min($arr);
}

function timMax($arr) {
    return max($arr);
}


$n = "";
$mang = "";
$tong = $max = $min = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $n = $_POST['sophantu'];

    if (!is_numeric($n) || $n <= 0 || floor($n) != (int)$n) {
        echo "<p style='text-align:center; color:red;'>Vui lòng nhập số nguyên dương hợp lệ!</p>";
    } else {
        $n = (int)$n;
        $arr = taoMang($n);
        $mang = xuatMang($arr);
        $tong = tinhTong($arr);
        $max = timMax($arr);
        $min = timMin($arr);
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

}
?>
<body>
    <center>
        <form action="mang_phat_sinh_tinh_toan.php" method="post">
            <table>
                <tr>
                    <th colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
                </tr>
                <tr>
                    <td>Nhập số phần tử:</td>
                    <td><input style="background-color: #fff !important;" type="text" name="sophantu" value="<?php echo $n; ?>" require></td>
                </tr>
                <tr>
                    <td></td>
                    <td ><input style="background-color: yellow;" type="submit" name="submit" value="Phát sinh và tính toán"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><input style="width: 300px;" type="text" name="mang" value="<?php echo $mang; ?>" readonly></td>
                </tr>
                <tr>
                    <td>GTLN (MAX) trong mảng:</td>
                    <td><input class="output" type="text" name="gtln" value="<?php echo $max; ?>" readonly></td>
                </tr>
                <tr>
                    <td>GTNN (MIN) trong mảng:</td>
                    <td><input class="output" type="text" name="gtnn" value="<?php echo $min; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td><input class="output" type="text" name="tongmang" value="<?php echo $tong; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2"><i>(<span>Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</i></td>
                </tr>
            </table>
        </form>
    </center>
</body>
<style>
    th{
        color: #fff;
        background-color: pink;
    }
    table{
            border: 1px solid #000000;
    }
    input[type='text']{
        background-color: pink;
    }
    .output{
        width: 50px;
    }
    span{
        color: red;
    }
</style>
</html>
