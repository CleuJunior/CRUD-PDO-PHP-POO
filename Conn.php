<?php


class Conn
{
    public static $host = '127.0.0.1';
    public static $user = 'root';
    public static $pass = '';
    public static $dbname = 'phppdo';
    private static $connect = null;

    private static function Conectar()
    {
        try {
            if (self::$connect == null):
                self::$connect = new PDO('mysql:host=' . self::$host . '; dbname=' . self::$dbname, self::$user, self::$pass);

            endif;

        } catch (Exception $ex) {
            echo 'ERRO: ' . $ex->getMessage();
            die();
        }

        return self::$connect;
    }

    public function getConn()
    {
        return self::Conectar();
    }
}