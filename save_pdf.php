<?php
$uploadsDirectory = 'assets/pdfUploads/';

// Create the "uploads" folder if it doesn't exist
if (!file_exists($uploadsDirectory) && !is_dir($uploadsDirectory)) {
    mkdir($uploadsDirectory, 0777, true);
}

if (!empty($_FILES['pdf'])) {
    $tempFile = $_FILES['pdf']['tmp_name'];
    $targetFile = $uploadsDirectory . $_FILES['pdf']['name'];

    if (move_uploaded_file($tempFile, $targetFile)) {
        // Get the MIME type of the uploaded file
        $fileType = mime_content_type($targetFile);

        echo json_encode(['message' => 'File uploaded successfully']);
    } else {
        echo json_encode(['error' => 'Error uploading file']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded']);
}
?>