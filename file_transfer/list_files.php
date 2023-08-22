<?php
$uploadsDirectory = 'uploads'; // Your directory path

$files = [];

if (is_dir($uploadsDirectory)) {
    $dir = opendir($uploadsDirectory);
    while ($file = readdir($dir)) {
        if ($file != '.' && $file != '..') {
            $filePath = $uploadsDirectory . '/' . $file;
            $files[] = [
                'name' => $file,
                'path' => $filePath,
                'type' => is_dir($filePath) ? 'folder' : 'file',
            ];
        }
    }
    closedir($dir);
}

header('Content-Type: application/json');
echo json_encode($files);
?>
