<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['tinhtoan'])) {
        $chieudai = $_POST['chieudai'];
        $chieurong = $_POST['chieurong'];
        if (is_numeric($chieudai) && is_numeric($chieurong)) {
            $dientich = $chieudai * $chieurong;
            echo "Diện tích hình chữ nhật là: " . $dientich;
        } else {
            echo "Vui lòng nhập số hợp lệ cho chiều dài và chiều rộng.";
        }
    }
     ?>
</body>
</html>