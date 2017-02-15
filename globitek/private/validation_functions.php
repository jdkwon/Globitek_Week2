<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  // return TRUE if valid, FALSE when it's not
  function has_valid_phone($value) {
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $value)) return true;
    else return false;
  }

  function has_valid_name($value) {
    return preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $value);
  }

  function has_valid_username($value) {
    return preg_match('/\A[A-Za-z0-9_]+\Z/', $value);
  }

  // return TRUE if it is unique, FALSE when there exists
  function has_unique_username($value) {
    $value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    global $db;
    $sql = "SELECT * FROM users WHERE username='" . $value . "';";
    $query = db_query($db, $sql);

    while($result = $query->fetch_assoc()) {
      if($value == $result['username']) return false;
    }
    return true;
  }

  // return TRUE if upper case, FALSE if not
  function has_valid_state_code($value) {
    return ctype_upper($value);
  }

  // return TRUE if all numbers
  function has_valid_territory_position($value) {
    return is_numeric($value);
  }

  // return TRUE if positive
  function is_positive($value) {
    return $value > 0;
  }

?>
