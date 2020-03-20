<?php

function url_for($script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = '/'.$script_path;
    }

    return WWW_ROOT.$script_path;
}

function require_admin_login()
{
    if ($_SESSION['user_type'] != 'admin') {
        redirect_to(url_for('/index.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], '.php');

    if ($current_file_name == $requestUri) {
        echo 'active';
    }
}

function require_manager_login()
{
    if ($_SESSION['user_type'] != 'manager') {
        redirect_to(url_for('/index.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}
function require_cashier_login()
{
    if ($_SESSION['user_type'] != 'cashier') {
        redirect_to(url_for('/index.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

function is_logged_in()
{
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['user_id']);
}

function log_in_user($user)
{
    // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = $user['type'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $user['username'];

    return true;
}

function log_out_user()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['user_type']);
    unset($_SESSION['username']);
    // session_destroy(); // optional: destroys the whole session
    return true;
}

function u($string = '')
{
    return urlencode($string);
}

  function raw_u($string = '')
  {
      return rawurlencode($string);
  }

  function h($string = '')
  {
      return htmlspecialchars($string);
  }

function find_all_items($options = [])
{
    global $db;
    $tb_name = $options['tb_name'] ?? '';
    // echo();
    $sql = 'SELECT * FROM ';
    $sql .= $tb_name;
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

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function find_user_by_id($id)
{
    global $db;

    $sql = 'SELECT * FROM users ';
    $sql .= "WHERE id='".db_escape($db, $id)."' ";
    $sql .= 'LIMIT 1';
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    return $user; // returns an assoc. array
}
  function find_user_by_username($username)
  {
      global $db;

      $sql = 'SELECT * FROM users ';
      $sql .= "WHERE username='".db_escape($db, $username)."' ";
      $sql .= 'LIMIT 1';
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $user = mysqli_fetch_assoc($result); // find first
      mysqli_free_result($result);

      return $user; // returns an assoc. array
  }
 // Performs all actions necessary to log in an admin

 function require_login()
 {
     if (!is_logged_in()) {
         redirect_to(url_for('/index.php'));
     } else {
         // Do nothing, let the rest of the page proceed
     }
 }
    function is_blank($value)
    {
        return !isset($value) || trim($value) === '';
    }
    function redirect_to($location)
    {
        header('Location: '.$location);
        exit;
    }

    function insert_user($user)
    {
        global $db;

        $tmp_image = $_FILES['image_upload']['tmp_name'];
        $upload_dir = '../images';
        $target_image = $user['username'].'_'.$user['join_date'].'.jpg';      

        $errors = validate_user($user);
        if (!empty($errors)) {
            return $errors;
        }

        $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);
        $image_name = 'images/'.$target_image;

        $sql = 'INSERT INTO users ';
        $sql .= '(first_name, last_name, email, username, password,type,affiliation,image,join_date) ';
        $sql .= 'VALUES (';
        $sql .= "'".db_escape($db, $user['first_name'])."',";
        $sql .= "'".db_escape($db, $user['last_name'])."',";
        $sql .= "'".db_escape($db, $user['email'])."',";
        $sql .= "'".db_escape($db, $user['username'])."',";
        $sql .= "'".db_escape($db, $hashed_password)."',";
        $sql .= "'".db_escape($db, $user['type'])."',";
        $sql .= "'".db_escape($db, $user['affiliation'])."',";
        $sql .= "'".db_escape($db, $image_name)."',";
        $sql .= "'".db_escape($db, $user['join_date'])."'";
        $sql .= ')';
        $result = mysqli_query($db, $sql);

        // For INSERT statements, $result is true/false
        if ($result) {
            if (move_uploaded_file($tmp_image, $upload_dir.'/'.$target_image)) {
            } else {
                $errors = $_FILES['image_upload']['error'].' failed to upload';
            }
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

      function validate_user($user, $options = [])
      {
          $password_required = $options['password_required'] ?? true;

          if (is_blank($user['first_name'])) {
              $errors[] = 'First name cannot be blank.';
          } elseif (!has_length($user['first_name'], array('min' => 2, 'max' => 255))) {
              $errors[] = 'First name must be between 2 and 255 characters.';
          }

          if (is_blank($user['last_name'])) {
              $errors[] = 'Last name cannot be blank.';
          } elseif (!has_length($user['last_name'], array('min' => 2, 'max' => 255))) {
              $errors[] = 'Last name must be between 2 and 255 characters.';
          }

          if (is_blank($user['email'])) {
              $errors[] = 'Email cannot be blank.';
          } elseif (!has_length($user['email'], array('max' => 255))) {
              $errors[] = 'Last name must be less than 255 characters.';
          } elseif (!has_valid_email_format($user['email'])) {
              $errors[] = 'Email must be a valid format.';
          }

          if (is_blank($user['username'])) {
              $errors[] = 'Username cannot be blank.';
          } elseif (!has_length($user['username'], array('min' => 8, 'max' => 255))) {
              $errors[] = 'Username must be between 8 and 255 characters.';
          } elseif (!has_unique_username($user['username'], $user['id'] ?? 0)) {
              $errors[] = 'Username not allowed. Try another.';
          }

          //   if ($password_required) {
          //       if (is_blank($user['password'])) {
          //           $errors[] = 'Password cannot be blank.';
          //       } elseif (!has_length($user['password'], array('min' => 12))) {
          //           $errors[] = 'Password must contain 12 or more characters';
          //       } elseif (!preg_match('/[A-Z]/', $user['password'])) {
          //           $errors[] = 'Password must contain at least 1 uppercase letter';
          //       } elseif (!preg_match('/[a-z]/', $user['password'])) {
          //           $errors[] = 'Password must contain at least 1 lowercase letter';
          //       } elseif (!preg_match('/[0-9]/', $user['password'])) {
          //           $errors[] = 'Password must contain at least 1 number';
          //       } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user['password'])) {
          //           $errors[] = 'Password must contain at least 1 symbol';
          //       }

          //       if (is_blank($user['confirm_password'])) {
          //           $errors[] = 'Confirm password cannot be blank.';
          //       } elseif ($user['password'] !== $user['confirm_password']) {
          //           $errors[] = 'Password and confirm password must match.';
          //       }
          //   }

          return $errors;
      }
      function has_valid_email_format($value)
      {
          $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';

          return preg_match($email_regex, $value) === 1;
      }
      function display_errors($errors = array())
      {
          $output = '';
          if (!empty($errors)) {
              $output .= '<div class="errors">';
              $output .= 'Please fix the following errors:';
              $output .= '<ul>';
              foreach ($errors as $error) {
                  $output .= '<li>'.h($error).'</li>';
              }
              $output .= '</ul>';
              $output .= '</div>';
          }

          return $output;
      }
      function has_length($value, $options)
      {
          if (isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
              return false;
          } elseif (isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
              return false;
          } elseif (isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
              return false;
          } else {
              return true;
          }
      }

      function has_unique_username($username, $current_id = '0')
      {
          global $db;

          $sql = 'SELECT * FROM users ';
          $sql .= "WHERE username='".db_escape($db, $username)."' ";
          $sql .= "AND id != '".db_escape($db, $current_id)."'";

          $result = mysqli_query($db, $sql);
          $user_count = mysqli_num_rows($result);
          mysqli_free_result($result);

          return $user_count === 0;
      }
      function has_length_exactly($value, $exact)
      {
          $length = strlen($value);

          return $length == $exact;
      }
      function has_length_less_than($value, $max)
      {
          $length = strlen($value);

          return $length < $max;
      }
      function has_length_greater_than($value, $min)
      {
          $length = strlen($value);

          return $length > $min;
      }

    function insert_stock($stock)
    {
        global $db;
        // $
        // $errors = validate_stock($stock);
        // if(!empty($errors)) {
        //   return $errors;
        // }
        if ($stock['name'] != '') {
            $stock_images = 'stock_images/';
            $image_path = time().$stock['name'];
            if (move_uploaded_file($_FILES['files']['tmp_name'], $stock_images.$image_path)) {
                $sql = 'INSERT INTO stock ';
                $sql .= '(name, quantity, purchase_day,expiry_day,remaining,image_path,supplier) ';
                $sql .= 'VALUES (';
                $sql .= "'".db_escape($db, $stock['name'])."',";
                $sql .= "'".db_escape($db, $stock['quantity'])."',";
                $sql .= "'".db_escape($db, $stock['purchase_day'])."',";
                $sql .= "'".db_escape($db, $stock['expiry_day'])."',";
                $sql .= "'".db_escape($db, $stock['remaining'])."',";
                $sql .= "'".db_escape($db, $stock['image_path'])."',";
                $sql .= "'".db_escape($db, $stock['supplier'])."'";
                $sql .= ')';
            }
        }

        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function shift_subject_positions($start_pos, $end_pos, $current_id = 0)
    {
        global $db;

        if ($start_pos == $end_pos) {
            return;
        }

        $sql = 'UPDATE subjects ';
        if ($start_pos == 0) {
            // new item, +1 to items greater than $end_pos
            $sql .= 'SET position = position + 1 ';
            $sql .= "WHERE position >= '".db_escape($db, $end_pos)."' ";
        } elseif ($end_pos == 0) {
            // delete item, -1 from items greater than $start_pos
            $sql .= 'SET position = position - 1 ';
            $sql .= "WHERE position > '".db_escape($db, $start_pos)."' ";
        } elseif ($start_pos < $end_pos) {
            // move later, -1 from items between (including $end_pos)
            $sql .= 'SET position = position - 1 ';
            $sql .= "WHERE position > '".db_escape($db, $start_pos)."' ";
            $sql .= "AND position <= '".db_escape($db, $end_pos)."' ";
        } elseif ($start_pos > $end_pos) {
            // move earlier, +1 to items between (including $end_pos)
            $sql .= 'SET position = position + 1 ';
            $sql .= "WHERE position >= '".db_escape($db, $end_pos)."' ";
            $sql .= "AND position < '".db_escape($db, $start_pos)."' ";
        }
        // Exclude the current_id in the SQL WHERE clause
        $sql .= "AND id != '".db_escape($db, $current_id)."' ";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // UPDATE failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function confirm_result_set($result_set)
    {
        if (!$result_set) {
            exit('Database query failed.');
        }
    }

    // new
    function find_all_users($limit)
    {
        global $db;
        $sql = 'SELECT * FROM users ';
        $sql .= 'ORDER BY username ASC';
        $sql .= 'LIMIT ';
        $sql .= $limit;

        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);

        return $result;
    }
