<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Scorify\Core;

use Scorify\Core\Connection as Connection;

class Model
{
    private $tabla;
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getFactory()->conectar();

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

    protected function execute($sql)
    {
        return $this->connection->query($sql);
    }

    public function getLastId()
    {
        $sql = "SELECT MAX(id) as id FROM {$this->tabla}";

        foreach ($this->execute($sql) as $row) {
            return $row['id'];
        }
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE id = $id";

        $this->execute($sql);
    }

    public function delete($campo, $valor)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE $campo = '$valor'";

        $this->execute($sql);
    }

    public function update($data)
    {
        $setStr = null;

        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $id = $value;
            } else {
                $setStr .= $key . " = '" . $value . "', ";
            }
        }

        $setStr = trim($setStr, ', ');

        $sql = "UPDATE {$this->tabla} SET $setStr WHERE id = {$id}";

        $this->execute($sql);
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

        $this->execute($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM {$this->tabla}";

        $query = $this->execute($sql);

        $resultado = [];
        while ($row = $query->fetchObject()) {
            $resultado[] = $row;
        }

        return $resultado;
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = $id";

        $query = $this->execute($sql);

        $resultado = null;
        if ($row = $query->fetchObject()) {
            $resultado = $row;
        }

        return $resultado;
    }

    public function selectBy($campo, $valor)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE $campo = '$valor'";

        $query = $this->execute($sql);

        $resultado = [];
        while ($row = $query->fetchObject()) {
            $resultado[] = $row;
        }

        return $resultado;
    }
}
