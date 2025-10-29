<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
function timKiem($arr, $giatri){
    for($i=0; $i<count($arr); $i++){
        if($arr[$i] == $giatri){
            return $i;
        }
    }
    return -1;
}
$mangchuoi = "";
$giatri="";
$ketqua="";
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $mangchuoi = $_POST["mang"];
    $giatri = $_POST["giatricantim"];
    $arr = array_map('trim', explode(',', $mangchuoi));
    $manghien = implode(", ", $arr);
    $vitri = timKiem($arr,$giatri);
    if ($vitri != -1) {
        $ketqua = "Đã tìm thấy '$giatri' tại vị trí thứ " . ($vitri + 1) . " của mảng.";
    } else {
        $ketqua = "Không tìm thấy '$giatri' trong mảng.";   
    }
}
?>
<body>
    <center>
        <form action="timkiem.php" method="post">
            <table>
                <tr>
                    <td colspan="2"><h2><i>TÌM KIẾM</i></h2></td>
                </tr>
                <tr>
                    <td>Nhập mảng: </td>
                    <td><input type="text" name="mang" value="<?php echo $mangchuoi ?>" required></td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm: </td>
                    <td><input style="width: 60px;" type="text" name="giatricantim" value="<?php echo $giatri; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Tìm kiếm"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><input type="text" name="manghien" value="<?php echo isset($manghien)?$manghien:''; ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm: </td>
                    <td><input style="color: red; width: 300px;" type="text" name="ketqua" value="<?php echo isset($ketqua)?$ketqua: ''; ?>" lrealonly></td>
                </tr>
                <tr>
                    <td colspan="2">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                </tr>
            </table>
        </form>
    </center>
</body>
<style>
    tr:first-child{
        background-color: #2C9E95;
        text-align: center;
        color: #fff;
    }
    input[type="submit"]{
        background-color: blue;
    }
    tr:last-child{
        background-color: #2C9E95;
    }
    table{
        background-color: #CEDBD1;
    }
</style>
</html>