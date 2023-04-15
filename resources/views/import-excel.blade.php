<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Excel File</title>
</head>
<body style="padding: 5%;">
    <form action="{{route('postImport')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Import File</p>
        <input style="display: block;" type="file" name="file" accept="" required> <br />
        <button type="submit">Start Importing</button>
    </form>
</body>
</html>
