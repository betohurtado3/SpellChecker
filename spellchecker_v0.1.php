<?php

// Make sure to install Tesseract OCR on your server and update the path accordingly.
$tesseractPath = '/usr/bin/tesseract';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        // Move the uploaded file to the designated directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Use Tesseract to extract text from the image
            $output = [];
            $returnCode = 0;
            exec("$tesseractPath $uploadFile -", $output, $returnCode);
            
            if ($returnCode === 0) {
                // Extracted text from the image
                $imageText = implode(' ', $output);
                
                // Perform spell-checking (English and Spanish)
                $englishCorrectedText = shell_exec("echo \"$imageText\" | aspell -a --lang=en");
                $spanishCorrectedText = shell_exec("echo \"$imageText\" | aspell -a --lang=es");
                
                // Save the results to a variable or sheet
                $result = [
                    'originalText' => $imageText,
                    'englishCorrectedText' => $englishCorrectedText,
                    'spanishCorrectedText' => $spanishCorrectedText,
                ];

                // Output the result (you can save it to a file or database as needed)
                print_r($result);
            } else {
                echo 'Error extracting text from the image.';
            }
        } else {
            echo 'Error moving the uploaded file.';
        }
    } else {
        echo 'No image uploaded.';
    }
}

?>
