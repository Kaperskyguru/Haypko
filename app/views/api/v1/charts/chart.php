<?php

$chartData = '';
// print_r($data);
foreach ($data as $row) {
    $chartData .= "{Month:'". $row->Month. "', Petrol:". $row->Petrol.", Gas:". $row->Gas.", Diesel:". $row->Diesel." },";
}
echo json_encode($chartData);
