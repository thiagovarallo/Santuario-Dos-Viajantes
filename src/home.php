<?php
include_once "./connection.php";

session_start();

$query = $pdo->query("SELECT * FROM type_room;")->fetchAll(PDO::FETCH_ASSOC);

var_dump($_SESSION);

if (empty($_SESSION)) {
    header("Location: src/login.php");
} else {
    if ($_SESSION["First_login"] == false) {
        header("Location: src/formulario/insertDataUser.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="../img/Group-2.svg">
    <link rel="stylesheet" href="./src/css/index.css">
    <link rel="stylesheet" href="./src/css/navbar.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include_once 'src/components/navbar.html' ?>
    <?php include_once 'src/components/carrossel.html' ?>

    <section class="container_room">
        <div class="column_title">
            <h2>Nossos quartos</h2>
            <p>Descubra o conforto e a elegância dos nossos quartos cuidadosamente projetados para tornar a sua estadia inesquecível.</p>
        </div>

        <section class="column_bedrooms">

            <?php foreach ($query as $room) : ?>
                <div class="card_bedroom">
                    <div class="bedroom_img">
                        <img src="data:image/jpg;base64, <?= base64_encode($room['image']) ?>" alt="">
                    </div>
                    <div class="info_room">
                        <div class="name_room">
                            <h2> <?= $room["name_room"] ?> </h2>
                            <p><?= $room["number_beds"] ?> cama, <?= $room["number_beds"] ?> adultos</p>
                        </div>

                        <div class="price_room">
                            <h3>R$<span> <?= $room["price"] ?></span></h3>

                            <a href="src/room.php?id=<?= $room["id"] ?>">
                                <button class="action_room">Saber mais</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </section>



    </section>

    <section class="container_service">
        <div class="column_service_title">
            <h2>Nosso serviço especial</h2>
            <p>No Santuario dos Viajantes, nos esforçamos para proporcionar a você uma experiência única e inesquecível. Nossos serviços especiais incluem:</p>
        </div>

        <div class="column_service">
            <section class="box_service">
                <div class="column_service_two">
                    <div class="service">
                        <div class="service_svg">
                            <img src="../img/icons/wifi.svg" alt="simbulo de wifi" width="100%" height="100%">
                        </div>

                        <h6>Wifi Grátis</h6>
                    </div>
                    <div class="service">
                        <div class="service_svg">
                            <img src="../img/icons/key.svg" alt="simbulo de chave" width="100%" height="100%">
                        </div>

                        <h6>Serviço de quarto</h6>
                    </div>
                </div>

                <div class="column_service_two">
                    <div class="service">
                        <div class="service_svg">
                            <img src="../img/icons/parking.svg" alt="simbulo de wifi" width="100%" height="100%">
                        </div>

                        <h6>parking Grátis</h6>
                    </div>
                    <div class="service">
                        <div class="service_svg">
                            <img src="../img/icons/support.svg" alt="simbulo de chave" width="100%" height="100%">
                        </div>

                        <h6>Suporte 24/7</h6>
                    </div>
                </div>
            </section>

            <section class="box_service" id="box_service_img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHRQxmO_-_iJdygfblxBcIBya67yNQT-l_YA&usqp=CAU" alt="" width="100%" height="100%">
            </section>
        </div>
    </section>

    <?php include_once './src/components/footer.html' ?>

</body>

</html>