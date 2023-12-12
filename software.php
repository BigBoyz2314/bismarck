<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation & Updates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container-fluid w-75">
            <div class="d-flex flex-column py-1">
                <a class="navbar-brand p-0 fw-bold text-light fs-3" href="#">Central Office Manager</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>


    
    <nav class="navbar navbar-expand-lg bg-light text-primary border-bottom border-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 fw-semibold">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="index.php">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="office.php">Offices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Clients by States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="production.php">Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="registration-codes.php">Registration Codes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="installation.php">Installation & Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="la-biblia.php">La Biblia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="software.php">Software Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="inquiries.php">Inquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="courses.php">Courses</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Software Management</h3>
            </div>
            <div class="col-md-12 rounded-4">
                <table class="software-table table-bordered">
                    <thead class="bg-opacity-50 bg-success fs-5 text-center">
                        <tr>
                            <th>Software Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Su usuario se ha bloqueado o se le olvido el password y no puede entrar al Programa.</td>
                        </tr>
                        <tr>
                            <td>Como mantener su Programa Actualizado (Updated)</td>
                        </tr>
                        <tr>
                            <td>Como hacer los Updates de la parte Federal y Estatal del programa</td>
                        </tr>
                        <tr>
                            <td>Como Cambiar de Printer si compro uno nuevo.</td>
                        </tr>
                        <tr>
                            <td>Como buscar rapidamente un cliente.</td>
                        </tr>
                        <tr>
                            <td>Como aumentar las planillas de tamaño para visualizarlas mejor.</td>
                        </tr>
                        <tr>
                            <td>Como Cambiar de tamaño los Icons que aparecen arriba en el programa</td>
                        </tr>
                        <tr>
                            <td>Como visualizar el Arbol de Planillas de la izquierda si este se ha perdido.</td>
                        </tr>
                        <tr>
                            <td>Como ocultar el Refund Monitor si necesitamos hacer esto.</td>
                        </tr>
                        <tr>
                            <td>Como ver las Actualizaciones (Acknoledgements) que nos van llegando.</td>
                        </tr>
                        <tr>
                            <td>Como imprimir Labels con las lista de los clientes para enviarles cartas.</td>
                        </tr>
                        <tr>
                            <td>Como imprimir Labels con las lista de los clientes que no vinieron este año para enviarles cartas.</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantos Taxes se han sido aceptados en esta temporada.</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantos taxes (Fee Collect) usted lleva aprobados en la Temporada.</td>
                        </tr>
                        <tr>
                            <td>Como Imprimir un listado de clientes</td>
                        </tr>
                        <tr>
                            <td>Como Imprimir un listado de los Taxes hechos cada dia</td>
                        </tr>
                        <tr>
                            <td>Como saber de Cuales clientes el Banco ya le ha depositado a usted el dinero de los Fee Collect.</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantos Taxes tenemos en (In-Progress) que no los hemos terminado y enviado.</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantos Taxes tenemos Rechazados por el IRS.</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantos Taxes tenemos Rechazados por TaxWise.</td>
                        </tr>
                        <tr>
                            <td>Como sabe cuantos Taxes de los Estados tenemos (Aprobados, Rechazados, No enviado todavia)</td>
                        </tr>
                        <tr>
                            <td>Como eliminar Clientes que fueron creados y luego decidieron no Preparar sus Impuestos con nosotros.</td>
                        </tr>
                        <tr>
                            <td>Como transferir la data de un Cliente que vino a hacer varios años de impuestos con nosotros.</td>
                        </tr>
                        <tr>
                            <td>Como usar la Calculadora de TaxWise.</td>
                        </tr>
                        <tr>
                            <td>Como saber cual es su Client-ID.</td>
                        </tr>
                        <tr>
                            <td>Como saber cual es su EFIN.</td>
                        </tr>
                        <tr>
                            <td>Como Cambiar su Password para ir al Soporte de TaxWise para Imprimir cheques</td>
                        </tr>
                        <tr>
                            <td>Como Chequear el Status de un Income Tax</td>
                        </tr>
                        <tr>
                            <td>Como saber cuantas veces hemos Transmitido un Income Tax.</td>
                        </tr>
                        <tr>
                            <td>Como saber las razones por la cual un Income tax ha sido Rechazado.</td>
                        </tr>
                        <tr>
                            <td>Como saber si podemos o No Re-transmitir un Income Tax luego de Rechazado.</td>
                        </tr>
                        <tr>
                            <td>Como hacer una Extension de tiempo a un Income Tax Federal</td>
                        </tr>
                        <tr>
                            <td>Como hacer una Extension de tiempo a un Income Tax del Estado.</td>
                        </tr>
                        <tr>
                            <td>Como hacer una Enmienda.</td>
                        </tr>
                        <tr>
                            <td>Como Cambiar el Social Security Numero a un Income Tax.</td>
                        </tr>
                        <tr>
                            <td>Como solicitarle un ITIN a un cliente.</td>
                        </tr>
                        <tr>
                            <td>Que hacer cuando le ha llegado el ITIN a cliente al cual se lo solicitamos.</td>
                        </tr>
                        <tr>
                            <td>Como solicitarle el ITIN al Congugue de un Cliente</td>
                        </tr>
                        <tr>
                            <td>Como solicitarle el ITIN al Dependent de un Cliente</td>
                        </tr>
                        <tr>
                            <td>Como Enviar electronicamente los taxes de los Clientes con Status Bacht</td>
                        </tr>
                        <tr>
                            <td>Como Re-enviar Taxes que se transmitieron hace varios dias y no ha sido ni aceptados ni Rechazados.</td>
                        </tr>
                        <tr>
                            <td>Como y cuando enviar Taxes de Clientes por Correo.</td>
                        </tr>
                        <tr>
                            <td>Cambiar los Precios de los Taxes que vamos a Transmitir (Fee Collect)</td>
                        </tr>
                        <tr>
                            <td>Como llevar un Control de los Clientes que nos han pagado y cuales no trdavia.</td>
                        </tr>
                        <tr>
                            <td>Como Scanear las Informaciones de los Clientes para no tener que guardar tantos Papeles.</td>
                        </tr>
                        <tr>
                            <td>Por cuento tiempo debemos de Guardar los records de los clientes de Taxes si no escaneamos.</td>
                        </tr>
                        <tr>
                            <td>Como saber cual es el Status de un Income Tax Federal que se transmitio electronicamente.</td>
                        </tr>
                        <tr>
                            <td>Como saber cual es el Status de un Income Tax del Estado que se transmitio electronicamente.</td>
                        </tr>
                        <tr>
                            <td>Como ver el Status de un Income Tax que se hizo Fee Collect con el Banco de Santa Barbara.</td>
                        </tr>
                        <tr>
                            <td>Tratamiento de los Clientes que dicen No Recibieron el Stimulo Economico.</td>
                        </tr>
                        <tr>
                            <td>Tratamiento de los Clientes que Recibieron los avances del Child Tax Credit.</td>
                        </tr>
                        <tr>
                            <td>Como evitar que el Santa Barbara Bank nos enrole en Programas para debitarle las cuentas a los Clientes.</td>
                        </tr>
                        <tr>
                            <td>Como ordenar cheques adicionales con el Santa Barbara Bank.</td>
                        </tr>
                        <tr>
                            <td>Como pagar el Fee por las Transmisiones electronicas.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
	    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>