<?php

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livros")
 * @ORM\Entity(repositoryclass="Livraria\Entity\LivroRepository")
 */
class Livro {

    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int 
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    /**
     * @ORM\ManytoOne(targetEntity="Livraria\Entity\Categoria",inversedBy="livro")
     * @ORM\Joincolumn(name="categoria_id",referencedColumnName="id") 
     */
    protected $categoria;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $autor;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $isbn;

    /**
     * @ORM\Column(type="float")
     * @var string
     */
    protected $valor;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function toArray() {
        return Array(
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'categoria' => $this->getCategoria(),
            'autor' => $this->getAutor(),
            'isbn' => $this->getIsbn(),
            'valor' => $this->getValor(),
        );
    }

}
