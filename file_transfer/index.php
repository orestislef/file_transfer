<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $message = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded successfully.";
    } else {
        $error = "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>File Upload</h1>

        <?php
        if (isset($message)) {
            echo "<p class='success'>$message</p>";
        } elseif (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form action="index.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <label for="fileToUpload" class="file-label">Choose a file:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="file-input">
            <button type="submit" class="upload-button">Upload</button>
        </form>
    </div>
</body>
</html>
