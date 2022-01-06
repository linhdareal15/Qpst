<?php
    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1) {
        echo '<li><a href="shop.php?page=' . ($current_page - 1) . '">Prev</a><li> ';
    }
    // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++) {
        // Nếu là trang hiện tại thì hiển thị thẻ span
        // ngược lại hiển thị thẻ a
        if ($i == $current_page) {
            echo '<span>' . $i . '</span> ';
        } else {
            echo '<li><a href="shop.php?page=' . $i . '">' . $i . '</a></li> ';
        }
    }
    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1) {
        echo '<li><a href="shop.php?page=' . ($current_page + 1) . '">Next</a></li> ';
    }
    ?>
<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li class="page-item ${page<=1?"disabled":""}">
                <a class="page-link" href="${url}page=${page-1}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>

            <c:forEach begin="1" end="${totalPage}" var="i">
                <li class="page-item ${i==page?"active":""}"><a class="page-link" href="${url}page=${i}">${i}</a></li>
                </c:forEach>
            <li class="page-item ${page>=totalPage?"disabled":""}">
                <a class=" page-link" href="${url}page=${page+1}">Next</a>
            </li>
        </ul>
    </nav>