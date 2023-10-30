<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>PDF</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
        padding: 20px;
      }

      .clearfix {
        clear: both;
      }

      #caixa-logo {
        padding-top: 1rem;
        padding-bottom: 1rem;
      }

      #logo {
        width: 11rem;
      }

      #caixa-titulo {
        background-color: #adb9bd;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
      }

      #titulo {
        font-size: 1.5rem;
        line-height: 2rem;
        font-weight: 700;
        color: #fff;
      }

      #caixa-subtitulo {
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-color: #000;
        margin-top: 0.5rem;
        text-align: left;
      }

      #subtitulo {
        font-size: 1.125rem;
        line-height: 1.75rem;
        font-weight: 400;
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        padding-left: 0.25rem;
      }

      #container {
        width: 100%;
      }

      .caixa-info {
        width: 32%;
        margin: 5px;
        float: left;
        text-align: left;
      }

      .campo-info{
        margin-top: 0.25rem;
        font-size: 0.75rem;
        font-style: normal;
        font-weight: 400;
        line-height: 1rem;
        color: #303030;
      }

      .info {
        font-size: 1rem/* 16px */;
        line-height: 1.5rem/* 24px */;
        font-weight: 600;
        color: #000
      }
    </style>
</head>
<body>
  <div id="caixa-logo">
    <img id="logo" src="https://www.mpap.mp.br/templates/portal/images/logo-mpap.png" alt="Logo">
  </div>
  <div id="caixa-titulo">
    <h1 id="titulo">
      Comprovante de Inscrição
    </h1>
  </div>

  <section>
    <div id="caixa-subtitulo">
      <h2 id="subtitulo">
        Candidato
      </h2>
    </div>
    <div id="container">
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Nome
          </h1>
          <p class="info" class="text-base font-semibold text-black">
              {{ $user['nome'] }}
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            CPF
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $user['cpf'] }}
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Telefone
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $user['telefone_1'] }}
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div id="container">
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Endereço
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $user['nome_rua'] }}, {{$user['numero_rua']}}
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Email
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $user['email'] }}
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Curriculo Lattes
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $user['curriculo_lattes'] }}
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
  
  <section>
    <div id="caixa-subtitulo">
      <h2 id="subtitulo">
        Inscrição
      </h2>
    </div>
    <div id="container">
      <div class="caixa-info" style="width: 100%">
        <div>
          <h1 class="campo-info">
            Processo seletivo
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            Processo seletivo simplificado para contratação por tempo determinado de equipe multidisciplinar para o Centro de Atendimento às Vítimas (CAVINP)
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div id="container">
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Cargo
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            @if($user['cargo_id'] == 1)
                Estagiário de Direito - CAVINP
            @elseif($user['cargo_id'] == 2)
                Assistente Administrativo - CAVINP
            @elseif($user['cargo_id'] == 3)
                Assessor Jurídico - CAVINP
            @elseif($user['cargo_id'] == 4)
                Assistente Social - CAVINP
            @elseif($user['cargo_id'] == 5)
                Pedagogo(a) - CAVINP
            @elseif($user['cargo_id'] == 6)
                Psicólogo(a) - CAVINP
            @endif
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Data de inscrição
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $created_at->format('d/m/Y - H:i') }}
          </p>
        </div>
      </div>
      <div class="caixa-info">
        <div>
          <h1 class="campo-info">
            Código de inscrição
          </h1>
          <p class="info" class="text-base font-semibold text-black">
            {{ $codigo }}
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
</body>
</html>
