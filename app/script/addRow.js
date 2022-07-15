function myFunction() {
    var numberOfRow = document.getElementById("num_row").value;
    var table = document.getElementById("Table")
    var columnName = "column";
    var dataType = "type";
    var primary = "primary"
    var length = "length";
    var Row = "row"
    var row = '<br>';
    var display = document.getElementById("tableContent");
    if (!(numberOfRow == 0)) {
        for (var i = 1; i <= parseInt(numberOfRow); i++) {

            columnName = "column" + i;
            dataType = "type" + i;
            primary = "primary" + i;
            length = "length" + i;
            Row = "row" + i;
            row += '<div class="row   shadow-lg p-3" style="color: #0c63e4;" id="row1"> <div class="col-sm-3"> <div class="card"> <div class="card-body  bg-opacity-10 shadow" style="color: #0c63e4;"><h5 class="card-title">Column name</h5> <p class="card-text"><input type="text" class="form-control" placeholder="Enter column name" id="colum1" name="'+columnName+'"></p> </div> </div> </div> <div class="col-sm-3"> <div class="card"> <div class="card-body  bg-opacity-10 shadow" style="color: #0c63e4;"> <h5 class="card-title">Select data type</h5> <p class="card-text"> <select class="form-select" aria-label="Default select example" name="'+dataType+'"> <option selected >Open menu</option> <option value="INTEGER" >INTEGER</option> <option value="VARCHAR">VARCHAR</option> <option value="CHAR">CHAR</option> <option value="TEXT">TEXT</option> <option value="DATE">DATE</option> </select> </p> </div> </div> </div> <div class="col-sm-3"> <div class="card"> <div class="card-body  bg-opacity-10 shadow" style="color: #0c63e4;"> <h5 class="card-title">Length</h5> <p class="card-text"><input type="number" class="form-control" placeholder="Enter length" id="length1" name="'+length+'"></p> </div> </div> </div> <div class="col-sm-2 pt-3  "> <div class="card "> <div class="card-body shadow bg-opacity-10 d-flex justify-content-center" style="color: #0c63e4;"> <p class="card-text"><input type="checkbox" class="form-check-input" id="primary1" name="'+primary+'"><label class="form-check-label" for="exampleCheck1" style="color: #0c63e4;">Primary key</label></p> </div> </div> </div> </div>';
            // row+='<input name ="'+columnName+'"/>'
        }
        table.innerHTML = row;
        display.style.display = "block";


    }
}

