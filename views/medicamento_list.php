<?php
global $conn;
$medicamento = new Medicamento();
$medicamentos = $medicamento->getAllMedicamentos($conn);
?>
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
            <h3>Medicamentos de Farmacia</h3><br>
            <a href="/views/create_medicamento.php" class="btn btn-primary">Crear Medicamento</a>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Distribuidor</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medicamentos as $med): ?>
                        <tr>
                            <th scope="row">
                                <?php echo $med->id; ?>
                            </th>
                            <td>
                                <?php echo $med->nombre; ?>
                            </td>
                            <td>
                                <?php echo $med->tipo; ?>
                            </td>
                            <td>
                                <?php echo $med->cantidad; ?>
                            </td>
                            <td>
                                <?php echo $med->Distribuidor; ?>
                            </td>
                            <td>
                                <?php echo $med->sucursal; ?>
                            </td>
                            <td><a href="../index.php?action=edit&id=<?php echo $med->id; ?>"
                                    class="btn btn-success"><ion-icon name="pencil"></ion-icon></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmationModal" data-nombre="<?php echo $med->nombre; ?>"
                                    data-id="<?php echo $med->id; ?>">
                                    <ion-icon name="trash"></ion-icon>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal"  aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModal">Eliminar medicamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" border: none; background: transparent; outline: none;">
                        <span aria-hidden="true" style="font-size: 1.5rem;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar el registro con el nombre: <span id="recordName"></span>?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="../index.php?action=delete" method="post" class="needs-validation" novalidate>
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#confirmationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recordName = button.data('nombre');
            var id = button.data('id');
            var modal = $(this);
            modal.find('#recordName').text(recordName);
            $("#id").val(id);
        });
    </script>
</body>

</html>