<!DOCTYPE html>
<html>
<body>

<h1>Is it a bird?</h1>

<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="image" />
<button type="submit" name="button-upload">Upload</button>

</body>
</html>


<?php

function display_progress() {
    $total = 5;

    for($i=1; $i<=$total; $i++){
        echo "<p>.<p>";

        echo str_repeat(' ',1024*64);

        flush();

        sleep(3);
    }
}

if(isset($_POST['button-upload'])) {
    $folder="uploads/";
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = sha1_file($image_location);

    if(move_uploaded_file($image_location,$folder.$image_name))
    {
	shell_exec('./infer.sh ' . $image_name);
	display_progress();
	$output = shell_exec('cat /tmp/' . $image_name . '.txt');
    }
    else
    {
	?><script>alert('error while uploading file');</script><?php
    }
}
?>
