<?php
require_once '../../../private/initialize.php';
require_login();
$item_names = [];
$item_ids = [];
$item_prices = [];
$affiliations = [];
$stock_items = find_all_items(['tb_name' => 'stock']);
$users = find_all_items(['tb_name' => 'users']);
$target_date = new DateTime();
while ($stock_item = mysqli_fetch_assoc($stock_items)) {
    array_push($item_names, $stock_item['name']);
    array_push($item_ids, $stock_item['id']);
    array_push($item_prices, $stock_item['sale_price']);
}
while ($user = mysqli_fetch_assoc($users)) {
    array_push($affiliations, $user['affiliation']);
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once '../../../private/shared/commn_header_links.php'; ?>

            
            <style>
                .container {
                    max-width: 960px;
                    margin: 30px auto;
                    padding: 20px;
                }
                
                h1 {
                    font-size: 20px;
                    text-align: center;
                    margin: 20px 0 20px;
                }
                
                h1 small {
                    display: block;
                    font-size: 15px;
                    padding-top: 8px;
                    color: gray;
                }
                
                .avatar-upload {
                    position: relative;
                    max-width: 205px;
                    margin: 50px auto;
                }
                
                .avatar-upload .avatar-edit {
                    position: absolute;
                    right: 12px;
                    z-index: 1;
                    top: 10px;
                }
                
                .avatar-upload .avatar-edit input {
                    display: none;
                }
                
                .avatar-upload .avatar-edit input + label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    border-radius: 100%;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all 0.2s ease-in-out;
                }
                
                .avatar-upload .avatar-edit input + label:hover {
                    background: #f1f1f1;
                    border-color: #d6d6d6;
                }
                
                .avatar-upload .avatar-edit input + label:after {
                    content: "\f040";
                    font-family: 'FontAwesome';
                    color: #757575;
                    position: absolute;
                    top: 10px;
                    left: 0;
                    right: 0;
                    text-align: center;
                    margin: auto;
                }
                
                .avatar-upload .avatar-preview {
                    width: 192px;
                    height: 192px;
                    position: relative;
                    border-radius: 100%;
                    border: 6px solid #F8F8F8;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                }
                
                .avatar-upload .avatar-preview > div {
                    width: 100%;
                    height: 100%;
                    border-radius: 100%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }
            </style>

    </head>

    <body>
    <div class="wrapper">
                <div class="content-wrapper">
                    <section class="content-header">
                    </section>
                    <section class="content">
        <form action="new.php" method="post">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(https://api.adorable.io/avatars/500/abott@adorable.png);">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="FirstName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="LastName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="UserName" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="UserName" class="col-sm-2 col-form-label">UserName</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="UserName" placeholder="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Affiliation" class="col-sm-2 col-form-label">Affiliation</label>
                    <div class="col-sm-7">
                        <select id="Affiliation" class="form-control select2bs4" style="width: 100%;">
                            <?php
                                foreach ($affiliations as $affiliation) {
                                    echo '<option>'.$affiliation.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="password" placeholder="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm_password" class="col-sm-2 col-form-label">confirm password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="confirm_password" placeholder="confirm password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-7">
                        <select id="Type" class="form-control select2bs4" style="width: 100%;">

                            <option>Admin</option>
                            <option>Manager</option>
                            <option>Cashier</option>

                        </select>
                    </div>
                </div>

            </div>
        </form>
        </form>
                    </section>
                </div>
            </div>

        <?php require_once '../../../private/shared/cmn_scripts.php'; ?>
            <script>
                $(function() {

                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
                })

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imageUpload").change(function() {
                    readURL(this);
                });
            </script>
    </body>

    </html>