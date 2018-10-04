<?php
foreach ($data as $row) {
    $chartData .= "{Month:'". $row->month. "', Petrol: ". $row->Petrol. ", Gas: ". $row->Gas.", Diesel: ". $row->Diesel."  },";
}
echo json_encode($chartData);
