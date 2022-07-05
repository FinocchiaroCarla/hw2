<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Entra</title>
    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href= "<?php echo e(url('css\login.css')); ?>"/>
    <script> const BASE_URL = "<?php echo e(url('/')); ?>/"; </script>
    <script src= "<?php echo e(url('js/login.js')); ?>" defer="true"></script>
</head>

<body>
    <div id="article">
        <div class="logo">
            <img src="img/rosso.png">
        </div>

            <form name='login' method='post' enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="username">
                    <label>Nome Utente<input type="text" name="username" value='<?php echo e(old("username")); ?>'>
                    <div></div>
                    </label>
                </div>

                <div class="password">
                    <label>Password<input type="password" name="password">
                    <div></div>
                    </label>
                </div>

                <div class="submit">
                <label>
                <input type="submit" value="Entra">

                <?php if($error == 'wrong_password'): ?>
                <div>Password Errata</div>
                <?php endif; ?>
                <div></div>
                </label>
                </div>

            </form>

            <div class="signup">
                <p>Non hai ancora un account?</p>
                <a href= " <?php echo e(url('signup')); ?> ">Registrati</a>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/example-app/resources/views/login.blade.php ENDPATH**/ ?>