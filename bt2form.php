<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        form {
            background: #fff;
            width: 500px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background: #66a6ff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #4a90e2;
        }

        p {
            text-align: center;
            color: red;
            font-weight: bold;
        }

        b {
            font-size: 15px;
            color: #444;
        }
    </style>
<body>
    <h1>Registration</h1>
    <?php if(isset($_GET['error']) && $_GET['error'] == 'password'){
        echo "<p style='color:red;'>Incorrect confirm password</p>";
    }
     ?>
    <form action="bt2process.php" method="get">
        <table>
            <tr>
                <td>Full name</td>
                <td>User name</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="fullname" value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : ''?>" required>
                </td>
                <td>
                    <input type="text" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : '' ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    Phone number
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>"required>
                </td>
                <td>
                    <input type="tel" name="phonenumber" value="<?php echo isset($_GET['phonenumber']) ? $_GET['phonenumber'] : '' ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    Confirm Password
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" required>
                </td>
                <td>
                    <input type="password" name="confirmpassword" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>Gender</b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" name="sex" value="Male" <?php if(isset($_GET['sex']) && $_GET['sex']=="Male") echo "checked"; ?> required checked> Male
                    <input type="radio" name="sex" value="Female" <?php if(isset($_GET['sex']) && $_GET['sex']=="Female") echo "checked"; ?> required> Female
                    <input type="radio" name="sex" value="Other"  <?php if(isset($_GET['sex']) && $_GET['sex']=="Other") echo "checked"; ?> required> Other
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="btnsend" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>