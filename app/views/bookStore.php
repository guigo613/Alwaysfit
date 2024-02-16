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

            echo "<div class='row'>
                    <div class='col'><h1>Lista de Livros</h1></div>
                    <div class='col'><input class='form-control' id='search' placeholder='Buscar...'></div>
                    <div class='col-2 ms-auto'>";

            if ($permission) {
            echo        "<div class='row'>
                            <div class='col-6'>
                                <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=logout'\">logout</button>
                            </div>
                            <div class='col-6'>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=manager'\">Gerenciar</button>
                                    <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=newUser'\">Novo</button>
                                </div>
                            </div>
                        </div>";
            } else {
                echo    "<button type='button' class='btn btn-primary' onclick=\"location.search = '?route=login'\">login</button>";
            }
            echo    "</div>
                </div>";
            
            echo "<div class='table-container'>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Titulo</th>
                                <th scope='col'>Autor</th>
                                <th scope='col'>Ano de Lançamento</th>";

            if ($permission) 
                echo            "<th scope='col'>Ação</th>";

            echo            "</tr>
                        </thead>
                        <tbody>";
            foreach ($books->inner as $key => $book) {
                echo        "<tr>
                                <th scope='row'>{$key}</th>
                                <td>{$book->title}</td>
                                <td>{$book->author}</td>
                                <td>{$book->year}</td>";

                if ($permission) {
                    echo        "<td>
                                    <form action='?route=removebook' method='post' style='display: inline; margin-left: 10px;'>
                                        <input type='hidden' name='book_id' value='{$key}'>
                                        <input type='submit' value='Remover'>
                                    </form>
                                </td>";
                }
                echo        "</tr>";
            }
            echo        "</tbody>
                    </table>
                </div>";

            
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
    <script>
        const search = e => {
            let elm = Array.from(document.querySelectorAll("table tbody tr")).map(t => {
                if (Array.from(t.querySelectorAll("td")).map(td => td.innerText).some(text => text.search(e.target.value) != -1))
                    t.classList.remove("d-none")
                else
                    t.classList.add("d-none")
            })
        }

        document.querySelector("#search").addEventListener("keyup", search)
    </script>
</body>
</html>