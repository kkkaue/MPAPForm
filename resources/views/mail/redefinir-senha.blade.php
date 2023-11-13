
<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
</head>
<body>
    <h2>Olá!</h2>
    <p>Você solicitou a redefinição de senha. Clique no botão abaixo para continuar:</p>
    <a href="{{ route('password.reset.form', ['token' => $data['token']]) }}" target="_blank" style="background-color: #008CBA; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Redefinir Senha</a>
    <p>Se você não solicitou a redefinição de senha, ignore este e-mail.</p>
</body>
</html>
