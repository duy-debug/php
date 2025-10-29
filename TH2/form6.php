<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
 <style>
h3{
    color: blue;
    text-align: center;
}
input[type="submit"]{
    text-align: center;
    align-items: center;
    border: 1px solid blue;
}
</style>
<body>

    <form action="process6.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h3>PHÉP TÍNH TRÊN HAI SỐ</h3></td>
            </tr>
            <tr>
                <td style="color: #993300;">Chọn phép tính:</td>
                <td style="color: red;">
                    <input type="radio" name="pheptinh" value="Cộng" checked> Cộng
                    <input type="radio" name="pheptinh" value="Trừ"> Trừ
                    <input type="radio" name="pheptinh" value="Nhân"> Nhân
                    <input type="radio" name="pheptinh" value="Chia"> Chia
                </td>
            </tr>
            <tr>
                <td style="color: blue;"><b>Số thứ nhất:</b></td>
                <td><input type="text" name="so1" value="<?php echo isset($_POST['so1']) ? $_POST['so1'] : ''?>" required></td>
            </tr>
            <tr>
                <td style="color: blue;"><b>Số thứ hai:</b></td>
                <td><input type="text" name="so2"value="<?php echo isset($_POST['so2']) ? $_POST['so2'] : ''?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
