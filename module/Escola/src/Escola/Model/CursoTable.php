<?php
namespace Escola\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class CursoTable extends AbstractTableGateway{
    protected $table = "cursos";
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype = new setArrayObjectPrototype(new Curso());
        $this->initialize();
         
    }
    
}
