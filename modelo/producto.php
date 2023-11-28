<?php
class Producto
{
    public $Id;
    public $Marca;
    public $Descripcion;
    public $Codigo;

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from producto";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'producto');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into producto (Marca,Descripcion, Codigo) values (:p1,:p2, :p3)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Marca, "p2" => $this->Descripcion, "p3" => $this->Codigo);
        $claseAReemplazar->execute($params);
    }
}
