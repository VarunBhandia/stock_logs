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
            ?>
        </div>


    </div>
    <div class="col-md-7">

        <div class="table-container">
            <div id="myGrid" class="ag-theme-alpine" style="height: 1000vh;">
                <!-- <div style="display: flex;">
                    <div>
                        <div class="row">
                            <label>suppressQuotes = </label>
                            <select id="suppressQuotes">
                                <option value="none">(default)</option>
                                <option value="true">true</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>columnSeparator = </label>
                            <select id="columnSeparator">
                                <option value="none">(default)</option>
                                <option value="tab">tab</option>
                                <option value="|">bar (|)</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-left: 10px;">
                        <div class="row">
                            <label>customHeader = </label>
                            <select id="customHeader">
                                <option>none</option>
                                <option value="array">ExcelCell[][] (recommended format)</option>
                                <option value="string">string (legacy format)</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>customFooter = </label>
                            <select id="customFooter">
                                <option>none</option>
                                <option value="array">ExcelCell[][] (recommended format)</option>
                                <option value="string">string (legacy format)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div style="margin: 10px 0;">
                    <button onclick="onBtnUpdate()">Show api.getDataAsCsv() text</button>
                    <button onclick="onBtnExport()">
                        Download file (api.exportDataAsCsv())
                    </button>
                </div>

                <div style="flex: 1; position: relative;">
                    <div id="myGrid" class="ag-theme-alpine"></div>
                    <textarea id="csvResult">
Press the api.getDataAsCsv() button to view exported CSV here</textarea>
                </div> -->
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#trade-table').DataTable();
    });
    var columnDefs = [{
            headerName: "ID",
            field: "id",
            sortable: true,
            filter: true,
            width: 80,
        },
        {
            headerName: "Name",
            field: "name",
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 260,
        },
        {
            headerName: "Price",
            field: "price",
            sortable: true,
            filter: true,
            width: 100,
        },
        {
            headerName: "Qty",
            field: "qty",
            sortable: true,
            filter: true,
            width: 80,
        },
        {
            headerName: "B/S",
            field: "category",
            sortable: true,
            filter: true,
            width: 80,
        },
        {
            headerName: "Trade Date",
            field: "trade_date",
            sortable: true,
            filter: true,
            width: 150,
        }
    ];

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
    var eGridDiv = document.querySelector('#myGrid');

    new agGrid.Grid(eGridDiv, gridOptions);

    agGrid.simpleHttpRequest({
        url: '<?php echo base_url(); ?>index.php/Home/filteredTradeInfo'
    }).then(function(data) {
        gridOptions.api.setRowData(data);

    });

    function getBooleanValue(checkboxSelector) {
        return document.querySelector(checkboxSelector).checked;
    }

    function getValue(inputSelector) {
        var text = document.querySelector(inputSelector).value;
        switch (text) {
            case 'string':
                return (
                    'Here is a comma, and a some "quotes". You can see them using the\n' +
                    'api.getDataAsCsv() button but they will not be visible when the downloaded\n' +
                    'CSV file is opened in Excel because string content passed to\n' +
                    'customHeader and customFooter is not escaped.'
                );
            case 'array':
                return [
                    [],
                    [{
                        data: {
                            value: 'Here is a comma, and a some "quotes".',
                            type: 'String',
                        },
                    }, ],
                    [{
                        data: {
                            value: 'They are visible when the downloaded CSV file is opened in Excel because custom content is properly escaped (provided that suppressQuotes is not set to true)',
                            type: 'String',
                        },
                    }, ],
                    [{
                            data: {
                                value: 'this cell:',
                                type: 'String'
                            },
                            mergeAcross: 1
                        },
                        {
                            data: {
                                value: 'is empty because the first cell has mergeAcross=1',
                                type: 'String',
                            },
                        },
                    ],
                    [],
                ];
            case 'none':
                return;
            case 'tab':
                return '\t';
            case 'true':
                return true;
            case 'none':
                return;
            default:
                return text;
        }
    }

    function getParams() {
        return {
            suppressQuotes: getValue('#suppressQuotes'),
            columnSeparator: getValue('#columnSeparator'),
            customHeader: getValue('#customHeader'),
            customFooter: getValue('#customFooter'),
        };
    }

    function onBtnExport() {
        var params = getParams();
        if (params.suppressQuotes || params.columnSeparator) {
            alert(
                'NOTE: you are downloading a file with non-standard quotes or separators - it may not render correctly in Excel.'
            );
        }
        gridOptions.api.exportDataAsCsv(params);
    }
</script>