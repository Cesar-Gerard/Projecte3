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
                zone_recupera_contrasenya: "<?php echo e(route('user.recupera_password')); ?>",
            }
        };
    </script>

  <script src="<?php echo e(asset('js/third_party/font-awesome.js')); ?>"></script>
  <script src="<?php echo e(asset('js/forget_password.js')); ?>"></script>
  <script src="<?php echo e(asset('js/third_party/jquery-3.6.4.js')); ?>"></script>
  <script src="<?php echo e(asset('js/third_party/sweet-alert.js')); ?>"></script>
  
  <link rel="stylesheet" href="<?php echo e(asset("css/login.css")); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('js/third_party/animations-font_awesome.min.css')); ?>" />
  

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">
        <p class="title">Contrasenya oblidada</p>
        <div class="errors" id="errors" style="display:none;">
            <span>Email</span>
        </div>
        
        <img src="<?php echo e(asset('img/DietApp_Logo.png')); ?>" class="logo_dietapp" />

        

        <div class="form">

            <label for="email_recupera">Introdueix el teu email</label>
            <div class="form__field">
                <input type="email" name="email_recupera" id="email_recupera" placeholder="Email" class="inputs">
                <br/>
                <span class="mail_err" id="mail_err"></span>
            </div>

            

            <div class="form__field ">
                <button id="btn_recupera_pw" class="button-3 disabled" disabled ><i class="fa-solid fa-envelope fa-beat"></i> Envia</button>
            </div>

        </div>

        <p><a href="<?php echo e(route('index')); ?>" class="pw_oblidada">Inicia sessió</a></p>
        <!--<span><i class="fa fa-spinner faa-spin animated faa-fast fa-xl loading_color"></i></span>-->

    </div>

  </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/forget_password.blade.php ENDPATH**/ ?>