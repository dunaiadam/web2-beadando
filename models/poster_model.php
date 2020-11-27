<?php

class Poster_Model
{

    public function post($vars)
    {
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("INSERT INTO News (title, message, authorUserId) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $vars['title'], $vars['message'], $_SESSION['userId']);

            if ($stmt->execute()) {
                $data['result'] = "OK";
                $data['message'] = "Sikeres posztolás! A posztod megjelent a hírek között.";
            } else {
                $data['result'] = "ERROR";
                $data['message'] = "Hiba a posztolás során!";
            }
        } catch (Exception $e) {
            $data['result'] = "ERROR";
            $data['message'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $data;
    }
}
