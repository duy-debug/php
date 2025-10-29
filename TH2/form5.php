<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        table{
        background-color: #02B1B6;
        
    }
    h3{
        color: #fff;
        text-align: center;
    }
    input[type="submit"]{
        text-align: center;
        align-items: center;
        background-color: #FFF9DC;
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
    $giobatdau = "";
    $gioketthuc = "";
    $tienthanhtoan = "";
    if($_SERVER["REQUEST_METHOD"] === "POST"&&isset($_POST['tinhtien'])){
        $giobatdau = $_POST['giobatdau'];
        $gioketthuc = $_POST['gioketthuc'];
        if($giobatdau != "" && $gioketthuc != ""){
            $start = explode(":", $giobatdau);
            $end = explode(":", $gioketthuc);
            $startHour = (int)$start[0];
            $startMinute = (int)$start[1];
            $endHour = (int)$end[0];
            $endMinute = (int)$end[1];
            if($endHour < $startHour || ($exndHour == $startHour && $endMinute <= $startMinute)){
                $tienthanhtoan = "Giờ kết thúc phải sau giờ bắt đầu";
            }
            else{
                $totalMinutes = ($endHour * 60 + $endMinute) - ($startHour * 60 + $startMinute);
                $hours = intdiv($totalMinutes, 60);
                $minutes = $totalMinutes % 60;
                if($minutes > 0){
                    $hours += 1; 
                }
                if($hours <= 1){
                    $tienthanhtoan = 20000;
                }
                elseif($hours <= 3){
                    $tienthanhtoan = 20000 + ($hours - 1) * 30000;
                }
                else{
                    $tienthanhtoan = 20000 + 2 * 30000 + ($hours - 3) * 40000;
                }
            }
        }
        else{
            $tienthanhtoan = "Vui lòng nhập đầy đủ giờ";
        }
    }
    
    ?>
    <form action="form5.php" method="post">
        <table>
            <tr>
                <td style=" background-color: #0C8D8E;" colspan="3"><h3><i>TÍNH TIỀN KARAOKE</i></h3></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input type="time" name="giobatdau" value="<?php echo $giobatdau ?>"></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type="time" name="gioketthuc"value="<?php echo $giobatdau ?>"></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input style="background-color: #FFF9DC;" type="text" name="tienthanhtoan" value="<?php echo $tienthanhtoan ?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3"><input type="submit" name="tinhtien" value="Tính tiền"></td>
            </tr>
        </table>
    </form>
</body>
</html>