<?php

$chartData = '';
// print_r($data);
foreach($data as $row) {

    $chartData .= "{label: 'Petrol', value: $row->petrol},";
    $chartData .= "{label: 'Gas', value: $row->gas},";
    $chartData .= "{label: 'Diesel', value: $row->diesel}";


    // $chartData .= "{Label:'Petrol'". $row->petrol.", Gas". $row->gas.", Diesel". $row->diesel." },";
}
echo json_encode($chartData);
