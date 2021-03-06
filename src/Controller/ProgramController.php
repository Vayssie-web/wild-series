<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;

    /**
    * @Route("/programs", name="program_")
    */

class ProgramController extends AbstractController
{
    /**
    * @Route("/", name="index")
    * @return Response
    */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render('program/index.html.twig', [
        'programs' => $programs,
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     * @return Response
     */
    public function show( int $id = 1): Response
    {

        return $this->render('program/show.html.twig', [
        'id' => $id,
        ]);
    }
}