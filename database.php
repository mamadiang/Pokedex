<?php

class Database {

    private static $dbHost = "localhost";
    private static $dbName = "pokedex";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    private static $connection = null;
    
    public static function connect() {
        if(self::$connection == null) {
            try {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function RecherchePokemon(){

        $db = Database::connect();
        $statement = $db->query("SELECT * FROM pokemon");

        return $statement;

    }


    public static function RechercheItemByCategory($id){

        $db = Database::connect();
        $toto = $db->prepare("SELECT* FROM items WHERE  = ?");
        $toto->execute(array($id));

        return $toto;

    }


    public static function disconnect() {
        self::$connection = null;
    }
}
?>