<?php

namespace App\Controller;

use App\Entity\Cantidad;
use App\Form\CantidadType;
use App\Repository\CantidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cantidad")
 */
class CantidadController extends Controller
{
    /**
     * @Route("/", name="cantidad_index", methods="GET")
     */
    public function index(CantidadRepository $cantidadRepository): Response
    {
        return $this->render('cantidad/index.html.twig', ['cantidads' => $cantidadRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cantidad_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $cantidad = new Cantidad();
        $form = $this->createForm(CantidadType::class, $cantidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cantidad);
            $em->flush();

            return $this->redirectToRoute('cantidad_index');
        }

        return $this->render('cantidad/new.html.twig', [
            'cantidad' => $cantidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cantidad_show", methods="GET")
     */
    public function show(Cantidad $cantidad): Response
    {
        return $this->render('cantidad/show.html.twig', ['cantidad' => $cantidad]);
    }

    /**
     * @Route("/{id}/edit", name="cantidad_edit", methods="GET|POST")
     */
    public function edit(Request $request, Cantidad $cantidad): Response
    {
        $form = $this->createForm(CantidadType::class, $cantidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cantidad_edit', ['id' => $cantidad->getId()]);
        }

        return $this->render('cantidad/edit.html.twig', [
            'cantidad' => $cantidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cantidad_delete", methods="DELETE")
     */
    public function delete(Request $request, Cantidad $cantidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cantidad->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cantidad);
            $em->flush();
        }

        return $this->redirectToRoute('cantidad_index');
    }
}
