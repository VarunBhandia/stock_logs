<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data['trades'] = $this->$model->select(array(), 'trade_info', array(), '');
        $data['unique_stocks'] = $this->getStocksName();
        $model = $this->model;
        $data['controller'] = $this->controller;
        $unique_stocks = $this->getStocksName();
        $filtered_trade = $this->filteredTradeInfoInArray();
        $no_of_filtered_trade = count($filtered_trade);
        $no_of_unique_stocks = count($unique_stocks);

        $total_profit = 0;
        $total_hold = 0;

        $stocks_map = array();
        for ($j = 0; $j < $no_of_unique_stocks; $j++) {
            $temp_arr = [];

            $total_buy_price = 0;
            $total_buy_qty = 0;
            $current_buy_qty = 0;

            $total_sell_price = 0;
            $total_sell_qty = 0;
            $hold_price = 0;
            for ($i = 0; $i < $no_of_filtered_trade; $i++) {
                if ($filtered_trade[$i]->name == $unique_stocks[$j]->name) {

                    if ($filtered_trade[$i]->category == 'B') {
                        array_push($temp_arr, $filtered_trade[$i]);
                        $total_buy_qty = $total_buy_qty + $filtered_trade[$i]->qty;
                        $total_buy_price = ($filtered_trade[$i]->qty * $filtered_trade[$i]->price) + $total_buy_price;
                    } else {
                        $total_sell_qty = $total_sell_qty + $filtered_trade[$i]->qty;
                        $current_buy_qty = $current_buy_qty - $filtered_trade[$i]->qty;
                        $total_sell_price = ($filtered_trade[$i]->qty * $filtered_trade[$i]->price) + $total_sell_price;
                    }
                }
            }
            $current_buy_qty = $total_buy_qty - $total_sell_qty;
            $current_hold_qty = $current_buy_qty;
            $profit = 0;
            if ($total_buy_qty == $total_sell_qty) {
                $hold_price = 0;
                $profit = $total_sell_price - $total_buy_price;
            } else {
                $current_hold_qty = $current_hold_qty - $temp_arr[count($temp_arr) - 1]->qty;
                $hold_price = $temp_arr[count($temp_arr) - 1]->price;
                $k = count($temp_arr) - 2;
               
                while ($k >= 0 && $current_hold_qty >= 0) {

                    if ($current_hold_qty - $temp_arr[$k]->qty >= 0) {
                        $hold_price = (($temp_arr[$k]->price * $temp_arr[$k]->qty) + (($current_buy_qty -$current_hold_qty )* $hold_price)) / ($temp_arr[$k]->qty + $current_buy_qty -$current_hold_qty);
                        $current_hold_qty = $current_hold_qty - $temp_arr[$k]->qty;
                    } else {
                        $current_hold_qty = 0;
                    }

                    $k--;
                }
                $profit = $total_sell_price - $total_buy_price + ($current_buy_qty * $hold_price);
            }

            $per_stock_info["name"] = $unique_stocks[$j]->name;
            $per_stock_info["total_buy_qty"] = $total_buy_qty;
            $per_stock_info["total_sell_qty"] = $total_sell_qty;
            $per_stock_info["total_buy_price"] = $total_buy_price;
            $per_stock_info["total_sell_price"] = $total_sell_price;
            $per_stock_info["current_buy_qty"] = $current_buy_qty;
            $per_stock_info["hold_price"] = round($hold_price, 2);
            $per_stock_info["profit"] = round($profit, 2);
            $per_stock_info["curr_holding"] = round($hold_price, 2) * $current_buy_qty;

            $total_profit = $total_profit + round($profit, 2);
            $total_hold = $total_hold + (round($hold_price, 2) * $current_buy_qty);

            array_push($stocks_map, $per_stock_info);
        }
        $data['stocks_map'] = $stocks_map;
        $data['total_profit'] = $total_profit;
        $data['total_investment'] = 132000 + 15000;
        $data['total_hold'] = $total_hold;

        $this->load->view('Home/index', $data);
    }

    public function getTradeData()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['trades'] = $this->$model->select(array(), 'trade_info', array(), '');
        echo json_encode($data['trades']);
    }

    public function filteredTradeInfo()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $trades = $this->$model->select(array(), 'trade_info', array(), '');

        $filtered_trade = [];
        array_push($filtered_trade, $trades[0]);

        $i = 1;
        $j = 0;
        while ($i < count($trades)) {

            if ($trades[$i]->name == $filtered_trade[$j]->name && $trades[$i]->category == $filtered_trade[$j]->category && $trades[$i]->trade_date == $filtered_trade[$j]->trade_date) {

                $filtered_trade[$j]->price = round((($filtered_trade[$j]->qty * $filtered_trade[$j]->price) + ($trades[$i]->qty * $trades[$i]->price)) / ($filtered_trade[$j]->qty + $trades[$i]->qty), 2);
                $filtered_trade[$j]->qty = $filtered_trade[$j]->qty + $trades[$i]->qty;
            } else {

                array_push($filtered_trade, $trades[$i]);
                $j++;
                $filtered_trade[$j]->id = $j + 1;
            }
            $i++;
        }

        echo json_encode($filtered_trade);
        return $filtered_trade;
    }

    public function filteredTradeInfoInArray()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $trades = $this->$model->select(array(), 'trade_info', array(), '');

        $filtered_trade = [];
        array_push($filtered_trade, $trades[0]);

        $i = 1;
        $j = 0;
        while ($i < count($trades)) {

            if ($trades[$i]->name == $filtered_trade[$j]->name && $trades[$i]->category == $filtered_trade[$j]->category && $trades[$i]->trade_date == $filtered_trade[$j]->trade_date) {

                $filtered_trade[$j]->price = round((($filtered_trade[$j]->qty * $filtered_trade[$j]->price) + ($trades[$i]->qty * $trades[$i]->price)) / ($filtered_trade[$j]->qty + $trades[$i]->qty), 2);
                $filtered_trade[$j]->qty = $filtered_trade[$j]->qty + $trades[$i]->qty;
            } else {

                array_push($filtered_trade, $trades[$i]);
                $j++;
                $filtered_trade[$j]->id = $j + 1;
            }
            $i++;
        }
        return $filtered_trade;
    }


    public function getStocksName()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $fields = ['name'];
        $trades = $this->$model->select_distinct($fields, 'trade_info', array(), '');
        // echo json_encode($trades);
        return $trades;
    }

    public function perStockInfo()
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $unique_stocks = $this->getStocksName();
        $filtered_trade = $this->filteredTradeInfoInArray();
        $no_of_filtered_trade = count($filtered_trade);
        $no_of_unique_stocks = count($unique_stocks);

        $stocks_map = array();
        // echo '<pre>';

        for ($j = 0; $j < $no_of_unique_stocks; $j++) {
            $temp_arr = [];

            $total_buy_price = 0;
            $total_buy_qty = 0;
            $current_buy_qty = 0;

            $total_sell_price = 0;
            $total_sell_qty = 0;

            $hold_price = 0;
            for ($i = 0; $i < $no_of_filtered_trade; $i++) {
                if ($filtered_trade[$i]->name == $unique_stocks[$j]->name) {

                    if ($filtered_trade[$i]->category == 'B') {
                        array_push($temp_arr, $filtered_trade[$i]);
                        $total_buy_qty = $total_buy_qty + $filtered_trade[$i]->qty;
                        $total_buy_price = ($filtered_trade[$i]->qty * $filtered_trade[$i]->price) + $total_buy_price;
                    } else {
                        $total_sell_qty = $total_sell_qty + $filtered_trade[$i]->qty;
                        $current_buy_qty = $current_buy_qty - $filtered_trade[$i]->qty;
                        $total_sell_price = ($filtered_trade[$i]->qty * $filtered_trade[$i]->price) + $total_sell_price;
                    }
                }
            }
            $current_buy_qty = $total_buy_qty - $total_sell_qty;
            $current_hold_qty = $current_buy_qty;
            $profit = 0;
            if ($total_buy_qty == $total_sell_qty) {
                $hold_price = 0;
                $profit = $total_sell_price - $total_buy_price;
            } else {
                $current_hold_qty = $current_hold_qty - $temp_arr[count($temp_arr) - 1]->qty;
                $hold_price = $temp_arr[count($temp_arr) - 1]->price;
                for ($k = count($temp_arr) - 2; $k >= 0; $k--) {
                    if ($current_hold_qty == 0) {
                        break;
                    } else {
                        $hold_price = (($temp_arr[$k]->price * $temp_arr[$k]->qty) + ($current_hold_qty * $hold_price)) / ($temp_arr[$k]->qty + $current_hold_qty);
                        $current_hold_qty = $current_hold_qty - $temp_arr[$k]->qty;
                    }
                }
                $profit = $total_sell_price - $total_buy_price + ($current_buy_qty * $hold_price);
            }

            $per_stock_info["name"] = $unique_stocks[$j]->name;
            $per_stock_info["total_buy_qty"] = $total_buy_qty;
            $per_stock_info["total_sell_qty"] = $total_sell_qty;
            $per_stock_info["total_buy_price"] = $total_buy_price;
            $per_stock_info["total_sell_price"] = $total_sell_price;
            $per_stock_info["current_buy_qty"] = $current_buy_qty;
            $per_stock_info["hold_price"] = $hold_price;
            $per_stock_info["profit"] = $profit;
            array_push($stocks_map, $per_stock_info);
        }
        return $stocks_map;
    }
}
