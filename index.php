<?php
require 'db.php';
require 'actions.php';
?>


<!DOCTYPE html>
<html>

<head>
  <title>TO-DO App</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Bienvenido, <?php echo "USUARIO_NAME" ?></h1>

    <form action="" method="POST">
      <input type="text" name="task" placeholder="Nueva tarea" required>
      <button type="submit">Agregar tarea</button>
    </form>

    <?php
    if (isset($_POST['task'])) {
      createTask($_POST['task']);
    }

    if (isset($_POST['task_id']) && isset($_POST['state'])) {
      updateTask($_POST['task_id'], $_POST['state']);
    }

    if (isset($_POST['CLEAR_ALL'])) {
      deleteTasks();
    }
    ?>



    <h2>Tus tareas:</h2>

    <ul class="status_colors">
      <li><span>TERMINADA: <span style="color:#2ecc71;">*</span> </span></li>
      <li><span>PENDIENTE: <span style="color:#eb4d4b;">*</span> </span></li>
    </ul>

    <ul>
      <?php


      $sql = "SELECT * FROM todos";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $task_id = $row['id'];
          $task = $row['task'];
          $completed = $row['state'];
      ?>

          <li>
            <form action="" method="POST" class="<?= $completed == "COMPLETED" ? 'completed' : '' ?> ">


              <span class='task'> <?php echo $task ?> </span>

              <select name="state" id="" default="">
                <option value="PENDING" <?= $completed == "PENDING" ? 'selected' : '' ?>>PENDIENTE</option>
                <option value="COMPLETED" <?= $completed == "COMPLETED" ? 'selected' : '' ?>>COMPLETADA</option>
              </select>

              <input type="hidden" name="task_id" value="<?= $task_id ?>">


              <button type="submit">Actualizar</button>
            </form>
          </li>

      <?php
        }
      } else {
        echo "<li>No hay tareas.</li>";
      }
      ?>
    </ul>

    <form action="" method="POST">

      <input type="hidden" name="CLEAR_ALL" value="true">
      <button type="submit">BORRAR TODOS</button>

    </form>
    <!-- <a href="logout.php">Cerrar sesión</a> -->

  </div>

  <!-- <script src="script.js"></script> -->
</body>

</html>