<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process1.php" method="post"> 
        <table>
            <tr>
                <td colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</td>
            </tr>
            <tr>
                <td>Chiều dai: </td>
                <td><input type="text" name="chieudai" ></td>
            </tr>
            <tr>
                <td>Chiều rộng: </td>
                <td><input type="text" name="chieurong"></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td><input type="text" name="dientich" readonly></td>
            </tr>
            <tr>
                <td><input type="submit" name="tinhtoan" value="Tính"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>