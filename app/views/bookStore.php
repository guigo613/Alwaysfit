<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
</head>
<body>
    <h1>Lista de Livros</h1>

    <?php

    $permission = in_array("permission", $_SESSION) ? $_SESSION["permission"] : false;

    if ($permission) {
        echo 
            "<div>
                <button type='button' onclick=\"location.search = '?route=logout'\">logout</button>
            </div>";
    } else {
        echo
            "<div>
                <button type='button' onclick=\"location.search = '?route=login'\">login</button>
            </div>";

    }

    echo "<ul>";
    foreach ($books->inner as $key => $book) {
        echo "<li>{$book->title}";

        if ($permission) {
            echo
                "<form action='?route=removebook' method='post' style='display: inline; margin-left: 10px;'>
                    <input type='hidden' name='book_id' value='{$key}'>
                    <input type='submit' value='Remover'>
                </form>";
        }
        echo "</li>";
    }
    echo "</ul>";

    
    if ($permission)
        echo 
            "<form action='?route=addbook' method='post' style='display: inline; margin-left: 10px;'>
                <input type='text' name='title' placeholder='title'>
                <input type='text' name='author' placeholder='author'>
                <input type='text' name='year' placeholder='year'>
                <input type='submit' value='Adicionar'>
            </form>";

    ?>

</body>
</html>