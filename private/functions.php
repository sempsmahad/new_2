<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

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
?>