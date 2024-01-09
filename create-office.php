<?php

include_once('includes/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_POST['user-id'];
    $companyContactName = $_POST['company-contact-name'];
    $companyName = $_POST['company-name'];
    $companyAddress = $_POST['company-address'];
    $companyCity = $_POST['company-city'];
    $companyState = $_POST['company-state'];
    $companyZip = $_POST['company-zip'];
    $companyContactPhone = $_POST['company-contact-phone'];
    $companyFax = $_POST['company-fax'];
    $companyTaxId = $_POST['company-tax-id'];

    $preparerId = $_POST['preparer-id'];
    $preparerName = $_POST['preparer-name'];
    $preparerCompanyName = $_POST['preparer-company-name'];
    $preparerAddress = $_POST['preparer-address'];
    $preparerCity = $_POST['preparer-city'];
    $preparerState = $_POST['preparer-state'];
    $preparerZip = $_POST['preparer-zip'];
    $preparerPhone = $_POST['preparer-phone'];
    $preparerEfin = $_POST['preparer-efin'];
    $preparerPtin = $_POST['preparer-ptin'];
    $preparerNytprin = $_POST['preparer-nytprin'];
    $preparerEin = $_POST['preparer-ein'];
    $preparerEroPin = $_POST['preparer-ero-pin'];
    $preparerPin = $_POST['preparer-pin'];

    // Insert data into the database
    $query = "INSERT INTO offices (
        user_id, company_contact_name, company_name, company_address, company_city, company_state, company_zip, 
        company_contact_phone, company_fax, company_tax_id, preparer_id, preparer_name, preparer_company_name, 
        preparer_address, preparer_city, preparer_state, preparer_zip, preparer_phone, preparer_efin, preparer_ptin, 
        preparer_nytprin, preparer_ein, preparer_ero_pin, preparer_pin
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param(
        "isssssssssssssssssssssss",
        $userId, $companyContactName, $companyName, $companyAddress, $companyCity, $companyState, $companyZip,
        $companyContactPhone, $companyFax, $companyTaxId, $preparerId, $preparerName, $preparerCompanyName,
        $preparerAddress, $preparerCity, $preparerState, $preparerZip, $preparerPhone, $preparerEfin, $preparerPtin,
        $preparerNytprin, $preparerEin, $preparerEroPin, $preparerPin
    );

    // Execute the prepared statement
    $stmt->execute();

    // Check for successful insertion
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

?>
