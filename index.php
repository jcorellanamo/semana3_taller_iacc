<!DOCTYPE html>
<html lang="es">
<head>
    <title>JUSTICIA PARA TODOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="justicia.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-image: url('fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            margin-top: 80px;
        }
        .form-control {
            height: 40px;
            padding: 5px 10px;
        }
        .btn {
            width: 100%;
        }

        @media (min-width: 992px) {
            .card {
                margin-left: 25%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Justicia para Todos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Clientes Registrados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Registrar Cliente</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Formulario -->
    <div class="container mt-5 pt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">JUSTICIA PARA TODOS</h2>
                <br>
                <form action="backend.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rut">RUT:</label>
                                <input type="text" class="form-control" id="rut" name="rut" placeholder="12345678-9" oninput="checkRut(this)" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="pais">País:</label>
                                <input type="text" class="form-control" id="pais" name="pais" required>
                            </div>
                            <div class="form-group">
                                <label for="region">Región:</label>
                                <input type="text" class="form-control" id="region" name="region" required>
                            </div>
                            <div class="form-group">
                                <label for="calle">Calle:</label>
                                <input type="text" class="form-control" id="calle" name="calle" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_casa">Número de Casa/Apartamento:</label>
                                <input type="text" class="form-control" id="numero_casa" name="numero_casa" required>
                            </div>
                            <div class="form-group">
                                <label for="codigo_postal">Código Postal:</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="+56 9 1234 5678" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_caso">Número de Caso:</label>
                                <input type="text" class="form-control" id="numero_caso" name="numero_caso" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_caso">Descripción del Caso:</label>
                                <textarea class="form-control" id="descripcion_caso" name="descripcion_caso" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio del Caso:</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="form-group">
                                <label for="estado_caso">Estado del Caso:</label>
                                <select class="form-control" id="estado_caso" name="estado_caso" required>
                                    <option value="activo">Activo</option>
                                    <option value="en_proceso">En Proceso</option>
                                    <option value="cerrado">Cerrado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="descripcion_sentencia_group" style="display: none;">
                            <div class="form-group">
                                <label for="descripcion_sentencia">Descripción de la Sentencia:</label>
                                <textarea class="form-control" id="descripcion_sentencia" name="descripcion_sentencia" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6" id="fecha_cierre_group" style="display: none;">
                            <div class="form-group">
                                <label for="fecha_cierre">Fecha de Cierre del Caso:</label>
                                <input type="date" class="form-control" id="fecha_cierre" name="fecha_cierre">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#estado_caso').change(function() {
                var estado = $(this).val();
                if (estado === 'cerrado') {
                    $('#descripcion_sentencia_group').show();
                    $('#fecha_cierre_group').show();
                } else {
                    $('#descripcion_sentencia_group').hide();
                    $('#fecha_cierre_group').hide();
                }
            });

            // Validación del teléfono
            $('#telefono').on('input', function() {
                var telefono = $(this).val();
                var regexTelefono = /^\+[0-9\s]+$/;
                if (!regexTelefono.test(telefono)) {
                    alert('El número de teléfono debe comenzar con "+" y solo debe contener números y espacios.');
                    $(this).val('');
                }
            });
        });
    </script>
    <script src="validaRut.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
