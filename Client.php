<?php

require_once('User.php');
require_once('header.php');
class Client extends User
{
    public function present()
    {
        return $this->role . " &nbsp" . $this->name . " &nbsp" . $this->surname . ". &nbsp  - Вы можете на сайте просматривать информацию доступную пользователям";
    }
}