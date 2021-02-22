<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends Controller
{
    /**
     * @Route("/todo", name="todo")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TodoController.php',
        ]);
    }

    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }

    /**
     * @Route("/todoExample", name="create_example_todo")
     */
    public function createTodo(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $todo = new Todo();

        $todo->setNombre('Tareas Ejemplo');
        $todo->setFechaTope(new \DateTime("2021-02-28"));
        $todo->setEstado('pendiente');

        $entityManager->persist($todo);
        $entityManager->flush();

        return $this->render('create_todo.html.twig', [
            'id' => $todo->getId(),
        ]);
    }

    /**
     * @Route("/todo-list")
     */
    public function showAll(): Response{
        $repository = $this->getDoctrine()->getRepository(Todo::class);
        $todoList = $repository->findAll();
        return $this->render('list_todo.html.twig', [
            'todoList' => $todoList,
        ]);
    }
}
