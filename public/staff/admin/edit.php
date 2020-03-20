<?php
require_once '../../../private/initialize.php';
require_login();
$user = find_user_by_id($_SESSION['user_id']);

if(!isset($_GET['id'])) {
   redirect_to(url_for('/staff/admin/index.php'));
 }
 $id = $_GET['id'];

if (is_post_request()) {
//     echo "<pre>";
    // print_r($_FILES['image_upload']);
    // echo"</pre>";
    // echo"<hr />";
    $now = new DateTime();
    $cur_user = [];
    $cur_user['id'] = $id;
    $cur_user['first_name'] = $_POST['first_name'] ?? '';
    $cur_user['last_name'] = $_POST['last_name'] ?? '';
    $cur_user['email'] = $_POST['email'] ?? '';
    $cur_user['username'] = $_POST['username'] ?? '';
    $cur_user['type'] = $_POST['type'] ?? '';
    $cur_user['join_date'] = $_POST['join_date'] ?? $now->format('Y-m-d');
    $cur_user['affiliation'] = $_POST['affiliation'] ?? '';
    $cur_user['password'] = $_POST['password'] ?? '';
    $cur_user['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = update_user($cur_user);
    if ($result === true) {
        $_SESSION['message'] = 'user updated.';
        redirect_to(url_for('/staff/admin/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
} else {
   $cur_user = find_user_by_id($id);
}

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
while ($user0 = mysqli_fetch_assoc($users)) {
    array_push($affiliations, $user0['affiliation']);
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

        .avatar-upload .avatar-edit input+label {
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

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
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

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require_once '../../../private/shared/nav_bar_admin.php'; ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php require_once '../../../private/shared/side_bar_admin.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">

            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                        <?php echo display_errors($errors); ?>
                            <form role="form" action="create_user.php" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                            
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" name="image_upload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                    style="background-image: url(<?php if($cur_user['image']!==""){
                                                        echo url_for($cur_user['image']);
                                                    }else{
                                                      echo url_for("images/avatar.png");
                                                      }?>
                                                   );">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label for="FirstName" class="col-sm-2 col-form-label">First
                                                    Name</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="first_name" id="FirstName"
                                                        placeholder="First Name" value="<?php echo h($cur_user['first_name']); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="LastName" class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="last_name" id="LastName"
                                                        placeholder="Last Name" value="<?php echo h($cur_user['last_name']); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="UserName" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-5">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="email" value="<?php echo h($cur_user['email']); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="UserName" class="col-sm-2 col-form-label">UserName</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="username" id="UserName"
                                                        placeholder="name" value="<?php echo h($cur_user['username']); ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Affiliation"
                                                    class="col-sm-2 col-form-label">Affiliation</label>
                                                <div class="col-sm-5">
                                                    <select id="Affiliation" name="Affiliation" class="form-control select2bs4"
                                                        style="width: 100%;">
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
                                                <div class="col-sm-5">
                                                    <input type="password" name="password" class="form-control" id="password"
                                                        placeholder="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="confirm_password" class="col-sm-2 col-form-label">confirm
                                                    password</label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password"
                                                        placeholder="confirm password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Type" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-5">
                                                    <select id="Type" name="type" class="form-control select2bs4"
                                                        style="width: 100%;">

                                                        <option <?php if($cur_user['type']==="admin"){echo 'selected';}?>>admin</option>
                                                        <option <?php if($cur_user['type']==="manager"){echo 'selected';}?>>manager</option>
                                                        <option <?php if($cur_user['type']==="cashier"){echo 'selected';}?>>cashier</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <button class="btn btn-block col-sm-7 bg-gradient-primary">create</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </section>
        </div>
    </div>

    <?php require_once '../../../private/shared/cmn_scripts.php'; ?>
    <script>
        $(function () {

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
</body>

</html>