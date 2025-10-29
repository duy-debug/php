<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        table{
        background-color: #FFF9DC;
        
    }
    h3{
        color: #88500D;
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

    $tenchuho = "";
    $chisocu = "";
    $chisomoi = "";
    $dongia = 2000;
    $thanhtoan = "";
    if($_SERVER["REQUEST_METHOD"] === "POST"&&isset($_POST['tinhtoan'])){
        $tenchuho = $_POST['tenchuho'];
        $chisocu = $_POST['chisocu'];
        $chisomoi = $_POST['chisomoi'];
        if(is_numeric($chisocu) && is_numeric($chisomoi) && $chisomoi > $chisocu){
            $thanhtoan = ($chisomoi - $chisocu) * $dongia;
        }   
        else{
            $thanhtoan = "Chưa hợp lệ";
        }
    }
    ?>
    <form action="form3.php" method="post">
        <table>
            <tr>
                <td style="background-color: #FFDA7B;" colspan="3"><h3>THANH TOÁN TIỀN ĐIỆN</h3></td>
            </tr>
            <tr>
                <td>Tên chủ hộ: </td>
                <td><input type="text" name="tenchuho" value="<?php echo isset($_POST['tenchuho']) ? $_POST['tenchuho'] : ''?>" required></td>
                <td></td>
            </tr>
            <tr>
                <td>Chỉ số cũ: </td>
                <td><input type="text" name="chisocu" value="<?php echo isset($_POST['chisocu']) ? $_POST['chisocu'] : ''?>" required></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới: </td>
                <td><input type="text" name="chisomoi"value="<?php echo isset($_POST['chisomoi']) ? $_POST['chisomoi'] : ''?>" required></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="number" name="dongia"value="<?php echo $dongia ?>"></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td><input style="background-color: #FDD9D9;" type="text" name="thanhtoan" value="<?php echo $thanhtoan ?>"readonly></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3"><input type="submit" name="tinhtoan" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>