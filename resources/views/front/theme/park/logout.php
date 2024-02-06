<?php

use public_html\class\user;

unset($_COOKIE['is_auth']);
unset($_COOKIE['user_mobile']);
setcookie('is_auth', '', -1, '/');
setcookie('user_mobile', '', -1, '/');
$user = new user();
$slug = $user->get_slug_account();
$redirect_url = ROOT_URL . '/' . $slug;
header("location: " . $redirect_url);
exit;
//var_dump($redirect_url);
