<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>DietApp</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_login: "<?php echo e(route('user.login')); ?>",
                zone_home: "<?php echo e(route('home')); ?>"
            }
        };
    </script>

  <script src="<?php echo e(asset('js/third_party/font-awesome.js')); ?>"></script>
  <script src="<?php echo e(asset('js/login.js')); ?>"></script>
  <script src="<?php echo e(asset('js/third_party/jquery-3.6.4.js')); ?>"></script>
  <script src="<?php echo e(asset('js/third_party/sweet-alert.js')); ?>"></script>
  
  <link rel="stylesheet" href="<?php echo e(asset("css/login.css")); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('js/third_party/animations-font_awesome.min.css')); ?>" />
  

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">

        <div class="errors" id="errors" style="display:none;">
            <span>Usuari o contrasenya incorrecte</span>
        </div>
        
        <img src="<?php echo e(asset('img/DietApp_Logo.png')); ?>" class="logo_dietapp" />

        <!--<h2>DietApp</h2>-->

        <div class="form">

            <div class="form__field">
                <input type="text" name="username" id="username" placeholder="Usuari" class="inputs">
                <span id="" style="visibility: hidden;"><i class="fa-solid fa-eye see_password"></i></span>
            </div>

            <div class="form__field">
                <input type="password" name="password" id="password" placeholder="Contrasenya" class="inputs">
                <span id="see_password"><i class="fa-solid fa-eye see_password"></i></span>
            </div>

            <div class="form__field space">
                
                <button id="login" class="button-3 disabled" disabled ><i class="fa-solid fa-right-to-bracket"></i> Inicia sessió</button>
            </div>

        </div>

        <p><a href="<?php echo e(route('forget_password')); ?>" class="pw_oblidada">He oblidat la meva contrasenya</a></p>

    </div>

  </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/index.blade.php ENDPATH**/ ?>