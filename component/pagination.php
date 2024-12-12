<?php
    function renderPagination($currentPage, $totalPages, $urlPattern)
    {
        if ($totalPages > 0) {
            echo '<div class="row mt-5"><div class="col text-center"><div class="block-27"><ul>';
            // Previous button
            if ($currentPage > 1) {
                $prevPage = $currentPage - 1;
                echo '<li><a href="' . sprintf($urlPattern, $prevPage) . '">&lt;</a></li>';
            } else {
                echo '<li class="disabled"><span>&lt;</span></li>';
            }

            // Page numbers
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    echo '<li class="active"><span>' . $i . '</span></li>';
                } else {
                    echo '<li><a href="' . sprintf($urlPattern, $i) . '">' . $i . '</a></li>';
                }
            }

            // Next button
            if ($currentPage < $totalPages) {
                $nextPage = $currentPage + 1;
                echo '<li><a href="' . sprintf($urlPattern, $nextPage) . '">&gt;</a></li>';
            } else {
                echo '<li class="disabled"><span>&gt;</span></li>';
            }
            echo '</ul></div></div></div>';
        }
    }
?>