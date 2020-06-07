<!DOCTYPE html>
<html lang="en">

<head>
    <title>STOCK LOGS </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Best platform for Potfolio Analysis">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo/logo.png" type="image/png">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/logo/logo.png" type="image/png">

    <!--Fonts-->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!--FaFa Icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">

    <script>
        var styles = [
            'color: red',
            'font-wieght: 900',
            'font-size: 45px',
            'font-family: "Raleway, sans-serif"',
        ].join(';');
        var styles1 = [
            'font-family: raleway',
            'color: blue',
            'font-size: 20px',
        ].join(';');

        console.log('%c =>Want some AWESOME Web Apps?', styles);
        console.log('%c =>Contact me : Varun Bhandia', styles1);
        console.log('%c =>Email          : varunbhandia@gmail.com', styles1);
        console.log('%c =>Mobile No   : +91 9001126303', styles1);
        console.log('%c =>LinkedIn    : https://www.linkedin.com/in/varunbhandia', styles1);
        console.log('%c =>GitHub       : https://github.com/varunbhandia', styles1);
    </script>
    <style>
        .ag-theme-alpine .ag-root-wrapper {
            border-color: #000000;
            border-radius: 6px;
        }

        .ag-theme-alpine .ag-row {
            border-width: 0px;
        }

        .ag-theme-alpine .ag-root-wrapper {
            background-color: transparent;
        }

        .ag-theme-alpine .ag-header-icon {
            color: white;
            opacity: 1 !important;
        }

        .ag-header-viewport,
        .ag-floating-top-viewport,
        .ag-body-viewport,
        .ag-center-cols-viewport,
        .ag-floating-bottom-viewport,
        .ag-body-horizontal-scroll-viewport,
        .ag-virtual-list-viewport {
            position: relative;
            height: 100%;
            min-width: 0px;
            overflow: hidden;
            flex: 1 1 auto;
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="fluid-container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark-custom">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>assets/img/logo/logo.png" style="height: 70px;"> STOCK LOGS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Portfolio</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- <div class="sidenav">
            <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-1x" aria-hidden="true"></i></a>
        </div> -->
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content dark-inner-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-dark">Import</button>
                    </div>
                </div>
            </div>
        </div>
    </div>