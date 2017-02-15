<?php

  function sanitize_name($value) {
      return filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  function sanitize_email($value) {
      return filter_var($value, FILTER_SANITIZE_EMAIL);
  }









?>