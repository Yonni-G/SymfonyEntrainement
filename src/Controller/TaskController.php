<?php

// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskTypeForm;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\Clock\now;

class TaskController extends AbstractController
{

    #[Route('/task/new', name: 'task_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $task = new Task();

        $form = $this->createForm(TaskTypeForm::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // On ajoute la date de creation
            $task->setCreatedAt(new \DateTimeImmutable());
            $em->persist($task);
            $em->flush();


            $this->addFlash('success', 'Tâche créée avec succès !');

            return $this->redirectToRoute('task_new');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/tasks', name: 'task_list')]
    public function list(Request $request, TaskRepository $taskRepository, EntityManagerInterface $em): Response
    {
        $tasks = $taskRepository->findAll();

        return $this->render('task/list.html.twig', [
            'tasks' => $tasks
        ]);
    }
}
