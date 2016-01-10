<?php

namespace AppDatabase;

use \PDO;

class Database
{
    private static $_connexion = null;

    private $_dbHost;
    private $_dbName;
    private $_dbUser;
    private $_dbPassword;
    private $_oPDO;


    private function __construct($dbHost, $dbName, $dbUser, $dbPassword)
    {
        $this->_dbHost     = $dbHost;
        $this->_dbName     = $dbName;
        $this->_dbUser     = $dbUser;
        $this->_dbPassword = $dbPassword;

        $this->_oPDO       = $this->_init();
    }

    private function _init()
    {
        try {
            $oPDO = new PDO(
                'mysql:host=' . $this->_dbHost . ' ;dbname=' . $this->_dbName .
                ';charset=utf8',
                $this->_dbUser,
                $this->_dbPassword
            );
        } catch (PDOException $e) {
            die('Error establishing a database connection with PDO ' .
                $e->getMessage());
        }

        $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $oPDO;
    }

    public static function getInstance()
    {
        if (is_null(self::$_connexion)) {
            $dbParam = json_decode(file_get_contents(__DIR__ . '/db_param.json'));

            $dbHost     = $dbParam->{'dbHost'};
            $dbName     = $dbParam->{'dbName'};
            $dbUser     = $dbParam->{'dbUser'};
            $dbPassword = $dbParam->{'dbPassword'};

            self::$_connexion = new Database($dbHost, $dbName, $dbUser, $dbPassword);
        }
        return self::$_connexion;
    }

    public function __toString()
    {
        return  'dbHost     : ' . $this->_dbHost . '<br>' .
                'dbName     : ' . $this->_dbName . '<br>' .
                'dbUser     : ' . $this->_dbUser . '<br>' .
                'dbPassword : ' . $this->_dbPassword;
        ;
    }

    private function __clone()
    {

    }

    public function queryLaunch($query, $args)
    {
        $nbargs = count($args);

        if (empty($requete) || !is_string($requete)
            || preg_match('##(\"|\')+##', $requete) !== 0) {
            throw new Exception('Error with the format of your SQL Query  : ' .
                '<br>' . $query);
        }

        try {
            $statement = $this->_oPDO->prepare($query);

            if ($statement !== false) {
                $statement->execute($args);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return $statement;
    }
}
