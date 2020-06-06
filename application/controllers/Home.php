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

    public function filtered_trade_info()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $trades = $this->$model->select(array(),'trade_info',array(),'');
        
        echo json_encode($trades);
    }

}
?>
