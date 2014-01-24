<?php
namespace Livraria\Model;
class CategoriaService{
    
    /**
     *
     * @var Livraria\Model\CategoriaTable
     */
    protected $categoriaTable;
    public function __construct(CategoriaTable $table) {
        $this->categoriaTable = $table;
        
    }
    public function fetchAll(){
        $resultset = $this->categoriaTable->select();
        return $resultset;
    }
}
