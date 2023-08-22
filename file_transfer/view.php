<!DOCTYPE html>
<html>
<head>
    <title>File Preview</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>File Preview</h1>
        
        <?php
        if (isset($_GET["file"])) {
            $file = "uploads/" . $_GET["file"];
            if (file_exists($file)) {
                echo "<h2>Preview: " . $_GET["file"] . "</h2>";
                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                
                if (in_array($fileExtension, ["jpg", "jpeg", "png", "gif", "bmp"])) {
                    echo "<img src='$file' alt='Preview' class='preview-image'>";
                } else {
                    echo "<p>No preview available for this file type.</p>";
                }
                
                echo "<br><a href='$file' download>Download File</a>";
            } else {
                echo "File not found.";
            }
        } else {
            echo "No file selected.";
        }
        ?>
    </div>
</body>
</html>
