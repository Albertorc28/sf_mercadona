<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="productos")
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cantidad", mappedBy="producto", orphanRemoval=true)
     */
    private $cantidades;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    public function __construct()
    {
        $this->cantidades = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

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
            $cantidade->setProducto($this);
        }

        return $this;
    }

    public function removeCantidade(Cantidad $cantidade): self
    {
        if ($this->cantidades->contains($cantidade)) {
            $this->cantidades->removeElement($cantidade);
            // set the owning side to null (unless already changed)
            if ($cantidade->getProducto() === $this) {
                $cantidade->setProducto(null);
            }
        }

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
