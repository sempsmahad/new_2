<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function find_all_items($options=[]) {
  global $db;
  $tb_name = $options['tb_name'] ?? '';
  // echo();
  $sql = "SELECT * FROM ";
  $sql .= $tb_name;  
  $sql .= " ORDER BY name ASC";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

// function find_all_items_on_date($options=[]){
//   global $db;
//   $tb_name = $options['tb_name'] ?? '';
//   $tgt_date = $options['target_date'] ?? '';
//   // echo();
//   $sql = "SELECT * FROM ";
//   $sql .= $tb_name; 
//   $sql .= " WHERE date is like % "
//   $sql .= $tgt_date;
//   $sql .= " % " 
//   $sql .= "ORDER BY name ASC";
//   //echo $sql;
//   $result = mysqli_query($db, $sql);
//   confirm_result_set($result);
//   return $result;
// }

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function find_admin_by_username($username)
{
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}
 // Performs all actions necessary to log in an admin
 function log_in_admin($admin) {
    // Renerating the ID protects the admin from session fixation.
      session_regenerate_id();
      $_SESSION['admin_id'] = $admin['id'];
      $_SESSION['last_login'] = time();
      $_SESSION['username'] = $admin['username'];
      return true;
    }

    function is_blank($value) {
      return !isset($value) || trim($value) === '';
    }
    function redirect_to($location) {
      header("Location: " . $location);
      exit;
    }

    function insert_stock($stock) {
      global $db;
  
      $
      $errors = validate_stock($stock);
      if(!empty($errors)) {
        return $errors;
      }
  
      if($stock['name']!=''){
        $stock_images="stock_images/";
        $image_path = time().$stock['name'];
        if(move_uploaded_file($_FILES['files']['tmp_name'],$stock_images.$image_path)){
          $sql = "INSERT INTO stock ";
          $sql .= "(name, quantity, purchase_day,expiry_day,remaining,image_path,supplier) ";
          $sql .= "VALUES (";
          $sql .= "'" . db_escape($db, $stock['name']) . "',";
          $sql .= "'" . db_escape($db, $stock['quantity']) . "',";
          $sql .= "'" . db_escape($db, $stock['purchase_day']) . "',";
          $sql .= "'" . db_escape($db, $stock['expiry_day']) . "',";
          $sql .= "'" . db_escape($db, $stock['remaining']) . "',";
          $sql .= "'" . db_escape($db, $stock['image_path']) . "',";
          $sql .= "'" . db_escape($db, $stock['supplier']) . "'";
          $sql .= ")";
        }
      }
        
      $result = mysqli_query($db, $sql);
      // For INSERT statements, $result is true/false
      if($result) {
        return true;
      } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function shift_subject_positions($start_pos, $end_pos, $current_id=0) {
      global $db;
  
      if($start_pos == $end_pos) { return; }
  
      $sql = "UPDATE subjects ";
      if($start_pos == 0) {
        // new item, +1 to items greater than $end_pos
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
      } elseif($end_pos == 0) {
        // delete item, -1 from items greater than $start_pos
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
      } elseif($start_pos < $end_pos) {
        // move later, -1 from items between (including $end_pos)
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
        $sql .= "AND position <= '" . db_escape($db, $end_pos) . "' ";
      } elseif($start_pos > $end_pos) {
        // move earlier, +1 to items between (including $end_pos)
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
        $sql .= "AND position < '" . db_escape($db, $start_pos) . "' ";
      }
      // Exclude the current_id in the SQL WHERE clause
      $sql .= "AND id != '" . db_escape($db, $current_id) . "' ";
  
      $result = mysqli_query($db, $sql);
      // For UPDATE statements, $result is true/false
      if($result) {
        return true;
      } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function confirm_result_set($result_set) {
      if (!$result_set) {
        exit("Database query failed.");
      }
    }
    
?>