<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Face Recognition With AWS</title>
    <link rel="shortcut icon" type="image/png" href="https://cloudastronautblog.files.wordpress.com/2017/10/aws_logo_smile_1200x630.png?w=1400"/>
    <style>
        body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }
        .error {
                font-family: "Comic Sana MS", cursive, sans-serif;
        }

  main {
    flex: 1 0 auto;
  }
            #standOut {
                color: red;
                font-family: "Comic Sans MS", cursive, sans-serif;
            }
            #FontFace{
                 font-family: "Comic Sans MS", cursive, sans-serif;
            }
            #TableFont{
             background-color:#82b1ff;
            font-size: x-large;
           font-weight: 400;
            font-family: "Comic Sans MS", cursive, sans-serif;
                box-shadow: 10px 10px 5px grey;
                }

            #ccproj {
            background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            }
            #cc1 {
            background: linear-gradient(to top right, #99ff99 24%, #3399ff 106%);
            }
           #imgBorder {
            border-radius:10%;
                box-shadow: 10px 10px 5px grey;
           }
            .mt-3 {
            /* color: #a852de; */
            color: white;
             text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            font-weight: 400;
            font-family: "Comic Sans MS", cursive, sans-serif;
            }
            .mt-4 {
            color: #1a71ff;
            font-weight: bold;
            font-family: "Comic Sans MS", cursive, sans-serif;
            }
            blockquote {
            border-left: 5px solid #82b1ff;
            }
             #foot {
              background: linear-gradient(to right, #99ff99 24%, #7ae0b8 106%);
   left: 0;
   bottom: 0;
   width: 100%;
        font-size: large;
font-weight: bold;
        color: black;
   /*background-color: red;*/
   text-align: center;

        font-family: "Comic Sans MS", cursive, sans-serif;
/* background-color: #8EC5FC;
            background: linear-gradient(to top right, #99ff99 24%, #3399ff 106%);*/
}
    </style>
</head>

<body class="container" id="cc1">
<header>
        <center><h3 class="mt-3 ">Face Recognition using AWS Rekognition Service</h3></center></header><main>
        <?php
           include 'upload.php';
        ?>
      <div class="card" id="ccproj">
        <div class="card-content">
        <?php
           if(isset($_POST["submit"])) {
                   include 'results.php';
                }
        ?>
          <span class="card-title"> <blockquote>
          <div class="card-panel blue accent-1 "><h5 class="mt-4" >Upload an Image</h5></div></blockquote>
        </span>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div class="file-field input-field btn-medium">
                    <div class="btn waves-effect waves-purple scale-transition">
                        <span>Choose image location</span>
                        <input type="file" name="file" id="file" required/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <button type="submit" class="btn waves-effect waves-purple btn-medium scale-transition" name="submit">
                Upload<i class="material-icons right">send</i>
                </button>
            </form>
        </div>
        </div>
        </main>
<footer class="page-footer" id="foot" >
           Developed By Sushanth and Vineeth
        </footer>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
