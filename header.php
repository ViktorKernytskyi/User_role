<?php

session_start();
require_once('User.php');
require_once('Admin.php');
require_once('Client.php');
require_once('Maneger.php');

if (isset($_SESSION['id'])) {
    $user = new User($_SESSION['id']);
    $name = $user->getName();
    $surname = $user->getsurname();
    $role = $user->getRole();


switch ($user->getRole()) {

    case 'admin' :
        $user = (new Admin($_SESSION['id']));
              break;
    case 'client' :
        $user = (new Client($_SESSION['id']));
             break;
    case 'maneger' :
        $user = (new Maneger($_SESSION['id']));
        break;
    default: header('HTTP/1.0 403 Forbidden');

}

$present = '<div class="login"> Здравствуйте &nbsp' . $user->present() . '</div>';
echo $present;

}