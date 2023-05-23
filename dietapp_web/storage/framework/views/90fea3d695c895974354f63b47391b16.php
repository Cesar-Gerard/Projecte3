<?php echo $__env->make('nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script src="<?php echo e(asset('js/pacients.js')); ?>"></script>

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
    </script>

    <div class="container">

        <div class="breadcrumbs">
            <a href="<?php echo e(route('home')); ?>" class="brdcr_link">Inici</a> >
            <a href="<?php echo e(route('pacients')); ?>" class="brdcr_link brdcr_selected">Pacients</a>
        </div>

        <h1 class="d-flex justify-content-center titol">Pacients</h1>

        <button class="button-3 btn-search" id="btn_mostrar_filtre"><i class="fa-regular fa-eye-slash"></i></button> 
        <button class="button-3 btn-search" id="btn_amagar_filtre"><i class="fa-regular fa-eye"></i></button>


        <div class="row " style="margin-bottom:30px;" id="filtres_div">
            <div class="row d-flex justify-content-center" >

                
                <h3 class="d-flex justify-content-center">Filtres</h3>
                <div class="col-6" style="border:1px solid rgb(92, 91, 91);padding-top:20px;padding-bottom:20px;">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-6">
                            <label>Nom del pacient</label>
                            <input type="text" placeholder="Nom del pacient" id="cerca_nom_pacient" class="form-control" />
                        </div>
                        <div class="col-6">
                            <label>Cognom del pacient</label>
                            <input type="text" placeholder="Cognoms del pacient" id="cerca_cognom_pacient" class="form-control" />
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-6">
                            <label>Tipus de dieta</label>
                            <select class="form-control" id="cerca_tipus_dietes">
                                <option value="-1"></option>
                                <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($diet->id_diet); ?>"><?php echo e($diet->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-12 d-flex ">
                            <div class="col-6">
                                <button id="cerca_search" class="button-3 btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>

                            <div class="col-6 d-flex justify-content-end">
                                <button id="cerca_neteja_filtres" class="button-3 btn-search"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            
                        </div>


                    </div>
                    
                    
                </div>
            
            </div>

        </div>
        


        <div class="row">
            <div class="col-2">
                <a href="<?php echo e(route('view_add_pacient')); ?>" class="button-3 mb-2" style="background-color:green;"><i class="fa-solid fa-user-plus"></i></a> 
            </div>
        </div>

        <?php if(count($pacients)>0): ?>
            <table class="table table-bordered estils_table ">
                <thead>
                <tr>
                    <th scope="col">Pacient</th>
                    <th scope="col">Telèfon</th>
                    <th scope="col">Adreça</th>
                    <th scope="col">Dieta Actual</th>
                    <th scope="col">Accions</th>
                </tr>
                </thead>
                <tbody id="pacients_taula">
                <?php $__currentLoopData = $pacients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pacient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    <tr onclick="window.location.href = '<?php echo e(route('pacient',$pacient->id)); ?>';">
                        <td><?php echo e($pacient->name_user); ?> <?php echo e($pacient->lastname_user); ?></td>
                        <td><?php echo e($pacient->phone_patient); ?></td>
                        <td><?php echo e($pacient->address_patient); ?></td>
                        <td><?php if($pacient->name != null): ?> <?php echo e($pacient->name); ?> <?php else: ?> Sense dieta assignada <?php endif; ?></td>
                        <td>
                            
                            <a href="<?php echo e(route('pacient_edit',$pacient->id)); ?>" class="button-3 btn-edit"><i class="fa-solid fa-user-pen"></i></a>
                            <!--<a href="" class="button-3 btn-delete"><i class="fa-solid fa-user-slash"></i></a>-->
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <h2 class="d-flex justify-content-center">No tens cap pacient assignat</h2>

        <?php endif; ?>

        

    </div>



    </div>

      
    
</body>
</html><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/pacients.blade.php ENDPATH**/ ?>