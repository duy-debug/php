<form action="arrayform1.php" method="post">
    <table><tr>
        <td>Nhập n: </td>
        <td>
        <input type="text" name="n" value="<?php echo isset($n)?$n : ''; ?>" required>
        </td>
    </tr>
<tr>
    <td><input type="submit" name="submit" value="Thực hiện"></td>
</tr>
</table>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $n = $_POST['n'];
    if(is_numeric($n) && $n <= 0 && !(is_float($n))){
        echo "Nhập chưa hợp lệ";
    }
    else{
        for($i = 0; $i < $n; $i++ ){
            $arr[$i] = rand(-1,1);
        }
        echo "Mảng vừa tạo: ";
        foreach($arr as $value){
            echo $value." ";
        }
        $count = 0;
        foreach($arr as $value){
            if($value % 2 == 0){
                $count++;
            }
        }
        echo "<br> Số lượng phần tử chẵn: ".$count."<br>";
        $countnhomottram = 0;
        foreach($arr as $value){
            if($value < 100){
                $countnhomottram++;
            }
        }
        echo "<br> Số lượng phần tử nhỏ hơn 100: ".$countnhomottram."<br>";

        $tongam=0;
        foreach($arr as $value){
            if($value < 0){
                $tongam+=$value;
            }
        }
        echo "<br> Tổng phần tử âm: ".$tongam."<br>";
        echo "<br> Vị trí các phần tử bằng 0: ";
        for($i=0; $i<count($arr); $i++){
            if($arr[$i] == 0){
                echo $i;
            }
        }
        echo "<br>";
        sort($arr);
        foreach($arr as $value){
            echo $value." ";
        }
    }
}
?>