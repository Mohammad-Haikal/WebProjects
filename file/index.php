<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Simple Recorder.js demo with record, stop and pause</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/style.css">

</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<div class="container">
    <?php
        $files = scandir('img/');
        foreach($files as $file) {
            // echo $file . '<br>';
        }

        for ($i=2; $i < count($files); $i++) { 
            echo "<a href='$files[$i]' download><img src='img/$files[$i]' ></a>";


        }
    
    
    
    ?>


</div>



</body>
</html>
