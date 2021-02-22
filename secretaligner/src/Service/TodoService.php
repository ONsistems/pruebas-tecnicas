<?php

namespace App\Service;

use App\Entity\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TodoService extends Controller
{

	public function __construct(EntityManagerInterface $em ) 
    {
        $this->em = $em;
    }

	public function createTodo($input)
    {	
        $todo = new Todo();
        $todo->setNombre($input['nombre']);
        $todo->setFechaTope(new \DateTime($input['fecha_tope']));
        $todo->setEstado('pendiente');

        $this->em->persist($todo);
        $this->em->flush();
    }
}