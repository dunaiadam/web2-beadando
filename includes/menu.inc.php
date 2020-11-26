<?php

class Menu
{
    public static $menu = array();

    public static function setMenu()
    {
        $connection = Database::getConnection();
        $stmt = $connection->prepare("SELECT * FROM Menu WHERE permission LIKE ? ORDER BY viewOrder");
        $stmt->bind_param("s", $_SESSION['userPermission']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            self::$menu[$row['url']] = array($row['title']);
        }
    }
}
