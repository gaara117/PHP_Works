<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="" method = "post" enctype="multipart/form-data">
        <fieldset>
            <legend>Student Info</legend>
            <label for="">Name:</label>
            <input type="text" name = "fullname" ><br><br>
            <label for="">Email:</label>
            <input type="email" name = "email"><br><br>
            <label for="">Profile: </label>
            <input type="file" name = "file"><br><br>
            <input type="submit" name = "submit" value = "save">
        </fieldset>
    </form>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $name = $_POST['fullname'];
    echo"Name:".$name."<br>";

    $email = $_POST['email'];
    echo"Email:".$email."<br>";

    if(isset($_FILES['file'])){
    echo "file Name:".$_FILES["file"]["name"]."<br>";

    echo "File Size: ".$_FILES['file']['size'];
    if($_FILES['file']['size'] <= 80 *1024*1024){
        echo "file size is allowed";
    }
    else{
        echo "file size is not allowe";
    }
    }
}
?>