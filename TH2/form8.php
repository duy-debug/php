<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="config.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Enter Your Information</h2>
                </td>
            </tr>
            <tr>
                <td>Fullname</td>
                <td><input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''?>" required></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="Nam" checked> Nam
                    <input type="radio" name="gender" value="Nữ"> Nữ
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country">
                        <option value="Việt Nam" selected>Việt Nam</option>
                        <option value="France" selected>France</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Study</td>
                <td>
                    <input type="checkbox" name="study" value="phpmysql" checked> PHP & MySQL
                    <input type="checkbox" name="study" value="aspnet" checked> ASP.NET
                    <input type="checkbox" name="study" value="ccna"> CCNA
                    <input type="checkbox" name="study" value="security" checked> Security+
                </td>
            </tr>
            <tr>
                <td>Note</td>
                <td>
                    <textarea name="note" rows="3" value="<?php echo isset($_POST['note']) ? $_POST['note'] : ''?>" required></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsend" value="Gửi">
                    <button type="reset">Hủy</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
</body>
</html>