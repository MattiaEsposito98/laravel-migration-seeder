<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Trains')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Gochi+Hand&family=Kanit:wght@100..900&family=Pacifico&family=Playwrite+IN:wght@100..400&family=Send+Flowers&family=Share+Tech+Mono&display=swap"
        rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1 class="text-center">Tabbelone treni</h1>
    <div class="container-fluid">
        <table class="table mt-5 border">
            <thead>
                <tr class="table-info">
                    <th scope="col">Azienda</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Stazione di arrivo</th>
                    <th scope="col">Orario di Partenza</th>
                    <th scope="col">Orario di arrivo</th>
                    <th scope="col">Codice treno</th>
                    <th scope="col">Totale carrozze</th>
                    <th scope="col">In orario?</th>
                    <th scope="col">Ritardo</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td class="table-success">{{ $train['azienda'] }}</td>
                        <td class="table-success">{{ $train['stazione_di_partenza'] }}</td>
                        <td class="table-success">{{ $train['stazione_di_arrivo'] }}</td>
                        <td class="table-success">{{ $train['orario_di_partenza'] }}</td>
                        <td class="table-success">{{ $train['orario_di_arrivo'] }}</td>
                        <td class="table-success">{{ $train['totale_carozze'] }}</td>
                        <td class="table-success">{{ $train['codice_treno'] }}</td>
                        {{-- È in orario? --}}
                        <td
                            class="{{ $train->è_cancellato || $train->ritardo > 0 ? 'text-danger table-danger' : 'text-success table-success' }}">
                            {{ $train->è_cancellato || $train->ritardo > 0 ? 'No' : 'Sì' }}
                        </td>

                        {{-- Ritardo --}}
                        <td
                            class="{{ $train->ritardo > 0 && !$train->è_cancellato ? 'table-warning' : 'text-success table-success' }}">
                            {{ $train->è_cancellato ? '-' : ($train->ritardo > 0 ? $train->ritardo . ' min' : 'Nessun ritardo') }}
                        </td>

                        {{-- Cancellato --}}
                        <td class="{{ $train->è_cancellato ? 'text-danger table-danger' : 'table-success' }}">
                            {{ $train->è_cancellato ? 'Cancellato' : '' }}
                        </td>




                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</body>

</html>
