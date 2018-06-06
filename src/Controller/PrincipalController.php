<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* @Route("/principal")
*/
class PrincipalController extends Controller
{
   /**
    * @Route("", name="principal_home")
    */
   public function index()
   {        return $this->render('principal/index.html.twig', [
           'controller_name' => 'PrincipalController',
       ]);
   }     /**
    * @Route("/recibeform", name="formulariocp")
    */
   public function recibeformulario(Request $request)    {
       $codigopostal = intval($request->request->get("inputcp"));        
       if($codigopostal > 46000 && $codigopostal < 47000){
           return $this->redirectToRoute("tienda_home");
        }        else {
            return $this->redirectToRoute("principal_home");
        }
   }}