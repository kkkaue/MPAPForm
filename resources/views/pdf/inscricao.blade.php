<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .user-info {
            margin-top: 20px;
        }

        .user-info p {
            font-size: 16px;
            margin: 10px 0;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ storage_path('app/public/logo-mpap.png') }}" alt="Logo">
        </div>
        <div class="content">
            <div class="header">
                <h1>Olá, {{ $user['nome'] }}!</h1>
                <p>Seu cadastro foi realizado com sucesso!</p>
            </div>
            <div class="user-info">
                <p><strong>Nome:</strong> {{ $user['nome'] }}</p>
                <p><strong>CPF:</strong> {{ $user['cpf'] }}</p>
                <p><strong>Endereço:</strong> {{ $user['nome_rua'] }}, {{$user['numero_rua']}}</p>
                <p><strong>E-mail:</strong> {{ $user['email'] }}</p>
                <p><strong>Telefone:</strong> {{ $user['telefone_1'] }}</p>
                <p><strong>Curriculo:</strong> {{ $user['curriculo_lattes'] }}</p>
                <p><strong>Cargo de candidatura:</strong> 
                    @if($user['cargo_id'] == 1)
                        Estagiário de direito
                    @elseif($user['cargo_id'] == 2)
                        Assistente Administrativo
                    @elseif($user['cargo_id'] == 3)
                        Assessor Jurídico
                    @elseif($user['cargo_id'] == 4)
                        Assistente Social
                    @elseif($user['cargo_id'] == 5)
                        Psicólogo
                    @elseif($user['cargo_id'] == 6)
                        Pedagogo
                    @endif
                </p>
            </div>
            <div class="signature">
                <p>Atenciosamente,<br>Equipe de Desenvolvimento do Sistema de Inscrições</p>
            </div>
        </div>
    </div>
</body>
</html>