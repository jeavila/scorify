<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Scorify\Core;

use Scorify\Config\Database as Database;
use PDO;

class Conexion 
{
    private static $factory;
    private $db;

    public static function getFactory() 
    {      
        if (!self::$factory) {
            self::$factory = new Conexion();
        }

        return self::$factory;
    }

    public function conectar() 
    {
        if (!$this->db) {
            $dbConfig = new Database();
            $dsn = $dbConfig::DMBS . ':dbname=' . $dbConfig::DATABASE
                    . ';host=' . $dbConfig::HOST;
            
            try {
                $this->db = new \PDO($dsn, $dbConfig::USER, $dbConfig::PASS);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }  
        }
    }
}