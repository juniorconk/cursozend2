<?php
namespace Livraria\Model;
class Categoria{
    public $id;
    public $nome;
    public function exchangeArray($data) {
        
        $this->nome = (isset($data['nome'])) ? $data['nome'] :null;
        
    }
}$this->id = (isset($data['id'])) ? $data['id'] :null;