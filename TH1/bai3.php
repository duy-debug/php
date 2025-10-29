<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function UCLN($a){
        for($i = 1; $i <= $a; $i++){
            if($a % $i == 0)
                echo "$i ";
        }
    }
    function KT_SNT($a){
        if($a < 2) return false;
        for($i = 2; $i <= sqrt($a); $i++){
            if($a % $i == 0)
                return false;
        }
        return true;
    }
    function tinhTong_SNT($a){
        $sum = 0;
        for($i = 2; $i < $a; $i++){
            if(KT_SNT($i))
                echo "$i ";
                $sum += $i;
        }
        return $sum;
    }
    // Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N có giá trị trong [−100;100]. Sau đó kiểm tra N có là số dương không? Nếu thỏa thì:In ra các ước số của N.Viết hàm kiểm tra xem N có phải là số nguyên tố không?Tính tổng các số nguyên tố < N.Kiểm tra N có là số chính phương?
        $a = random_int(-100,100);
        if($a > 0){
            echo "Các ước số của $a là: ";
            UCLN($a);
            echo "<br>";
            if(KT_SNT($a)){
                echo "$a là số nguyên tố <br>";
            } else {
                echo "$a không phải là số nguyên tố <br>";
            }
            echo "Tổng các số nguyên tố nhỏ hơn $a là: ". tinhTong_SNT($a) . "<br>";
        }
    ?>
</body>
</html>