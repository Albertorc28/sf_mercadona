<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaentrega;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechacompra;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="pedido")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cantidad", mappedBy="pedido", orphanRemoval=true)
     */
    private $cantidades;

    public function __construct()
    {
        $this->cantidades = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFechaentrega(): ?\DateTimeInterface
    {
        return $this->fechaentrega;
    }

    public function setFechaentrega(\DateTimeInterface $fechaentrega): self
    {
        $this->fechaentrega = $fechaentrega;

        return $this;
    }

    public function getFechacompra(): ?\DateTimeInterface
    {
        return $this->fechacompra;
    }

    public function setFechacompra(\DateTimeInterface $fechacompra): self
    {
        $this->fechacompra = $fechacompra;

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

    /**
     * @return Collection|Cantidad[]
     */
    public function getCantidades(): Collection
    {
        return $this->cantidades;
    }

    public function addCantidade(Cantidad $cantidade): self
    {
        if (!$this->cantidades->contains($cantidade)) {
            $this->cantidades[] = $cantidade;
            $cantidade->setPedido($this);
        }

        return $this;
    }

    public function removeCantidade(Cantidad $cantidade): self
    {
        if ($this->cantidades->contains($cantidade)) {
            $this->cantidades->removeElement($cantidade);
            // set the owning side to null (unless already changed)
            if ($cantidade->getPedido() === $this) {
                $cantidade->setPedido(null);
            }
        }

        return $this;
    }
}
