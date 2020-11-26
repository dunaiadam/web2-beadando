<?php

class Register_Model
{
    public function register($vars)
    {
        $data['result'] = "";

        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("INSERT INTO User (username, password, firstName) VALUES (?, ?, ?)");
            $hashedPassword = sha1($vars['password']);
            $stmt->bind_param("sss", $vars['username'], $hashedPassword, $vars['firstName']);

            if ($stmt->execute()) {
                $data['result'] = "OK";
                $data['message'] = "Sikeres regisztráció, jelentkezz be!";
            } else {
                $data['result'] = "ERROR";
                $data['message'] = "Hiba a regisztráció során, próbálj meg másik felhasználónevet!";
            }
        } catch (Exception $e) {
            $data['result'] = "ERROR";
            $data['message'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $data;
    }
}
