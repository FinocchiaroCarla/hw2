<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registrati</title>
    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" <?php echo e(url('css\signup.css')); ?>"/>
    <script> const BASE_URL = "<?php echo e(url('/')); ?>/"; </script>
    <script src= "<?php echo e(url('js/signup.js')); ?>" defer="true"></script>
</head>
<body>

    <article>

    <div id="left">

        <div id="logo">
            <img src="img/rosso.png">
        </div>

        <div id="pres">
            <div class="chiave">
                <div></div>
                <p>Accedi al nostro mondo</p>
            </div>
            <div class="cuore">
                <div></div>
                <p>Salva i contenuti che ami</p>
            </div>
            <div class="domanda">
                <div></div>
                <p>Chiedi tutto ciò che vuoi</p>
            </div>
        </div>
    </div>  

    <div id="right">
        <div class="up">
        <img src="<?php echo e(url('img/rosso.png')); ?>">
        <div class="title">PRESENTATI</div>
        </div>
            <form name='submit' method='post' autocomplete="off">

            <?php echo csrf_field(); ?>

            <div class=uno>
                <div class="name">
                    <label>Nome<input type="text" name="name" value='<?php echo e(old("name")); ?>'>
                    <span></span>
                    </label>
                </div>

                <div class="surname">
                    <label>Cognome<input type="text" name="surname" value='<?php echo e(old("surname")); ?>'>
                    <span></span>
                    </label>
                </div>
            </div>

            <div class="email">
                <label>E-mail<input type="text" name="email" value='<?php echo e(old("email")); ?>'>
                <span></span>
                </label>
            </div>

            <div class="username">
                <label>Username<input type="text" name="username" value='<?php echo e(old("username")); ?>'>
                <span></span>
                </label>
            </div>
            
            <div class="psw">
                <label>Password<input type="password" name="password">
                <span></span>
                </label>
            </div>
            
            <div class="confirm">
                <label>Conferma Password<input type="password" name="confirm_password">
                <span></span>
                </label>
            </div>
        

            <div class="submit">
                <label><input type="submit" value="Registrati" id="submit">
                <span></span>
                </label>
            </div>

            </form>

            <div class="login">
                <p>Hai già un account?</p>
                <a href="<?php echo e(url('login')); ?>">Accedi</a>
            </div>

            <!-- <?php if($error == 'empty_fields'): ?>
                <div>Campi Vuoti</div>
            <?php elseif($error == 'invalid_name'): ?>
                <div>Nome Errato</div>
            <?php elseif($error == 'invalid_surname'): ?>
                <div>Cognome Errato</div>
            <?php elseif($error == 'invalid_email'): ?>
                <div>Email Errata</div>
            <?php elseif($error == 'exist_email'): ?>
                <div>Email esiste</div>
            <?php elseif($error == 'invalid_username'): ?>
                <div>Username Errato</div>
            <?php elseif($error == 'exist_username'): ?>
                <div>Username esiste</div>
            <?php elseif($error == 'bad_password'): ?>
                <div>Password corta</div>
            <?php elseif($error == 'wrong_password'): ?>
                <div>Password sbagliata</div>
            <?php endif; ?> -->

        </div>
    </div>

    </article>  

</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/example-app/resources/views/signup.blade.php ENDPATH**/ ?>