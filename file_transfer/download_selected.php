<?php
// Check if the selectedFiles parameter is set and not empty
if (isset($_GET['selectedFiles']) && !empty($_GET['selectedFiles'])) {
    // Get the selected files from the query parameter
    $selectedFiles = $_GET['selectedFiles'];

    // Create a temporary directory to store the selected files
    $tempDir = 'temp_zip';
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }

    // Create a unique zip file name
    $zipFileName = 'selected_files_' . date('YmdHis') . '.zip';

    // Initialize a ZipArchive object
    $zip = new ZipArchive();
    if ($zip->open($tempDir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
        // Add selected files to the zip archive
        foreach ($selectedFiles as $file) {
            // Make sure the file exists and is readable
            if (file_exists($file) && is_readable($file)) {
                // Add the file to the zip archive with a new name (e.g., without path)
                $zip->addFile($file, basename($file));
            }
        }

        // Close the zip archive
        $zip->close();

        // Send the zip archive for download
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
        readfile($tempDir . '/' . $zipFileName);

        // Clean up: remove the temporary zip file and directory
        unlink($tempDir . '/' . $zipFileName);
        rmdir($tempDir);

        exit;
    } else {
        echo 'Failed to create the zip archive.';
    }
} else {
    echo 'No files selected for download.';
}
?>
