<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Livro extends Form {
    protected $em;
    public function __construct($name = null, EntityManager $em) {
        parent::__construct('livro');
        $this->em = $em;
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CategoriaFilter);
        $this->add(array(
            'name' => 'id',
            'atributes' => array(
                'type' => 'hidden'
            )
        ));
        $this->add(array(
            'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'nome'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Entre com o nome'
            )
        ));
        $repository = $this->em->getRepository('Livraria\Entity\Categoria');
        $categoria = new Select();
        $categoria->setLabel($categoria)
                ->setName("categoria")
                ->setOptions(array('value_options' => $categorias)
        );
         $this->add(array(
            'name' => 'autor',
            'options' => array(
                'type' => 'text',
                'label' => 'Autor'
            ),
            'attributes' => array(
                'id' => 'autor',
                'placeholder' => 'Entre com o autor'
            )
        ));
         $this->add(array(
            'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => 'ISBN'
            ),
            'attributes' => array(
                'id' => 'isbn',
                'placeholder' => 'Entre com o ISBN'
            )
        ));
          $this->add(array(
            'name' => 'valor',
            'options' => array(
                'type' => 'text',
                'label' => 'Valor'
            ),
            'attributes' => array(
                'id' => 'valor',
                'placeholder' => 'Entre com o Valor'
            )
        ));
        $this->add($categoria);
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }

}
