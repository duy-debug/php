<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</h3>";

    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $note = $_POST["note"];

    echo "Họ tên: " . htmlspecialchars($fullname) . "<br>";
    echo "Address: " . htmlspecialchars($address) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Country: " . htmlspecialchars($country) . "<br>";
    echo "Note: " . nl2br(htmlspecialchars($note)) . "<br>";
}
?>

</body>
</html>