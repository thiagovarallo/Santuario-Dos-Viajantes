<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formulario.css">
    <script src="../js/navbar.js" defer></script>
</head>

<body>

    <?php include_once '../components/navbar.html' ?>

    <main>

        <div class="title_form">
            <h2>Cadastrar nova hospedagem</h2>
        </div>


        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="id_user" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>

            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Numero do quarto</label>
                <input type="text" class="form-control" id="num_quarto" value="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>

            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Data de saida</label>
                <div class="input-group has-validation">
                   
                    <input type="text" class="form-control" id="data_saida"
                        aria-describedby="inputGroupPrepend" required>
                    
                   

                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Data de entrada</label>
                <input type="text" class="form-control" id="data_entrada" required>
               

           

            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>


    </main>

    <?php include_once '../components/footer.html' ?>


</body>

</html>