<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $contrasena;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Direccion", mappedBy="cliente")
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="cliente")
     */
    private $pedido;

    public function __construct()
    {
        $this->direccion = new ArrayCollection();
        $this->pedido = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): self
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * @return Collection|Direccion[]
     */
    public function getDireccion(): Collection
    {
        return $this->direccion;
    }

    public function addDireccion(Direccion $direccion): self
    {
        if (!$this->direccion->contains($direccion)) {
            $this->direccion[] = $direccion;
            $direccion->setCliente($this);
        }

        return $this;
    }

    public function removeDireccion(Direccion $direccion): self
    {
        if ($this->direccion->contains($direccion)) {
            $this->direccion->removeElement($direccion);
            // set the owning side to null (unless already changed)
            if ($direccion->getCliente() === $this) {
                $direccion->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getPedido(): Collection
    {
        return $this->pedido;
    }

    public function addPedido(Pedido $pedido): self
    {
        if (!$this->pedido->contains($pedido)) {
            $this->pedido[] = $pedido;
            $pedido->setCliente($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedido->contains($pedido)) {
            $this->pedido->removeElement($pedido);
            // set the owning side to null (unless already changed)
            if ($pedido->getCliente() === $this) {
                $pedido->setCliente(null);
            }
        }

        return $this;
    }
}
