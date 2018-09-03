<?php
foreach ($data as $row) {
    $chartData .= "{Month:'". $row->month. "', New:". $row->new.", Returning:". $row->returning." },";
}
    echo json_encode($chartData);
