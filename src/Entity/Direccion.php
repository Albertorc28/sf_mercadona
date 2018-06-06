<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DireccionRepository")
 */
class Direccion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $extra;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $indicacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="direccion")
     */
    private $cliente;

    public function getId()
    {
        return $this->id;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getExtra(): ?string
    {
        return $this->extra;
    }

    public function setExtra(?string $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

    public function getIndicacion(): ?string
    {
        return $this->indicacion;
    }

    public function setIndicacion(?string $indicacion): self
    {
        $this->indicacion = $indicacion;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }
}
