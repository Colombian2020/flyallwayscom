<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - FlyAllways</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
            margin-left: 16.7%; /* compensar sidebar en desktop */
        }
        .form-section {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                height: auto;
                width: 100%;
            }
            .content {
                margin-left: 0;
                padding: 15px;
            }
            .form-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5 class="text-white text-center">Admin Panel</h5>
                    <a href="index.php"><i class="fas fa-plus"></i> Nuevo Registro</a>
                    <a href="registros.php"><i class="fas fa-list"></i> Ver Registros</a>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
                <h2 class="mt-4 mb-4">Formulario de Itinerario de Vuelo</h2>
                <div class="form-section">
                    <form action="guardar_datos.php" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre del pasajero</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="id" class="form-label">Documento pasajero</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
                        </div>

                        <hr>
                        <h5 class="mt-3">Vuelo Ida</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="fecha1" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha1" name="fecha1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="origen1" class="form-label">Origen</label>
                                <input type="text" class="form-control" id="origen1" name="origen1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="destino1" class="form-label">Destino</label>
                                <input type="text" class="form-control" id="destino1" name="destino1" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hora_salida1" class="form-label">Hora de salida</label>
                                <input type="time" class="form-control" id="hora_salida1" name="hora_salida1" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hora_llegada1" class="form-label">Hora de llegada</label>
                                <input type="time" class="form-control" id="hora_llegada1" name="hora_llegada1" required>
                            </div>
                        </div>

                        <hr>
                        <h5 class="mt-3">Vuelo Vuelta</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="fecha2" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha2" name="fecha2" required>
                            </div>
                            <div class="col-md-4">
                                <label for="hora_salida2" class="form-label">Hora de salida</label>
                                <input type="time" class="form-control" id="hora_salida2" name="hora_salida2" required>
                            </div>
                            <div class="col-md-4">
                                <label for="hora_llegada2" class="form-label">Hora de llegada</label>
                                <input type="time" class="form-control" id="hora_llegada2" name="hora_llegada2" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success">Guardar Itinerario</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>