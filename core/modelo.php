<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Scorify\Core;

use Scorify\Core\Conexion as Conexion;

class Modelo
{
    private $tabla;
    private $conexion;

    public function __construct() 
    {
        $this->conexion = Conexion::getFactory()->conectar();
        
        $argumentos = func_get_args();
        $numArgumentos = func_num_args();
     
        if ($numArgumentos == 0) {
            $this->tabla = __CLASS__;
        } else if ($numArgumentos == 1) {
            $this->tabla = $argumentos[0];
        }
    }
    
    public function __get($name) 
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
    
    protected function ejecutar($sql) 
    {
        return $this->conexion->query($sql);
    }

    public function getUltimoID() 
    {
        $sql = "SELECT MAX(id) as id FROM {$this->tabla}";

        foreach ($this->ejecutar($sql) as $row) {
            return $row['id'];
        }
    }
    
    public function deleteById($id) 
    {
        $sql = "DELETE FROM {$this->tabla} WHERE id = $id";
        
        $this->ejecutar($sql);
    }

    public function delete($campo, $valor) 
    {
        $sql = "DELETE FROM {$this->tabla} WHERE $campo = '$valor'";

        $this->ejecutar($sql);
    }
    
    public function update($id, $set) 
    {   
        $setStr = null;

        foreach ($set as $key => $value) {
            if (isset($setStr)) {
                $setStr .= $key . '=' . $value;
            } else {
                $setStr .= ',' . $key . '=' . $value;
            }
        }
     
        $sql = "UPDATE {$this->tabla} SET $setStr WHERE id = {$id}";
        
        $this->ejecutar($sql);
    }
    
    public function insert() 
    {        
        $datos = get_class_vars($this->tabla);
        $campos = array_keys($datos);
        $valores = array_values($datos);
        $campoStr = implode(', ', $campos);        
        $valorStr = null;
        
        foreach ($campos as $campo) {
            echo $campo . ' ';

            if (empty($valorStr)) {
                $valorStr .= $this->$campo; 
            } else {
                $valorStr .= ',' . $this->$campo;
            }
        }
        
        $sql = 
            "INSERT INTO {$this->tabla} ({$campoStr}) VALUES ({$valorStr});";
        
        $this->ejecutar($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM {$this->tabla}";

        $query = $this->ejecutar($sql);

        $resultado = [];
        while ($row = $query->fetchObject()) {
            $resultado[] = $row;
        }

        return $resultado;
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = $id";

        $query = $this->ejecutar($sql);

        $resultado = null;
        if ($row = $query->fetchObject()) {
            $resultado = $row;
        }

        return $resultado;
    }

    public function selectBy($campo, $valor)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE $campo = '$valor'";

        $query = $this->ejecutar($sql);

        $resultado = [];
        while ($row = $query->fetchObject()) {
            $resultado[] = $row;
        }

        return $resultado;
    }
}