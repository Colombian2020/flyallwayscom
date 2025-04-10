<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Vuelo - FlyAllways</title>
    <style>
        /* Estilos globales */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            margin: 0;
            padding: 0;
             /*display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
        }

        /* Estilo del Navbar */
        nav {
            width: 100%;
            background-color: #1a3e5e;
            padding: 10px 0;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        nav a {
            color: #fff;
            font-size: 1.1rem;
            padding: 12px;
            text-decoration: none;
            margin: 0 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s ease;
        }

        nav a:hover {
            color: #00ff00;
        }

        /* Formulario */
        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            margin-top: 20px;
        }

        label {
            font-size: 1.1rem;
            margin-bottom: 5px;
            display: block;
            color: #ccc;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            transition: 0.3s ease;
        }

        input:focus {
            border: 1px solid #00ff00;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00ff00;
            color: #fff;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #00cc00;
        }

        /* Animaciones */
        input, button {
            animation: fadeIn 1.2s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        /* Lista de registros */
        .registro-lista {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        .registro-item {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            color: #fff;
            font-size: 1.1rem;
        }

        .registro-item:last-child {
            border-bottom: none;
        }
        
        /* Responsivo */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body> <br><br><br><br>
    <!-- Navbar -->
    <nav>
        <a href="index.php">Nuevo Registro</a>
        <a href="registros.php">Ver Registros</a>
    </nav>

    <!-- Formulario -->
    <div class="form-container">
       <h1>the service by foredx</h1>
        <h3>Registros Realizados</h3>
        <?php
        // Mostrar los registros guardados
        $archivo = 'datos.json';
        $datos = json_decode(file_get_contents($archivo), true);
        foreach ($datos["itineraries"] as $registro) {
            echo "<div class='registro-item'>Localizador: {$registro['localizador']} - Nombre: {$registro['pasajero']['nombre']}</div>";
        }
        ?>
    </div>
</body>
</html>