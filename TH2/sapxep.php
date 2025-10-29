<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
function hoan_vi(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}
function sap_xep_tang($arr){
    $n = count($arr);
    for($i=0; $i<$n-1; $i++){
        for($j = $i+1; $j<$n; $j++){
            if($arr[$i] > $arr[$j]){
                hoan_vi($arr[$i], $arr[$j]);
            }
        }
    }
    return $arr;
}
function sap_xep_giam($arr){
    $n = count($arr);
    for($i=0; $i<$n-1; $i++){
        for($j = $i+1; $j<$n; $j++){
            if($arr[$i] < $arr[$j]){
                hoan_vi($arr[$i], $arr[$j]);
            }
        }
    }
        return $arr;

}
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $mangchuoi = $_POST["mang"];
    $arr = array_map('trim', explode(',',$mangchuoi));
    $arr_tang = sap_xep_tang($arr);
    $arr_giam = sap_xep_giam($arr);
    $arr_tang = implode(" ", $arr_tang);
    $arr_giam = implode(" ", $arr_giam);
}
?>
<body>
    <center>
        <form action="sapxep.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2><i>SẮP XẾP MẢNG</i></h2></td>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td><input type="text" name="mang" value="<?php echo isset($mangchuoi)? $mangchuoi:'' ?>" required><span>(*)</span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Sắp xếp tăng/giảm"></td>
            </tr>
            <tr>
                <td style="color: red;">Sau khi sắp xếp</td>
            </tr>
            <tr>
                <td>Tăng dần: </td>
                <td><input type="text" value="<?php echo isset($arr_tang)?$arr_tang:'' ?>" readonly></td>
            </tr>
            <tr>
                <td>Giảm dân: </td>
                <td><input type="text" value="<?php echo isset($arr_giam)?$arr_giam:'' ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><span>(*)</span> Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
    </center>
</body> 
<style>
    input[type="text"]{
        border: 1px solid #000000;
    }
    tr:first-child{
        text-align: center;
        background-color: blue;
        color: #fff;
    }
    table{
        background-color: green;
    }
    span{
        color: red;
    }
</style>
</html>