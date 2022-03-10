<?php

require_once('User.php');
require_once('header.php');
class Admin extends User
{

    public function present()
    {
        return $this->name . " &nbsp" . $this->surname . ". &nbsp  - Вы можете на сайте делать все";
    }


}