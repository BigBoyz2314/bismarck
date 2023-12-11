<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
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
                        <a class="nav-link text-light" href="#">Logout</a>
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
                    <a class="nav-link active" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Offices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Clients by States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Registration Codes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Installation & Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">La Biblia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Software Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Inquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Courses</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Overview</h3>
            </div>
            <div class="col-md-2 offset-2 fw-semibold">
                <a href="#" class="d-block">Add New Office</a>
                <a href="#">Add Student</a>
            </div>
            <div class="col-md-2 fw-semibold">
                <a href="#">Register Payment</a>
            </div>
            <hr>
            <div class="col-md-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded-4">
                    <canvas id="myChart" height="200px"></canvas>
                    <div class="w-100 text-center">
                        <label for="officeType">Office Type:</label>
                        <select name="officeType" id="officetype" class="d-inline form-select w-50">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Released">Released</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8 text-center bg-info-subtle rounded-4">
                <h4 class="py-3">Office Information</h4>
                <div class="office-info">
                    <select name="officeSelect" id="officeSelect" class="me-2 form-select d-inline">
                        <option value="EFIN">EFIN</option>
                    </select>
                    <input type="text" name="" id="" class="ms-2 form-control d-inline">
                    <button class="btn btn-primary ms-2">Search</button>
                    <hr>
                    <ul class="list-unstyled text-start fw-semibold ps-5">
                        <li>EFIN: </li>
                        <li>Company Name: </li>
                        <li>Contact First Name: </li>
                        <li>Contact Last Name: </li>
                        <li>Phone: </li>
                        <li>Email: </li>
                    </ul>
                </div>
            </div>
        </div>




	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
		}

        var xValues = ["2023", "2022", "2021"];
        var yValues = [60, 49, 44,];
        var barColors = ["red", "green","blue","orange","brown"];

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: "Office Information Graph"
                }
            }
            // title: "Office Information Graph",
        }
        });
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>