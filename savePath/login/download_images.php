<?php
// Path to the directory containing images
$imageDir = 'image/';
$zipFile = 'images.zip';

// Initialize a new ZipArchive object
$zip = new ZipArchive();

// Create or open the ZIP file
if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    exit("Cannot open <$zipFile>\n");
}

// Add all images from the directory to the ZIP file
$files = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE); // Match image files
foreach ($files as $file) {
    $zip->addFile($file, basename($file)); // Add each image to the ZIP archive
}

// Close the ZIP file
$zip->close();

// Serve the ZIP file to the user for download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $zipFile . '"');
header('Content-Length: ' . filesize($zipFile));
readfile($zipFile);

// Delete the ZIP file after download (optional)
unlink($zipFile);
exit();
?>
