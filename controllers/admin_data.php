<?php
require_once('../includes/config.inc.php');
include(SERVER_ROOT . 'includes/database.inc.php');

if (isset($_POST['operation']) && $_POST['operation'] == "usernames") {
    echo AdminData::getUsernames();
} else if (isset($_POST['username'])) {
    echo AdminData::getUserData($_POST['username']);
}

class AdminData
{
    public static function getUsernames()
    {
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT username FROM User");
            $stmt->execute();
            $result = $stmt->get_result();

            $resultArray = array();
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = $row["username"];
            }
            $returnData['return'] = $resultArray;
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (Exception $e) {
            $returnData['return'] = $e;
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public static function getUserData($username)
    {
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT id, firstName FROM User WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $returnData['return'] = $result->fetch_assoc();
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (Exception $e) {
            $returnData['return'] = $e;
            return json_encode($returnData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
