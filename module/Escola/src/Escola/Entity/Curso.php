<?php

namespace Escola\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="Escola\Entity\CursoRepository")
 */
class Curso{

    public function __construct($options = null) {
        Configurator::configure($this, $options);
        $this->Alunos = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id_curso",type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    protected $alunos;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function __toString() {
        return $this->nome;
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function toArray() {
        return array('id' => $this->getId(), 'nome' => $this->getNome());
    }

}
