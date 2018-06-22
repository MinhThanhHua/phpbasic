<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .form-input{
            margin: 2px;
        }
        .progress { 
            border: 1px solid #ccc; 
            width: 500px; 
            height: 20px; 
            margin-top: 10px;
            text-align: center;
            position: relative;
            }
        .bar { 
            background: #F39A3A; 
            height: 20px; 
            width: 0px;
        }
        .percent { 
            position: absolute; 
            left: 50%; 
            top: 0px;
        }
    </style>
    <title>Upload file ajax</title>
</head>

<body>
    <div class="container">
        <form action="serverUpload.php" method="post" onsubmit="return runAjax()" enctype="multipart/form-data">
            <div class="form-input">
                <input type="file" name="file" id="upFile">
            </div>
            <div class="form-input">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
    <div class="progress">
        <div class="bar"></div>
        <div class="percent"></div>
    </div>
    <div class="message"></div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/ajaxUploadFile.js"></script>
</body>

</html>