<?php echo $__env->make('nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     
  
  <script src="<?php echo e(asset('js/third_party/just-validate.production.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/home.js')); ?>"></script>
  <script src="<?php echo e(asset('js/third_party/canvas.js')); ?>"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script>
    // global app configuration object
    var config = {
        routes: {
            zone_filtre_pacient: "<?php echo e(route('pacient.filtrar_pacient')); ?>",
            zone_filtre_all_pacients: "<?php echo e(route('pacient.filtrar_all_pacients')); ?>",
            zone_edit_pacient: "<?php echo e(route('pacient',-1234)); ?>",
        },
        vars: {
            nutricionist: "<?php echo e(Auth::user()->id); ?>",
        }
    };

    let data_points_diets = [];
  
  </script>

  <div class="container">

  </div>

  <?php $__currentLoopData = $dietes_seguides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <script>
      data_points_diets.push("<?php echo e(json_encode($ds)); ?>");
    </script>


  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <h1 style="margin-left:10px;">Benvingut, <?php echo e(Auth::user()->name_user); ?></h1>



  <div id="chartContainer" style="height: 300px; width: 100%;"></div>

  <br/>
  <div class="d-flex justify-content-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
      Més informació
    </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dietes assignades</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-2"></div>
              <div class="col-8">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Pacient</th>
                      <th scope="col">Dieta actual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $dietes_seguides_noms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        <th scope="row"><?php echo e($dsn->name_user); ?> <?php echo e($dsn->lastname_user); ?></th>
                        <td><?php if(strlen($dsn->name)==0): ?> Sense dieta assignada <?php else: ?> <?php echo e($dsn->name); ?> <?php endif; ?></td>
                      </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <div class="col-2"></div>
          </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tanca</button>
        </div>
      </div>
    </div>
  </div>

  <br/><br/>
  <h2 class="d-flex justify-content-center">Últimes dietes assignades</h2>

  <div class="container table-responsive py-5">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Pacient</th>
          <th scope="col">Dieta</th>
          <th scope="col">Data de canvi</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $dietes_inicialitzades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $di): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th scope="row"><?php echo e($di->name_user); ?> <?php echo e($di->lastname_user); ?></th>
            <td><?php echo e($di->name); ?></td>
            <td><?php echo e(date("d/m/Y", strtotime($di->start_date))); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </tbody>
    </table>
  </div>

      
    
</body>
</html><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/home.blade.php ENDPATH**/ ?>