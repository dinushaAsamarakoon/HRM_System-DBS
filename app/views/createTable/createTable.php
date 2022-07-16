<!doctype html>
<html lang="en">
<head>
    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>

    <title>Custom Table</title>

</head>
<body>
<div class="shadow p-3 mb-5  rounded">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse nav-tabs navbar-collapse justify-content-end " id="navbarTogglerDemo03">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link " href="<?=SROOT?><?=Session::get('dashboard')?>" style="color: #0c63e4;font-size: 20px;">Dashboard</a>
                </li>

            </ul>

        </div>
    </nav>

</div>
<form action="<?=SROOT?>AdminFunctionHandler/addEmployeeAttribute" method="post">
<div class="container p-lg-5 ">

    <div class="container-fluid ps-1 ">


        <div class="row  shadow-lg p-3" style="color: #0c63e4;">

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body  bg-opacity-10 shadow" style="color: #0c63e4;">
                        <h5 class="card-title">Create table name</h5>
                        <p class="card-text"><input type="text" class="form-control" name="table" placeholder="Enter table name">
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body  bg-opacity-10 shadow" style="color: #0c63e4;">
                        <h5 class="card-title">Number of columns</h5>
                        <p class="card-text"><input type="number" class="form-control" name="columns"
                                                    placeholder="Enter number of columns" id="num_row"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 pt-3  ">
                <div class="card ">
                    <div class="card-body p-2 shadow bg-opacity-10v d-flex justify-content-center"
                         style="color: #0c63e4;">

                        <p class="card-text">
                            <button type="button" class="btn btn-dark bg-opacity-10" id="num_row1"
                                    onclick="myFunction()">Go
                            </button>
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="p-4 w-100  shadow-lg" style="display: none;" id="tableContent">
    <div id="Table">

    </div>
    <br>
    <div class="row pt-4 p-3 d-flex justify-content-end">
        <div class="col-sm-1 ">
            <div class="card">
                <div class="card-body p-2 bg-opacity-10 shadow d-flex justify-content-center"
                     style="color: #0c63e4;">

                    <p class="card-text"><a href="<?= SROOT ?>AdminFunctionHandler/addEmployeeAttribute"></a>
                        <button type="submit" class="btn btn-dark bg-opacity-10">Save</button>
                    </p>

                </div>
            </div>
        </div>
    </div>

</div>
</form>

</body>
</html>