<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jenniffer Granados">
    <title>IGF</title>

    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GM14032</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    

                </ul>

            </div>
        </div>
    </nav>

    <main class="container">
        <div class="bg-light p-5 rounded">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h4 class="border-bottom border-gray pb-2 mb-0">Agregar medicamento</h4>
                <form action="../index.php?action=edit" method="post" class="needs-validation" novalidate>
                    <br>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre"
                                value="<?php echo $medicamento->nombre; ?>" name="nombre" required>
                                <input type="text" class="form-control" id="id"
                                value="<?php echo $medicamento->id; ?>" name="id" hidden>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Cantidad:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cantidad"
                                value="<?php echo $medicamento->cantidad; ?>" name="cantidad" required>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo">
                                <option value="Analgésico" <?php if ($medicamento->tipo === 'Analgésico')
                                    echo 'selected'; ?>>Analgésico</option>
                                <option value="Analeptico" <?php if ($medicamento->tipo === 'Analeptico')
                                    echo 'selected'; ?>>Analeptico</option>

                                <option value="Anestesico" <?php if ($medicamento->tipo === 'Anestesico')
                                    echo 'selected'; ?>>Anestesico</option>
                                <option value="Antiácido" <?php if ($medicamento->tipo === 'Antiácido')
                                    echo 'selected'; ?>>Antiácido</option>
                                <option value="Antidepresivo" <?php if ($medicamento->tipo === 'Antidepresivo')
                                    echo 'selected'; ?>>Antidepresivo</option>
                                <option value="Antibióticos" <?php if ($medicamento->tipo === 'Antibióticos')
                                    echo 'selected'; ?>>Antibióticos</option>
                            </select>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="distribuidor" class="col-sm-2 col-form-label">Distribuidor:</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="distribuidor" id="distribuidor1"
                                    value="Cofarma" <?php if ($medicamento->Distribuidor === 'Cofarma') echo 'checked'; ?>>
                                <label class="form-check-label" for="distribuidor1">
                                    Cofarma
                                </label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="distribuidor" id="distribuidor2"
                                    value="Empsephar" <?php if ($medicamento->Distribuidor === 'Empsephar') echo 'checked'; ?>>
                                <label class="form-check-label" for="distribuidor2">
                                    Empsephar
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="distribuidor" id="distribuidor3"
                                    value="Cemefar" <?php if ($medicamento->Distribuidor === 'Cemefar') echo 'checked'; ?>>
                                <label class="form-check-label" for="distribuidor3">
                                    Cemefar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sucursal1" class="col-sm-2 col-form-label">Sucursal:</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="text"  value="<?php echo $medicamento->sucursal; ?>" id="sucursal" hidden>
                                <input class="form-check-input" type="checkbox" id="sucursal1" name="sucursal1"
                                    value="Calle de la Rosa n. 28">
                                <label class="form-check-label" for="sucursal1">
                                    Principal
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sucursal2" name="sucursal2"
                                    value="Calle Alcazabilla n. 3">
                                <label class="form-check-label" for="sucursal2">
                                    Secundaria
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="update_medicamento">Guardar
                                </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script>
        const sucursal= document.getElementById('sucursal').value;
        const existSucursal1 = sucursal.includes('Calle de la Rosa');
        const existSucursal2 = sucursal.includes('Calle Alcazabilla');
        if (existSucursal1) {
            document.getElementById('sucursal1').checked = true;
        }
        if (existSucursal2) {
            document.getElementById('sucursal2').checked = true;
        }
    </script>
</body>

</html>