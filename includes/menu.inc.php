<?php

class Menu
{
    public static $menu = array();

    public static function setMenu()
    {
        $connection = Database::getConnection();
        $stmt = $connection->prepare("SELECT * FROM Menu WHERE permission LIKE ? AND parent IS NULL ORDER BY viewOrder");
        $stmt->bind_param("s", $_SESSION['userPermission']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            self::$menu[$row['url']] = array($row['id'], $row['title']);
        }
    }

    public static function getSubMenu($parentId)
    {
        $connection = Database::getConnection();
        $stmt = $connection->prepare("SELECT * FROM Menu WHERE permission LIKE ? AND parent = ? ORDER BY viewOrder");
        $stmt->bind_param("si", $_SESSION['userPermission'], $parentId);
        $stmt->execute();
        $result = $stmt->get_result();

        $subMenu = array();
        while ($row = $result->fetch_assoc()) {
            $subMenu[$row['url']] = array($row['title']);
        }
        return $subMenu;
    }
}
