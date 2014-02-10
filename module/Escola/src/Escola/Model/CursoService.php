<?php
namespace Escola\Model;
class CursoService{
    
    /**
     *
     * @var Escola\Model\CursoTable
     */
    protected $cursoTable;
    public function __construct(CursoTable $table) {
        $this->cursoTable = $table;
        
    }
    public function fetchAll(){
        $resultset = $this->cursoTable->select();
        return $resultset;
    }
}
