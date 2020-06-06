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
            $username = $this->input->post('username');
            $number = $this->input->post('number');
            $email = $this->input->post('email');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $desc = $this->input->post('desc');

            $data = array(
                'username'  => $username,
                'number'  => $number,
                'email'  => $email,
                'country'  => $country,
                'state'  => $state,
                'desc_enquiry'  => $desc,
            );
            $this->$model->insert($data,'enquiry');
            redirect('Home/Index');
    }

}
?>
