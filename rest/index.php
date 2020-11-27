<?php

include('../includes/database.inc.php');

if (isset($_GET['id'])) {
    printf(Rest::getNews($_GET['id']));
} else {
    printf(Rest::getAllNews());
}

class Rest
{
    public static function getAllNews()
    {
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT n.title, n.message, u.firstName, n.date FROM News n INNER JOIN User u ON n.authorUserId = u.id ORDER BY n.date DESC");
            $stmt->execute();
            $result = $stmt->get_result();

            $resultArray = [];
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = str_replace(array("\r\n", "\n", "\r"), '', $row);;
            }

            if (count($resultArray) == 0) {
                $returnData['return'] = "Nincsenek még hírek";
                return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } else {
                return json_encode($resultArray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        } catch (Exception $e) {
            $returnData['return'] = $e;
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public static function getNews($id)
    {
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT n.title, n.message, u.firstName, n.date FROM News n INNER JOIN User u ON n.authorUserId = u.id WHERE n.id = ? ORDER BY n.date DESC");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            $resultArray = [];
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = str_replace(array("\r\n", "\n", "\r"), '', $row);;
            }

            if (count($resultArray) == 0) {
                $returnData['return'] = "Nincsen hír a megadott azonosítóval";
                return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } else {
                return json_encode($resultArray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        } catch (Exception $e) {
            $returnData['return'] = $e;
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
