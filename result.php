<?php

$archivo = 'datos.json';

if (!isset($_GET["localizador"])) {
    echo "No se proporcionó localizador.";
    exit;
}

$localizador = trim($_GET["localizador"]);

// Verificamos que el archivo exista
if (!file_exists($archivo)) {
    echo "Archivo de datos no encontrado.";
    exit;
}

$datos = json_decode(file_get_contents($archivo), true);
$itinerarios = $datos["itineraries"];

$encontrado = null;

foreach ($itinerarios as $itinerario) {
    if (strcasecmp($itinerario["localizador"], $localizador) == 0) {
        $encontrado = $itinerario;
        break;
    }
}

if (!$encontrado) {
    echo "<p>No se encontró ningún itinerario con el localizador: <strong>$localizador</strong>.</p>";
    echo "<a href='buscar.html'>Volver</a>";
    exit;
}

// Mostrar información encontrada
echo "<h2>Itinerario encontrado:</h2>";
echo "<strong>Nombre:</strong> " . htmlspecialchars($encontrado["pasajero"]["nombre"]) . "<br>";
echo "<strong>ID:</strong> " . htmlspecialchars($encontrado["pasajero"]["id"]) . "<br>";
echo "<strong>Fecha de emisión:</strong> " . $encontrado["fecha_emision"] . "<br><br>";

echo "<h3>Vuelos:</h3>";
foreach ($encontrado["vuelos"] as $vuelo) {
    echo "Vuelo: {$vuelo['vuelo']}<br>";
    echo "Fecha: {$vuelo['fecha']}<br>";
    echo "Origen: {$vuelo['origen']}<br>";
    echo "Destino: {$vuelo['destino']}<br>";
    echo "Hora salida: {$vuelo['hora_salida']} - Hora llegada: {$vuelo['hora_llegada']}<br><br>";
}

