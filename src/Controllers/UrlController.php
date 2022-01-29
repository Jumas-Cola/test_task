<?php

namespace JumasCola\TestTask\Controllers;

use JumasCola\TestTask\Database\Database;

class UrlController {

    /*
    * Метод для редиректа с короткой ссылки на основную
    */
    public function show()
    {
        $path = trim($_SERVER['REQUEST_URI'], '/');

        $conn = Database::getConnection();

        $sth = $conn->prepare('SELECT * FROM urls WHERE id = :id');
        $sth->execute(['id' => hexdec($path)]);
        $result = $sth->fetchObject();

        if ( empty($result) ) {
            http_response_code(404);

            include(dirname(__FILE__, 2).'/../views/404.php');

            return; 
        }

        header('Content-Type: application/json');

        header('Location: '.$result->url);

        return; 
    }

    /* 
    * Метод для создания короткой ссылки
    */
    public function store()
    {
        $body = json_decode(file_get_contents('php://input'));
        $url = $body->url;

        $reg_exUrl = "/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

        if ( !isset($url) or empty($url) or preg_match($reg_exUrl, $url) == false ) {
            http_response_code(422);

            header('Content-Type: application/json');

            return json_encode([
                'status' => 'error',
                'message' => 'Некорректный URL'
            ]);
        }

        $conn = Database::getConnection();

        $sth = $conn->prepare('INSERT INTO urls (url) VALUE (:url)');
        $sth->execute(['url' => $url]);
        $id = $conn->lastInsertId();

        return json_encode([
            'url' => getenv('APP_URL') . '/' . dechex($id)
        ]);
    }
}
