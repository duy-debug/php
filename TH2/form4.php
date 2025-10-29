<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        table{
        background-color: #FFE8FA;
        
    }
    h3{
        color: #fff;
        text-align: center;
    }
    input[type="submit"]{
        text-align: center;
        align-items: center;
        border: none;
    }
    input[type="text"]{
        border: 1px solid #88500D;
        border: none;
    }
    td{
        padding-left: 25px;
        padding-right:25px;
    }

</style>
<body>
    <?php
    $diemtoan = "";
    $diemly = "";
    $diemthoa = "";
    $diemchuan = "";
    $tongdiem = "";
    $ketquathi = "";
    if($_SERVER["REQUEST_METHOD"] === "POST"&&isset($_POST['xemketqua'])){
        $diemtoan = $_POST['diemtoan'];
        $diemly = $_POST['diemly'];
        $diemhoa = $_POST['diemhoa'];
        $diemchuan = $_POST['diemchuan'];
        if(is_numeric($diemtoan) && is_numeric($diemly) && is_numeric($diemhoa) && is_numeric($diemchuan) && $diemtoan >=0 && $diemly >=0 && $diemhoa >=0 && $diemchuan >=0){
            $tongdiem = $diemtoan + $diemly + $diemhoa;
            if($tongdiem >= $diemchuan && $diemtoan > 0 && $diemly > 0 && $diemhoa > 0){
                $ketquathi = "Đậu";
            }
            else{
                $ketquathi = "Rớt";
            }
        }
        else{
            $tongdiem = "Nhập chưa hợp lệ";
            $ketquathi = "Nhập chưa hợp lệ";
        }
    }
    ?>
    <form action="form4.php" method="post">
        <table>
            <tr>
                <td style=" background-color: #E25081;" colspan="2"><h3><i>KẾT QUẢ THI ĐẠI HỌC</i></h3></td>

            </tr>
            <tr>
                <td>Toán: </td>
                <td><input type="text" name="diemtoan" value="<?php echo isset($_POST['diemtoan']) ? $_POST['diemtoan'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Lý: </td>
                <td><input type="text" name="diemly"value="<?php echo isset($_POST['diemly']) ? $_POST['diemly'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Hóa: </td>
                <td><input type="text" name="diemhoa"value="<?php echo isset($_POST['diemhoa']) ? $_POST['diemhoa'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Điểm chuẩn: </td>
                <td><input style="color: red;" type="text" name="diemchuan"value="<?php echo isset($_POST['diemchuan']) ? $_POST['diemchuan'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Tổng điểm: </td>
                <td><input style="background-color: #FFF9DC;" type="text" name="tongdiem"value="<?php echo $tongdiem ?>" readonly></td>
            </tr>
            <tr>
                <td>Kết quả thi: </td>
                <td><input style="background-color: #FFF9DC;" type="text" name="ketquathi"value="<?php echo $ketquathi ?>"readonly></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input  type="submit" name="xemketqua" value="Xem kết quả"></td>
            </tr>
        </table>
    </form>
</body>
</html>