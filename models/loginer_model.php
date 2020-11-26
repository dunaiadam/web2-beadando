<?php


class Loginer_Model
{
    public function get_data($vars)
    {
        $data['result'] = "";

        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT * FROM User WHERE username = ? AND password = ?");
            $hashedPassword = sha1($vars['password']);
            $stmt->bind_param("ss", $vars['username'], $hashedPassword );
            $stmt->execute();
            $result = $stmt->get_result();

            $resultArray = [];
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = $row;
            }

            if (count($resultArray) != 1) {
                $data['result'] = "ERROR";
                $data['message'] = "Hibás felhasználónév/jelszó!";
            } else {
                $data['result'] = "OK";
                $data['message'] = "Szia " . $resultArray[0]['firstName'] . "!";

                $_SESSION['userId'] = $resultArray[0]['id'];
                $_SESSION['userFirstName'] = $resultArray[0]['firstName'];
                $_SESSION['userPermission'] = $resultArray[0]['permission'];
            }
        } catch (Exception $e) {
            $data['result'] = "ERROR";
            $data['message'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $data;
    }
}
