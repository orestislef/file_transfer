<?php
$folder = "uploads";

function listFiles($dir) {
    $files = scandir($dir);
    $fileList = [];

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $dir . '/' . $file;
            $fileInfo = [
                "name" => $file,
                "path" => $filePath,
                "type" => is_dir($filePath) ? "folder" : "file"
            ];
            $fileList[] = $fileInfo;
        }
    }

    return $fileList;
}

header("Content-Type: application/json");
echo json_encode(listFiles($folder));
?>
