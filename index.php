<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-white px-5 sticky-top">
    <div class="container-fluid">
		<div class="d-flex flex-column">
	        <a class="navbar-brand p-0" href="#">Bismarck Business Group LLC</a>
			<p class="m-0">A TaxWise Service Bureau</p>
		</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 align-items-center mx-auto">
            <li class="nav-item">
            	<a class="nav-link" aria-current="page" href="#">Main</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#product">Our Product</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="create-account.php">Create an account</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="office-registration.php">Office Registration</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">Student Registration</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">About Us</a>
            </li>
            
			<?php
                if ($_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="client/index.php">'. $_SESSION['name'] .'</a>
                        </li>';
                }
				else {
					echo '<li class="nav-item">
							<a class="nav-link" href="client/login.php">Client Login</a>
						</li>';
				}
            ?>
        </ul>
		<div id="google_translate_element"></div>
        </div>
    </div>
    </nav>
	<div class="container-fluid p-0">
		<div id="firstPage" class="ha-bg-parallax main_banner" data-type="background" data-speed="10">
			<div class="ha-parallax-body">
				<h4>TaxWise</h4>
				<h6 class="text-primary d-none d-md-block">Software for Tax Professionals</h6>
				<br>
				<p>If you are a registered tax handler, we recommend you to use the <br> TaxWise Professional Tax preparation Program?</p>
				<a href="#secondPage" class="btn btn-primary rounded-5 px-5">Learn More</a>
			</div>
		</div>
		<div class="row flex-row-reverse">
			<div class="col-md-5 bg-primary-subtle d-flex justify-content-center align-items-center flex-column py-5">
				<h3>We can help you!</h3>
				<h5>If you work with us, we'll help you with:</h5>
			</div>
			<div class="col-md-7 py-5 ps-5">
				<ul class="list-1">
					<li>Installation of the program.</li>
					<li>To register with the Bank so that you can offer the services of Banking products.</li>
				</ul>
				<ul class="list-1">
					<li>The setting of it.</li>
					<li>our technical support is available during and after the season 7 days a week.</li>
				</ul>
				<div class="mt-4 d-flex justify-content-center align-items-center flex-column">
					<a href="#product" class="btn btn-success rounded-5 px-5 mb-2">Click Here!</a>
					<p>or</p>
					<p>Call us for a Free consultation</p>
					<a href="#" class="btn btn-primary rounded-5 px-5 mt-2">239-391-6775</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 bg-dark-subtle d-flex justify-content-center align-items-center flex-column py-5 text-center">
				<h3>Training:</h3>
				<h5>Do you want to learn how to prepare taxes and become a trainer?</h5>
			</div>
			<div class="col-md-7 py-5">
				<ul class="list-2">
					<li>We will train you to be come an expert so you can perform these tasks.</li>
					<li>It doesn't matter that you don't have any prior knowledge about tax preparation. We will teach you from scratch.</li>
					<li>It is a trade that you can exercise in any of the 50 states of the nation.</li>
				</ul>
				<ul class="list-2">
					<li>If you really have the interest in learning a new trade with the aim of making extra money in the year, this is your chance and we're gonna help you.</li>
					<li>If you are already a trainer, but you need to acquire more knowledge in order to be able to work without doubt and prepare the sheets safely, we can also help you.</li>
				</ul>
				<div class="mt-4 d-flex justify-content-center align-items-center flex-column">
					<a href="#product" class="btn btn-success rounded-5 px-5 mb-2">Click Here!</a>
					<p>or</p>
					<p>Call us for a Free consultation</p>
					<a href="#" class="btn btn-primary rounded-5 px-5 mt-2">239-391-6775</a>
				</div>
			</div>
		</div>
		<div id="secondPage" class="ha-bg-parallax-2 bottom_banner" data-type="background" data-speed="10">
		</div>
		<div class="container-fluid p-0 py-4">
			<div class="row justify-content-center py-4">
				<div class="col-md-9">
					<h3 class="text-center">Why TaxWise?</h3>
					<h5 class="text-center">TaxWise is one of the best Tax preparation software in the Market.</h5>
					<h5 class="text-center mb-4">You can work as you like using one of the 2 available versions:</h5>
					<ul class="list-unstyled">
						<li>
							The Desktop version, with which you can install your program on your PC from which you plan to liansmit eleclionically,
							and on all PC But remember that only from the PC you chose to liansmit eleclionically is that you can do it.
							But you can install it in your Laptop and use it to visit customers at home and prepare their taxes from there.
						</li>
						<li>
							And you Don't need to have Internet services in the place where you go home, because your program doesn't need it when you're installed on that PC.
						</li>
						<br>
						<li>
							With this version of software you can also work on Network if you are a trainer who has an office in which several are going to work. Trainers at the same time under you.
						</li>
						<li>
							This is done by installing the software on a particular PC and configuring all the other PC you need to use within the Office.
						</li>
						<li>
							You can use it outside the office or at home by remotely accessing your office's PC.
						</li>
						<br>
						<li>
							The only "disadvantage" that the Version Desktop has is that 2 or 3 times during the Tax season, you will have to update the same with the New versions coming in, but you do this in less than a minute.
						</li>
						<br>
						<li>
							With TaxWise you can also: compare the Federal Declarations of your Personal clients and those of all types of Corporations or Business, plus those of the 50 nation states.
						</li>
						<br>
						<li>
							You can also:
						</li>
						<li>
							Convert most of the templates to the Spanish language.
						</li>
						<li>
							Create, edit, delete, print, liansmit your tax returns.
						</li>
						<li>
							All the sheets that you haven't fully completed the program are marked with a red sign.
						</li>
						<li>
							It allows you to make a Diagnostic before liansmitting the statement eleclionically to detect any errors.
						</li>
						<li>
							It allows you to charge your fee for preparation to customers who Don't have the money to pay you at the time of 
							Preparation by deducting your fee from your refund or by making a charge or debit to your bank account if you are not going to Receive a recast through the banking product system.
						</li>
						<li>
							Create different users to handle the program.
						</li>
						<li>
							Convert your customers' Tax Declarations to PDF format to be sent by email.
						</li>
						<li>
							Make the request of the ITIN or Tax ID to customers who need to apply them.
						</li>
						<li>
							Ask for extension of time, if your client is not ready for the last day established by the IRS and the State.
						</li>
						<li>
							Make the customer a payment Plan.
						</li>
						<li>
							Help the customer pay or make a subscription at the time of Tiansmitting the Declaration electronically
						</li>
						<li>
							Transfer all your customers from the previous year, to the new program, to avoid typing them again.
						</li>
						<li>
							Convert the customers of many other software to TaxWise.
						</li>
						<li>
							Manage the order in which you want to print the different tax sheets.
						</li>
						<li>
							Indicating the status of all the taxis you're preparing. If they were accepted, rejected (and why), if you have not yet liansmitted it or it is in process.
						</li>
						<li>
							You can generate, visualize and print multiple types of reports, including Mailing Labels to send letters to your customers.
						</li>
						<br>
						<li>
							Version Online as your name indicates, you Don't need to install on your PC, you Don't need an exlia Computer or Server to work.
						</li>
						<li>
							In Network because with this version we can work from any computer that has access to the Internet and users can be up to 25
						</li>
						<li>
							Those who can work at the same time. We Don't need to update the program either because it's done automatically on servers.
						</li>
						<li>
							From TaxWise. The only difference is that the Online version does not include corporate modules to be able to prepare business taxes.
						</li>
						<li>
							Stop this, we must install a Desktop Module, work the Coporations taxis there and then liansfer them to the Online System so that they can be Transmitted electronically.
						</li>
						<li>
							This version has additional modules that allow customers to remotely type their W2 and also sign electronically. On their cell phone or tablet.
						</li>
					</ul>
				</div>
			</div>
		</div>
		<hr>
		<div class="row" id="product">
			<div class="col-md-12">
				<h3 class="text-center">Our TaxWise Pricing</h3>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container p-5">
			  <div class="row justify-content-center">
				<div class="col-lg-4 col-md-12 mb-4">
				  <div class="card h-100 shadow-lg">
					<div class="card-body">
					  <div class="text-center p-3">
						<h3 class="card-title">Online</h3>
						<hr>
						<h5>By Zelle</h5>
						<span class="h2">$1135</span>
						<br><br>
						<h5>By Debit or Credit Card</h5>
						<span class="h2">$1172</span>
						<br><br>
						<h5>Make a Down Payment</h5>
						<span class="h2">$635</span>
						<br><hr>
					  </div>
					  <p class="card-text">The remaining $500 you can pay when you can, but before electronic transmission begins.</p>
					</div>
					<hr>
					<div class="card-body text-center">
					  <button class="btn btn-outline-primary btn-lg px-5 rounded-5">Select</button>
					</div>
				  </div>
				</div>
				<div class="col-lg-4 col-md-12 mb-4">
					<div class="card h-100 shadow-lg">
					  <div class="card-body">
						<div class="text-center p-3">
						  <h3 class="card-title">Desktop</h3>
						  <hr>
						  <h5>By Zelle</h5>
						  <span class="h2">$1135</span>
						  <br><br>
						  <h5>By Debit or Credit Card</h5>
						  <span class="h2">$1172</span>
						  <br><br>
						  <h5>Make a Down Payment</h5>
						  <span class="h2">$635</span>
						  <br><hr>
						</div>
						<p class="card-text">The remaining $500 you can pay when you can, but before electronic transmission begins.</p>
					  </div>
					  <hr>
					  <div class="card-body text-center">
						<button class="btn btn-outline-primary btn-lg px-5 rounded-5">Select</button>
					  </div>
					</div>
				  </div>
			  </div>    
			</div>
		</div>
		<div class="table-responsive px-5">
			<table class="table text-center">
			  <thead>
				<tr>
				  <th style="width: 34%;"></th>
				  <th style="width: 33%;">Online</th>
				  <th style="width: 33%;">Desktop</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row" class="text-start">Data cover</th>
				  <td>Free</td>
				  <td>Free</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">User / Preparers</th>
				  <td>Unlimited</td>
				  <td>Unlimited</td>
				</tr>
			  </tbody>
			  <tbody>
				<tr>
				  <th scope="row" class="text-start">1040-1040PR-1040NR</th>
				  <td>Unlimited</td>
				  <td>Unlimited</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">1041-1065-1120C-1120S-706-709-990</th>
				  <td>Unlimited</td>
				  <td>Unlimited</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Federal e-file (3 last years)</th>
				  <td>Unlimited</td>
				  <td>Unlimited</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">State Programs for individual and Business</th>
				  <td>All</td>
				  <td>All</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Transmissions</th>
				  <td>Unlimited</td>
				  <td>Unlimited</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Cloud hosting</th>
				  <td>$6.00 each</td>
				  <td>$6.00 each</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Print to PDF</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Customer Support</th>
				  <td>7 days a week</td>
				  <td>7 days a week</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Bank products / pay from refund options</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Network ready</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Backup / Restore</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Office configuration and settings</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Diagnostic</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">View and print Forms in Spanish</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
				<tr>
				  <th scope="row" class="text-start">Export K-1 from Partnership to individual Tax</th>
				  <td>&#10003;</td>
				  <td>&#10003;</td>
				</tr>
			  </tbody>
			</table>
		  </div>
			
		<hr>
		<footer>
			<div class="row mx-5 px-5">
				<div class="col-md-4">
					<a class="fs-5 text-decoration-none text-dark" href="#">Bismarck Business Group LLC</a>
					<p class="m-0">A TaxWise Service Bureau</p>
				</div>
				<div class="col-md-6 offset-2">
					<ul class="list-unstyled">
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Main</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Our Product</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Create an account</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Office Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Student Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">About Us</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
		}
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>