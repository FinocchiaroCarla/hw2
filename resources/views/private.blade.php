<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/private.css') }}"/>
    <script> const BASE_URL = "{{ url('/') }}/"; </script>
    <script src="{{ url('js/private.js') }}" defer="true"></script>
</head>


<body>
    <article>
        <div class="yours">
            <div> IL TUO ACCOUNT <strong> HOT </strong> PLATE</div>
            <a href="{{ url('home') }}" class="home"></a>
        </div>

        <div class="nome">
             <p>{{ $name }}</p>
        </div>

        <div class="cognome">
        <p>{{ $surname }}</p>
        </div>


        <div class="email">
            <p>{{ $email }}</p>
            <div class="pencil" id="pencil_email"></div>
        </div>

        <div id="new_email" class="hidden">
        <form method='post'>
            @csrf
        <input type="text" name="email" placeholder="inserisci una nuova email" value='{{old("email")}}'>
        <img src="img/x.png">
        </form>
        @if($error == 'exists_email')
            <span>Email già utilizzata</span>
        @endif
        <span></span>
        </div>

        <div class="username">
            <p>{{ $username }}</p>
            <div class="pencil" id="pencil_username"></div>
        </div>

        <div id="new_username" class="hidden">
        <form method='post'>
            @csrf
        <input type="text" name="username" placeholder="inserisci un nuovo username" value='{{old("username")}}'>
        <img src="img/x.png">
        </form>
        @if($error == 'exists_username')
            <span>Username già utilizzato</span>
        @endif
        <span></span>
        </div>

        <div class="drop">
            <a href= "{{ url('drop') }}">Elimina Account</a>
        </div>

    </article>
</body>


</html>