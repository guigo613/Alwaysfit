<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="app">
        <div class="center-app">
            <h2>Cadastro</h2>
            <form method="post" action="?route=addUser">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input required type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="admin" id="admin-check">
                    <label class="form-check-label" for="admin-check">
                        Administrador
                    </label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>