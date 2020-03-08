<?php 
require_once('../../../private/initialize.php');
require_cashier_login();
$user = find_user_by_id($_SESSION['user_id']); 
?>
    <?php

if (is_post_request()) {
    $stock = [];
    $stock['name'] = $_POST['name'] ?? '';
    $stock['category'] = $_POST['category'] ?? '';
    $stock['quantity'] = $_POST['quantity'] ?? '';
    $stock['purchase_price'] = $_POST['purchase_price'] ?? '';
    $stock['in_date'] = $_POST['in_date'] ?? '';
    $stock['expiry_day'] = $_POST['expiry_day'] ?? '';
    $stock['image'] = $_POST['image'] ?? '';
    $stock['supplier'] = $_POST['supplier'] ?? '';

    $result = insert_stock($stock);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = 'The stock was saved successfully.';
        redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
    } else {
        $errors = $result;
    }
} else {
    // display the blank form
    $stock = [];
    $stock['name'] = '';
    $stock['category'] = '';
    $stock['quantity'] = '';
    $stock['purchase_price'] = '';
    $stock['in_date'] = '';
    $stock['expiry_day'] = '';
    $stock['image'] = '';
    $stock['supplier'] = '';
}
//add picture
//add name
//add quantity
//add date
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require_once '../../../private/shared/commn_header_links.php'; ?>
        </head>

        <body>
            <div class="wrapper">
              <!-- Navbar -->
        <?php require_once '../../../private/shared/nav_bar_cashier.php'; ?>
        <!-- /.navbar -->
           <!-- Main Sidebar Container -->
           <?php require_once '../../../private/shared/side_bar_cashier.php'; ?>
                <div class="content-wrapper">
                    <section class="content-header">
                    </section>
                    <section class="content">
                        <form action="new_stock.php" method="post">
                        <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="stockName" >Name</label>
                                        <input type="text" class="form-control" name="name" id="stockName" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="stockCategory" >category</label>
                                        <input type="text" class="form-control" name="category" id="stockCategory" placeholder="category">
                                    </div>
                                </div>
                        </div> 
                        <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="unitPrice" >unit price</label>
                                        <input type="number" class="form-control" name="purchase_price" id="unitPrice" placeholder="unit price">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="stockQty" >quantity</label>
                                        <input type="number" class="form-control" name="quantity" id="stockQty" placeholder="quantity">
                                    </div>
                                </div>
                        </div> 
                        <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="dayIn" >purchase day</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                           </div>
                                           <input type="date" class="form-control datepicker" name="in_date" id="dayIn" placeholder="purchase day">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="goodB4" >expiry day</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                           </div>
                                           <input type="date" class="form-control datepicker" name="expiry_day" id="goodB4" placeholder="expiry day">
                                        </div>
                                    </div>
                                </div>
                        </div> 
                        <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="image_path" >image</label>
                                        <input type="button" class="form-control" name="image" id="image_path" placeholder="image">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label for="supplier" >supplier</label>
                                        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="supplier">
                                    </div>
                                </div>
                        </div>                           

                            
                            <button type="submit">submit</button>
                        </form>
                    </section>
                </div>
            </div>

            <?php require_once '../../../private/shared/cmn_scripts.php'; ?>
                <script type="text/javascript">
                    $(document).ready(function() {
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

                    function resizeToMax(id) {
                        myImage = new Image()
                        var img = document.getElementById(id);
                        myImage.src = img.src;
                        if (myImage.width > myImage.height) {
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