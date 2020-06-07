<?php $this->load->view('Include/header');
?>
<div class="row">

    <div class="col-md-4">
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
    </div>
    <div class="col-md-8">

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
        url: 'http://localhost/stocks_logs/index.php/Home/filteredTradeInfo'
    }).then(function(data) {
        gridOptions.api.setRowData(data);
        // gridOptions.columnApi.autoSizeColumns(data, skipHeader);

    });
</script>