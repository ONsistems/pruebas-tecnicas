<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/todo-create", name="create_todo")
     */
    public function create(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $todo = new Todo();

        $todo->setNombre($request->request->get('nombre'));
        $todo->setFechaTope(new \DateTime($request->request->get('fecha_tope')));
        $todo->setEstado('pendiente');

        $entityManager->persist($todo);
        $entityManager->flush();

        return $this->render('create_todo.html.twig', [
            'id' => $todo->getId(),
        ]);
    }
    
    /**
     * @Route("/todo-list", name="todo_list")
     */
    public function showAll(): Response{
        $repository = $this->getDoctrine()->getRepository(Todo::class);
        $todoList = $repository->findAll();
        $todoFinished = array_filter($todoList, array($this, 'get_finished_todo'));
        //$resultado = array_diff($todoList, $todoFinished);
        $todoPending = array_udiff($todoList, $todoFinished,
          function ($obj_a, $obj_b) {
            return $obj_a->getEstado() != $obj_b->getEstado();
          }
        );

        return $this->render('list_todo.html.twig', [
            'todoFinished' => $todoFinished, 'todoPending'=>$todoPending
        ]);
    }

    /**
     * @Route("/todo-finish/{id}")
     */
    public function finish_todo_task(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $todo = $entityManager->getRepository(Todo::class)->find($id);

        if (!$todo) {
            throw $this->createNotFoundException(
                'No todo found for id '.$id
            );
        }

        $todo->setEstado('finalizado');
        $entityManager->flush();

        return $this->redirectToRoute('todo_list');
    }

    /**
     * PRIVATE FUNCTIONS
     */

    private function get_finished_todo($value){
        return $value->getEstado() == "finalizado";
    }
}
