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
    <title>La Biblia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
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
                    <a class="nav-link active" href="la-biblia.php">La Biblia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="software.php">Software Management</a>
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
	<div class="container-fluid px-5">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>La Biblia</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-3">
                            <th colspan="2">Bismarck Business Group, LLC</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th>Si Taxpayer nos Trae el siguiente documento o situacion:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Form W-2 Regular</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Form W-2 con direccion de residencia diferente a la que aparece en el Form Main Information Sheet.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Form W-2 con valores Ganados en Casillas 3 y 5 diferentes lo ganado en la Casilla 1</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Form W-2 con valor en la Casilla 16 diferente al de la Casilla 1.</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Form W-2 con valor en la Casilla 18 diferente al de la Casilla 1.</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Form W-2 con Check Mark en la Casilla 13: Estatutario </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Form W-2 que nunca fue recibido por el Taxpayer debido a que la empresa cerro y dejo de Operar.</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Form W-2 que todavia no se ha recibido por el taxpayer y que desea llenar con su ultimo Paystub</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Form W-2 con valor en la casilla 7: Propinas</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Form W-2 sin valor en la casilla 7: Propinas (Tips) pero el taxpayer las ha ganado y desea reportarlas.</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Form W-2 con valor en la casilla 10: Dependent Care Benefits.</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Form W-2 con Letra W en las Casillas 12.</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Form W-2 con valor en la Casilla 14: IRC 414H</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Form W-2 con valor en la Casilla 14: IRC 125</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Form W-2 con direcccion de Taxpayer en alguno de los 5 Condados de la Ciudad de New York</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Form W-2 con direcccion de Taxpayer en la Ciudad de Yonkers</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Form W-2 de un Taxpayer con ITIN, pero el mismo tiene un Numero Social Security  de otra Persona.</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Form W-2 con direccion de New York y con la palabra Yonkers en la casilla # 20</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Form W-2 de con direccion de Yonkers y con la palabra NYC en la casilla # 20</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Form W-2 con un Estado en la casilla 15 diferente al Estado de donde vive segun du direccion.</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>Taxpayers con 2 Form W-2 con direcciones de Residencias Diferentes</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>Form W-2 de taxpayer Residente en NJ sin valores en las casillas 1, 2, 3, 4, 5 y 6</td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>Form W-2 de hijo del Taxpayer que lo ha reclamado como Dependents en sus Taxes</td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>Form W-2 con valor Ganado muy pequeño y que desea aumentar su ingreso con un SCH-C</td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>Form 1099 NEC. Con Valor en Casilla # 1</td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>Form 1099 Misc. Con Valor en Casilla # 1 - NO debemos preparar el SCH-C con este tipo de Forma</td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>Form 1099 Misc. Con Valor en Casilla # 3 - NO debemos preparar el SCH-C con este tipo de Forma</td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>Self-employee (Que fue un Trabajador por cuenta Propia o Negocio de Unico dueño)</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>Form 1099-K (Ingreso de Self-employee de parte de Clientes que pagaron con Dr o Cr Cards) </td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>Form 1099-G</td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td>Form 1099 Int </td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>Form 1099 Div</td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>Form 1099 B - Compra y Venta de Accciones o Valores de Capital (Stocks) </td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td>Form 1099-S Venta de Propiedad (La cual es su Principal Residencia)</td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td>Form 1099-S Venta de Propiedad que estaba Rentada  (La cual que No se habia Depreciado nunca)</td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>Form 1099-S Venta de Propiedad que estaba Rentada (La cual Si ya se habia Depreciado anteriormente)</td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td>Form 1099-S Venta de Activos Fijos (Maquinarias y equipos)</td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>Form 1099-A - Abandono de Propiedad</td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td>Form 1099-C o S Perdida de Propiedad</td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>Form 1099-C - Deudas de Credit Cards</td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>Si Taxpayer hizo el SCH A el ano anterior. El Reembolso del Estado sera taxable el proximo año.</td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>Form 1099-Q</td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>Form 1099 SSA</td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>Form 1099-R (Regular)</td>
                        </tr>
                        <tr>
                            <td>45</td>
                            <td>Form 1099-R de Taxpayers que Solicitan la Exencion de la Penalidad por Retiro debido al Covid-19</td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>Form 1099-SA (Con Check Mark en HSA)</td>
                        </tr>
                        <tr>
                            <td>47</td>
                            <td>Form 1099-SA (Con Check Mark en Archer MSA)</td>
                        </tr>
                        <tr>
                            <td>48</td>
                            <td>Form 5498 (IRA Contribution Information) Root IRA</td>
                        </tr>
                        <tr>
                            <td>49</td>
                            <td>Form 5498-SA (Con Check Mark en HSA)</td>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>Form 5498-SA (Con Check Mark en Archer MSA)</td>
                        </tr>
                        <tr>
                            <td>51</td>
                            <td>Form 5498 Fair Market Value</td>
                        </tr>
                        <tr>
                            <td>52</td>
                            <td>Judy Duty Pay</td>
                        </tr>
                        <tr>
                            <td>53</td>
                            <td>Operation of Finca (Farm)</td>
                        </tr>
                        <tr>
                            <td>54</td>
                            <td>Form W2-G</td>
                        </tr>
                        <tr>
                            <td>55</td>
                            <td>Intereses Ganados por su Dependent Si el Interes fue mayor de $2000.</td>
                        </tr>
                        <tr>
                            <td>56</td>
                            <td>Form K-1</td>
                        </tr>
                        <tr>
                            <td>57</td>
                            <td>Income from Installment Agreement for Sale any Property</td>
                        </tr>
                        <tr>
                            <td>58</td>
                            <td>Si el taxpayer tiene Activos, Propiedades y Cuentas bancarias fuera de los Estados Unidos.</td>
                        </tr>
                        <tr>
                            <td>59</td>
                            <td>Si el Taxpayer ha tenido Ingresos Ganado fuera de los Estados Unidos. (Salary, Divid., Intereses, etc).</td>
                        </tr>
                        <tr>
                            <td>60</td>
                            <td>Ingreso Ganado en Estados Libres Asociados (Puerto Rico, Islas Virgenes y Isla Guam).</td>
                        </tr>
                        <tr>
                            <td>61</td>
                            <td>Para Reclamar el Refund de un Familiar que Murio y no llego a preparar su Income Tax</td>
                        </tr>
                    </tbody>
                    <thead class="bg-warning-subtle fs-5">
                        <tr>
                            <th></th>
                            <th>Si Taxpayer nos Trae el siguiente documento o situacion:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>68</td>
                            <td>Intereses del Mortgage (Form 1098). Si Taxpayer tuvo propiedad una Familia y vivio en ella.</td>
                        </tr>
                        <tr>
                            <td>69</td>
                            <td>Real State Tax (Si Taxpayer tuvo propiedad de una Familia y vivio en ella.</td>
                        </tr>
                        <tr>
                            <td>70</td>
                            <td>Points (Gastos de Cierre).Si Taxpayer tuvo propiedad una Familia y vivio en ella.</td>
                        </tr>
                        <tr>
                            <td>71</td>
                            <td>Insurance. Seguro del Mortage. Si Taxpayer tuvo propiedad una Familia y vivio en ella</td>
                        </tr>
                        <tr>
                            <td>72</td>
                            <td>Form 1098 - Recibida por Taxpayer que tuvo propiedad rentada y NO vivio en ella.</td>
                        </tr>
                        <tr>
                            <td>73</td>
                            <td>Form 1098 - Recibida por Taxpayer que tuvo Propiedad rentada y vivio en una de las unidades.</td>
                        </tr>
                        <tr>
                            <td>74</td>
                            <td>Gastos Medicos y Dentales.</td>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>Pago Seguro Medico hechos por Taxpayer si el mismo fue Self-employee</td>
                        </tr>
                        <tr>
                            <td>76</td>
                            <td>Donaciones  Cash o con Cheques ( Diezmo)  MUY AUDITADAS POR IRS</td>
                        </tr>
                        <tr>
                            <td>77</td>
                            <td>Donaciones  NO Cash o con Cheques ( Ropas) MUY AUDITADAS POR IRS.</td>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>Other Expenses a colocar en el SCH-A</td>
                        </tr>
                        <tr>
                            <td>79</td>
                            <td>Gasto por Perdida por desastres naturales</td>
                        </tr>
                        <tr>
                            <td>80</td>
                            <td>Gastos o Perdida Jugando Loteria</td>
                        </tr>
                        <tr>
                            <td>81</td>
                            <td>Gasto Mudanza</td>
                        </tr>
                        <tr>
                            <td>82</td>
                            <td>Form 1095-A - Indica que el Taxpayer, Spouse o Dependents tuvieron Seguro Medico Pagando.</td>
                        </tr>
                        <tr>
                            <td>83</td>
                            <td>Form 1095-B - Indica que el Taxpayer, Spouse o Dependents tuvieron Seguro Medico (Gratis) del Gobierno.</td>
                        </tr>
                        <tr>
                            <td>84</td>
                            <td>Form 1095-C - Indica que el Taxpayer, Spouse o Dependents tuvieron Seguro Medico por el Empleador.</td>
                        </tr>
                        <tr>
                            <td>85</td>
                            <td>SCH-A L5a : General Sales Taxes Pagado</td>
                        </tr>
                        <tr>
                            <td>86</td>
                            <td>IRA Deduction.  Sirve para disminuir en parte el Tax a pagar al IRS </td>
                        </tr>
                        <tr>
                            <td>87</td>
                            <td>SELF-EMPLOYEE Gasto por el Uso de su Carro</td>
                        </tr>
                        <tr>
                            <td>88</td>
                            <td>SELF-EMPLOYEE Millas por el Uso de su Carro (Si va a usar este Metodo)</td>
                        </tr>
                        <tr>
                            <td>89</td>
                            <td>SELF-EMPLOYEE Gastos Relacionado con su Trabajo</td>
                        </tr>
                        <tr>
                            <td>90</td>
                            <td>SELF-EMPLOYEE Gasto por Uso de Casa para hacer Negocios</td>
                        </tr>
                        <tr>
                            <td>91</td>
                            <td>Pagos de Taxes Realizados por anticipado al IRS.</td>
                        </tr>
                        <tr>
                            <td>92</td>
                            <td>Cuido de niño fuera de tu Casa. La Baby Sitter para considerarse como tal no debe vivir en la misma direcc</td>
                        </tr>
                        <tr>
                            <td>93</td>
                            <td>Cuido de niño dentro de tu Casa. </td>
                        </tr>
                        <tr>
                            <td>94</td>
                            <td>Form 1098-T (Esta Forma debe tener valor en la Casilla 1 o en la 2).</td>
                        </tr>
                        <tr>
                            <td>95</td>
                            <td>Form 1098-E</td>
                        </tr>
                        <tr>
                            <td>96</td>
                            <td>Gastos Realizados por Maestros de Elementary and Secundary Educacion.</td>
                        </tr>
                        <tr>
                            <td>97</td>
                            <td>Depreciacion mediante el SCH-C</td>
                        </tr>
                        <tr>
                            <td>98</td>
                            <td>Depreciacion mediante el SCH-E</td>
                        </tr>
                        <tr>
                            <td>99</td>
                            <td>Extension de Tiempo para enviar las Planillas de Income Tax al IRS</td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>Seperacion de Deudas (Si el conyugue afectado desea separarse de las deudas de su Conyugue).</td>
                        </tr>
                        <tr>
                            <td>101</td>
                            <td>Seperacion de Deudas (Usar esta forma si ya le han tomado el Refund de ambos para pagar la Deuda).</td>
                        </tr>
                    </tbody>
                    <thead class="bg-warning-subtle fs-5">
                        <tr>
                            <th></th>
                            <th>Otros Casos:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>103</td>
                            <td>Para solicitar un ITIN o Renovarlo (Al Taxpayer, Spouse o Dependent)</td>
                        </tr>
                        <tr>
                            <td>104</td>
                            <td>Cuando el Taxpayer reciba el Numero de ITIN solicitado.</td>
                        </tr>
                        <tr>
                            <td>105</td>
                            <td>Para agregar un 5to Dependent</td>
                        </tr>
                        <tr>
                            <td>106</td>
                            <td>Si un Taxpayer ha sido reclamado como Dependent en otro Income Tax</td>
                        </tr>
                        <tr>
                            <td>107</td>
                            <td>Para Imprimir cheques ( Debera tener su Client ID, User Name y su Password)</td>
                        </tr>
                        <tr>
                            <td>108</td>
                            <td>Para agregar una 3ra Propiedad en el SCH-E</td>
                        </tr>
                        <tr>
                            <td>109</td>
                            <td>Si usted hace una Enmienda a una enmienda que ya se hizo.</td>
                        </tr>
                        <tr>
                            <td>110</td>
                            <td>Si necesita enviar por correo el Income Tax Federal (Por robo de Identidad u otra razon).</td>
                        </tr>
                        <tr>
                            <td>111</td>
                            <td>Dueños con Perdidas en Corporaciones C Domesticas 1120 (Inc o Corp.)</td>
                        </tr>
                        <tr>
                            <td>112</td>
                            <td>Dueños con Ganancias o Perdidas en S Corporaciones (1120S) o LLC (1065)</td>
                        </tr>
                        <tr>
                            <td>113</td>
                            <td>Cabeza de Familia. El Taxpayer debe ser Soltero (Pidale una Copia del Lease o del Bill de eletricidad)</td>
                        </tr>
                        <tr>
                            <td>114</td>
                            <td>Dependents que sean Nietos, Sobrinos, hermanos u otros.</td>
                        </tr>
                        <tr>
                            <td>115</td>
                            <td>Dependents - Prueba de Direccion.</td>
                        </tr>
                        <tr>
                            <td>116</td>
                            <td>Para hacer la Contabilidad de un Negocio ( Lo primero que debemos pedirle es la carta del IRS del EIN).</td>
                        </tr>
                        <tr>
                            <td>117</td>
                            <td>Negocios que pagan Sales Tax sobre sus Ventas. </td>
                        </tr>
                        <tr>
                            <td>118</td>
                            <td>Negocios que han hecho Payroll a sus Empleados.</td>
                        </tr>
                        <tr>
                            <td>119</td>
                            <td>A todos los Negocios debemos Pedirle los Estados de todas las Cuentas de Bancos del Periodo a trabajar.</td>
                        </tr>
                        <tr>
                            <td>120</td>
                            <td>A todos los Negocios debemos Pedirle las Planillas de Impuestos del o los anos anteriores del Negocio.</td>
                        </tr>
                        <tr>
                            <td>121</td>
                            <td>A todos los Negocios debemos Pedirle Copia de todas las Licencias para ver cuando Expiran.</td>
                        </tr>
                        <tr>
                            <td>122</td>
                            <td>Si el Negocio tiene Inventario de Mercancias, debemos pedir al dueño: El total de todas las Compras.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-5">
                            <th colspan="2">La Biblia para preparar los Taxes Personales (1040) del 2022</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th>De que se trata o que debemos considerar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>El Form W2 significa que el Taxpayer trabajo como empleado y recibio Salarios (Wages) or Other employment compesation.</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>La direccion que usted pone en el Form Main Information es la direccion actual del Taxpayer, la direccion del W2 en la direccion donde vivio anteriormente.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Esa situacion aparece cuando empleados deciden aportar un poquito mas de lo regular al Social Security y al Medicare para fines de Retiro.</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Esa situacion normalmente ocurre cuado el empleado trabaja para la misma Compania pero en dos Estados diferentes.</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Esa situacion ocurre solo cuando el empleado trabaja y/o ha vivido ejemplo: en NYC y Yonkers en donde hay que pagar Taxes a dichas Ciudades.</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Este tipo de W-2 lo reciben usualmente los ministros de las Iglesias y los Jornaleros Agricultura. Usualmente no tienen deduccione en la casillas del Social Security y Medicare.</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Taxpayer debe proveer su ultimo Paystub o comprobante de pago, y ademas debera proveer el Nombre y Federal Tax ID de la Compañia para la cual trabajo.</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Eso sucede al inicio de cada Temporada de Impuestos en la cual algunos clientes esta desesperados pro dinero y desean llenar sus Impuestos antes de que les llegue el Form W2.</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Cuando el W2 tiene propinas en la casilla 7, fijese que el valor de la casilla 3 se reduce por el monte que aparece en la casilla 7.</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Usualmente aparecen reportadas en la Casilla 7 del Form W-2, pero sino aparecen y el Taxpayer las quiere reportar.</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Si el W2 aparece con valor en la casilla 9 es porque la empresa donde trabajo el Taxpayer tiene beneficios para el cuido del hijo del taxpayer.</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Si en el Form aparace una W en la Casilla 12, el Taxpayer debera traer la Forma 1099-SA (Distribution from HSA) si no la trae el Income Tax no podra ser enviado electronicamente.</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Este valor lo traen espcialmente los W2 de los empleados de la Ciudad de New York. Y montos aportados para planes de retiros de la Ciudad.</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Este valor lo traen espcialmente los W2 de los empleados de la Ciudad de New York. Y montos aportados para planes de retiros de la Ciudad.</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Si segun el Form W2 el Taxpayer ha vivido en alguno de los 5 Condados de NYC (Manhattan, Bronx, Brooklyn, Queens, Staten Island) debemos digitar en la casilla 20 las letras: NYC</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Si segun el Form W2 el Taxpayer ha vivido en la Condado de Yonkers el cual pertenece a la Ciudad de Westchester del Estado de NY, debemos digitar en la casilla 20 la palabra: Yonkers.</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>El Form W2 debera tener al menos el nombre del Taxpayer. Eses Social Security Numero debera colocarse en la Celda a la derecha la Cajita amarilla # 7 del W2.</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Eso significa que el taxpayer trabajo en Yonkers. Verifique que se va a encender en Rojo las Casillas 47 y la 55 de la Pagina 3 de la Forma NY-201.</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Eso significa que el taxpayer trabajo en NYC. Verifique que se va a encender en Rojo las Casillas 47 y la 55 de la Pagina 3 de la Forma NY-201.</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>El valor de la Casilla 15 del W2 indica el Estado en donde Trabajo el Taxpayer. Si la Direccion del taxpayer es de por Ejemplo: De New York y la casilla 15 dice: NJ</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>Indica que el taxpayer no fue Full residente de ningun Estado. Fue Parte de ano Residente de un Estado y de otro tambien. Y Asi debemos de colocarlo en la Forma Main Information.</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>Esa Situacion ocurre en la Personas que cuidan a sus Familiares en su propia casa en New Jersey.</td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>En los taxes del hijo no se nos debe olvidar marcar la casilla 6a en la Main Information Sheet.</td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>Eso no se hace. A menos que tengamos un 1099 NEC Real. De lo contrario estariamos aumentando el Income para que el Taxpayer obtenga un EIC y por lo tanto un Refund mayor.</td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>Ingreso ganado por trabajo realizado como Self employment - como Contratista  (Se hace un SCH-C por cada Oficio)</td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>Ingreso proveniente de Renta.</td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>Otros Ingresos ganados. A este tipo de Ingresos no se le pueden Reportar Gastos. (Con este Ingreso el Taxpayer no Paga Self-employment Tax).</td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>Colocar valor directamente en la L1 del SCH- C no es recomendable. Taxpayer debera tener Pruebas de Banco o Cheques, que demuestren haber ganado el dinero que esta reportando.</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>Usualmente traen esta Forma los Taxista de Uber, Lyft, etc.   Tambien todos los duenos de negocios que aceptan en el mismo pagos con Debit y Credit Card.</td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>Unemployment Compesation recibido (Colecta).</td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td>Intereses Ganados (Generalmente de parte del Banco o cualquier otra Institucion Financiera).</td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>Dividendos o ganancia recibida por Inversion de Capital o en Acciones. (Estos pueden ser Ordinarios o Preferidos)</td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>Taxpayer obtuvo Ganancia o (perdida) en la Compra y Ventas de Acciones de Capital (Stocks).</td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td>Venta de su Vivienda Principal (Taxpayer debe haber vivido al menos 2 anos de los ultimos 5anos antes de vender la casa)</td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td>Form 4797, L2a, (F9), Aqui tomanos la Forma:  Asset Wkt Depreciation Worksheet</td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>Form 4797, L2a, (F9), Aqui tomanos la Forma:  Asset Wkt Depreciation Worksheet</td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td>Terrenos (Land), Maquinarias, Equipos, etc</td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>Abandono de una Propiedad (Ejemplo: un Time Share)</td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td>Cancelation of Debt (Por Perdida de una Casa o Modificacion del Mortgage)</td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>Cancelation of Debt (De deudas de Tarjetas de Credito u otras Deudas)</td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>Esto aplica para los Clientes que hicieron el SCH-A el ano anterior.  (Ej.: Clientes con Casa propia que viven en ella)</td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>Payments from Qualified Education Programs</td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>Social Security Benefits. Lo recibe el Taxpayer si ya esta retirado por el SSA.</td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>Taxpayer hizo el retiro de un Plan de Retiro que tenia: 401-K, un IRA y otro Plan de Retiro)</td>
                        </tr>
                        <tr>
                            <td>45</td>
                            <td>Taxpayer hizo el retiro de un Plan de Retiro que tenia: 401-K, un IRA y otro Plan de Retiro) Que ademas pide un diferimiento para el pagos de los Impuestos en 3 años.</td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>Es una Distribucion HSA-  </td>
                        </tr>
                        <tr>
                            <td>47</td>
                            <td>Es una Distribucion MSA-  </td>
                        </tr>
                        <tr>
                            <td>48</td>
                            <td>Esta Forma es Informativa solamente.</td>
                        </tr>
                        <tr>
                            <td>49</td>
                            <td>Es una Contribucion HSA-  </td>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>Es una Contribucion MSA-  </td>
                        </tr>
                        <tr>
                            <td>51</td>
                            <td>Es una Distribucion</td>
                        </tr>
                        <tr>
                            <td>52</td>
                            <td>Ingreso cuando Taxpayer a sido Jurado en la Corta para Jury Duty y recibio pago de la Corte.</td>
                        </tr>
                        <tr>
                            <td>53</td>
                            <td>Operation of Farm (Finca)</td>
                        </tr>
                        <tr>
                            <td>54</td>
                            <td>Premio Ganado de (Lottery, Casino or Bingo)</td>
                        </tr>
                        <tr>
                            <td>55</td>
                            <td>Intereses Ganados por su Dependent Si el Interes fue mayor de $2000 y menor de $10,000</td>
                        </tr>
                        <tr>
                            <td>56</td>
                            <td>Ingreso o Perdida proviente de (Haber sido uno de los dueños de una  S Corporation o LLC (Partnership) de mas de 1 dueño)</td>
                        </tr>
                        <tr>
                            <td>57</td>
                            <td>Income from Installment Agreement for Sale any Property</td>
                        </tr>
                        <tr>
                            <td>58</td>
                            <td>Todo Ciudadano Americano y Residente que viva fuera  de los Estados Unidos y que tenga bienes fuera del pais como: </td>
                        </tr>
                        <tr>
                            <td>59</td>
                            <td>Todo Ciudadano Americano que viva fuera de los Estados Unidos y que reciba Salario, Intereses Ganados, Dividendos, etc. otro pais.</td>
                        </tr>
                        <tr>
                            <td>60</td>
                            <td>Estos son Estados Libres Asociados y tienen sus propias Leyes de Impuestos, diferentes a las de los Estados Unidos Continental. </td>
                        </tr>
                        <tr>
                            <td>61</td>
                            <td>Si se recibio el Form W2 de Taxpayer luego de que el misma ha fallecido, un familiar podra llenar los Taxes del Difunto, y los mismos deberan enviarse por correo. Con una Acta de Defucion.</td>
                        </tr>
                    </tbody>
                    <thead class="bg-warning-subtle fs-5">
                        <tr>
                            <th></th>
                            <th>De que se trata o que debemos considerar:</th>
                        </tr>
                    </thead>
                        <tbody>
                        <tr>
                            <td>68</td>
                            <td>El Interes del Mortagage esta limitado hasta $750,000 para casa compradas a partir de Dic 15, 2017.</td>
                        </tr>
                        <tr>
                            <td>69</td>
                            <td>El total de los Taxes esta limitado hasta la cantidad de $10,000, Incluyendo el Real State Tax y Taxes de las Lineas 5a</td>
                        </tr>
                        <tr>
                            <td>70</td>
                            <td>Pagadosrealizados por el Taxpayer al Banco por compra o Refinanciamiento por una Propiedad.</td>
                        </tr>
                        <tr>
                            <td>71</td>
                            <td>Si el valor aparece en el Form 1098, lo tomamos de ahi. Sino, el taxpayer debera preguntarle al banco, cuanto pago de Seguro en el año.</td>
                        </tr>
                        <tr>
                            <td>72</td>
                            <td>Interes del Mortgage de una Propiedad. Debemos de preguntar al Taxpayer si el vivio o no en dicha propiedad.</td>
                        </tr>
                        <tr>
                            <td>73</td>
                            <td>Interes del Mortgage de una Propiedad. Debemos de preguntar al Taxpayer si el vivio o no en dicha propiedad.</td>
                        </tr>
                        <tr>
                            <td>74</td>
                            <td>Los Gastos Esteticos no son aceptados. Los Gastos medicos esta limitados a un 7.5% del Threshold Income.</td>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>El taxpayer debera tener prueba de Banco de haber pagado el Seguro Medico.</td>
                        </tr>
                        <tr>
                            <td>76</td>
                            <td>Esta limitadas al 60% del AGI (Solo se aceptan si Taxpayer tiene prueba de banco: Cks o M/O o Cr Card).</td>
                        </tr>
                        <tr>
                            <td>77</td>
                            <td>Donaciones  No Cash - Mayores de $500 Debera tener los recibos de prueba de la donaciones.</td>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>Los Others expenses estan limitados solo a 2 tipos de Gastos y la suma de ambos no puede ser mayor al 2 del AGI.</td>
                        </tr>
                        <tr>
                            <td>79</td>
                            <td>El Taxpayer debe tener el FEMA disaster Declaration Number . De lo contrario sus gastos no seran aceptados.</td>
                        </tr>
                        <tr>
                            <td>80</td>
                            <td>Perdida en Juego de Loteria    (Solo se Reporta cuando hubo un Premio Ganado).</td>
                        </tr>
                        <tr>
                            <td>81</td>
                            <td>Gasto de Mudanzas (Solo podra ser deducido si el Taxpayer es Miembro de las Fuerzas Armadas)</td>
                        </tr>
                        <tr>
                            <td>82</td>
                            <td>En el Main Info Sheet se debe marcar YES la pregunta de si el Taxpayar, Spouse o Dependents pago por el Seguro Medico. Y se debera llenar la Form 8962. </td>
                        </tr>
                        <tr>
                            <td>83</td>
                            <td>Se debe contestar NO en la Pregunta del Main Info sobre si el Taxpayer, Spouse o Dependent pagaron por su Seguro Medico en el Marke Pl.</td>
                        </tr>
                        <tr>
                            <td>84</td>
                            <td>Se debe contestar NO en la Pregunta del Main Info sobre si el Taxpayer, Spouse o Dependent pagaron por su Seguro Medico en el Marke Pl.</td>
                        </tr>
                        <tr>
                            <td>85</td>
                            <td>Sales Tax Pagado en compra un Carro, Bote, Supplies para reparar su Propia Casa que Taxpayer vive en ella.</td>
                        </tr>
                        <tr>
                            <td>86</td>
                            <td>Debe hacerse antes del 15 de Abril y no puede ser Mayor de $6000 si el taxpayer en manor de 50 anos o hasta $7,000 si es mayor a 50 anos.</td>
                        </tr>
                        <tr>
                            <td>87</td>
                            <td>Gastos por el uso del Carro - Para un Self-employee</td>
                        </tr>
                        <tr>
                            <td>88</td>
                            <td>Millas por el uso del Carro - Para un Self-employee</td>
                        </tr>
                        <tr>
                            <td>89</td>
                            <td>Gastos Relacionados con su Trabajo para un Self-Employee</td>
                        </tr>
                        <tr>
                            <td>90</td>
                            <td>Uso de parte de su Casa o apartamento donde usted Vive para Business.  Debemos especificar que % de la Casa se usa para negocio.</td>
                        </tr>
                        <tr>
                            <td>91</td>
                            <td>Pagos anticipados de Taxes hechos al IRS durante el año por un Self-Employee.</td>
                        </tr>
                        <tr>
                            <td>92</td>
                            <td>Pagos por Cuido de Niño menor de 13 anos  - Debe haberlo pagado con Cks, Money Orders o Zelle). Si el Patrono pago parte del cuido, ese valor esta indicado en la casilla # 10 del W-2.</td>
                        </tr>
                        <tr>
                            <td>93</td>
                            <td>Si la Baby Sitter fue a cuidar el nino a la Casa del Taxpayer y este le pago mas de $1800 en el año, debera darle un W2 por el total de los pagos y tenerla en una poliza de Worker&#39;s Comp.</td>
                        </tr>
                        <tr>
                            <td>94</td>
                            <td>Pagos de Tuicion - Por Educacion Post Secundaria.   Nota: Debe llenar la Form 8863 P2 o la Form 8917</td>
                        </tr>
                        <tr>
                            <td>95</td>
                            <td>Pagos de Intereses sobre Prestamo Educativo.</td>
                        </tr>
                        <tr>
                            <td>96</td>
                            <td>Gastos de un Maestro en la Compra Libros y Utiles para estudiantes y no Reembolsados por la Escuela.</td>
                        </tr>
                        <tr>
                            <td>97</td>
                            <td>SCH-C L13 (F9), elegir Form 4562 P1. </td>
                        </tr>
                        <tr>
                            <td>98</td>
                            <td>SCH-E L18 (F9), elegir Form 4562 P1 .</td>
                        </tr>
                        <tr>
                            <td>99</td>
                            <td> Debe hacerla antes del 15 de Abril para evitar la Penalidad por enviar tarde los Impuestos. Con la extension se deberia enviar el dinero a pagar.</td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>Form 8379. Esta Forma se usa para Separar las Deudas. Esta Forma se puede enviar electronicamente con el Income Tax.</td>
                        </tr>
                        <tr>
                            <td>101</td>
                            <td>Form 8857. Esta Forma se usa para que el Conyugue Innocente reclame el dinero que fue descontado y que le corresponde. No esta disponible en Taxwise, no enviar electronicamente.</td>
                        </tr>
                    </tbody>
                    <thead class="bg-warning-subtle fs-5">
                        <tr>
                            <th></th>
                            <th>De que se trata o que usted debe considerar:</th>
                        </tr>
                    </thead>
                        <tbody>
                        <tr>
                            <td>103</td>
                            <td>Llenar una Aplicacion W7 y esta debera de eviarse por correo, Junto con el Income Tax y Libreta Original de Pasaporte</td>
                        </tr>
                        <tr>
                            <td>104</td>
                            <td>NO se debe tocar o modificar el File con el que se le solicito el ITIN al Taxpayer. Se debe crear un nuevo Income Tax.</td>
                        </tr>
                        <tr>
                            <td>105</td>
                            <td>Esto le ayuda la aumentar la Exencion Pers., pues el EIC se recibe solo por  hasta 3 dependents.</td>
                        </tr>
                        <tr>
                            <td>106</td>
                            <td>Nota: Un dependent no puede si llena taxes, reclamar dependents en su Planilla de taxes</td>
                        </tr>
                        <tr>
                            <td>107</td>
                            <td>Cuando entre, Debera de hacer los Settings de Impresora Previamente.</td>
                        </tr>
                        <tr>
                            <td>108</td>
                            <td>En el SCH-E se colocan solo 2 propiedades. La columna C es solo para Royalties, No para Propiedades.</td>
                        </tr>
                        <tr>
                            <td>109</td>
                            <td>Podra hacerlo sin problemas, pero no se envia electronicamente.</td>
                        </tr>
                        <tr>
                            <td>110</td>
                            <td>Los Taxes de los ultimos 3 anos se transmiten electronicamente. Excepto las Solicitudes de ITIN.</td>
                        </tr>
                        <tr>
                            <td>111</td>
                            <td>Nota: Si usted es dueño o accionista de una Corporacion Domestica C , la Perdida de esta no se Transfiere a sus Planillas de Impuestos Personales.  </td>
                        </tr>
                        <tr>
                            <td>112</td>
                            <td>Este tipo de Corporaciones no paga impuestos Impuesto Federal, porque la Ganancia Neta se transfiere a los duenos mediantes un Form K-1</td>
                        </tr>
                        <tr>
                            <td>113</td>
                            <td>No le ponga cabeza de Familia a los Taxpayer hombre con Dependents (Muy pocos califican). Pongale a la mayoria, Soltero con su dependent.</td>
                        </tr>
                        <tr>
                            <td>114</td>
                            <td>Tenga mucho cuidado usando este tipo de dependent. Estos generalmente le corresponden a los Padres de los mismos.</td>
                        </tr>
                        <tr>
                            <td>115</td>
                            <td>Asegurese de que el Taxpayer de Pruebe con Carta de la Escuela, Lease, Poliza de Seguro Medico</td>
                        </tr>
                        <tr>
                            <td>116</td>
                            <td>Osea, la Carta en donde el IRS le asigno el Federal Tax ID. Solo alli podremos ver: Forma a llenar (1120, 1120S, 1065, 990, Etc. Fecha en que se deben preparar y enviar los Impuestos) </td>
                        </tr>
                        <tr>
                            <td>117</td>
                            <td>Debemos pedirle copia de reportes de Sale tax (Ya sean anuales, Trimestrales o Mensuales) del ano de Contabilidad y taxes que le vamos a hacer al Cliente.</td>
                        </tr>
                        <tr>
                            <td>118</td>
                            <td>Debemos pedirle copia de reportes de Payroll (Trimestrales y anuales) del ano de Contabilidad y taxes que le vamos a hacer al Cliente. Como Form 940, 941, Estatales, Forms W2 y W3).</td>
                        </tr>
                        <tr>
                            <td>119</td>
                            <td>Ademas los Comprobantes de Cheques o Chequera para ver a quien y para que se hicieron los Cheques. Las Cuentas de Banco debemos de Conciliarlas.</td>
                        </tr>
                        <tr>
                            <td>120</td>
                            <td>Si el Cliente no las tiene, debera pedirselas al Contable anterior. (Debemos tambien pedirle todas las cartas que le han llegado para ver que hay pendiente de preparar y enviar.</td>
                        </tr>
                        <tr>
                            <td>121</td>
                            <td>Si alguna esta expirada o va a expirar, debemos ayudar al Cliente a renovarla.</td>
                        </tr>
                        <tr>
                            <td>122</td>
                            <td>El valor de Inventario en el Balance Sheet de los Taxes del año anterior (Si es que el Preparador anterior lo hizo), sera el Inventario Inicial en los Taxes de este nuevo año.</td>
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