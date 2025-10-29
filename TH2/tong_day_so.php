<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
function tinh_tong($arr){
    $sum=0;
    for($i=0; $i<count($arr); $i++){
        $sum = $sum + $arr[$i];
    }
    return $sum;
}
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $arr = $_POST['mang'];
    $mang = array_map('trim',explode(",",$arr));
    $tong = tinh_tong($mang);
}
?>
<body>
<center>
        <form action="tong_day_so.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2><i>NHẬP VÀ TÍNH TRÊN DÃY SỐ</i></h2></td>
            </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" name="mang" value="<?php echo isset($arr)?$arr:''; ?>" required><span>(*)</span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tổng dãy số"></td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input style="color: red; width: 80px;" type="text" value="<?php echo isset($tong)?$tong:''; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><span>(*)</span> Các số được nhập cách bằng dấu ","</td>
            </tr>
        </table>
    </form>
</center>
</body>
<style>
    input[type="submit"]{
        background-color: yellow;
    }
    span{
        color: red;
    }
    tr:first-child{
        background-color: blue;
        text-align: center;
    }
    table{
        background-color: #CAD6CD;
    }
</style>
</html>