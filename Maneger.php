<?php

require_once('User.php');
require_once('header.php');
class Maneger  extends User
{
    public function present()
    {
        return $this->role . "&nbsp &nbsp" . $this->name . " &nbsp" . $this->surname . "  - Вы можете на сайте изменять, удалять и создавать клиентов";
    }
}
