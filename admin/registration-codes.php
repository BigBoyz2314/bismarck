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
    <title>Registratio Codes</title>
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
                    <a class="nav-link active" href="registration-codes.php">Registration Codes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="installation.php">Installation & Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="la-biblia.php">La Biblia</a>
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
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Registration Codes</h3>
            </div>
            <div class="col-md-12 rounded-4">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th>Year</th>
                            <th>EFIN</th>
                            <th>Reg Code</th>
                            <th>User name</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2022</td>
                            <td>070743</td>
                            <td></td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2021</td>
                            <td>070743</td>
                            <td></td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2020</td>
                            <td>070743</td>
                            <td>SJJJ-JJJS-6JE2-ISJJ-3NTL</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2019</td>
                            <td>070743</td>
                            <td>IKKK-KKK7-DJ4U-RSK9-L4M9</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2018</td>
                            <td>070743</td>
                            <td>ACCC-CCCR-SKYE-3TCX-WYHX</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2017</td>
                            <td>070743</td>
                            <td>MMMM-MMHZ-B0NJ-QEMK-YXPM</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2016</td>
                            <td>070743</td>
                            <td>X555-55KE-PNJ6-GS5L-QBVT</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2015</td>
                            <td>070743</td>
                            <td>MMMM-MMSZ-382J-QFMV-GIBW</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2014</td>
                            <td>070743</td>
                            <td>TNNN-NNNN-GNAI-5TNN-OH8H</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2013</td>
                            <td>070743</td>
                            <td>WVVV-VVVV-2VI8-LWVV-OVLG </td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2012</td>
                            <td>070743</td>
                            <td>WWWW-WWWW-4WQD-2MWW-XXCZ</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2011</td>
                            <td>070743</td>
                            <td>ACCC-CCCC-PCT7-ZACC-Q696</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2010</td>
                            <td>070743</td>
                            <td>PPRG-EEEV-PEV8-ZFEE-9272</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2009</td>
                            <td>070743</td>
                            <td>UUK9-7778-UEPC-JF77-VRC2</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2008</td>
                            <td>070743</td>
                            <td>CSXA-CAAB-YAVG-JBAA-HAN8</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2007</td>
                            <td>070743</td>
                            <td>2222-22JN-Q4M8-XT24-7XKV or QQF4-2223-QAM8-EB22-PF2C</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2006</td>
                            <td>070743</td>
                            <td>KKEKPMIM</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2005</td>
                            <td>070743</td>
                            <td>MUOKNUKS</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2004</td>
                            <td>070743</td>
                            <td>DHBNAHNF</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2003</td>
                            <td>070743</td>
                            <td>MUOKMTJT</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>070743</td>
                            <td>FRLHKRHR</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2001</td>
                            <td>070743</td>
                            <td>LUPZXPPW</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2000</td>
                            <td>070743</td>
                            <td>PITNLUUH or HQLVTUUI</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1999</td>
                            <td>070743</td>
                            <td>LBNCEFDG</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1998</td>
                            <td>070743</td>
                            <td>OEKNIQEJ</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1997</td>
                            <td>070743</td>
                            <td>LRSOKRLQ</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1996</td>
                            <td>070743</td>
                            <td>PIJFQIMR</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1995</td>
                            <td>070743</td>
                            <td>OGRNIQKP</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1994</td>
                            <td>070743</td>
                            <td>PFGSNFKU</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1993</td>
                            <td>070743</td>
                            <td>KRFISLQH</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1992</td>
                            <td>070743</td>
                            <td>IPDGIRGN</td>
                            <td>Admin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>1991</td>
                            <td>070743</td>
                            <td>IOSFFGKN</td>
                            <td>Admin</td>
                            <td></td>
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