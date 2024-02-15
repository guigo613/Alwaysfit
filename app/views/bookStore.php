<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="app">
        <div class="center-app">
            
            <?php

            $permission = in_array("permission", $_SESSION) ? $_SESSION["permission"] : false;

            echo "<div class='row'>";
            echo "<div class='col'><h1>Lista de Livros</h1></div>";
            if ($permission) {
                echo 
                    "<div class='col-2 ms-auto'>
                        <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=logout'\">logout</button>
                    </div>";
            } else {
                echo
                    "<div class='col ms-auto'>
                        <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=login'\">login</button>
                    </div>";
            }
            echo "</div>";
            
            echo "<table class='table table-striped'>";
            echo 
                "<thead>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Titulo</th>
                        <th scope='col'>Autor</th>
                        <th scope='col'>Ano de Lançamento</th>
                        <th scope='col'>Ação</th>
                    </tr>
                </thead>";
            foreach ($books->inner as $key => $book) {
                echo 
                    "<tr>
                        <th scope='row'>{$key}</th>
                        <td>{$book->title}</td>
                        <td>{$book->author}</td>
                        <td>{$book->year}</td>
                    ";

                if ($permission) {
                    echo
                        "<td>
                            <form action='?route=removebook' method='post' style='display: inline; margin-left: 10px;'>
                                <input type='hidden' name='book_id' value='{$key}'>
                                <input type='submit' value='Remover'>
                            </form>
                        </td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            
            if ($permission)
                echo 
                    "<form action='?route=addbook' method='post' style='display: inline; margin-left: 10px;'>
                        <div class='input-group mb-3'>
                            <span class='input-group-text' id='label-title'>Titulo</span>
                            <input type='text' class='form-control' placeholder='Titulo' name='title'>

                            <span class='input-group-text' id='label-author'>Autor</span>
                            <input type='text' class='form-control' placeholder='Autor' name='author'>
                            
                            <span class='input-group-text' id='label-year'>Lançamento</span>
                            <input type='text' class='form-control' placeholder='Lançamento' name='year'>
                        </div>

                        <input class='btn btn-primary' type='submit' value='Adicionar'>
                    </form>";

            ?>
        </div>
    </div>
</body>
</html>