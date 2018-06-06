<?php
namespace App\Controller;

use App\Entity\Producto;
use App\Form\ProductoType;
use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
* @Route("/tienda")
*/
class TiendaController extends Controller
{
   /**
    * @Route("", name="tienda_home")
    */
   public function index()
   {
       $repo = $this->getDoctrine()->getRepository(Producto::class);
       $productos = $repo->findBy(array(), array('id' => 'DESC'),10);        
       return $this->render('tienda/index.html.twig', [
           'productos' => $productos
       ]);
   }
}
