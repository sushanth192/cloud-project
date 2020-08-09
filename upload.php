<?php
$fileNameX="";
$fileTmpName="";
if(isset($_POST['submit'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileTmpNameX = $fileTmpName;
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg', 'png');

        if(in_array($fileActualExt, $allowed)) {
                if($fileError === 0) {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileNameX = $fileNameNew;
                                $fileDestination = $fileNameNew;
                                include __DIR__.'/main.php';
                } else {
                        $v = explode("/",$_SERVER['SERVER_NAME']);
                        $vv = $v[0]."/";
                        echo "<h4 class=\"error\">There was an error uploading your file. <a class=\"error\" href=http://".$vv."face>Homepage</a></h4>";
                }
        } else {
                $val = explode("/",$_SERVER['SERVER_NAME']);
                $val_a = $val[0]."/";
                echo "<h4 class=\"error\">You cannot upload files of this type! <a class=\"error\" href=http://".$val_a."face>Homepage</a></h4>";
                die();
        }
}
