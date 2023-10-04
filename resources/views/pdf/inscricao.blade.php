<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>PDF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            -webkit-print-color-adjust: exact;
        }
        body {
            font-family: 'Inter', sans-serif;
            line-height: normal;
        }
    </style>
</head>
<body>
    <div class="px-10">
        <div class="py-4">
            <img class="w-44 mx-auto" src="{{ storage_path('app/public/logo-mpap.png') }}" alt="Logo">
        </div>
        <div class="py-3 flex items-center justify-center" style="background: #ADB9BD;">
            <h1 class="text-2xl font-bold text-white">
                Comprovante de Inscrição
            </h1>
        </div>
        <section>
            <div class="border-b border-black mt-2">
                <h1 class="py-1 pl-1 text-lg">
                    Candidato
                </h1>
            </div>
            <div class="flex mt-1">
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Nome
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['nome'] }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Endereço
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['nome_rua'] }}, {{$user['numero_rua']}}
                        </p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            CPF
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['cpf'] }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Email
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['email'] }}
                        </p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Telefone
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['telefone_1'] }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Curriculo Lattes
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $user['curriculo_lattes'] }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="border-b border-black mt-2">
                <h1 class="py-1 pl-1 text-lg">
                    Inscrição
                </h1>
            </div>
            <div class="flex mt-1">
                <div class="w-full flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Concurso
                        </h1>
                        <p class="text-base font-semibold text-black">
                            Processo seletivo Centro de Atendimento às Vítimas Nós Pertencemos do 
                            Ministério Público do Estado do Amapá (CAVINP/MP-AP)
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex mt-1">
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Cargo
                        </h1>
                        <p class="text-base font-semibold text-black">
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
                </div>
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Data de inscrição
                        </h1>
                        <p class="text-base font-semibold text-black">
                            28/09/2021 - 10:00
                        </p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="mt-1 text-xs" style="color: #303030;">
                            Código de inscrição
                        </h1>
                        <p class="text-base font-semibold text-black">
                            {{ $codigo}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>