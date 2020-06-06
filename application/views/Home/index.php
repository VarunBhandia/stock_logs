<?php $this->load->view('Include/header');
?>
<div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div id="myGrid" class="ag-theme-alpine" style="height: 1000vh;"></div>
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
            width: 80,
        },
        {
            headerName: "Name",
            field: "name",
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 250,
            // checkboxSelection: true
        },
        {
            headerName: "Price",
            field: "price",
            sortable: true,
            filter: true,
            width: 150,
            // checkboxSelection: true
        },
        {
            headerName: "Qty",
            field: "qty",
            sortable: true,
            filter: true,
            // checkboxSelection: true
            width: 80,
        },
        {
            headerName: "B/S",
            field: "category",
            sortable: true,
            filter: true,
            width: 80,
            // checkboxSelection: true
        },
        {
            headerName: "Trade Date",
            field: "trade_date",
            sortable: true,
            filter: true,
            width: 200,
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
                'font-size': '12px',
                'background-color': '#393939',
                'color': 'white',
            }
        }
        return {
            'font-size': '12px',
            'background-color': '#717171',
            'color': 'white',
        }
    }
    gridOptions.rowHeight = 40;
    // lookup the container we want the Grid to use
    var eGridDiv = document.querySelector('#myGrid');

    // create the grid passing in the div to use together with the columns & data we want to use
    new agGrid.Grid(eGridDiv, gridOptions);

    agGrid.simpleHttpRequest({
        url: 'http://localhost/stocks_logs/index.php/Home/getTradeData'
    }).then(function(data) {
        gridOptions.api.setRowData(data);
        // gridOptions.columnApi.autoSizeColumns(data, skipHeader);

    });
</script>