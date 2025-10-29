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
        $bankinh = "";
        $dientich = "";
        $chuvi = "";
        const PI = 3.14;
        if($_SERVER["REQUEST_METHOD"] === "POST"&&isset($_POST['tinhtoan'])){
            $bankinh = $_POST['bankinh'];
            if(is_numeric($bankinh) && $bankinh>0){
                $dientich = PI * $bankinh * $bankinh;
                $chuvi = 2 * PI * $bankinh;
            }   
            else{
                $dientich = "Nhập đúng định dạng số";
                $chuvi = "Nhập đúng định dạng số";
        }
    }
    ?>
    <form action="form2.php" method="post">
        <table>
            <tr>
                <td style="background-color: #FFDA7B;" colspan="2"><h3>DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h3></td>
            </tr>
            <tr>
                <td>Bán kính: </td>
                <td><input type="text" name="bankinh" value="<?php echo isset($_POST['bankinh']) ? $_POST['bankinh'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td><input style="background-color: #FDD9D9;" type="text" name="dientich"value="<?php echo $dientich; ?>" readonly></td>
            </tr>
            <tr>
                <td>Chu vi: </td>
                <td><input style="background-color: #FDD9D9;" type="text" name="chuvi"value="<?php echo $chuvi; ?>" readonly></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="tinhtoan" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>