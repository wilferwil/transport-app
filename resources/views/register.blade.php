<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Usuário</title>
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>
    <form action="/register" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <label for="account_type">Tipo de Conta:</label>
        <select name="account_type" id="account_type" required>
            <option value="vendedor">Vendedor</option>
            <option value="transportadora">Transportadora</option>
        </select>

        <button type="submit">Register</button>
    </form>
</body>
</html>
