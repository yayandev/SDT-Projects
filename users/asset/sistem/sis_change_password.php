<?php
function usernameExist($conn, $username) {
  $multiUser = query("SELECT * FROM multi_user WHERE username = '$username'");
  $profile = query("SELECT * FROM profile WHERE name = '$username'");
  if (
  count($multiUser) > 0 && 
  count($profile) > 0
  ) {
    return true;
  }
  
  return false;
}