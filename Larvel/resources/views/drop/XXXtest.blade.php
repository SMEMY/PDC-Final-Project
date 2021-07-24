
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="/facilitatorMaterials" method="POST" enctype="multipart/data-form">
@csrf
        <input placeholder="1" class="form-control" type="file" name="filename">
        <br>
        <input placeholder="1" class="form-control" type="text" name="agenda">
        <br>
        <input placeholder="1" class="form-control" type="text" name="agenda">
        <br>
        <input placeholder="1" class="form-control" type="text" name="agenda">
        <br>
        <button type="submit">submit</button>

</form>
</body>
</html>




