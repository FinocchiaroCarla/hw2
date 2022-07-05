<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&family=Indie+Flower&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css/private.css')); ?>"/>
    <script> const BASE_URL = "<?php echo e(url('/')); ?>/"; </script>
    <script src="<?php echo e(url('js/private.js')); ?>" defer="true"></script>
</head>


<body>
    <article>
        <div class="yours">
            <div> IL TUO ACCOUNT <strong> HOT </strong> PLATE</div>
            <a href="<?php echo e(url('home')); ?>" class="home"></a>
        </div>

        <div class="nome">
             <p><?php echo e($name); ?></p>
        </div>

        <div class="cognome">
        <p><?php echo e($surname); ?></p>
        </div>


        <div class="email">
            <p><?php echo e($email); ?></p>
            <div class="pencil" id="pencil_email"></div>
        </div>

        <div id="new_email" class="hidden">
        <form method='post'>
            <?php echo csrf_field(); ?>
        <input type="text" name="email" placeholder="inserisci una nuova email" value='<?php echo e(old("email")); ?>'>
        <img src="img/x.png">
        </form>
        <?php if($error == 'exists_email'): ?>
            <span>Email già utilizzata</span>
        <?php endif; ?>
        <span></span>
        </div>

        <div class="username">
            <p><?php echo e($username); ?></p>
            <div class="pencil" id="pencil_username"></div>
        </div>

        <div id="new_username" class="hidden">
        <form method='post'>
            <?php echo csrf_field(); ?>
        <input type="text" name="username" placeholder="inserisci un nuovo username" value='<?php echo e(old("username")); ?>'>
        <img src="img/x.png">
        </form>
        <?php if($error == 'exists_username'): ?>
            <span>Username già utilizzato</span>
        <?php endif; ?>
        <span></span>
        </div>

        <div class="drop">
            <a href= "<?php echo e(url('drop')); ?>">Elimina Account</a>
        </div>

    </article>
</body>


</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/example-app/resources/views/private.blade.php ENDPATH**/ ?>