<?php $this->load->view('Include/header');
?>
<div class="row">
    <div class="col-md-4">
        <div class="report-card-container">
            <h3 class="report-card-title"> <b>Total Investment</b> </h3>
            <p class="report-card-desc"><?php echo $total_investment ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="report-card-container">
            <h3 class="report-card-title"> <b>Total Profit</b> </h3>
            <p class="report-card-desc"><?php echo $total_profit ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="report-card-container">
            <h3 class="report-card-title"> <b>Total Holding</b> </h3>
            <p class="report-card-desc"><?php echo $total_hold ?></p>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-5">
        <div class="card-container">
            <h4 class="card-title"> <b>List of Stocks</b> </h4>
            <div class="card-desc">
                <ol>
                    <?php
                    foreach ($unique_stocks as $unique_stock) {
                    ?>
                        <li><?php echo $unique_stock->name ?></li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
        <div class="row">
            <?php
            $total_profit = 0;
            foreach ($stocks_map as $per_stock_info) {
                $total_profit = $total_profit + $per_stock_info["profit"];
            ?>
                <div class="col-md-6">
                    <div class="stock-container">
                        <h5 class="stock-card-title"> <b><?php echo $per_stock_info["name"] ?></b> </h5>
                        <div class="stock-card-desc">
                            <p class="stock-card-desc"><b>Total Buying Qty :</b> <?php echo $per_stock_info["total_buy_qty"] ?></p>
                            <p class="stock-card-desc"><b>Total Selling Qty :</b> <?php echo $per_stock_info["total_sell_qty"] ?></p>
                            <p class="stock-card-desc"><b>Total Buying Price :</b> <?php echo $per_stock_info["total_buy_price"] ?></p>
                            <p class="stock-card-desc"><b>Total Selling Price :</b> <?php echo $per_stock_info["total_sell_price"] ?></p>
                            <p class="stock-card-desc"><b>Holding Qty :</b> <?php echo $per_stock_info["current_buy_qty"] ?></p>
                            <p class="stock-card-desc"><b>Holding Price :</b> <?php echo $per_stock_info["hold_price"] ?></p>
                            <p class="stock-card-desc"><b>Total Holding :</b> <?php echo $per_stock_info["curr_holding"] ?></p>
                            <p class="stock-card-desc"><b>Profit :</b> <?php echo $per_stock_info["profit"] ?></p>
                        </div>
                    </div>
                </div>

            <?php
            }
            // echo $total_profit;
            ?>
        </div>


    </div>
    <div class="col-md-7">

        <div class="table-container">
            <div id="myGrid" class="ag-theme-alpine" style="height: 1000vh;"></div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#trade-table').DataTable();
    });
    // specify the columns
    var columnDefs = [{
            headerName: "ID",
            field: "id",
            sortable: true,
            filter: true,
            // checkboxSelection: true,
            width: 100,
        },
        {
            headerName: "Name",
            field: "name",
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 350,
            // checkboxSelection: true
        },
        {
            headerName: "Price",
            field: "price",
            sortable: true,
            filter: true,
            width: 120,
            // checkboxSelection: true
        },
        {
            headerName: "Qty",
            field: "qty",
            sortable: true,
            filter: true,
            // checkboxSelection: true
            width: 100,
        },
        {
            headerName: "B/S",
            field: "category",
            sortable: true,
            filter: true,
            width: 100,
            // checkboxSelection: true
        },
        {
            headerName: "Trade Date",
            field: "trade_date",
            sortable: true,
            filter: true,
            width: 160,
            // checkboxSelection: true
        }
    ];

    // let the grid know which columns to use
    var gridOptions = {
        defaultColDef: {
            resizable: true,
            sortable: true,
            filter: true,
        },
        columnDefs: columnDefs
    };

    gridOptions.getRowStyle = function(params) {
        if (params.data.id % 2 === 0) {
            return {
                'font-size': '13px',
                'background-color': 'rgb(27, 28, 43)',
                'color': '#c5c9cd',
            }
        }
        return {
            'font-size': '13px',
            'background-color': 'rgb(33, 34, 48)',
            'color': '#c5c9cd',
        }
    }
    gridOptions.rowHeight = 35;
    // lookup the container we want the Grid to use
    var eGridDiv = document.querySelector('#myGrid');

    // create the grid passing in the div to use together with the columns & data we want to use
    new agGrid.Grid(eGridDiv, gridOptions);

    agGrid.simpleHttpRequest({
        url: '<?php echo base_url(); ?>index.php/Home/filteredTradeInfo'
    }).then(function(data) {
        gridOptions.api.setRowData(data);

    });
</script>