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
        }

        .logo{
            text-align: center;
            margin-bottom: 13px;
        }

        .logo img {
            width: 175px;
            display: block;
            margin: 0 auto;
        }

        .comprovante{
            text-align: center;
            padding: 5px;
            background-color: #ADB9BD;
        }

        .comprovante h1{
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }

        .info-section{
            padding-left: 3px;
            padding-top: 10px
            border-bottom: 1px solid #000000;
            display: flex;
        }

        .section-title{
            font-size: 20px;
            margin-bottom: auto;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div>
        <div class="logo">
            <img src="{{ storage_path('app/public/logo-mpap.png') }}" alt="Logo">
        </div>
        <div class="comprovante">
            <h1>
                Comprovante de inscrição
            </h1>
        </div>
        <section class="info-section">
            <div class="section-title">
                Candidato
            </div>
            
        </section>
        <div>
            <div>
                <h1>Olá, {{ $user['nome'] }}!</h1>
                <p>Seu cadastro foi realizado com sucesso! Seu código de inscrição é:</p>
                <h2>{{ $codigo }}</h2>
            </div>
            <div>
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
            <div>
                <p>Atenciosamente,<br>Equipe de Desenvolvimento do Sistema de Inscrições</p>
            </div>
        </div>
    </div>
</body>
</html>