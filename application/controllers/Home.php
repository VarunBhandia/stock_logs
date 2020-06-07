<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $controller = 'Home';
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['trades'] = $this->$model->select(array(),'trade_info',array(),'');
        $this->load->view('Home/index',$data);
    }

    
    public function getTradeData()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['trades'] = $this->$model->select(array(),'trade_info',array(),'');
        echo json_encode($data['trades']);
    }

    public function filteredTradeInfo()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $trades = $this->$model->select(array(),'trade_info',array(),'');

        $filtered_trade = [];
        array_push($filtered_trade,$trades[0]);
        
        $i =1;
        $j=0;
        while($i < count($trades)){
            
            if($trades[$i]->name == $filtered_trade[$j]->name && $trades[$i]->category == $filtered_trade[$j]->category && $trades[$i]->trade_date == $filtered_trade[$j]->trade_date ){
                
                $filtered_trade[$j]->price = round((($filtered_trade[$j]->qty*$filtered_trade[$j]->price) + ($trades[$i]->qty*$trades[$i]->price)) / ($filtered_trade[$j]->qty + $trades[$i]->qty),2);
                $filtered_trade[$j]->qty = $filtered_trade[$j]->qty + $trades[$i]->qty;
            }
            else{
               
                array_push($filtered_trade,$trades[$i]);
                $j++;
                $filtered_trade[$j]->id = $j+1;
            }
            $i++;
        }
        echo json_encode($filtered_trade);
    }
}
