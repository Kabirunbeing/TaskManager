<!DOCTYPE html>
<html>
<head>
    <title>File Upload Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="file"] {
            padding: 0;
        }
        .form-group input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .uploaded-data {
            margin-top: 20px;
            padding: 20px;
            background-color: #e9ffe9;
            border: 1px solid #c3e6c3;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .uploaded-data h2 {
            margin-top: 0;
            color: #155724;
        }
        .back-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Upload a File</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choose a file:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Upload File">
            </div>
        </form>

        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
            // Handle the file upload
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<div class='uploaded-data'><p>Sorry, file already exists.</p></div>";
                $uploadOk = 0;
            }

            // Check file size (limit to 5MB)
            if ($_FILES["file"]["size"] > 5000000) {
                echo "<div class='uploaded-data'><p>Sorry, your file is too large.</p></div>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            $allowedTypes = array("jpg", "png", "jpeg", "gif", "pdf", "doc", "docx");
            if (!in_array($fileType, $allowedTypes)) {
                echo "<div class='uploaded-data'><p>Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX files are allowed.</p></div>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<div class='uploaded-data'><p>Sorry, your file was not uploaded.</p></div>";
            // If everything is ok, try to upload the file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    echo "<div class='uploaded-data'><h2>File Uploaded Successfully</h2>";
                    echo "<p>File Name: " . basename($_FILES["file"]["name"]) . "</p>";
                    echo "<p>File Size: " . ($_FILES["file"]["size"] / 1024) . " KB</p>";
                    echo "<p>File Type: " . $fileType . "</p>";
                    echo "<a href='index.php' class='back-button'>Back</a></div>";
                } else {
                    echo "<div class='uploaded-data'><p>Sorry, there was an error uploading your file.</p></div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
