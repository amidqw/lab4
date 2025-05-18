<?php
$dir = 'image/';
$files = scandir($dir);

if ($files === false) {
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats Gallery</title>
    <style>
        body {
            font-family: monospace;
            text-align: center;
        }
        nav {
            margin: 20px;
        }
        nav a {
            text-decoration: none;
            color: black;
            margin: 0 10px;
            border-right: 1px solid #000;
            padding: 0 10px;
        }
        nav a:last-child {
            border-right: none;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .gallery img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        footer {
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>#cats</h1>
        <p>Explore a world of cats</p>
    </header>
    <nav>
        <a href="#">About Cats</a>
        <a href="#">News</a>
        <a href="#">Contacts</a>
    </nav>
    <div class="gallery">
        <?php
        foreach ($files as $file) {
            if ($file != "." && $file != ".." && preg_match('/\.(jpg|jpeg)$/i', $file)) {
                $path = $dir . $file;
                echo "<img src='$path' alt='cat image'>";
            }
        }
        ?>
    </div>
    <footer>
        USM ● 2024
    </footer>
</body>
</html>