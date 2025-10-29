<?php
class Pager {
    // Xác định bắt đầu từ dòng nào
    function findStart($limit) {
        if ((!isset($_GET['page'])) || ($_GET['page'] == "1")) {
            $start = 0;
            $_GET['page'] = 1;
        } else {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start;
    }

    // Tính tổng số trang
    function findPages($count, $limit) {
        $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
        return $pages;
    }

    // Hiển thị danh sách trang
    function pageList($curpage, $pages) {
        $page_list = "";

        // Nút <<
        if (($curpage - 1) > 0)
            $page_list .= "<a href='?page=1'>&lt;&lt;</a> ";
        else
            $page_list .= "&lt;&lt; ";

        // Các trang
        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $curpage)
                $page_list .= "<b>$i</b> ";
            else
                $page_list .= "<a href='?page=$i'>$i</a> ";
        }

        // Nút >>
        if (($curpage + 1) <= $pages)
            $page_list .= "<a href='?page=$pages'>&gt;&gt;</a>";
        else
            $page_list .= "&gt;&gt;";

        return $page_list;
    }
}
?>






