<?php require_once('../../../private/initialize.php');  ?>
<?php

if(is_post_request()) {
  $stock = [];
  $stock['name'] = $_POST['menu_name'] ?? '';
  $stock['quantity'] = $_POST['position'] ?? '';
  $stock['purchase_day'] = $_POST['purchase_day'] ?? '';
  $stock['expiry_day'] = $_POST['expiry_day'] ?? '';
  $stock['remaining'] = $_POST['remaining'] ?? '';
  $stock['image_path'] = $_POST['image_path'] ?? '';
  $stock['supplier'] = $_POST['supplier'] ?? '';

  $result = insert_subject($stock);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The subject was created successfully.';
    redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $stock = [];
  $stock['name'] = '';
  $stock['quantity'] ='';
  $stock['purchase_day'] = '';
  $stock['expiry_day'] = '';
  $stock['remaining'] ='';
  $stock['image_path'] ='';
  $stock['supplier'] ='';
}
//add picture

//add name
//add quantity
//add date
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../../../private/shared/commn_header_links.php'); ?>  
</head>
<body>
<div>
<form action="new_stock.php" method="post" >
<div class="form-group row">
<label for="stockName" class="col-sm-1 col-form-label">name</label>
<div class="col-sm-3">
<input type="text" class="form-control" name="name" id="stockName" placeholder="name">
</div>
</div>
<div class="form-group row">
<label for="stockCategory" class="col-sm-1 col-form-label">category</label>
<div class="col-sm-3">
<input type="text" class="form-control" name="name" id="stockCategory" placeholder="category">
</div>
</div>
<div class="form-group row">
<label for="unitPrice" class="col-sm-1 col-form-label">unit price</label>
<div class="col-sm-3">
<input type="text" class="form-control" name="name" id="unitPrice" placeholder="unit price">
</div>
</div>
<div class="form-group row">
<label for="stockQty" class="col-sm-1 col-form-label">quantity</label>
<div class="col-sm-3">
<input type="number" class="form-control" name="quantity" id="stockQty" placeholder="quantity">
</div>
</div>
<div class="form-group row">
<label for="dayIn" class="col-sm-1 col-form-label">purchase day</label>
  <div class="col-sm-3 input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>    
      <input type="date" class="form-control datepicker" name="purchase_day" id="dayIn" placeholder="purchase day">    
  </div>
</div>
<div class="form-group row">
<label for="goodB4" class="col-sm-1 col-form-label">expiry day</label>
  <div class="col-sm-3 input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>    
      <input type="date" class="form-control datepicker" name="expiry_day" id="goodB4" placeholder="expiry day">   
  </div>
</div>

<div class="form-group row">
<label for="image_path" class="col-sm-1 col-form-label">image</label>
<div class="col-sm-3">
<input type="button" class="form-control" name="image" id="image_path" placeholder="image">
</div>
</div>
<div class="form-group row">
<label for="supplier" class="col-sm-1 col-form-label">supplier</label>
<div class="col-sm-3">
<input type="text" class="form-control" name="supplier" id="supplier" placeholder="supplier">
</div>
</div>
<button type="submit">submit</button>
</form>
</div>
  
<?php require_once('../../../private/shared/cmn_scripts.php'); ?>  
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }    
    reader.readAsDataURL(input.files[0]);
  }
}
function resizeToMax(id){
    myImage = new Image() 
    var img = document.getElementById(id);
    myImage.src = img.src; 
    if(myImage.width > myImage.height){
        img.style.width = "50rem";
    } else {
        img.style.height = "50rem";
    }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script> 
</body>
</html>
