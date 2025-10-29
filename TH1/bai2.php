<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    td {
        padding: 10px;
        text-align: center;
    }
</style>
<body>
    <table>
        <?php
        echo "<tr>";
        for($i=1; $i <= 10; $i++){
            echo "<td>";
            echo " <b>Chương</b> ". $i . "<br>";
            echo "</td>";
        }
        echo "</tr>";   
        ?>
        <?php
            for($i = 1; $i <= 10; $i++){
                echo "<tr>";
            for($j = 1; $j <= 10; $j++){
                if($i * $j % 2 == 0 ){
                  echo "<td style = 'background-color: red'>";
                  echo "$i * $j = ". ($i * $j) ."<br>";
                  echo "</td>";
                }
                else{
                  echo "<td style = 'background-color: blue'>";
                  echo "$i * $j = ". ($i * $j) ."<br>";
                  echo "</td>";
                }
            }
                echo "</tr>";
        }
        ?>
    </table>
</body>
</html>