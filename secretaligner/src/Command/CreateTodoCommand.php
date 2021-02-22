<?php
namespace App\Command;

use App\Service\TodoService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateTodoCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-todo';

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Crear un nuevo elemento Todo')
            ->setHelp('Este comando te permite crear un nuevo elemento Todo')
            ->addArgument('nombre', InputArgument::REQUIRED, 'Nombre de la tareas [string]')
            ->addArgument('fecha_tope', InputArgument::REQUIRED, 'Fecha tope de la tareas [datetime (Y-m-d H:i:s)]')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'ToDo Creator',
            '============',
            '',
        ]);

        $this->todoService->createTodo(['nombre'=>$input->getArgument('nombre'),'fecha_tope'=>$input->getArgument('fecha_tope')]);
        $output->writeln('Has creado correctamente la tarea:: '.$input->getArgument('nombre'));
    }
}