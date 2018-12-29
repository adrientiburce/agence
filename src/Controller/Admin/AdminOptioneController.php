<?php

namespace App\Controller\Admin;

use App\Entity\Optione;
use App\Form\OptioneType;
use App\Repository\OptioneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/option")
 */
class AdminOptioneController extends AbstractController
{
    /**
     * @Route("/", name="admin.optione.index", methods="GET")
     */
    public function index(OptioneRepository $optioneRepository): Response
    {
        return $this->render('admin/option/index.html.twig', ['optiones' => $optioneRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin.optione.new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $optione = new Optione();
        $form = $this->createForm(OptioneType::class, $optione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($optione);
            $em->flush();

            return $this->redirectToRoute('admin.optione.index');
        }

        return $this->render('admin/option/new.html.twig', [
            'optione' => $optione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin.optione.edit", methods="GET|POST")
     */
    public function edit(Request $request, Optione $optione): Response
    {
        $form = $this->createForm(OptioneType::class, $optione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.optione.index', ['id' => $optione->getId()]);
        }

        return $this->render('admin/option/edit.html.twig', [
            'optione' => $optione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.optione.delete", methods="DELETE")
     */
    public function delete(Request $request, Optione $optione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optione->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($optione);
            $em->flush();
        }

        return $this->redirectToRoute('admin.optione.index');
    }
}
