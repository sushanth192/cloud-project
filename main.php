<?php

// error_reporting(0);
require_once(__DIR__ . '/vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\Rekognition\RekognitionClient;

$imageUrl = "j";
$bucket = 'cc-project-storage';
$keyname = $fileNameX;
$male=0;
$female=0;
$beard=0;
$specs=0;
$mouth=0;
$eyes=0;
$smile=0;
$imgUrl="";
$countFace=0;
$s3 = new S3Client([
        'region'        => 'us-east-2',
        'version'       => '2006-03-01',
        'signature'     => 'v4'
]);

try {
    // Upload data.
        $result = $s3->putObject([
                'Bucket'                => $bucket,
                'Key'                   => $keyname,
                'SourceFile'    => $fileTmpNameX,// __DIR__. "/$keyname",
                'ACL'                   => 'public-read-write'
        ]);

    // Print the URL to the object.
        $imageUrl = $result['ObjectURL'];
        if($imageUrl) {
                // echo "\n\nImage upload done... Here is the Image: \n";
                $imgUrl=$imageUrl;
                //echo "<img src=$imageUrl width=200 height=200></img>";
                $rekognition = new RekognitionClient([
                        'region'        => 'us-east-2',
                        'version'       => 'latest',
                ]);

                $result = $rekognition->detectFaces([
                        'Attributes'    => ['ALL'],//DEFAULT
                        'Image' => [
                                'S3Object' => [
                                        'Bucket' => $bucket,
                                        'Name'  =>      $keyname,
                                        'Key'   =>      $keyname,
                                ],
                        ],

                ]);
                $countFace = count($result["FaceDetails"]);
                //echo "<h4 id=\"FontFace\">There are a total of <b id=\"standOut\">".  count($result["FaceDetails"]) . "</b> faces detected</h4><br>";
                $male=0;
                $female=0;
                $beard=0;
                // $moustache=0;
                $specs=0;
                $mouth=0;
                $eyes=0;
                $smile=0;
                for ($n=0;$n<sizeof($result['FaceDetails']); $n++){

                        // print 'Age (low): '.$result['FaceDetails'][$n]['AgeRange']['Low'];
                        if(strcmp($result['FaceDetails'][$n]['Gender']['Value'],"Male") == 0 && ($result['FaceDetails'][$n]['Gender']['Confidence'] > 80)){
                                $male++;
                        }
                        if(strcmp($result['FaceDetails'][$n]['Gender']['Value'],"Female") == 0 && ($result['FaceDetails'][$n]['Gender']['Confidence'] > 80)) {
                                $female++;
                        }
                         if($result['FaceDetails'][$n]['Beard']['Value']  && ($result['FaceDetails'][$n]['Beard']['Confidence'] > 50)){
                                $beard++;
                        }
                        // if($result['FaceDetails'][$n]['Mustache']['Value'] && ($result['FaceDetails'][$n]['Mustache']['Confidence'] > 50)) {
                        //         $moustache++;
                        // }
                        if($result['FaceDetails'][$n]['Eyeglasses']['Value']  && ($result['FaceDetails'][$n]['Eyeglasses']['Confidence'] > 80)){
                                $specs++;
                        }
                        if($result['FaceDetails'][$n]['MouthOpen']['Value'] && ($result['FaceDetails'][$n]['MouthOpen']['Confidence'] > 80)) {
                                $mouth++;
                        }
                         if($result['FaceDetails'][$n]['EyesOpen']['Value'] && ($result['FaceDetails'][$n]['EyesOpen']['Confidence'] > 80)){
                                $eyes++;
                        }
                        if($result['FaceDetails'][$n]['Smile']['Value'] && ($result['FaceDetails'][$n]['Smile']['Confidence'] > 80)) {
                                $smile++;
                        }

                }
        }
} catch (Exception $e) {
        echo "<h3>".$e->getMessage() . PHP_EOL."</h3>";
}
