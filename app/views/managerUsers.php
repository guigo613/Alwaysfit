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

            echo "<div class='row'>
                    <div class='col'><h1>Lista de Livros</h1></div>
                    <div class='col'><input class='form-control' id='search' placeholder='Buscar...'></div>
                    <div class='col-2 ms-auto'>
                        <button type='button' class='btn btn-primary' onclick=\"location.search = '?route=book'\">Voltar</button>
                    </div>
                </div>
                <div class='table-container'>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Ação</th>
                            </tr>
                        </thead>
                        <tbody>";
            foreach ($users->inner as $key => $user) {
                echo        "<tr>
                                <th scope='row'>{$key}</th>
                                <td>{$user->username()}</td>
                                <td>
                                    <form action='?route=removeuser' method='post' style='display: inline; margin-left: 10px;'>
                                        <input type='hidden' name='user_id' value='{$key}'>
                                        <input type='submit' value='Remover'>
                                    </form>
                                </td>
                            </tr>";
            }
            echo        "</tbody>
                    </table>
                </div>";

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