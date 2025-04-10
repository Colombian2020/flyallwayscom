<?php
// Tu clave API de PDF.co (obtenla en https://app.pdf.co/)
$apiKey = "nateg92114@provko.com_LA6xpFVqTfQeNhxI9DbRugQ4q9gtAcHnARCa8Yis2pi3qkMSTejJpU5UUyynY0dx";

// URL del PDF (debe ser accesible públicamente)
$pdfUrl = "filetoken://a419c592989efdcb0fc38bb1540b3799b55d523fba876fed54"; 

$archivo = 'datos.json';

// Generar código localizador aleatorio
function generarCodigo($longitud = 6) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

// Generar el nuevo itinerario a partir del POST
$localizador = generarCodigo();
$codigo1 = generarCodigo();
$codigo2 = generarCodigo();
$nuevo = [
    "localizador" => $localizador,
    "pasajero" => [
        "nombre" => strtoupper($_POST["nombre"]),
        "id" => $_POST["id"]
    ],
    "vuelo1" => [
        
            "vuelo" => $codigo1,
            "fecha" => $_POST["fecha1"],
            "origen" => $_POST["origen1"],
            "destino" => $_POST["destino1"],
            "hora_salida" => $_POST["hora_salida1"],
            "hora_llegada" => $_POST["hora_llegada1"]
        ],
    "vuelo2" =>[
            "vuelo" => $codigo2,
            "fecha" => $_POST["fecha2"],
            "origen" => $_POST["destino1"],
            "destino" => $_POST["origen1"],
            "hora_salida" => $_POST["hora_salida2"],
            "hora_llegada" => $_POST["hora_llegada2"]
        ],
    
    "fecha_emision" => date("d/M/y")
];

// Guardar en JSON
$datosExistentes = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : ["itineraries" => []];
$datosExistentes["itineraries"][] = $nuevo;
file_put_contents($archivo, json_encode($datosExistentes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ------------------------
// Generar el PDF en PDF.co
// ------------------------
$primer_nombre = explode(" ", strtoupper($_POST["nombre"]))[0];
// Textos del PDF original que deseas reemplazar
$searchStrings = [
    "HJ9F3P",
    "CARLOS MOREJON HERNANDEZ",
    "CARLOSS",
    "6598794985445",
    "16APR25",
    "23APR25",
    "27MAR2025",
    "Jose Marti",
    "Cheddi Jagan"
];

// Reemplazos desde $_POST
$replaceStrings = [
    $localizador,
    $primer_nombre,
    strtoupper($_POST["nombre"]),
    $_POST["id"],
    $_POST["fecha1"],
    $_POST["fecha2"],
    date("d/M/y"),
    $_POST["origen1"],
    $_POST["destino1"]
];

$data = json_encode([
    "url" => $pdfUrl,
    "searchStrings" => $searchStrings,
    "replaceStrings" => $replaceStrings,
    "name" => "Flyallways" . "_$localizador.pdf"
]);

$options = [
    "http" => [
        "header" => "Content-type: application/json\r\nx-api-key: $apiKey",
        "method" => "POST",
        "content" => $data
    ]
];

$context = stream_context_create($options);
$result = file_get_contents("https://api.pdf.co/v1/pdf/edit/replace-text", false, $context);
$response = json_decode($result, true);

if (isset($response["url"])) {
    echo "<h3>PDF generado correctamente</h3>";
    $posEspacio = strpos(strtoupper($_POST["nombre"]), " ");
$restoNombre = ($posEspacio !== false) ? substr(strtoupper($_POST["nombre"]), $posEspacio + 1) : "";
    echo "$restoNombre <br> $localizador <br>
    
    <a href='" . $response["url"] . "' download  target='_blank' >Descargar PDF</a>";
} else {
    echo "Error al generar el PDF: " . $result;
}
?>
