<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservou</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css">
    <link rel="icon" href="{{env('APP_URL')}}/images/icone.svg" type="image/x-icon">
</head>


<x-filament-panels::page>

<div style="display: flex; justify-content: space-between;">
    <div>
        <p>{{$court->address->street}} - {{$court->address->neighborhood}}, {{$court->address->city}} - {{$court->address->UF}}</p>
    
        <p>Valor Hora: R${{$court->hour_value}}</p>

        <form action="{{route('reserv')}}" method="POST">
            @csrf

            <div style="display: flex;">
                <p>Horário de disponíveis:</p>
        
                <select name="hours" id="">
                    <option value="">Selecione um horário</option>
                    @foreach ($court->dates as $date)
                        <option value="{{$date->id}}">{{Carbon\Carbon::parse($date->date)->format('d/m/Y H:i')}}</option>
                    @endforeach
                </select>
            </div>

            <button>Reservar</button>
        </form>

    </div>

    <img src="{{env('APP_URL') . '/storage/' . $court->image}}" alt="">
</div>

</x-filament-panels::page>
