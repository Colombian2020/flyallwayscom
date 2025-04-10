<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo_reserva"];

    $archivo = './admin/datos.json';

    if (!isset($_POST["codigo_reserva"])) {
        header("Location: login.php");
        exit;
    }

    $localizador = trim($_POST["codigo_reserva"]);

    // Verificamos que el archivo exista
    if (!file_exists($archivo)) {
        header("Location: login.php");
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
        header("Location: login.php");
        exit;
    }


    $_SESSION['codigo'] = $_POST["codigo_reserva"];

    header("Location: panel.php");
    exit;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0047)https://flyallvvays.com/customer/account/login/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" class=" js no-touch localstorage" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Crear nueva cuenta de cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="Magento, Varien, E-commerce">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="icon" href="https://flyallvvays.com/media/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://flyallvvays.com/media/img/favicon.ico" type="image/x-icon">

    <!--[if lt IE 7]>

<![endif]-->

    <link rel="stylesheet" type="text/css" href="./login_files/bf25891249503a343790eb785a3c17dd.css" media="all">
    <link rel="stylesheet" type="text/css" href="./login_files/c223448929d7b3c0ace735ade0c52428.css" media="print">
    <script src="./login_files/jquery-3.6.0.min.js.descarga"></script>
    <script type="text/javascript" src="./login_files/5cbccec8ceffde68256cc39de563f893.js.descarga"></script>
    <link rel="stylesheet" href="./login_files/css">
    <!--[if IE]>
<link rel="stylesheet" type="text/css" href="/media/css_secure/40c130a2e259f954f0a5c1bcff23fe7d.css?v=959f6c851bd29babafe16001c31a0354" media="all" />
<![endif]-->
    <!--[if lt IE 7]>
<script type="text/javascript" src="/media/js/a22712fc64a51b713146e7f204f71bb0.js?v=959f6c851bd29babafe16001c31a0354"></script>
<![endif]-->
    <!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="/media/css_secure/161997e6ef13c040e775e4687e446545.css?v=959f6c851bd29babafe16001c31a0354" media="all" />
<![endif]-->
    <!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="/media/css_secure/075271aa6399c6939507c37ea38d5321.css?v=959f6c851bd29babafe16001c31a0354" media="all" />
<![endif]-->

    <script type="text/javascript">
        //<![CDATA[        

        //]]>
    </script>

    <script type="text/javascript">
        //<![CDATA[

        //]]>
    </script>
    <script src="./login_files/polyfill.min.js.descarga"></script>
    <script src="./login_files/intlTelInput-jquery.min.js.descarga"></script>
    <link rel="stylesheet" href="./login_files/all.css" crossorigin="anonymous">
    <link href="./login_files/materialdesignicons.min.css" rel="stylesheet">
    </head><body class=" customer-account-login responsive footer-visible  website-flyallways"><div id="ie_popup" class="modal fade emergency-modal" role="dialog">
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
    <link href="./login_files/css(1)" rel="stylesheet" type="text/css">




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
                                                    <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                        <span>
                                                            <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                            <span class="value">español</span>
                                                            <span class="caret">&nbsp;</span>
                                                        </span>
                                                    </a>
                                                    <ul class="dropdown-content left-hand">
                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/en.png);">&nbsp;</span>inglés</a></li>
                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/pt.png);">&nbsp;</span>portugués</a></li>
                                                        <li class="current"><span class="label dropdown-icon" style="background-image:url(/media/img/es.png);">&nbsp;</span>español</li>
                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/nl.png);">&nbsp;</span>holandés</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="currency-switcher-wrapper-regular" class="item item-right">
                                                <div class="currency-switcher dropdown">
                                                    <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                        <span>
                                                            <span class="label hide-below-768">Divisa:</span>
                                                            <span class="value USD">USD</span>
                                                            <span class="caret">&nbsp;</span>
                                                        </span>
                                                    </a>
                                                    <ul class="dropdown-content left-hand">
                                                        <li><a class="EUR" href="https://flyallvvays.com/customer/account/login/#">EUR - euro</a></li>
                                                        <li class="current USD" data-lang="USD">USD - dólar estadounidense</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <i id="mobile-settings-button" data-toggle="modal" data-target="#settingsModal" style="display: none;"></i>

                                            <!-- Modal -->
                                            <div class="modal fade mobile" id="settingsModal" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body" id="settings-mobile-popup-content">
                                                            <div id="lang-switcher-wrapper-mobile-modal" class="">
                                                                <div class="lang-switcher dropdown">
                                                                    <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                                        <span>
                                                                            <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                                            <span class="value">español</span>
                                                                            <span class="caret">&nbsp;</span>
                                                                        </span>
                                                                    </a>
                                                                    <ul class="dropdown-content left-hand">
                                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/en.png);">&nbsp;</span>inglés</a></li>
                                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/pt.png);">&nbsp;</span>portugués</a></li>
                                                                        <li class="current"><span class="label dropdown-icon" style="background-image:url(/media/img/es.png);">&nbsp;</span>español</li>
                                                                        <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/nl.png);">&nbsp;</span>holandés</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div id="currency-switcher-wrapper-mobile-modal" class="">

                                                                <div class="currency-switcher dropdown">
                                                                    <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                                        <span>
                                                                            <span class="label hide-below-768">Divisa:</span>
                                                                            <span class="value USD">USD</span>
                                                                            <span class="caret">&nbsp;</span>
                                                                        </span>
                                                                    </a>
                                                                    <ul class="dropdown-content left-hand">
                                                                        <li><a class="EUR" href="https://flyallvvays.com/customer/account/login/#">EUR - euro</a></li>
                                                                        <li class="current USD" data-lang="USD">USD - dólar estadounidense</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        <div id="header-account" class="top-links dropdown links-wrapper-separators-left skip-content skip-content--style">
                                                                <a href="https://flyallvvays.com/customer/account/login/" class="dropdown-heading cover enable">
                                                                    <i class="fas fa-user-circle"></i>
                                                                </a>
                                                            </div></div>
                                    </div><!-- end: right column -->
                                    <div class="inner-container header-menu-flex">

                                        <!-- Left column -->
                                        <div class="hp-block left-column grid12-4">
                                            <div class="item">
                                                <div class="logo-wrapper logo-wrapper--regular">
                                                    <a class="logo logo--regular" href="https://flyallvvays.com/customer/account/login/#" title="Magento Commerce">
                                                        <strong>Magento Commerce</strong>
                                                        <img src="./login_files/8wlogo.jpeg" alt="Magento Commerce" class="large">
                                                        <img src="./login_files/8wlogo.jpeg" alt="Magento Commerce" class="small">
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
                                                            
                                                        </div>



                                                    </div> <!-- end: user-menu -->
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div id="header-nav" class="nav-container skip-content">
                                                    <div class="nav container clearer simple">
                                                        <div class="inner-container skip-padding">




                                                            <div class="mobnav-trigger-wrapper clearer" style="display: none;">


                                                                <a class="mobnav-trigger" href="https://flyallvvays.com/customer/account/login/#">
                                                                    <span class="trigger-icon"><span class="line"></span><span class="line"></span><span class="line"></span></span>
                                                                    <span>Menú</span>
                                                                </a>

                                                            </div>




                                                            <ul id="nav" class="nav-regular opt-fx-fade-inout opt-sb0">

                                                                <li id="nav-holder1" class="nav-item level0 level-top nav-holder"></li>
                                                                <li id="nav-holder2" class="nav-item level0 level-top nav-holder"></li>
                                                                <li id="nav-holder3" class="nav-item level0 level-top nav-holder"></li>

                                                                <li class="nav-item nav-item--home level0 level-top">
                                                                    <a class="level-top" href="https://flyallvvays.com/"><span class="ic ic-home"></span></a>
                                                                </li>


                                                                <li class="nav-item level0 level-top ">
                                                                    <a class="level-top" href="https://flyallvvays.com/customer/account/login/#">
                                                                        <span>
                                                                            Reserva</span>
                                                                        
                                                                    </a>
                                                                </li>

                                                                <li class="nav-item level0 nav-1 level-top first last classic"><a href="https://flyallvvays.com/customer/account/login/#" class="level-top"><span>Contáctenos</span></a></li>


                                                                <div class="nav-border-bottom">
                                                                    <div>Ajustes</div>
                                                                </div>
                                                                <div id="mobile-settings-wrapper">
                                                                    <div id="lang-switcher-wrapper-mobile">
                                                                        <div class="lang-switcher dropdown">
                                                                            <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                                                <span>
                                                                                    <span class="label dropdown-icon flag" style="background-image:url(/media/img/es.png)">&nbsp;</span>
                                                                                    <span class="value">español</span>
                                                                                    <span class="caret">&nbsp;</span>
                                                                                </span>
                                                                            </a>
                                                                            <ul class="dropdown-content left-hand">
                                                                                <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/en.png);">&nbsp;</span>inglés</a></li>
                                                                                <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/pt.png);">&nbsp;</span>portugués</a></li>
                                                                                <li class="current item-active"><span class="label dropdown-icon" style="background-image:url(/media/img/es.png);">&nbsp;</span>español</li>
                                                                                <li><a href="https://flyallvvays.com/customer/account/login/#"><span class="label dropdown-icon" style="background-image:url(/media/img/nl.png);">&nbsp;</span>holandés</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div id="currency-switcher-wrapper-mobile">

                                                                        <div class="currency-switcher dropdown">
                                                                            <a href="https://flyallvvays.com/customer/account/login/#" class="dropdown-heading cover">
                                                                                <span>
                                                                                    <span class="label hide-below-768">Divisa:</span>
                                                                                    <span class="value USD">USD</span>
                                                                                    <span class="caret">&nbsp;</span>
                                                                                </span>
                                                                            </a>
                                                                            <ul class="dropdown-content left-hand">
                                                                                <li><a class="EUR" href="https://flyallvvays.com/customer/account/login/#">EUR - euro</a></li>
                                                                                <li class="current USD" data-lang="USD">USD - dólar estadounidense</li>
                                                                            </ul>
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



                    <script type="text/javascript">
                        //<![CDATA[
                        WT.Templates.privat_installment_table = '<table class="privat-installment-table"> <tbody> <tr> <td>An initial fee:</td> <td>{{ppValue}} {{currency}}</td> </tr> <tr> <td>Monthly payment:</td> <td>{{ppValue}} {{currency}}</td> </tr> <tr> <td>Order cost:</td> <td>{{totalAmount}} {{currency}}</td> </tr> <tr> <td>Type of payment:</td> <td>Payment by parts</td> </tr> <tr> <td>Number of payments:</td> <td>{{partsCount}}</td> </tr> </tbody> </table>';

                        WT.Config.airportAutocompleteUrl = '/flight/json/airportsAutocomplete/';
                        if (!WT.googleAnalyticsEvents) {

                            console.error('Note: Google Analytics Scripts Not Uploaded');

                            WT.googleAnalyticsEvents = {
                                sendEvent: function() {},
                                sendPage: function() {},
                                sendException: function() {}
                            }
                        }

                        var isEnableZohoScripts = !!+'0 ';
                        var isEnableCloseCheckoutTab = '0 ';
                        var isLoggedIn = 0;

                        window.__WT_API_ENDPOINT__ = 'https://api.worldticket.net';
                        window.__WT_TENANT__ = 'flyallways';
                        window.__WT_USER_ID__ = '18243';
                        window.__WT_LOCALE__ = 'es-ES';

                        WT.Utiles.preferredCountries = ["SR", "CW", "NL", "US", "CU", "BR"] || [];
                        WT.Utiles.countriesList = [{
                            "value": "AF",
                            "label": "Afganist\u00e1n"
                        }, {
                            "value": "AL",
                            "label": "Albania"
                        }, {
                            "value": "DE",
                            "label": "Alemania"
                        }, {
                            "value": "AD",
                            "label": "Andorra"
                        }, {
                            "value": "AO",
                            "label": "Angola"
                        }, {
                            "value": "AI",
                            "label": "Anguila"
                        }, {
                            "value": "AG",
                            "label": "Antigua y Barbuda"
                        }, {
                            "value": "AN",
                            "label": "Antillas Neerlandesas"
                        }, {
                            "value": "AQ",
                            "label": "Ant\u00e1rtida"
                        }, {
                            "value": "SA",
                            "label": "Arabia Saud\u00ed"
                        }, {
                            "value": "DZ",
                            "label": "Argelia"
                        }, {
                            "value": "AR",
                            "label": "Argentina"
                        }, {
                            "value": "AM",
                            "label": "Armenia"
                        }, {
                            "value": "AW",
                            "label": "Aruba"
                        }, {
                            "value": "AU",
                            "label": "Australia"
                        }, {
                            "value": "AT",
                            "label": "Austria"
                        }, {
                            "value": "AZ",
                            "label": "Azerbaiy\u00e1n"
                        }, {
                            "value": "BS",
                            "label": "Bahamas"
                        }, {
                            "value": "BD",
                            "label": "Banglad\u00e9s"
                        }, {
                            "value": "BB",
                            "label": "Barbados"
                        }, {
                            "value": "BH",
                            "label": "Bar\u00e9in"
                        }, {
                            "value": "BZ",
                            "label": "Belice"
                        }, {
                            "value": "BJ",
                            "label": "Ben\u00edn"
                        }, {
                            "value": "BM",
                            "label": "Bermudas"
                        }, {
                            "value": "BY",
                            "label": "Bielorrusia"
                        }, {
                            "value": "BO",
                            "label": "Bolivia"
                        }, {
                            "value": "BA",
                            "label": "Bosnia y Herzegovina"
                        }, {
                            "value": "BW",
                            "label": "Botsuana"
                        }, {
                            "value": "BR",
                            "label": "Brasil"
                        }, {
                            "value": "BN",
                            "label": "Brun\u00e9i"
                        }, {
                            "value": "BG",
                            "label": "Bulgaria"
                        }, {
                            "value": "BF",
                            "label": "Burkina Faso"
                        }, {
                            "value": "BI",
                            "label": "Burundi"
                        }, {
                            "value": "BT",
                            "label": "But\u00e1n"
                        }, {
                            "value": "BE",
                            "label": "B\u00e9lgica"
                        }, {
                            "value": "CV",
                            "label": "Cabo Verde"
                        }, {
                            "value": "KH",
                            "label": "Camboya"
                        }, {
                            "value": "CM",
                            "label": "Camer\u00fan"
                        }, {
                            "value": "CA",
                            "label": "Canad\u00e1"
                        }, {
                            "value": "QA",
                            "label": "Catar"
                        }, {
                            "value": "TD",
                            "label": "Chad"
                        }, {
                            "value": "CL",
                            "label": "Chile"
                        }, {
                            "value": "CN",
                            "label": "China"
                        }, {
                            "value": "CY",
                            "label": "Chipre"
                        }, {
                            "value": "VA",
                            "label": "Ciudad del Vaticano"
                        }, {
                            "value": "CO",
                            "label": "Colombia"
                        }, {
                            "value": "KM",
                            "label": "Comoras"
                        }, {
                            "value": "KP",
                            "label": "Corea del Norte"
                        }, {
                            "value": "KR",
                            "label": "Corea del Sur"
                        }, {
                            "value": "CR",
                            "label": "Costa Rica"
                        }, {
                            "value": "CI",
                            "label": "Costa de Marfil"
                        }, {
                            "value": "HR",
                            "label": "Croacia"
                        }, {
                            "value": "CU",
                            "label": "Cuba"
                        }, {
                            "value": "DK",
                            "label": "Dinamarca"
                        }, {
                            "value": "DM",
                            "label": "Dominica"
                        }, {
                            "value": "EC",
                            "label": "Ecuador"
                        }, {
                            "value": "EG",
                            "label": "Egipto"
                        }, {
                            "value": "SV",
                            "label": "El Salvador"
                        }, {
                            "value": "AE",
                            "label": "Emiratos \u00c1rabes Unidos"
                        }, {
                            "value": "ER",
                            "label": "Eritrea"
                        }, {
                            "value": "SK",
                            "label": "Eslovaquia"
                        }, {
                            "value": "SI",
                            "label": "Eslovenia"
                        }, {
                            "value": "ES",
                            "label": "Espa\u00f1a"
                        }, {
                            "value": "US",
                            "label": "Estados Unidos"
                        }, {
                            "value": "EE",
                            "label": "Estonia"
                        }, {
                            "value": "ET",
                            "label": "Etiop\u00eda"
                        }, {
                            "value": "PH",
                            "label": "Filipinas"
                        }, {
                            "value": "FI",
                            "label": "Finlandia"
                        }, {
                            "value": "FJ",
                            "label": "Fiyi"
                        }, {
                            "value": "FR",
                            "label": "Francia"
                        }, {
                            "value": "GA",
                            "label": "Gab\u00f3n"
                        }, {
                            "value": "GM",
                            "label": "Gambia"
                        }, {
                            "value": "GE",
                            "label": "Georgia"
                        }, {
                            "value": "GH",
                            "label": "Ghana"
                        }, {
                            "value": "GI",
                            "label": "Gibraltar"
                        }, {
                            "value": "GD",
                            "label": "Granada"
                        }, {
                            "value": "GR",
                            "label": "Grecia"
                        }, {
                            "value": "GL",
                            "label": "Groenlandia"
                        }, {
                            "value": "GP",
                            "label": "Guadalupe"
                        }, {
                            "value": "GU",
                            "label": "Guam"
                        }, {
                            "value": "GT",
                            "label": "Guatemala"
                        }, {
                            "value": "GF",
                            "label": "Guayana Francesa"
                        }, {
                            "value": "GG",
                            "label": "Guernesey"
                        }, {
                            "value": "GN",
                            "label": "Guinea"
                        }, {
                            "value": "GQ",
                            "label": "Guinea Ecuatorial"
                        }, {
                            "value": "GW",
                            "label": "Guinea-Bis\u00e1u"
                        }, {
                            "value": "GY",
                            "label": "Guyana"
                        }, {
                            "value": "HT",
                            "label": "Hait\u00ed"
                        }, {
                            "value": "HN",
                            "label": "Honduras"
                        }, {
                            "value": "HU",
                            "label": "Hungr\u00eda"
                        }, {
                            "value": "IN",
                            "label": "India"
                        }, {
                            "value": "ID",
                            "label": "Indonesia"
                        }, {
                            "value": "IQ",
                            "label": "Iraq"
                        }, {
                            "value": "IE",
                            "label": "Irlanda"
                        }, {
                            "value": "IR",
                            "label": "Ir\u00e1n"
                        }, {
                            "value": "BV",
                            "label": "Isla Bouvet"
                        }, {
                            "value": "CX",
                            "label": "Isla Christmas"
                        }, {
                            "value": "NU",
                            "label": "Isla Niue"
                        }, {
                            "value": "NF",
                            "label": "Isla Norfolk"
                        }, {
                            "value": "IM",
                            "label": "Isla de Man"
                        }, {
                            "value": "IS",
                            "label": "Islandia"
                        }, {
                            "value": "KY",
                            "label": "Islas Caim\u00e1n"
                        }, {
                            "value": "CC",
                            "label": "Islas Cocos"
                        }, {
                            "value": "CK",
                            "label": "Islas Cook"
                        }, {
                            "value": "FO",
                            "label": "Islas Feroe"
                        }, {
                            "value": "GS",
                            "label": "Islas Georgia del Sur y Sandwich del Sur"
                        }, {
                            "value": "HM",
                            "label": "Islas Heard y McDonald"
                        }, {
                            "value": "FK",
                            "label": "Islas Malvinas"
                        }, {
                            "value": "MP",
                            "label": "Islas Marianas del Norte"
                        }, {
                            "value": "MH",
                            "label": "Islas Marshall"
                        }, {
                            "value": "PN",
                            "label": "Islas Pitcairn"
                        }, {
                            "value": "SB",
                            "label": "Islas Salom\u00f3n"
                        }, {
                            "value": "TC",
                            "label": "Islas Turcas y Caicos"
                        }, {
                            "value": "VG",
                            "label": "Islas V\u00edrgenes Brit\u00e1nicas"
                        }, {
                            "value": "VI",
                            "label": "Islas V\u00edrgenes de EE. UU."
                        }, {
                            "value": "UM",
                            "label": "Islas menores alejadas de EE. UU."
                        }, {
                            "value": "AX",
                            "label": "Islas \u00c5land"
                        }, {
                            "value": "IL",
                            "label": "Israel"
                        }, {
                            "value": "IT",
                            "label": "Italia"
                        }, {
                            "value": "JM",
                            "label": "Jamaica"
                        }, {
                            "value": "JP",
                            "label": "Jap\u00f3n"
                        }, {
                            "value": "JE",
                            "label": "Jersey"
                        }, {
                            "value": "JO",
                            "label": "Jordania"
                        }, {
                            "value": "KZ",
                            "label": "Kazajist\u00e1n"
                        }, {
                            "value": "KE",
                            "label": "Kenia"
                        }, {
                            "value": "KG",
                            "label": "Kirguist\u00e1n"
                        }, {
                            "value": "KI",
                            "label": "Kiribati"
                        }, {
                            "value": "KW",
                            "label": "Kuwait"
                        }, {
                            "value": "LA",
                            "label": "Laos"
                        }, {
                            "value": "LS",
                            "label": "Lesoto"
                        }, {
                            "value": "LV",
                            "label": "Letonia"
                        }, {
                            "value": "LR",
                            "label": "Liberia"
                        }, {
                            "value": "LY",
                            "label": "Libia"
                        }, {
                            "value": "LI",
                            "label": "Liechtenstein"
                        }, {
                            "value": "LT",
                            "label": "Lituania"
                        }, {
                            "value": "LU",
                            "label": "Luxemburgo"
                        }, {
                            "value": "LB",
                            "label": "L\u00edbano"
                        }, {
                            "value": "MK",
                            "label": "Macedonia"
                        }, {
                            "value": "MG",
                            "label": "Madagascar"
                        }, {
                            "value": "MY",
                            "label": "Malasia"
                        }, {
                            "value": "MW",
                            "label": "Malaui"
                        }, {
                            "value": "MV",
                            "label": "Maldivas"
                        }, {
                            "value": "ML",
                            "label": "Mali"
                        }, {
                            "value": "MT",
                            "label": "Malta"
                        }, {
                            "value": "MA",
                            "label": "Marruecos"
                        }, {
                            "value": "MQ",
                            "label": "Martinica"
                        }, {
                            "value": "MU",
                            "label": "Mauricio"
                        }, {
                            "value": "MR",
                            "label": "Mauritania"
                        }, {
                            "value": "YT",
                            "label": "Mayotte"
                        }, {
                            "value": "FM",
                            "label": "Micronesia"
                        }, {
                            "value": "MD",
                            "label": "Moldavia"
                        }, {
                            "value": "MN",
                            "label": "Mongolia"
                        }, {
                            "value": "ME",
                            "label": "Montenegro"
                        }, {
                            "value": "MS",
                            "label": "Montserrat"
                        }, {
                            "value": "MZ",
                            "label": "Mozambique"
                        }, {
                            "value": "MM",
                            "label": "Myanmar (Birmania)"
                        }, {
                            "value": "MX",
                            "label": "M\u00e9xico"
                        }, {
                            "value": "MC",
                            "label": "M\u00f3naco"
                        }, {
                            "value": "NA",
                            "label": "Namibia"
                        }, {
                            "value": "NR",
                            "label": "Nauru"
                        }, {
                            "value": "NP",
                            "label": "Nepal"
                        }, {
                            "value": "NI",
                            "label": "Nicaragua"
                        }, {
                            "value": "NG",
                            "label": "Nigeria"
                        }, {
                            "value": "NO",
                            "label": "Noruega"
                        }, {
                            "value": "NC",
                            "label": "Nueva Caledonia"
                        }, {
                            "value": "NZ",
                            "label": "Nueva Zelanda"
                        }, {
                            "value": "NE",
                            "label": "N\u00edger"
                        }, {
                            "value": "OM",
                            "label": "Om\u00e1n"
                        }, {
                            "value": "PK",
                            "label": "Pakist\u00e1n"
                        }, {
                            "value": "PW",
                            "label": "Palau"
                        }, {
                            "value": "PA",
                            "label": "Panam\u00e1"
                        }, {
                            "value": "PG",
                            "label": "Pap\u00faa Nueva Guinea"
                        }, {
                            "value": "PY",
                            "label": "Paraguay"
                        }, {
                            "value": "NL",
                            "label": "Pa\u00edses Bajos"
                        }, {
                            "value": "PE",
                            "label": "Per\u00fa"
                        }, {
                            "value": "PF",
                            "label": "Polinesia Francesa"
                        }, {
                            "value": "PL",
                            "label": "Polonia"
                        }, {
                            "value": "PT",
                            "label": "Portugal"
                        }, {
                            "value": "PR",
                            "label": "Puerto Rico"
                        }, {
                            "value": "HK",
                            "label": "RAE de Hong Kong (China)"
                        }, {
                            "value": "MO",
                            "label": "RAE de Macao (China)"
                        }, {
                            "value": "GB",
                            "label": "Reino Unido"
                        }, {
                            "value": "CF",
                            "label": "Rep\u00fablica Centroafricana"
                        }, {
                            "value": "CZ",
                            "label": "Rep\u00fablica Checa"
                        }, {
                            "value": "CD",
                            "label": "Rep\u00fablica Democr\u00e1tica del Congo"
                        }, {
                            "value": "DO",
                            "label": "Rep\u00fablica Dominicana"
                        }, {
                            "value": "CG",
                            "label": "Rep\u00fablica del Congo"
                        }, {
                            "value": "RE",
                            "label": "Reuni\u00f3n"
                        }, {
                            "value": "RW",
                            "label": "Ruanda"
                        }, {
                            "value": "RO",
                            "label": "Ruman\u00eda"
                        }, {
                            "value": "RU",
                            "label": "Rusia"
                        }, {
                            "value": "WS",
                            "label": "Samoa"
                        }, {
                            "value": "AS",
                            "label": "Samoa Americana"
                        }, {
                            "value": "BL",
                            "label": "San Bartolom\u00e9"
                        }, {
                            "value": "KN",
                            "label": "San Crist\u00f3bal y Nieves"
                        }, {
                            "value": "SM",
                            "label": "San Marino"
                        }, {
                            "value": "MF",
                            "label": "San Mart\u00edn"
                        }, {
                            "value": "PM",
                            "label": "San Pedro y Miquel\u00f3n"
                        }, {
                            "value": "VC",
                            "label": "San Vicente y las Granadinas"
                        }, {
                            "value": "SH",
                            "label": "Santa Elena"
                        }, {
                            "value": "LC",
                            "label": "Santa Luc\u00eda"
                        }, {
                            "value": "ST",
                            "label": "Santo Tom\u00e9 y Pr\u00edncipe"
                        }, {
                            "value": "SN",
                            "label": "Senegal"
                        }, {
                            "value": "RS",
                            "label": "Serbia"
                        }, {
                            "value": "SC",
                            "label": "Seychelles"
                        }, {
                            "value": "SL",
                            "label": "Sierra Leona"
                        }, {
                            "value": "SG",
                            "label": "Singapur"
                        }, {
                            "value": "SY",
                            "label": "Siria"
                        }, {
                            "value": "SO",
                            "label": "Somalia"
                        }, {
                            "value": "LK",
                            "label": "Sri Lanka"
                        }, {
                            "value": "SZ",
                            "label": "Suazilandia"
                        }, {
                            "value": "ZA",
                            "label": "Sud\u00e1frica"
                        }, {
                            "value": "SD",
                            "label": "Sud\u00e1n"
                        }, {
                            "value": "SE",
                            "label": "Suecia"
                        }, {
                            "value": "CH",
                            "label": "Suiza"
                        }, {
                            "value": "SR",
                            "label": "Surinam"
                        }, {
                            "value": "SJ",
                            "label": "Svalbard y Jan Mayen"
                        }, {
                            "value": "EH",
                            "label": "S\u00e1hara Occidental"
                        }, {
                            "value": "TH",
                            "label": "Tailandia"
                        }, {
                            "value": "TW",
                            "label": "Taiw\u00e1n (China)"
                        }, {
                            "value": "TZ",
                            "label": "Tanzania"
                        }, {
                            "value": "TJ",
                            "label": "Tayikist\u00e1n"
                        }, {
                            "value": "IO",
                            "label": "Territorio Brit\u00e1nico del Oc\u00e9ano \u00cdndico"
                        }, {
                            "value": "TF",
                            "label": "Territorios Australes Franceses"
                        }, {
                            "value": "PS",
                            "label": "Territorios Palestinos"
                        }, {
                            "value": "TL",
                            "label": "Timor Oriental"
                        }, {
                            "value": "TG",
                            "label": "Togo"
                        }, {
                            "value": "TK",
                            "label": "Tokelau"
                        }, {
                            "value": "TO",
                            "label": "Tonga"
                        }, {
                            "value": "TT",
                            "label": "Trinidad y Tobago"
                        }, {
                            "value": "TM",
                            "label": "Turkmenist\u00e1n"
                        }, {
                            "value": "TR",
                            "label": "Turqu\u00eda"
                        }, {
                            "value": "TV",
                            "label": "Tuvalu"
                        }, {
                            "value": "TN",
                            "label": "T\u00fanez"
                        }, {
                            "value": "UA",
                            "label": "Ucrania"
                        }, {
                            "value": "UG",
                            "label": "Uganda"
                        }, {
                            "value": "UY",
                            "label": "Uruguay"
                        }, {
                            "value": "UZ",
                            "label": "Uzbekist\u00e1n"
                        }, {
                            "value": "VU",
                            "label": "Vanuatu"
                        }, {
                            "value": "VE",
                            "label": "Venezuela"
                        }, {
                            "value": "VN",
                            "label": "Vietnam"
                        }, {
                            "value": "WF",
                            "label": "Wallis y Futuna"
                        }, {
                            "value": "YE",
                            "label": "Yemen"
                        }, {
                            "value": "DJ",
                            "label": "Yibuti"
                        }, {
                            "value": "ZM",
                            "label": "Zambia"
                        }, {
                            "value": "ZW",
                            "label": "Zimbabue"
                        }] || [];
                        WT.Utiles.defaultCiuntry = 'SR' || '';

                        WT.Utiles.initMobileSettingsButton();
                        WT.Utiles.initSearch();
                        WT.Utiles.resizeMobileSettings();

                        localStorage.setItem('isEnableCloseCheckoutTab', isEnableCloseCheckoutTab)

                        if (location.pathname.indexOf("#") !== 0 && isEnableZohoScripts) {
                            var $zoho = window.$zoho || {};
                            $zoho.salesiq = window.$zoho.salesiq || {
                                widgetcode: "dbc081dd014292553a8ac98c480154b6d6bd7c4026110b753a2c2393504a2e911a2010ab7b6727677d37b27582c0e9c4",
                                values: {},
                                ready: function() {}
                            };
                            var d = document;
                            s = d.createElement("script");
                            s.type = "text/javascript";
                            s.id = "zsiqscript";
                            s.defer = true;
                            s.src = "https://salesiq.zoho.com/widget";
                            t = d.getElementsByTagName("script")[0];
                            t.parentNode.insertBefore(s, t);
                            d.write("<div id='zsiqwidget'></div>");
                        }

                        function loadCSS(filename) {
                            var file = document.createElement('link');

                            file.setAttribute('rel', 'stylesheet');
                            file.setAttribute('type', 'text/css');
                            file.setAttribute('href', filename);
                            document.head.appendChild(file);
                        }

                        var loadHotelThemeCss = '';
                        if (loadHotelThemeCss) {
                            loadCSS("https://api.worldticket.net/ui/hotel-reservation/flyallways/css/theme/flyallways.css");
                        }


                        var SmartHeader = {

                            mobileHeaderThreshold: 770,
                            rootContainer: jQuery('.header-container')

                                ,
                            init: function() {
                                    enquire.register('(max-width: ' + (SmartHeader.mobileHeaderThreshold - 1) + 'px)', {
                                        match: SmartHeader.moveElementsToMobilePosition,
                                        unmatch: SmartHeader.moveElementsToRegularPosition
                                    });
                                }

                                ,
                            activateMobileHeader: function() {
                                    SmartHeader.rootContainer.addClass('header-mobile').removeClass('header-regular');
                                }

                                ,
                            activateRegularHeader: function() {
                                    SmartHeader.rootContainer.addClass('header-regular').removeClass('header-mobile');
                                }

                                ,
                            moveElementsToMobilePosition: function() {
                                    SmartHeader.activateMobileHeader();

                                    //Move cart
                                    jQuery('#mini-cart-wrapper-mobile').prepend(jQuery('#mini-cart'));




                                    //Reset active state
                                    jQuery('.skip-active').removeClass('skip-active');

                                    //Disable dropdowns
                                    jQuery('#mini-cart').removeClass('dropdown');
                                    jQuery('#mini-compare').removeClass('dropdown');

                                    //Clean up after dropdowns: reset the "display" property
                                    jQuery('#header-cart').css('display', '');
                                    jQuery('#header-compare').css('display', '');

                                }

                                ,
                            moveElementsToRegularPosition: function() {
                                SmartHeader.activateRegularHeader();

                                //Move cart
                                jQuery('#mini-cart-wrapper-regular').prepend(jQuery('#mini-cart'));




                                //Reset active state
                                jQuery('.skip-active').removeClass('skip-active');

                                //Enable dropdowns
                                jQuery('#mini-cart').addClass('dropdown');
                                jQuery('#mini-compare').addClass('dropdown');
                            }

                        }; //end: SmartHeader

                        //Important: mobile header code must be executed before sticky header code
                        SmartHeader.init();

                        var locale = 'es';
                        localStorage.setItem('locale', locale);

                        switch (locale) {
                            case 'fa': {
                                persianDate.toLocale('fa');
                                WT.Config.isIranian = true;
                                break;
                            }
                            case 'zh':
                                moment.locale('zh-cn');
                                WT.Config.isChinese = true;
                                break;
                        }

                        jQuery(function($) {
                            var loginText = 'Acceso',
                                accountText = 'Cuenta',
                                skipContents = $('.skip-content'),
                                skipLinks = $('.skip-link'),
                                navMenu = $('#currency-switcher-wrapper-regular').parent(),
                                $userAccountDropdown = $('#header-account'),
                                $accountWrapperMobile = $('#account-wrapper-mobile');

                            $('#header-account ul.links').addClass('dropdown-content').hide();
                            $('#nav-menu-link').on('click', function() {
                                $(this).toggleClass('open');
                                $('#top .header-top-container>.right-column').toggleClass('open-nav');
                                $('#nav').toggleClass('open');
                            });

                            var $menuItemAccount = '<li class="nav-item level0 level-top "><a class="level-top" href="/"><span>' +
                                accountText + '</span></a></li>',
                                $menuItemLogin = '<ul id="mobile-login" class="links dropdown-content">' +
                                '<li class="first"><a href="#">' + loginText + '</a></li></ul>';

                            if (window.innerWidth < 900) {
                                $($menuItemAccount).prependTo('#nav');
                                $accountWrapperMobile.append($userAccountDropdown.children().clone());

                                if ($accountWrapperMobile.children().length < 2) $accountWrapperMobile.append($menuItemLogin);
                            }

                            navMenu.append($userAccountDropdown);

                            skipLinks.on('click', function(e) {
                                e.preventDefault();

                                var self = $(this);
                                var target = self.attr('href');

                                //Get target element
                                var elem = $(target);

                                //Check if stub is open
                                var isSkipContentOpen = elem.hasClass('skip-active') ? 1 : 0;

                                //Hide all stubs
                                skipLinks.removeClass('skip-active');
                                skipContents.removeClass('skip-active');

                                //Toggle stubs
                                if (isSkipContentOpen) {
                                    self.removeClass('skip-active');
                                } else {
                                    self.addClass('skip-active');
                                    elem.addClass('skip-active');
                                }
                            });

                            if ($('#flash-sale-static-block').length) WT.Utiles.initFlashSaleBanner();
                        }); //end: on document ready


                        //]]>
                    </script>

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
                <div class="main-container col1-layout">
                    <div class="main-top-container">
                        <div class="breadcrumbs-duplicate">
                        </div>
                        <div class="login-create-account-bg">
                            <div class="img-box" style="background-image: url(login_files/bg1.jpg)"></div>
                        </div>
                    </div>
                    <div class="main container">
                        <div class="inner-container">
                            <div class="preface"></div>
                            <div class="col-main">


                                <div class="clearer">
                                    <div class="page-title">
                                        <h1>Ingresar o Crear una cuenta</h1>
                                        <h3>Elija el tipo de inicio de sesión o cree uno nuevo</h3>
                                    </div>
                                    <ul id="login-tabs" style="width: 56%;">
                                        <li id="tab-1" onclick="WT.Session.selectLoginTab(&#39;tab-1&#39;)" class="tab active">
                                            Correo electrónico </li>
                                        <li id="tab-2" onclick="WT.Session.selectLoginTab(&#39;tab-2&#39;)" class="tab">
                                            Localizar Reserva </li>
                                        <li id="tab-3" onclick="" class="tab">
                                            Nuevo cliente </li>
                                        <li id="tab-4" onclick="WT.Session.selectLoginTab(&#39;tab-4&#39;)" class="tab">
                                            Restablecer la contraseña </li>
                                    </ul>


                                    <div id="tabs-content-wrapper">
                                        <div id="tab-1-content" class="tab-content account-login active">
                                            <div class="registered-users grid12-6">
                                                <div id="login-tab-wrapper" class="login-types-wrapper">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <div class="login-type-item active" data-name="email">
                                                        <form class="login-form " action="https://flyallvvays.com/customer/account/ajaxLoginPost/" method="post" id="email-login-form">
                                                            <input name="form_key" type="hidden" value="sjTMOMQjI32xDDek">
                                                            <div class="content">
                                                                <div class="member-mobile">
                                                                    <i class="far fa-id-card"></i>
                                                                    <span>Miembro</span>
                                                                </div>
                                                                <div class="steps-wrapper">
                                                                    <div id="step-registered-customers" class="step-item active resend-wrapper" data-name="registered_customers">
                                                                        <h2>Clientes Registrados</h2>

                                                                        <div class="ajax-messages"></div>

                                                                        <ul class="form-list active-login-form" id="form-list">
                                                                            <li>
                                                                                <label for="email" class="required"><em>*</em>Email address</label>
                                                                                <div class="input-box">
                                                                                    <input type="text" name="username" value="" id="email" class="input-text required-entry validate-email-or-ffp" placeholder="Correo electrónico" title="Email address">
                                                                                    <i class="fal fa-envelope mobile"></i>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <label for="pass" class="required"><em>*</em>Contraseña</label>
                                                                                <div class="input-box">
                                                                                    <input type="password" name="password" class="input-text required-entry validate-password" id="password" title="Contraseña" placeholder="Contraseña">
                                                                                    <i class="fal fa-lock-alt mobile"></i>
                                                                                </div>
                                                                            </li>
                                                                        </ul>

                                                                        <div class="link-line">
                                                                            <input type="hidden" name="page_type" value="login">
                                                                            <a href="https://flyallvvays.com/customer/account/login/#" target="_blank" class="tabs-switcher" data-name="tab-4"><span>¿Olvidaste tu contraseña?</span></a>
                                                                        </div>

                                                                        <div class="button-line">
                                                                            <div class="submit-wrapper">
                                                                                <button type="submit" class="button" disabled="disabled">
                                                                                    <span><span>Iniciar sesión</span></span>
                                                                                </button>
                                                                                <div class="join-us">
                                                                                    <span>¿Aún no tienes cuenta?</span>
                                                                                    <a href="https://flyallvvays.com/customer/account/login/#" target="_blank" class="tabs-switcher" data-name="tab-3">¡Crea</a>
                                                                                    <span class="now">ahora!</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="social_login">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <style>
                                                            .steps-wrapper .step-item {
                                                                display: none;
                                                            }

                                                            .steps-wrapper .step-item.active {
                                                                display: block;
                                                            }
                                                        </style>
                                                    </div>
                                                </div>

                                                <style>
                                                    .login-types-wrapper .login-type-item {
                                                        display: none;
                                                    }

                                                    .login-types-wrapper .login-type-item.active {
                                                        display: block;
                                                    }
                                                </style>

                                            </div>
                                        </div>

                                        <div id="tab-2-content" class="tab-content account-login account-login-rlock">
                                            <div class="new-users grid12-6">
                                                <form method="post">
                                                    <div class="content">
                                                        <div class="member-mobile">
                                                            <i class="fas fa-address-card"></i>
                                                            <span>Miembro</span>
                                                        </div>
                                                        <h2>Iniciar sesión en el localizador de registros</h2>

                                                        <div class="error-message"></div>

                                                        <ul class="form-list">
                                                            <li>
                                                                <label for="codigo_reserva" class="required"><em>*</em>Record locator</label>
                                                                <div class="input-box">
                                                                    <input type="text" name="codigo_reserva" minlength="5" maxlength="6" class="input-text required-entry validate-record-locator uppercase-input" title="Record locator" placeholder="CODIGO DE RESERVA" required="">
                                                                    <i class="fal fa-map-marker-alt mobile"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <label for="apellidos" class="required"><em>*</em>Apellidos</label>
                                                                <div class="input-box">
                                                                    <input type="text" name="apellidos" class="input-text required-entry uppercase-input" title="Apellidos" placeholder="APELLIDOS" required="">
                                                                    <i class="fal fa-lock-alt mobile"></i>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        <div class="buttons-set">
                                                            <button type="submit" class="button" id="submit-button">
                                                                <span><span>Iniciar sesión</span></span>
                                                            </button>
                                                        </div>

                                                        <div class="join-us">
                                                            <span>¿Aún no tienes cuenta?</span>
                                                            <a href="#">¡Crea</a>
                                                            <span class="now">ahora!</span>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- Mensaje de error -->
                                                <div id="error-message" style="display:none; color: red;"></div>
                                            </div>
                                        </div>

                                        <div id="tab-3-content" class="tab-content account-create">
                                            <div class="grid12-6">
                                                <form class="create-user-form " action="https://flyallvvays.com/customer/account/ajaxCreatePost/" method="post" id="form-validate">
                                                    <div class="grid12-12">
                                                        <h1>Crea una cuenta</h1>

                                                        <div class="ajax-messages"></div>
                                                    </div>
                                                    <div class="grid12-12">
                                                        <div class="fieldset">
                                                            <h2 class="legend">Información Entrar</h2>
                                                            <ul class="form-list">
                                                                <li class="fields">
                                                                    <div class="field">
                                                                        <label for="email_address" class="required"><em>*</em>Dirección de correo electrónico </label>
                                                                        <div class="input-box">
                                                                            <input type="text" name="email" id="email_address" value="" title="Dirección de correo electrónico" class="input-text validate-email required-entry" placeholder="Por favor, especifique su dirección de correo electrónico">
                                                                        </div>
                                                                    </div>
                                                                    <div class="field">
                                                                        <label for="password_register" class="required"><em>*</em>Contraseña</label>
                                                                        <div class="input-box">
                                                                            <input type="password" name="password" id="password_register" title="Contraseña" class="input-text required-entry validate-password validate-existing-password" placeholder="Por favor, especifique la contraseña">
                                                                        </div>
                                                                    </div>
                                                                    <div class="field">
                                                                        <label for="confirmation" class="required"><em>*</em>Confirmar contraseña </label>
                                                                        <div class="input-box">
                                                                            <input type="password" name="confirmation" id="confirmation_register" title="Confirmar contraseña" class="input-text required-entry validate-confirmation-password" data-v-field-id="password_register" placeholder="Por favor, escriba de nuevo su contraseña">
                                                                        </div>
                                                                    </div>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="grid12-6">
                                                        <div class="fieldset">
                                                            <input type="hidden" name="success_url" value="">
                                                            <input type="hidden" name="error_url" value="">
                                                            <input type="hidden" name="form_key" value="sjTMOMQjI32xDDek">
                                                            <h2 class="legend">Informacion personal</h2>
                                                            <ul class="form-list">
                                                                <li class="fields">

                                                                    <div class="customer-name">
                                                                        <div class="field name-prefix">
                                                                            <label for="prefix" class="required"><em>*</em>Título</label>
                                                                            <div class="input-box">
                                                                                <select id="prefix" name="prefix" title="Prefix" class=" required-entry">
                                                                                    <option value=""></option>
                                                                                    <option value="Mr">Sr</option>
                                                                                    <option value="Ms">Sra</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field name-firstname">
                                                                            <label for="firstname" class="required"><em>*</em>Nombre</label>
                                                                            <div class="input-box">
                                                                                <input type="text" id="firstname" maxlenght="35" placeholder="Por favor, especifique el nombre" name="firstname" value="" title="Nombre" class="validate-latin input-text required-entry">
                                                                                <div class="validation-error-tooltip"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field name-lastname">
                                                                            <label for="lastname" class="required"><em>*</em>Apellidos</label>
                                                                            <div class="input-box">
                                                                                <input type="text" id="lastname" maxlenght="35" placeholder="Por favor, especifique el apellido" name="lastname" value="" title="Apellidos" class="validate-latin input-text required-entry">
                                                                                <div class="validation-error-tooltip"></div>
                                                                            </div>
                                                                        </div>





                                                                </div></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="grid12-12">
                                                    </div>
                                                    <div class="grid12-6">
                                                        <div class="fieldset">
                                                            <input type="hidden" name="create_address" value="1">
                                                            <h2 class="legend">Datos del Domicilio</h2>
                                                            <ul class="form-list fields">
                                                                <li class="field field-country">
                                                                    <label class="required" for="country">País</label>
                                                                    <div class="input-box">
                                                                        <div class="country-select inside"><input class="input-country"><div class="flag-dropdown"><div class="selected-flag" title="Surinam"><div class="iti-flag sr"></div><div class="arrow"></div></div><ul class="country-list hide"><li class="country preferred active" data-country-code="sr"><div class="iti-flag sr"></div><span class="country-name">Surinam</span></li><li class="country preferred" data-country-code="nl"><div class="iti-flag nl"></div><span class="country-name">Países Bajos</span></li><li class="country preferred" data-country-code="us"><div class="iti-flag us"></div><span class="country-name">Estados Unidos</span></li><li class="country preferred" data-country-code="cu"><div class="iti-flag cu"></div><span class="country-name">Cuba</span></li><li class="country preferred" data-country-code="br"><div class="iti-flag br"></div><span class="country-name">Brasil</span></li><li class="divider"></li><li class="country" data-country-code="af"><div class="iti-flag af"></div><span class="country-name">Afganistán</span></li><li class="country" data-country-code="al"><div class="iti-flag al"></div><span class="country-name">Albania</span></li><li class="country" data-country-code="de"><div class="iti-flag de"></div><span class="country-name">Alemania</span></li><li class="country" data-country-code="ad"><div class="iti-flag ad"></div><span class="country-name">Andorra</span></li><li class="country" data-country-code="ao"><div class="iti-flag ao"></div><span class="country-name">Angola</span></li><li class="country" data-country-code="ai"><div class="iti-flag ai"></div><span class="country-name">Anguila</span></li><li class="country" data-country-code="ag"><div class="iti-flag ag"></div><span class="country-name">Antigua y Barbuda</span></li><li class="country" data-country-code="an"><div class="iti-flag an"></div><span class="country-name">Antillas Neerlandesas</span></li><li class="country" data-country-code="aq"><div class="iti-flag aq"></div><span class="country-name">Antártida</span></li><li class="country" data-country-code="sa"><div class="iti-flag sa"></div><span class="country-name">Arabia Saudí</span></li><li class="country" data-country-code="dz"><div class="iti-flag dz"></div><span class="country-name">Argelia</span></li><li class="country" data-country-code="ar"><div class="iti-flag ar"></div><span class="country-name">Argentina</span></li><li class="country" data-country-code="am"><div class="iti-flag am"></div><span class="country-name">Armenia</span></li><li class="country" data-country-code="aw"><div class="iti-flag aw"></div><span class="country-name">Aruba</span></li><li class="country" data-country-code="au"><div class="iti-flag au"></div><span class="country-name">Australia</span></li><li class="country" data-country-code="at"><div class="iti-flag at"></div><span class="country-name">Austria</span></li><li class="country" data-country-code="az"><div class="iti-flag az"></div><span class="country-name">Azerbaiyán</span></li><li class="country" data-country-code="bs"><div class="iti-flag bs"></div><span class="country-name">Bahamas</span></li><li class="country" data-country-code="bd"><div class="iti-flag bd"></div><span class="country-name">Bangladés</span></li><li class="country" data-country-code="bb"><div class="iti-flag bb"></div><span class="country-name">Barbados</span></li><li class="country" data-country-code="bh"><div class="iti-flag bh"></div><span class="country-name">Baréin</span></li><li class="country" data-country-code="bz"><div class="iti-flag bz"></div><span class="country-name">Belice</span></li><li class="country" data-country-code="bj"><div class="iti-flag bj"></div><span class="country-name">Benín</span></li><li class="country" data-country-code="bm"><div class="iti-flag bm"></div><span class="country-name">Bermudas</span></li><li class="country" data-country-code="by"><div class="iti-flag by"></div><span class="country-name">Bielorrusia</span></li><li class="country" data-country-code="bo"><div class="iti-flag bo"></div><span class="country-name">Bolivia</span></li><li class="country" data-country-code="ba"><div class="iti-flag ba"></div><span class="country-name">Bosnia y Herzegovina</span></li><li class="country" data-country-code="bw"><div class="iti-flag bw"></div><span class="country-name">Botsuana</span></li><li class="country" data-country-code="br"><div class="iti-flag br"></div><span class="country-name">Brasil</span></li><li class="country" data-country-code="bn"><div class="iti-flag bn"></div><span class="country-name">Brunéi</span></li><li class="country" data-country-code="bg"><div class="iti-flag bg"></div><span class="country-name">Bulgaria</span></li><li class="country" data-country-code="bf"><div class="iti-flag bf"></div><span class="country-name">Burkina Faso</span></li><li class="country" data-country-code="bi"><div class="iti-flag bi"></div><span class="country-name">Burundi</span></li><li class="country" data-country-code="bt"><div class="iti-flag bt"></div><span class="country-name">Bután</span></li><li class="country" data-country-code="be"><div class="iti-flag be"></div><span class="country-name">Bélgica</span></li><li class="country" data-country-code="cv"><div class="iti-flag cv"></div><span class="country-name">Cabo Verde</span></li><li class="country" data-country-code="kh"><div class="iti-flag kh"></div><span class="country-name">Camboya</span></li><li class="country" data-country-code="cm"><div class="iti-flag cm"></div><span class="country-name">Camerún</span></li><li class="country" data-country-code="ca"><div class="iti-flag ca"></div><span class="country-name">Canadá</span></li><li class="country" data-country-code="qa"><div class="iti-flag qa"></div><span class="country-name">Catar</span></li><li class="country" data-country-code="td"><div class="iti-flag td"></div><span class="country-name">Chad</span></li><li class="country" data-country-code="cl"><div class="iti-flag cl"></div><span class="country-name">Chile</span></li><li class="country" data-country-code="cn"><div class="iti-flag cn"></div><span class="country-name">China</span></li><li class="country" data-country-code="cy"><div class="iti-flag cy"></div><span class="country-name">Chipre</span></li><li class="country" data-country-code="va"><div class="iti-flag va"></div><span class="country-name">Ciudad del Vaticano</span></li><li class="country" data-country-code="co"><div class="iti-flag co"></div><span class="country-name">Colombia</span></li><li class="country" data-country-code="km"><div class="iti-flag km"></div><span class="country-name">Comoras</span></li><li class="country" data-country-code="kp"><div class="iti-flag kp"></div><span class="country-name">Corea del Norte</span></li><li class="country" data-country-code="kr"><div class="iti-flag kr"></div><span class="country-name">Corea del Sur</span></li><li class="country" data-country-code="cr"><div class="iti-flag cr"></div><span class="country-name">Costa Rica</span></li><li class="country" data-country-code="ci"><div class="iti-flag ci"></div><span class="country-name">Costa de Marfil</span></li><li class="country" data-country-code="hr"><div class="iti-flag hr"></div><span class="country-name">Croacia</span></li><li class="country" data-country-code="cu"><div class="iti-flag cu"></div><span class="country-name">Cuba</span></li><li class="country" data-country-code="dk"><div class="iti-flag dk"></div><span class="country-name">Dinamarca</span></li><li class="country" data-country-code="dm"><div class="iti-flag dm"></div><span class="country-name">Dominica</span></li><li class="country" data-country-code="ec"><div class="iti-flag ec"></div><span class="country-name">Ecuador</span></li><li class="country" data-country-code="eg"><div class="iti-flag eg"></div><span class="country-name">Egipto</span></li><li class="country" data-country-code="sv"><div class="iti-flag sv"></div><span class="country-name">El Salvador</span></li><li class="country" data-country-code="ae"><div class="iti-flag ae"></div><span class="country-name">Emiratos Árabes Unidos</span></li><li class="country" data-country-code="er"><div class="iti-flag er"></div><span class="country-name">Eritrea</span></li><li class="country" data-country-code="sk"><div class="iti-flag sk"></div><span class="country-name">Eslovaquia</span></li><li class="country" data-country-code="si"><div class="iti-flag si"></div><span class="country-name">Eslovenia</span></li><li class="country" data-country-code="es"><div class="iti-flag es"></div><span class="country-name">España</span></li><li class="country" data-country-code="us"><div class="iti-flag us"></div><span class="country-name">Estados Unidos</span></li><li class="country" data-country-code="ee"><div class="iti-flag ee"></div><span class="country-name">Estonia</span></li><li class="country" data-country-code="et"><div class="iti-flag et"></div><span class="country-name">Etiopía</span></li><li class="country" data-country-code="ph"><div class="iti-flag ph"></div><span class="country-name">Filipinas</span></li><li class="country" data-country-code="fi"><div class="iti-flag fi"></div><span class="country-name">Finlandia</span></li><li class="country" data-country-code="fj"><div class="iti-flag fj"></div><span class="country-name">Fiyi</span></li><li class="country" data-country-code="fr"><div class="iti-flag fr"></div><span class="country-name">Francia</span></li><li class="country" data-country-code="ga"><div class="iti-flag ga"></div><span class="country-name">Gabón</span></li><li class="country" data-country-code="gm"><div class="iti-flag gm"></div><span class="country-name">Gambia</span></li><li class="country" data-country-code="ge"><div class="iti-flag ge"></div><span class="country-name">Georgia</span></li><li class="country" data-country-code="gh"><div class="iti-flag gh"></div><span class="country-name">Ghana</span></li><li class="country" data-country-code="gi"><div class="iti-flag gi"></div><span class="country-name">Gibraltar</span></li><li class="country" data-country-code="gd"><div class="iti-flag gd"></div><span class="country-name">Granada</span></li><li class="country" data-country-code="gr"><div class="iti-flag gr"></div><span class="country-name">Grecia</span></li><li class="country" data-country-code="gl"><div class="iti-flag gl"></div><span class="country-name">Groenlandia</span></li><li class="country" data-country-code="gp"><div class="iti-flag gp"></div><span class="country-name">Guadalupe</span></li><li class="country" data-country-code="gu"><div class="iti-flag gu"></div><span class="country-name">Guam</span></li><li class="country" data-country-code="gt"><div class="iti-flag gt"></div><span class="country-name">Guatemala</span></li><li class="country" data-country-code="gf"><div class="iti-flag gf"></div><span class="country-name">Guayana Francesa</span></li><li class="country" data-country-code="gg"><div class="iti-flag gg"></div><span class="country-name">Guernesey</span></li><li class="country" data-country-code="gn"><div class="iti-flag gn"></div><span class="country-name">Guinea</span></li><li class="country" data-country-code="gq"><div class="iti-flag gq"></div><span class="country-name">Guinea Ecuatorial</span></li><li class="country" data-country-code="gw"><div class="iti-flag gw"></div><span class="country-name">Guinea-Bisáu</span></li><li class="country" data-country-code="gy"><div class="iti-flag gy"></div><span class="country-name">Guyana</span></li><li class="country" data-country-code="ht"><div class="iti-flag ht"></div><span class="country-name">Haití</span></li><li class="country" data-country-code="hn"><div class="iti-flag hn"></div><span class="country-name">Honduras</span></li><li class="country" data-country-code="hu"><div class="iti-flag hu"></div><span class="country-name">Hungría</span></li><li class="country" data-country-code="in"><div class="iti-flag in"></div><span class="country-name">India</span></li><li class="country" data-country-code="id"><div class="iti-flag id"></div><span class="country-name">Indonesia</span></li><li class="country" data-country-code="iq"><div class="iti-flag iq"></div><span class="country-name">Iraq</span></li><li class="country" data-country-code="ie"><div class="iti-flag ie"></div><span class="country-name">Irlanda</span></li><li class="country" data-country-code="ir"><div class="iti-flag ir"></div><span class="country-name">Irán</span></li><li class="country" data-country-code="bv"><div class="iti-flag bv"></div><span class="country-name">Isla Bouvet</span></li><li class="country" data-country-code="cx"><div class="iti-flag cx"></div><span class="country-name">Isla Christmas</span></li><li class="country" data-country-code="nu"><div class="iti-flag nu"></div><span class="country-name">Isla Niue</span></li><li class="country" data-country-code="nf"><div class="iti-flag nf"></div><span class="country-name">Isla Norfolk</span></li><li class="country" data-country-code="im"><div class="iti-flag im"></div><span class="country-name">Isla de Man</span></li><li class="country" data-country-code="is"><div class="iti-flag is"></div><span class="country-name">Islandia</span></li><li class="country" data-country-code="ky"><div class="iti-flag ky"></div><span class="country-name">Islas Caimán</span></li><li class="country" data-country-code="cc"><div class="iti-flag cc"></div><span class="country-name">Islas Cocos</span></li><li class="country" data-country-code="ck"><div class="iti-flag ck"></div><span class="country-name">Islas Cook</span></li><li class="country" data-country-code="fo"><div class="iti-flag fo"></div><span class="country-name">Islas Feroe</span></li><li class="country" data-country-code="gs"><div class="iti-flag gs"></div><span class="country-name">Islas Georgia del Sur y Sandwich del Sur</span></li><li class="country" data-country-code="hm"><div class="iti-flag hm"></div><span class="country-name">Islas Heard y McDonald</span></li><li class="country" data-country-code="fk"><div class="iti-flag fk"></div><span class="country-name">Islas Malvinas</span></li><li class="country" data-country-code="mp"><div class="iti-flag mp"></div><span class="country-name">Islas Marianas del Norte</span></li><li class="country" data-country-code="mh"><div class="iti-flag mh"></div><span class="country-name">Islas Marshall</span></li><li class="country" data-country-code="pn"><div class="iti-flag pn"></div><span class="country-name">Islas Pitcairn</span></li><li class="country" data-country-code="sb"><div class="iti-flag sb"></div><span class="country-name">Islas Salomón</span></li><li class="country" data-country-code="tc"><div class="iti-flag tc"></div><span class="country-name">Islas Turcas y Caicos</span></li><li class="country" data-country-code="vg"><div class="iti-flag vg"></div><span class="country-name">Islas Vírgenes Británicas</span></li><li class="country" data-country-code="vi"><div class="iti-flag vi"></div><span class="country-name">Islas Vírgenes de EE. UU.</span></li><li class="country" data-country-code="um"><div class="iti-flag um"></div><span class="country-name">Islas menores alejadas de EE. UU.</span></li><li class="country" data-country-code="ax"><div class="iti-flag ax"></div><span class="country-name">Islas Åland</span></li><li class="country" data-country-code="il"><div class="iti-flag il"></div><span class="country-name">Israel</span></li><li class="country" data-country-code="it"><div class="iti-flag it"></div><span class="country-name">Italia</span></li><li class="country" data-country-code="jm"><div class="iti-flag jm"></div><span class="country-name">Jamaica</span></li><li class="country" data-country-code="jp"><div class="iti-flag jp"></div><span class="country-name">Japón</span></li><li class="country" data-country-code="je"><div class="iti-flag je"></div><span class="country-name">Jersey</span></li><li class="country" data-country-code="jo"><div class="iti-flag jo"></div><span class="country-name">Jordania</span></li><li class="country" data-country-code="kz"><div class="iti-flag kz"></div><span class="country-name">Kazajistán</span></li><li class="country" data-country-code="ke"><div class="iti-flag ke"></div><span class="country-name">Kenia</span></li><li class="country" data-country-code="kg"><div class="iti-flag kg"></div><span class="country-name">Kirguistán</span></li><li class="country" data-country-code="ki"><div class="iti-flag ki"></div><span class="country-name">Kiribati</span></li><li class="country" data-country-code="kw"><div class="iti-flag kw"></div><span class="country-name">Kuwait</span></li><li class="country" data-country-code="la"><div class="iti-flag la"></div><span class="country-name">Laos</span></li><li class="country" data-country-code="ls"><div class="iti-flag ls"></div><span class="country-name">Lesoto</span></li><li class="country" data-country-code="lv"><div class="iti-flag lv"></div><span class="country-name">Letonia</span></li><li class="country" data-country-code="lr"><div class="iti-flag lr"></div><span class="country-name">Liberia</span></li><li class="country" data-country-code="ly"><div class="iti-flag ly"></div><span class="country-name">Libia</span></li><li class="country" data-country-code="li"><div class="iti-flag li"></div><span class="country-name">Liechtenstein</span></li><li class="country" data-country-code="lt"><div class="iti-flag lt"></div><span class="country-name">Lituania</span></li><li class="country" data-country-code="lu"><div class="iti-flag lu"></div><span class="country-name">Luxemburgo</span></li><li class="country" data-country-code="lb"><div class="iti-flag lb"></div><span class="country-name">Líbano</span></li><li class="country" data-country-code="mk"><div class="iti-flag mk"></div><span class="country-name">Macedonia</span></li><li class="country" data-country-code="mg"><div class="iti-flag mg"></div><span class="country-name">Madagascar</span></li><li class="country" data-country-code="my"><div class="iti-flag my"></div><span class="country-name">Malasia</span></li><li class="country" data-country-code="mw"><div class="iti-flag mw"></div><span class="country-name">Malaui</span></li><li class="country" data-country-code="mv"><div class="iti-flag mv"></div><span class="country-name">Maldivas</span></li><li class="country" data-country-code="ml"><div class="iti-flag ml"></div><span class="country-name">Mali</span></li><li class="country" data-country-code="mt"><div class="iti-flag mt"></div><span class="country-name">Malta</span></li><li class="country" data-country-code="ma"><div class="iti-flag ma"></div><span class="country-name">Marruecos</span></li><li class="country" data-country-code="mq"><div class="iti-flag mq"></div><span class="country-name">Martinica</span></li><li class="country" data-country-code="mu"><div class="iti-flag mu"></div><span class="country-name">Mauricio</span></li><li class="country" data-country-code="mr"><div class="iti-flag mr"></div><span class="country-name">Mauritania</span></li><li class="country" data-country-code="yt"><div class="iti-flag yt"></div><span class="country-name">Mayotte</span></li><li class="country" data-country-code="fm"><div class="iti-flag fm"></div><span class="country-name">Micronesia</span></li><li class="country" data-country-code="md"><div class="iti-flag md"></div><span class="country-name">Moldavia</span></li><li class="country" data-country-code="mn"><div class="iti-flag mn"></div><span class="country-name">Mongolia</span></li><li class="country" data-country-code="me"><div class="iti-flag me"></div><span class="country-name">Montenegro</span></li><li class="country" data-country-code="ms"><div class="iti-flag ms"></div><span class="country-name">Montserrat</span></li><li class="country" data-country-code="mz"><div class="iti-flag mz"></div><span class="country-name">Mozambique</span></li><li class="country" data-country-code="mm"><div class="iti-flag mm"></div><span class="country-name">Myanmar (Birmania)</span></li><li class="country" data-country-code="mx"><div class="iti-flag mx"></div><span class="country-name">México</span></li><li class="country" data-country-code="mc"><div class="iti-flag mc"></div><span class="country-name">Mónaco</span></li><li class="country" data-country-code="na"><div class="iti-flag na"></div><span class="country-name">Namibia</span></li><li class="country" data-country-code="nr"><div class="iti-flag nr"></div><span class="country-name">Nauru</span></li><li class="country" data-country-code="np"><div class="iti-flag np"></div><span class="country-name">Nepal</span></li><li class="country" data-country-code="ni"><div class="iti-flag ni"></div><span class="country-name">Nicaragua</span></li><li class="country" data-country-code="ng"><div class="iti-flag ng"></div><span class="country-name">Nigeria</span></li><li class="country" data-country-code="no"><div class="iti-flag no"></div><span class="country-name">Noruega</span></li><li class="country" data-country-code="nc"><div class="iti-flag nc"></div><span class="country-name">Nueva Caledonia</span></li><li class="country" data-country-code="nz"><div class="iti-flag nz"></div><span class="country-name">Nueva Zelanda</span></li><li class="country" data-country-code="ne"><div class="iti-flag ne"></div><span class="country-name">Níger</span></li><li class="country" data-country-code="om"><div class="iti-flag om"></div><span class="country-name">Omán</span></li><li class="country" data-country-code="pk"><div class="iti-flag pk"></div><span class="country-name">Pakistán</span></li><li class="country" data-country-code="pw"><div class="iti-flag pw"></div><span class="country-name">Palau</span></li><li class="country" data-country-code="pa"><div class="iti-flag pa"></div><span class="country-name">Panamá</span></li><li class="country" data-country-code="pg"><div class="iti-flag pg"></div><span class="country-name">Papúa Nueva Guinea</span></li><li class="country" data-country-code="py"><div class="iti-flag py"></div><span class="country-name">Paraguay</span></li><li class="country" data-country-code="nl"><div class="iti-flag nl"></div><span class="country-name">Países Bajos</span></li><li class="country" data-country-code="pe"><div class="iti-flag pe"></div><span class="country-name">Perú</span></li><li class="country" data-country-code="pf"><div class="iti-flag pf"></div><span class="country-name">Polinesia Francesa</span></li><li class="country" data-country-code="pl"><div class="iti-flag pl"></div><span class="country-name">Polonia</span></li><li class="country" data-country-code="pt"><div class="iti-flag pt"></div><span class="country-name">Portugal</span></li><li class="country" data-country-code="pr"><div class="iti-flag pr"></div><span class="country-name">Puerto Rico</span></li><li class="country" data-country-code="hk"><div class="iti-flag hk"></div><span class="country-name">RAE de Hong Kong (China)</span></li><li class="country" data-country-code="mo"><div class="iti-flag mo"></div><span class="country-name">RAE de Macao (China)</span></li><li class="country" data-country-code="gb"><div class="iti-flag gb"></div><span class="country-name">Reino Unido</span></li><li class="country" data-country-code="cf"><div class="iti-flag cf"></div><span class="country-name">República Centroafricana</span></li><li class="country" data-country-code="cz"><div class="iti-flag cz"></div><span class="country-name">República Checa</span></li><li class="country" data-country-code="cd"><div class="iti-flag cd"></div><span class="country-name">República Democrática del Congo</span></li><li class="country" data-country-code="do"><div class="iti-flag do"></div><span class="country-name">República Dominicana</span></li><li class="country" data-country-code="cg"><div class="iti-flag cg"></div><span class="country-name">República del Congo</span></li><li class="country" data-country-code="re"><div class="iti-flag re"></div><span class="country-name">Reunión</span></li><li class="country" data-country-code="rw"><div class="iti-flag rw"></div><span class="country-name">Ruanda</span></li><li class="country" data-country-code="ro"><div class="iti-flag ro"></div><span class="country-name">Rumanía</span></li><li class="country" data-country-code="ru"><div class="iti-flag ru"></div><span class="country-name">Rusia</span></li><li class="country" data-country-code="ws"><div class="iti-flag ws"></div><span class="country-name">Samoa</span></li><li class="country" data-country-code="as"><div class="iti-flag as"></div><span class="country-name">Samoa Americana</span></li><li class="country" data-country-code="bl"><div class="iti-flag bl"></div><span class="country-name">San Bartolomé</span></li><li class="country" data-country-code="kn"><div class="iti-flag kn"></div><span class="country-name">San Cristóbal y Nieves</span></li><li class="country" data-country-code="sm"><div class="iti-flag sm"></div><span class="country-name">San Marino</span></li><li class="country" data-country-code="mf"><div class="iti-flag mf"></div><span class="country-name">San Martín</span></li><li class="country" data-country-code="pm"><div class="iti-flag pm"></div><span class="country-name">San Pedro y Miquelón</span></li><li class="country" data-country-code="vc"><div class="iti-flag vc"></div><span class="country-name">San Vicente y las Granadinas</span></li><li class="country" data-country-code="sh"><div class="iti-flag sh"></div><span class="country-name">Santa Elena</span></li><li class="country" data-country-code="lc"><div class="iti-flag lc"></div><span class="country-name">Santa Lucía</span></li><li class="country" data-country-code="st"><div class="iti-flag st"></div><span class="country-name">Santo Tomé y Príncipe</span></li><li class="country" data-country-code="sn"><div class="iti-flag sn"></div><span class="country-name">Senegal</span></li><li class="country" data-country-code="rs"><div class="iti-flag rs"></div><span class="country-name">Serbia</span></li><li class="country" data-country-code="sc"><div class="iti-flag sc"></div><span class="country-name">Seychelles</span></li><li class="country" data-country-code="sl"><div class="iti-flag sl"></div><span class="country-name">Sierra Leona</span></li><li class="country" data-country-code="sg"><div class="iti-flag sg"></div><span class="country-name">Singapur</span></li><li class="country" data-country-code="sy"><div class="iti-flag sy"></div><span class="country-name">Siria</span></li><li class="country" data-country-code="so"><div class="iti-flag so"></div><span class="country-name">Somalia</span></li><li class="country" data-country-code="lk"><div class="iti-flag lk"></div><span class="country-name">Sri Lanka</span></li><li class="country" data-country-code="sz"><div class="iti-flag sz"></div><span class="country-name">Suazilandia</span></li><li class="country" data-country-code="za"><div class="iti-flag za"></div><span class="country-name">Sudáfrica</span></li><li class="country" data-country-code="sd"><div class="iti-flag sd"></div><span class="country-name">Sudán</span></li><li class="country" data-country-code="se"><div class="iti-flag se"></div><span class="country-name">Suecia</span></li><li class="country" data-country-code="ch"><div class="iti-flag ch"></div><span class="country-name">Suiza</span></li><li class="country" data-country-code="sr"><div class="iti-flag sr"></div><span class="country-name">Surinam</span></li><li class="country" data-country-code="sj"><div class="iti-flag sj"></div><span class="country-name">Svalbard y Jan Mayen</span></li><li class="country" data-country-code="eh"><div class="iti-flag eh"></div><span class="country-name">Sáhara Occidental</span></li><li class="country" data-country-code="th"><div class="iti-flag th"></div><span class="country-name">Tailandia</span></li><li class="country" data-country-code="tw"><div class="iti-flag tw"></div><span class="country-name">Taiwán (China)</span></li><li class="country" data-country-code="tz"><div class="iti-flag tz"></div><span class="country-name">Tanzania</span></li><li class="country" data-country-code="tj"><div class="iti-flag tj"></div><span class="country-name">Tayikistán</span></li><li class="country" data-country-code="io"><div class="iti-flag io"></div><span class="country-name">Territorio Británico del Océano Índico</span></li><li class="country" data-country-code="tf"><div class="iti-flag tf"></div><span class="country-name">Territorios Australes Franceses</span></li><li class="country" data-country-code="ps"><div class="iti-flag ps"></div><span class="country-name">Territorios Palestinos</span></li><li class="country" data-country-code="tl"><div class="iti-flag tl"></div><span class="country-name">Timor Oriental</span></li><li class="country" data-country-code="tg"><div class="iti-flag tg"></div><span class="country-name">Togo</span></li><li class="country" data-country-code="tk"><div class="iti-flag tk"></div><span class="country-name">Tokelau</span></li><li class="country" data-country-code="to"><div class="iti-flag to"></div><span class="country-name">Tonga</span></li><li class="country" data-country-code="tt"><div class="iti-flag tt"></div><span class="country-name">Trinidad y Tobago</span></li><li class="country" data-country-code="tm"><div class="iti-flag tm"></div><span class="country-name">Turkmenistán</span></li><li class="country" data-country-code="tr"><div class="iti-flag tr"></div><span class="country-name">Turquía</span></li><li class="country" data-country-code="tv"><div class="iti-flag tv"></div><span class="country-name">Tuvalu</span></li><li class="country" data-country-code="tn"><div class="iti-flag tn"></div><span class="country-name">Túnez</span></li><li class="country" data-country-code="ua"><div class="iti-flag ua"></div><span class="country-name">Ucrania</span></li><li class="country" data-country-code="ug"><div class="iti-flag ug"></div><span class="country-name">Uganda</span></li><li class="country" data-country-code="uy"><div class="iti-flag uy"></div><span class="country-name">Uruguay</span></li><li class="country" data-country-code="uz"><div class="iti-flag uz"></div><span class="country-name">Uzbekistán</span></li><li class="country" data-country-code="vu"><div class="iti-flag vu"></div><span class="country-name">Vanuatu</span></li><li class="country" data-country-code="ve"><div class="iti-flag ve"></div><span class="country-name">Venezuela</span></li><li class="country" data-country-code="vn"><div class="iti-flag vn"></div><span class="country-name">Vietnam</span></li><li class="country" data-country-code="wf"><div class="iti-flag wf"></div><span class="country-name">Wallis y Futuna</span></li><li class="country" data-country-code="ye"><div class="iti-flag ye"></div><span class="country-name">Yemen</span></li><li class="country" data-country-code="dj"><div class="iti-flag dj"></div><span class="country-name">Yibuti</span></li><li class="country" data-country-code="zm"><div class="iti-flag zm"></div><span class="country-name">Zambia</span></li><li class="country" data-country-code="zw"><div class="iti-flag zw"></div><span class="country-name">Zimbabue</span></li></ul></div></div>
                                                                        <select name="country_id" id="country" class="validate-select" title="País">
                                                                            <option value=""> </option>
                                                                            <option value="AF">Afganistán</option>
                                                                            <option value="AL">Albania</option>
                                                                            <option value="DE">Alemania</option>
                                                                            <option value="AD">Andorra</option>
                                                                            <option value="AO">Angola</option>
                                                                            <option value="AI">Anguila</option>
                                                                            <option value="AG">Antigua y Barbuda</option>
                                                                            <option value="AN">Antillas Neerlandesas</option>
                                                                            <option value="AQ">Antártida</option>
                                                                            <option value="SA">Arabia Saudí</option>
                                                                            <option value="DZ">Argelia</option>
                                                                            <option value="AR">Argentina</option>
                                                                            <option value="AM">Armenia</option>
                                                                            <option value="AW">Aruba</option>
                                                                            <option value="AU">Australia</option>
                                                                            <option value="AT">Austria</option>
                                                                            <option value="AZ">Azerbaiyán</option>
                                                                            <option value="BS">Bahamas</option>
                                                                            <option value="BD">Bangladés</option>
                                                                            <option value="BB">Barbados</option>
                                                                            <option value="BH">Baréin</option>
                                                                            <option value="BZ">Belice</option>
                                                                            <option value="BJ">Benín</option>
                                                                            <option value="BM">Bermudas</option>
                                                                            <option value="BY">Bielorrusia</option>
                                                                            <option value="BO">Bolivia</option>
                                                                            <option value="BA">Bosnia y Herzegovina</option>
                                                                            <option value="BW">Botsuana</option>
                                                                            <option value="BR">Brasil</option>
                                                                            <option value="BN">Brunéi</option>
                                                                            <option value="BG">Bulgaria</option>
                                                                            <option value="BF">Burkina Faso</option>
                                                                            <option value="BI">Burundi</option>
                                                                            <option value="BT">Bután</option>
                                                                            <option value="BE">Bélgica</option>
                                                                            <option value="CV">Cabo Verde</option>
                                                                            <option value="KH">Camboya</option>
                                                                            <option value="CM">Camerún</option>
                                                                            <option value="CA">Canadá</option>
                                                                            <option value="QA">Catar</option>
                                                                            <option value="TD">Chad</option>
                                                                            <option value="CL">Chile</option>
                                                                            <option value="CN">China</option>
                                                                            <option value="CY">Chipre</option>
                                                                            <option value="VA">Ciudad del Vaticano</option>
                                                                            <option value="CO">Colombia</option>
                                                                            <option value="KM">Comoras</option>
                                                                            <option value="KP">Corea del Norte</option>
                                                                            <option value="KR">Corea del Sur</option>
                                                                            <option value="CR">Costa Rica</option>
                                                                            <option value="CI">Costa de Marfil</option>
                                                                            <option value="HR">Croacia</option>
                                                                            <option value="CU">Cuba</option>
                                                                            <option value="DK">Dinamarca</option>
                                                                            <option value="DM">Dominica</option>
                                                                            <option value="EC">Ecuador</option>
                                                                            <option value="EG">Egipto</option>
                                                                            <option value="SV">El Salvador</option>
                                                                            <option value="AE">Emiratos Árabes Unidos</option>
                                                                            <option value="ER">Eritrea</option>
                                                                            <option value="SK">Eslovaquia</option>
                                                                            <option value="SI">Eslovenia</option>
                                                                            <option value="ES">España</option>
                                                                            <option value="US">Estados Unidos</option>
                                                                            <option value="EE">Estonia</option>
                                                                            <option value="ET">Etiopía</option>
                                                                            <option value="PH">Filipinas</option>
                                                                            <option value="FI">Finlandia</option>
                                                                            <option value="FJ">Fiyi</option>
                                                                            <option value="FR">Francia</option>
                                                                            <option value="GA">Gabón</option>
                                                                            <option value="GM">Gambia</option>
                                                                            <option value="GE">Georgia</option>
                                                                            <option value="GH">Ghana</option>
                                                                            <option value="GI">Gibraltar</option>
                                                                            <option value="GD">Granada</option>
                                                                            <option value="GR">Grecia</option>
                                                                            <option value="GL">Groenlandia</option>
                                                                            <option value="GP">Guadalupe</option>
                                                                            <option value="GU">Guam</option>
                                                                            <option value="GT">Guatemala</option>
                                                                            <option value="GF">Guayana Francesa</option>
                                                                            <option value="GG">Guernesey</option>
                                                                            <option value="GN">Guinea</option>
                                                                            <option value="GQ">Guinea Ecuatorial</option>
                                                                            <option value="GW">Guinea-Bisáu</option>
                                                                            <option value="GY">Guyana</option>
                                                                            <option value="HT">Haití</option>
                                                                            <option value="HN">Honduras</option>
                                                                            <option value="HU">Hungría</option>
                                                                            <option value="IN">India</option>
                                                                            <option value="ID">Indonesia</option>
                                                                            <option value="IQ">Iraq</option>
                                                                            <option value="IE">Irlanda</option>
                                                                            <option value="IR">Irán</option>
                                                                            <option value="BV">Isla Bouvet</option>
                                                                            <option value="CX">Isla Christmas</option>
                                                                            <option value="NU">Isla Niue</option>
                                                                            <option value="NF">Isla Norfolk</option>
                                                                            <option value="IM">Isla de Man</option>
                                                                            <option value="IS">Islandia</option>
                                                                            <option value="KY">Islas Caimán</option>
                                                                            <option value="CC">Islas Cocos</option>
                                                                            <option value="CK">Islas Cook</option>
                                                                            <option value="FO">Islas Feroe</option>
                                                                            <option value="GS">Islas Georgia del Sur y Sandwich del Sur</option>
                                                                            <option value="HM">Islas Heard y McDonald</option>
                                                                            <option value="FK">Islas Malvinas</option>
                                                                            <option value="MP">Islas Marianas del Norte</option>
                                                                            <option value="MH">Islas Marshall</option>
                                                                            <option value="PN">Islas Pitcairn</option>
                                                                            <option value="SB">Islas Salomón</option>
                                                                            <option value="TC">Islas Turcas y Caicos</option>
                                                                            <option value="VG">Islas Vírgenes Británicas</option>
                                                                            <option value="VI">Islas Vírgenes de EE. UU.</option>
                                                                            <option value="UM">Islas menores alejadas de EE. UU.</option>
                                                                            <option value="AX">Islas Åland</option>
                                                                            <option value="IL">Israel</option>
                                                                            <option value="IT">Italia</option>
                                                                            <option value="JM">Jamaica</option>
                                                                            <option value="JP">Japón</option>
                                                                            <option value="JE">Jersey</option>
                                                                            <option value="JO">Jordania</option>
                                                                            <option value="KZ">Kazajistán</option>
                                                                            <option value="KE">Kenia</option>
                                                                            <option value="KG">Kirguistán</option>
                                                                            <option value="KI">Kiribati</option>
                                                                            <option value="KW">Kuwait</option>
                                                                            <option value="LA">Laos</option>
                                                                            <option value="LS">Lesoto</option>
                                                                            <option value="LV">Letonia</option>
                                                                            <option value="LR">Liberia</option>
                                                                            <option value="LY">Libia</option>
                                                                            <option value="LI">Liechtenstein</option>
                                                                            <option value="LT">Lituania</option>
                                                                            <option value="LU">Luxemburgo</option>
                                                                            <option value="LB">Líbano</option>
                                                                            <option value="MK">Macedonia</option>
                                                                            <option value="MG">Madagascar</option>
                                                                            <option value="MY">Malasia</option>
                                                                            <option value="MW">Malaui</option>
                                                                            <option value="MV">Maldivas</option>
                                                                            <option value="ML">Mali</option>
                                                                            <option value="MT">Malta</option>
                                                                            <option value="MA">Marruecos</option>
                                                                            <option value="MQ">Martinica</option>
                                                                            <option value="MU">Mauricio</option>
                                                                            <option value="MR">Mauritania</option>
                                                                            <option value="YT">Mayotte</option>
                                                                            <option value="FM">Micronesia</option>
                                                                            <option value="MD">Moldavia</option>
                                                                            <option value="MN">Mongolia</option>
                                                                            <option value="ME">Montenegro</option>
                                                                            <option value="MS">Montserrat</option>
                                                                            <option value="MZ">Mozambique</option>
                                                                            <option value="MM">Myanmar (Birmania)</option>
                                                                            <option value="MX">México</option>
                                                                            <option value="MC">Mónaco</option>
                                                                            <option value="NA">Namibia</option>
                                                                            <option value="NR">Nauru</option>
                                                                            <option value="NP">Nepal</option>
                                                                            <option value="NI">Nicaragua</option>
                                                                            <option value="NG">Nigeria</option>
                                                                            <option value="NO">Noruega</option>
                                                                            <option value="NC">Nueva Caledonia</option>
                                                                            <option value="NZ">Nueva Zelanda</option>
                                                                            <option value="NE">Níger</option>
                                                                            <option value="OM">Omán</option>
                                                                            <option value="PK">Pakistán</option>
                                                                            <option value="PW">Palau</option>
                                                                            <option value="PA">Panamá</option>
                                                                            <option value="PG">Papúa Nueva Guinea</option>
                                                                            <option value="PY">Paraguay</option>
                                                                            <option value="NL">Países Bajos</option>
                                                                            <option value="PE">Perú</option>
                                                                            <option value="PF">Polinesia Francesa</option>
                                                                            <option value="PL">Polonia</option>
                                                                            <option value="PT">Portugal</option>
                                                                            <option value="PR">Puerto Rico</option>
                                                                            <option value="HK">RAE de Hong Kong (China)</option>
                                                                            <option value="MO">RAE de Macao (China)</option>
                                                                            <option value="GB">Reino Unido</option>
                                                                            <option value="CF">República Centroafricana</option>
                                                                            <option value="CZ">República Checa</option>
                                                                            <option value="CD">República Democrática del Congo</option>
                                                                            <option value="DO">República Dominicana</option>
                                                                            <option value="CG">República del Congo</option>
                                                                            <option value="RE">Reunión</option>
                                                                            <option value="RW">Ruanda</option>
                                                                            <option value="RO">Rumanía</option>
                                                                            <option value="RU">Rusia</option>
                                                                            <option value="WS">Samoa</option>
                                                                            <option value="AS">Samoa Americana</option>
                                                                            <option value="BL">San Bartolomé</option>
                                                                            <option value="KN">San Cristóbal y Nieves</option>
                                                                            <option value="SM">San Marino</option>
                                                                            <option value="MF">San Martín</option>
                                                                            <option value="PM">San Pedro y Miquelón</option>
                                                                            <option value="VC">San Vicente y las Granadinas</option>
                                                                            <option value="SH">Santa Elena</option>
                                                                            <option value="LC">Santa Lucía</option>
                                                                            <option value="ST">Santo Tomé y Príncipe</option>
                                                                            <option value="SN">Senegal</option>
                                                                            <option value="RS">Serbia</option>
                                                                            <option value="SC">Seychelles</option>
                                                                            <option value="SL">Sierra Leona</option>
                                                                            <option value="SG">Singapur</option>
                                                                            <option value="SY">Siria</option>
                                                                            <option value="SO">Somalia</option>
                                                                            <option value="LK">Sri Lanka</option>
                                                                            <option value="SZ">Suazilandia</option>
                                                                            <option value="ZA">Sudáfrica</option>
                                                                            <option value="SD">Sudán</option>
                                                                            <option value="SE">Suecia</option>
                                                                            <option value="CH">Suiza</option>
                                                                            <option value="SR" selected="selected">Surinam</option>
                                                                            <option value="SJ">Svalbard y Jan Mayen</option>
                                                                            <option value="EH">Sáhara Occidental</option>
                                                                            <option value="TH">Tailandia</option>
                                                                            <option value="TW">Taiwán (China)</option>
                                                                            <option value="TZ">Tanzania</option>
                                                                            <option value="TJ">Tayikistán</option>
                                                                            <option value="IO">Territorio Británico del Océano Índico</option>
                                                                            <option value="TF">Territorios Australes Franceses</option>
                                                                            <option value="PS">Territorios Palestinos</option>
                                                                            <option value="TL">Timor Oriental</option>
                                                                            <option value="TG">Togo</option>
                                                                            <option value="TK">Tokelau</option>
                                                                            <option value="TO">Tonga</option>
                                                                            <option value="TT">Trinidad y Tobago</option>
                                                                            <option value="TM">Turkmenistán</option>
                                                                            <option value="TR">Turquía</option>
                                                                            <option value="TV">Tuvalu</option>
                                                                            <option value="TN">Túnez</option>
                                                                            <option value="UA">Ucrania</option>
                                                                            <option value="UG">Uganda</option>
                                                                            <option value="UY">Uruguay</option>
                                                                            <option value="UZ">Uzbekistán</option>
                                                                            <option value="VU">Vanuatu</option>
                                                                            <option value="VE">Venezuela</option>
                                                                            <option value="VN">Vietnam</option>
                                                                            <option value="WF">Wallis y Futuna</option>
                                                                            <option value="YE">Yemen</option>
                                                                            <option value="DJ">Yibuti</option>
                                                                            <option value="ZM">Zambia</option>
                                                                            <option value="ZW">Zimbabue</option>
                                                                        </select>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <input type="hidden" name="default_billing" value="1">
                                                            <input type="hidden" name="default_shipping" value="1">
                                                            <div class="control">
                                                                <p class="agree">
                                                                    <input type="checkbox" name="is_subscribed" id="agreement-newsletter" value="1" title="Boletin informativo" class="checkbox agree-popups">
                                                                    <label for="agreement-newsletter">Boletin informativo</label>
                                                                </p>
                                                                <div class="agree-information" data-toggle="modal" data-target="#agreementNewsLetterModal">
                                                                    <span class="icon ic ic-info contact-iformation-ico" title="" data-placement="top" data-toggle="tooltip" data-original-title="Me gustaría suscribirme al boletín">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="agreementNewsLetterModal" tabindex="-1" role="dialog" aria-labelledby="agreementNewsLetterModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <p>By subscribing to our newsletter you agree to receive email from us. The aim of our newsletter service is to keep our passengers updated about new promotions or new service offerings. The subscription to our newsletter service is not mandatory.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="buttons-set">
                                                        <button type="submit" title="Entregar" class="button" disabled="disabled"><span><span>Entregar</span></span></button>
                                                    </div>
                                                </form>
                                                <script type="text/javascript">
                                                    //<![CDATA[
                                                    WT.Config.validationType = 'latin_specials';
                                                    WT.Config.isAllowedSpaceByPassport = +'0';
                                                    WT.Config.isAllowedSpaceByUsername = +'1';
                                                    WT.Config.dateFormat = 'DD/MM/YYYY';
                                                    WT.Options = {
                                                        passengersDatePickerWeekStart: '1',
                                                    };


                                                    new RegionUpdater('country', 'region', 'region_id', {
                                                        "config": {
                                                            "show_all_regions": true,
                                                            "regions_required": ["AT", "CA", "EE", "FI", "FR", "DE", "LV", "LT", "RO", "ES", "CH", "US"]
                                                        },
                                                        "ES": {
                                                            "130": {
                                                                "code": "A Coru\u0441a",
                                                                "name": "A Coru\u00f1a"
                                                            },
                                                            "131": {
                                                                "code": "Alava",
                                                                "name": "Alava"
                                                            },
                                                            "132": {
                                                                "code": "Albacete",
                                                                "name": "Albacete"
                                                            },
                                                            "133": {
                                                                "code": "Alicante",
                                                                "name": "Alicante"
                                                            },
                                                            "134": {
                                                                "code": "Almeria",
                                                                "name": "Almeria"
                                                            },
                                                            "135": {
                                                                "code": "Asturias",
                                                                "name": "Asturias"
                                                            },
                                                            "136": {
                                                                "code": "Avila",
                                                                "name": "Avila"
                                                            },
                                                            "137": {
                                                                "code": "Badajoz",
                                                                "name": "Badajoz"
                                                            },
                                                            "138": {
                                                                "code": "Baleares",
                                                                "name": "Baleares"
                                                            },
                                                            "139": {
                                                                "code": "Barcelona",
                                                                "name": "Barcelona"
                                                            },
                                                            "140": {
                                                                "code": "Burgos",
                                                                "name": "Burgos"
                                                            },
                                                            "141": {
                                                                "code": "Caceres",
                                                                "name": "Caceres"
                                                            },
                                                            "142": {
                                                                "code": "Cadiz",
                                                                "name": "Cadiz"
                                                            },
                                                            "143": {
                                                                "code": "Cantabria",
                                                                "name": "Cantabria"
                                                            },
                                                            "144": {
                                                                "code": "Castellon",
                                                                "name": "Castellon"
                                                            },
                                                            "145": {
                                                                "code": "Ceuta",
                                                                "name": "Ceuta"
                                                            },
                                                            "146": {
                                                                "code": "Ciudad Real",
                                                                "name": "Ciudad Real"
                                                            },
                                                            "147": {
                                                                "code": "Cordoba",
                                                                "name": "Cordoba"
                                                            },
                                                            "148": {
                                                                "code": "Cuenca",
                                                                "name": "Cuenca"
                                                            },
                                                            "149": {
                                                                "code": "Girona",
                                                                "name": "Girona"
                                                            },
                                                            "150": {
                                                                "code": "Granada",
                                                                "name": "Granada"
                                                            },
                                                            "151": {
                                                                "code": "Guadalajara",
                                                                "name": "Guadalajara"
                                                            },
                                                            "152": {
                                                                "code": "Guipuzcoa",
                                                                "name": "Guipuzcoa"
                                                            },
                                                            "153": {
                                                                "code": "Huelva",
                                                                "name": "Huelva"
                                                            },
                                                            "154": {
                                                                "code": "Huesca",
                                                                "name": "Huesca"
                                                            },
                                                            "155": {
                                                                "code": "Jaen",
                                                                "name": "Jaen"
                                                            },
                                                            "156": {
                                                                "code": "La Rioja",
                                                                "name": "La Rioja"
                                                            },
                                                            "157": {
                                                                "code": "Las Palmas",
                                                                "name": "Las Palmas"
                                                            },
                                                            "158": {
                                                                "code": "Leon",
                                                                "name": "Leon"
                                                            },
                                                            "159": {
                                                                "code": "Lleida",
                                                                "name": "Lleida"
                                                            },
                                                            "160": {
                                                                "code": "Lugo",
                                                                "name": "Lugo"
                                                            },
                                                            "161": {
                                                                "code": "Madrid",
                                                                "name": "Madrid"
                                                            },
                                                            "162": {
                                                                "code": "Malaga",
                                                                "name": "Malaga"
                                                            },
                                                            "163": {
                                                                "code": "Melilla",
                                                                "name": "Melilla"
                                                            },
                                                            "164": {
                                                                "code": "Murcia",
                                                                "name": "Murcia"
                                                            },
                                                            "165": {
                                                                "code": "Navarra",
                                                                "name": "Navarra"
                                                            },
                                                            "166": {
                                                                "code": "Ourense",
                                                                "name": "Ourense"
                                                            },
                                                            "167": {
                                                                "code": "Palencia",
                                                                "name": "Palencia"
                                                            },
                                                            "168": {
                                                                "code": "Pontevedra",
                                                                "name": "Pontevedra"
                                                            },
                                                            "169": {
                                                                "code": "Salamanca",
                                                                "name": "Salamanca"
                                                            },
                                                            "170": {
                                                                "code": "Santa Cruz de Tenerife",
                                                                "name": "Santa Cruz de Tenerife"
                                                            },
                                                            "171": {
                                                                "code": "Segovia",
                                                                "name": "Segovia"
                                                            },
                                                            "172": {
                                                                "code": "Sevilla",
                                                                "name": "Sevilla"
                                                            },
                                                            "173": {
                                                                "code": "Soria",
                                                                "name": "Soria"
                                                            },
                                                            "174": {
                                                                "code": "Tarragona",
                                                                "name": "Tarragona"
                                                            },
                                                            "175": {
                                                                "code": "Teruel",
                                                                "name": "Teruel"
                                                            },
                                                            "176": {
                                                                "code": "Toledo",
                                                                "name": "Toledo"
                                                            },
                                                            "177": {
                                                                "code": "Valencia",
                                                                "name": "Valencia"
                                                            },
                                                            "178": {
                                                                "code": "Valladolid",
                                                                "name": "Valladolid"
                                                            },
                                                            "179": {
                                                                "code": "Vizcaya",
                                                                "name": "Vizcaya"
                                                            },
                                                            "180": {
                                                                "code": "Zamora",
                                                                "name": "Zamora"
                                                            },
                                                            "181": {
                                                                "code": "Zaragoza",
                                                                "name": "Zaragoza"
                                                            }
                                                        },
                                                        "CH": {
                                                            "104": {
                                                                "code": "AG",
                                                                "name": "Aargau"
                                                            },
                                                            "106": {
                                                                "code": "AR",
                                                                "name": "Appenzell Ausserrhoden"
                                                            },
                                                            "105": {
                                                                "code": "AI",
                                                                "name": "Appenzell Innerrhoden"
                                                            },
                                                            "108": {
                                                                "code": "BL",
                                                                "name": "Basel-Landschaft"
                                                            },
                                                            "109": {
                                                                "code": "BS",
                                                                "name": "Basel-Stadt"
                                                            },
                                                            "107": {
                                                                "code": "BE",
                                                                "name": "Bern"
                                                            },
                                                            "110": {
                                                                "code": "FR",
                                                                "name": "Freiburg"
                                                            },
                                                            "111": {
                                                                "code": "GE",
                                                                "name": "Genf"
                                                            },
                                                            "112": {
                                                                "code": "GL",
                                                                "name": "Glarus"
                                                            },
                                                            "113": {
                                                                "code": "GR",
                                                                "name": "Graub\u00fcnden"
                                                            },
                                                            "114": {
                                                                "code": "JU",
                                                                "name": "Jura"
                                                            },
                                                            "115": {
                                                                "code": "LU",
                                                                "name": "Luzern"
                                                            },
                                                            "116": {
                                                                "code": "NE",
                                                                "name": "Neuenburg"
                                                            },
                                                            "117": {
                                                                "code": "NW",
                                                                "name": "Nidwalden"
                                                            },
                                                            "118": {
                                                                "code": "OW",
                                                                "name": "Obwalden"
                                                            },
                                                            "120": {
                                                                "code": "SH",
                                                                "name": "Schaffhausen"
                                                            },
                                                            "122": {
                                                                "code": "SZ",
                                                                "name": "Schwyz"
                                                            },
                                                            "121": {
                                                                "code": "SO",
                                                                "name": "Solothurn"
                                                            },
                                                            "119": {
                                                                "code": "SG",
                                                                "name": "St. Gallen"
                                                            },
                                                            "124": {
                                                                "code": "TI",
                                                                "name": "Tessin"
                                                            },
                                                            "123": {
                                                                "code": "TG",
                                                                "name": "Thurgau"
                                                            },
                                                            "125": {
                                                                "code": "UR",
                                                                "name": "Uri"
                                                            },
                                                            "126": {
                                                                "code": "VD",
                                                                "name": "Waadt"
                                                            },
                                                            "127": {
                                                                "code": "VS",
                                                                "name": "Wallis"
                                                            },
                                                            "128": {
                                                                "code": "ZG",
                                                                "name": "Zug"
                                                            },
                                                            "129": {
                                                                "code": "ZH",
                                                                "name": "Z\u00fcrich"
                                                            }
                                                        },
                                                        "LV": {
                                                            "471": {
                                                                "code": "\u0100da\u017eu novads",
                                                                "name": "\u0100da\u017eu novads"
                                                            },
                                                            "366": {
                                                                "code": "Aglonas novads",
                                                                "name": "Aglonas novads"
                                                            },
                                                            "367": {
                                                                "code": "LV-AI",
                                                                "name": "Aizkraukles novads"
                                                            },
                                                            "368": {
                                                                "code": "Aizputes novads",
                                                                "name": "Aizputes novads"
                                                            },
                                                            "369": {
                                                                "code": "Akn\u012bstes novads",
                                                                "name": "Akn\u012bstes novads"
                                                            },
                                                            "370": {
                                                                "code": "Alojas novads",
                                                                "name": "Alojas novads"
                                                            },
                                                            "371": {
                                                                "code": "Alsungas novads",
                                                                "name": "Alsungas novads"
                                                            },
                                                            "372": {
                                                                "code": "LV-AL",
                                                                "name": "Al\u016bksnes novads"
                                                            },
                                                            "373": {
                                                                "code": "Amatas novads",
                                                                "name": "Amatas novads"
                                                            },
                                                            "374": {
                                                                "code": "Apes novads",
                                                                "name": "Apes novads"
                                                            },
                                                            "375": {
                                                                "code": "Auces novads",
                                                                "name": "Auces novads"
                                                            },
                                                            "376": {
                                                                "code": "Bab\u012btes novads",
                                                                "name": "Bab\u012btes novads"
                                                            },
                                                            "377": {
                                                                "code": "Baldones novads",
                                                                "name": "Baldones novads"
                                                            },
                                                            "378": {
                                                                "code": "Baltinavas novads",
                                                                "name": "Baltinavas novads"
                                                            },
                                                            "379": {
                                                                "code": "LV-BL",
                                                                "name": "Balvu novads"
                                                            },
                                                            "380": {
                                                                "code": "LV-BU",
                                                                "name": "Bauskas novads"
                                                            },
                                                            "381": {
                                                                "code": "Bever\u012bnas novads",
                                                                "name": "Bever\u012bnas novads"
                                                            },
                                                            "382": {
                                                                "code": "Broc\u0113nu novads",
                                                                "name": "Broc\u0113nu novads"
                                                            },
                                                            "383": {
                                                                "code": "Burtnieku novads",
                                                                "name": "Burtnieku novads"
                                                            },
                                                            "384": {
                                                                "code": "Carnikavas novads",
                                                                "name": "Carnikavas novads"
                                                            },
                                                            "387": {
                                                                "code": "LV-CE",
                                                                "name": "C\u0113su novads"
                                                            },
                                                            "385": {
                                                                "code": "Cesvaines novads",
                                                                "name": "Cesvaines novads"
                                                            },
                                                            "386": {
                                                                "code": "Ciblas novads",
                                                                "name": "Ciblas novads"
                                                            },
                                                            "388": {
                                                                "code": "Dagdas novads",
                                                                "name": "Dagdas novads"
                                                            },
                                                            "355": {
                                                                "code": "LV-DGV",
                                                                "name": "Daugavpils"
                                                            },
                                                            "389": {
                                                                "code": "LV-DA",
                                                                "name": "Daugavpils novads"
                                                            },
                                                            "390": {
                                                                "code": "LV-DO",
                                                                "name": "Dobeles novads"
                                                            },
                                                            "391": {
                                                                "code": "Dundagas novads",
                                                                "name": "Dundagas novads"
                                                            },
                                                            "392": {
                                                                "code": "Durbes novads",
                                                                "name": "Durbes novads"
                                                            },
                                                            "393": {
                                                                "code": "Engures novads",
                                                                "name": "Engures novads"
                                                            },
                                                            "472": {
                                                                "code": "\u0112rg\u013cu novads",
                                                                "name": "\u0112rg\u013cu novads"
                                                            },
                                                            "394": {
                                                                "code": "Garkalnes novads",
                                                                "name": "Garkalnes novads"
                                                            },
                                                            "395": {
                                                                "code": "Grobi\u0146as novads",
                                                                "name": "Grobi\u0146as novads"
                                                            },
                                                            "396": {
                                                                "code": "LV-GU",
                                                                "name": "Gulbenes novads"
                                                            },
                                                            "397": {
                                                                "code": "Iecavas novads",
                                                                "name": "Iecavas novads"
                                                            },
                                                            "398": {
                                                                "code": "Ik\u0161\u0137iles novads",
                                                                "name": "Ik\u0161\u0137iles novads"
                                                            },
                                                            "399": {
                                                                "code": "Il\u016bkstes novads",
                                                                "name": "Il\u016bkstes novads"
                                                            },
                                                            "400": {
                                                                "code": "In\u010dukalna novads",
                                                                "name": "In\u010dukalna novads"
                                                            },
                                                            "401": {
                                                                "code": "Jaunjelgavas novads",
                                                                "name": "Jaunjelgavas novads"
                                                            },
                                                            "402": {
                                                                "code": "Jaunpiebalgas novads",
                                                                "name": "Jaunpiebalgas novads"
                                                            },
                                                            "403": {
                                                                "code": "Jaunpils novads",
                                                                "name": "Jaunpils novads"
                                                            },
                                                            "357": {
                                                                "code": "J\u0113kabpils",
                                                                "name": "J\u0113kabpils"
                                                            },
                                                            "405": {
                                                                "code": "LV-JK",
                                                                "name": "J\u0113kabpils novads"
                                                            },
                                                            "356": {
                                                                "code": "LV-JEL",
                                                                "name": "Jelgava"
                                                            },
                                                            "404": {
                                                                "code": "LV-JL",
                                                                "name": "Jelgavas novads"
                                                            },
                                                            "358": {
                                                                "code": "LV-JUR",
                                                                "name": "J\u016brmala"
                                                            },
                                                            "406": {
                                                                "code": "Kandavas novads",
                                                                "name": "Kandavas novads"
                                                            },
                                                            "412": {
                                                                "code": "K\u0101rsavas novads",
                                                                "name": "K\u0101rsavas novads"
                                                            },
                                                            "473": {
                                                                "code": "\u0136eguma novads",
                                                                "name": "\u0136eguma novads"
                                                            },
                                                            "474": {
                                                                "code": "\u0136ekavas novads",
                                                                "name": "\u0136ekavas novads"
                                                            },
                                                            "407": {
                                                                "code": "Kokneses novads",
                                                                "name": "Kokneses novads"
                                                            },
                                                            "410": {
                                                                "code": "LV-KR",
                                                                "name": "Kr\u0101slavas novads"
                                                            },
                                                            "408": {
                                                                "code": "Krimuldas novads",
                                                                "name": "Krimuldas novads"
                                                            },
                                                            "409": {
                                                                "code": "Krustpils novads",
                                                                "name": "Krustpils novads"
                                                            },
                                                            "411": {
                                                                "code": "LV-KU",
                                                                "name": "Kuld\u012bgas novads"
                                                            },
                                                            "413": {
                                                                "code": "Lielv\u0101rdes novads",
                                                                "name": "Lielv\u0101rdes novads"
                                                            },
                                                            "359": {
                                                                "code": "LV-LPX",
                                                                "name": "Liep\u0101ja"
                                                            },
                                                            "360": {
                                                                "code": "LV-LE",
                                                                "name": "Liep\u0101jas novads"
                                                            },
                                                            "417": {
                                                                "code": "L\u012bgatnes novads",
                                                                "name": "L\u012bgatnes novads"
                                                            },
                                                            "414": {
                                                                "code": "LV-LM",
                                                                "name": "Limba\u017eu novads"
                                                            },
                                                            "418": {
                                                                "code": "L\u012bv\u0101nu novads",
                                                                "name": "L\u012bv\u0101nu novads"
                                                            },
                                                            "415": {
                                                                "code": "Lub\u0101nas novads",
                                                                "name": "Lub\u0101nas novads"
                                                            },
                                                            "416": {
                                                                "code": "LV-LU",
                                                                "name": "Ludzas novads"
                                                            },
                                                            "419": {
                                                                "code": "LV-MA",
                                                                "name": "Madonas novads"
                                                            },
                                                            "421": {
                                                                "code": "M\u0101lpils novads",
                                                                "name": "M\u0101lpils novads"
                                                            },
                                                            "422": {
                                                                "code": "M\u0101rupes novads",
                                                                "name": "M\u0101rupes novads"
                                                            },
                                                            "420": {
                                                                "code": "Mazsalacas novads",
                                                                "name": "Mazsalacas novads"
                                                            },
                                                            "423": {
                                                                "code": "Nauk\u0161\u0113nu novads",
                                                                "name": "Nauk\u0161\u0113nu novads"
                                                            },
                                                            "424": {
                                                                "code": "Neretas novads",
                                                                "name": "Neretas novads"
                                                            },
                                                            "425": {
                                                                "code": "N\u012bcas novads",
                                                                "name": "N\u012bcas novads"
                                                            },
                                                            "426": {
                                                                "code": "LV-OG",
                                                                "name": "Ogres novads"
                                                            },
                                                            "427": {
                                                                "code": "Olaines novads",
                                                                "name": "Olaines novads"
                                                            },
                                                            "428": {
                                                                "code": "Ozolnieku novads",
                                                                "name": "Ozolnieku novads"
                                                            },
                                                            "432": {
                                                                "code": "P\u0101rgaujas novads",
                                                                "name": "P\u0101rgaujas novads"
                                                            },
                                                            "433": {
                                                                "code": "P\u0101vilostas novads",
                                                                "name": "P\u0101vilostas novads"
                                                            },
                                                            "434": {
                                                                "code": "P\u013cavi\u0146u novads",
                                                                "name": "P\u013cavi\u0146u novads"
                                                            },
                                                            "429": {
                                                                "code": "LV-PR",
                                                                "name": "Prei\u013cu novads"
                                                            },
                                                            "430": {
                                                                "code": "Priekules novads",
                                                                "name": "Priekules novads"
                                                            },
                                                            "431": {
                                                                "code": "Prieku\u013cu novads",
                                                                "name": "Prieku\u013cu novads"
                                                            },
                                                            "435": {
                                                                "code": "Raunas novads",
                                                                "name": "Raunas novads"
                                                            },
                                                            "361": {
                                                                "code": "LV-REZ",
                                                                "name": "R\u0113zekne"
                                                            },
                                                            "442": {
                                                                "code": "LV-RE",
                                                                "name": "R\u0113zeknes novads"
                                                            },
                                                            "436": {
                                                                "code": "Riebi\u0146u novads",
                                                                "name": "Riebi\u0146u novads"
                                                            },
                                                            "362": {
                                                                "code": "LV-RIX",
                                                                "name": "R\u012bga"
                                                            },
                                                            "363": {
                                                                "code": "LV-RI",
                                                                "name": "R\u012bgas novads"
                                                            },
                                                            "437": {
                                                                "code": "Rojas novads",
                                                                "name": "Rojas novads"
                                                            },
                                                            "438": {
                                                                "code": "Ropa\u017eu novads",
                                                                "name": "Ropa\u017eu novads"
                                                            },
                                                            "439": {
                                                                "code": "Rucavas novads",
                                                                "name": "Rucavas novads"
                                                            },
                                                            "440": {
                                                                "code": "Rug\u0101ju novads",
                                                                "name": "Rug\u0101ju novads"
                                                            },
                                                            "443": {
                                                                "code": "R\u016bjienas novads",
                                                                "name": "R\u016bjienas novads"
                                                            },
                                                            "441": {
                                                                "code": "Rund\u0101les novads",
                                                                "name": "Rund\u0101les novads"
                                                            },
                                                            "444": {
                                                                "code": "Salacgr\u012bvas novads",
                                                                "name": "Salacgr\u012bvas novads"
                                                            },
                                                            "445": {
                                                                "code": "Salas novads",
                                                                "name": "Salas novads"
                                                            },
                                                            "446": {
                                                                "code": "Salaspils novads",
                                                                "name": "Salaspils novads"
                                                            },
                                                            "447": {
                                                                "code": "LV-SA",
                                                                "name": "Saldus novads"
                                                            },
                                                            "448": {
                                                                "code": "Saulkrastu novads",
                                                                "name": "Saulkrastu novads"
                                                            },
                                                            "455": {
                                                                "code": "S\u0113jas novads",
                                                                "name": "S\u0113jas novads"
                                                            },
                                                            "449": {
                                                                "code": "Siguldas novads",
                                                                "name": "Siguldas novads"
                                                            },
                                                            "451": {
                                                                "code": "Skr\u012bveru novads",
                                                                "name": "Skr\u012bveru novads"
                                                            },
                                                            "450": {
                                                                "code": "Skrundas novads",
                                                                "name": "Skrundas novads"
                                                            },
                                                            "452": {
                                                                "code": "Smiltenes novads",
                                                                "name": "Smiltenes novads"
                                                            },
                                                            "453": {
                                                                "code": "Stopi\u0146u novads",
                                                                "name": "Stopi\u0146u novads"
                                                            },
                                                            "454": {
                                                                "code": "Stren\u010du novads",
                                                                "name": "Stren\u010du novads"
                                                            },
                                                            "456": {
                                                                "code": "LV-TA",
                                                                "name": "Talsu novads"
                                                            },
                                                            "458": {
                                                                "code": "T\u0113rvetes novads",
                                                                "name": "T\u0113rvetes novads"
                                                            },
                                                            "457": {
                                                                "code": "LV-TU",
                                                                "name": "Tukuma novads"
                                                            },
                                                            "459": {
                                                                "code": "Vai\u0146odes novads",
                                                                "name": "Vai\u0146odes novads"
                                                            },
                                                            "460": {
                                                                "code": "LV-VK",
                                                                "name": "Valkas novads"
                                                            },
                                                            "364": {
                                                                "code": "Valmiera",
                                                                "name": "Valmiera"
                                                            },
                                                            "461": {
                                                                "code": "LV-VM",
                                                                "name": "Valmieras novads"
                                                            },
                                                            "462": {
                                                                "code": "Varak\u013c\u0101nu novads",
                                                                "name": "Varak\u013c\u0101nu novads"
                                                            },
                                                            "469": {
                                                                "code": "V\u0101rkavas novads",
                                                                "name": "V\u0101rkavas novads"
                                                            },
                                                            "463": {
                                                                "code": "Vecpiebalgas novads",
                                                                "name": "Vecpiebalgas novads"
                                                            },
                                                            "464": {
                                                                "code": "Vecumnieku novads",
                                                                "name": "Vecumnieku novads"
                                                            },
                                                            "365": {
                                                                "code": "LV-VEN",
                                                                "name": "Ventspils"
                                                            },
                                                            "465": {
                                                                "code": "LV-VE",
                                                                "name": "Ventspils novads"
                                                            },
                                                            "466": {
                                                                "code": "Vies\u012btes novads",
                                                                "name": "Vies\u012btes novads"
                                                            },
                                                            "467": {
                                                                "code": "Vi\u013cakas novads",
                                                                "name": "Vi\u013cakas novads"
                                                            },
                                                            "468": {
                                                                "code": "Vi\u013c\u0101nu novads",
                                                                "name": "Vi\u013c\u0101nu novads"
                                                            },
                                                            "470": {
                                                                "code": "Zilupes novads",
                                                                "name": "Zilupes novads"
                                                            }
                                                        },
                                                        "FI": {
                                                            "339": {
                                                                "code": "Ahvenanmaa",
                                                                "name": "Ahvenanmaa"
                                                            },
                                                            "333": {
                                                                "code": "Etel\u00e4-Karjala",
                                                                "name": "Etel\u00e4-Karjala"
                                                            },
                                                            "326": {
                                                                "code": "Etel\u00e4-Pohjanmaa",
                                                                "name": "Etel\u00e4-Pohjanmaa"
                                                            },
                                                            "325": {
                                                                "code": "Etel\u00e4-Savo",
                                                                "name": "Etel\u00e4-Savo"
                                                            },
                                                            "337": {
                                                                "code": "It\u00e4-Uusimaa",
                                                                "name": "It\u00e4-Uusimaa"
                                                            },
                                                            "322": {
                                                                "code": "Kainuu",
                                                                "name": "Kainuu"
                                                            },
                                                            "335": {
                                                                "code": "Kanta-H\u00e4me",
                                                                "name": "Kanta-H\u00e4me"
                                                            },
                                                            "330": {
                                                                "code": "Keski-Pohjanmaa",
                                                                "name": "Keski-Pohjanmaa"
                                                            },
                                                            "331": {
                                                                "code": "Keski-Suomi",
                                                                "name": "Keski-Suomi"
                                                            },
                                                            "338": {
                                                                "code": "Kymenlaakso",
                                                                "name": "Kymenlaakso"
                                                            },
                                                            "320": {
                                                                "code": "Lappi",
                                                                "name": "Lappi"
                                                            },
                                                            "334": {
                                                                "code": "P\u00e4ij\u00e4t-H\u00e4me",
                                                                "name": "P\u00e4ij\u00e4t-H\u00e4me"
                                                            },
                                                            "328": {
                                                                "code": "Pirkanmaa",
                                                                "name": "Pirkanmaa"
                                                            },
                                                            "327": {
                                                                "code": "Pohjanmaa",
                                                                "name": "Pohjanmaa"
                                                            },
                                                            "323": {
                                                                "code": "Pohjois-Karjala",
                                                                "name": "Pohjois-Karjala"
                                                            },
                                                            "321": {
                                                                "code": "Pohjois-Pohjanmaa",
                                                                "name": "Pohjois-Pohjanmaa"
                                                            },
                                                            "324": {
                                                                "code": "Pohjois-Savo",
                                                                "name": "Pohjois-Savo"
                                                            },
                                                            "329": {
                                                                "code": "Satakunta",
                                                                "name": "Satakunta"
                                                            },
                                                            "336": {
                                                                "code": "Uusimaa",
                                                                "name": "Uusimaa"
                                                            },
                                                            "332": {
                                                                "code": "Varsinais-Suomi",
                                                                "name": "Varsinais-Suomi"
                                                            }
                                                        },
                                                        "FR": {
                                                            "182": {
                                                                "code": "1",
                                                                "name": "Ain"
                                                            },
                                                            "183": {
                                                                "code": "2",
                                                                "name": "Aisne"
                                                            },
                                                            "184": {
                                                                "code": "3",
                                                                "name": "Allier"
                                                            },
                                                            "185": {
                                                                "code": "4",
                                                                "name": "Alpes-de-Haute-Provence"
                                                            },
                                                            "187": {
                                                                "code": "6",
                                                                "name": "Alpes-Maritimes"
                                                            },
                                                            "188": {
                                                                "code": "7",
                                                                "name": "Ard\u00e8che"
                                                            },
                                                            "189": {
                                                                "code": "8",
                                                                "name": "Ardennes"
                                                            },
                                                            "190": {
                                                                "code": "9",
                                                                "name": "Ari\u00e8ge"
                                                            },
                                                            "191": {
                                                                "code": "10",
                                                                "name": "Aube"
                                                            },
                                                            "192": {
                                                                "code": "11",
                                                                "name": "Aude"
                                                            },
                                                            "193": {
                                                                "code": "12",
                                                                "name": "Aveyron"
                                                            },
                                                            "249": {
                                                                "code": "67",
                                                                "name": "Bas-Rhin"
                                                            },
                                                            "194": {
                                                                "code": "13",
                                                                "name": "Bouches-du-Rh\u00f4ne"
                                                            },
                                                            "195": {
                                                                "code": "14",
                                                                "name": "Calvados"
                                                            },
                                                            "196": {
                                                                "code": "15",
                                                                "name": "Cantal"
                                                            },
                                                            "197": {
                                                                "code": "16",
                                                                "name": "Charente"
                                                            },
                                                            "198": {
                                                                "code": "17",
                                                                "name": "Charente-Maritime"
                                                            },
                                                            "199": {
                                                                "code": "18",
                                                                "name": "Cher"
                                                            },
                                                            "200": {
                                                                "code": "19",
                                                                "name": "Corr\u00e8ze"
                                                            },
                                                            "201": {
                                                                "code": "2A",
                                                                "name": "Corse-du-Sud"
                                                            },
                                                            "203": {
                                                                "code": "21",
                                                                "name": "C\u00f4te-d'Or"
                                                            },
                                                            "204": {
                                                                "code": "22",
                                                                "name": "C\u00f4tes-d'Armor"
                                                            },
                                                            "205": {
                                                                "code": "23",
                                                                "name": "Creuse"
                                                            },
                                                            "261": {
                                                                "code": "79",
                                                                "name": "Deux-S\u00e8vres"
                                                            },
                                                            "206": {
                                                                "code": "24",
                                                                "name": "Dordogne"
                                                            },
                                                            "207": {
                                                                "code": "25",
                                                                "name": "Doubs"
                                                            },
                                                            "208": {
                                                                "code": "26",
                                                                "name": "Dr\u00f4me"
                                                            },
                                                            "273": {
                                                                "code": "91",
                                                                "name": "Essonne"
                                                            },
                                                            "209": {
                                                                "code": "27",
                                                                "name": "Eure"
                                                            },
                                                            "210": {
                                                                "code": "28",
                                                                "name": "Eure-et-Loir"
                                                            },
                                                            "211": {
                                                                "code": "29",
                                                                "name": "Finist\u00e8re"
                                                            },
                                                            "212": {
                                                                "code": "30",
                                                                "name": "Gard"
                                                            },
                                                            "214": {
                                                                "code": "32",
                                                                "name": "Gers"
                                                            },
                                                            "215": {
                                                                "code": "33",
                                                                "name": "Gironde"
                                                            },
                                                            "250": {
                                                                "code": "68",
                                                                "name": "Haut-Rhin"
                                                            },
                                                            "202": {
                                                                "code": "2B",
                                                                "name": "Haute-Corse"
                                                            },
                                                            "213": {
                                                                "code": "31",
                                                                "name": "Haute-Garonne"
                                                            },
                                                            "225": {
                                                                "code": "43",
                                                                "name": "Haute-Loire"
                                                            },
                                                            "234": {
                                                                "code": "52",
                                                                "name": "Haute-Marne"
                                                            },
                                                            "252": {
                                                                "code": "70",
                                                                "name": "Haute-Sa\u00f4ne"
                                                            },
                                                            "256": {
                                                                "code": "74",
                                                                "name": "Haute-Savoie"
                                                            },
                                                            "269": {
                                                                "code": "87",
                                                                "name": "Haute-Vienne"
                                                            },
                                                            "186": {
                                                                "code": "5",
                                                                "name": "Hautes-Alpes"
                                                            },
                                                            "247": {
                                                                "code": "65",
                                                                "name": "Hautes-Pyr\u00e9n\u00e9es"
                                                            },
                                                            "274": {
                                                                "code": "92",
                                                                "name": "Hauts-de-Seine"
                                                            },
                                                            "216": {
                                                                "code": "34",
                                                                "name": "H\u00e9rault"
                                                            },
                                                            "217": {
                                                                "code": "35",
                                                                "name": "Ille-et-Vilaine"
                                                            },
                                                            "218": {
                                                                "code": "36",
                                                                "name": "Indre"
                                                            },
                                                            "219": {
                                                                "code": "37",
                                                                "name": "Indre-et-Loire"
                                                            },
                                                            "220": {
                                                                "code": "38",
                                                                "name": "Is\u00e8re"
                                                            },
                                                            "221": {
                                                                "code": "39",
                                                                "name": "Jura"
                                                            },
                                                            "222": {
                                                                "code": "40",
                                                                "name": "Landes"
                                                            },
                                                            "223": {
                                                                "code": "41",
                                                                "name": "Loir-et-Cher"
                                                            },
                                                            "224": {
                                                                "code": "42",
                                                                "name": "Loire"
                                                            },
                                                            "226": {
                                                                "code": "44",
                                                                "name": "Loire-Atlantique"
                                                            },
                                                            "227": {
                                                                "code": "45",
                                                                "name": "Loiret"
                                                            },
                                                            "228": {
                                                                "code": "46",
                                                                "name": "Lot"
                                                            },
                                                            "229": {
                                                                "code": "47",
                                                                "name": "Lot-et-Garonne"
                                                            },
                                                            "230": {
                                                                "code": "48",
                                                                "name": "Loz\u00e8re"
                                                            },
                                                            "231": {
                                                                "code": "49",
                                                                "name": "Maine-et-Loire"
                                                            },
                                                            "232": {
                                                                "code": "50",
                                                                "name": "Manche"
                                                            },
                                                            "233": {
                                                                "code": "51",
                                                                "name": "Marne"
                                                            },
                                                            "235": {
                                                                "code": "53",
                                                                "name": "Mayenne"
                                                            },
                                                            "236": {
                                                                "code": "54",
                                                                "name": "Meurthe-et-Moselle"
                                                            },
                                                            "237": {
                                                                "code": "55",
                                                                "name": "Meuse"
                                                            },
                                                            "238": {
                                                                "code": "56",
                                                                "name": "Morbihan"
                                                            },
                                                            "239": {
                                                                "code": "57",
                                                                "name": "Moselle"
                                                            },
                                                            "240": {
                                                                "code": "58",
                                                                "name": "Ni\u00e8vre"
                                                            },
                                                            "241": {
                                                                "code": "59",
                                                                "name": "Nord"
                                                            },
                                                            "242": {
                                                                "code": "60",
                                                                "name": "Oise"
                                                            },
                                                            "243": {
                                                                "code": "61",
                                                                "name": "Orne"
                                                            },
                                                            "257": {
                                                                "code": "75",
                                                                "name": "Paris"
                                                            },
                                                            "244": {
                                                                "code": "62",
                                                                "name": "Pas-de-Calais"
                                                            },
                                                            "245": {
                                                                "code": "63",
                                                                "name": "Puy-de-D\u00f4me"
                                                            },
                                                            "246": {
                                                                "code": "64",
                                                                "name": "Pyr\u00e9n\u00e9es-Atlantiques"
                                                            },
                                                            "248": {
                                                                "code": "66",
                                                                "name": "Pyr\u00e9n\u00e9es-Orientales"
                                                            },
                                                            "251": {
                                                                "code": "69",
                                                                "name": "Rh\u00f4ne"
                                                            },
                                                            "253": {
                                                                "code": "71",
                                                                "name": "Sa\u00f4ne-et-Loire"
                                                            },
                                                            "254": {
                                                                "code": "72",
                                                                "name": "Sarthe"
                                                            },
                                                            "255": {
                                                                "code": "73",
                                                                "name": "Savoie"
                                                            },
                                                            "259": {
                                                                "code": "77",
                                                                "name": "Seine-et-Marne"
                                                            },
                                                            "258": {
                                                                "code": "76",
                                                                "name": "Seine-Maritime"
                                                            },
                                                            "275": {
                                                                "code": "93",
                                                                "name": "Seine-Saint-Denis"
                                                            },
                                                            "262": {
                                                                "code": "80",
                                                                "name": "Somme"
                                                            },
                                                            "263": {
                                                                "code": "81",
                                                                "name": "Tarn"
                                                            },
                                                            "264": {
                                                                "code": "82",
                                                                "name": "Tarn-et-Garonne"
                                                            },
                                                            "272": {
                                                                "code": "90",
                                                                "name": "Territoire-de-Belfort"
                                                            },
                                                            "277": {
                                                                "code": "95",
                                                                "name": "Val-d'Oise"
                                                            },
                                                            "276": {
                                                                "code": "94",
                                                                "name": "Val-de-Marne"
                                                            },
                                                            "265": {
                                                                "code": "83",
                                                                "name": "Var"
                                                            },
                                                            "266": {
                                                                "code": "84",
                                                                "name": "Vaucluse"
                                                            },
                                                            "267": {
                                                                "code": "85",
                                                                "name": "Vend\u00e9e"
                                                            },
                                                            "268": {
                                                                "code": "86",
                                                                "name": "Vienne"
                                                            },
                                                            "270": {
                                                                "code": "88",
                                                                "name": "Vosges"
                                                            },
                                                            "271": {
                                                                "code": "89",
                                                                "name": "Yonne"
                                                            },
                                                            "260": {
                                                                "code": "78",
                                                                "name": "Yvelines"
                                                            }
                                                        },
                                                        "US": {
                                                            "1": {
                                                                "code": "AL",
                                                                "name": "Alabama"
                                                            },
                                                            "2": {
                                                                "code": "AK",
                                                                "name": "Alaska"
                                                            },
                                                            "3": {
                                                                "code": "AS",
                                                                "name": "American Samoa"
                                                            },
                                                            "4": {
                                                                "code": "AZ",
                                                                "name": "Arizona"
                                                            },
                                                            "5": {
                                                                "code": "AR",
                                                                "name": "Arkansas"
                                                            },
                                                            "6": {
                                                                "code": "AF",
                                                                "name": "Armed Forces Africa"
                                                            },
                                                            "7": {
                                                                "code": "AA",
                                                                "name": "Armed Forces Americas"
                                                            },
                                                            "8": {
                                                                "code": "AC",
                                                                "name": "Armed Forces Canada"
                                                            },
                                                            "9": {
                                                                "code": "AE",
                                                                "name": "Armed Forces Europe"
                                                            },
                                                            "10": {
                                                                "code": "AM",
                                                                "name": "Armed Forces Middle East"
                                                            },
                                                            "11": {
                                                                "code": "AP",
                                                                "name": "Armed Forces Pacific"
                                                            },
                                                            "12": {
                                                                "code": "CA",
                                                                "name": "California"
                                                            },
                                                            "13": {
                                                                "code": "CO",
                                                                "name": "Colorado"
                                                            },
                                                            "14": {
                                                                "code": "CT",
                                                                "name": "Connecticut"
                                                            },
                                                            "15": {
                                                                "code": "DE",
                                                                "name": "Delaware"
                                                            },
                                                            "16": {
                                                                "code": "DC",
                                                                "name": "District of Columbia"
                                                            },
                                                            "17": {
                                                                "code": "FM",
                                                                "name": "Federated States Of Micronesia"
                                                            },
                                                            "18": {
                                                                "code": "FL",
                                                                "name": "Florida"
                                                            },
                                                            "19": {
                                                                "code": "GA",
                                                                "name": "Georgia"
                                                            },
                                                            "20": {
                                                                "code": "GU",
                                                                "name": "Guam"
                                                            },
                                                            "21": {
                                                                "code": "HI",
                                                                "name": "Hawaii"
                                                            },
                                                            "22": {
                                                                "code": "ID",
                                                                "name": "Idaho"
                                                            },
                                                            "23": {
                                                                "code": "IL",
                                                                "name": "Illinois"
                                                            },
                                                            "24": {
                                                                "code": "IN",
                                                                "name": "Indiana"
                                                            },
                                                            "25": {
                                                                "code": "IA",
                                                                "name": "Iowa"
                                                            },
                                                            "26": {
                                                                "code": "KS",
                                                                "name": "Kansas"
                                                            },
                                                            "27": {
                                                                "code": "KY",
                                                                "name": "Kentucky"
                                                            },
                                                            "28": {
                                                                "code": "LA",
                                                                "name": "Louisiana"
                                                            },
                                                            "29": {
                                                                "code": "ME",
                                                                "name": "Maine"
                                                            },
                                                            "30": {
                                                                "code": "MH",
                                                                "name": "Marshall Islands"
                                                            },
                                                            "31": {
                                                                "code": "MD",
                                                                "name": "Maryland"
                                                            },
                                                            "32": {
                                                                "code": "MA",
                                                                "name": "Massachusetts"
                                                            },
                                                            "33": {
                                                                "code": "MI",
                                                                "name": "Michigan"
                                                            },
                                                            "34": {
                                                                "code": "MN",
                                                                "name": "Minnesota"
                                                            },
                                                            "35": {
                                                                "code": "MS",
                                                                "name": "Mississippi"
                                                            },
                                                            "36": {
                                                                "code": "MO",
                                                                "name": "Missouri"
                                                            },
                                                            "37": {
                                                                "code": "MT",
                                                                "name": "Montana"
                                                            },
                                                            "38": {
                                                                "code": "NE",
                                                                "name": "Nebraska"
                                                            },
                                                            "39": {
                                                                "code": "NV",
                                                                "name": "Nevada"
                                                            },
                                                            "40": {
                                                                "code": "NH",
                                                                "name": "New Hampshire"
                                                            },
                                                            "41": {
                                                                "code": "NJ",
                                                                "name": "New Jersey"
                                                            },
                                                            "42": {
                                                                "code": "NM",
                                                                "name": "New Mexico"
                                                            },
                                                            "43": {
                                                                "code": "NY",
                                                                "name": "New York"
                                                            },
                                                            "44": {
                                                                "code": "NC",
                                                                "name": "North Carolina"
                                                            },
                                                            "45": {
                                                                "code": "ND",
                                                                "name": "North Dakota"
                                                            },
                                                            "46": {
                                                                "code": "MP",
                                                                "name": "Northern Mariana Islands"
                                                            },
                                                            "47": {
                                                                "code": "OH",
                                                                "name": "Ohio"
                                                            },
                                                            "48": {
                                                                "code": "OK",
                                                                "name": "Oklahoma"
                                                            },
                                                            "49": {
                                                                "code": "OR",
                                                                "name": "Oregon"
                                                            },
                                                            "50": {
                                                                "code": "PW",
                                                                "name": "Palau"
                                                            },
                                                            "51": {
                                                                "code": "PA",
                                                                "name": "Pennsylvania"
                                                            },
                                                            "52": {
                                                                "code": "PR",
                                                                "name": "Puerto Rico"
                                                            },
                                                            "53": {
                                                                "code": "RI",
                                                                "name": "Rhode Island"
                                                            },
                                                            "54": {
                                                                "code": "SC",
                                                                "name": "South Carolina"
                                                            },
                                                            "55": {
                                                                "code": "SD",
                                                                "name": "South Dakota"
                                                            },
                                                            "56": {
                                                                "code": "TN",
                                                                "name": "Tennessee"
                                                            },
                                                            "57": {
                                                                "code": "TX",
                                                                "name": "Texas"
                                                            },
                                                            "58": {
                                                                "code": "UT",
                                                                "name": "Utah"
                                                            },
                                                            "59": {
                                                                "code": "VT",
                                                                "name": "Vermont"
                                                            },
                                                            "60": {
                                                                "code": "VI",
                                                                "name": "Virgin Islands"
                                                            },
                                                            "61": {
                                                                "code": "VA",
                                                                "name": "Virginia"
                                                            },
                                                            "62": {
                                                                "code": "WA",
                                                                "name": "Washington"
                                                            },
                                                            "63": {
                                                                "code": "WV",
                                                                "name": "West Virginia"
                                                            },
                                                            "64": {
                                                                "code": "WI",
                                                                "name": "Wisconsin"
                                                            },
                                                            "65": {
                                                                "code": "WY",
                                                                "name": "Wyoming"
                                                            }
                                                        },
                                                        "RO": {
                                                            "278": {
                                                                "code": "AB",
                                                                "name": "Alba"
                                                            },
                                                            "279": {
                                                                "code": "AR",
                                                                "name": "Arad"
                                                            },
                                                            "280": {
                                                                "code": "AG",
                                                                "name": "Arge\u015f"
                                                            },
                                                            "281": {
                                                                "code": "BC",
                                                                "name": "Bac\u0103u"
                                                            },
                                                            "282": {
                                                                "code": "BH",
                                                                "name": "Bihor"
                                                            },
                                                            "283": {
                                                                "code": "BN",
                                                                "name": "Bistri\u0163a-N\u0103s\u0103ud"
                                                            },
                                                            "284": {
                                                                "code": "BT",
                                                                "name": "Boto\u015fani"
                                                            },
                                                            "286": {
                                                                "code": "BR",
                                                                "name": "Br\u0103ila"
                                                            },
                                                            "285": {
                                                                "code": "BV",
                                                                "name": "Bra\u015fov"
                                                            },
                                                            "287": {
                                                                "code": "B",
                                                                "name": "Bucure\u015fti"
                                                            },
                                                            "288": {
                                                                "code": "BZ",
                                                                "name": "Buz\u0103u"
                                                            },
                                                            "290": {
                                                                "code": "CL",
                                                                "name": "C\u0103l\u0103ra\u015fi"
                                                            },
                                                            "289": {
                                                                "code": "CS",
                                                                "name": "Cara\u015f-Severin"
                                                            },
                                                            "291": {
                                                                "code": "CJ",
                                                                "name": "Cluj"
                                                            },
                                                            "292": {
                                                                "code": "CT",
                                                                "name": "Constan\u0163a"
                                                            },
                                                            "293": {
                                                                "code": "CV",
                                                                "name": "Covasna"
                                                            },
                                                            "294": {
                                                                "code": "DB",
                                                                "name": "D\u00e2mbovi\u0163a"
                                                            },
                                                            "295": {
                                                                "code": "DJ",
                                                                "name": "Dolj"
                                                            },
                                                            "296": {
                                                                "code": "GL",
                                                                "name": "Gala\u0163i"
                                                            },
                                                            "297": {
                                                                "code": "GR",
                                                                "name": "Giurgiu"
                                                            },
                                                            "298": {
                                                                "code": "GJ",
                                                                "name": "Gorj"
                                                            },
                                                            "299": {
                                                                "code": "HR",
                                                                "name": "Harghita"
                                                            },
                                                            "300": {
                                                                "code": "HD",
                                                                "name": "Hunedoara"
                                                            },
                                                            "301": {
                                                                "code": "IL",
                                                                "name": "Ialomi\u0163a"
                                                            },
                                                            "302": {
                                                                "code": "IS",
                                                                "name": "Ia\u015fi"
                                                            },
                                                            "303": {
                                                                "code": "IF",
                                                                "name": "Ilfov"
                                                            },
                                                            "304": {
                                                                "code": "MM",
                                                                "name": "Maramure\u015f"
                                                            },
                                                            "305": {
                                                                "code": "MH",
                                                                "name": "Mehedin\u0163i"
                                                            },
                                                            "306": {
                                                                "code": "MS",
                                                                "name": "Mure\u015f"
                                                            },
                                                            "307": {
                                                                "code": "NT",
                                                                "name": "Neam\u0163"
                                                            },
                                                            "308": {
                                                                "code": "OT",
                                                                "name": "Olt"
                                                            },
                                                            "309": {
                                                                "code": "PH",
                                                                "name": "Prahova"
                                                            },
                                                            "311": {
                                                                "code": "SJ",
                                                                "name": "S\u0103laj"
                                                            },
                                                            "310": {
                                                                "code": "SM",
                                                                "name": "Satu-Mare"
                                                            },
                                                            "312": {
                                                                "code": "SB",
                                                                "name": "Sibiu"
                                                            },
                                                            "313": {
                                                                "code": "SV",
                                                                "name": "Suceava"
                                                            },
                                                            "314": {
                                                                "code": "TR",
                                                                "name": "Teleorman"
                                                            },
                                                            "315": {
                                                                "code": "TM",
                                                                "name": "Timi\u015f"
                                                            },
                                                            "316": {
                                                                "code": "TL",
                                                                "name": "Tulcea"
                                                            },
                                                            "318": {
                                                                "code": "VL",
                                                                "name": "V\u00e2lcea"
                                                            },
                                                            "317": {
                                                                "code": "VS",
                                                                "name": "Vaslui"
                                                            },
                                                            "319": {
                                                                "code": "VN",
                                                                "name": "Vrancea"
                                                            }
                                                        },
                                                        "CA": {
                                                            "66": {
                                                                "code": "AB",
                                                                "name": "Alberta"
                                                            },
                                                            "67": {
                                                                "code": "BC",
                                                                "name": "British Columbia"
                                                            },
                                                            "68": {
                                                                "code": "MB",
                                                                "name": "Manitoba"
                                                            },
                                                            "70": {
                                                                "code": "NB",
                                                                "name": "New Brunswick"
                                                            },
                                                            "69": {
                                                                "code": "NL",
                                                                "name": "Newfoundland and Labrador"
                                                            },
                                                            "72": {
                                                                "code": "NT",
                                                                "name": "Northwest Territories"
                                                            },
                                                            "71": {
                                                                "code": "NS",
                                                                "name": "Nova Scotia"
                                                            },
                                                            "73": {
                                                                "code": "NU",
                                                                "name": "Nunavut"
                                                            },
                                                            "74": {
                                                                "code": "ON",
                                                                "name": "Ontario"
                                                            },
                                                            "75": {
                                                                "code": "PE",
                                                                "name": "Prince Edward Island"
                                                            },
                                                            "76": {
                                                                "code": "QC",
                                                                "name": "Quebec"
                                                            },
                                                            "77": {
                                                                "code": "SK",
                                                                "name": "Saskatchewan"
                                                            },
                                                            "78": {
                                                                "code": "YT",
                                                                "name": "Yukon Territory"
                                                            }
                                                        },
                                                        "LT": {
                                                            "475": {
                                                                "code": "LT-AL",
                                                                "name": "Alytaus Apskritis"
                                                            },
                                                            "476": {
                                                                "code": "LT-KU",
                                                                "name": "Kauno Apskritis"
                                                            },
                                                            "477": {
                                                                "code": "LT-KL",
                                                                "name": "Klaip\u0117dos Apskritis"
                                                            },
                                                            "478": {
                                                                "code": "LT-MR",
                                                                "name": "Marijampol\u0117s Apskritis"
                                                            },
                                                            "479": {
                                                                "code": "LT-PN",
                                                                "name": "Panev\u0117\u017eio Apskritis"
                                                            },
                                                            "480": {
                                                                "code": "LT-SA",
                                                                "name": "\u0160iauli\u0173 Apskritis"
                                                            },
                                                            "481": {
                                                                "code": "LT-TA",
                                                                "name": "Taurag\u0117s Apskritis"
                                                            },
                                                            "482": {
                                                                "code": "LT-TE",
                                                                "name": "Tel\u0161i\u0173 Apskritis"
                                                            },
                                                            "483": {
                                                                "code": "LT-UT",
                                                                "name": "Utenos Apskritis"
                                                            },
                                                            "484": {
                                                                "code": "LT-VL",
                                                                "name": "Vilniaus Apskritis"
                                                            }
                                                        },
                                                        "DE": {
                                                            "80": {
                                                                "code": "BAW",
                                                                "name": "Baden-W\u00fcrttemberg"
                                                            },
                                                            "81": {
                                                                "code": "BAY",
                                                                "name": "Bayern"
                                                            },
                                                            "82": {
                                                                "code": "BER",
                                                                "name": "Berlin"
                                                            },
                                                            "83": {
                                                                "code": "BRG",
                                                                "name": "Brandenburg"
                                                            },
                                                            "84": {
                                                                "code": "BRE",
                                                                "name": "Bremen"
                                                            },
                                                            "85": {
                                                                "code": "HAM",
                                                                "name": "Hamburg"
                                                            },
                                                            "86": {
                                                                "code": "HES",
                                                                "name": "Hessen"
                                                            },
                                                            "87": {
                                                                "code": "MEC",
                                                                "name": "Mecklenburg-Vorpommern"
                                                            },
                                                            "79": {
                                                                "code": "NDS",
                                                                "name": "Niedersachsen"
                                                            },
                                                            "88": {
                                                                "code": "NRW",
                                                                "name": "Nordrhein-Westfalen"
                                                            },
                                                            "89": {
                                                                "code": "RHE",
                                                                "name": "Rheinland-Pfalz"
                                                            },
                                                            "90": {
                                                                "code": "SAR",
                                                                "name": "Saarland"
                                                            },
                                                            "91": {
                                                                "code": "SAS",
                                                                "name": "Sachsen"
                                                            },
                                                            "92": {
                                                                "code": "SAC",
                                                                "name": "Sachsen-Anhalt"
                                                            },
                                                            "93": {
                                                                "code": "SCN",
                                                                "name": "Schleswig-Holstein"
                                                            },
                                                            "94": {
                                                                "code": "THE",
                                                                "name": "Th\u00fcringen"
                                                            }
                                                        },
                                                        "AT": {
                                                            "102": {
                                                                "code": "BL",
                                                                "name": "Burgenland"
                                                            },
                                                            "99": {
                                                                "code": "KN",
                                                                "name": "K\u00e4rnten"
                                                            },
                                                            "96": {
                                                                "code": "NO",
                                                                "name": "Nieder\u00f6sterreich"
                                                            },
                                                            "97": {
                                                                "code": "OO",
                                                                "name": "Ober\u00f6sterreich"
                                                            },
                                                            "98": {
                                                                "code": "SB",
                                                                "name": "Salzburg"
                                                            },
                                                            "100": {
                                                                "code": "ST",
                                                                "name": "Steiermark"
                                                            },
                                                            "101": {
                                                                "code": "TI",
                                                                "name": "Tirol"
                                                            },
                                                            "103": {
                                                                "code": "VB",
                                                                "name": "Vorarlberg"
                                                            },
                                                            "95": {
                                                                "code": "WI",
                                                                "name": "Wien"
                                                            }
                                                        },
                                                        "EE": {
                                                            "340": {
                                                                "code": "EE-37",
                                                                "name": "Harjumaa"
                                                            },
                                                            "341": {
                                                                "code": "EE-39",
                                                                "name": "Hiiumaa"
                                                            },
                                                            "342": {
                                                                "code": "EE-44",
                                                                "name": "Ida-Virumaa"
                                                            },
                                                            "344": {
                                                                "code": "EE-51",
                                                                "name": "J\u00e4rvamaa"
                                                            },
                                                            "343": {
                                                                "code": "EE-49",
                                                                "name": "J\u00f5gevamaa"
                                                            },
                                                            "346": {
                                                                "code": "EE-59",
                                                                "name": "L\u00e4\u00e4ne-Virumaa"
                                                            },
                                                            "345": {
                                                                "code": "EE-57",
                                                                "name": "L\u00e4\u00e4nemaa"
                                                            },
                                                            "348": {
                                                                "code": "EE-67",
                                                                "name": "P\u00e4rnumaa"
                                                            },
                                                            "347": {
                                                                "code": "EE-65",
                                                                "name": "P\u00f5lvamaa"
                                                            },
                                                            "349": {
                                                                "code": "EE-70",
                                                                "name": "Raplamaa"
                                                            },
                                                            "350": {
                                                                "code": "EE-74",
                                                                "name": "Saaremaa"
                                                            },
                                                            "351": {
                                                                "code": "EE-78",
                                                                "name": "Tartumaa"
                                                            },
                                                            "352": {
                                                                "code": "EE-82",
                                                                "name": "Valgamaa"
                                                            },
                                                            "353": {
                                                                "code": "EE-84",
                                                                "name": "Viljandimaa"
                                                            },
                                                            "354": {
                                                                "code": "EE-86",
                                                                "name": "V\u00f5rumaa"
                                                            }
                                                        }
                                                    }, undefined, 'zip');

                                                    Validation.add('validate-existing-password', 'Please enter 6 or more characters. Leading or trailing spaces will be ignored.', function(v) {
                                                        var pass = v.strip(); /*strip leading and trailing spaces*/
                                                        return !(pass.length > 0 && pass.length < 6);
                                                    });
                                                    //]]>
                                                </script>
                                            </div>
                                        </div>

                                        <div id="tab-4-content" class="tab-content account-reset-password">
                                            <div class="grid12-6">

                                                <div class="member-mobile">
                                                    <i class="far fa-id-card"></i>
                                                    <span>Miembro</span>
                                                </div>
                                                <div id="reset-password-types" class="reset-password-types-wrapper">
                                                    <div id="step-forgot-password" class="reset-password-type-item active" data-name="email">
                                                        <form class="" action="https://flyallvvays.com/customer/account/ajaxForgotPasswordPost/" method="post" id="forgot-password-form">
                                                            <div class="fieldset">
                                                                <h2>Recupera tu contraseña aquí</h2>
                                                                <p class="form-instructions">Por favor, introduzca su dirección de correo electrónico a continuación. Recibirás un enlace para restablecer tu contraseña.</p>

                                                                <div class="ajax-messages"></div>

                                                                <ul class="form-list clearfix">
                                                                    <li>
                                                                        <label for="reset_email" class="required"><em>*</em>Email address</label>
                                                                        <div class="input-box">
                                                                            <input type="text" name="email" value="" id="reset_email" class="input-text required-entry validate-email" placeholder="Email address" title="Email address">
                                                                            <i class="fal fa-envelope mobile"></i>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="button-line">
                                                                <div class="submit-wrapper">
                                                                    <button type="submit" class="button" disabled="disabled">
                                                                        <span><span>Enviar correo electrónico</span></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div id="step-reset-forgotten-password" class="reset-password-type-item " data-name="reset_password">
                                                        <form action="https://flyallvvays.com/customer/account/ajaxResetPasswordPost/" method="post" id="reset-forgotten-password">
                                                            <div class="content">
                                                                <h2>Crea tu nueva contraseña</h2>

                                                                <div class="ajax-messages"></div>

                                                                <ul class="form-list">
                                                                    <li>
                                                                        <label for="reset_password" class="required"><em>*</em>New password</label>
                                                                        <div class="input-box">
                                                                            <input type="password" class="input-text required-entry validate-password" name="password" id="reset_password" placeholder="Nueva contraseña">
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="reset_confirmation" class="required"><em>*</em>Confirm new password</label>
                                                                        <div class="input-box">
                                                                            <input type="password" class="input-text required-entry validate-confirmation-password" name="confirmation" id="reset_confirmation" data-v-field-id="reset_password" placeholder="Confirmar nueva contraseña">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="button-line">
                                                                    <div class="submit-wrapper">
                                                                        <button type="submit" class="button" title="" name="send">
                                                                            <span> Confirmar </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <style>
                                                    .reset-password-types-wrapper .reset-password-type-item {
                                                        display: none;
                                                    }

                                                    .reset-password-types-wrapper .reset-password-type-item.active {
                                                        display: block;
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        (function() {
                                            WT.Utiles.handlerCountryInput(
                                                WT.Utiles.countriesList,
                                                WT.Utiles.defaultCiuntry,
                                                WT.Utiles.preferredCountries,
                                                $j('.intl-tel-input'),
                                                true
                                            );

                                            if (WT.Utiles._getParams('referrer')) {
                                                WT.Session.additionalPostData.login = [{
                                                    name: 'referrer',
                                                    value: WT.Utiles._getParams('referrer')
                                                }, ];
                                            }

                                            WT.Session.init();

                                            var defaultActiveTab = '2';
                                            var loginHash = localStorage.getItem('loginHash');
                                            var selectLoginTab = WT.Session.selectLoginTab;

                                            if (loginHash && jQuery('.error-msg').length) {
                                                selectLoginTab(loginHash.replace('#', ''));
                                            } else if (window.location.hash) {
                                                selectLoginTab(window.location.hash.replace('#', ''));
                                            } else {
                                                selectLoginTab('tab-' + defaultActiveTab);
                                            }

                                        })();
                                        //]]>
                                    </script>
                                </div>

                                <!-- TODO Move to styles -->
                                <style>
                                    .server-error {
                                        position: relative;
                                    }
                                </style>
                            </div>
                            <div class="postscript"></div>
                        </div>
                    </div>
                    <div class="main-bottom-container"></div>
                </div>
                <div class="footer-container custom">
                    <div class="footer-container2">
                        <div class="custom-footer" style="background-image: url(login_files/bg-footer.svg)"></div>
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



                            <a id="scroll-to-top" class="ic ic-up" href="https://flyallvvays.com/customer/account/login/#top"></a>

                        </div> <!-- end: footer-container3 -->
                    </div> <!-- end: footer-container2 -->
                </div> <!-- end: footer-container -->

                <div id="stepchangeloader" style="display:none">
                    <img src="./login_files/Spinner-1s-110px.gif">
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
                                            <div class="intl-tel-input allow-dropdown separate-dial-code"><div class="flag-container"><div class="selected-flag" role="combobox" aria-owns="country-listbox" tabindex="0" title="Suriname: +597"><div class="iti-flag sr"></div><div class="selected-dial-code">+597</div><div class="iti-arrow"></div></div><ul class="country-list hide" id="country-listbox" aria-expanded="false" role="listbox" aria-activedescendant="iti-item-sr"><li class="country preferred active" id="iti-item-sr" role="option" data-dial-code="597" data-country-code="sr" aria-selected="true"><div class="flag-box"><div class="iti-flag sr"></div></div><span class="country-name">Suriname</span><span class="dial-code">+597</span></li><li class="country preferred" id="iti-item-cw" role="option" data-dial-code="599" data-country-code="cw"><div class="flag-box"><div class="iti-flag cw"></div></div><span class="country-name">Curaçao</span><span class="dial-code">+599</span></li><li class="country preferred" id="iti-item-nl" role="option" data-dial-code="31" data-country-code="nl"><div class="flag-box"><div class="iti-flag nl"></div></div><span class="country-name">Netherlands (Nederland)</span><span class="dial-code">+31</span></li><li class="country preferred" id="iti-item-us" role="option" data-dial-code="1" data-country-code="us"><div class="flag-box"><div class="iti-flag us"></div></div><span class="country-name">United States</span><span class="dial-code">+1</span></li><li class="country preferred" id="iti-item-cu" role="option" data-dial-code="53" data-country-code="cu"><div class="flag-box"><div class="iti-flag cu"></div></div><span class="country-name">Cuba</span><span class="dial-code">+53</span></li><li class="country preferred" id="iti-item-br" role="option" data-dial-code="55" data-country-code="br"><div class="flag-box"><div class="iti-flag br"></div></div><span class="country-name">Brazil (Brasil)</span><span class="dial-code">+55</span></li><li class="divider" role="separator" aria-disabled="true"></li><li class="country standard" id="iti-item-af" role="option" data-dial-code="93" data-country-code="af"><div class="flag-box"><div class="iti-flag af"></div></div><span class="country-name">Afghanistan (‫افغانستان‬‎)</span><span class="dial-code">+93</span></li><li class="country standard" id="iti-item-al" role="option" data-dial-code="355" data-country-code="al"><div class="flag-box"><div class="iti-flag al"></div></div><span class="country-name">Albania (Shqipëri)</span><span class="dial-code">+355</span></li><li class="country standard" id="iti-item-dz" role="option" data-dial-code="213" data-country-code="dz"><div class="flag-box"><div class="iti-flag dz"></div></div><span class="country-name">Algeria (‫الجزائر‬‎)</span><span class="dial-code">+213</span></li><li class="country standard" id="iti-item-as" role="option" data-dial-code="1684" data-country-code="as"><div class="flag-box"><div class="iti-flag as"></div></div><span class="country-name">American Samoa</span><span class="dial-code">+1684</span></li><li class="country standard" id="iti-item-ad" role="option" data-dial-code="376" data-country-code="ad"><div class="flag-box"><div class="iti-flag ad"></div></div><span class="country-name">Andorra</span><span class="dial-code">+376</span></li><li class="country standard" id="iti-item-ao" role="option" data-dial-code="244" data-country-code="ao"><div class="flag-box"><div class="iti-flag ao"></div></div><span class="country-name">Angola</span><span class="dial-code">+244</span></li><li class="country standard" id="iti-item-ai" role="option" data-dial-code="1264" data-country-code="ai"><div class="flag-box"><div class="iti-flag ai"></div></div><span class="country-name">Anguilla</span><span class="dial-code">+1264</span></li><li class="country standard" id="iti-item-ag" role="option" data-dial-code="1268" data-country-code="ag"><div class="flag-box"><div class="iti-flag ag"></div></div><span class="country-name">Antigua and Barbuda</span><span class="dial-code">+1268</span></li><li class="country standard" id="iti-item-ar" role="option" data-dial-code="54" data-country-code="ar"><div class="flag-box"><div class="iti-flag ar"></div></div><span class="country-name">Argentina</span><span class="dial-code">+54</span></li><li class="country standard" id="iti-item-am" role="option" data-dial-code="374" data-country-code="am"><div class="flag-box"><div class="iti-flag am"></div></div><span class="country-name">Armenia (Հայաստան)</span><span class="dial-code">+374</span></li><li class="country standard" id="iti-item-aw" role="option" data-dial-code="297" data-country-code="aw"><div class="flag-box"><div class="iti-flag aw"></div></div><span class="country-name">Aruba</span><span class="dial-code">+297</span></li><li class="country standard" id="iti-item-au" role="option" data-dial-code="61" data-country-code="au"><div class="flag-box"><div class="iti-flag au"></div></div><span class="country-name">Australia</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-at" role="option" data-dial-code="43" data-country-code="at"><div class="flag-box"><div class="iti-flag at"></div></div><span class="country-name">Austria (Österreich)</span><span class="dial-code">+43</span></li><li class="country standard" id="iti-item-az" role="option" data-dial-code="994" data-country-code="az"><div class="flag-box"><div class="iti-flag az"></div></div><span class="country-name">Azerbaijan (Azərbaycan)</span><span class="dial-code">+994</span></li><li class="country standard" id="iti-item-bs" role="option" data-dial-code="1242" data-country-code="bs"><div class="flag-box"><div class="iti-flag bs"></div></div><span class="country-name">Bahamas</span><span class="dial-code">+1242</span></li><li class="country standard" id="iti-item-bh" role="option" data-dial-code="973" data-country-code="bh"><div class="flag-box"><div class="iti-flag bh"></div></div><span class="country-name">Bahrain (‫البحرين‬‎)</span><span class="dial-code">+973</span></li><li class="country standard" id="iti-item-bd" role="option" data-dial-code="880" data-country-code="bd"><div class="flag-box"><div class="iti-flag bd"></div></div><span class="country-name">Bangladesh (বাংলাদেশ)</span><span class="dial-code">+880</span></li><li class="country standard" id="iti-item-bb" role="option" data-dial-code="1246" data-country-code="bb"><div class="flag-box"><div class="iti-flag bb"></div></div><span class="country-name">Barbados</span><span class="dial-code">+1246</span></li><li class="country standard" id="iti-item-by" role="option" data-dial-code="375" data-country-code="by"><div class="flag-box"><div class="iti-flag by"></div></div><span class="country-name">Belarus (Беларусь)</span><span class="dial-code">+375</span></li><li class="country standard" id="iti-item-be" role="option" data-dial-code="32" data-country-code="be"><div class="flag-box"><div class="iti-flag be"></div></div><span class="country-name">Belgium (België)</span><span class="dial-code">+32</span></li><li class="country standard" id="iti-item-bz" role="option" data-dial-code="501" data-country-code="bz"><div class="flag-box"><div class="iti-flag bz"></div></div><span class="country-name">Belize</span><span class="dial-code">+501</span></li><li class="country standard" id="iti-item-bj" role="option" data-dial-code="229" data-country-code="bj"><div class="flag-box"><div class="iti-flag bj"></div></div><span class="country-name">Benin (Bénin)</span><span class="dial-code">+229</span></li><li class="country standard" id="iti-item-bm" role="option" data-dial-code="1441" data-country-code="bm"><div class="flag-box"><div class="iti-flag bm"></div></div><span class="country-name">Bermuda</span><span class="dial-code">+1441</span></li><li class="country standard" id="iti-item-bt" role="option" data-dial-code="975" data-country-code="bt"><div class="flag-box"><div class="iti-flag bt"></div></div><span class="country-name">Bhutan (འབྲུག)</span><span class="dial-code">+975</span></li><li class="country standard" id="iti-item-bo" role="option" data-dial-code="591" data-country-code="bo"><div class="flag-box"><div class="iti-flag bo"></div></div><span class="country-name">Bolivia</span><span class="dial-code">+591</span></li><li class="country standard" id="iti-item-ba" role="option" data-dial-code="387" data-country-code="ba"><div class="flag-box"><div class="iti-flag ba"></div></div><span class="country-name">Bosnia and Herzegovina (Босна и Херцеговина)</span><span class="dial-code">+387</span></li><li class="country standard" id="iti-item-bw" role="option" data-dial-code="267" data-country-code="bw"><div class="flag-box"><div class="iti-flag bw"></div></div><span class="country-name">Botswana</span><span class="dial-code">+267</span></li><li class="country standard" id="iti-item-br" role="option" data-dial-code="55" data-country-code="br"><div class="flag-box"><div class="iti-flag br"></div></div><span class="country-name">Brazil (Brasil)</span><span class="dial-code">+55</span></li><li class="country standard" id="iti-item-io" role="option" data-dial-code="246" data-country-code="io"><div class="flag-box"><div class="iti-flag io"></div></div><span class="country-name">British Indian Ocean Territory</span><span class="dial-code">+246</span></li><li class="country standard" id="iti-item-vg" role="option" data-dial-code="1284" data-country-code="vg"><div class="flag-box"><div class="iti-flag vg"></div></div><span class="country-name">British Virgin Islands</span><span class="dial-code">+1284</span></li><li class="country standard" id="iti-item-bn" role="option" data-dial-code="673" data-country-code="bn"><div class="flag-box"><div class="iti-flag bn"></div></div><span class="country-name">Brunei</span><span class="dial-code">+673</span></li><li class="country standard" id="iti-item-bg" role="option" data-dial-code="359" data-country-code="bg"><div class="flag-box"><div class="iti-flag bg"></div></div><span class="country-name">Bulgaria (България)</span><span class="dial-code">+359</span></li><li class="country standard" id="iti-item-bf" role="option" data-dial-code="226" data-country-code="bf"><div class="flag-box"><div class="iti-flag bf"></div></div><span class="country-name">Burkina Faso</span><span class="dial-code">+226</span></li><li class="country standard" id="iti-item-bi" role="option" data-dial-code="257" data-country-code="bi"><div class="flag-box"><div class="iti-flag bi"></div></div><span class="country-name">Burundi (Uburundi)</span><span class="dial-code">+257</span></li><li class="country standard" id="iti-item-kh" role="option" data-dial-code="855" data-country-code="kh"><div class="flag-box"><div class="iti-flag kh"></div></div><span class="country-name">Cambodia (កម្ពុជា)</span><span class="dial-code">+855</span></li><li class="country standard" id="iti-item-cm" role="option" data-dial-code="237" data-country-code="cm"><div class="flag-box"><div class="iti-flag cm"></div></div><span class="country-name">Cameroon (Cameroun)</span><span class="dial-code">+237</span></li><li class="country standard" id="iti-item-ca" role="option" data-dial-code="1" data-country-code="ca"><div class="flag-box"><div class="iti-flag ca"></div></div><span class="country-name">Canada</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-cv" role="option" data-dial-code="238" data-country-code="cv"><div class="flag-box"><div class="iti-flag cv"></div></div><span class="country-name">Cape Verde (Kabu Verdi)</span><span class="dial-code">+238</span></li><li class="country standard" id="iti-item-bq" role="option" data-dial-code="599" data-country-code="bq"><div class="flag-box"><div class="iti-flag bq"></div></div><span class="country-name">Caribbean Netherlands</span><span class="dial-code">+599</span></li><li class="country standard" id="iti-item-ky" role="option" data-dial-code="1345" data-country-code="ky"><div class="flag-box"><div class="iti-flag ky"></div></div><span class="country-name">Cayman Islands</span><span class="dial-code">+1345</span></li><li class="country standard" id="iti-item-cf" role="option" data-dial-code="236" data-country-code="cf"><div class="flag-box"><div class="iti-flag cf"></div></div><span class="country-name">Central African Republic (République centrafricaine)</span><span class="dial-code">+236</span></li><li class="country standard" id="iti-item-td" role="option" data-dial-code="235" data-country-code="td"><div class="flag-box"><div class="iti-flag td"></div></div><span class="country-name">Chad (Tchad)</span><span class="dial-code">+235</span></li><li class="country standard" id="iti-item-cl" role="option" data-dial-code="56" data-country-code="cl"><div class="flag-box"><div class="iti-flag cl"></div></div><span class="country-name">Chile</span><span class="dial-code">+56</span></li><li class="country standard" id="iti-item-cn" role="option" data-dial-code="86" data-country-code="cn"><div class="flag-box"><div class="iti-flag cn"></div></div><span class="country-name">China (中国)</span><span class="dial-code">+86</span></li><li class="country standard" id="iti-item-cx" role="option" data-dial-code="61" data-country-code="cx"><div class="flag-box"><div class="iti-flag cx"></div></div><span class="country-name">Christmas Island</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-cc" role="option" data-dial-code="61" data-country-code="cc"><div class="flag-box"><div class="iti-flag cc"></div></div><span class="country-name">Cocos (Keeling) Islands</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-co" role="option" data-dial-code="57" data-country-code="co"><div class="flag-box"><div class="iti-flag co"></div></div><span class="country-name">Colombia</span><span class="dial-code">+57</span></li><li class="country standard" id="iti-item-km" role="option" data-dial-code="269" data-country-code="km"><div class="flag-box"><div class="iti-flag km"></div></div><span class="country-name">Comoros (‫جزر القمر‬‎)</span><span class="dial-code">+269</span></li><li class="country standard" id="iti-item-cd" role="option" data-dial-code="243" data-country-code="cd"><div class="flag-box"><div class="iti-flag cd"></div></div><span class="country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</span><span class="dial-code">+243</span></li><li class="country standard" id="iti-item-cg" role="option" data-dial-code="242" data-country-code="cg"><div class="flag-box"><div class="iti-flag cg"></div></div><span class="country-name">Congo (Republic) (Congo-Brazzaville)</span><span class="dial-code">+242</span></li><li class="country standard" id="iti-item-ck" role="option" data-dial-code="682" data-country-code="ck"><div class="flag-box"><div class="iti-flag ck"></div></div><span class="country-name">Cook Islands</span><span class="dial-code">+682</span></li><li class="country standard" id="iti-item-cr" role="option" data-dial-code="506" data-country-code="cr"><div class="flag-box"><div class="iti-flag cr"></div></div><span class="country-name">Costa Rica</span><span class="dial-code">+506</span></li><li class="country standard" id="iti-item-ci" role="option" data-dial-code="225" data-country-code="ci"><div class="flag-box"><div class="iti-flag ci"></div></div><span class="country-name">Côte d’Ivoire</span><span class="dial-code">+225</span></li><li class="country standard" id="iti-item-hr" role="option" data-dial-code="385" data-country-code="hr"><div class="flag-box"><div class="iti-flag hr"></div></div><span class="country-name">Croatia (Hrvatska)</span><span class="dial-code">+385</span></li><li class="country standard" id="iti-item-cu" role="option" data-dial-code="53" data-country-code="cu"><div class="flag-box"><div class="iti-flag cu"></div></div><span class="country-name">Cuba</span><span class="dial-code">+53</span></li><li class="country standard" id="iti-item-cw" role="option" data-dial-code="599" data-country-code="cw"><div class="flag-box"><div class="iti-flag cw"></div></div><span class="country-name">Curaçao</span><span class="dial-code">+599</span></li><li class="country standard" id="iti-item-cy" role="option" data-dial-code="357" data-country-code="cy"><div class="flag-box"><div class="iti-flag cy"></div></div><span class="country-name">Cyprus (Κύπρος)</span><span class="dial-code">+357</span></li><li class="country standard" id="iti-item-cz" role="option" data-dial-code="420" data-country-code="cz"><div class="flag-box"><div class="iti-flag cz"></div></div><span class="country-name">Czech Republic (Česká republika)</span><span class="dial-code">+420</span></li><li class="country standard" id="iti-item-dk" role="option" data-dial-code="45" data-country-code="dk"><div class="flag-box"><div class="iti-flag dk"></div></div><span class="country-name">Denmark (Danmark)</span><span class="dial-code">+45</span></li><li class="country standard" id="iti-item-dj" role="option" data-dial-code="253" data-country-code="dj"><div class="flag-box"><div class="iti-flag dj"></div></div><span class="country-name">Djibouti</span><span class="dial-code">+253</span></li><li class="country standard" id="iti-item-dm" role="option" data-dial-code="1767" data-country-code="dm"><div class="flag-box"><div class="iti-flag dm"></div></div><span class="country-name">Dominica</span><span class="dial-code">+1767</span></li><li class="country standard" id="iti-item-do" role="option" data-dial-code="1" data-country-code="do"><div class="flag-box"><div class="iti-flag do"></div></div><span class="country-name">Dominican Republic (República Dominicana)</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-ec" role="option" data-dial-code="593" data-country-code="ec"><div class="flag-box"><div class="iti-flag ec"></div></div><span class="country-name">Ecuador</span><span class="dial-code">+593</span></li><li class="country standard" id="iti-item-eg" role="option" data-dial-code="20" data-country-code="eg"><div class="flag-box"><div class="iti-flag eg"></div></div><span class="country-name">Egypt (‫مصر‬‎)</span><span class="dial-code">+20</span></li><li class="country standard" id="iti-item-sv" role="option" data-dial-code="503" data-country-code="sv"><div class="flag-box"><div class="iti-flag sv"></div></div><span class="country-name">El Salvador</span><span class="dial-code">+503</span></li><li class="country standard" id="iti-item-gq" role="option" data-dial-code="240" data-country-code="gq"><div class="flag-box"><div class="iti-flag gq"></div></div><span class="country-name">Equatorial Guinea (Guinea Ecuatorial)</span><span class="dial-code">+240</span></li><li class="country standard" id="iti-item-er" role="option" data-dial-code="291" data-country-code="er"><div class="flag-box"><div class="iti-flag er"></div></div><span class="country-name">Eritrea</span><span class="dial-code">+291</span></li><li class="country standard" id="iti-item-ee" role="option" data-dial-code="372" data-country-code="ee"><div class="flag-box"><div class="iti-flag ee"></div></div><span class="country-name">Estonia (Eesti)</span><span class="dial-code">+372</span></li><li class="country standard" id="iti-item-et" role="option" data-dial-code="251" data-country-code="et"><div class="flag-box"><div class="iti-flag et"></div></div><span class="country-name">Ethiopia</span><span class="dial-code">+251</span></li><li class="country standard" id="iti-item-fk" role="option" data-dial-code="500" data-country-code="fk"><div class="flag-box"><div class="iti-flag fk"></div></div><span class="country-name">Falkland Islands (Islas Malvinas)</span><span class="dial-code">+500</span></li><li class="country standard" id="iti-item-fo" role="option" data-dial-code="298" data-country-code="fo"><div class="flag-box"><div class="iti-flag fo"></div></div><span class="country-name">Faroe Islands (Føroyar)</span><span class="dial-code">+298</span></li><li class="country standard" id="iti-item-fj" role="option" data-dial-code="679" data-country-code="fj"><div class="flag-box"><div class="iti-flag fj"></div></div><span class="country-name">Fiji</span><span class="dial-code">+679</span></li><li class="country standard" id="iti-item-fi" role="option" data-dial-code="358" data-country-code="fi"><div class="flag-box"><div class="iti-flag fi"></div></div><span class="country-name">Finland (Suomi)</span><span class="dial-code">+358</span></li><li class="country standard" id="iti-item-fr" role="option" data-dial-code="33" data-country-code="fr"><div class="flag-box"><div class="iti-flag fr"></div></div><span class="country-name">France</span><span class="dial-code">+33</span></li><li class="country standard" id="iti-item-gf" role="option" data-dial-code="594" data-country-code="gf"><div class="flag-box"><div class="iti-flag gf"></div></div><span class="country-name">French Guiana (Guyane française)</span><span class="dial-code">+594</span></li><li class="country standard" id="iti-item-pf" role="option" data-dial-code="689" data-country-code="pf"><div class="flag-box"><div class="iti-flag pf"></div></div><span class="country-name">French Polynesia (Polynésie française)</span><span class="dial-code">+689</span></li><li class="country standard" id="iti-item-ga" role="option" data-dial-code="241" data-country-code="ga"><div class="flag-box"><div class="iti-flag ga"></div></div><span class="country-name">Gabon</span><span class="dial-code">+241</span></li><li class="country standard" id="iti-item-gm" role="option" data-dial-code="220" data-country-code="gm"><div class="flag-box"><div class="iti-flag gm"></div></div><span class="country-name">Gambia</span><span class="dial-code">+220</span></li><li class="country standard" id="iti-item-ge" role="option" data-dial-code="995" data-country-code="ge"><div class="flag-box"><div class="iti-flag ge"></div></div><span class="country-name">Georgia (საქართველო)</span><span class="dial-code">+995</span></li><li class="country standard" id="iti-item-de" role="option" data-dial-code="49" data-country-code="de"><div class="flag-box"><div class="iti-flag de"></div></div><span class="country-name">Germany (Deutschland)</span><span class="dial-code">+49</span></li><li class="country standard" id="iti-item-gh" role="option" data-dial-code="233" data-country-code="gh"><div class="flag-box"><div class="iti-flag gh"></div></div><span class="country-name">Ghana (Gaana)</span><span class="dial-code">+233</span></li><li class="country standard" id="iti-item-gi" role="option" data-dial-code="350" data-country-code="gi"><div class="flag-box"><div class="iti-flag gi"></div></div><span class="country-name">Gibraltar</span><span class="dial-code">+350</span></li><li class="country standard" id="iti-item-gr" role="option" data-dial-code="30" data-country-code="gr"><div class="flag-box"><div class="iti-flag gr"></div></div><span class="country-name">Greece (Ελλάδα)</span><span class="dial-code">+30</span></li><li class="country standard" id="iti-item-gl" role="option" data-dial-code="299" data-country-code="gl"><div class="flag-box"><div class="iti-flag gl"></div></div><span class="country-name">Greenland (Kalaallit Nunaat)</span><span class="dial-code">+299</span></li><li class="country standard" id="iti-item-gd" role="option" data-dial-code="1473" data-country-code="gd"><div class="flag-box"><div class="iti-flag gd"></div></div><span class="country-name">Grenada</span><span class="dial-code">+1473</span></li><li class="country standard" id="iti-item-gp" role="option" data-dial-code="590" data-country-code="gp"><div class="flag-box"><div class="iti-flag gp"></div></div><span class="country-name">Guadeloupe</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-gu" role="option" data-dial-code="1671" data-country-code="gu"><div class="flag-box"><div class="iti-flag gu"></div></div><span class="country-name">Guam</span><span class="dial-code">+1671</span></li><li class="country standard" id="iti-item-gt" role="option" data-dial-code="502" data-country-code="gt"><div class="flag-box"><div class="iti-flag gt"></div></div><span class="country-name">Guatemala</span><span class="dial-code">+502</span></li><li class="country standard" id="iti-item-gg" role="option" data-dial-code="44" data-country-code="gg"><div class="flag-box"><div class="iti-flag gg"></div></div><span class="country-name">Guernsey</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-gn" role="option" data-dial-code="224" data-country-code="gn"><div class="flag-box"><div class="iti-flag gn"></div></div><span class="country-name">Guinea (Guinée)</span><span class="dial-code">+224</span></li><li class="country standard" id="iti-item-gw" role="option" data-dial-code="245" data-country-code="gw"><div class="flag-box"><div class="iti-flag gw"></div></div><span class="country-name">Guinea-Bissau (Guiné Bissau)</span><span class="dial-code">+245</span></li><li class="country standard" id="iti-item-gy" role="option" data-dial-code="592" data-country-code="gy"><div class="flag-box"><div class="iti-flag gy"></div></div><span class="country-name">Guyana</span><span class="dial-code">+592</span></li><li class="country standard" id="iti-item-ht" role="option" data-dial-code="509" data-country-code="ht"><div class="flag-box"><div class="iti-flag ht"></div></div><span class="country-name">Haiti</span><span class="dial-code">+509</span></li><li class="country standard" id="iti-item-hn" role="option" data-dial-code="504" data-country-code="hn"><div class="flag-box"><div class="iti-flag hn"></div></div><span class="country-name">Honduras</span><span class="dial-code">+504</span></li><li class="country standard" id="iti-item-hk" role="option" data-dial-code="852" data-country-code="hk"><div class="flag-box"><div class="iti-flag hk"></div></div><span class="country-name">Hong Kong (香港)</span><span class="dial-code">+852</span></li><li class="country standard" id="iti-item-hu" role="option" data-dial-code="36" data-country-code="hu"><div class="flag-box"><div class="iti-flag hu"></div></div><span class="country-name">Hungary (Magyarország)</span><span class="dial-code">+36</span></li><li class="country standard" id="iti-item-is" role="option" data-dial-code="354" data-country-code="is"><div class="flag-box"><div class="iti-flag is"></div></div><span class="country-name">Iceland (Ísland)</span><span class="dial-code">+354</span></li><li class="country standard" id="iti-item-in" role="option" data-dial-code="91" data-country-code="in"><div class="flag-box"><div class="iti-flag in"></div></div><span class="country-name">India (भारत)</span><span class="dial-code">+91</span></li><li class="country standard" id="iti-item-id" role="option" data-dial-code="62" data-country-code="id"><div class="flag-box"><div class="iti-flag id"></div></div><span class="country-name">Indonesia</span><span class="dial-code">+62</span></li><li class="country standard" id="iti-item-ir" role="option" data-dial-code="98" data-country-code="ir"><div class="flag-box"><div class="iti-flag ir"></div></div><span class="country-name">Iran (‫ایران‬‎)</span><span class="dial-code">+98</span></li><li class="country standard" id="iti-item-iq" role="option" data-dial-code="964" data-country-code="iq"><div class="flag-box"><div class="iti-flag iq"></div></div><span class="country-name">Iraq (‫العراق‬‎)</span><span class="dial-code">+964</span></li><li class="country standard" id="iti-item-ie" role="option" data-dial-code="353" data-country-code="ie"><div class="flag-box"><div class="iti-flag ie"></div></div><span class="country-name">Ireland</span><span class="dial-code">+353</span></li><li class="country standard" id="iti-item-im" role="option" data-dial-code="44" data-country-code="im"><div class="flag-box"><div class="iti-flag im"></div></div><span class="country-name">Isle of Man</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-il" role="option" data-dial-code="972" data-country-code="il"><div class="flag-box"><div class="iti-flag il"></div></div><span class="country-name">Israel (‫ישראל‬‎)</span><span class="dial-code">+972</span></li><li class="country standard" id="iti-item-it" role="option" data-dial-code="39" data-country-code="it"><div class="flag-box"><div class="iti-flag it"></div></div><span class="country-name">Italy (Italia)</span><span class="dial-code">+39</span></li><li class="country standard" id="iti-item-jm" role="option" data-dial-code="1" data-country-code="jm"><div class="flag-box"><div class="iti-flag jm"></div></div><span class="country-name">Jamaica</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-jp" role="option" data-dial-code="81" data-country-code="jp"><div class="flag-box"><div class="iti-flag jp"></div></div><span class="country-name">Japan (日本)</span><span class="dial-code">+81</span></li><li class="country standard" id="iti-item-je" role="option" data-dial-code="44" data-country-code="je"><div class="flag-box"><div class="iti-flag je"></div></div><span class="country-name">Jersey</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-jo" role="option" data-dial-code="962" data-country-code="jo"><div class="flag-box"><div class="iti-flag jo"></div></div><span class="country-name">Jordan (‫الأردن‬‎)</span><span class="dial-code">+962</span></li><li class="country standard" id="iti-item-kz" role="option" data-dial-code="7" data-country-code="kz"><div class="flag-box"><div class="iti-flag kz"></div></div><span class="country-name">Kazakhstan (Казахстан)</span><span class="dial-code">+7</span></li><li class="country standard" id="iti-item-ke" role="option" data-dial-code="254" data-country-code="ke"><div class="flag-box"><div class="iti-flag ke"></div></div><span class="country-name">Kenya</span><span class="dial-code">+254</span></li><li class="country standard" id="iti-item-ki" role="option" data-dial-code="686" data-country-code="ki"><div class="flag-box"><div class="iti-flag ki"></div></div><span class="country-name">Kiribati</span><span class="dial-code">+686</span></li><li class="country standard" id="iti-item-xk" role="option" data-dial-code="383" data-country-code="xk"><div class="flag-box"><div class="iti-flag xk"></div></div><span class="country-name">Kosovo</span><span class="dial-code">+383</span></li><li class="country standard" id="iti-item-kw" role="option" data-dial-code="965" data-country-code="kw"><div class="flag-box"><div class="iti-flag kw"></div></div><span class="country-name">Kuwait (‫الكويت‬‎)</span><span class="dial-code">+965</span></li><li class="country standard" id="iti-item-kg" role="option" data-dial-code="996" data-country-code="kg"><div class="flag-box"><div class="iti-flag kg"></div></div><span class="country-name">Kyrgyzstan (Кыргызстан)</span><span class="dial-code">+996</span></li><li class="country standard" id="iti-item-la" role="option" data-dial-code="856" data-country-code="la"><div class="flag-box"><div class="iti-flag la"></div></div><span class="country-name">Laos (ລາວ)</span><span class="dial-code">+856</span></li><li class="country standard" id="iti-item-lv" role="option" data-dial-code="371" data-country-code="lv"><div class="flag-box"><div class="iti-flag lv"></div></div><span class="country-name">Latvia (Latvija)</span><span class="dial-code">+371</span></li><li class="country standard" id="iti-item-lb" role="option" data-dial-code="961" data-country-code="lb"><div class="flag-box"><div class="iti-flag lb"></div></div><span class="country-name">Lebanon (‫لبنان‬‎)</span><span class="dial-code">+961</span></li><li class="country standard" id="iti-item-ls" role="option" data-dial-code="266" data-country-code="ls"><div class="flag-box"><div class="iti-flag ls"></div></div><span class="country-name">Lesotho</span><span class="dial-code">+266</span></li><li class="country standard" id="iti-item-lr" role="option" data-dial-code="231" data-country-code="lr"><div class="flag-box"><div class="iti-flag lr"></div></div><span class="country-name">Liberia</span><span class="dial-code">+231</span></li><li class="country standard" id="iti-item-ly" role="option" data-dial-code="218" data-country-code="ly"><div class="flag-box"><div class="iti-flag ly"></div></div><span class="country-name">Libya (‫ليبيا‬‎)</span><span class="dial-code">+218</span></li><li class="country standard" id="iti-item-li" role="option" data-dial-code="423" data-country-code="li"><div class="flag-box"><div class="iti-flag li"></div></div><span class="country-name">Liechtenstein</span><span class="dial-code">+423</span></li><li class="country standard" id="iti-item-lt" role="option" data-dial-code="370" data-country-code="lt"><div class="flag-box"><div class="iti-flag lt"></div></div><span class="country-name">Lithuania (Lietuva)</span><span class="dial-code">+370</span></li><li class="country standard" id="iti-item-lu" role="option" data-dial-code="352" data-country-code="lu"><div class="flag-box"><div class="iti-flag lu"></div></div><span class="country-name">Luxembourg</span><span class="dial-code">+352</span></li><li class="country standard" id="iti-item-mo" role="option" data-dial-code="853" data-country-code="mo"><div class="flag-box"><div class="iti-flag mo"></div></div><span class="country-name">Macau (澳門)</span><span class="dial-code">+853</span></li><li class="country standard" id="iti-item-mk" role="option" data-dial-code="389" data-country-code="mk"><div class="flag-box"><div class="iti-flag mk"></div></div><span class="country-name">Macedonia (FYROM) (Македонија)</span><span class="dial-code">+389</span></li><li class="country standard" id="iti-item-mg" role="option" data-dial-code="261" data-country-code="mg"><div class="flag-box"><div class="iti-flag mg"></div></div><span class="country-name">Madagascar (Madagasikara)</span><span class="dial-code">+261</span></li><li class="country standard" id="iti-item-mw" role="option" data-dial-code="265" data-country-code="mw"><div class="flag-box"><div class="iti-flag mw"></div></div><span class="country-name">Malawi</span><span class="dial-code">+265</span></li><li class="country standard" id="iti-item-my" role="option" data-dial-code="60" data-country-code="my"><div class="flag-box"><div class="iti-flag my"></div></div><span class="country-name">Malaysia</span><span class="dial-code">+60</span></li><li class="country standard" id="iti-item-mv" role="option" data-dial-code="960" data-country-code="mv"><div class="flag-box"><div class="iti-flag mv"></div></div><span class="country-name">Maldives</span><span class="dial-code">+960</span></li><li class="country standard" id="iti-item-ml" role="option" data-dial-code="223" data-country-code="ml"><div class="flag-box"><div class="iti-flag ml"></div></div><span class="country-name">Mali</span><span class="dial-code">+223</span></li><li class="country standard" id="iti-item-mt" role="option" data-dial-code="356" data-country-code="mt"><div class="flag-box"><div class="iti-flag mt"></div></div><span class="country-name">Malta</span><span class="dial-code">+356</span></li><li class="country standard" id="iti-item-mh" role="option" data-dial-code="692" data-country-code="mh"><div class="flag-box"><div class="iti-flag mh"></div></div><span class="country-name">Marshall Islands</span><span class="dial-code">+692</span></li><li class="country standard" id="iti-item-mq" role="option" data-dial-code="596" data-country-code="mq"><div class="flag-box"><div class="iti-flag mq"></div></div><span class="country-name">Martinique</span><span class="dial-code">+596</span></li><li class="country standard" id="iti-item-mr" role="option" data-dial-code="222" data-country-code="mr"><div class="flag-box"><div class="iti-flag mr"></div></div><span class="country-name">Mauritania (‫موريتانيا‬‎)</span><span class="dial-code">+222</span></li><li class="country standard" id="iti-item-mu" role="option" data-dial-code="230" data-country-code="mu"><div class="flag-box"><div class="iti-flag mu"></div></div><span class="country-name">Mauritius (Moris)</span><span class="dial-code">+230</span></li><li class="country standard" id="iti-item-yt" role="option" data-dial-code="262" data-country-code="yt"><div class="flag-box"><div class="iti-flag yt"></div></div><span class="country-name">Mayotte</span><span class="dial-code">+262</span></li><li class="country standard" id="iti-item-mx" role="option" data-dial-code="52" data-country-code="mx"><div class="flag-box"><div class="iti-flag mx"></div></div><span class="country-name">Mexico (México)</span><span class="dial-code">+52</span></li><li class="country standard" id="iti-item-fm" role="option" data-dial-code="691" data-country-code="fm"><div class="flag-box"><div class="iti-flag fm"></div></div><span class="country-name">Micronesia</span><span class="dial-code">+691</span></li><li class="country standard" id="iti-item-md" role="option" data-dial-code="373" data-country-code="md"><div class="flag-box"><div class="iti-flag md"></div></div><span class="country-name">Moldova (Republica Moldova)</span><span class="dial-code">+373</span></li><li class="country standard" id="iti-item-mc" role="option" data-dial-code="377" data-country-code="mc"><div class="flag-box"><div class="iti-flag mc"></div></div><span class="country-name">Monaco</span><span class="dial-code">+377</span></li><li class="country standard" id="iti-item-mn" role="option" data-dial-code="976" data-country-code="mn"><div class="flag-box"><div class="iti-flag mn"></div></div><span class="country-name">Mongolia (Монгол)</span><span class="dial-code">+976</span></li><li class="country standard" id="iti-item-me" role="option" data-dial-code="382" data-country-code="me"><div class="flag-box"><div class="iti-flag me"></div></div><span class="country-name">Montenegro (Crna Gora)</span><span class="dial-code">+382</span></li><li class="country standard" id="iti-item-ms" role="option" data-dial-code="1664" data-country-code="ms"><div class="flag-box"><div class="iti-flag ms"></div></div><span class="country-name">Montserrat</span><span class="dial-code">+1664</span></li><li class="country standard" id="iti-item-ma" role="option" data-dial-code="212" data-country-code="ma"><div class="flag-box"><div class="iti-flag ma"></div></div><span class="country-name">Morocco (‫المغرب‬‎)</span><span class="dial-code">+212</span></li><li class="country standard" id="iti-item-mz" role="option" data-dial-code="258" data-country-code="mz"><div class="flag-box"><div class="iti-flag mz"></div></div><span class="country-name">Mozambique (Moçambique)</span><span class="dial-code">+258</span></li><li class="country standard" id="iti-item-mm" role="option" data-dial-code="95" data-country-code="mm"><div class="flag-box"><div class="iti-flag mm"></div></div><span class="country-name">Myanmar (Burma) (မြန်မာ)</span><span class="dial-code">+95</span></li><li class="country standard" id="iti-item-na" role="option" data-dial-code="264" data-country-code="na"><div class="flag-box"><div class="iti-flag na"></div></div><span class="country-name">Namibia (Namibië)</span><span class="dial-code">+264</span></li><li class="country standard" id="iti-item-nr" role="option" data-dial-code="674" data-country-code="nr"><div class="flag-box"><div class="iti-flag nr"></div></div><span class="country-name">Nauru</span><span class="dial-code">+674</span></li><li class="country standard" id="iti-item-np" role="option" data-dial-code="977" data-country-code="np"><div class="flag-box"><div class="iti-flag np"></div></div><span class="country-name">Nepal (नेपाल)</span><span class="dial-code">+977</span></li><li class="country standard" id="iti-item-nl" role="option" data-dial-code="31" data-country-code="nl"><div class="flag-box"><div class="iti-flag nl"></div></div><span class="country-name">Netherlands (Nederland)</span><span class="dial-code">+31</span></li><li class="country standard" id="iti-item-nc" role="option" data-dial-code="687" data-country-code="nc"><div class="flag-box"><div class="iti-flag nc"></div></div><span class="country-name">New Caledonia (Nouvelle-Calédonie)</span><span class="dial-code">+687</span></li><li class="country standard" id="iti-item-nz" role="option" data-dial-code="64" data-country-code="nz"><div class="flag-box"><div class="iti-flag nz"></div></div><span class="country-name">New Zealand</span><span class="dial-code">+64</span></li><li class="country standard" id="iti-item-ni" role="option" data-dial-code="505" data-country-code="ni"><div class="flag-box"><div class="iti-flag ni"></div></div><span class="country-name">Nicaragua</span><span class="dial-code">+505</span></li><li class="country standard" id="iti-item-ne" role="option" data-dial-code="227" data-country-code="ne"><div class="flag-box"><div class="iti-flag ne"></div></div><span class="country-name">Niger (Nijar)</span><span class="dial-code">+227</span></li><li class="country standard" id="iti-item-ng" role="option" data-dial-code="234" data-country-code="ng"><div class="flag-box"><div class="iti-flag ng"></div></div><span class="country-name">Nigeria</span><span class="dial-code">+234</span></li><li class="country standard" id="iti-item-nu" role="option" data-dial-code="683" data-country-code="nu"><div class="flag-box"><div class="iti-flag nu"></div></div><span class="country-name">Niue</span><span class="dial-code">+683</span></li><li class="country standard" id="iti-item-nf" role="option" data-dial-code="672" data-country-code="nf"><div class="flag-box"><div class="iti-flag nf"></div></div><span class="country-name">Norfolk Island</span><span class="dial-code">+672</span></li><li class="country standard" id="iti-item-kp" role="option" data-dial-code="850" data-country-code="kp"><div class="flag-box"><div class="iti-flag kp"></div></div><span class="country-name">North Korea (조선 민주주의 인민 공화국)</span><span class="dial-code">+850</span></li><li class="country standard" id="iti-item-mp" role="option" data-dial-code="1670" data-country-code="mp"><div class="flag-box"><div class="iti-flag mp"></div></div><span class="country-name">Northern Mariana Islands</span><span class="dial-code">+1670</span></li><li class="country standard" id="iti-item-no" role="option" data-dial-code="47" data-country-code="no"><div class="flag-box"><div class="iti-flag no"></div></div><span class="country-name">Norway (Norge)</span><span class="dial-code">+47</span></li><li class="country standard" id="iti-item-om" role="option" data-dial-code="968" data-country-code="om"><div class="flag-box"><div class="iti-flag om"></div></div><span class="country-name">Oman (‫عُمان‬‎)</span><span class="dial-code">+968</span></li><li class="country standard" id="iti-item-pk" role="option" data-dial-code="92" data-country-code="pk"><div class="flag-box"><div class="iti-flag pk"></div></div><span class="country-name">Pakistan (‫پاکستان‬‎)</span><span class="dial-code">+92</span></li><li class="country standard" id="iti-item-pw" role="option" data-dial-code="680" data-country-code="pw"><div class="flag-box"><div class="iti-flag pw"></div></div><span class="country-name">Palau</span><span class="dial-code">+680</span></li><li class="country standard" id="iti-item-ps" role="option" data-dial-code="970" data-country-code="ps"><div class="flag-box"><div class="iti-flag ps"></div></div><span class="country-name">Palestine (‫فلسطين‬‎)</span><span class="dial-code">+970</span></li><li class="country standard" id="iti-item-pa" role="option" data-dial-code="507" data-country-code="pa"><div class="flag-box"><div class="iti-flag pa"></div></div><span class="country-name">Panama (Panamá)</span><span class="dial-code">+507</span></li><li class="country standard" id="iti-item-pg" role="option" data-dial-code="675" data-country-code="pg"><div class="flag-box"><div class="iti-flag pg"></div></div><span class="country-name">Papua New Guinea</span><span class="dial-code">+675</span></li><li class="country standard" id="iti-item-py" role="option" data-dial-code="595" data-country-code="py"><div class="flag-box"><div class="iti-flag py"></div></div><span class="country-name">Paraguay</span><span class="dial-code">+595</span></li><li class="country standard" id="iti-item-pe" role="option" data-dial-code="51" data-country-code="pe"><div class="flag-box"><div class="iti-flag pe"></div></div><span class="country-name">Peru (Perú)</span><span class="dial-code">+51</span></li><li class="country standard" id="iti-item-ph" role="option" data-dial-code="63" data-country-code="ph"><div class="flag-box"><div class="iti-flag ph"></div></div><span class="country-name">Philippines</span><span class="dial-code">+63</span></li><li class="country standard" id="iti-item-pl" role="option" data-dial-code="48" data-country-code="pl"><div class="flag-box"><div class="iti-flag pl"></div></div><span class="country-name">Poland (Polska)</span><span class="dial-code">+48</span></li><li class="country standard" id="iti-item-pt" role="option" data-dial-code="351" data-country-code="pt"><div class="flag-box"><div class="iti-flag pt"></div></div><span class="country-name">Portugal</span><span class="dial-code">+351</span></li><li class="country standard" id="iti-item-pr" role="option" data-dial-code="1" data-country-code="pr"><div class="flag-box"><div class="iti-flag pr"></div></div><span class="country-name">Puerto Rico</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-qa" role="option" data-dial-code="974" data-country-code="qa"><div class="flag-box"><div class="iti-flag qa"></div></div><span class="country-name">Qatar (‫قطر‬‎)</span><span class="dial-code">+974</span></li><li class="country standard" id="iti-item-re" role="option" data-dial-code="262" data-country-code="re"><div class="flag-box"><div class="iti-flag re"></div></div><span class="country-name">Réunion (La Réunion)</span><span class="dial-code">+262</span></li><li class="country standard" id="iti-item-ro" role="option" data-dial-code="40" data-country-code="ro"><div class="flag-box"><div class="iti-flag ro"></div></div><span class="country-name">Romania (România)</span><span class="dial-code">+40</span></li><li class="country standard" id="iti-item-ru" role="option" data-dial-code="7" data-country-code="ru"><div class="flag-box"><div class="iti-flag ru"></div></div><span class="country-name">Russia (Россия)</span><span class="dial-code">+7</span></li><li class="country standard" id="iti-item-rw" role="option" data-dial-code="250" data-country-code="rw"><div class="flag-box"><div class="iti-flag rw"></div></div><span class="country-name">Rwanda</span><span class="dial-code">+250</span></li><li class="country standard" id="iti-item-bl" role="option" data-dial-code="590" data-country-code="bl"><div class="flag-box"><div class="iti-flag bl"></div></div><span class="country-name">Saint Barthélemy</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-sh" role="option" data-dial-code="290" data-country-code="sh"><div class="flag-box"><div class="iti-flag sh"></div></div><span class="country-name">Saint Helena</span><span class="dial-code">+290</span></li><li class="country standard" id="iti-item-kn" role="option" data-dial-code="1869" data-country-code="kn"><div class="flag-box"><div class="iti-flag kn"></div></div><span class="country-name">Saint Kitts and Nevis</span><span class="dial-code">+1869</span></li><li class="country standard" id="iti-item-lc" role="option" data-dial-code="1758" data-country-code="lc"><div class="flag-box"><div class="iti-flag lc"></div></div><span class="country-name">Saint Lucia</span><span class="dial-code">+1758</span></li><li class="country standard" id="iti-item-mf" role="option" data-dial-code="590" data-country-code="mf"><div class="flag-box"><div class="iti-flag mf"></div></div><span class="country-name">Saint Martin (Saint-Martin (partie française))</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-pm" role="option" data-dial-code="508" data-country-code="pm"><div class="flag-box"><div class="iti-flag pm"></div></div><span class="country-name">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</span><span class="dial-code">+508</span></li><li class="country standard" id="iti-item-vc" role="option" data-dial-code="1784" data-country-code="vc"><div class="flag-box"><div class="iti-flag vc"></div></div><span class="country-name">Saint Vincent and the Grenadines</span><span class="dial-code">+1784</span></li><li class="country standard" id="iti-item-ws" role="option" data-dial-code="685" data-country-code="ws"><div class="flag-box"><div class="iti-flag ws"></div></div><span class="country-name">Samoa</span><span class="dial-code">+685</span></li><li class="country standard" id="iti-item-sm" role="option" data-dial-code="378" data-country-code="sm"><div class="flag-box"><div class="iti-flag sm"></div></div><span class="country-name">San Marino</span><span class="dial-code">+378</span></li><li class="country standard" id="iti-item-st" role="option" data-dial-code="239" data-country-code="st"><div class="flag-box"><div class="iti-flag st"></div></div><span class="country-name">São Tomé and Príncipe (São Tomé e Príncipe)</span><span class="dial-code">+239</span></li><li class="country standard" id="iti-item-sa" role="option" data-dial-code="966" data-country-code="sa"><div class="flag-box"><div class="iti-flag sa"></div></div><span class="country-name">Saudi Arabia (‫المملكة العربية السعودية‬‎)</span><span class="dial-code">+966</span></li><li class="country standard" id="iti-item-sn" role="option" data-dial-code="221" data-country-code="sn"><div class="flag-box"><div class="iti-flag sn"></div></div><span class="country-name">Senegal (Sénégal)</span><span class="dial-code">+221</span></li><li class="country standard" id="iti-item-rs" role="option" data-dial-code="381" data-country-code="rs"><div class="flag-box"><div class="iti-flag rs"></div></div><span class="country-name">Serbia (Србија)</span><span class="dial-code">+381</span></li><li class="country standard" id="iti-item-sc" role="option" data-dial-code="248" data-country-code="sc"><div class="flag-box"><div class="iti-flag sc"></div></div><span class="country-name">Seychelles</span><span class="dial-code">+248</span></li><li class="country standard" id="iti-item-sl" role="option" data-dial-code="232" data-country-code="sl"><div class="flag-box"><div class="iti-flag sl"></div></div><span class="country-name">Sierra Leone</span><span class="dial-code">+232</span></li><li class="country standard" id="iti-item-sg" role="option" data-dial-code="65" data-country-code="sg"><div class="flag-box"><div class="iti-flag sg"></div></div><span class="country-name">Singapore</span><span class="dial-code">+65</span></li><li class="country standard" id="iti-item-sx" role="option" data-dial-code="1721" data-country-code="sx"><div class="flag-box"><div class="iti-flag sx"></div></div><span class="country-name">Sint Maarten</span><span class="dial-code">+1721</span></li><li class="country standard" id="iti-item-sk" role="option" data-dial-code="421" data-country-code="sk"><div class="flag-box"><div class="iti-flag sk"></div></div><span class="country-name">Slovakia (Slovensko)</span><span class="dial-code">+421</span></li><li class="country standard" id="iti-item-si" role="option" data-dial-code="386" data-country-code="si"><div class="flag-box"><div class="iti-flag si"></div></div><span class="country-name">Slovenia (Slovenija)</span><span class="dial-code">+386</span></li><li class="country standard" id="iti-item-sb" role="option" data-dial-code="677" data-country-code="sb"><div class="flag-box"><div class="iti-flag sb"></div></div><span class="country-name">Solomon Islands</span><span class="dial-code">+677</span></li><li class="country standard" id="iti-item-so" role="option" data-dial-code="252" data-country-code="so"><div class="flag-box"><div class="iti-flag so"></div></div><span class="country-name">Somalia (Soomaaliya)</span><span class="dial-code">+252</span></li><li class="country standard" id="iti-item-za" role="option" data-dial-code="27" data-country-code="za"><div class="flag-box"><div class="iti-flag za"></div></div><span class="country-name">South Africa</span><span class="dial-code">+27</span></li><li class="country standard" id="iti-item-kr" role="option" data-dial-code="82" data-country-code="kr"><div class="flag-box"><div class="iti-flag kr"></div></div><span class="country-name">South Korea (대한민국)</span><span class="dial-code">+82</span></li><li class="country standard" id="iti-item-ss" role="option" data-dial-code="211" data-country-code="ss"><div class="flag-box"><div class="iti-flag ss"></div></div><span class="country-name">South Sudan (‫جنوب السودان‬‎)</span><span class="dial-code">+211</span></li><li class="country standard" id="iti-item-es" role="option" data-dial-code="34" data-country-code="es"><div class="flag-box"><div class="iti-flag es"></div></div><span class="country-name">Spain (España)</span><span class="dial-code">+34</span></li><li class="country standard" id="iti-item-lk" role="option" data-dial-code="94" data-country-code="lk"><div class="flag-box"><div class="iti-flag lk"></div></div><span class="country-name">Sri Lanka (ශ්‍රී ලංකාව)</span><span class="dial-code">+94</span></li><li class="country standard" id="iti-item-sd" role="option" data-dial-code="249" data-country-code="sd"><div class="flag-box"><div class="iti-flag sd"></div></div><span class="country-name">Sudan (‫السودان‬‎)</span><span class="dial-code">+249</span></li><li class="country standard" id="iti-item-sr" role="option" data-dial-code="597" data-country-code="sr"><div class="flag-box"><div class="iti-flag sr"></div></div><span class="country-name">Suriname</span><span class="dial-code">+597</span></li><li class="country standard" id="iti-item-sj" role="option" data-dial-code="47" data-country-code="sj"><div class="flag-box"><div class="iti-flag sj"></div></div><span class="country-name">Svalbard and Jan Mayen</span><span class="dial-code">+47</span></li><li class="country standard" id="iti-item-sz" role="option" data-dial-code="268" data-country-code="sz"><div class="flag-box"><div class="iti-flag sz"></div></div><span class="country-name">Swaziland</span><span class="dial-code">+268</span></li><li class="country standard" id="iti-item-se" role="option" data-dial-code="46" data-country-code="se"><div class="flag-box"><div class="iti-flag se"></div></div><span class="country-name">Sweden (Sverige)</span><span class="dial-code">+46</span></li><li class="country standard" id="iti-item-ch" role="option" data-dial-code="41" data-country-code="ch"><div class="flag-box"><div class="iti-flag ch"></div></div><span class="country-name">Switzerland (Schweiz)</span><span class="dial-code">+41</span></li><li class="country standard" id="iti-item-sy" role="option" data-dial-code="963" data-country-code="sy"><div class="flag-box"><div class="iti-flag sy"></div></div><span class="country-name">Syria (‫سوريا‬‎)</span><span class="dial-code">+963</span></li><li class="country standard" id="iti-item-tw" role="option" data-dial-code="886" data-country-code="tw"><div class="flag-box"><div class="iti-flag tw"></div></div><span class="country-name">Taiwan (台灣)</span><span class="dial-code">+886</span></li><li class="country standard" id="iti-item-tj" role="option" data-dial-code="992" data-country-code="tj"><div class="flag-box"><div class="iti-flag tj"></div></div><span class="country-name">Tajikistan</span><span class="dial-code">+992</span></li><li class="country standard" id="iti-item-tz" role="option" data-dial-code="255" data-country-code="tz"><div class="flag-box"><div class="iti-flag tz"></div></div><span class="country-name">Tanzania</span><span class="dial-code">+255</span></li><li class="country standard" id="iti-item-th" role="option" data-dial-code="66" data-country-code="th"><div class="flag-box"><div class="iti-flag th"></div></div><span class="country-name">Thailand (ไทย)</span><span class="dial-code">+66</span></li><li class="country standard" id="iti-item-tl" role="option" data-dial-code="670" data-country-code="tl"><div class="flag-box"><div class="iti-flag tl"></div></div><span class="country-name">Timor-Leste</span><span class="dial-code">+670</span></li><li class="country standard" id="iti-item-tg" role="option" data-dial-code="228" data-country-code="tg"><div class="flag-box"><div class="iti-flag tg"></div></div><span class="country-name">Togo</span><span class="dial-code">+228</span></li><li class="country standard" id="iti-item-tk" role="option" data-dial-code="690" data-country-code="tk"><div class="flag-box"><div class="iti-flag tk"></div></div><span class="country-name">Tokelau</span><span class="dial-code">+690</span></li><li class="country standard" id="iti-item-to" role="option" data-dial-code="676" data-country-code="to"><div class="flag-box"><div class="iti-flag to"></div></div><span class="country-name">Tonga</span><span class="dial-code">+676</span></li><li class="country standard" id="iti-item-tt" role="option" data-dial-code="1868" data-country-code="tt"><div class="flag-box"><div class="iti-flag tt"></div></div><span class="country-name">Trinidad and Tobago</span><span class="dial-code">+1868</span></li><li class="country standard" id="iti-item-tn" role="option" data-dial-code="216" data-country-code="tn"><div class="flag-box"><div class="iti-flag tn"></div></div><span class="country-name">Tunisia (‫تونس‬‎)</span><span class="dial-code">+216</span></li><li class="country standard" id="iti-item-tr" role="option" data-dial-code="90" data-country-code="tr"><div class="flag-box"><div class="iti-flag tr"></div></div><span class="country-name">Turkey (Türkiye)</span><span class="dial-code">+90</span></li><li class="country standard" id="iti-item-tm" role="option" data-dial-code="993" data-country-code="tm"><div class="flag-box"><div class="iti-flag tm"></div></div><span class="country-name">Turkmenistan</span><span class="dial-code">+993</span></li><li class="country standard" id="iti-item-tc" role="option" data-dial-code="1649" data-country-code="tc"><div class="flag-box"><div class="iti-flag tc"></div></div><span class="country-name">Turks and Caicos Islands</span><span class="dial-code">+1649</span></li><li class="country standard" id="iti-item-tv" role="option" data-dial-code="688" data-country-code="tv"><div class="flag-box"><div class="iti-flag tv"></div></div><span class="country-name">Tuvalu</span><span class="dial-code">+688</span></li><li class="country standard" id="iti-item-vi" role="option" data-dial-code="1340" data-country-code="vi"><div class="flag-box"><div class="iti-flag vi"></div></div><span class="country-name">U.S. Virgin Islands</span><span class="dial-code">+1340</span></li><li class="country standard" id="iti-item-ug" role="option" data-dial-code="256" data-country-code="ug"><div class="flag-box"><div class="iti-flag ug"></div></div><span class="country-name">Uganda</span><span class="dial-code">+256</span></li><li class="country standard" id="iti-item-ua" role="option" data-dial-code="380" data-country-code="ua"><div class="flag-box"><div class="iti-flag ua"></div></div><span class="country-name">Ukraine (Україна)</span><span class="dial-code">+380</span></li><li class="country standard" id="iti-item-ae" role="option" data-dial-code="971" data-country-code="ae"><div class="flag-box"><div class="iti-flag ae"></div></div><span class="country-name">United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</span><span class="dial-code">+971</span></li><li class="country standard" id="iti-item-gb" role="option" data-dial-code="44" data-country-code="gb"><div class="flag-box"><div class="iti-flag gb"></div></div><span class="country-name">United Kingdom</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-us" role="option" data-dial-code="1" data-country-code="us"><div class="flag-box"><div class="iti-flag us"></div></div><span class="country-name">United States</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-uy" role="option" data-dial-code="598" data-country-code="uy"><div class="flag-box"><div class="iti-flag uy"></div></div><span class="country-name">Uruguay</span><span class="dial-code">+598</span></li><li class="country standard" id="iti-item-uz" role="option" data-dial-code="998" data-country-code="uz"><div class="flag-box"><div class="iti-flag uz"></div></div><span class="country-name">Uzbekistan (Oʻzbekiston)</span><span class="dial-code">+998</span></li><li class="country standard" id="iti-item-vu" role="option" data-dial-code="678" data-country-code="vu"><div class="flag-box"><div class="iti-flag vu"></div></div><span class="country-name">Vanuatu</span><span class="dial-code">+678</span></li><li class="country standard" id="iti-item-va" role="option" data-dial-code="39" data-country-code="va"><div class="flag-box"><div class="iti-flag va"></div></div><span class="country-name">Vatican City (Città del Vaticano)</span><span class="dial-code">+39</span></li><li class="country standard" id="iti-item-ve" role="option" data-dial-code="58" data-country-code="ve"><div class="flag-box"><div class="iti-flag ve"></div></div><span class="country-name">Venezuela</span><span class="dial-code">+58</span></li><li class="country standard" id="iti-item-vn" role="option" data-dial-code="84" data-country-code="vn"><div class="flag-box"><div class="iti-flag vn"></div></div><span class="country-name">Vietnam (Việt Nam)</span><span class="dial-code">+84</span></li><li class="country standard" id="iti-item-wf" role="option" data-dial-code="681" data-country-code="wf"><div class="flag-box"><div class="iti-flag wf"></div></div><span class="country-name">Wallis and Futuna (Wallis-et-Futuna)</span><span class="dial-code">+681</span></li><li class="country standard" id="iti-item-eh" role="option" data-dial-code="212" data-country-code="eh"><div class="flag-box"><div class="iti-flag eh"></div></div><span class="country-name">Western Sahara (‫الصحراء الغربية‬‎)</span><span class="dial-code">+212</span></li><li class="country standard" id="iti-item-ye" role="option" data-dial-code="967" data-country-code="ye"><div class="flag-box"><div class="iti-flag ye"></div></div><span class="country-name">Yemen (‫اليمن‬‎)</span><span class="dial-code">+967</span></li><li class="country standard" id="iti-item-zm" role="option" data-dial-code="260" data-country-code="zm"><div class="flag-box"><div class="iti-flag zm"></div></div><span class="country-name">Zambia</span><span class="dial-code">+260</span></li><li class="country standard" id="iti-item-zw" role="option" data-dial-code="263" data-country-code="zw"><div class="flag-box"><div class="iti-flag zw"></div></div><span class="country-name">Zimbabwe</span><span class="dial-code">+263</span></li><li class="country standard" id="iti-item-ax" role="option" data-dial-code="358" data-country-code="ax"><div class="flag-box"><div class="iti-flag ax"></div></div><span class="country-name">Åland Islands</span><span class="dial-code">+358</span></li></ul></div><input type="text" title="Phone number" class="input-text custom-intl-tel-input required-entry validate-phone-length" autocomplete="off" style="padding-left: 6px;"></div>
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
                                            <div class="intl-tel-input allow-dropdown separate-dial-code"><div class="flag-container"><div class="selected-flag" role="combobox" aria-owns="country-listbox" tabindex="0" title="Suriname: +597"><div class="iti-flag sr"></div><div class="selected-dial-code">+597</div><div class="iti-arrow"></div></div><ul class="country-list hide" id="country-listbox" aria-expanded="false" role="listbox" aria-activedescendant="iti-item-sr"><li class="country preferred active" id="iti-item-sr" role="option" data-dial-code="597" data-country-code="sr" aria-selected="true"><div class="flag-box"><div class="iti-flag sr"></div></div><span class="country-name">Suriname</span><span class="dial-code">+597</span></li><li class="country preferred" id="iti-item-cw" role="option" data-dial-code="599" data-country-code="cw"><div class="flag-box"><div class="iti-flag cw"></div></div><span class="country-name">Curaçao</span><span class="dial-code">+599</span></li><li class="country preferred" id="iti-item-nl" role="option" data-dial-code="31" data-country-code="nl"><div class="flag-box"><div class="iti-flag nl"></div></div><span class="country-name">Netherlands (Nederland)</span><span class="dial-code">+31</span></li><li class="country preferred" id="iti-item-us" role="option" data-dial-code="1" data-country-code="us"><div class="flag-box"><div class="iti-flag us"></div></div><span class="country-name">United States</span><span class="dial-code">+1</span></li><li class="country preferred" id="iti-item-cu" role="option" data-dial-code="53" data-country-code="cu"><div class="flag-box"><div class="iti-flag cu"></div></div><span class="country-name">Cuba</span><span class="dial-code">+53</span></li><li class="country preferred" id="iti-item-br" role="option" data-dial-code="55" data-country-code="br"><div class="flag-box"><div class="iti-flag br"></div></div><span class="country-name">Brazil (Brasil)</span><span class="dial-code">+55</span></li><li class="divider" role="separator" aria-disabled="true"></li><li class="country standard" id="iti-item-af" role="option" data-dial-code="93" data-country-code="af"><div class="flag-box"><div class="iti-flag af"></div></div><span class="country-name">Afghanistan (‫افغانستان‬‎)</span><span class="dial-code">+93</span></li><li class="country standard" id="iti-item-al" role="option" data-dial-code="355" data-country-code="al"><div class="flag-box"><div class="iti-flag al"></div></div><span class="country-name">Albania (Shqipëri)</span><span class="dial-code">+355</span></li><li class="country standard" id="iti-item-dz" role="option" data-dial-code="213" data-country-code="dz"><div class="flag-box"><div class="iti-flag dz"></div></div><span class="country-name">Algeria (‫الجزائر‬‎)</span><span class="dial-code">+213</span></li><li class="country standard" id="iti-item-as" role="option" data-dial-code="1684" data-country-code="as"><div class="flag-box"><div class="iti-flag as"></div></div><span class="country-name">American Samoa</span><span class="dial-code">+1684</span></li><li class="country standard" id="iti-item-ad" role="option" data-dial-code="376" data-country-code="ad"><div class="flag-box"><div class="iti-flag ad"></div></div><span class="country-name">Andorra</span><span class="dial-code">+376</span></li><li class="country standard" id="iti-item-ao" role="option" data-dial-code="244" data-country-code="ao"><div class="flag-box"><div class="iti-flag ao"></div></div><span class="country-name">Angola</span><span class="dial-code">+244</span></li><li class="country standard" id="iti-item-ai" role="option" data-dial-code="1264" data-country-code="ai"><div class="flag-box"><div class="iti-flag ai"></div></div><span class="country-name">Anguilla</span><span class="dial-code">+1264</span></li><li class="country standard" id="iti-item-ag" role="option" data-dial-code="1268" data-country-code="ag"><div class="flag-box"><div class="iti-flag ag"></div></div><span class="country-name">Antigua and Barbuda</span><span class="dial-code">+1268</span></li><li class="country standard" id="iti-item-ar" role="option" data-dial-code="54" data-country-code="ar"><div class="flag-box"><div class="iti-flag ar"></div></div><span class="country-name">Argentina</span><span class="dial-code">+54</span></li><li class="country standard" id="iti-item-am" role="option" data-dial-code="374" data-country-code="am"><div class="flag-box"><div class="iti-flag am"></div></div><span class="country-name">Armenia (Հայաստան)</span><span class="dial-code">+374</span></li><li class="country standard" id="iti-item-aw" role="option" data-dial-code="297" data-country-code="aw"><div class="flag-box"><div class="iti-flag aw"></div></div><span class="country-name">Aruba</span><span class="dial-code">+297</span></li><li class="country standard" id="iti-item-au" role="option" data-dial-code="61" data-country-code="au"><div class="flag-box"><div class="iti-flag au"></div></div><span class="country-name">Australia</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-at" role="option" data-dial-code="43" data-country-code="at"><div class="flag-box"><div class="iti-flag at"></div></div><span class="country-name">Austria (Österreich)</span><span class="dial-code">+43</span></li><li class="country standard" id="iti-item-az" role="option" data-dial-code="994" data-country-code="az"><div class="flag-box"><div class="iti-flag az"></div></div><span class="country-name">Azerbaijan (Azərbaycan)</span><span class="dial-code">+994</span></li><li class="country standard" id="iti-item-bs" role="option" data-dial-code="1242" data-country-code="bs"><div class="flag-box"><div class="iti-flag bs"></div></div><span class="country-name">Bahamas</span><span class="dial-code">+1242</span></li><li class="country standard" id="iti-item-bh" role="option" data-dial-code="973" data-country-code="bh"><div class="flag-box"><div class="iti-flag bh"></div></div><span class="country-name">Bahrain (‫البحرين‬‎)</span><span class="dial-code">+973</span></li><li class="country standard" id="iti-item-bd" role="option" data-dial-code="880" data-country-code="bd"><div class="flag-box"><div class="iti-flag bd"></div></div><span class="country-name">Bangladesh (বাংলাদেশ)</span><span class="dial-code">+880</span></li><li class="country standard" id="iti-item-bb" role="option" data-dial-code="1246" data-country-code="bb"><div class="flag-box"><div class="iti-flag bb"></div></div><span class="country-name">Barbados</span><span class="dial-code">+1246</span></li><li class="country standard" id="iti-item-by" role="option" data-dial-code="375" data-country-code="by"><div class="flag-box"><div class="iti-flag by"></div></div><span class="country-name">Belarus (Беларусь)</span><span class="dial-code">+375</span></li><li class="country standard" id="iti-item-be" role="option" data-dial-code="32" data-country-code="be"><div class="flag-box"><div class="iti-flag be"></div></div><span class="country-name">Belgium (België)</span><span class="dial-code">+32</span></li><li class="country standard" id="iti-item-bz" role="option" data-dial-code="501" data-country-code="bz"><div class="flag-box"><div class="iti-flag bz"></div></div><span class="country-name">Belize</span><span class="dial-code">+501</span></li><li class="country standard" id="iti-item-bj" role="option" data-dial-code="229" data-country-code="bj"><div class="flag-box"><div class="iti-flag bj"></div></div><span class="country-name">Benin (Bénin)</span><span class="dial-code">+229</span></li><li class="country standard" id="iti-item-bm" role="option" data-dial-code="1441" data-country-code="bm"><div class="flag-box"><div class="iti-flag bm"></div></div><span class="country-name">Bermuda</span><span class="dial-code">+1441</span></li><li class="country standard" id="iti-item-bt" role="option" data-dial-code="975" data-country-code="bt"><div class="flag-box"><div class="iti-flag bt"></div></div><span class="country-name">Bhutan (འབྲུག)</span><span class="dial-code">+975</span></li><li class="country standard" id="iti-item-bo" role="option" data-dial-code="591" data-country-code="bo"><div class="flag-box"><div class="iti-flag bo"></div></div><span class="country-name">Bolivia</span><span class="dial-code">+591</span></li><li class="country standard" id="iti-item-ba" role="option" data-dial-code="387" data-country-code="ba"><div class="flag-box"><div class="iti-flag ba"></div></div><span class="country-name">Bosnia and Herzegovina (Босна и Херцеговина)</span><span class="dial-code">+387</span></li><li class="country standard" id="iti-item-bw" role="option" data-dial-code="267" data-country-code="bw"><div class="flag-box"><div class="iti-flag bw"></div></div><span class="country-name">Botswana</span><span class="dial-code">+267</span></li><li class="country standard" id="iti-item-br" role="option" data-dial-code="55" data-country-code="br"><div class="flag-box"><div class="iti-flag br"></div></div><span class="country-name">Brazil (Brasil)</span><span class="dial-code">+55</span></li><li class="country standard" id="iti-item-io" role="option" data-dial-code="246" data-country-code="io"><div class="flag-box"><div class="iti-flag io"></div></div><span class="country-name">British Indian Ocean Territory</span><span class="dial-code">+246</span></li><li class="country standard" id="iti-item-vg" role="option" data-dial-code="1284" data-country-code="vg"><div class="flag-box"><div class="iti-flag vg"></div></div><span class="country-name">British Virgin Islands</span><span class="dial-code">+1284</span></li><li class="country standard" id="iti-item-bn" role="option" data-dial-code="673" data-country-code="bn"><div class="flag-box"><div class="iti-flag bn"></div></div><span class="country-name">Brunei</span><span class="dial-code">+673</span></li><li class="country standard" id="iti-item-bg" role="option" data-dial-code="359" data-country-code="bg"><div class="flag-box"><div class="iti-flag bg"></div></div><span class="country-name">Bulgaria (България)</span><span class="dial-code">+359</span></li><li class="country standard" id="iti-item-bf" role="option" data-dial-code="226" data-country-code="bf"><div class="flag-box"><div class="iti-flag bf"></div></div><span class="country-name">Burkina Faso</span><span class="dial-code">+226</span></li><li class="country standard" id="iti-item-bi" role="option" data-dial-code="257" data-country-code="bi"><div class="flag-box"><div class="iti-flag bi"></div></div><span class="country-name">Burundi (Uburundi)</span><span class="dial-code">+257</span></li><li class="country standard" id="iti-item-kh" role="option" data-dial-code="855" data-country-code="kh"><div class="flag-box"><div class="iti-flag kh"></div></div><span class="country-name">Cambodia (កម្ពុជា)</span><span class="dial-code">+855</span></li><li class="country standard" id="iti-item-cm" role="option" data-dial-code="237" data-country-code="cm"><div class="flag-box"><div class="iti-flag cm"></div></div><span class="country-name">Cameroon (Cameroun)</span><span class="dial-code">+237</span></li><li class="country standard" id="iti-item-ca" role="option" data-dial-code="1" data-country-code="ca"><div class="flag-box"><div class="iti-flag ca"></div></div><span class="country-name">Canada</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-cv" role="option" data-dial-code="238" data-country-code="cv"><div class="flag-box"><div class="iti-flag cv"></div></div><span class="country-name">Cape Verde (Kabu Verdi)</span><span class="dial-code">+238</span></li><li class="country standard" id="iti-item-bq" role="option" data-dial-code="599" data-country-code="bq"><div class="flag-box"><div class="iti-flag bq"></div></div><span class="country-name">Caribbean Netherlands</span><span class="dial-code">+599</span></li><li class="country standard" id="iti-item-ky" role="option" data-dial-code="1345" data-country-code="ky"><div class="flag-box"><div class="iti-flag ky"></div></div><span class="country-name">Cayman Islands</span><span class="dial-code">+1345</span></li><li class="country standard" id="iti-item-cf" role="option" data-dial-code="236" data-country-code="cf"><div class="flag-box"><div class="iti-flag cf"></div></div><span class="country-name">Central African Republic (République centrafricaine)</span><span class="dial-code">+236</span></li><li class="country standard" id="iti-item-td" role="option" data-dial-code="235" data-country-code="td"><div class="flag-box"><div class="iti-flag td"></div></div><span class="country-name">Chad (Tchad)</span><span class="dial-code">+235</span></li><li class="country standard" id="iti-item-cl" role="option" data-dial-code="56" data-country-code="cl"><div class="flag-box"><div class="iti-flag cl"></div></div><span class="country-name">Chile</span><span class="dial-code">+56</span></li><li class="country standard" id="iti-item-cn" role="option" data-dial-code="86" data-country-code="cn"><div class="flag-box"><div class="iti-flag cn"></div></div><span class="country-name">China (中国)</span><span class="dial-code">+86</span></li><li class="country standard" id="iti-item-cx" role="option" data-dial-code="61" data-country-code="cx"><div class="flag-box"><div class="iti-flag cx"></div></div><span class="country-name">Christmas Island</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-cc" role="option" data-dial-code="61" data-country-code="cc"><div class="flag-box"><div class="iti-flag cc"></div></div><span class="country-name">Cocos (Keeling) Islands</span><span class="dial-code">+61</span></li><li class="country standard" id="iti-item-co" role="option" data-dial-code="57" data-country-code="co"><div class="flag-box"><div class="iti-flag co"></div></div><span class="country-name">Colombia</span><span class="dial-code">+57</span></li><li class="country standard" id="iti-item-km" role="option" data-dial-code="269" data-country-code="km"><div class="flag-box"><div class="iti-flag km"></div></div><span class="country-name">Comoros (‫جزر القمر‬‎)</span><span class="dial-code">+269</span></li><li class="country standard" id="iti-item-cd" role="option" data-dial-code="243" data-country-code="cd"><div class="flag-box"><div class="iti-flag cd"></div></div><span class="country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</span><span class="dial-code">+243</span></li><li class="country standard" id="iti-item-cg" role="option" data-dial-code="242" data-country-code="cg"><div class="flag-box"><div class="iti-flag cg"></div></div><span class="country-name">Congo (Republic) (Congo-Brazzaville)</span><span class="dial-code">+242</span></li><li class="country standard" id="iti-item-ck" role="option" data-dial-code="682" data-country-code="ck"><div class="flag-box"><div class="iti-flag ck"></div></div><span class="country-name">Cook Islands</span><span class="dial-code">+682</span></li><li class="country standard" id="iti-item-cr" role="option" data-dial-code="506" data-country-code="cr"><div class="flag-box"><div class="iti-flag cr"></div></div><span class="country-name">Costa Rica</span><span class="dial-code">+506</span></li><li class="country standard" id="iti-item-ci" role="option" data-dial-code="225" data-country-code="ci"><div class="flag-box"><div class="iti-flag ci"></div></div><span class="country-name">Côte d’Ivoire</span><span class="dial-code">+225</span></li><li class="country standard" id="iti-item-hr" role="option" data-dial-code="385" data-country-code="hr"><div class="flag-box"><div class="iti-flag hr"></div></div><span class="country-name">Croatia (Hrvatska)</span><span class="dial-code">+385</span></li><li class="country standard" id="iti-item-cu" role="option" data-dial-code="53" data-country-code="cu"><div class="flag-box"><div class="iti-flag cu"></div></div><span class="country-name">Cuba</span><span class="dial-code">+53</span></li><li class="country standard" id="iti-item-cw" role="option" data-dial-code="599" data-country-code="cw"><div class="flag-box"><div class="iti-flag cw"></div></div><span class="country-name">Curaçao</span><span class="dial-code">+599</span></li><li class="country standard" id="iti-item-cy" role="option" data-dial-code="357" data-country-code="cy"><div class="flag-box"><div class="iti-flag cy"></div></div><span class="country-name">Cyprus (Κύπρος)</span><span class="dial-code">+357</span></li><li class="country standard" id="iti-item-cz" role="option" data-dial-code="420" data-country-code="cz"><div class="flag-box"><div class="iti-flag cz"></div></div><span class="country-name">Czech Republic (Česká republika)</span><span class="dial-code">+420</span></li><li class="country standard" id="iti-item-dk" role="option" data-dial-code="45" data-country-code="dk"><div class="flag-box"><div class="iti-flag dk"></div></div><span class="country-name">Denmark (Danmark)</span><span class="dial-code">+45</span></li><li class="country standard" id="iti-item-dj" role="option" data-dial-code="253" data-country-code="dj"><div class="flag-box"><div class="iti-flag dj"></div></div><span class="country-name">Djibouti</span><span class="dial-code">+253</span></li><li class="country standard" id="iti-item-dm" role="option" data-dial-code="1767" data-country-code="dm"><div class="flag-box"><div class="iti-flag dm"></div></div><span class="country-name">Dominica</span><span class="dial-code">+1767</span></li><li class="country standard" id="iti-item-do" role="option" data-dial-code="1" data-country-code="do"><div class="flag-box"><div class="iti-flag do"></div></div><span class="country-name">Dominican Republic (República Dominicana)</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-ec" role="option" data-dial-code="593" data-country-code="ec"><div class="flag-box"><div class="iti-flag ec"></div></div><span class="country-name">Ecuador</span><span class="dial-code">+593</span></li><li class="country standard" id="iti-item-eg" role="option" data-dial-code="20" data-country-code="eg"><div class="flag-box"><div class="iti-flag eg"></div></div><span class="country-name">Egypt (‫مصر‬‎)</span><span class="dial-code">+20</span></li><li class="country standard" id="iti-item-sv" role="option" data-dial-code="503" data-country-code="sv"><div class="flag-box"><div class="iti-flag sv"></div></div><span class="country-name">El Salvador</span><span class="dial-code">+503</span></li><li class="country standard" id="iti-item-gq" role="option" data-dial-code="240" data-country-code="gq"><div class="flag-box"><div class="iti-flag gq"></div></div><span class="country-name">Equatorial Guinea (Guinea Ecuatorial)</span><span class="dial-code">+240</span></li><li class="country standard" id="iti-item-er" role="option" data-dial-code="291" data-country-code="er"><div class="flag-box"><div class="iti-flag er"></div></div><span class="country-name">Eritrea</span><span class="dial-code">+291</span></li><li class="country standard" id="iti-item-ee" role="option" data-dial-code="372" data-country-code="ee"><div class="flag-box"><div class="iti-flag ee"></div></div><span class="country-name">Estonia (Eesti)</span><span class="dial-code">+372</span></li><li class="country standard" id="iti-item-et" role="option" data-dial-code="251" data-country-code="et"><div class="flag-box"><div class="iti-flag et"></div></div><span class="country-name">Ethiopia</span><span class="dial-code">+251</span></li><li class="country standard" id="iti-item-fk" role="option" data-dial-code="500" data-country-code="fk"><div class="flag-box"><div class="iti-flag fk"></div></div><span class="country-name">Falkland Islands (Islas Malvinas)</span><span class="dial-code">+500</span></li><li class="country standard" id="iti-item-fo" role="option" data-dial-code="298" data-country-code="fo"><div class="flag-box"><div class="iti-flag fo"></div></div><span class="country-name">Faroe Islands (Føroyar)</span><span class="dial-code">+298</span></li><li class="country standard" id="iti-item-fj" role="option" data-dial-code="679" data-country-code="fj"><div class="flag-box"><div class="iti-flag fj"></div></div><span class="country-name">Fiji</span><span class="dial-code">+679</span></li><li class="country standard" id="iti-item-fi" role="option" data-dial-code="358" data-country-code="fi"><div class="flag-box"><div class="iti-flag fi"></div></div><span class="country-name">Finland (Suomi)</span><span class="dial-code">+358</span></li><li class="country standard" id="iti-item-fr" role="option" data-dial-code="33" data-country-code="fr"><div class="flag-box"><div class="iti-flag fr"></div></div><span class="country-name">France</span><span class="dial-code">+33</span></li><li class="country standard" id="iti-item-gf" role="option" data-dial-code="594" data-country-code="gf"><div class="flag-box"><div class="iti-flag gf"></div></div><span class="country-name">French Guiana (Guyane française)</span><span class="dial-code">+594</span></li><li class="country standard" id="iti-item-pf" role="option" data-dial-code="689" data-country-code="pf"><div class="flag-box"><div class="iti-flag pf"></div></div><span class="country-name">French Polynesia (Polynésie française)</span><span class="dial-code">+689</span></li><li class="country standard" id="iti-item-ga" role="option" data-dial-code="241" data-country-code="ga"><div class="flag-box"><div class="iti-flag ga"></div></div><span class="country-name">Gabon</span><span class="dial-code">+241</span></li><li class="country standard" id="iti-item-gm" role="option" data-dial-code="220" data-country-code="gm"><div class="flag-box"><div class="iti-flag gm"></div></div><span class="country-name">Gambia</span><span class="dial-code">+220</span></li><li class="country standard" id="iti-item-ge" role="option" data-dial-code="995" data-country-code="ge"><div class="flag-box"><div class="iti-flag ge"></div></div><span class="country-name">Georgia (საქართველო)</span><span class="dial-code">+995</span></li><li class="country standard" id="iti-item-de" role="option" data-dial-code="49" data-country-code="de"><div class="flag-box"><div class="iti-flag de"></div></div><span class="country-name">Germany (Deutschland)</span><span class="dial-code">+49</span></li><li class="country standard" id="iti-item-gh" role="option" data-dial-code="233" data-country-code="gh"><div class="flag-box"><div class="iti-flag gh"></div></div><span class="country-name">Ghana (Gaana)</span><span class="dial-code">+233</span></li><li class="country standard" id="iti-item-gi" role="option" data-dial-code="350" data-country-code="gi"><div class="flag-box"><div class="iti-flag gi"></div></div><span class="country-name">Gibraltar</span><span class="dial-code">+350</span></li><li class="country standard" id="iti-item-gr" role="option" data-dial-code="30" data-country-code="gr"><div class="flag-box"><div class="iti-flag gr"></div></div><span class="country-name">Greece (Ελλάδα)</span><span class="dial-code">+30</span></li><li class="country standard" id="iti-item-gl" role="option" data-dial-code="299" data-country-code="gl"><div class="flag-box"><div class="iti-flag gl"></div></div><span class="country-name">Greenland (Kalaallit Nunaat)</span><span class="dial-code">+299</span></li><li class="country standard" id="iti-item-gd" role="option" data-dial-code="1473" data-country-code="gd"><div class="flag-box"><div class="iti-flag gd"></div></div><span class="country-name">Grenada</span><span class="dial-code">+1473</span></li><li class="country standard" id="iti-item-gp" role="option" data-dial-code="590" data-country-code="gp"><div class="flag-box"><div class="iti-flag gp"></div></div><span class="country-name">Guadeloupe</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-gu" role="option" data-dial-code="1671" data-country-code="gu"><div class="flag-box"><div class="iti-flag gu"></div></div><span class="country-name">Guam</span><span class="dial-code">+1671</span></li><li class="country standard" id="iti-item-gt" role="option" data-dial-code="502" data-country-code="gt"><div class="flag-box"><div class="iti-flag gt"></div></div><span class="country-name">Guatemala</span><span class="dial-code">+502</span></li><li class="country standard" id="iti-item-gg" role="option" data-dial-code="44" data-country-code="gg"><div class="flag-box"><div class="iti-flag gg"></div></div><span class="country-name">Guernsey</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-gn" role="option" data-dial-code="224" data-country-code="gn"><div class="flag-box"><div class="iti-flag gn"></div></div><span class="country-name">Guinea (Guinée)</span><span class="dial-code">+224</span></li><li class="country standard" id="iti-item-gw" role="option" data-dial-code="245" data-country-code="gw"><div class="flag-box"><div class="iti-flag gw"></div></div><span class="country-name">Guinea-Bissau (Guiné Bissau)</span><span class="dial-code">+245</span></li><li class="country standard" id="iti-item-gy" role="option" data-dial-code="592" data-country-code="gy"><div class="flag-box"><div class="iti-flag gy"></div></div><span class="country-name">Guyana</span><span class="dial-code">+592</span></li><li class="country standard" id="iti-item-ht" role="option" data-dial-code="509" data-country-code="ht"><div class="flag-box"><div class="iti-flag ht"></div></div><span class="country-name">Haiti</span><span class="dial-code">+509</span></li><li class="country standard" id="iti-item-hn" role="option" data-dial-code="504" data-country-code="hn"><div class="flag-box"><div class="iti-flag hn"></div></div><span class="country-name">Honduras</span><span class="dial-code">+504</span></li><li class="country standard" id="iti-item-hk" role="option" data-dial-code="852" data-country-code="hk"><div class="flag-box"><div class="iti-flag hk"></div></div><span class="country-name">Hong Kong (香港)</span><span class="dial-code">+852</span></li><li class="country standard" id="iti-item-hu" role="option" data-dial-code="36" data-country-code="hu"><div class="flag-box"><div class="iti-flag hu"></div></div><span class="country-name">Hungary (Magyarország)</span><span class="dial-code">+36</span></li><li class="country standard" id="iti-item-is" role="option" data-dial-code="354" data-country-code="is"><div class="flag-box"><div class="iti-flag is"></div></div><span class="country-name">Iceland (Ísland)</span><span class="dial-code">+354</span></li><li class="country standard" id="iti-item-in" role="option" data-dial-code="91" data-country-code="in"><div class="flag-box"><div class="iti-flag in"></div></div><span class="country-name">India (भारत)</span><span class="dial-code">+91</span></li><li class="country standard" id="iti-item-id" role="option" data-dial-code="62" data-country-code="id"><div class="flag-box"><div class="iti-flag id"></div></div><span class="country-name">Indonesia</span><span class="dial-code">+62</span></li><li class="country standard" id="iti-item-ir" role="option" data-dial-code="98" data-country-code="ir"><div class="flag-box"><div class="iti-flag ir"></div></div><span class="country-name">Iran (‫ایران‬‎)</span><span class="dial-code">+98</span></li><li class="country standard" id="iti-item-iq" role="option" data-dial-code="964" data-country-code="iq"><div class="flag-box"><div class="iti-flag iq"></div></div><span class="country-name">Iraq (‫العراق‬‎)</span><span class="dial-code">+964</span></li><li class="country standard" id="iti-item-ie" role="option" data-dial-code="353" data-country-code="ie"><div class="flag-box"><div class="iti-flag ie"></div></div><span class="country-name">Ireland</span><span class="dial-code">+353</span></li><li class="country standard" id="iti-item-im" role="option" data-dial-code="44" data-country-code="im"><div class="flag-box"><div class="iti-flag im"></div></div><span class="country-name">Isle of Man</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-il" role="option" data-dial-code="972" data-country-code="il"><div class="flag-box"><div class="iti-flag il"></div></div><span class="country-name">Israel (‫ישראל‬‎)</span><span class="dial-code">+972</span></li><li class="country standard" id="iti-item-it" role="option" data-dial-code="39" data-country-code="it"><div class="flag-box"><div class="iti-flag it"></div></div><span class="country-name">Italy (Italia)</span><span class="dial-code">+39</span></li><li class="country standard" id="iti-item-jm" role="option" data-dial-code="1" data-country-code="jm"><div class="flag-box"><div class="iti-flag jm"></div></div><span class="country-name">Jamaica</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-jp" role="option" data-dial-code="81" data-country-code="jp"><div class="flag-box"><div class="iti-flag jp"></div></div><span class="country-name">Japan (日本)</span><span class="dial-code">+81</span></li><li class="country standard" id="iti-item-je" role="option" data-dial-code="44" data-country-code="je"><div class="flag-box"><div class="iti-flag je"></div></div><span class="country-name">Jersey</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-jo" role="option" data-dial-code="962" data-country-code="jo"><div class="flag-box"><div class="iti-flag jo"></div></div><span class="country-name">Jordan (‫الأردن‬‎)</span><span class="dial-code">+962</span></li><li class="country standard" id="iti-item-kz" role="option" data-dial-code="7" data-country-code="kz"><div class="flag-box"><div class="iti-flag kz"></div></div><span class="country-name">Kazakhstan (Казахстан)</span><span class="dial-code">+7</span></li><li class="country standard" id="iti-item-ke" role="option" data-dial-code="254" data-country-code="ke"><div class="flag-box"><div class="iti-flag ke"></div></div><span class="country-name">Kenya</span><span class="dial-code">+254</span></li><li class="country standard" id="iti-item-ki" role="option" data-dial-code="686" data-country-code="ki"><div class="flag-box"><div class="iti-flag ki"></div></div><span class="country-name">Kiribati</span><span class="dial-code">+686</span></li><li class="country standard" id="iti-item-xk" role="option" data-dial-code="383" data-country-code="xk"><div class="flag-box"><div class="iti-flag xk"></div></div><span class="country-name">Kosovo</span><span class="dial-code">+383</span></li><li class="country standard" id="iti-item-kw" role="option" data-dial-code="965" data-country-code="kw"><div class="flag-box"><div class="iti-flag kw"></div></div><span class="country-name">Kuwait (‫الكويت‬‎)</span><span class="dial-code">+965</span></li><li class="country standard" id="iti-item-kg" role="option" data-dial-code="996" data-country-code="kg"><div class="flag-box"><div class="iti-flag kg"></div></div><span class="country-name">Kyrgyzstan (Кыргызстан)</span><span class="dial-code">+996</span></li><li class="country standard" id="iti-item-la" role="option" data-dial-code="856" data-country-code="la"><div class="flag-box"><div class="iti-flag la"></div></div><span class="country-name">Laos (ລາວ)</span><span class="dial-code">+856</span></li><li class="country standard" id="iti-item-lv" role="option" data-dial-code="371" data-country-code="lv"><div class="flag-box"><div class="iti-flag lv"></div></div><span class="country-name">Latvia (Latvija)</span><span class="dial-code">+371</span></li><li class="country standard" id="iti-item-lb" role="option" data-dial-code="961" data-country-code="lb"><div class="flag-box"><div class="iti-flag lb"></div></div><span class="country-name">Lebanon (‫لبنان‬‎)</span><span class="dial-code">+961</span></li><li class="country standard" id="iti-item-ls" role="option" data-dial-code="266" data-country-code="ls"><div class="flag-box"><div class="iti-flag ls"></div></div><span class="country-name">Lesotho</span><span class="dial-code">+266</span></li><li class="country standard" id="iti-item-lr" role="option" data-dial-code="231" data-country-code="lr"><div class="flag-box"><div class="iti-flag lr"></div></div><span class="country-name">Liberia</span><span class="dial-code">+231</span></li><li class="country standard" id="iti-item-ly" role="option" data-dial-code="218" data-country-code="ly"><div class="flag-box"><div class="iti-flag ly"></div></div><span class="country-name">Libya (‫ليبيا‬‎)</span><span class="dial-code">+218</span></li><li class="country standard" id="iti-item-li" role="option" data-dial-code="423" data-country-code="li"><div class="flag-box"><div class="iti-flag li"></div></div><span class="country-name">Liechtenstein</span><span class="dial-code">+423</span></li><li class="country standard" id="iti-item-lt" role="option" data-dial-code="370" data-country-code="lt"><div class="flag-box"><div class="iti-flag lt"></div></div><span class="country-name">Lithuania (Lietuva)</span><span class="dial-code">+370</span></li><li class="country standard" id="iti-item-lu" role="option" data-dial-code="352" data-country-code="lu"><div class="flag-box"><div class="iti-flag lu"></div></div><span class="country-name">Luxembourg</span><span class="dial-code">+352</span></li><li class="country standard" id="iti-item-mo" role="option" data-dial-code="853" data-country-code="mo"><div class="flag-box"><div class="iti-flag mo"></div></div><span class="country-name">Macau (澳門)</span><span class="dial-code">+853</span></li><li class="country standard" id="iti-item-mk" role="option" data-dial-code="389" data-country-code="mk"><div class="flag-box"><div class="iti-flag mk"></div></div><span class="country-name">Macedonia (FYROM) (Македонија)</span><span class="dial-code">+389</span></li><li class="country standard" id="iti-item-mg" role="option" data-dial-code="261" data-country-code="mg"><div class="flag-box"><div class="iti-flag mg"></div></div><span class="country-name">Madagascar (Madagasikara)</span><span class="dial-code">+261</span></li><li class="country standard" id="iti-item-mw" role="option" data-dial-code="265" data-country-code="mw"><div class="flag-box"><div class="iti-flag mw"></div></div><span class="country-name">Malawi</span><span class="dial-code">+265</span></li><li class="country standard" id="iti-item-my" role="option" data-dial-code="60" data-country-code="my"><div class="flag-box"><div class="iti-flag my"></div></div><span class="country-name">Malaysia</span><span class="dial-code">+60</span></li><li class="country standard" id="iti-item-mv" role="option" data-dial-code="960" data-country-code="mv"><div class="flag-box"><div class="iti-flag mv"></div></div><span class="country-name">Maldives</span><span class="dial-code">+960</span></li><li class="country standard" id="iti-item-ml" role="option" data-dial-code="223" data-country-code="ml"><div class="flag-box"><div class="iti-flag ml"></div></div><span class="country-name">Mali</span><span class="dial-code">+223</span></li><li class="country standard" id="iti-item-mt" role="option" data-dial-code="356" data-country-code="mt"><div class="flag-box"><div class="iti-flag mt"></div></div><span class="country-name">Malta</span><span class="dial-code">+356</span></li><li class="country standard" id="iti-item-mh" role="option" data-dial-code="692" data-country-code="mh"><div class="flag-box"><div class="iti-flag mh"></div></div><span class="country-name">Marshall Islands</span><span class="dial-code">+692</span></li><li class="country standard" id="iti-item-mq" role="option" data-dial-code="596" data-country-code="mq"><div class="flag-box"><div class="iti-flag mq"></div></div><span class="country-name">Martinique</span><span class="dial-code">+596</span></li><li class="country standard" id="iti-item-mr" role="option" data-dial-code="222" data-country-code="mr"><div class="flag-box"><div class="iti-flag mr"></div></div><span class="country-name">Mauritania (‫موريتانيا‬‎)</span><span class="dial-code">+222</span></li><li class="country standard" id="iti-item-mu" role="option" data-dial-code="230" data-country-code="mu"><div class="flag-box"><div class="iti-flag mu"></div></div><span class="country-name">Mauritius (Moris)</span><span class="dial-code">+230</span></li><li class="country standard" id="iti-item-yt" role="option" data-dial-code="262" data-country-code="yt"><div class="flag-box"><div class="iti-flag yt"></div></div><span class="country-name">Mayotte</span><span class="dial-code">+262</span></li><li class="country standard" id="iti-item-mx" role="option" data-dial-code="52" data-country-code="mx"><div class="flag-box"><div class="iti-flag mx"></div></div><span class="country-name">Mexico (México)</span><span class="dial-code">+52</span></li><li class="country standard" id="iti-item-fm" role="option" data-dial-code="691" data-country-code="fm"><div class="flag-box"><div class="iti-flag fm"></div></div><span class="country-name">Micronesia</span><span class="dial-code">+691</span></li><li class="country standard" id="iti-item-md" role="option" data-dial-code="373" data-country-code="md"><div class="flag-box"><div class="iti-flag md"></div></div><span class="country-name">Moldova (Republica Moldova)</span><span class="dial-code">+373</span></li><li class="country standard" id="iti-item-mc" role="option" data-dial-code="377" data-country-code="mc"><div class="flag-box"><div class="iti-flag mc"></div></div><span class="country-name">Monaco</span><span class="dial-code">+377</span></li><li class="country standard" id="iti-item-mn" role="option" data-dial-code="976" data-country-code="mn"><div class="flag-box"><div class="iti-flag mn"></div></div><span class="country-name">Mongolia (Монгол)</span><span class="dial-code">+976</span></li><li class="country standard" id="iti-item-me" role="option" data-dial-code="382" data-country-code="me"><div class="flag-box"><div class="iti-flag me"></div></div><span class="country-name">Montenegro (Crna Gora)</span><span class="dial-code">+382</span></li><li class="country standard" id="iti-item-ms" role="option" data-dial-code="1664" data-country-code="ms"><div class="flag-box"><div class="iti-flag ms"></div></div><span class="country-name">Montserrat</span><span class="dial-code">+1664</span></li><li class="country standard" id="iti-item-ma" role="option" data-dial-code="212" data-country-code="ma"><div class="flag-box"><div class="iti-flag ma"></div></div><span class="country-name">Morocco (‫المغرب‬‎)</span><span class="dial-code">+212</span></li><li class="country standard" id="iti-item-mz" role="option" data-dial-code="258" data-country-code="mz"><div class="flag-box"><div class="iti-flag mz"></div></div><span class="country-name">Mozambique (Moçambique)</span><span class="dial-code">+258</span></li><li class="country standard" id="iti-item-mm" role="option" data-dial-code="95" data-country-code="mm"><div class="flag-box"><div class="iti-flag mm"></div></div><span class="country-name">Myanmar (Burma) (မြန်မာ)</span><span class="dial-code">+95</span></li><li class="country standard" id="iti-item-na" role="option" data-dial-code="264" data-country-code="na"><div class="flag-box"><div class="iti-flag na"></div></div><span class="country-name">Namibia (Namibië)</span><span class="dial-code">+264</span></li><li class="country standard" id="iti-item-nr" role="option" data-dial-code="674" data-country-code="nr"><div class="flag-box"><div class="iti-flag nr"></div></div><span class="country-name">Nauru</span><span class="dial-code">+674</span></li><li class="country standard" id="iti-item-np" role="option" data-dial-code="977" data-country-code="np"><div class="flag-box"><div class="iti-flag np"></div></div><span class="country-name">Nepal (नेपाल)</span><span class="dial-code">+977</span></li><li class="country standard" id="iti-item-nl" role="option" data-dial-code="31" data-country-code="nl"><div class="flag-box"><div class="iti-flag nl"></div></div><span class="country-name">Netherlands (Nederland)</span><span class="dial-code">+31</span></li><li class="country standard" id="iti-item-nc" role="option" data-dial-code="687" data-country-code="nc"><div class="flag-box"><div class="iti-flag nc"></div></div><span class="country-name">New Caledonia (Nouvelle-Calédonie)</span><span class="dial-code">+687</span></li><li class="country standard" id="iti-item-nz" role="option" data-dial-code="64" data-country-code="nz"><div class="flag-box"><div class="iti-flag nz"></div></div><span class="country-name">New Zealand</span><span class="dial-code">+64</span></li><li class="country standard" id="iti-item-ni" role="option" data-dial-code="505" data-country-code="ni"><div class="flag-box"><div class="iti-flag ni"></div></div><span class="country-name">Nicaragua</span><span class="dial-code">+505</span></li><li class="country standard" id="iti-item-ne" role="option" data-dial-code="227" data-country-code="ne"><div class="flag-box"><div class="iti-flag ne"></div></div><span class="country-name">Niger (Nijar)</span><span class="dial-code">+227</span></li><li class="country standard" id="iti-item-ng" role="option" data-dial-code="234" data-country-code="ng"><div class="flag-box"><div class="iti-flag ng"></div></div><span class="country-name">Nigeria</span><span class="dial-code">+234</span></li><li class="country standard" id="iti-item-nu" role="option" data-dial-code="683" data-country-code="nu"><div class="flag-box"><div class="iti-flag nu"></div></div><span class="country-name">Niue</span><span class="dial-code">+683</span></li><li class="country standard" id="iti-item-nf" role="option" data-dial-code="672" data-country-code="nf"><div class="flag-box"><div class="iti-flag nf"></div></div><span class="country-name">Norfolk Island</span><span class="dial-code">+672</span></li><li class="country standard" id="iti-item-kp" role="option" data-dial-code="850" data-country-code="kp"><div class="flag-box"><div class="iti-flag kp"></div></div><span class="country-name">North Korea (조선 민주주의 인민 공화국)</span><span class="dial-code">+850</span></li><li class="country standard" id="iti-item-mp" role="option" data-dial-code="1670" data-country-code="mp"><div class="flag-box"><div class="iti-flag mp"></div></div><span class="country-name">Northern Mariana Islands</span><span class="dial-code">+1670</span></li><li class="country standard" id="iti-item-no" role="option" data-dial-code="47" data-country-code="no"><div class="flag-box"><div class="iti-flag no"></div></div><span class="country-name">Norway (Norge)</span><span class="dial-code">+47</span></li><li class="country standard" id="iti-item-om" role="option" data-dial-code="968" data-country-code="om"><div class="flag-box"><div class="iti-flag om"></div></div><span class="country-name">Oman (‫عُمان‬‎)</span><span class="dial-code">+968</span></li><li class="country standard" id="iti-item-pk" role="option" data-dial-code="92" data-country-code="pk"><div class="flag-box"><div class="iti-flag pk"></div></div><span class="country-name">Pakistan (‫پاکستان‬‎)</span><span class="dial-code">+92</span></li><li class="country standard" id="iti-item-pw" role="option" data-dial-code="680" data-country-code="pw"><div class="flag-box"><div class="iti-flag pw"></div></div><span class="country-name">Palau</span><span class="dial-code">+680</span></li><li class="country standard" id="iti-item-ps" role="option" data-dial-code="970" data-country-code="ps"><div class="flag-box"><div class="iti-flag ps"></div></div><span class="country-name">Palestine (‫فلسطين‬‎)</span><span class="dial-code">+970</span></li><li class="country standard" id="iti-item-pa" role="option" data-dial-code="507" data-country-code="pa"><div class="flag-box"><div class="iti-flag pa"></div></div><span class="country-name">Panama (Panamá)</span><span class="dial-code">+507</span></li><li class="country standard" id="iti-item-pg" role="option" data-dial-code="675" data-country-code="pg"><div class="flag-box"><div class="iti-flag pg"></div></div><span class="country-name">Papua New Guinea</span><span class="dial-code">+675</span></li><li class="country standard" id="iti-item-py" role="option" data-dial-code="595" data-country-code="py"><div class="flag-box"><div class="iti-flag py"></div></div><span class="country-name">Paraguay</span><span class="dial-code">+595</span></li><li class="country standard" id="iti-item-pe" role="option" data-dial-code="51" data-country-code="pe"><div class="flag-box"><div class="iti-flag pe"></div></div><span class="country-name">Peru (Perú)</span><span class="dial-code">+51</span></li><li class="country standard" id="iti-item-ph" role="option" data-dial-code="63" data-country-code="ph"><div class="flag-box"><div class="iti-flag ph"></div></div><span class="country-name">Philippines</span><span class="dial-code">+63</span></li><li class="country standard" id="iti-item-pl" role="option" data-dial-code="48" data-country-code="pl"><div class="flag-box"><div class="iti-flag pl"></div></div><span class="country-name">Poland (Polska)</span><span class="dial-code">+48</span></li><li class="country standard" id="iti-item-pt" role="option" data-dial-code="351" data-country-code="pt"><div class="flag-box"><div class="iti-flag pt"></div></div><span class="country-name">Portugal</span><span class="dial-code">+351</span></li><li class="country standard" id="iti-item-pr" role="option" data-dial-code="1" data-country-code="pr"><div class="flag-box"><div class="iti-flag pr"></div></div><span class="country-name">Puerto Rico</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-qa" role="option" data-dial-code="974" data-country-code="qa"><div class="flag-box"><div class="iti-flag qa"></div></div><span class="country-name">Qatar (‫قطر‬‎)</span><span class="dial-code">+974</span></li><li class="country standard" id="iti-item-re" role="option" data-dial-code="262" data-country-code="re"><div class="flag-box"><div class="iti-flag re"></div></div><span class="country-name">Réunion (La Réunion)</span><span class="dial-code">+262</span></li><li class="country standard" id="iti-item-ro" role="option" data-dial-code="40" data-country-code="ro"><div class="flag-box"><div class="iti-flag ro"></div></div><span class="country-name">Romania (România)</span><span class="dial-code">+40</span></li><li class="country standard" id="iti-item-ru" role="option" data-dial-code="7" data-country-code="ru"><div class="flag-box"><div class="iti-flag ru"></div></div><span class="country-name">Russia (Россия)</span><span class="dial-code">+7</span></li><li class="country standard" id="iti-item-rw" role="option" data-dial-code="250" data-country-code="rw"><div class="flag-box"><div class="iti-flag rw"></div></div><span class="country-name">Rwanda</span><span class="dial-code">+250</span></li><li class="country standard" id="iti-item-bl" role="option" data-dial-code="590" data-country-code="bl"><div class="flag-box"><div class="iti-flag bl"></div></div><span class="country-name">Saint Barthélemy</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-sh" role="option" data-dial-code="290" data-country-code="sh"><div class="flag-box"><div class="iti-flag sh"></div></div><span class="country-name">Saint Helena</span><span class="dial-code">+290</span></li><li class="country standard" id="iti-item-kn" role="option" data-dial-code="1869" data-country-code="kn"><div class="flag-box"><div class="iti-flag kn"></div></div><span class="country-name">Saint Kitts and Nevis</span><span class="dial-code">+1869</span></li><li class="country standard" id="iti-item-lc" role="option" data-dial-code="1758" data-country-code="lc"><div class="flag-box"><div class="iti-flag lc"></div></div><span class="country-name">Saint Lucia</span><span class="dial-code">+1758</span></li><li class="country standard" id="iti-item-mf" role="option" data-dial-code="590" data-country-code="mf"><div class="flag-box"><div class="iti-flag mf"></div></div><span class="country-name">Saint Martin (Saint-Martin (partie française))</span><span class="dial-code">+590</span></li><li class="country standard" id="iti-item-pm" role="option" data-dial-code="508" data-country-code="pm"><div class="flag-box"><div class="iti-flag pm"></div></div><span class="country-name">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</span><span class="dial-code">+508</span></li><li class="country standard" id="iti-item-vc" role="option" data-dial-code="1784" data-country-code="vc"><div class="flag-box"><div class="iti-flag vc"></div></div><span class="country-name">Saint Vincent and the Grenadines</span><span class="dial-code">+1784</span></li><li class="country standard" id="iti-item-ws" role="option" data-dial-code="685" data-country-code="ws"><div class="flag-box"><div class="iti-flag ws"></div></div><span class="country-name">Samoa</span><span class="dial-code">+685</span></li><li class="country standard" id="iti-item-sm" role="option" data-dial-code="378" data-country-code="sm"><div class="flag-box"><div class="iti-flag sm"></div></div><span class="country-name">San Marino</span><span class="dial-code">+378</span></li><li class="country standard" id="iti-item-st" role="option" data-dial-code="239" data-country-code="st"><div class="flag-box"><div class="iti-flag st"></div></div><span class="country-name">São Tomé and Príncipe (São Tomé e Príncipe)</span><span class="dial-code">+239</span></li><li class="country standard" id="iti-item-sa" role="option" data-dial-code="966" data-country-code="sa"><div class="flag-box"><div class="iti-flag sa"></div></div><span class="country-name">Saudi Arabia (‫المملكة العربية السعودية‬‎)</span><span class="dial-code">+966</span></li><li class="country standard" id="iti-item-sn" role="option" data-dial-code="221" data-country-code="sn"><div class="flag-box"><div class="iti-flag sn"></div></div><span class="country-name">Senegal (Sénégal)</span><span class="dial-code">+221</span></li><li class="country standard" id="iti-item-rs" role="option" data-dial-code="381" data-country-code="rs"><div class="flag-box"><div class="iti-flag rs"></div></div><span class="country-name">Serbia (Србија)</span><span class="dial-code">+381</span></li><li class="country standard" id="iti-item-sc" role="option" data-dial-code="248" data-country-code="sc"><div class="flag-box"><div class="iti-flag sc"></div></div><span class="country-name">Seychelles</span><span class="dial-code">+248</span></li><li class="country standard" id="iti-item-sl" role="option" data-dial-code="232" data-country-code="sl"><div class="flag-box"><div class="iti-flag sl"></div></div><span class="country-name">Sierra Leone</span><span class="dial-code">+232</span></li><li class="country standard" id="iti-item-sg" role="option" data-dial-code="65" data-country-code="sg"><div class="flag-box"><div class="iti-flag sg"></div></div><span class="country-name">Singapore</span><span class="dial-code">+65</span></li><li class="country standard" id="iti-item-sx" role="option" data-dial-code="1721" data-country-code="sx"><div class="flag-box"><div class="iti-flag sx"></div></div><span class="country-name">Sint Maarten</span><span class="dial-code">+1721</span></li><li class="country standard" id="iti-item-sk" role="option" data-dial-code="421" data-country-code="sk"><div class="flag-box"><div class="iti-flag sk"></div></div><span class="country-name">Slovakia (Slovensko)</span><span class="dial-code">+421</span></li><li class="country standard" id="iti-item-si" role="option" data-dial-code="386" data-country-code="si"><div class="flag-box"><div class="iti-flag si"></div></div><span class="country-name">Slovenia (Slovenija)</span><span class="dial-code">+386</span></li><li class="country standard" id="iti-item-sb" role="option" data-dial-code="677" data-country-code="sb"><div class="flag-box"><div class="iti-flag sb"></div></div><span class="country-name">Solomon Islands</span><span class="dial-code">+677</span></li><li class="country standard" id="iti-item-so" role="option" data-dial-code="252" data-country-code="so"><div class="flag-box"><div class="iti-flag so"></div></div><span class="country-name">Somalia (Soomaaliya)</span><span class="dial-code">+252</span></li><li class="country standard" id="iti-item-za" role="option" data-dial-code="27" data-country-code="za"><div class="flag-box"><div class="iti-flag za"></div></div><span class="country-name">South Africa</span><span class="dial-code">+27</span></li><li class="country standard" id="iti-item-kr" role="option" data-dial-code="82" data-country-code="kr"><div class="flag-box"><div class="iti-flag kr"></div></div><span class="country-name">South Korea (대한민국)</span><span class="dial-code">+82</span></li><li class="country standard" id="iti-item-ss" role="option" data-dial-code="211" data-country-code="ss"><div class="flag-box"><div class="iti-flag ss"></div></div><span class="country-name">South Sudan (‫جنوب السودان‬‎)</span><span class="dial-code">+211</span></li><li class="country standard" id="iti-item-es" role="option" data-dial-code="34" data-country-code="es"><div class="flag-box"><div class="iti-flag es"></div></div><span class="country-name">Spain (España)</span><span class="dial-code">+34</span></li><li class="country standard" id="iti-item-lk" role="option" data-dial-code="94" data-country-code="lk"><div class="flag-box"><div class="iti-flag lk"></div></div><span class="country-name">Sri Lanka (ශ්‍රී ලංකාව)</span><span class="dial-code">+94</span></li><li class="country standard" id="iti-item-sd" role="option" data-dial-code="249" data-country-code="sd"><div class="flag-box"><div class="iti-flag sd"></div></div><span class="country-name">Sudan (‫السودان‬‎)</span><span class="dial-code">+249</span></li><li class="country standard" id="iti-item-sr" role="option" data-dial-code="597" data-country-code="sr"><div class="flag-box"><div class="iti-flag sr"></div></div><span class="country-name">Suriname</span><span class="dial-code">+597</span></li><li class="country standard" id="iti-item-sj" role="option" data-dial-code="47" data-country-code="sj"><div class="flag-box"><div class="iti-flag sj"></div></div><span class="country-name">Svalbard and Jan Mayen</span><span class="dial-code">+47</span></li><li class="country standard" id="iti-item-sz" role="option" data-dial-code="268" data-country-code="sz"><div class="flag-box"><div class="iti-flag sz"></div></div><span class="country-name">Swaziland</span><span class="dial-code">+268</span></li><li class="country standard" id="iti-item-se" role="option" data-dial-code="46" data-country-code="se"><div class="flag-box"><div class="iti-flag se"></div></div><span class="country-name">Sweden (Sverige)</span><span class="dial-code">+46</span></li><li class="country standard" id="iti-item-ch" role="option" data-dial-code="41" data-country-code="ch"><div class="flag-box"><div class="iti-flag ch"></div></div><span class="country-name">Switzerland (Schweiz)</span><span class="dial-code">+41</span></li><li class="country standard" id="iti-item-sy" role="option" data-dial-code="963" data-country-code="sy"><div class="flag-box"><div class="iti-flag sy"></div></div><span class="country-name">Syria (‫سوريا‬‎)</span><span class="dial-code">+963</span></li><li class="country standard" id="iti-item-tw" role="option" data-dial-code="886" data-country-code="tw"><div class="flag-box"><div class="iti-flag tw"></div></div><span class="country-name">Taiwan (台灣)</span><span class="dial-code">+886</span></li><li class="country standard" id="iti-item-tj" role="option" data-dial-code="992" data-country-code="tj"><div class="flag-box"><div class="iti-flag tj"></div></div><span class="country-name">Tajikistan</span><span class="dial-code">+992</span></li><li class="country standard" id="iti-item-tz" role="option" data-dial-code="255" data-country-code="tz"><div class="flag-box"><div class="iti-flag tz"></div></div><span class="country-name">Tanzania</span><span class="dial-code">+255</span></li><li class="country standard" id="iti-item-th" role="option" data-dial-code="66" data-country-code="th"><div class="flag-box"><div class="iti-flag th"></div></div><span class="country-name">Thailand (ไทย)</span><span class="dial-code">+66</span></li><li class="country standard" id="iti-item-tl" role="option" data-dial-code="670" data-country-code="tl"><div class="flag-box"><div class="iti-flag tl"></div></div><span class="country-name">Timor-Leste</span><span class="dial-code">+670</span></li><li class="country standard" id="iti-item-tg" role="option" data-dial-code="228" data-country-code="tg"><div class="flag-box"><div class="iti-flag tg"></div></div><span class="country-name">Togo</span><span class="dial-code">+228</span></li><li class="country standard" id="iti-item-tk" role="option" data-dial-code="690" data-country-code="tk"><div class="flag-box"><div class="iti-flag tk"></div></div><span class="country-name">Tokelau</span><span class="dial-code">+690</span></li><li class="country standard" id="iti-item-to" role="option" data-dial-code="676" data-country-code="to"><div class="flag-box"><div class="iti-flag to"></div></div><span class="country-name">Tonga</span><span class="dial-code">+676</span></li><li class="country standard" id="iti-item-tt" role="option" data-dial-code="1868" data-country-code="tt"><div class="flag-box"><div class="iti-flag tt"></div></div><span class="country-name">Trinidad and Tobago</span><span class="dial-code">+1868</span></li><li class="country standard" id="iti-item-tn" role="option" data-dial-code="216" data-country-code="tn"><div class="flag-box"><div class="iti-flag tn"></div></div><span class="country-name">Tunisia (‫تونس‬‎)</span><span class="dial-code">+216</span></li><li class="country standard" id="iti-item-tr" role="option" data-dial-code="90" data-country-code="tr"><div class="flag-box"><div class="iti-flag tr"></div></div><span class="country-name">Turkey (Türkiye)</span><span class="dial-code">+90</span></li><li class="country standard" id="iti-item-tm" role="option" data-dial-code="993" data-country-code="tm"><div class="flag-box"><div class="iti-flag tm"></div></div><span class="country-name">Turkmenistan</span><span class="dial-code">+993</span></li><li class="country standard" id="iti-item-tc" role="option" data-dial-code="1649" data-country-code="tc"><div class="flag-box"><div class="iti-flag tc"></div></div><span class="country-name">Turks and Caicos Islands</span><span class="dial-code">+1649</span></li><li class="country standard" id="iti-item-tv" role="option" data-dial-code="688" data-country-code="tv"><div class="flag-box"><div class="iti-flag tv"></div></div><span class="country-name">Tuvalu</span><span class="dial-code">+688</span></li><li class="country standard" id="iti-item-vi" role="option" data-dial-code="1340" data-country-code="vi"><div class="flag-box"><div class="iti-flag vi"></div></div><span class="country-name">U.S. Virgin Islands</span><span class="dial-code">+1340</span></li><li class="country standard" id="iti-item-ug" role="option" data-dial-code="256" data-country-code="ug"><div class="flag-box"><div class="iti-flag ug"></div></div><span class="country-name">Uganda</span><span class="dial-code">+256</span></li><li class="country standard" id="iti-item-ua" role="option" data-dial-code="380" data-country-code="ua"><div class="flag-box"><div class="iti-flag ua"></div></div><span class="country-name">Ukraine (Україна)</span><span class="dial-code">+380</span></li><li class="country standard" id="iti-item-ae" role="option" data-dial-code="971" data-country-code="ae"><div class="flag-box"><div class="iti-flag ae"></div></div><span class="country-name">United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</span><span class="dial-code">+971</span></li><li class="country standard" id="iti-item-gb" role="option" data-dial-code="44" data-country-code="gb"><div class="flag-box"><div class="iti-flag gb"></div></div><span class="country-name">United Kingdom</span><span class="dial-code">+44</span></li><li class="country standard" id="iti-item-us" role="option" data-dial-code="1" data-country-code="us"><div class="flag-box"><div class="iti-flag us"></div></div><span class="country-name">United States</span><span class="dial-code">+1</span></li><li class="country standard" id="iti-item-uy" role="option" data-dial-code="598" data-country-code="uy"><div class="flag-box"><div class="iti-flag uy"></div></div><span class="country-name">Uruguay</span><span class="dial-code">+598</span></li><li class="country standard" id="iti-item-uz" role="option" data-dial-code="998" data-country-code="uz"><div class="flag-box"><div class="iti-flag uz"></div></div><span class="country-name">Uzbekistan (Oʻzbekiston)</span><span class="dial-code">+998</span></li><li class="country standard" id="iti-item-vu" role="option" data-dial-code="678" data-country-code="vu"><div class="flag-box"><div class="iti-flag vu"></div></div><span class="country-name">Vanuatu</span><span class="dial-code">+678</span></li><li class="country standard" id="iti-item-va" role="option" data-dial-code="39" data-country-code="va"><div class="flag-box"><div class="iti-flag va"></div></div><span class="country-name">Vatican City (Città del Vaticano)</span><span class="dial-code">+39</span></li><li class="country standard" id="iti-item-ve" role="option" data-dial-code="58" data-country-code="ve"><div class="flag-box"><div class="iti-flag ve"></div></div><span class="country-name">Venezuela</span><span class="dial-code">+58</span></li><li class="country standard" id="iti-item-vn" role="option" data-dial-code="84" data-country-code="vn"><div class="flag-box"><div class="iti-flag vn"></div></div><span class="country-name">Vietnam (Việt Nam)</span><span class="dial-code">+84</span></li><li class="country standard" id="iti-item-wf" role="option" data-dial-code="681" data-country-code="wf"><div class="flag-box"><div class="iti-flag wf"></div></div><span class="country-name">Wallis and Futuna (Wallis-et-Futuna)</span><span class="dial-code">+681</span></li><li class="country standard" id="iti-item-eh" role="option" data-dial-code="212" data-country-code="eh"><div class="flag-box"><div class="iti-flag eh"></div></div><span class="country-name">Western Sahara (‫الصحراء الغربية‬‎)</span><span class="dial-code">+212</span></li><li class="country standard" id="iti-item-ye" role="option" data-dial-code="967" data-country-code="ye"><div class="flag-box"><div class="iti-flag ye"></div></div><span class="country-name">Yemen (‫اليمن‬‎)</span><span class="dial-code">+967</span></li><li class="country standard" id="iti-item-zm" role="option" data-dial-code="260" data-country-code="zm"><div class="flag-box"><div class="iti-flag zm"></div></div><span class="country-name">Zambia</span><span class="dial-code">+260</span></li><li class="country standard" id="iti-item-zw" role="option" data-dial-code="263" data-country-code="zw"><div class="flag-box"><div class="iti-flag zw"></div></div><span class="country-name">Zimbabwe</span><span class="dial-code">+263</span></li><li class="country standard" id="iti-item-ax" role="option" data-dial-code="358" data-country-code="ax"><div class="flag-box"><div class="iti-flag ax"></div></div><span class="country-name">Åland Islands</span><span class="dial-code">+358</span></li></ul></div><input type="text" title="Phone number" class="custom-intl-tel-input input-text required-entry mobile-phone-input" autocomplete="off" style="padding-left: 6px;"></div>
                                            <input class="full-telephone-input" type="hidden" name="mobile_phone">
                                        </div>
                                    </div>
                                    <div class="field field-mobile">
                                        <label class="required" for="two_factor_code">Verification code</label>
                                        <div class="input-box">
                                            <input type="text" name="two_factor_code" class="verification-code-input input-text required-entry verification-code-length" title="Verification code">
                                            <button class="resend-button resend-register-button" id="verify-resend-btn" data-action="/mobile-verification/index/createSend/" data-resend-delay="20">
                                                <span class="timer"></span>
                                                Resend </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn button close-modal" data-dismiss="modal">
                                    Cerca </button>
                                <button type="button" class="btn button" id="verify-phone-modal-btn" data-action="/mobile-verification/index/verify/">
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
    <!-- Student Popup -->
    <div class="modal fade" id="ungdom-text-modal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h2>Ungdom</h2>
                </div>
                <div class="modal-body clearfix">
                    <p><b>Ungdom (Denmark)</b></p>
                    <p>Valid for full time students and persons undergoing national service up to the age of 31. Valid student ID / proof of national service is required. If this cannot be presented on request, you will be required to obtain an upgrade fee at a minimum of kr. 500,-. This ticket is fully refundable and name change is possible up to 30 days after scheduled departure date. This ticket does not give you permission to CPH Express. Checked baggage is limited to one piece of max 23 kgs and hand luggage one piece, max 8 kgs.</p>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn button btn-checkout" data-dismiss="modal">
                            Cerca</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
