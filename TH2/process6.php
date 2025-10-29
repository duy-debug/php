<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ket qua phep tinh</title>
    <style> 
        h3 {
            color: #0000CC;
            text-align: center;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 150px;
            text-align: center;
        }
        td:first-child {
            font-weight: bold;
        }
        a {
            color: #990099;
            font-style: italic;
        }
        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['so1']) && isset($_POST['so2']) && isset($_POST['pheptinh'])) {
        $so1 = $_POST['so1'];
        $so2 = $_POST['so2'];
        $pheptinh = $_POST['pheptinh'];
        $ketqua = "";

        if (is_numeric($so1) && is_numeric($so2)) {
            switch ($pheptinh) {
                case "Cộng":
                    $ketqua = $so1 + $so2;
                    break;
                case "Trừ":
                    $ketqua = $so1 - $so2;
                    break;
                case "Nhân":
                    $ketqua = $so1 * $so2;
                    break;
                case "Chia":
                    if ($so2 == 0) {
                         echo "<script>alert('Không thể chia cho 0!'); window.history.back();</script>";
                         exit;
                        $ketqua = "Không thể chia cho 0";
                    } else {
                        $ketqua = $so1 / $so2;
                    }
                    break;
            }
        } else {
            echo "<script>alert('Vui lòng nhập số'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<p style='text-align:center; color:red;'>Thiếu dữ liệu từ form!</p>";
        exit;
    }
    ?>

    <form>
        <table>
            <tr>
                <td colspan="2"><h3>PHÉP TÍNH TRÊN HAI SỐ</h3></td>
            </tr>
            <tr>
                <td style="color:#993300;">Chọn phép tính:</td>
                <td style="color: red;"><?php echo $pheptinh; ?></td>
            </tr>
            <tr>
                <td style="color:blue;">Số 1 :</td>
                <td><input type="text" value="<?php echo $so1; ?>" readonly></td>
            </tr>
            <tr>
                <td style="color:blue;">Số 2 :</td>
                <td><input type="text" value="<?php echo $so2; ?>" readonly></td>
            </tr>
            <tr>
                <td style="color:blue;">Kết quả :</td>
                <td><input type="text" value="<?php echo $ketqua; ?>" readonly></td>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2"><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
