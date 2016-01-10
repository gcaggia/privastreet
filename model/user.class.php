<?php

namespace appClass;

use \AppDatabase\Database;

class User
{

    //Attributes

    private $_id_user;
    private $_first_name;
    private $_last_name;
    private $_mail;
    private $_pseudo;
    private $_password;
    private $_country;
    private $_is_admin;
    private $_active;
    private $_reset_token;
    private $_last_connexion;
    private $_last_activity;
    private $_date_creation;
    private $_update_ts;
    private $_ipadress;



    /**
     * Magic method of PHP ; is run when writing data to inaccessible properties.
     * @param string $Attribut the name of the attribute to access
     * @return variant the value of the attribute
     */
    public function __get($Attribut)
    {
        return $this->$Attribut;
    }


    /**
     * Magic method of PHP ; is utilized for reading data from inaccessible properties.
     * @param string $Attribut the name of the attribute to change
     * @param string $valeur new value of the attribute
     */
    public function __set($Attribut, $valeur)
    {
        $this->$Attribut = $valeur;
    }


    public function login($username, $password)
    {
        $db = Database::getInstance();

        $strSQL = "SELECT *           " .
                  "FROM t_USER        " .
                  "WHERE MAIL     = ? " .
                  "  AND PASSWORD = ? ";

        if ($result = $db->queryLaunch($strSQL, array($username, $password))->fetch()) {
            echo 'yes';
        } else {
            echo 'unable to loggin';
        }

    }

    public function updateUser()
    {
        
    }


    public function forgetPassword()
    {

    }

    public function logout()
    {
        session_destroy();
    }
}
