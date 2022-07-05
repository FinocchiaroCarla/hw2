<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href= "{{ url('css/home.css') }}" />
    <script> const BASE_URL = "{{ url('/') }}/"; </script> 
    <script src="{{ url('js/home.js') }}" defer="true"></script>
</head>

<body>
<nav>
      <div id="logo">
        <img src="img/rosso.png">
      </div>
      
      <div id="links">
      <a href="{{ url('home') }}" id="home"></a>
      <a href="{{ url('like') }}" id="like"></a>
      <a href="{{ url('private') }}" id="user"></a>
      <a href="{{ url('logout') }}" id="logout"></a>
      </div>

      <div id="menu">
        <div></div>
        <div></div>
        <div></div>
      </div>

</nav>

<div id="modal_link">
  <div>
    <img src="img/home.png">
    <a href="{{ url('home') }}">HOME</a>
  </div>

  <div>
    <img src="img/like.png">
    <a href="{{ url('like') }}">SALVATI</a>
  </div>

  <div>
    <img src="img/user.png">
    <a href="{{ url('private') }}">AREA PERSONALE</a>
  </div>

  <div>
    <img src="img/logout.png">
    <a href="{{ url('logout') }}">LOGOUT</a>
  </div>
</div>



  <header>
    <h1> Benvenuto, {{ $username }} !</h1>
  </header>

  <article>
    <section>
    <div class="cerca_ricette">
    <form autocomplete="off">
        <img src="img/lente1.png">
        <input type="text" name="search" id="searchbox" placeholder="CERCA RICETTE">
      </form>
    </div>

    <p>....................................................................................................</p>

    <div class="container">
      <!-- qui andranno i contenuti -->
    </div>
    <p>....................................................................................................</p>
  </section>

  <!-- modale -->
  <section id="modal" class="hidden">
      <div class="all">

        <div class="bar">
          <div class="esc">
            <img src="img/x.png">
          </div>
        </div>

        <div class="paragraph">
          <div class="body">
          <!-- qui andrà il contenuto -->
          </div>

          <div class="salva">
            <form method="post">
            <input type="submit" value="SALVA">
            </form>
          </div>
          <div id="success" class="hidden">POST SALVATO CON SUCCESSO!</div>
          <div id="fail" class="hidden">OPS, ABBIAMO UN PROBLEMA</div>
        </div>

      </div>

    </section>
  </article>
    <footer>
    <div class="social">

        <div>Condividi questa pagina con i tuoi amici!</div>

        <div class=linkss>
          <img src="img/instagram.png">
          <img src="img/facebook.png">
          <img src="img/twitter.png">
          <img src="img/mail.png">
        </div>

      </div>
    </footer>
    </body>
</html>