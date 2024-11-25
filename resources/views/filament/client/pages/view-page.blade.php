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
    <div class="view-details">
        <p class="align-data"><svg width="30px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
            <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
          </svg>
           Endereço: {{$court->address->street}} - {{$court->address->neighborhood}}, {{$court->address->city}} - {{$court->address->UF}}</p>
    
        <p class="align-data"><svg width="30px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
            <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Valor/hora: R${{$court->hour_value}}</p>

        <form action="{{route('reserv')}}" method="POST" class="view-details">
            @csrf

            <div style="display: flex;
            align-items: center;
            gap: 10px;">
                <p class="align-data"> <svg  width="30px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  Horários disponíveis:</p>
        
                <select name="hours" id="" class="select-time">
                    @foreach ($court->dates as $date)
                        <option value="{{$date->id}}">{{Carbon\Carbon::parse($date->date)->format('d/m/Y H:i')}}</option>
                    @endforeach
                </select>
            </div>

            <div class="width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;" style="
    display: flex;
    justify-content: center;
">
                <button class="button">Reservar</button>
            </div>
            
            {{-- <button>Reservar</button> --}}
        </form>

    </div>

    <img class="quadra-imagem" src="{{env('APP_URL') . '/storage/' . $court->image}}" alt="">
</div>

</x-filament-panels::page>
