<?php
  include_once "../../connection.php";
  $queryGetRoom = $pdo->query("SELECT id, name_room from type_room;")->fetchAll(PDO::FETCH_ASSOC);

  var_dump($queryGetRoom);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO accommodation (id_user,type_room, date_reservation_entry, date_reservation_out, status) VALUES (1 ,:type_room, :date_reservation_entry, :date_reservation_out, 1)";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(":type_room", intval($_POST["type_room"]));
    $statement->bindValue(":date_reservation_entry", $_POST["date_reservation_entry"]);
    $statement->bindValue(":date_reservation_out", $_POST["date_reservation_out"]);
    
    $statement->execute();
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar hospede</title>
  <link rel="stylesheet" href="../css/navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/formulario.css">
  <link rel="stylesheet" href="../css/footer.css">
  <script src="../js/navbar.js" defer></script>
</head>

<body>
  <?php include_once '../components/navbar.html' ?>

  <main>
    <div class="title_form">
      <h2>Cadastrar nova reserva</h2>
    </div>

    <form class="row g-3 needs-validation" action="./reserva.php" method="post">
      <div class="col-md-6">
        <label for="id_user" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="id_user" name="id_user" required>
      </div>
      <div class="col-md-6">
        <label for="num_room" class="form-label">Numero do quarto</label>
        <select class="form-select" aria-label="Default select example">
          <?php foreach ( $queryGetRoom as $room ) : ?>
            <option value="<?= $room["id"] ?>"> <?= $room["name_room"] ?> </option>
          <?php endforeach ?>
          </select>
      </div>
      <div class="col-md-6">
        <label for="date_reservation_entry" class="form-label">Data</label>
        <input type="date" class="form-control" id="date_reservation_entry" name="date_reservation_entry" na aria-describedby="inputGroupPrepend" required>
      </div>
      <div class="col-md-6">
        <label for="date_reservation_out" class="form-label">data de saida</label>
        <input type="date" class="form-control" id="date_reservation_out" name="date_reservation_out" required>
      </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Cadastrar</button>
        <button class="btn btn-danger" type="reset">Apagar tudo</button>
      </div>
    </form>
  </main>

  <?php include_once '../components/footer.html' ?>

</body>
</html>