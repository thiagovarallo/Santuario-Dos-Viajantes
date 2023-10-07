<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/navbar.js" defer></script>
</head>

<body>

    <?php include_once '../components/navbar.html' ?>

    <main>

        <div class="title_form">
            <h2>Cadastrar novo usuario</h2>
        </div>

        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" value="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Sexo</label>
                <div class="input-group has-validation">

                    <input type="text" class="form-control" id="sexo" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" required>
                <div class="invalid-feedback">

                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">City</label>
                    <input type="text" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">State</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
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