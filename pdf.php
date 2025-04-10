<?php
// Tu clave API de PDF.co (obtenla en https://app.pdf.co/)
$apiKey = "nateg92114@provko.com_LA6xpFVqTfQeNhxI9DbRugQ4q9gtAcHnARCa8Yis2pi3qkMSTejJpU5UUyynY0dx";

// URL del PDF (debe ser accesible públicamente)
$pdfUrl = "filetoken://a419c592989efdcb0fc38bb1540b3799b55d523fba876fed54"; 

// Generar texto aleatorio para los reemplazos
function generarCodigo($longitud = 6) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

function generarNombrePasajero() {
    $nombres = ['Carlos Morejón Hernández', 'Juan Pérez González', 'Ana Martínez Fernández'];
    return $nombres[rand(0, count($nombres) - 1)];
}

// Datos aleatorios para reemplazar en el PDF
$localizadorNuevo = generarCodigo();
$nombrePasajero = generarNombrePasajero();
$primer_nombre = explode(" ", $nombrePasajero)[0];
$idPasajero = rand(1000000000000, 9999999999999);
$fechaVuelo1 = rand(1, 30) . ' abril 2025';
$fechaVuelo2 = rand(1, 30) . ' mayo 2025';

// Configurar los datos de la solicitud para reemplazar varios textos
$data = json_encode([
    "url" => $pdfUrl,
    "searchStrings" => [
        "HJ9F3P",                        // Localizador anterior
        "CARLOSS",
        "CARLOS MOREJON HERNANDEZ",      // Nombre pasajero
        "6598794985445",                 // ID pasajero
        "16APR25",                 // Fecha vuelo 1
        "23APR25",
        "27MAR2025",
        "Jose Marti",
        "Cheddi Jagan"             // Fecha vuelo 2
    ],
    "replaceStrings" => [
        $localizadorNuevo,               // Nuevo localizador
        $primer_nombre,
        $nombrePasajero,                 // Nuevo nombre pasajero
        $idPasajero,                     // Nuevo ID pasajero
        $fechaVuelo1,                    // Nueva fecha para vuelo 1
        $fechaVuelo2 ,
        date('dMY'),
        "LOL"  ,
        "lol1"                 // Nueva fecha para vuelo 2
    ],
    "name" => "$primer_nombre" ." _$localizadorNuevo.pdf"
]);

// Configurar la petición HTTP
$options = [
    "http" => [
        "header" => "Content-type: application/json\r\nx-api-key: $apiKey",
        "method" => "POST",
        "content" => $data
    ]
];

// Enviar la solicitud a la API de PDF.co
$context = stream_context_create($options);
$result = file_get_contents("https://api.pdf.co/v1/pdf/edit/replace-text", false, $context);

// Verificar si hay algún error en la respuesta
if ($result === FALSE) {
    echo "Error al hacer la solicitud a la API de PDF.co.";
    exit;
}

// Decodificar la respuesta JSON
$response = json_decode($result, true);

// Imprimir la respuesta completa para depuración
echo "<pre>";
print_r($response);
echo "</pre>";

// Verificar si se generó el PDF correctamente
if (isset($response["url"])) {
    echo "PDF modificado correctamente. Descárgalo aquí: " . $response["url"];
} else {
    echo "Error al modificar el PDF: " . $result;
}
?>
