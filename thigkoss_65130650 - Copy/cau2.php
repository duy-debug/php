<?php
function gt($a)
{
    $tich = 1;
    for ($i = 1; $i <= $a; $i++) {
        $tich = $tich * $i;
    }
    return $tich;
}
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['tinh'])) {
    $k = $_POST['k'];       
    $n = $_POST['n'];
    $ketqua = gt($n) / (gt($k) * gt($n - $k));
}
?>
<center>
    <form action="cau2.php" method="post">
        <table>
            <tr>
                <td>Nhập k: </td>
                <td><input class="c" type="number" name="k" value="<?php echo isset($k) ? $k : '';  ?>" required></td>
            </tr>
            <tr>
                <td>Nhập n: </td>
                <td><input class="c" type="number" name="n" value="<?php echo isset($n) ? $n : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <td><input style="height: 200px; width: 200px;" type="text" value="<?php echo isset($ketqua) ?"Tổ hợp chập ".$k." của ".$k." là ".$ketqua."Có ".$ketqua." cách chọn ra ".$k." phân tử từ một tập hợp có ".$n."": ''; ?>" readoly></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="tinh" value="Tính tổ hợp">
                    <input type="reset" value="Làm mới">
                </td>
            </tr>
        </table>    
    </form>
</center>
<style>
    table {
        margin: 0 auto;
        border: 1px solid #000000;
    }

    tr:last-child {
        text-align: center;
    }


    .c {
        width: 300px;
        border-radius: 5px;
    }
</style>