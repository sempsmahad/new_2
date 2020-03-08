<?php 
require_once('../../../private/initialize.php');
require_manager_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../../../private/shared/commn_header_links.php'); ?> 
</head>
<body>
<form action="new.php" method="post">
<div class="card-body">
<div class="form-group row">
                <label for="FirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                </div>
                </div>
                <div class="form-group row">
                <label for="LastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                </div>
                </div>
                <div class="form-group row">
                <label for="UserName" class="col-sm-2 col-form-label">UserName</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="UserName" placeholder="name">
                </div>
                </div>
                <div class="form-group row">
                <label for="Affiliation" class="col-sm-2 col-form-label">Affiliation</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Affiliation" placeholder="Affiliation">
                </div>
                </div>
                <div class="form-group row">
                <label for="Type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Type" placeholder="Type">
                </div>
                </div>
              
               
</div>
</form>

   <?php require_once('../../../private/shared/cmn_scripts.php'); ?> 
</body>
</html>