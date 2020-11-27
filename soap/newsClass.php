<?php

include('../includes/database.inc.php');



class News {

    public function getNews() {
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
                return $returnData;
            } else {
                return $resultArray;
            }
        } catch (Exception $e) {
            $returnData['return'] = $e;
            return $returnData;
        }
    }
}
