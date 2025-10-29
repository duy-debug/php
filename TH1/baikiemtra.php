<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function giaiThua($a){
        $gt=1;
        for($i = 1; $i<=$a; $i++){
            $gt = $gt * $i;
        }
        return $gt;
    }
    // Tinh tổ hợp chập k của n(C k,n), và chỉnh hợp A k,n
        do{
            $k = random_int();
            $n = random_int();
        }while($k>=$n || $k < 1 || $n < 1);

            $Ckn = giaiThua($n) / (giaiThua($k) * giaiThua(($n-$k)));
            $Akn = giaiThua($n) / giaiThua($n-$k);
            echo "C($k,$n) = $Ckn";
            echo "<br>";
            echo "A($k,$n) = $Akn";
    ?>
</body>
</html>