<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href= "{{ url('css/like.css') }}" />
    <script> const BASE_URL = "{{ url('/') }}/"; </script> 
    <script src= "{{ url('js/like.js') }}" defer="true"></script>
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

<article>
    <section>
        
        <div class="head">
            <div class="hi">Ciao {{ $username }},</div>
            <div>questi sono tutti i contenuti che ami!</div>
        </div>

        <div class="container">
            <!-- qui andranno i contenuti -->
        </div>
    </section>
</article>
</body>

</html>