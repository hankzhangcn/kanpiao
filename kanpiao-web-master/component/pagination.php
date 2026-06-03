<!-- 本部分需要 max_page,page,(page_size) $next_url -->
<?php 
    // 如果是第一页
    if($page == 1)
        echo "<li class='page-item disabled'><a class='page-link'>前一页</a>";
    else
        echo "<li class='page-item'><a class='page-link' href='".$next_url."&p=".($page-1)."'>前一页</a>";
?>
</li>
<!-- 确定最大页码 -->
<!-- 确定首个页码 -->
<?php 
    if($page==1 || $page==2) 
        $first_pagenum = 1;
    else if($page== $max_page)
        $first_pagenum = $max_page-2;
    else
        $first_pagenum = $page-1;
?>
<!-- 确定小于3页的情况 -->
<?php
    if($max_page == 1)
        echo "<li class='page-item active'><a class='page-link ' href='#'>".$first_pagenum."</a></li>";
    if($max_page == 2)
    {
        echo "<li class='page-item ";if($page == $first_pagenum) echo "active";echo "'><a class='page-link' href='".$next_url."&p=".$first_pagenum."'>".$first_pagenum."</a></li>";
        echo "<li class='page-item ";if($page == $first_pagenum+1) echo "active";echo "'><a class='page-link' href='".$next_url."&p=".($first_pagenum+1)."'>".($first_pagenum+1)."</a></li>";
    }
    if($max_page >= 3)
    {
        echo "<li class='page-item ";if($page == $first_pagenum) echo "active";echo "'><a class='page-link' href='".$next_url."&p=".$first_pagenum."'>".$first_pagenum."</a></li>";
        echo "<li class='page-item ";if($page == $first_pagenum+1) echo "active";echo "'><a class='page-link' href='".$next_url."&p=".($first_pagenum+1)."'>".($first_pagenum+1)."</a></li>";
        echo "<li class='page-item ";if($page == $first_pagenum+2) echo "active";echo "'><a class='page-link' href='".$next_url."&p=".($first_pagenum+2)."'>".($first_pagenum+2)."</a></li>";
    }
        
?>
<?php 
    // 如果已经到了最后一页
    if($page >= $max_page)
        echo "<li class='page-item disabled'><a class='page-link'>后一页</a>";
    else
        echo "<li class='page-item'><a class='page-link' href='".$next_url."&p=".($page+1)."'>后一页</a>";
?>