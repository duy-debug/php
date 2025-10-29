<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['btnsend'])) {
        $fullname = $_GET['fullname'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $phonenumber = $_GET['phonenumber'];
        $password = $_GET['password'];
        $confirmpassword = $_GET['confirmpassword'];
        $sex = $_GET['sex'];
        if ($password === $confirmpassword) {
            echo "<h1>Welcome $username</h1>";
            echo "<p>Your full name is: $fullname</p>";
            echo "<p>Your email is: $email</p>";
            echo "<p>Your phone number is: $phonenumber</p>";
            echo "<p>Gender: $sex</p>";
        } else {
            // Quay lại form và giữ lại dữ liệu
            header("Location: bt2form.php?error=password&fullname=$fullname&username=$username&email=$email&phonenumber=$phonenumber&sex=$sex");
            exit;
        }      
    }
    ?>
</body>
</html>