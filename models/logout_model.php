<?php

class Logout_Model
{
    public function logout() {
        session_unset();

        $_SESSION['userId'] = 0;
        $_SESSION['userFirstName'] = "";
        $_SESSION['userPermission'] = "1__";
    }
}
