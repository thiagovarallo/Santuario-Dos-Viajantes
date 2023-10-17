<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="../img/Group-2.svg">
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="stylesheet" href="../src/css/navbar.css">
    <link rel="stylesheet" href="../src/css/footer.css">
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
            <div class="card_bedroom">
                <div class="bedroom_img">
                    <img src="https://s2.glbimg.com/NO1Mrkp3Z96htIx8_RhrdHTux0w=/e.glbimg.com/og/ed/f/original/2018/03/08/decoracao-de-quarto-cabeceira-suede-rosa-roupa-de-cama-branco-com-rosa-papel-de-parede-florido-romantico-abajur-e-pendente-brancoarquiteta-leticia-arcangeli.jpg" alt="" width="100%" height="100%">
                </div>

                <div class="info_room">
                    <div class="name_room">
                        <h2>Super room</h2>
                        <p>1 cama, 2 pessoas</p>
                    </div>

                    <div class="price_room">
                        <h3>R$<span>100</span>,00</h3>

                        <a href="">
                            <button class="action_room">Saber mais</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card_bedroom">
                <div class="bedroom_img">
                    <img src="https://casa.abril.com.br/wp-content/uploads/2021/12/Os-principais-8-erros-na-hora-de-compor-a-decorac%CC%A7a%CC%83o-dos-quartos-01-.jpeg?quality=95&strip=info&w=1024" alt="" width="100%" height="100%" >
                </div>


                <div class="info_room">
                    <div class="name_room">
                        <h2>Super room</h2>
                        <p>1 cama, 2 pessoas</p>
                    </div>

                    <div class="price_room">
                        <h3>R$<span>100</span>,00</h3>

                        <a href="">
                            <button class="action_room">Saber mais</button>
                        </a>
                    </div>
                </div>

            </div>
        </section>



    </section>

    <section class="container_service">
        <div class="column_service_title">
            <h2>Nosso serviço especial</h2>
            <p>No Santuario dos Viajantes, nos esforçamos para proporcionar a você uma experiência única e inesquecível. Nossos serviços especiais incluem:</p>
        </div>

        <div class="column_service">
            <section class="box_service" >
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