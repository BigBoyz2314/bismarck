<?php
    require_once('../includes/config.php');
    
    if(isset($_POST["text"])) {
        $targetDir = "../uploads/"; // Define your target directory


        // Handling file 1
        if(!empty($_FILES["file-en"]["name"])) {
            $file1Name = basename($_FILES["file-en"]["name"]);
            $targetFilePath1 = $targetDir . $file1Name;
            $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

            // Handling file 2
            if(!empty($_FILES["file-es"]["name"])) {
                $file2Name = basename($_FILES["file-es"]["name"]);
                $targetFilePath2 = $targetDir . $file2Name;
                $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

                // Check if file types are allowed
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
                if (in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes)) {
                    // Upload files to server
                    if (move_uploaded_file($_FILES["file-en"]["tmp_name"], $targetFilePath1) &&
                        move_uploaded_file($_FILES["file-es"]["tmp_name"], $targetFilePath2)) {
                        // Insert file names and text input into the database
                        $textInput = $_POST['text']; // Fetch text input value
                        $query = "INSERT INTO software_management (data, file_en, file_es, created_at, updated_at) VALUES ('$textInput', '$file1Name', '$file2Name', NOW(), NOW())";
                        $insert = $conn->query($query);
                        if ($insert) {
                            $statusMsg = "The files and text input have been uploaded successfully.";
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {
                        $statusMsg = "Sorry, there was an error uploading your files.";
                    }
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $statusMsg = 'Please select a file for the second upload.';
            }
        } else {
            $statusMsg = 'Please select a file for the first upload.';
        }
        echo $statusMsg;
    }
?>
