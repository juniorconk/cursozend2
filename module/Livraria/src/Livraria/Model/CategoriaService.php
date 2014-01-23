<?php
namespace Livraria\Model;
class CategoriaService{
    
    protected $categoriaTable;
    public function __construct(CategoriaTable $table) {
        $this->categoriaTable = $table;
        
    }
    public function fetchAll(){
        $resultset = $this->categoriaTable->select();
        return $resultset;
    }
}
$adapter = new \Zend\Db\Adapter\Adapter();
$categoriaService = new CategoriaService($categoriaTable);
$categoriaTable = new CategoriaTable($adapter);