<?php
namespace EscolaAdmin\Form;
use Zend\Form\Form;
class Curso extends Form{
    public function __construct($name = null) {
        parent::__construct('cursso');
        
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CursoFilter);
        $this->add(array(
            'name'=>'id',
            'atributes'=>array(
                'type'=>'hidden'
            )
        ));
        $this->add(array(
           'name'=>'nome',
            'options'=>array(
                'type'=>'text',
                'label'=>'nome'
            ),
            'attributes'=>array(
                'id'=>'nome',
                'placeholder'=>'Entre com o nome'
            )
        ));
        $this->add(array(
           'name'=>'submit',
                'type'=>'Zend\Form\Element\Submit',
            'attributes'=>array(
                'value'=>'Salvar',
                'class'=>'btn-success'
        )
            ));
    }
}