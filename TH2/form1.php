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

</style>
<body>
    <?php
    $chieudai = "";
    $chieurong = "";
    $dientich = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST"&&isset($_POST['tinhtoan'])) {
        $chieudai = $_POST['chieudai'];
        $chieurong = $_POST['chieurong'];
        if (is_numeric($chieudai) && is_numeric($chieurong) && $chieudai > $chieurong && $chieudai > 0 && $chieurong > 0) {
            $dientich = $chieudai * $chieurong;
        } else {
            $dientich = "Nhập đúng định dạng số";
        }
    }
    ?>
    <form action="form1.php" method="post"> 
        <table>
            <tr>
                <td style="background-color: #FFDA7B;" colspan="2"> <h3><i>DIỆN TÍCH HÌNH CHỮ NHẬT</i> </h3> </td>
            </tr>
            <tr>
                <td>Chiều dài: </td>
                <td><input type="text" name="chieudai" value="<?php echo isset($_POST['chieudai']) ? $_POST['chieudai'] : ''?>" required></td>

            </tr>
            <tr>
                <td>Chiều rộng: </td>
                <td><input type="text" name="chieurong" value="<?php echo isset($_POST['chieurong']) ? $_POST['chieurong'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td ><input style="background-color: #FDD9D9;" type="text" name="dientich"value="<?php echo $dientich; ?>" readonly></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="tinhtoan" value="Tính" ></td>
            </tr>
        </table>
    </form>
</body>
</html>