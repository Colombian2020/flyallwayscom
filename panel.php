<?php
session_start();
$archivo = './admin/datos.json';
if (!isset($_SESSION['codigo'])) {
    header("Location: index.php");
    exit();
}


$localizador = $_SESSION["codigo"];

// Verificamos que el archivo exista
if (!file_exists($archivo)) {
    echo "Base de datos no encontrado.";
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



$nombre = $encontrado["pasajero"]["nombre"];
$id = $encontrado["pasajero"]["id"];
$fechae = $encontrado["fecha_emision"];

$vuelo1 =  $encontrado["vuelo1"]["vuelo"];
$fecha1 =  $encontrado["vuelo1"]["fecha"];
$origen1 =  $encontrado["vuelo1"]["origen"];
$destino1 =  $encontrado["vuelo1"]["destino"];
$horas1 =  $encontrado["vuelo1"]["hora_salida"];
$horar1 =  $encontrado["vuelo1"]["hora_llegada"];


$vuelo2 =  $encontrado["vuelo2"]["vuelo"];
$fecha2 =  $encontrado["vuelo2"]["fecha"];
$origen2 =  $encontrado["vuelo2"]["origen"];
$destino2 =  $encontrado["vuelo2"]["destino"];
$horas2 =  $encontrado["vuelo2"]["hora_salida"];
$horar2 =  $encontrado["vuelo2"]["hora_llegada"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" class=" js no-touch localstorage" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Current booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="Magento, Varien, E-commerce">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="icon" href="https://flyallvvays.com/media/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://flyallvvays.com/media/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="./Current booking_files/bf25891249503a343790eb785a3c17dd.css" media="all">
    <link rel="stylesheet" type="text/css" href="./Current booking_files/c223448929d7b3c0ace735ade0c52428.css" media="print">
    <script type="text/javascript" src="./Current booking_files/8406556d00dba9f48ba3cb6ea1a287a0.js.descarga"></script>
    <link rel="stylesheet" href="./Current booking_files/css">


    <script src="./Current booking_files/polyfill.min.js.descarga"></script>
    <script src="./Current booking_files/intlTelInput-jquery.min.js.descarga"></script>
    <link rel="stylesheet" href="./Current booking_files/all.css" crossorigin="anonymous">
    <link href="./Current booking_files/materialdesignicons.min.css" rel="stylesheet">
    </head><body class=" sales-order-view responsive footer-visible customer-account  website-flyallways"><div id="ie_popup" class="modal fade emergency-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="emergency-close" type="button" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body clearfix">
                    <div style="font-size: xx-large;text-align: center;">Internet Explorer is not supported</div>
                    <div class="ie-content">
                        <div class="clearfix">
                            <h2><span style="font-size: medium;">This page is not supported in Internet Explorer browser, some of the functionalities in this page may not work correctly. Please, open this page in Edge/Chrome/Firefox/Safari/Opera.</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //<![CDATA[
        var Translator = new Translate({
            "HTML tags are not allowed": "No est\u00e1n permitidas las etiquetas HTML",
            "Please select an option.": "Seleccione una opci\u00f3n.",
            "This is a required field.": "Este es un campo obligatorio.",
            "Please enter a valid number in this field.": "Ingrese un n\u00famero v\u00e1lido en este campo.",
            "The value is not within the specified range.": "El valor no est\u00e1 dentro del rango permitido.",
            "Please use numbers only in this field. Please avoid spaces or other characters such as dots or commas.": "En este campo s\u00f3lo se pueden escribir n\u00fameros. Evite los espacios en blanco u otros caracteres, como los puntos o las comas, por ejemplo.",
            "Please use letters only (a-z or A-Z) in this field.": "Por favor, use s\u00f3lo letras (a-z o A-Z) en este campo.",
            "Please use only letters (a-z), numbers (0-9) or underscore(_) in this field, first character should be a letter.": "Utilice s\u00f3lo letras (a-z), n\u00fameros (0-9) o guiones bajos (_) en este campo. El primer caracter debe ser una letra.",
            "Please use only letters (a-z or A-Z) or numbers (0-9) only in this field. No spaces or other characters are allowed.": "Por favor, utilice solo letras (a-z o A-Z) o n\u00fameros (0-9) solo en este campo. No est\u00e1n permitidos los espacios u otros caracteres.",
            "Please use only letters (a-z or A-Z) or numbers (0-9) or spaces and # only in this field.": "Por favor, utilice solo letras (a-z o A-Z) o n\u00fameros (0-9) o espacios y # solo en este campo.",
            "Please enter a valid phone number. For example (123) 456-7890 or 123-456-7890.": "Ingrese un n\u00famero de tel\u00e9fono v\u00e1lido. Por ejemplo: (123) 456-7890 o 123-456-7890.",
            "Please enter a valid fax number. For example (123) 456-7890 or 123-456-7890.": "Por favor, introduzca un n\u00famero de fax v\u00e1lido. Por ejemplo (123) 456-7890 o 123-456-7890.",
            "Please enter a valid date.": "Ingrese una fecha v\u00e1lida.",
            "The From Date value should be less than or equal to the To Date value.": "El valor Desde la fecha debe ser inferior o igual al valor Hasta la fecha.",
            "Please enter a valid email address. For example johndoe@domain.com.": "Ingrese una direcci\u00f3n de correo electr\u00f3nico v\u00e1lida. Por ejemplo: juanperez@dominio.com.",
            "Please use only visible characters and spaces.": "Por favor, utilice solo caracteres visibles y espacios.",
            "Please make sure your passwords match.": "Por favor, aseg\u00farese de que sus contrase\u00f1as coinciden.",
            "Please enter a valid URL. Protocol is required (http:\/\/, https:\/\/ or ftp:\/\/)": "Por favor, introduzca una URL v\u00e1lida. Es necesario el protocolo (http:\/\/, https:\/\/ or ftp:\/\/)",
            "Please enter a valid URL. For example http:\/\/www.example.com or www.example.com": "Por favor, introduzca una URL v\u00e1lida. Por ejemplo, http:\/\/www.example.com o www.example.com",
            "Please enter a valid URL Key. For example \"example-page\", \"example-page.html\" or \"anotherlevel\/example-page\".": "Por favor, introduzca una Clave de URL v\u00e1lida. Por ejemplo  \\\"pagina-ejemplo\\\", \\\"pagina-ejemplo.html\\\" o \\\"otronivel\/pagina-ejemplo\\\"",
            "Please enter a valid XML-identifier. For example something_1, block5, id-4.": "Por favor, introduzca un identificador-XML v\u00e1lido. Por ejemplo, algo_1, bloque5, id-4.",
            "Please enter a valid social security number. For example 123-45-6789.": "Ingrese un n\u00famero de seguro social v\u00e1lido. Por ejemplo: 123-45-6789.",
            "Please enter a valid zip code. For example 90602 or 90602-1234.": "Ingrese un c\u00f3digo postal v\u00e1lido. Por ejemplo: 90602 o 90602-1234.",
            "Please enter a valid zip code.": "Ingrese un c\u00f3digo postal v\u00e1lido.",
            "Please use this date format: dd\/mm\/yyyy. For example 17\/03\/2006 for the 17th of March, 2006.": "Utilice este formato de fecha: dd\/mm\/aaaa. Por ejemplo, 17\/03\/2006 para el 17 de marzo de 2006.",
            "Please enter a valid $ amount. For example $100.00.": "Ingrese un monto v\u00e1lido en $. Por ejemplo: $100.00.",
            "Please select one of the above options.": "Seleccione una de las opciones anteriores.",
            "Please select one of the options.": "Seleccione una de las opciones.",
            "Please select State\/Province.": "Por favor, selecciona Estado\/Provincia.",
            "Please enter a number greater than 0 in this field.": "Ingrese un n\u00famero mayor que 0 en este campo.",
            "Please enter a number 0 or greater in this field.": "Por favor, introduzca un n\u00famero 0 o superior en este campo.",
            "Please enter a valid credit card number.": "Ingrese un n\u00famero de tarjeta de cr\u00e9dito v\u00e1lido.",
            "Credit card number does not match credit card type.": "El n\u00famero de tarjeta de cr\u00e9dito no se ajusta al tipo de tarjeta de cr\u00e9dito.",
            "Card type does not match credit card number.": "El tipo de tarjeta no se ajusta al n\u00famero de tarjeta de cr\u00e9dito.",
            "Incorrect credit card expiration date.": "Fecha de caducidad de la tarjeta de cr\u00e9dito incorrecta",
            "Please enter a valid credit card verification number.": "Por favor, introduzca el n\u00famero de verificaci\u00f3n de tarjeta v\u00e1lido.",
            "Please use only letters (a-z or A-Z), numbers (0-9) or underscore(_) in this field, first character should be a letter.": "Por favor, utilice solamente letras (a-z o A-Z), n\u00fameros (0-9) o guion bajo (_) en este campo, el primer car\u00e1cter debe ser una letra.",
            "Please input a valid CSS-length. For example 100px or 77pt or 20em or .5ex or 50%.": "Por favor, introduzca una longitud v\u00e1lida de CSS. Por ejemplo, 100px o 77pt o 20em o .5ex o 50%",
            "Text length does not satisfy specified text range.": "La longitud del texto no satisface el rango de texto se\u00f1alado",
            "Please enter a number lower than 100.": "Por favor, introduzca un n\u00famero menor que 100.",
            "Please select a file": "Por favor seleccione un archivo",
            "Please enter issue number or start date for switch\/solo card type.": "Por favor, introduzca un n\u00famero de emisi\u00f3n o fecha de inicio para el tipo de tarjeta switch\/solo.",
            "Please wait, loading...": "Espera, por favor. Cargando....",
            "This date is a required value.": "La fecha es un valor obligatorio.",
            "Please enter a valid day (1-%d).": "Por favor, introduzca un d\u00eda v\u00e1lido (1-%d).",
            "Please enter a valid month (1-12).": "Por favor, introduzca un mes v\u00e1lido (1-12).",
            "Please enter a valid year (1900-%d).": "Por favor, introduzca un a\u00f1o v\u00e1lido (1900-%d).",
            "Please enter a valid full date": "Por favor, introduzca una fecha v\u00e1lida completa",
            "Please enter a valid date between %s and %s": "Por favor, introduzca una fecha v\u00e1lida entre %s y %s",
            "Please enter a valid date equal to or greater than %s": "Por favor, introduzca una fecha v\u00e1lida igual o superior a %s",
            "Please enter a valid date less than or equal to %s": "Por favor, introduzca una fecha v\u00e1lida menor o igual a %s",
            "Complete": "Completo",
            "Add Products": "A\u00f1adir productos",
            "Please choose to register or to checkout as a guest": "Elija registrarse o pagar como invitado",
            "Your order cannot be completed at this time as there is no shipping methods available for it. Please make necessary changes in your shipping address.": "Su pedido no se puede completar en este momento ya que no hay m\u00e9todos de env\u00edo disponibles para ello.\u00a0Realice los cambios necesarios en su direcci\u00f3n de env\u00edo.",
            "Please specify shipping method.": "Por favor especifique el metodo de envio.",
            "Your order cannot be completed at this time as there is no payment methods available for it.": "Su pedido no se puede completar en este momento ya que no hay m\u00e9todos de pago disponibles para ello.",
            "Please specify payment method.": "Por favor, especifique el m\u00e9todo de pago.",
            "Add to Cart": "A\u00f1adir al Carrito",
            "In Stock": "En stock",
            "Out of Stock": "Agotado",
            "Are you sure?": "\u00bfEst\u00e1 seguro?"
        });
        //]]>
    </script>
    <style>
        #cancel-segment #cancel-modal,
        #cancel-booking-btn,
        #submit-cancel-passenger {
            display: none;
        }
    </style>
    <link href="./Current booking_files/css(1)" rel="stylesheet" type="text/css">





    <style type="text/css">
        .primary-text-color {
            color: #00A4A4;
        }

        .call-center-modal.in .modal-dialog .modal-content {
            border-color: #00A4A4;
        }

        .call-center-modal.in .phone-icon .a {
            fill: #00A4A4;
        }

        .primary-background-color {
            background-color: #E24E24;
        }

        .primary-button-background-color {
            background-color: #E24E24;
        }

        .primary-button-hover-background-color:hover {
            background-color: #E24E24;
        }

        @media (max-width: 767px) {
            .table-promotions-wrapper .book-now-link.primary-border-color-for-mobile-only {
                border-color: #E24E24;
            }
        }

        .privat-installment-table-wrapper .slider-container .rs-container .rs-selected,
        .privat-installment-table-wrapper .slider-container .rs-container .rs-pointer:after {
            background-color: #00A4A4;
        }

        #v-cookielaw .v-message {
            color: #000000;
        }

        #v-cookielaw {
            background-color: #FAFAFA !important;
        }

        #v-cookielaw a.v-button {
            background-color: #ECECEC;
        }

        #v-cookielaw a.v-button {
            color: #333333;
        }

        #v-cookielaw a.v-button:hover {
            background-color: #54BD84;
        }

        #v-cookielaw a.v-button:hover {
            color: #FFFFFF;
        }

        #top .header-menu-flex,
        .header-background-color {
            background: linear-gradient(to right, #ffffff, #ffffff);
        }

        #top .header-top-container>.right-column {
            background: linear-gradient(to right, #00a4a4, #00a4a4);
        }

        #header-nav .nav-regular .nav-item.level0>a,
        .header-menu-flex .links>li>a,
        #top .header-top-container>.right-column .account-menu {
            color: #00A4A4 !important;
        }

        .nav-regular .nav-item.level0.parent>a .caret {
            border-top-color: #00A4A4 !important;
        }

        #header-nav .nav-regular .nav-item.level0:hover>a,
        .header-menu-flex .links>li>a:hover,
        #header-nav .nav-regular .nav-item.level0.active>a,
        #top .header-top-container>.right-column .account-menu:hover {
            color: #E24E24 !important;
        }

        .nav-regular .classic>.nav-panel--dropdown {
            border-color: #E24E24;
        }

        .nav-regular .classic>.nav-panel--dropdown:after {
            border-bottom-color: #E24E24;
        }

        #top .header-top-container>.right-column .left-wrapper .chat-block,
        #top .header-top-container>.right-column .left-wrapper .notification-block,
        #top .header-top-container>.right-column .right-wrapper .search i,
        #top .header-top-container .search i,
        .header-container .dropdown .dropdown-heading,
        #currency-switcher-wrapper-regular .currency-switcher.dropdown span.value {
            color: #FFFFFF !important;
        }

        #top .header-top-container>.right-column .left-wrapper .chat-block:hover,
        #top .header-top-container>.right-column .left-wrapper .notification-block:hover,
        #top .header-top-container .search i:hover,
        #top .header-top-container>.right-column .right-wrapper .search i:hover {
            color: #CCCCCC !important;
        }

        .header-container .dropdown .dropdown-content a,
        .header-container .links>li>a,
        .dropdown .dropdown-heading a,
        .header-container .dropdown.open>.dropdown-heading.cover a,
        .header-container .form-search .search-autocomplete li,
        .currency-switcher.dropdown.open ul>li>a::before {
            color: #00A4A4 !important;
        }

        .header-container .dropdown .dropdown-content li.current,
        .currency-switcher.dropdown.open ul>li.current::before {
            color: #000000 !important;
        }

        .header-container .dropdown .dropdown-content a:hover,
        .header-container .form-search .search-autocomplete li:hover,
        #header-account .links li a:hover,
        .header-container .dropdown .dropdown-heading:hover,
        #currency-switcher-wrapper-regular .currency-switcher.dropdown.open span.value,
        .header-container .dropdown.open>.dropdown-heading.cover>*,
        #nav .nav-panel--dropdown a:hover {
            color: #00A4A4 !important;
        }

        .header-container .dropdown .dropdown-heading.enable:hover {
            color: #E24E24 !important;
        }

        .header-container .right-column .dropdown .dropdown-content,
        .header-container .dropdown.open>.dropdown-heading.cover>*,
        #nav .nav-panel--dropdown {
            background-color: #FFFFFF !important;
        }

        .nav-mobile .nav-item.level0>a:hover {
            background-color: #E24E24 !important;
        }

        .footer-container .footer-block-wrapper.ft-links {
            background: linear-gradient(to right, #00a4a4, #00a4a4);
        }

        .footer-container .footer-block-wrapper.ft-primary {
            background: linear-gradient(to right, #00a4a4, #00a4a4);
        }

        .footer-container2 .footer-column .block-content li a,
        .footer-menu-links .level1 a {
            color: #FFFFFF;
        }

        .social-link path {
            fill: #FFFFFF;
        }

        .social-link:hover path {
            fill: #00A4A4;
        }

        .customer-account .main-container .my-account h2.legend #corp-reg-toggle,
        .customer-account .main-container .my-account .corp-result-block h2.legend #corp-remove,
        .modalDialog #corp-reg-form .buttons-set button {
            background: #00A4A4;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .member-mobile,
        #step-passengers .login-types-wrapper .login-type-item .content .join-us>a,
        #flash-sale-wrapper .ajax-login-modal .modal-dialog .member-mobile,
        .main.container .account-login .registered-users .member-mobile,
        .main.container .account-reset-password .member-mobile,
        .main.container .account-login .new-users .member-mobile,
        .account-login .join-us>a {
            color: #00A4A4;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .form-list .input-box i.mobile,
        .account-reset-password ul.form-list li .input-box i.mobile,
        .account-login ul.form-list li .input-box i.mobile {
            color: #BDE0E5;
        }

        #login-tabs li {
            color: #FFFFFF;
        }

        #login-tabs li.active {
            color: #FFFFFF;
        }

        .account-login .new-users,
        .account-login .registered-users,
        #tabs-content-wrapper .tab-content.account-create>.grid12-6,
        #tabs-content-wrapper .tab-content.account-reset-password>.grid12-6,
        .customer-account-create #form-validate {
            border-top-color: #E24E24;
        }

        .account-create #form-validate>.grid12-6 .fields>.customer-name-middlename>.field.name-prefix:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name-middlename>.field.nationality:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name-middlename>.field.preferred-language:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name-middlename>.field.preferred-currency:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name-middlename>.field.residence-country:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.name-prefix:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.nationality:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.preferred-language:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.preferred-currency:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.residence-country:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.name-prefix:before,
        .account-create #form-validate>.grid12-6 .fields>.customer-name>.field.customer-dob:before,
        .account-create #form-validate>.grid12-6 .form-list>.field.field-country:before,
        .account-create #form-validate>.grid12-6 .form-list>.field.field-state_provance:before,
        .customer-account .main-container .my-account .customer-name>.field.nationality:before,
        .customer-account .main-container .my-account .customer-name>.field.preferred-language:before,
        .customer-account .main-container .my-account .customer-name>.field.preferred-currency:before,
        .customer-account .main-container .my-account .customer-name>.field.residence-country:before,
        .customer-account .main-container .my-account .customer-name>.field.name-prefix:before,
        .customer-account .main-container .my-account .address-information>.field.country:before,
        .customer-account .main-container .my-account .change-password-fields>.field.country:before,
        .customer-account .main-container .my-account .change-password-fields>.field.field-state:before,
        #step-passengers #contactinfo .field.field-title:after,
        #step-passengers #contactinfo .field.field-birthdate:after,
        #step-passengers #contactinfo .field.field-country:after,
        #step-passengers #contactinfo .field.field-document:after,
        #step-passengers #passengers .field.field-title:after,
        #step-passengers #passengers .field.field-birthdate:after,
        #step-passengers #passengers .field.field-country:after,
        #step-passengers #passengers .field.field-document:after,
        #step-passengers #passengers .field.dob:after,
        #step-passengers #passengers .field.docid-date:after,
        #step-passengers #passengers .field.docs-date:after,
        #step-passengers #passengers .field.field-associated-adult:after,
        .customer-account .main-container .my-account .customer-name-middlename>.field.name-prefix:before,
        .customer-account .main-container .my-account .address-information>.field.field-state:before,
        .travel-document-fields .field-datepicker:before {
            border-top-color: #00A4A4;
        }

        .footer-container2 .footer-column .block-content li:hover a,
        .footer-menu-links .level1 a:hover {
            color: #00A4A4;
        }

        .adverts-block-3 .adverts-block-1 .adverts-block-1-content .total,
        .block-news .ad-content a,
        #services-slider .owl-item>div p {
            color: #00A4A4;
        }

        .seats-assigned-block b.wt-color1,
        #summary-items .per-passenger b.wt-color1,
        span.icon.icon-type-ADT:before,
        span.icon.icon-type-CHD:before,
        span.icon.icon-type-INF:before {
            color: #00A4A4 !important;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .button-line .submit-wrapper .button,
        .modal .modal-content .modal-footer .button,
        .buttons-set button.button,
        .btn-back-manage,
        .btn-primary,
        .account-login .registered-users .buttons-set button,
        .account-login .button-line button,
        .account-reset-password .button-line button,
        .account-login .new-users .buttons-set button,
        .account-create .buttons-set button.button,
        .modal-submit-btn #submit-cancel-passenger {
            background-color: #E24E24 !important;
        }

        .resend-button {
            color: #E24E24 !important;
        }

        .modal .modal-content .modal-footer .button:hover,
        .buttons-set button.button:hover,
        .btn-back-manage:hover,
        .btn-primary:hover {
            background-color: #00A4A4;
        }

        .modal .modal-content .modal-footer .btn.btn-default {
            background-color: #E24E24;
        }

        .modal .modal-content .modal-footer .btn.btn-default:hover {
            background-color: #00A4A4;
        }

        .customer-account .main-container .search-order button.button,
        .customer-account .main-container table tbody td a.check-in,
        .customer-account .main-container table tbody td a.view-booking,
        .customer-account .box-head>a,
        .customer-account .main-container .my-account .buttons-set button .account-create .buttons-set button,
        #customer-imported-reminder .modal-body button,
        #customer-imported-success-change-password .modal-body button {
            background: #1D4D64;
        }

        .hotel-flight-search .fa-exchange-alt:before {
            color: #E24E24 !important;
        }

        #root-wrapper hpf-search>div .hotel-flight-search__partial-stay .mat-checkbox-checked .mat-checkbox-background {
            background-color: #E24E24 !important;
        }

        .customer-account .main-container table tbody td a {
            color: #1D4D64;
        }

        #my-orders-table tbody td,
        .already-ordered tbody td,
        #my-orders-table tbody tr.view-order-table-row td:nth-child(1),
        #my-orders-table tbody td:last-child,
        .already-ordered tbody td:last-child,
        .detail-table,
        .about-order-line,
        .customer-account .main-container .search-order .field input:not([type='checkbox']),
        #my-orders-table tbody .view-order-table-row .icon-cell .icon-wrapper,
        .already-ordered tbody .view-order-table-row .icon-cell .icon-wrapper,
        .sales-order-view .order-details div.multileg-flight-wrapper,
        .sales-order-history #ui-datepicker-div,
        .sales-order-history #ui-datepicker-div tbody tr td a.ui-state-active,
        .sales-order-history #ui-datepicker-div tbody tr td a.ui-state-hover,
        .sales-order-history .ui-datepicker-next:after,
        .sales-order-history .ui-datepicker-prev:after {
            border-color: #1D4D64 !important;
        }

        .sales-order-history #ui-datepicker-div:before {
            border-bottom-color: #1D4D64 !important;
        }

        .order-items.order-details .multiple-flight-row:before,
        .order-items.order-details .multiple-flight-row:after {
            background-color: #1D4D64 !important;
        }

        #my-orders-table tbody .view-order-table-row .icon-cell h4 svg,
        .already-ordered tbody .view-order-table-row .icon-cell h4 svg,
        #my-orders-table tbody .view-order-table-row .icon-cell .icon-wrapper svg path:nth-child(2),
        .already-ordered tbody .view-order-table-row .icon-cell .icon-wrapper svg path:nth-child(2) {
            fill: #1D4D64 !important;
        }

        .customer-account .main-container .pager .limiter label,
        .customer-account .main-container .pager,
        li.previous .ic-right:before,
        li.previous .ic-left:before,
        li.next .ic-right:before,
        li.next .ic-left:before {
            color: #00A4A4 !important;
        }

        .pager {
            border-color: #00A4A4 !important;
        }

        .customer-account .main-container .search-order button.button:hover,
        .customer-account .main-container table tbody td a.check-in:hover,
        .customer-account .main-container table tbody td a.view-booking:hover,
        .customer-account .box-head>a:hover,
        .customer-account .main-container .my-account .buttons-set button:hover,
        .account-create .buttons-set button:hover,
        .customer-account .sidebar .sidebar-booking-link a:hover {
            background: #84B7D8;
        }

        .customer-account .main-container .my-account #form-validate .corp-btn,
        .customer-account .main-container .my-account .corp-result-block {
            background: #FFFFFF;
        }

        .back-link a:hover {
            color: #84B7D8;
        }

        .customer-account .sidebar .block-account .customer-navigation li.current::after {
            background-color: #00A4A4;
        }

        .customer-account .sidebar {
            border-color: #00A4A4;
        }

        .customer-account .sidebar .block-account .customer-navigation li:hover strong,
        .customer-account .sidebar .block-account .customer-navigation li:hover a,
        .customer-account .sidebar .sidebar-booking-link a,
        .customer-account .sidebar .block-account .customer-navigation li.current a,
        .dashboard .welcome-msg .hello strong {
            color: #00A4A4;
        }

        .customer-account .main-container .search-order a.button {
            background-color: #00A4A4;
        }

        .customer-account .sidebar .block-account .customer-navigation li:hover svg path {
            fill: #00A4A4;
        }

        .customer-account .main-container table tbody td.pnr-code,
        #my-orders-table .confirmed,
        .already-ordered .confirmed,
        .mobile-table-by-passenger .confirmed {
            color: #00A4A4 !important;
        }

        #login-tabs li {
            background: #00A4A4;
        }

        #login-tabs li.active {
            background: #E24E24;
        }

        #orders-list-for-print .data-table .print a:hover {
            background: #84B7D8;
            color: #fff;
        }

        .step-data .opc .panel-default>.panel-heading h4 svg path:nth-child(2),
        .confirmation .opc .panel-default>.panel-heading h4 svg path:nth-child(2),
        .booking-index-index .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr>td.flight-direction-name.mobile svg path:nth-child(2),
        .checkout-onepage-success .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr>td.flight-direction-name.mobile svg path:nth-child(2) {
            fill: #00A4A4;
        }

        .booking-index-index .col-main #checkoutSteps li .step-content .panel .panel-heading.directions-title h4,
        .booking-index-index .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr>td.flight-direction-name.mobile,
        .checkout-onepage-success .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr>td.flight-direction-name.mobile {
            color: #00A4A4;
        }

        .checkout-onepage-success .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr,
        .booking-index-index .col-main #checkoutSteps li .step-content .panel .directions-items.panel-body,
        .booking-index-index .col-main #checkoutSteps li .step-content .panel .panel-heading.directions-title,
        .checkout-onepage-success .contact_info,
        .booking-index-index .col-main #checkoutSteps li .step-content .checkout-items-table .directions-title table tr.multiple-flight-row td div.multiple-flight-wrapper,
        body.checkout-onepage-success .confirmation .confirmation-info-detail .confirmation-header h1 {
            border-color: #1C4D63 !important;
        }

        .booking-index-index .col-main #checkoutSteps li .step-content .item-row>div,
        .booking-index-index .col-main #checkoutSteps li .step-title.passenger_name h2,
        .checkout-onepage-success .col-main #checkoutSteps li .step-content .item-row>div,
        .checkout-onepage-success .col-main #checkoutSteps li .step-title.passenger_name h2,
        .checkout-onepage-success .col-main .checkout-extras-label,
        .step-data .opc .step-title .glyphicon,
        .checkout-onepage-success span.icon.icon-type-ADT:before,
        .checkout-onepage-success span.icon.icon-type-CHD:before,
        .checkout-onepage-success span.icon.icon-type-INF:before,
        .booking-index-index span.icon.icon-type-ADT:before,
        .booking-index-index span.icon.icon-type-CHD:before,
        .booking-index-index span.icon.icon-type-INF:before {
            color: #1C4D63 !important;
        }

        #change-name .modal-content form label .modify-checkbox,
        #cancel-passenger .modal-content form label .modify-checkbox,
        #change-date .modal-content form label .modify-checkbox,
        #cancel-segment .modal-content form label .modify-checkbox,
        #cancel-popup .modal-content form label .modify-checkbox,
        #update-doc .modal-content form label .modify-checkbox {
            border-color: #00A4A4;
        }

        #cancel-passenger .refund-container input[type="checkbox"]:checked+label:before,
        #cancel-segment .refund-container input[type="checkbox"]:checked+label:before,
        #cancel-popup .refund-container input[type="checkbox"]:checked+label:before {
            background-color: #00A4A4;
        }

        .account-create .fieldset .control input[type="checkbox"]:checked+label:after,
        .account-create .fieldset .control input[type="checkbox"]:checked+label:before,
        .customer-account.customer-account-edit .my-account .control .agree input[type="checkbox"]:checked+label:before,
        .customer-account.customer-account-edit .my-account .control .agree input[type="checkbox"]:checked+label:after {
            background: #00A4A4;
        }

        #cancel-passenger .refund-container input[type="checkbox"]:checked+label:after,
        #cancel-segment .refund-container input[type="checkbox"]:checked+label:after,
        #cancel-popup .refund-container input[type="checkbox"]:checked+label:after {
            border-color: #00A4A4;
        }

        .datepicker-top-left {
            border-top-color: #00A4A4;
        }

        .datepicker-top-left::before,
        .datepicker-top-right::before {
            border-bottom-color: #00A4A4;
        }

        .datepicker-panel>ul>li.picked,
        .datepicker-panel>ul>li.picked:hover {
            color: #00A4A4;
        }

        #step-checkout.confirmation .opc #shopping-cart-totals-table tfoot tr td:last-child,
        #step-checkout.step-data .opc #shopping-cart-totals-table tfoot tr td:last-child {
            background-color: #1C4D63;
        }

        #step-checkout.confirmation .opc #shopping-cart-totals-table tfoot tr td:first-child,
        #step-checkout.step-data .opc #shopping-cart-totals-table tfoot tr td:first-child {
            background-color: #00A4A4;
        }

        #step-checkout.confirmation .opc #shopping-cart-totals-table tfoot tr,
        #step-checkout.step-data .opc #shopping-cart-totals-table tfoot tr {
            border-color: #FFFFFF;
        }

        #step-checkout.confirmation .opc #shopping-cart-totals-table tfoot tr td,
        #step-checkout.step-data .opc #shopping-cart-totals-table tfoot tr td {
            color: #FFFFFF;
        }

        .footer-container .collapsible .block-title,
        .mobile-collapsible .block-title,
        .footer-menu-links a.level-top {
            color: #FFFFFF;
        }

        td.pnr-code,
        .booking-index-index .col-main #checkoutSteps li h3.ref-num,
        .checkout-onepage-success .confirmation .confirmation-info h3.ref-num .pnr-code,
        body.checkout-onepage-success .confirmation.confirmation-hotel .order-number .bold {
            color: #00A4A4;
        }

        body.checkout-onepage-success .confirmation.confirmation-hotel .line .check-icon path:last-child {
            fill: #00A4A4;
        }

        body.checkout-onepage-success .confirmation .confirmation-info .order-number .bold {
            color: #00A4A4;
        }

        body.checkout-onepage-success .confirmation .confirmation-info-detail .confirmation-header h1,
        .checkout-onepage-success .col-main #checkoutSteps li .step-title.summary-booking .title-group,
        .checkout-onepage-success .col-main #checkoutSteps li .step-title.summary-booking .ref-num,
        body.checkout-onepage-success .col-main #checkoutSteps li .step-content .panel .panel-heading.directions-title h4,
        body.checkout-onepage-success .col-main #checkoutSteps li .step-content .panel.payment div,
        .checkout-onepage-success .col-main #checkoutSteps li .step-title.payment h2,
        body.checkout-onepage-success .confirmation .contact-wrapper h2,
        body.checkout-onepage-success .confirmation .contact-wrapper h3,
        body.checkout-onepage-success .view-ndc-order .view-ndc-order-wrapper .view-ndc-order-section .ndc-section-title-wrapper .ndc-section-title-info span,
        body.checkout-onepage-success .view-ndc-order .view-ndc-order-wrapper .view-ndc-order-section.ndc-section-hotel-summary .ndc-section-content .hotel-summary-view-wrapper .hotel-view .hotel-info .hotel-address-link .link-wrapper {
            color: #00A4A4;
        }

        span.pnr-code,
        .checkout-onepage-success .print-buttons a span,
        body.checkout-onepage-success .confirmation .confirmation-info h3.ref-num {
            color: #00A4A4;
        }

        body.checkout-onepage-success .confirmation .confirmation-info .line .check-icon path:last-child,
        body.checkout-onepage-success .confirmation .opc .panel-default>.panel-heading h4 svg path:nth-child(2) {
            fill: #00A4A4;
        }

        body.checkout-onepage-success .confirmation .confirmation-info .line .ndc-check-icon {
            background-color: #00A4A4;
        }

        #top-hotels .hotel-item .address,
        #top-hotels .hotel-item .links .link,
        #top-hotels .hotel-item .links .link a,
        #top-hotels .hotel-item .links .link a:hover,
        #top-hotels .hotel-item .links .separator,
        #top-hotels .hotel-item .rating label {
            color: #00A4A4;
        }

        #change-name .modal-content .modal-header,
        #cancel-passenger .modal-content .modal-header,
        #change-date .modal-content .modal-header,
        #cancel-segment .modal-content .modal-header,
        #cancel-popup .modal-content .modal-header,
        #refund-request-modal .modal-content .modal-header,
        #update-doc .modal-content .modal-header,
        #change-name .modal-content .modal-footer,
        #cancel-passenger .modal-content .modal-footer,
        #change-date .modal-content .modal-footer,
        #cancel-segment .modal-content .modal-footer,
        #refund-request-modal .modal-content .modal-footer,
        #cancel-popup .modal-content .modal-footer,
        #update-doc .modal-content .modal-footer {
            border-color: #BDE0E5;
        }

        #change-name .modal-content .modal-footer button.btn-default,
        #cancel-passenger .modal-content .modal-footer button.btn-default,
        #change-date .modal-content .modal-footer button.btn-default,
        #cancel-segment .modal-content .modal-footer button.btn-default,
        #cancel-popup .modal-content .modal-footer button.btn-default,
        #save-for-later-popup .modal-content .modal-footer button.btn-default,
        #update-doc .modal-content .modal-footer button.btn-default,
        .modal-submit-btn #submit-modal-close {
            background-color: #FF0000;
        }

        .customer-refund-tracking.customer-account .main-container #search-result .result-request,
        .customer-refund-tracking.customer-account .main-container #search-result .result-request .pnr-code,
        .customer-refund-tracking.customer-account .main-container #search-result .result-request .request-data,
        .customer-refund-tracking.customer-account .main-container #search-result .result-cancel-detail .flight-information,
        .customer-refund-tracking.customer-account .main-container #search-result .result-content,
        .customer-refund-tracking.customer-account .main-container #search-result .result-cancel-detail .passengers .wrap {
            border-color: #00A4A4;
        }

        .customer-refund-tracking.customer-account .main-container #search-result .result-cancel-detail h3,
        .customer-refund-tracking.customer-account .main-container #search-result .result-content h3 {
            color: #00A4A4;
        }

        .booking-index-index .col-main .steps-container {
            background: FFFFFF;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li span {
            background: #CFCFCF;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li span,
        .booking-index-index .col-main .page-steps #page-header-steps li.complete.skipped span {
            color: #FFFFFF;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li.complete span,
        .booking-index-index .col-main .page-steps #page-header-steps li.active span {
            color: #00A4A4;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li,
        .booking-index-index .col-main .page-steps #page-header-steps li.skipped.complete {
            color: #707070;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li.active,
        .booking-index-index .col-main .page-steps #page-header-steps li.complete {
            color: #000000;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li::after {
            background: none #CFCFCF;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li.complete span,
        .booking-index-index .col-main .page-steps #page-header-steps li.complete::after {
            background-color: #1B495A !important;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li.skipped.complete span {
            background-color: #CFCFCF !important;
        }

        .booking-index-index .col-main .page-steps #page-header-steps li.active span,
        .hotels-index-index .col-main .page-steps #page-header-steps li.active span,
        .hotels-flight-index .col-main .page-steps #page-header-steps li.active span {
            background-color: #1B495A !important;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .form-list input.input-text,
        .account-reset-password ul.form-list li .input-box input,
        .account-login ul.form-list li .input-box input {
            border-color: #BDE0E5;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .form-list input.input-text:focus {
            border-color: #00A4A4 !important;
        }

        #step-passengers .login-types-wrapper .login-type-item .content .form-list input.input-text:focus,
        .account-reset-password ul.form-list li .input-box input:focus,
        .account-login ul.form-list li .input-box input:focus {
            border-color: #00A4A4;
        }

        .account-login ul.form-list li input:focus+i.mobile {
            color: #00A4A4;
        }

        .account-login ul.form-list li input::placeholder,
        .account-login ul.form-list li input::-webkit-input-placeholder {
            color: #BDE0E5;
        }

        #collapse-payment #form-checkout dt input[type="radio"]:checked+label .check-pay path:last-child,
        #collapse-payment #form-checkout dd input[type="radio"]:checked+label .check-pay path:last-child {
            fill: #00A4A4;
        }

        .flight-service-page .primary-color {
            color: #00A4A4 !important;
        }

        .flight-service-page .primary-border-color {
            border-color: #00A4A4;
        }

        .flight-service-page .primary-border-active-color.active {
            border-color: #00A4A4;
        }

        .flight-service-page .primary-bg-color {
            background-color: #00A4A4;
        }

        .flight-service-page .sidebar .links a.active {
            border-color: #00A4A4;
        }

        .flight-service-page .sidebar .links a:not(.active):hover,
        .flight-service-page .main.container .inner-container .content .table-tickets .table-title {
            color: #00A4A4;
        }

        .flight-service-page .main.container .inner-container .content .searchBar .btn-ticket-verification {
            background-color: #00A4A4;
        }

        .customer-account-login .main .page-title h1,
        .customer-account-create .main .page-title h1,
        .customer-account-login .main .page-title h3,
        .customer-account-create .main .page-title h3 {
            color: #FFFFFF;
        }

        .my-interests-widget .miw-checkboxes .miwc-item .item-checkbox input:checked+.item-fake-checkbox,
        .inflight-preferences-widget .ipw-checkboxes .ipw-item .item-label input:checked+.item-text {
            border-color: #00A4A4;
            background-color: #00A4A4;
        }

        #stepchangeloader {
            background: #FFFFFF;
            color: #000000;
        }

        @media screen and (max-width: 900px) {
            .customer-account .main-container .page-title {
                background: #1D4D64;
            }

            #top .header-menu-flex {
                background: linear-gradient(to right, #ffffff, #ffffff);
            }

            .customer-account .detail-table .already-ordered,
            .customer-account .detail-table .services-request.mobile th {
                border-color: #1D4D64;
            }

            .customer-account .detail-table .table-row.desktop i.mobile:not([data-ticket=""]),
            .customer-account .detail-table .services-request.mobile i {
                color: #1D4D64;
            }

            #my-orders-table.current-booking-table tr.view-order-table-row div.icon-wrapper-mobile svg {
                fill: #1D4D64;
            }

            #my-orders-table tbody td,
            .customer-account .main-container table tbody tr {
                border-color: #CFCFCF !important;
            }

            .customer-account .sidebar .block-account {
                border-color: #00A4A4;
            }

            #nav-menu-link.open i.close-slider,
            #mobile-settings-wrapper span.label.dropdown-icon.flag:after,
            #settings-mobile-popup-content span.label.dropdown-icon.flag:after,
            #settings-mobile-popup-content .dropdown a.dropdown-heading span.caret::before,
            #mobile-settings-wrapper #currency-switcher-wrapper-mobile .currency-switcher.dropdown span.value::before,
            #mobile-settings-wrapper #currency-switcher-wrapper-mobile-modal .currency-switcher.dropdown span.value::before,
            #settings-mobile-popup-content #currency-switcher-wrapper-mobile .currency-switcher.dropdown span.value::before,
            #settings-mobile-popup-content #currency-switcher-wrapper-mobile-modal .currency-switcher.dropdown span.value::before,
            #mobile-right-drawer .fa-sign-out.close-right-slider,
            #mobile-right-drawer ul.dropdown-content.left-hand.currency-switcher li a::before,
            #mobile-right-drawer ul.dropdown-content.left-hand.currency-switcher li.current::before,
            #mobile-settings-wrapper #lang-switcher-wrapper-mobile>div::after,
            #mobile-settings-wrapper #currency-switcher-wrapper-mobile>div::after {
                color: #00A4A4;
            }

            .header-container .links>li>a {
                color: inherit;
            }

            #account-wrapper-mobile ul.links.dropdown-content li.last,
            #live-chat-mobile-wrapper .chat-block {
                background: #00A4A4;
            }

            #settingsModal .modal-dialog .modal-content {
                border-color: #00A4A4;
            }
        }
    </style>


    <div id="root-wrapper">
        <div class="wrapper">
            <noscript>
                <div class="global-site-notice noscript">
                    <div class="notice-inner">
                        <p>
                            <strong>Puede que JavaScript esté deshabilitado en tu navegador.</strong><br />
                            Tiene que activar el JavaScript del navegador para utilizar las funciones de este sitio web.
                        </p>
                    </div>
                </div>
            </noscript>
            <div class="page">


                <div id="top" class=" ">
                    <div class="header-container header-regular">
                        <div class="header-container2">
                            <div class="header-container3">
                                <div class="header-top-container">
                                    <div class="right-column">
                                        <div class="left-wrapper">
                                        </div>
                                        <div class="right-wrapper">


                                            <div id="lang-switcher-wrapper-regular" class="item item-right">
                                                <div class="lang-switcher dropdown">
                                                    <a href="#" class="dropdown-heading cover">
                                                        <span>
                                                            <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                            <span class="value">español</span>
                                                            <span class="caret">&nbsp;</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="currency-switcher-wrapper-regular" class="item item-right">
                                                <div class="currency-switcher dropdown">
                                                    <a href="#" class="dropdown-heading cover">
                                                        <span>
                                                            <span class="label hide-below-768">Divisa:</span>
                                                            <span class="value USD">USD</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <i id="mobile-settings-button" data-toggle="modal" data-target="#settingsModal"></i>

                                            <!-- Modal -->
                                            <div class="modal fade mobile" id="settingsModal" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body" id="settings-mobile-popup-content">
                                                            <div id="lang-switcher-wrapper-mobile-modal" class="">
                                                                <div class="lang-switcher dropdown">
                                                                    <a href="#" class="dropdown-heading cover">
                                                                        <span>
                                                                            <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                                            <span class="value">español</span>
                                                                            <span class="caret">&nbsp;</span>
                                                                        </span>
                                                                    </a>

                                                                </div>
                                                            </div>

                                                            <div id="currency-switcher-wrapper-mobile-modal" class="">

                                                                <div class="currency-switcher dropdown">
                                                                    <a href="#" class="dropdown-heading cover">
                                                                        <span>
                                                                            <span class="label hide-below-768">Divisa:</span>
                                                                            <span class="value USD">USD</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </div>
                                    </div><!-- end: right column -->
                                    <div class="inner-container header-menu-flex">

                                        <!-- Left column -->
                                        <div class="hp-block left-column grid12-4">
                                            <div class="item">
                                                <div class="logo-wrapper logo-wrapper--regular">
                                                    <a class="logo logo--regular" href="#" title="Magento Commerce">
                                                        <strong>Magento Commerce</strong>
                                                        <img src="./Current booking_files/8wlogo.jpeg" alt="Magento Commerce" class="large">
                                                        <img src="./Current booking_files/8wlogo.jpeg" alt="Magento Commerce" class="small">
                                                    </a>
                                                </div>
                                            </div>
                                        </div> <!-- end: left column -->


                                        <!-- Right column -->
                                        <div class="hp-block right-column grid12-8">
                                            <div class="item">
                                                <div id="user-menu-wrapper-regular">
                                                    <div id="user-menu" class="user-menu">











                                                        <div id="account-links-wrapper-regular">
                                                            <div id="header-account" class="top-links dropdown links-wrapper-separators-left skip-content skip-content--style">
                                                                <a href="#" class="dropdown-heading cover ">
                                                                    <i class="fas fa-user-circle"></i>
                                                                </a>
                                                                <ul class="links">
                                                                    <li class="first"><a href="#" title="Mi cuenta">Mrs VICTORIA MILIAN CALVO</a></li>
                                                                    <li class=" last"><a href="#" title="Cerrar sesión">Cerrar sesión</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>



                                                    </div> <!-- end: user-menu -->
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div id="header-nav" class="nav-container skip-content">
                                                    <div class="nav container clearer simple">
                                                        <div class="inner-container skip-padding">




                                                            <div class="mobnav-trigger-wrapper clearer" style="display: none;">


                                                                <a class="mobnav-trigger" href="#">
                                                                    <span class="trigger-icon"><span class="line"></span><span class="line"></span><span class="line"></span></span>
                                                                    <span>Menú</span>
                                                                </a>

                                                            </div>




                                                            <ul id="nav" class="nav-regular opt-fx-fade-inout opt-sb0">

                                                                <li id="nav-holder1" class="nav-item level0 level-top nav-holder booking"></li>
                                                                <li id="nav-holder2" class="nav-item level0 level-top nav-holder booking"></li>
                                                                <li id="nav-holder3" class="nav-item level0 level-top nav-holder booking"></li>

                                                                <li class="nav-item nav-item--home level0 level-top booking">
                                                                    <a class="level-top" href="#"><span class="ic ic-home"></span></a>
                                                                </li>


                                                                <li class="nav-item level0 level-top booking">
                                                                    <a class="level-top" href="#">
                                                                        <span>
                                                                            Reserva</span>
                                                                        
                                                                    </a>
                                                                </li>

                                                                <li class="nav-item level0 nav-1 level-top first last classic booking"><a href="#" class="level-top"><span>Contáctenos</span></a></li>


                                                                <div class="nav-border-bottom">
                                                                    <div>Ajustes</div>
                                                                </div>
                                                                <div id="mobile-settings-wrapper">
                                                                    <div id="lang-switcher-wrapper-mobile">
                                                                        <div class="lang-switcher dropdown">
                                                                            <a href="#" class="dropdown-heading cover">
                                                                                <span>
                                                                                    <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                                                    <span class="value">español</span>
                                                                                    <span class="caret">&nbsp;</span>
                                                                                </span>
                                                                            </a>
                                                                            <ul class="dropdown-content left-hand">
                                                                                <li><a href="https://ecom-flyallways.worldticket.net/sales/order/view/?___store=en&amp;___from_store=es"><span class="label dropdown-icon" style="background-image:url(https://ecom-flyallways.worldticket.net/skin/frontend/worldticket/default-old/images/flags/en.png);">&nbsp;</span>inglés</a></li>
                                                                                <li><a href="https://ecom-flyallways.worldticket.net/sales/order/view/?___store=pt&amp;___from_store=es"><span class="label dropdown-icon" style="background-image:url(https://ecom-flyallways.worldticket.net/skin/frontend/worldticket/default-old/images/flags/pt.png);">&nbsp;</span>portugués</a></li>
                                                                                <li class="current item-active"><span class="label dropdown-icon" style="background-image:url(https://ecom-flyallways.worldticket.net/skin/frontend/worldticket/default-old/images/flags/es.png);">&nbsp;</span>español</li>
                                                                                <li><a href="https://ecom-flyallways.worldticket.net/sales/order/view/?___store=nl&amp;___from_store=es"><span class="label dropdown-icon" style="background-image:url(https://ecom-flyallways.worldticket.net/skin/frontend/worldticket/flyallways/images/flags/nl.png);">&nbsp;</span>holandés</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div id="currency-switcher-wrapper-mobile">

                                                                        <div class="currency-switcher dropdown">
                                                                            <a href="#" class="dropdown-heading cover">
                                                                                <span>
                                                                                    <span class="label hide-below-768">Divisa:</span>
                                                                                    <span class="value USD">USD</span>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="nav-border-bottom account">
                                                                    <div>Cuenta</div>
                                                                </div>
                                                                <div id="account-wrapper-mobile"></div>
                                                            </ul>
                                                            <div id="mobile-right-drawer">
                                                                <i class="fal fa-sign-out close-right-slider"></i>
                                                            </div>

                                                            <script type="text/javascript">
                                                                //<![CDATA[


                                                                var MegaMenu = {

                                                                    mobileMenuThreshold: 900,
                                                                    bar: jQuery('#nav'),
                                                                    panels: null,
                                                                    mobnavTriggerWrapper: null,
                                                                    itemSelector: 'li',
                                                                    panelSelector: '.nav-panel',
                                                                    openerSelector: '.level-top, .opener',
                                                                    isTouchDevice: ('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0),
                                                                    ddDelayIn: 10,
                                                                    ddDelayOut: 10,
                                                                    ddAnimationDurationIn: 50,
                                                                    ddAnimationDurationOut: 200

                                                                        ,
                                                                    init: function() {
                                                                            MegaMenu.panels = MegaMenu.bar.find(MegaMenu.panelSelector);
                                                                            MegaMenu.mobnavTriggerWrapper = jQuery('.mobnav-trigger-wrapper');
                                                                        }

                                                                        ,
                                                                    initDualMode: function() {
                                                                            MegaMenu.init();

                                                                            if (jQuery('#nav-holders-wrapper-mobile').length) {
                                                                                MegaMenu.hookToModeChange(); //Hook to events only if necessary (if holders wrapper exists)
                                                                            }

                                                                            MegaMenu.bar.accordion(MegaMenu.panelSelector, MegaMenu.openerSelector, MegaMenu.itemSelector);
                                                                            if (jQuery(window).width() >= MegaMenu.mobileMenuThreshold) {
                                                                                MegaMenu.cleanUpAfterMobileMenu(); //Required for IE8
                                                                            }

                                                                            enquire
                                                                                .register('screen and (max-width: ' + (MegaMenu.mobileMenuThreshold - 1) + 'px)', {
                                                                                    match: MegaMenu.activateMobileMenu,
                                                                                    unmatch: MegaMenu.cleanUpAfterMobileMenu
                                                                                })
                                                                                .register('screen and (min-width: ' + MegaMenu.mobileMenuThreshold + 'px)', {
                                                                                    deferSetup: true,
                                                                                    setup: MegaMenu.cleanUpAfterMobileMenu,
                                                                                    match: MegaMenu.activateRegularMenu,
                                                                                    unmatch: MegaMenu.prepareMobileMenu
                                                                                });
                                                                        }

                                                                        ,
                                                                    initMobileMode: function() {
                                                                            MegaMenu.init();
                                                                            MegaMenu.bar.accordion(MegaMenu.panelSelector, MegaMenu.openerSelector, MegaMenu.itemSelector);
                                                                            MegaMenu.activateMobileMenu();
                                                                        }

                                                                        ,
                                                                    activateMobileMenu: function() {
                                                                            MegaMenu.mobnavTriggerWrapper.show();
                                                                            MegaMenu.bar.addClass('nav-mobile acco').removeClass('nav-regular');

                                                                            jQuery(document).trigger("activate-mobile-menu"); ///
                                                                        }

                                                                        ,
                                                                    activateRegularMenu: function() //Default state
                                                                    {
                                                                        MegaMenu.bar.addClass('nav-regular').removeClass('nav-mobile acco');
                                                                        MegaMenu.mobnavTriggerWrapper.hide();

                                                                        jQuery(document).trigger("activate-regular-menu"); ///
                                                                    }

                                                                    ,
                                                                    cleanUpAfterMobileMenu: function() {
                                                                            MegaMenu.panels.css('display', '');
                                                                        }

                                                                        ,
                                                                    prepareMobileMenu: function() {
                                                                            MegaMenu.panels.hide();

                                                                            MegaMenu.bar.find('.item-active').each(function() {
                                                                                jQuery(this).children('.nav-panel').show();
                                                                            });
                                                                        }

                                                                        ,
                                                                    hookToModeChange: function() {
                                                                        //Move holders to temporary container
                                                                        jQuery(document).on('activate-mobile-menu', function(e, data) {

                                                                            //Important: move in inverted order
                                                                            jQuery('#nav-holders-wrapper-mobile').prepend(jQuery('#nav-holder1, #nav-holder2, #nav-holder3'));

                                                                        }); //end: on event

                                                                        //Move holders back to the menu bar
                                                                        jQuery(document).on('activate-regular-menu', function(e, data) {

                                                                            //Move holders back to the menu only if holders are NOT in the menu yet.
                                                                            //Important: needed on initialization of the menu in regular mode.
                                                                            if (jQuery('#nav-holder1').parent().is('#nav') === false) {
                                                                                //Important: move in inverted order
                                                                                jQuery('#nav').prepend(jQuery('#nav-holder1, #nav-holder2, #nav-holder3'));
                                                                            }

                                                                        }); //end: on event
                                                                    }

                                                                }; //end: MegaMenu




                                                                MegaMenu.initDualMode();

                                                                //Toggle mobile menu
                                                                jQuery('a.mobnav-trigger').on('click', function(e) {
                                                                    e.preventDefault();
                                                                    if (jQuery(this).hasClass('active')) {
                                                                        MegaMenu.bar.removeClass('show');
                                                                        jQuery(this).removeClass('active');
                                                                    } else {
                                                                        MegaMenu.bar.addClass('show');
                                                                        jQuery(this).addClass('active');
                                                                    }
                                                                });





                                                                jQuery(function($) {

                                                                    var menubar = MegaMenu.bar;

                                                                    menubar.on('click', '.no-click', function(e) {
                                                                        e.preventDefault();
                                                                    });

                                                                    menubar.on('mouseenter', 'li.parent.level0', function() {

                                                                        if (false === menubar.hasClass('nav-mobile')) {
                                                                            var item = $(this);
                                                                            var dd = item.children('.nav-panel');

                                                                            var itemPos = item.position();
                                                                            var ddPos = {
                                                                                left: itemPos.left,
                                                                                top: itemPos.top + item.height()
                                                                            };
                                                                            if (dd.hasClass('full-width')) {
                                                                                ddPos.left = 0;
                                                                            }

                                                                            dd.removeClass('tmp-full-width');

                                                                            var ddConOffset = 0;
                                                                            var outermostCon = menubar;

                                                                            var outermostContainerWidth = outermostCon.width();
                                                                            var ddOffset = ddConOffset + ddPos.left;
                                                                            var ddWidth = dd.outerWidth();

                                                                            if ((ddOffset + ddWidth) > outermostContainerWidth) {
                                                                                var diff = (ddOffset + ddWidth) - outermostContainerWidth;
                                                                                var ddPosLeft_NEW = ddPos.left - diff;

                                                                                var ddOffset_NEW = ddOffset - diff;

                                                                                if (ddOffset_NEW < 0) {
                                                                                    dd.addClass('tmp-full-width');
                                                                                    ddPos.left = 0;
                                                                                } else {
                                                                                    ddPos.left = ddPosLeft_NEW;
                                                                                }
                                                                            }

                                                                            dd
                                                                                .css({
                                                                                    'left': ddPos.left + 'px',
                                                                                    'top': ddPos.top + 'px'
                                                                                })
                                                                                .stop(true, true).delay(MegaMenu.ddDelayIn).fadeIn(MegaMenu.ddAnimationDurationIn, "easeOutCubic");
                                                                        }

                                                                    }).on('mouseleave', 'li.parent.level0', function() {

                                                                        if (false === menubar.hasClass('nav-mobile')) {
                                                                            $(this).children(".nav-panel")
                                                                                .stop(true, true).delay(MegaMenu.ddDelayOut).fadeOut(MegaMenu.ddAnimationDurationOut, "easeInCubic");
                                                                        }

                                                                    }); //end: menu top-level dropdowns

                                                                }); //end: on document ready

                                                                jQuery(window).on("load", function() {

                                                                    var menubar = MegaMenu.bar;

                                                                    if (MegaMenu.isTouchDevice) {
                                                                        menubar.on('click', 'a', function(e) {

                                                                            link = jQuery(this);
                                                                            if (!menubar.hasClass('nav-mobile') && link.parent().hasClass('nav-item--parent')) {
                                                                                if (!link.hasClass('ready')) {
                                                                                    e.preventDefault();
                                                                                    menubar.find('.ready').removeClass('ready');
                                                                                    link.parents('li').children('a').addClass('ready');
                                                                                }
                                                                            }

                                                                        }); //end: on click
                                                                    } //end: if isTouchDevice

                                                                }); //end: on load




                                                                //]]>
                                                            </script>

                                                        </div> <!-- end: inner-container -->
                                                    </div> <!-- end: nav -->
                                                </div> <!-- end: nav-container -->
                                            </div>
                                        </div> <!-- end: right column -->
                                    </div> <!-- end: header-primary-container -->

                                    <div id="nav-menu-link">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <i class="fal fa-sign-out close-slider"></i>
                                    </div>


                                </div> <!-- end: header-container3 -->
                            </div> <!-- end: header-container2 -->
                        </div> <!-- end: header-container -->
                    </div>





                    <script>
                        window.isRecaptchaV3Enabled = 0;
                        window.recaptchaV3Key = '';
                    </script>


                    <script type="text/javascript">
                        Translator.add('seatselect', 'seleccionar asiento');
                        Translator.add('Please enter %s or less characters', 'Please enter %s or less characters');
                        Translator.add('flights', 'vuelos');
                        Translator.add('passengers', 'pasajeros');
                        Translator.add('packages', 'paquetes');
                        Translator.add('cancel', 'cancel');
                        Translator.add('refund', 'reembolso');
                        Translator.add('extra services', 'Servicios extra');
                        Translator.add('extras', 'extras');
                        Translator.add('seat', 'asiento');
                        Translator.add('changedate', 'fecha de cambio');
                        Translator.add('checkout', 'Pagar');
                        Translator.add('Maximum allowed amount of passengers for reservation is ', 'La cantidad máxima permitida de pasajeros para la reserva es');
                        Translator.add('week', 'semana');
                        Translator.add('weeks', 'weeks');
                        Translator.add('day', 'día');
                        Translator.add('days', 'días');
                        Translator.add('Please select the city you want to travel from first', 'Seleccione la ciudad desde la que desea viajar primero');
                        Translator.add('Please select the city you want to travel to first', 'Seleccione la ciudad a la que desea viajar primero');
                        Translator.add('From', 'Desde');
                        Translator.add('To', 'Para');
                        Translator.add('No cities match your search.', 'Ninguna ciudad coincide con su búsqueda.');
                        Translator.add('Su', 'dom');
                        Translator.add('Mo', 'lun');
                        Translator.add('Tu', 'mar');
                        Translator.add('We', 'mié');
                        Translator.add('Th', 'jue');
                        Translator.add('Fr', 'vie');
                        Translator.add('Sa', 'sáb');
                        Translator.add('Sun', 'dom');
                        Translator.add('Mon', 'lun');
                        Translator.add('Tue', 'mar');
                        Translator.add('Wed', 'mié');
                        Translator.add('Thu', 'jue');
                        Translator.add('Fri', 'vie');
                        Translator.add('Sat', 'sáb');
                        Translator.add('from:', 'desde:');
                        Translator.add('No flights were found', 'No se encontraron vuelos');
                        Translator.add('An SMS error was encountered while processing your request. Please try again later.', 'Se encontró un error de SMS al procesar su solicitud. Por favor, inténtelo de nuevo más tarde.');
                        Translator.add('Inbound', 'Vuelta');
                        Translator.add('Outbound', 'Ida');
                        Translator.add('Please choose flight', 'Por favor elige vuelo');
                        Translator.add('Please choose inbound and outbound flights', 'Elija vuelos entrantes y salientes');
                        Translator.add('Maximum age for infant - ', 'Edad máxima para infante -');
                        Translator.add('Child age should be from ', 'La edad del niño debe ser de');
                        Translator.add('Minimum age for adult - ', 'Edad mínima para adulto -');
                        Translator.add(' years.', 'años.');
                        Translator.add(' to', 'a');
                        Translator.add('Status: ', 'Status: ');
                        Translator.add('Error was encountered while processing your request.  Step is ', 'Se encontró un error al procesar su solicitud. el paso es');
                        Translator.add('This item is not available for selected passengers age type', 'Este artículo no está disponible para el tipo de edad de los pasajeros seleccionados');
                        Translator.add('Your reference number  - ', 'Your reference number  - ');
                        Translator.add('hrs', 'horas');
                        Translator.add('mins', 'minutos');
                        Translator.add('secs', 'segundos');
                        Translator.add('Your booking is expired', 'Su reserva ha caducado');
                        Translator.add('inbound', 'Vuelta');
                        Translator.add('outbound', 'Ida');
                        Translator.add('flight', 'flight');
                        Translator.add('Infants should be linked to different adults', 'Los bebés deben estar vinculados a diferentes adultos.');
                        Translator.add('Please read and accept Terms & Conditions', 'Por favor lea y acepte Términos y Condiciones');
                        Translator.add('Monday', 'lunes');
                        Translator.add('Tuesday', 'martes');
                        Translator.add('Wednesday', 'miércoles');
                        Translator.add('Thursday', 'jueves');
                        Translator.add('Friday', 'viernes');
                        Translator.add('Saturday', 'sábado');
                        Translator.add('Sunday', 'domingo');
                        Translator.add('January', 'enero');
                        Translator.add('February', 'febrero');
                        Translator.add('March', 'marzo');
                        Translator.add('April', 'abril');
                        Translator.add('May', 'Mayo');
                        Translator.add('June', 'junio');
                        Translator.add('July', 'julio');
                        Translator.add('August', 'agosto');
                        Translator.add('September', 'septiembre');
                        Translator.add('October', 'octubre');
                        Translator.add('November', 'noviembre');
                        Translator.add('December', 'diciembre');
                        Translator.add('Mar', 'mar');
                        Translator.add('Jan', 'Jan');
                        Translator.add('Feb', 'Feb');
                        Translator.add('Apr', 'Apr');
                        Translator.add('Jun', 'Jun');
                        Translator.add('Jul', 'Jul');
                        Translator.add('Aug', 'Aug');
                        Translator.add('Sep', 'Sep');
                        Translator.add('Oct', 'oct');
                        Translator.add('Nov', 'Nov');
                        Translator.add('Dec', 'dic');
                        Translator.add('Please choose outbound flight first', 'Elija primero el vuelo de ida');
                        Translator.add('There might be a problem with your booking, please try again in few minutes', 'There might be a problem with your booking, please try again in few minutes');
                        Translator.add('There was error. Please, try to search again.', 'Hubo un error. Por favor, intente buscar de nuevo.');
                        Translator.add('+/-', '+/-');
                        Translator.add('Exact', 'Exacto');
                        Translator.add('Infant', 'Infantil');
                        Translator.add('Infants', 'Infantes');
                        Translator.add('Inbound flight should be later than Outbound', 'El vuelo de entrada debe ser posterior al de salida');
                        Translator.add('Children and infants are not allowed for reservation with this passenger type. Please select adults only or change passenger type to regular', 'No se permiten niños ni bebés para reservar con este tipo de pasajero. Seleccione solo adultos o cambie el tipo de pasajero a regular');
                        Translator.add('Economy', 'Economía');
                        Translator.add('Full FLEX', 'Flexión completa');
                        Translator.add('Senior', 'Mayor');
                        Translator.add('Ungdom/Student', 'Ungdom/Student');
                        Translator.add('Student', 'Estudiante');
                        Translator.add('Kampagne', 'Kampagne');
                        Translator.add('Campaign', 'Campaña');
                        Translator.add('Please select at least one product to continue to check-out page', 'Seleccione al menos un producto para continuar con la página de pago');
                        Translator.add('You have selected the same flight and fare which you have in your original reservation. Please choose a new fare / flight and try again.', 'Ha seleccionado el mismo vuelo y tarifa que tenía en su reserva original. Elija una nueva tarifa/vuelo y vuelva a intentarlo.');
                        Translator.add('Passenger', 'Pasajero');
                        Translator.add('adult', 'Adulto');
                        Translator.add('child', 'child');
                        Translator.add('infant', 'infant');
                        Translator.add('Show search bar', 'Show search bar');
                        Translator.add('Hide search bar', 'Hide search bar');
                        Translator.add('Back To Manage My Booking', 'Back To Manage My Booking');
                        Translator.add('Please use only latin letters (a-z or A-Z) in this field.', 'Utilice solo letras latinas (az o AZ) en este campo.');
                        Translator.add('Exact day', 'exact day');
                        Translator.add('+/- 1 day', '+/- 1 day');
                        Translator.add('+/- 2 days', '+/- 2 days');
                        Translator.add('+/- 3 days', '+/- 3 days');
                        Translator.add('exact week', 'exact week');
                        Translator.add('+/- 1 week', '+/- 1 week');
                        Translator.add('+/- 2 weeks', '+/- 2 weeks');
                        Translator.add('+/- 3 weeks', '+/- 3 weeks');
                        Translator.add('Selected', 'Seleccionado');
                        Translator.add('Fare description', 'Descripción de la tarifa');
                        Translator.add("Enter passenger's details", "Ingrese los datos del pasajero");
                        Translator.add('Select flights', 'Seleccionar vuelos');
                        Translator.add('Select hotel', 'Select hotel');
                        Translator.add('Pre-select seat', 'Preseleccionar asiento');
                        Translator.add('Pre-book extras', 'Extras de reserva anticipada');
                        Translator.add('Step hotels', 'Step hotels');
                        Translator.add('Review details and pay', 'Revisa los detalles y paga');
                        Translator.add('Start over', 'Comenzar de nuevo');
                        Translator.add('Passengers', 'Pasajeros');
                        Translator.add('0', '0');
                        Translator.add('1', '1');
                        Translator.add('2', '2');
                        Translator.add('3', '3');
                        Translator.add('4', '4');
                        Translator.add('5', '5');
                        Translator.add('6', '6');
                        Translator.add('7', '7');
                        Translator.add('8', '8');
                        Translator.add('9', '9');
                        Translator.add('10', '10');
                        Translator.add('Republic of Crimea', 'Republic of Crimea');
                        Translator.add('H', 'H');
                        Translator.add('M', 'M');
                        Translator.add('Please select one of the above options.', 'Seleccione una de las opciones anteriores.');
                        Translator.add('Please enter a valid phone number. Only numbers and spaces are acceptable.', 'Please enter a valid phone number. Only numbers and spaces are acceptable.');
                        Translator.add('Please enter a valid fax number. Only numbers and spaces are acceptable.', 'Please enter a valid fax number. Only numbers and spaces are acceptable.');
                        Translator.add('Please enter a valid phone number.', 'Por favor ingrese un número de teléfono válido.');
                        Translator.add('Please enter a valid record locator. Only alpha-numeric characters are allowed.', 'Please enter a valid record locator. Only alpha-numeric characters are allowed.');
                        Translator.add('Please enter less characters.', 'Please enter less characters.');
                        Translator.add('First/Last Name should not exceed %s characters in total', 'El nombre/apellido no debe exceder %s caracteres en total');
                        Translator.add('Required', 'Requerido');
                        Translator.add('The minimum record locator length is 5', 'The minimum record locator length is 5');
                        Translator.add('Please select an option.', 'Seleccione una opción.');
                        Translator.add('Please enter a valid number in this field.', 'Ingrese un número válido en este campo.');
                        Translator.add('Please enter a valid date.', 'Ingrese una fecha válida.');
                        Translator.add('Please select State/Province.', 'Por favor, selecciona Estado/Provincia.');
                        Translator.add('Please enter a valid zip code.', 'Ingrese un código postal válido.');
                        Translator.add('Please enter a valid email address.', 'Por favor, introduce una dirección de correo electrónico válida.');
                        Translator.add('Please enter a valid email address or ffp number.', 'Please enter a valid email address or ffp number.');
                        Translator.add('Email addresses must match.', 'Los correos electrónicos deben coincidir.');
                        Translator.add('Please, choose correct date', 'Por favor, elige la fecha correcta');
                        Translator.add('hotel', 'hotel');
                        Translator.add('room', 'room');
                        Translator.add('guest and contact', 'guest and contact');
                        Translator.add('Ticket number or name is wrong', 'Ticket number or name is wrong');
                        Translator.add('Please note that any booking must have 1 adult with age over 18 years old', 'Please note that any booking must have 1 adult with age over 18 years old');
                        Translator.add('Please note, for 2 and more passengers different phone numbers need to be inserted', 'Please note, for 2 and more passengers different phone numbers need to be inserted');
                        Translator.add('Top destinations', 'Top destinations');
                        Translator.add('Start in', 'Start in');
                        Translator.add('End in', 'End in');
                        Translator.add('Mr', 'Sr');
                        Translator.add('Mrs', 'Señora');
                        Translator.add('Dr', 'Dr');
                        Translator.add('Please select an option from the list of suggestions', 'Please select an option from the list of suggestions');
                        Translator.add('Please enter a valid flight number', 'Please enter a valid flight number');
                        Translator.add('Minute(s)', 'minutos');
                        Translator.add('Hour(s)', 'horas');
                        Translator.add('Select room', 'Select room');
                        Translator.add('Flight + hotel', 'Flight + hotel');
                        Translator.add('Please use only digital (0-9) in this field.', 'Utilice solo números digitales (0-9) en este campo.');
                        Translator.add('Please use only latin letters (a-z or A-Z) in this field.', 'Utilice solo letras latinas (az o AZ) en este campo.');
                        Translator.add('Wrong number of digits. Try again', 'Wrong number of digits. Try again');
                        Translator.add('A text message with a 6-digit verification code was just sent to ••••••••%s', 'A text message with a 6-digit verification code was just sent to ••••••••%s');
                        Translator.add('Please specify payment method', 'Please specify payment method');
                        Translator.add('Miles', 'Millas');
                        Translator.add('Earn', 'Ganar');
                        Translator.add('Passengerz', 'Pasajeros');
                        Translator.add('Points', 'Points');
                        Translator.add('The product has been added to all segments. If you like, you switch to return flight view and remove it.', 'The product has been added to all segments. If you like, you switch to return flight view and remove it.');
                        Translator.add('Please fill recaptcha to continue', 'Please fill recaptcha to continue');
                    </script>
                </div>
                <div class="main-container col2-left-layout">
                    <div class="main-top-container">
                        <div class="customer-account-bg">
                            <div class="img-box" style="background-image: url(./bg.png)"></div>
                        </div>
                    </div>
                    <div class="main container">
                        <div class="inner-container">
                            <div class="preface"></div>
                            <div class="col-main grid12-9 grid-col2-main no-gutter">

                                <div>
                                    <div class="page-title">
                                        <a href="#">
                                            <h2>
                                                <i class="fas fa-home"></i>
                                                Current booking
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="block current-booking">
                                        <div class="content-wrapper">
                                            <span class="varicoloured-label">Número de reserva</span>
                                            <span class="booking-number-value">
                                            <?= $localizador ?></span>
                                        </div>
                                    </div>
                                    <div class="order-items order-details">
                                        <table id="my-orders-table" class="data-table current-booking-header">
                                            <thead>
                                                <tr>
                                                    <th>Vuelo</th>
                                                    <th><span class="nobr">Fecha de salida</span></th>
                                                    <th><span class="nobr">Fecha de llegada</span></th>
                                                    <th class="departure-th">Salida</th>
                                                    <th>Llegada</th>
                                                    <th>Pasajeros</th>
                                                    <th>Estado</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="data-table current-booking-table " id="my-orders-table">
                                            <tbody>
                                                <tr class="view-order-table-row ">
                                                    <td class="icon-cell">
                                                        <div class="line"></div>
                                                        <div class="icon-wrapper">
                                                            <svg class="icon-to" width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="white"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="#54BD84"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" stroke="#F3F3F3"></path>
                                                            </svg>
                                                            <span>Fly to</span>
                                                        </div>
                                                        <h4 class="direction-outbound">
                                                            <span>8W726</span>
                                                        </h4>
                                                    </td>
                                                    <td class="date-desktop">
                                                        <div class="description-cell">
                                                            <dd class="date-time" data-date="">
                                                            <?= $fecha1 ?> </dd>
                                                            <span class="date-time" data-time="">
                                                            <?= $horas1 ?> </span>
                                                        </div>
                                                    </td>
                                                    <td class="date-desktop">
                                                        <div class="description-cell">
                                                            <dd class="date-time" data-date="">
                                                            <?= $fecha1 ?> </dd>
                                                            <span class="date-time" data-time="">
                                                            <?= $horar1 ?> </span>
                                                        </div>
                                                    </td>
                                                    <td class="departure-desktop">
                                                        <div class="description-cell">
                                                        <?= $origen1 ?> International Airport <span>HAV</span>
                                                        </div>
                                                    </td>
                                                    <td class="arrival-desktop">
                                                        <div class="description-cell">
                                                        <?= $destino1 ?> International Airport <span>GEO</span>
                                                        </div>
                                                    </td>
                                                    <td class="flight-id description-table-mobile">
                                                        <div class="icon-wrapper-mobile">
                                                            <svg width="19" height="20" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="white"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="#54BD84"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" stroke="#F3F3F3"></path>
                                                            </svg>
                                                            <span>Fly to</span>
                                                        </div>
                                                        <span class="bold-text">Vuelo</span>
                                                        <span>
                                                            8W726 </span>
                                                    </td>
                                                    <td class="flight-directions description-table-mobile">
                                                        <span class="bold-text">Destinos</span>
                                                        <span>
                                                        <?= $origen1 ?> International Airport (HAV)  - <?= $destino1 ?> International Airport (GEO)                                                         </span>
                                                    </td>
                                                    <td class="date description-table-mobile">
                                                        <span class="bold-text">Fecha</span>
                                                        <span class="date-time" data-date="">
                                                        <?= $fecha1 ?> </span>
                                                    </td>
                                                    <td class="departure description-table-mobile">
                                                        <span class="bold-text">Salida</span>
                                                        <span class="date-time" data-time="">
                                                        <?= $horas1 ?> </span>
                                                    </td>
                                                    <td class="arrival description-table-mobile">
                                                        <span class="bold-text">Llegada</span>
                                                        <span class="date-time" data-time="">
                                                        <?= $horar1 ?> </span>
                                                    </td>
                                                    <td class="passengers">
                                                        <span class="description-table-mobile bold-text">
                                                            Pasajeros </span>
                                                        <div class="description-cell">
                                                        </div>
                                                    </td>
                                                    <td class="status-desktop">
                                                        <div class="description-cell status">
                                                            <span class="confirmed">Confirmado</span>
                                                        </div>
                                                    </td>
                                                    <td class="modify">
                                                        <span class="nobr">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="detail-table ">
                                            <div class="table-header">
                                                <div class="passenger">Pasajero</div>
                                                <div class="passenger-status">Estado</div>
                                                <div class="ticket-number">Numero de ticket</div>
                                                <div class="coupon-number">número de cupón</div>
                                                <div class="coupon-status">Estado del cupón</div>
                                                <div class="seat">Asientos</div>
                                                <div class="empty"></div>
                                            </div>
                                            <div class="table-body" id="accordion-outbound">
                                                                                                        <a href="#collapse-cell-1-outbound" data-toggle="collapse" data-parent="#accordion-outbound" aria-expanded="false" class="collapsed passenger-link collapse-cell-1-outbound">
                                                            <div class="table-row desktop">
                                                                <div class="table-cell passenger">
                                                                <?= $nombre ?>                                                                </div>
                                                                <div class="table-cell passenger-status">
                                                                    <span class="confirmed">Confirmado</span>
                                                                </div>
                                                                <div class="table-cell ticket-number">
                                                                    6598794985445                                                                </div>
                                                                <div class="table-cell coupon-number">1</div>
                                                                <div class="table-cell coupon-status">Abierto para uso</div>
                                                                <div class="table-cell seat">
                                                                </div>
                                                                <div class="table-cell empty">
                                                                </div>
                                                            </div>
                                                        </a>
                                                                                            </div>
                                        </div>
                                        <table class="data-table current-booking-table " id="my-orders-table">
                                            <tbody>
                                                <tr class="view-order-table-row ">
                                                    <td class="icon-cell">
                                                        <div class="line"></div>
                                                        <div class="icon-wrapper">
                                                            <svg class="icon-back" width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="white"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="#54BD84"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" stroke="#F3F3F3"></path>
                                                            </svg>
                                                            <span>Fly back</span>
                                                        </div>
                                                        <h4 class="direction-inbound">
                                                            <span>8W725</span>
                                                        </h4>
                                                    </td>
                                                    <td class="date-desktop">
                                                        <div class="description-cell">
                                                            <dd class="date-time" data-date="">
                                                            <?= $fecha2 ?> </dd>
                                                            <span class="date-time" data-time="">
                                                            <?= $horas2 ?> </span>
                                                        </div>
                                                    </td>
                                                    <td class="date-desktop">
                                                        <div class="description-cell">
                                                            <dd class="date-time" data-date="">
                                                            <?= $fecha2 ?> </dd>
                                                            <span class="date-time" data-time="">
                                                            <?= $horar2 ?> </span>
                                                        </div>
                                                    </td>
                                                    <td class="departure-desktop">
                                                        <div class="description-cell">
                                                        <?= $origen2 ?> International Airport <span>GEO</span>
                                                        </div>
                                                    </td>
                                                    <td class="arrival-desktop">
                                                        <div class="description-cell">
                                                        <?= $destino2 ?> International Airport <span>HAV</span>
                                                        </div>
                                                    </td>
                                                    <td class="flight-id description-table-mobile">
                                                        <div class="icon-wrapper-mobile">
                                                            <svg width="19" height="20" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="white"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" fill="#54BD84"></path>
                                                                <path d="M30.6403 14.3529H30.6403C32.1203 14.3519 33.4733 14.6601 34.7069 15.2715C35.9167 15.8714 36.4324 16.5477 36.509 17.2543C36.4316 17.9617 35.9148 18.6385 34.7042 19.2398C33.4695 19.8528 32.1161 20.1622 30.636 20.1628H30.6359L25.7029 20.1655L25.4275 20.1657L25.2804 20.3986L17.0617 33.4144L17.0574 33.4212L17.0533 33.4282C17.0274 33.4724 17.007 33.4843 16.9947 33.49C16.9789 33.4973 16.9379 33.511 16.8522 33.5041L13.4336 33.0212L13.418 33.019L13.4041 33.018C13.4029 33.0175 13.4007 33.0166 13.3973 33.0149C13.387 33.0096 13.3651 32.9959 13.3331 32.9641C13.3318 32.9628 13.3306 32.9616 13.3296 32.9606L13.3224 32.9459L13.304 32.9186C13.2784 32.8805 13.2743 32.8593 13.2734 32.8527C13.2727 32.8475 13.2715 32.8354 13.2812 32.8093L13.2873 32.7928L13.2923 32.776L16.807 20.811L16.9954 20.1698L16.327 20.1701L8.3912 20.1744L8.1023 20.1746L7.95815 20.425L5.79599 24.1806L5.79592 24.1806L5.79138 24.1888C5.76206 24.242 5.73206 24.2744 5.62119 24.2797L2.69018 24.2814C2.69012 24.2814 2.69006 24.2814 2.69001 24.2814C2.65048 24.2814 2.61058 24.2721 2.55249 24.2144L2.55248 24.2143L2.54906 24.2109C2.50464 24.1462 2.49342 24.0924 2.4978 24.0352L3.46475 17.344L3.47504 17.2727L3.46482 17.2014L2.50336 10.4983L2.50055 10.4788L2.49622 10.4595C2.49416 10.4504 2.49392 10.4433 2.49743 10.4308C2.50145 10.4165 2.51308 10.3869 2.54635 10.3423C2.56908 10.319 2.61149 10.2901 2.70946 10.2785L5.63971 10.2618C5.64004 10.2618 5.64038 10.2618 5.64071 10.2618C5.67938 10.262 5.71888 10.2712 5.77722 10.3292L5.77798 10.3299C5.78583 10.3377 5.79213 10.3442 5.79707 10.3495L5.80334 10.3604L7.96137 14.1137L8.10564 14.3646L8.39508 14.3645L16.3312 14.3605L16.9982 14.3602L16.8108 13.72L13.3102 1.76321C13.2909 1.69122 13.2973 1.63865 13.3398 1.57245C13.3864 1.51685 13.426 1.5022 13.4888 1.5021C13.4889 1.5021 13.4889 1.5021 13.4889 1.5021L17.3996 1.50009C17.4694 1.50364 17.5017 1.51818 17.5134 1.52489C17.5222 1.52995 17.5345 1.53854 17.5498 1.56762L17.5578 1.58271L17.5668 1.59723L25.3121 14.1186L25.4588 14.3557L25.7376 14.3555L30.6403 14.3529Z" transform="translate(-0.75 -0.75) scale(0.75)" stroke="#F3F3F3"></path>
                                                            </svg>
                                                            <span>Fly back</span>
                                                        </div>
                                                        <span class="bold-text">Vuelo</span>
                                                        <span>8W725</span>
                                                    </td>
                                                    <td class="flight-directions description-table-mobile">
                                                        <span class="bold-text">Destinos</span>
                                                        <span>
                                                        <?= $origen2 ?> International Airport (GEO)  - <?= $destino2 ?> International Airport (HAV)                                                         </span>
                                                    </td>
                                                    <td class="date description-table-mobile">
                                                        <span class="bold-text">Fecha</span>
                                                        <span class="date-time" data-date="">
                                                        <?= $fecha2 ?> </span>
                                                    </td>
                                                    <td class="departure description-table-mobile">
                                                        <span class="bold-text">Salida</span>
                                                        <span class="date-time" data-time="">
                                                        <?= $horas2 ?> </span>
                                                    </td>
                                                    <td class="arrival description-table-mobile">
                                                        <span class="bold-text">Llegada</span>
                                                        <span class="date-time" data-time="">
                                                        <?= $horar2 ?> </span>
                                                    </td>
                                                    <td class="passengers">
                                                        <span class="description-table-mobile bold-text">
                                                            Pasajeros </span>
                                                        <div class="description-cell">
                                                        </div>
                                                    </td>
                                                    <td class="status-desktop">
                                                        <div class="description-cell status">
                                                            <span class="confirmed">Confirmado</span>
                                                        </div>
                                                    </td>
                                                    <td class="modify">
                                                        <span class="nobr">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="detail-table ">
                                            <div class="table-header">
                                                <div class="passenger">Pasajero</div>
                                                <div class="passenger-status">Estado</div>
                                                <div class="ticket-number">Numero de ticket</div>
                                                <div class="coupon-number">número de cupón</div>
                                                <div class="coupon-status">Estado del cupón</div>
                                                <div class="seat">Asientos</div>
                                                <div class="empty"></div>
                                            </div>
                                            <div class="table-body" id="accordion-outbound">
                                                                                                        <a href="#collapse-cell-1-outbound" data-toggle="collapse" data-parent="#accordion-outbound" aria-expanded="false" class="collapsed passenger-link collapse-cell-1-outbound">
                                                            <div class="table-row desktop">
                                                                <div class="table-cell passenger">
                                                                <?= $nombre ?>                                                              </div>
                                                                <div class="table-cell passenger-status">
                                                                    <span class="confirmed">Confirmado</span>
                                                                </div>
                                                                <div class="table-cell ticket-number">
                                                                    3007403699462                                                                </div>
                                                                <div class="table-cell coupon-number">2</div>
                                                                <div class="table-cell coupon-status">Abierto para uso</div>
                                                                <div class="table-cell seat">
                                                                </div>
                                                                <div class="table-cell empty">
                                                                </div>
                                                            </div>
                                                        </a>
                                                                                            </div>
                                        </div>
                                        <div class="modal fade" id="currency-alert" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body clearfix">
                                                        <span>
                                                            Booking currency is not supported, please contact Call Center to arrange reservation amendment </span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="simple-button">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" autocomplete="off">
                                                                Aceptar </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style type="text/css">
                                        .status .confirmed,
                                        .varicoloured-label,
                                        .flights-label::before,
                                        .extras-title>h2::before,
                                        .countdown,
                                        .countdown .valid-booking,
                                        .countdown li,
                                        .countdown li:last-child:before,
                                        .countdown li.countdown-hrs:before,
                                        .countdown li.colon:before,
                                        .countdown .countdown-hrs {
                                            color: #00A4A4 !important;
                                        }

                                        .countdown svg path {
                                            fill: #00A4A4 !important;
                                        }
                                    </style>
                                    <div id="already_extras">
                                        <div class="extras-title">
                                            <h2>Extras ya comprados</h2>
                                        </div>
                                        <ul class="messages">
                                            <li class="notice-msg">
                                                <ul>
                                                    <li><span>Esta reserva no contiene extras</span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <script type="text/javascript">
                                        (function($) {
                                            $(document).ready(function() {
                                                $('.nav-item.level0').removeClass('active').addClass('booking');
                                            });
                                        })(jQuery)
                                    </script>
                                    <div class="manage-booking">
                                        <h4>
                                            Administra tus planes </h4>
                                    </div>
                                    <div class="print-buttons">

                                        <div class="order-icon change-name change-of-plans active">
                                            <i class="far fa-user-edit"></i>
                                            <a data-toggle="modal" data-target="#change-name-call-center" href="#" class="button">
                                                <span>Change name</span>
                                            </a>
                                        </div>


                                        <div class="order-icon cancel-passenger change-of-plans active">
                                            <i class="fal fa-user-times"></i>
                                            <a data-toggle="modal" data-target="#cancel-passenger" href="#" class="button btn-activate-modal"><span>Cancel passenger</span></a>
                                        </div>

                                        <div class="order-icon change-date change-of-plans active">
                                            <i class="fal fa-calendar-edit"></i>
                                            <a data-toggle="modal" data-target="#change-date" href="#" class="button"><span>Change date</span></a>
                                        </div>
                                        <div class="order-icon print-ticket print-block">
                                            <i class="fal fa-ticket-alt"></i>
                                            <a onclick="this.target=&#39;_blank&#39;" class="button" href=""><span>imprimir billete</span></a>
                                        </div>


                                        <div class="order-icon cancel-booking change-of-plans active">
                                            <i class="far fa-ban"></i>
                                            <a data-toggle="modal" data-target="#cancel-popup" href="#" class="button"><span>Cancelar reserva</span></a>
                                        </div>



                                    </div>


                                    <!-- Cancel Modal -->
                                    <div class="modal fade" id="cancel-popup" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close cancel-close-button" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Cancelar reserva</h2>
                                                </div>
                                                <div class="modal-body clearfix">
                                                    <div class="cancel-popup">
                                                        <div class="content" id="cancel-booking-content">
                                                            <p class="indent-top">
                                                                Your order status is draft or pending, you can easily delete/cancel your order by yourself. Haga clic en \"sí\" si desea cancelarlo </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="refund-container">
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-default cancel-close-button" data-dismiss="modal">No</button>
                                                            <button type="button" id="cancel-booking-btn" class="btn btn-checkout button" title="Sí, cancelar">
                                                                <span><span>Sí, cancelar</span></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cancel Flight Segment -->
                                    <div class="modal fade" id="cancel-segment" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Cancelar vuelo</h2>
                                                </div>
                                                <div class="modal-body clearfix">
                                                    <p class="indent-top">
                                                        Your order status is draft or pending, you can easily delete/cancel your flight by yourself. Haga clic en \"sí\" si desea cancelarlo
                                                    </p><p>
                                                    </p><form id="cancel_form">
                                                        <div class="cancel-popup">
                                                            <div class="content">
                                                                <input type="hidden" name="booking_reference_id" class="cancel-checkbox" value="YMSJEW">

                                                                <div class="clearfix">
                                                                    <input type="checkbox" class="cancel-checkbox " id="cancel-segment-outbound" name="cancel-segment-outbound" value="8W726">
                                                                    <label for="cancel-segment-outbound">
                                                                        <div class="modify-checkbox">
                                                                            <i class="fal fa-check"></i>
                                                                        </div>
                                                                        <h3>
                                                                            Ida <ul>
                                                                                <li>
                                                                                    <span>Vuelo</span>
                                                                                    8W726 HAV-GEO 28/10/2022
                                                                                </li>
                                                                            </ul>
                                                                        </h3>
                                                                    </label>
                                                                    
                                                                </div>
                                                                <div class="clearfix">
                                                                    <input type="checkbox" class="cancel-checkbox validate-one-required-new" id="cancel-segment-inbound" name="cancel-segment-inbound" value="8W725">
                                                                    <label for="cancel-segment-inbound">
                                                                        <div class="modify-checkbox">
                                                                            <i class="fal fa-check"></i>
                                                                        </div>
                                                                        <h3>
                                                                            Vuelta <ul>
                                                                                <li>
                                                                                    <span>Vuelo</span>
                                                                                    8W725 GEO-HAV 05/11/2022
                                                                                </li>
                                                                            </ul>
                                                                        </h3>
                                                                    </label>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="refund-container">
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn  btn-checkout button" title="Sí, cancelar" id="cancel-modal">
                                                                    <span><span>Sí, cancelar</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">
                                                        //< ![CDATA[
                                                        var customForm = new VarienForm('cancel_form');
                                                        //]]>
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Сhange name -->
                                    <div class="modal fade" id="change-name" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Change name</h2>
                                                </div>
                                                <div class="modal-body clearfix">
                                                    <form action="#" method="GET" id="ch_name_form">
                                                        <input type="hidden" name="modify" value="changename">
                                                        <div class="cancel-popup">
                                                            <div class="content">

                                                                <div class="clearfix">
                                                                    <input type="checkbox" class="cancel-checkbox " id="change-passenger-0" name="passenger_0" value="0">
                                                                    <label for="change-passenger-0">
                                                                        <div class="modify-checkbox">
                                                                            <i class="fal fa-check"></i>
                                                                        </div>
                                                                        <h3>
                                                                            Sr DANNY VILTRES SOSA </h3>
                                                                    </label>
                                                                </div>

                                                               
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn  btn-checkout button" title="si, cambio" id="cancel-modal">
                                                                    <span><span>si, cambio</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">
                                                        //< ![CDATA[
                                                        var customForm = new VarienForm('ch_name_form');
                                                        //]]>
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update doc -->
                                    <div class="modal fade" id="update-doc" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Update document</h2>
                                                </div>
                                                <div class="modal-body clearfix">
                                                    <form action="#" method="GET" id="update_doc_form">
                                                        <input type="hidden" name="modify" value="updatedoc">
                                                        <div class="cancel-popup">
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <input type="checkbox" class="cancel-checkbox " id="update-doc-pass-0" name="passenger_0" value="0">
                                                                    <label for="update-doc-pass-0">
                                                                        <div class="modify-checkbox">
                                                                            <i class="fal fa-check"></i>
                                                                        </div>
                                                                        <h3>Mr </h3>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn  btn-checkout button" title="si, cambio" id="cancel-modal">
                                                                    <span><span>si, cambio</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">
                                                        //< ![CDATA[
                                                        var customForm = new VarienForm('update_doc_form');
                                                        //]]>
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Change Name Call Center -->
                                    <div class="modal fade" id="change-name-call-center" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Change name</h2>
                                                </div>
                                                <div class="modal-body">
                                                    Please contact Fly Allways to request a name change </div>
                                                <div class="modal-footer">
                                                    <div>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Сancel passenger -->
                                    <div class="modal fade" id="cancel-passenger" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Cancel passenger</h2>
                                                </div>
                                                <div class="modal-body clearfix">
                                                    <form id="cancel_passenger_form">
                                                        <input type="hidden" name="modify" value="cancel_passenger">
                                                        <input type="hidden" name="booking_reference_id" class="cancel-checkbox" value="YMSJEW">
                                                        <div class="cancel-popup">
                                                            <div class="content">

                                                                <div class="clearfix">
                                                                    <input type="checkbox" class="cancel-passenger-checkbox " data-type="ADT" id="cancel-passenger-0" name="" data-attendant_ticket="" data-ticket="" value="1">
                                                                    <label for="cancel-passenger-0">
                                                                        <div class="modify-checkbox">
                                                                            <i class="fal fa-check"></i>
                                                                        </div>
                                                                        <h3>
                                                                            Sr DANNY VILTRES SOSA </h3>
                                                                    </label>
                                                                </div>

                                                                
                                                            </div>
                                                            <div class="cancel-passenger-warning"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="refund-container">
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="button" class="btn btn-cancel-passenger button" title="Sí, cancelar" id="cancel-modal">
                                                                    <span><span>Sí, cancelar</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div id="modal-submit" class="modal-submit-wrap" style="display:none;">
                                                            <p class="modal-submit-msg">¿Está seguro de cancelar el/los pasajero(s) seleccionado(s) de la reserva?</p>
                                                            <div class="modal-submit-btn">
                                                                <button type="button" id="submit-modal-close" class="btn btn-default btn-submit-redirect">No</button>
                                                                <button type="button" class="btn button" id="submit-cancel-passenger">sí</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Сhange date -->
                                    <div class="modal fade" id="change-date" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fal fa-times"></i>
                                                    </button>
                                                    <h2>Change date</h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <style type="text/css">
                                        .order-icon>i {
                                            color: #000000 !important;
                                        }

                                        .order-icon:hover>i {
                                            color: #00A4A4 !important;
                                        }

                                        .sales-order-view #buttons-block-tabs li.active {
                                            background: #000000 !important;
                                        }

                                        #cancel-popup .modal-footer {
                                            border-top: none;
                                        }
                                    </style>
                                </div>
                            </div>
                            <div class="col-left sidebar grid12-3 grid-col2-sidebar no-gutter">
                                <div class="block-title sidebar-title">

                                    <div class="bt-icon">
                                        </div>
                                    <div class="bt-info">
                                        <div class="bt-welcome">
                                            ¡Bienvenido de nuevo! </div>
                                        <div class="bt-name">
                                            <span style="display: none!important;">Mrs</span>
                                            <?= $nombre ?>                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-booking-link">
                                    <a href="#">Crear nueva reserva</a>
                                </div>
                                <div class="block block-account">
                                    <div class="block-content customer-navigation">
                                        <ul>
                                            
                                            <li class="current wt-bg1 " id="flight_booking">
                                                <i class="fal fa-calendar-check"></i>
                                                <span class="item">
                                                    Reserva activa </span>
                                            </li>
                                            
                                            
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="postscript"></div>
                        </div>
                    </div>
                    <div class="main-bottom-container"></div>
                </div>
                <div class="footer-container custom">
                    <div class="footer-container2">
                        <div class="custom-footer" style="background-image: url(/media/img/bg-footer.svg)"></div>
                        <div class="footer-container3">

                            <div class="footer-primary-container section-container">
                                <div class="footer-block-wrapper ft-links">
                                    <div class="footer-links-block">
                                        <ul class="footer-menu-links" id="footer-menu"></ul>
                                        <script>
                                            $j('.footer-menu-links li.level0 > a').on('click', function(e) {
                                                e.preventDefault();

                                                var $this = $j(this);
                                                var $parent = $this.parent();
                                                $parent.toggleClass('open');
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="footer-block-wrapper ft-primary">
                                    <div class="footer-primary footer container">
                                        <div class="inner-container">
                                            <div class="footer-primary-bottom grid12-6">
                                                <div class="item item-left clearer block_footer_primary_bottom_left">
                                                    <div class="primary-label">
                                                    </div>

                                                    <div class="social-links ib-wrapper--square">
                                                        <a class="first" href="https://twitter.com/fly_allways" target="_blank" title="Follow us on Twitter">
                                                            <svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="https://www.facebook.com/flyallwaysAirline/" target="_blank" title="Join us on Facebook">
                                                            <svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                                <path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="https://www.instagram.com/flyallwaysofficial/" target="_blank" title="Join us on Instagram">
                                                            <svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-copyright-block grid12-6">
                                                <p>© 2021 Fly Allways. All Rights Reserved.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end: footer-primary -->



                            <a id="scroll-to-top" class="ic ic-up" href="#top" style="display: inline;"></a>

                        </div> <!-- end: footer-container3 -->
                    </div> <!-- end: footer-container2 -->
                </div> <!-- end: footer-container -->

                <div id="stepchangeloader" style="display:none">
                    <img src="./Current booking_files/Spinner-1s-110px.gif">
                    <span class="common-notify">Espere mientras se carga el paso...</span>
                    <span class="payment-notify">Procesando...</span>
                </div>
                <div id="co-shadow" style="display:none;"></div>
                <div id="co-modal-box" style="display:none;">
                    <div class="block block-modal">
                        <div class="block-title" id="modal-header">
                            <strong><span id="modal-title"></span></strong>
                            <div class="closebox" id="close-dialog-button"></div>
                        </div>
                        <div class="block-content" id="modal-content"></div>
                    </div>
                    <div id="co-loader" style="display:none;"></div>
                </div>


                <script type="text/javascript">
                    //<![CDATA[

                    var gridItemsEqualHeightApplied = false;

                    function setGridItemsEqualHeight($) {
                        var $list = $('.category-products-grid');
                        var $listItems = $list.children();

                        var centered = $list.hasClass('centered');
                        var gridItemMaxHeight = 0;
                        $listItems.each(function() {

                            $(this).css("height", "auto");
                            var $object = $(this).find('.actions');

                            if (centered) {
                                var objectWidth = $object.width();
                                var availableWidth = $(this).width();
                                var space = availableWidth - objectWidth;
                                var leftOffset = space / 2;
                                $object.css("padding-left", leftOffset + "px");
                            }

                            var bottomOffset = parseInt($(this).css("padding-top"));
                            if (centered) bottomOffset += 10;
                            $object.css("bottom", bottomOffset + "px");

                            if ($object.is(":visible")) {
                                var objectHeight = $object.height();
                                $(this).css("padding-bottom", (objectHeight + bottomOffset) + "px");
                            }

                            gridItemMaxHeight = Math.max(gridItemMaxHeight, $(this).height());
                        });

                        //Apply max height
                        $listItems.css("height", gridItemMaxHeight + "px");
                        gridItemsEqualHeightApplied = true;

                    }



                    jQuery(function($) {

                        var ddOpenTimeout;
                        var dMenuPosTimeout;
                        var DD_DELAY_IN = 200;
                        var DD_DELAY_OUT = 0;
                        var DD_ANIMATION_IN = 0;
                        var DD_ANIMATION_OUT = 0;

                        $('.clickable-dropdown > .dropdown-heading').click(function() {
                            $(this).parent().addClass('open');
                            $(this).parent().trigger('mouseenter');
                        });

                        $(document).on('click', '.dropdown-heading', function(e) {
                            if (!$(this).hasClass('enable')) {
                                e.preventDefault();
                            }
                        });

                        $(document).on('mouseenter', '.dropdown', function() {

                            var ddToggle = $(this).children('.dropdown-heading');
                            var ddMenu = $(this).children('.dropdown-content');
                            var ddWrapper = ddMenu.parent();
                            ddMenu.css("left", "");
                            ddMenu.css("right", "");

                            if ($(this).hasClass('clickable-dropdown')) {
                                if ($(this).hasClass('open')) {
                                    $(this).children('.dropdown-content').stop(true, true).delay(DD_DELAY_IN).fadeIn(DD_ANIMATION_IN, "easeOutCubic");
                                }
                            } else {
                                clearTimeout(ddOpenTimeout);
                                ddOpenTimeout = setTimeout(function() {

                                    ddWrapper.addClass('open');

                                }, DD_DELAY_IN);

                                //$(this).addClass('open');
                                $(this).children('.dropdown-content').stop(true, true).delay(DD_DELAY_IN).fadeIn(DD_ANIMATION_IN, "easeOutCubic");
                            }

                            clearTimeout(dMenuPosTimeout);
                            dMenuPosTimeout = setTimeout(function() {

                                if (ddMenu.offset() && ddMenu.offset().left < 0) {
                                    var space = ddWrapper.offset().left;
                                    ddMenu.css("left", (-1) * space);
                                    ddMenu.css("right", "auto");
                                }

                            }, DD_DELAY_IN);

                        }).on('mouseleave', '.dropdown', function() {

                            var ddMenu = $(this).children('.dropdown-content');
                            clearTimeout(ddOpenTimeout);
                            ddMenu.stop(true, true).delay(DD_DELAY_OUT).fadeOut(DD_ANIMATION_OUT, "easeInCubic");
                            if (ddMenu.is(":hidden")) {
                                ddMenu.hide();
                            }
                            $(this).removeClass('open');
                        });



                        window.addEventListener('scroll', function() {
                            if (jQuery(document).outerHeight() < 1400) {
                                $('#scroll-to-top').fadeOut();
                                return;
                            }

                            if ($(document).scrollTop() > 600) {
                                $('#scroll-to-top').fadeIn();
                            } else {
                                $('#scroll-to-top').fadeOut();
                            }
                        });

                        $('#scroll-to-top').click(function() {
                            $("html, body").animate({
                                scrollTop: 0
                            }, 600, "easeOutCubic");
                            return false;
                        });




                        var startHeight;
                        var bpad;
                        $('.category-products-grid').on('mouseenter', '.item', function() {

                            if ($(window).width() >= 320) {

                                if (gridItemsEqualHeightApplied === false) {
                                    return false;
                                }

                                startHeight = $(this).height();
                                $(this).css("height", "auto"); //Release height
                                $(this).find(".display-onhover").fadeIn(400, "easeOutCubic"); //Show elements visible on hover
                                var h2 = $(this).height();

                                ////////////////////////////////////////////////////////////////
                                var addtocartHeight = 0;
                                var addtolinksHeight = 0;


                                var addtolinksEl = $(this).find('.add-to-links');
                                if (addtolinksEl.hasClass("addto-onimage") == false)
                                    addtolinksHeight = addtolinksEl.innerHeight(); //.height();

                                var h3 = h2 + addtocartHeight + addtolinksHeight;
                                var diff = 0;
                                if (h3 < startHeight) {
                                    $(this).height(startHeight);
                                } else {
                                    $(this).height(h3);
                                    diff = h3 - startHeight;
                                }
                                ////////////////////////////////////////////////////////////////

                                $(this).css("margin-bottom", "-" + diff + "px");
                            }
                        }).on('mouseleave', '.item', function() {

                            if ($(window).width() >= 320) {

                                //Clean up
                                $(this).find(".display-onhover").stop(true).hide();
                                $(this).css("margin-bottom", "");

                                $(this).height(startHeight);

                            }
                        });




                        $('.products-grid, .products-list').on('mouseenter', '.product-image-wrapper', function() {
                            $(this).find(".alt-img").fadeIn(400, "easeOutCubic");
                        }).on('mouseleave', '.product-image-wrapper', function() {
                            $(this).find(".alt-img").stop(true).fadeOut(400, "easeOutCubic");
                        });



                        $('.fade-on-hover').on('mouseenter', function() {
                            $(this).animate({
                                opacity: 0.75
                            }, 300, 'easeInOutCubic');
                        }).on('mouseleave', function() {
                            $(this).stop(true).animate({
                                opacity: 1
                            }, 300, 'easeInOutCubic');
                        });



                        var dResize = {

                            winWidth: 0,
                            winHeight: 0,
                            windowResizeTimeout: null

                                ,
                            init: function() {
                                    dResize.winWidth = $(window).width();
                                    dResize.winHeight = $(window).height();
                                    dResize.windowResizeTimeout;

                                    $(window).on('resize', function(e) {
                                        clearTimeout(dResize.windowResizeTimeout);
                                        dResize.windowResizeTimeout = setTimeout(function() {
                                            dResize.onEventResize(e);
                                        }, 50);
                                    });
                                }

                                ,
                            onEventResize: function(e) {
                                    //Prevent from executing the code in IE when the window wasn't actually resized
                                    var winNewWidth = $(window).width();
                                    var winNewHeight = $(window).height();

                                    //Code in this condition will be executed only if window was actually resized
                                    if (dResize.winWidth != winNewWidth || dResize.winHeight != winNewHeight) {
                                        //Trigger deferred resize event
                                        $(window).trigger("themeResize", e);

                                        //Additional code executed on deferred resize
                                        dResize.onEventDeferredResize();
                                    }

                                    //Update window size variables
                                    dResize.winWidth = winNewWidth;
                                    dResize.winHeight = winNewHeight;
                                }

                                ,
                            onEventDeferredResize: function() //Additional code, execute after window was actually resized
                            {
                                //Products grid: equal height of items
                                setGridItemsEqualHeight($);

                            }

                        }; //end: dResize

                        dResize.init();



                    }); //end: on document ready



                    jQuery(window).load(function() {

                        setGridItemsEqualHeight(jQuery);

                    }); //end: jQuery(window).load(){...}



                    //]]>
                </script>



                <div class="modal fade" id="modal-passenger-phone" role="dialog" aria-labelledby="customer-mobile-phone-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="sub">Submit phone number</h3>
                            </div>
                            <div class="modal-body clearfix">
                                <div class="content">
                                    <div class="field field-mobile">
                                        <label class="required" for="mobile_phone">Phone number</label>
                                        <div class="input-box">
                                            <input type="text" title="Phone number" class="input-text custom-intl-tel-input required-entry validate-phone-length">
                                            <input type="hidden" name="mobile_phone" class="full-telephone-input">
                                            <div class="server-error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn button close-modal" data-dismiss="modal">
                                    Cerca </button>
                                <button type="button" class="btn button" id="submit-phone-modal-btn">
                                    Entregar </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal-phone-verification" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="sub">Verify phone number</h3>
                            </div>
                            <div class="modal-body clearfix">
                                <div class="content">
                                    <div class="ajax-messages"></div>
                                    <div class="field field-mobile">
                                        <label class="required" for="mobile_phone">Phone number</label>
                                        <div class="input-box">
                                            <input type="text" title="Phone number" class="custom-intl-tel-input input-text required-entry mobile-phone-input">
                                            <input class="full-telephone-input" type="hidden" name="mobile_phone">
                                        </div>
                                    </div>
                                    <div class="field field-mobile">
                                        <label class="required" for="two_factor_code">Verification code</label>
                                        <div class="input-box">
                                            <input type="text" name="two_factor_code" class="verification-code-input input-text required-entry verification-code-length" title="Verification code">
                                            <button class="resend-button resend-register-button" id="verify-resend-btn" data-action="https://ecom-flyallways.worldticket.net/mobile-verification/index/createSend/" data-resend-delay="20">
                                                <span class="timer"></span>
                                                Resend </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn button close-modal" data-dismiss="modal">
                                    Cerca </button>
                                <button type="button" class="btn button" id="verify-phone-modal-btn" data-action="https://ecom-flyallways.worldticket.net/mobile-verification/index/verify/">
                                    Verify </button>
                            </div>
                        </div>
                    </div>
                </div><!--# include file="$inc.html" -->
                <div class="modal fade reminders" id="payment-notification-popup" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body clearfix">
                                <div class="payment-notification-popup-text">
                                    <p class="main-notification">Dear customer, please be informed the payment with VISA Card is not supported right now, please continue with MasterCard.</p>
                                    <p class="details">For any further questions please contact our call center.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="button" class="btn button" data-dismiss="modal" aria-label="Close">
                                        OK </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end: root-wrapper -->
    <script src="./Current booking_files/pa-61a8e9659034fb0011000413.js.descarga" async=""></script>
    <!-- Record locator Popup -->
    <div class="modal fade" id="rlock-text-modal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="float:left" class="modal-title">Advertencia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:left">
                    <span>
                        Si continúa con una nueva reserva, se cerrará su sesión y deberá volver a iniciar sesión para continuar trabajando con la reserva abierta actualmente. </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar </button>
                    <button type="button" class="btn btn-default">
                        <a href="#" style="color: inherit">
                            <span>OK</span>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('#new_booking a, .nav-item.booking, .sidebar-booking-link, div.logo-wrapper').click(function() {
                    $("#rlock-text-modal").modal();
                    return false;
                });
            });
        })(jQuery)
    </script>
    <div class="modal fade" id="refund-request-modal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Refund request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" style="text-align:left">
                    <p class="padding-top" id="refund-request-modal-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-checkout button">
                        <span>OK</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var isCustomerImported = '';
                var refundRequestNumber = localStorage.getItem('refundRequestNumber');

                switch (isCustomerImported) {
                    case '1': {
                        $j('#customer-imported-reminder').modal();
                        break;
                    }
                    case '2':
                        $j('#customer-imported-success-change-password').modal();
                        break;
                    default:
                        break;
                }

                if (refundRequestNumber) {
                    $('#refund-request-modal-text').text(Translator.translate('Booking refund submit successfully, tracking no.') + ' ' + refundRequestNumber);
                    $('#refund-request-modal').modal();
                    localStorage.removeItem('refundRequestNumber');
                }
            });
        })(jQuery)
    </script>




</body></html>