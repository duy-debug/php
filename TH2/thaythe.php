<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
function thayThe($arrcu, $arrmoi, $giatrican, $giatrithaythe){
    for($i=0; $i<count($arrcu); $i++){
        if($arrcu[$i] == $giatrican){
            $arrmoi[$i] = $giatrithaythe;
        } else {
            $arrmoi[$i] = $arrcu[$i];
        }
    }
    return $arrmoi;
}
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['submit'])){
    $mangchuoi = $_POST["mang"];
    $giatrican = $_POST['giatrican'];
    $giatrithaythe = $_POST['giatrithaythe'];
    $arrcu = array_map('trim', explode(',',$mangchuoi));
    $arrmoi = [];
    $arrmoi = thayThe($arrcu, $arrmoi, $giatrican, $giatrithaythe);
    $mangcu = implode(" ",$arrcu);
    $mangmoi = implode(" ",$arrmoi);
}
?>
<body>
    <center>
        <form action="thaythe.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2><i>THAY THẾ</i></h2></td>
            </tr>
            <tr>
                <td>Nhập các phần tử: </td>
                <td><input type="text" name="mang" value="<?php echo isset($mangchuoi)?$mangchuoi : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế: </td>
                <td><input type="text" name="giatrican" value ="<?php echo isset($giatrican)? $giatrican:''; ?>"required></td>
            </tr>
            <tr>
                <td>Giá trị thay thế: </td>
                <td><input type="text" name="giatrithaythe" value ="<?php echo isset($giatrithaythe)? $giatrithaythe:'';?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Thay thế"></td>
            </tr>
            <tr>
                <td>Mảng cũ: </td>
                <td><input class="input1" type="text" name="mangcu" value="<?php echo isset($mangcu)?$mangcu: ''; ?>" readonly></td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế: </td>
                <td><input class="input1" type="text" name="mangmoi" value="<?php echo isset($mangmoi)?$mangmoi: ''; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2">(<span>Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
    </center>
</body>
<style>
    tr:first-child{
        background-color: #A40873;
        text-align: center;
        color: #fff;
    }
    table{
        background-color: pink;
    }
    input[type="submit"]{
        background-color: yellow;
    }
    .input1{
     background-color: brown;
    }
    span{
        color: red;
    }
</style>
</html>