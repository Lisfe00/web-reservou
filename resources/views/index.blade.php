<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservou</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .body-style {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            background-color: #FAFAFA;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .header-style {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar {
            display: flex;
            gap: 80px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
        }

        .section-header-right {
            display: flex;
            flex-direction: column;
            gap: 200px;
        }

        .cards {
            display: flex;
            gap: 150px;
            justify-content: right;
        }

        .message-header {
            font-size: 50px;
            font-weight: bold;
            color: #545454;
            width: 50vw;
        }

        .title-header {
            font-size: 50px;
            font-weight: bold;

            color: #A78464;
        }

        .header-info {
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        .button {
            background-color: #A78464;
            color: white;
            font-size: 20px;
            padding: 15px 20px;
            border-radius: 15px;
            border: none;
            width: 300px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>

<body class="body-style">
    <header class="header-style">
        <img src="{{ asset('/public/logo.svg') }}" alt="tag">

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
                        <span class="title-header">Reservou</span>, a melhor escolha para reservas de quadras esp⚽rtivas
                    </div>
                    <button type="button" class="button">Ver quadras disponíveis</button>
                </div>
                <div class="cards">
                    <div class="card-info">
                        <span>icone</span>
                        <p>
                            Desde 2024 estimulando a prática de esportes
                        </p>
                    </div>
                    <div class="card-info">
                        <span>icone</span>
                        <p>
                            + de 50 quadras disponíveis
                        </p>
                    </div>
                </div>
            </section>
            <section>
                imagemmmmm
            </section>
        </header>
    </main>
    <footer></footer>
</body>

</html>