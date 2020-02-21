<?php require_once('../../../private/initialize.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../../../private/shared/commn_header_links.php'); ?> 
</head>
<body class="content-wrapper">
<section class="content-header">
      
    </section> 
    <!-- -->
 
</div>
<div class="row">
<div class="col-md-6">
<div class="card card-outline card-success">
<div class="card-header">
      <h3 class="card-title">item</h3>
  </div>
  <form action="sell.php" method="post" class="card-body" id="itemForm">  
  <div class="form-group row">
  <label for="name" class="col-sm-2 col-form-label">name</label>
  <div class="col-sm-7">
  <input id="name"  class="form-control" type="text" onkeypress="return runScript(event)" autofocus></div>
  </div>  
  <div class="form-group row">
  <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
  <div class="col-sm-7">
  <input id="quantity"  class="form-control" type="number" placeholder="0.00"></div>
  </div>  
  <div class="form-group row">
  <label for="price" class="col-sm-2 col-form-label">price</label>
  <div class="col-sm-7">
  <input id="name"  class="form-control" type="number" placeholder="0.00" disabled></div>
  </div>  
  <div class="form-group row">
  <label for="name" class="col-sm-2 col-form-label">total price</label>
  <div class="col-sm-7">
  <input id="total_price"  class="form-control" type="text" placeholder="0.00" readonly></div>  
  </div> 
  <button type="submit" class="btn bg-gradient-success float-right" value="submit">submit</button>      
  </form>
  <button type="button" id="4ere" class="btn bg-gradient-success float-right" onclick="appendTR()">submit</button> 
</div>
</div>
<div class="col-md-6">
<div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>quantity</th>
                      <th style="width: 40px">price</th>
                    </tr>
                  </thead>
                  <tbody id="tbody"></tbody>
                </table>
              </div>
              <!-- /.card-body -->              
      </div>
</div>
</div>
<div class="content container-fluid">
<div class="card card-default">
<div class="card-body">
<div class="row">
<div class="col-md-6" data-select2-id="29">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3">Alabama</option>
                    <option data-select2-id="30">Alaska</option>
                    <option data-select2-id="31">California</option>
                    <option data-select2-id="32">Delaware</option>
                    <option data-select2-id="33">Tennessee</option>
                    <option data-select2-id="34">Texas</option>
                    <option data-select2-id="35">Washington</option>
                  </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 100%;">
                  <span class="selection">
                  <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-rjdk-container">
                  <span class="select2-selection__rendered" id="select2-rjdk-container" role="textbox" aria-readonly="true" title="Tennessee">Tennessee</span>
                  <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span>
                  <span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!-- /.form-group -->              
                <!-- /.form-group -->
              </div>
              </div></div></div></div>











<?php require_once('../../../private/shared/cmn_scripts.php'); ?> 
<script>
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}
let staff = document.querySelector("#itemForm").querySelectorAll("input");
let nodeArray = Array.from(staff)
staff.forEach(s => {
  s.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      if(nodeArray.indexOf(s) !== (nodeArray.length)){
      nodeArray[nodeArray.indexOf(s) + 1].focus();
      // Do more work)
      }else{
        s.closest('form').submit();
      }
    }
  });
});

let tbody = document.querySelector('#tbody');
let nameBox = document.querySelector('#name');
const getDefaultCurrency = ()=>{};
const appendTR = ()=>{
  let counter = tbody.rows.length;
  let itemName = nameBox.value||'someItem';
  let percentage= getRandomInt(100);
  let currencySymbol = getDefaultCurrency()||' UGX'
  let rowString = '<tr><td>';
  rowString += counter+1;
  rowString +='</td><td>';
  rowString += itemName;
  rowString +='</td><td><div class="progress progress-xs progress-striped active"><div class="progress-bar "bg-primary" style="width:';
  rowString +=percentage;
  rowString +='%"></div></div></td><td><span class="badge bg-primary">'
  rowString +=percentage;
  rowString +=currencySymbol;
  rowString +='</span></td></tr>';
  tbody.insertAdjacentHTML('afterbegin', rowString);
};


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })  
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()   
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })

</script>
</body>
</html>