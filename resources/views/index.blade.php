<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservou</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css">
</head>

<body class="body-style">
    <article class="color-header">
        <header class="header-style">
            <img src="{{env('APP_URL')}}/images/logo.svg" alt="tag">

            <div class="navbar">
                <select name="city" id="city">
                    <option value="1">Cocal do Sul</option>
                    <option value="2">Criciúma</option>
                </select>
                <a href="#">Quadras</a>
                <a href="#">Minhas reservas</a>
                <div>Sair</div>
            </div>
        </header>
        <main>
            <header class="section-header">
                <section class="section-header-right">
                    <div class="header-info">
                        <div class="message-header"
                            <span class="title-header">Reservou</span>, a melhor escolha para reservas de quadras esportivas
                        </div>
                        <button type="button" class="button">Ver quadras disponíveis</button>
                    </div>
                    <div class="cards">
                        <div class="card-info">
                            <img src="{{env('APP_URL')}}/images/pin.svg" alt="tag">
                            <p>
                                Desde 2024 estimulando a prática de esportes
                            </p>
                        </div>
                        <div class="card-info">
                            <img src="{{env('APP_URL')}}/images/group.svg" alt="tag">
                            <p>
                                + de 50 quadras disponíveis
                            </p>
                        </div>
                    </div>
                </section>
                <img width="500" height="800" src="{{env('APP_URL')}}/images/inicio.svg" alt="tag">
            </header>
        </main>
    </article>
    <article class="list">
        <div class="item-list"></div>
        <div class="item-list"></div>
        <div class="item-list"></div>
    </article>

    <footer></footer>
</body>

</html>