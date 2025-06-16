<?php
namespace App\Models;
USE PDO;
class Task {
    private $pdo; // Armazena o objeto de conexão PDO

    public function __construct($pdo)
    {
        $this->pdo = $pdo; // Recebe a conexão e guarda na variável interna
    }

    // Retorna todas as tarefas do banco de dados
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY id DESC");

        // ERRO: 'fatchAll' -> CORRETO: 'fetchAll'
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas as tarefas como array associativo
    }

    // Cria uma nova tarefa com o título informado
    public function create($title)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES(?)"); // Prepara a query para segurança
        return $stmt->execute([$title]); // Executa a query passando o título
    }

    // Inverte o status da tarefa (done = 1 vira 0 e vice-versa)
    public function toggle($id){
        $stmt = $this->pdo->prepare("UPDATE tasks SET done = NOT done WHERE id = ?");
        return $stmt->execute([$id]); // Atualiza o status da tarefa com base no ID
    }

    // Remove a tarefa do banco
    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]); // Exclui a tarefa com base no ID
    }
}
