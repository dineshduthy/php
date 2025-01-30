<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic PHP Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hi I am dinesh</h1>
    
    <?php
        $message = "Hello, this is  a simple PHP template!";
        echo "<p>$message</p>";

        // Display current date
        echo "<p>Today's date: " . date("Y-m-d H:i:s") . "</p>";
    ?>
</div>

</body>
</html>
