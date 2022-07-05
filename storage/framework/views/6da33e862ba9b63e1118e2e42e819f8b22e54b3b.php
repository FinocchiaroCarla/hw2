<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href= "<?php echo e(url('css/like.css')); ?>" />
    <script> const BASE_URL = "<?php echo e(url('/')); ?>/"; </script> 
    <script src= "<?php echo e(url('js/like.js')); ?>" defer="true"></script>
</head>

<body>
<nav>
      <div id="logo">
        <img src="img/rosso.png">
      </div>
      
      <div id="links">
      <a href="<?php echo e(url('home')); ?>" id="home"></a>
      <a href="<?php echo e(url('like')); ?>" id="like"></a>
      <a href="<?php echo e(url('private')); ?>" id="user"></a>
      <a href="<?php echo e(url('logout')); ?>" id="logout"></a>
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
    <a href="<?php echo e(url('home')); ?>">HOME</a>
  </div>

  <div>
    <img src="img/like.png">
    <a href="<?php echo e(url('like')); ?>">SALVATI</a>
  </div>

  <div>
    <img src="img/user.png">
    <a href="<?php echo e(url('private')); ?>">AREA PERSONALE</a>
  </div>

  <div>
    <img src="img/logout.png">
    <a href="<?php echo e(url('logout')); ?>">LOGOUT</a>
  </div>
</div>

<article>
    <section>
        
        <div class="head">
            <div class="hi">Ciao <?php echo e($username); ?>,</div>
            <div>questi sono tutti i contenuti che ami!</div>
        </div>

        <div class="container">
            <!-- qui andranno i contenuti -->
        </div>
    </section>
</article>
</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/example-app/resources/views/like.blade.php ENDPATH**/ ?>