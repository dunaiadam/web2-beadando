<?php

include('../includes/database.inc.php');

class NewsItem
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $message;
    /**
     * @var string
     */
    public $firstName;
    /**
     * @var string
     */
    public $date;
}

class News
{
    /**
     * @var integer
     */
    public $errorCode;

    /**
     * @var string
     */
    public $message;

    /**
     * @var NewsItem[]
     */
    public $news;
}

class NewsClass
{
    /**
     * @return News
     */
    public function getNews()
    {
        $response = array(
            'errorCode' => 0,
            'message' => "",
            'news' => array()
        );

        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT n.title, n.message, u.firstName, n.date FROM News n INNER JOIN User u ON n.authorUserId = u.id ORDER BY n.date DESC");
            $stmt->execute();
            $result = $stmt->get_result();

            $response["news"] = $result->fetch_all(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $response["errorCode"] = 1;
            $response["message"] = $e->getMessage();
        }

        return $response;
    }
}
