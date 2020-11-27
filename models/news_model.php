<?php

class News_Model
{
    public function get_data($vars)
    {
        $data['result'] = "";

        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT n.title, n.message, u.firstName, n.date FROM News n INNER JOIN User u ON n.authorUserId = u.id ORDER BY n.date DESC");
            $stmt->execute();
            $result = $stmt->get_result();

            $resultArray = [];
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = $row;
            }

            if (count($resultArray) == 0) {
                $data['result'] = "ERROR";
                $data['message'] = "Nincsenek még hírek!";
            } else {
                $data['result'] = "OK";
                $data['news'] = $resultArray;
            }
        } catch (Exception $e) {
            $data['result'] = "ERROR";
            $data['message'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $data;
    }
}
