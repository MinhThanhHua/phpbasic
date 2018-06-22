<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload file</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Chọn ảnh: 
        <input type="file" name="image" id="UploadImage">
        <input type="submit" value="Lưu" name="btnLuu">
    </form>
    <?php
        if (isset($_FILES['image'])) {
            $path = './image/'.$_FILES['image']['name'];
            if (file_exists($path)) {
                echo 'trùng file';
                return;
            }
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                echo "Success";
            }
            if ($_FILES['image']['error'] > 0) {
                echo 'File lỗi';
            } else {
                move_uploaded_file($_FILES['image']['tmp_name'], './image/'.$_FILES['image']['name']);
                echo "file uploaded";
            }
        }
        ?>
</body>
</html>