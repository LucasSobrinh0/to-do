<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>To-Do</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1 class="mb-4">Lista de Tarefas</h1>

  <!-- Formulário para criar nova tarefa -->
  <form method="POST" action="/?action=store" class="mb-4 d-flex">
    <input type="text" name="title" class="form-control me-2" placeholder="Nova tarefa..." required>
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>

  <!-- Tabela de tarefas -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tarefa</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $t): ?>
        <tr>
          <td><?= $t['id'] ?></td>
          <td><?= htmlspecialchars($t['title']) ?></td>
          <td><?= $t['done'] ? '✔️ Concluída' : '⏳ Pendente' ?></td>
          <td>
            <!-- Alternar status -->
            <a href="/?action=toggle&id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">Alternar</a>

            <!-- Excluir tarefa -->
            <a href="/?action=destroy&id=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
