<?php
namespace App\Controllers;           // 1️⃣ namespace vem primeiro

use App\Models\Task;

class TasksController
{
    private Task $task;

    public function __construct($pdo)
    {
        $this->task = new Task($pdo);
    }

    /** Lista todas as tarefas */
    public function index()
    {
        $tasks = $this->task->all();

        // caminho absoluto até a view
        $view = dirname(__DIR__, 1) . '/Views/tasks/index.php';
        if (!file_exists($view)) {
            throw new \RuntimeException("View não encontrada: $view");
        }
        require $view;
    }

    /** Cria nova tarefa */
    public function store()
    {
        if (!empty($_POST['title'])) {
            $this->task->create($_POST['title']);
        }
        header('Location: /');
        exit;
    }

    /** Alterna status da tarefa */
    public function toggle($id)
    {
        $this->task->toggle($id);
        header('Location: /');
        exit;
    }

    /** Exclui tarefa */
    public function destroy($id)
    {
        $this->task->delete($id);
        header('Location: /');
        exit;
    }
}
