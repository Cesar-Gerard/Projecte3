<?php echo $__env->make('nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/diets.js')); ?>"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            zone_filtre_all_diets: "<?php echo e(route('diet.filtrar_all_diets')); ?>",
            zone_filtre_dieta: "<?php echo e(route('diet.filtrar')); ?>",
            zone_edit_dieta: "<?php echo e(route('dieta',-1234)); ?>",
            zone_delete_dieta: "<?php echo e(route('diet_delete')); ?>",

        },
        vars: {
            
        }
    };
</script>



<div class="container">

    <div class="breadcrumbs">
        <a href="<?php echo e(route('home')); ?>" class="brdcr_link">Inici</a> >
        <a href="<?php echo e(route('dietes')); ?>" class="brdcr_link brdcr_selected">Dietes</a>
    </div>

    <h1 class="d-flex justify-content-center titol">Dietes</h1>


    <button class="button-3 btn-search" id="btn_mostrar_filtre"><i class="fa-regular fa-eye-slash"></i></button> 
    <button class="button-3 btn-search" id="btn_amagar_filtre"><i class="fa-regular fa-eye"></i></button>



    <div class="row " style="margin-bottom:30px;" id="filtres_div">
        <div class="row d-flex justify-content-center" >

            
            <h3 class="d-flex justify-content-center">Filtres</h3>
            <div class="col-6" style="border:1px solid rgb(92, 91, 91);padding-top:20px;padding-bottom:20px;">
                <div class="row" style="margin-top:20px;">

                    <div class="col-6">
                        <label>Nom de la dieta</label>
                        <input type="text" placeholder="Nom de la dieta" id="cerca_nom_dieta" class="form-control" />
                    </div>

                    <div class="col-6">
                        <label>Tipus de dieta</label>
                        <select class="form-control" id="cerca_tipus_dieta">
                            <option value="-1"></option>
                            <?php $__currentLoopData = $type_diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type_diet->id_type); ?>"><?php echo e($type_diet->name_type); ?></option>
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
            <a href="<?php echo e(route('view_add_dieta')); ?>" class="button-3 mb-2" style="background-color:green;"><i class="fa-solid fa-plus"></i></a> 
        </div>
    </div>


    <?php if(count($diets)>0): ?>
        <table class="table table-bordered estils_table ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Descripció</th>
                    <th scope="col">Tipus</th>
                    <th scope="col">Calories</th>
                    <th scope="col">Nombre d'àpats</th>
                    <th scope="col">Accions</th>
                </tr>
            </thead>
            <tbody id="dietes_taula">
            <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>                                                                    
                    <td style="text-align: center" onclick="window.location.href = '<?php echo e(route('dieta',$diet->id_diet)); ?>';"><?php echo e($diet->name); ?></td>
                    <td onclick="window.location.href = '<?php echo e(route('dieta',$diet->id_diet)); ?>';"><?php echo e($diet->description); ?></td>
                    <td style="text-align: center" onclick="window.location.href = '<?php echo e(route('dieta',$diet->id_diet)); ?>';"><?php echo e($diet->name_type); ?></td>
                    <td style="text-align: center" onclick="window.location.href = '<?php echo e(route('dieta',$diet->id_diet)); ?>';"><?php echo e($diet->calories/1000); ?> kcal</td>
                    <td style="text-align: center" onclick="window.location.href = '<?php echo e(route('dieta',$diet->id_diet)); ?>';"><?php echo e($diet->number_meals); ?></td>
                    <td>
                        <a href="<?php echo e(route('dieta',$diet->id_diet)); ?>" class="button-3 btn-edit">Edita <i class="fa-solid fa-pen-to-square"></i></a>
                        <a id="delete_diet<?php echo e($diet->id_diet); ?>" onclick="f_deleteDiet('<?php echo e($diet->id_diet); ?>')" class="button-3 btn-delete">Elimina <i class="fa-solid fa-trash"></i></a>
                        <a href="<?php echo e(route('dieta', ['id' => $diet->id_diet, 'clone' => '1'])); ?>" class="button-3 btn-clone">Clonar <i class="fa-solid fa-clone"></i></a>                                                                   
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2 class="d-flex justify-content-center">No tens cap dieta creada</h2>
    <?php endif; ?>



</div><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/diets.blade.php ENDPATH**/ ?>