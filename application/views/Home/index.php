<?php $this->load->view('Include/header'); 
$number_of_trade = count($trades);
foreach($trades as $trade){
    echo $trade->name;
    echo '<br />';
}