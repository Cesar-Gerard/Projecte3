<?php echo $__env->make('nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo e(asset('js/diets_see.js')); ?>"></script>

<script>
    // global app configuration object
    var config = {
        routes: {
            zone_diet_edit: "<?php echo e(route('diet_edit')); ?>",
            zone_diet_clone: "<?php echo e(route('diet_clone')); ?>",
            zone_dishes_filtrar: "<?php echo e(route('diet.dishes_filtrar')); ?>",
        },
        vars: {
            id_dieta: "<?php echo e($diet->id_diet); ?>"
        }
    };
</script>



<div class="container">

    <div class="breadcrumbs">
        <a href="<?php echo e(route('home')); ?>" class="brdcr_link">Inici</a> >
        <a href="<?php echo e(route('dietes')); ?>" class="brdcr_link">Dietes</a> >
        <a href="" class="brdcr_link brdcr_selected">Pacient</a>
    </div>

    <br/>

    <?php if($clone==1): ?>
        <h1>Clonar: <?php echo e($diet->name); ?></h1>
    <?php else: ?>
        <h1><?php echo e($diet->name); ?></h1>
    <?php endif; ?>
   








    <br/><br/>
    <h2>Dades bàsiques</h2>
    <div class="row form_border">

        <div class="col-6">
            <label for="dieta_nom">Nom de la dieta</label>
            <input type="text" value="<?php echo e($diet->name); ?>" placeholder="Nom de la dieta" id="dieta_nom" class="form-control" required/>
        </div>
        
        <div class="col-6">
            <label>Tipus de dieta</label>
            <select id="dieta_tipus" class="form-control">
                <option value="-1"></option>
                <?php $__currentLoopData = $tipus_dietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_dieta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($type_dieta->id_type == $diet->type_diet): ?>
                        <option value="<?php echo e($type_dieta->id_type); ?>" selected><?php echo e($type_dieta->name_type); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($type_dieta->id_type); ?>"><?php echo e($type_dieta->name_type); ?></option>
                    <?php endif; ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="col-6">
            <span id="sp_nom_error" style="color:red;display:none;" >El nom de la dieta és obligatori</span>
        </div>
        <div class="col-6"></div>
        
        <div class="col-12">&nbsp;</div>

        <div class="col-12">
            <label>Descripció</label>
            <textarea id="dieta_descripcion" class="form-control" rows="4" required><?php echo e($diet->description); ?></textarea>
        </div>
        <div class="col-12">
            <span id="sp_descripcio_error" style="color:red;display:none;">La descripció de la dieta és obligatòria</span>
        </div>

        <div class="col-12">&nbsp;</div>

        <div class="col-6">
            <label>Total calories</label>
            <input type="text" id="dieta_calories" class="form-control" value="<?php echo e($diet->calories/1000); ?> kcal" disabled/>
        </div>

    </div>

    <br/><br/>

    <div id="diets_dishes">
        <div class="row">
            <div class="col-10">

                <h2>Dies de la setmana</h2>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dilluns
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dimarts
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dimecres
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Dijous
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        Divendres
                    </div>
                </div>
        
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Esmorzar
                    </div>
                    
                    

                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div id="esmorzar-<?php echo e($i); ?>" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            <?php $__currentLoopData = $diets_dishes_esmorzars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dde): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if($dde->week_day == $i): ?>
                                    
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-<?php echo e($dde->dish_id_dish); ?>">
                                        <img src="<?php echo e(asset('img/Icons/'.$dde->image_dish.'')); ?>" class="dish_etiqueta"/>
                                            <?php echo e($dde->name_dish); ?>

                                    </div>
                                
                                <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        </div>
                    <?php endfor; ?>

                </div>
        
                
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Dinar
                    </div>
        
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div id="dinar-<?php echo e($i); ?>" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            <?php $__currentLoopData = $diets_dishes_dinar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ddd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($ddd->week_day == $i): ?>
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-<?php echo e($ddd->dish_id_dish); ?>">
                                        <img src="<?php echo e(asset('img/Icons/'.$ddd->image_dish.'')); ?>" class="dish_etiqueta"/>
                                        <?php echo e($ddd->name_dish); ?>

                                    </div>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endfor; ?>
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Berenar
                    </div>
        
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div id="berenar-<?php echo e($i); ?>" class="col-2 requadre_cela cela_ocupada stackDrop1">
                            
                            <?php $__currentLoopData = $diets_dishes_berenar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ddb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($ddb->week_day == $i): ?>
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-<?php echo e($ddb->dish_id_dish); ?>">
                                        <img src="<?php echo e(asset('img/Icons/'.$ddb->image_dish.'')); ?>" class="dish_etiqueta"/>
                                        <?php echo e($ddb->name_dish); ?>

                                    </div>
                                <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endfor; ?>
                </div>

                
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Sopar
                    </div>
        
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div id="sopar-<?php echo e($i); ?>" class="col-2 requadre_cela cela_ocupada stackDrop1">

                            <?php $__currentLoopData = $diets_dishes_sopar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($dds->week_day == $i): ?>
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-<?php echo e($dds->dish_id_dish); ?>">
                                        <img src="<?php echo e(asset('img/Icons/'.$dds->image_dish.'')); ?>" class="dish_etiqueta"/>
                                        <?php echo e($dds->name_dish); ?>

                                    </div>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endfor; ?>
                </div>
        
                <div class="row">
                    <div class="col-1 requadre_cela requadre_apat d-flex align-items-center" >
                        Mig dia
                    </div>
        
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <div id="migdia-<?php echo e($i); ?>" class="col-2 requadre_cela cela_ocupada stackDrop1">
                            <?php $__currentLoopData = $diets_dishes_migmati; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ddm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($ddm->week_day == $i): ?>
                                    <div class="card ui-draggable ui-draggable-handle" id="dish-<?php echo e($ddm->dish_id_dish); ?>">
                                        <img src="<?php echo e(asset('img/Icons/'.$ddm->image_dish.'')); ?>" class="dish_etiqueta"/>
                                        <?php echo e($ddm->name_dish); ?>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endfor; ?>
        
        
                </div>

            

            </div>

            <div class="col-2 form_border" style="overflow:scroll;" id="scroll">
                <h2>Plats</h2>
                <hr/>
                <input type="text" id="dishes_text" placeholder="Busca els plats" class="form-control"/>
                <br/>
                <div id="launchPad">    

           
                    <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                        <div class="card" id="dish-<?php echo e($dish->id_dishes); ?>">
                            <img src="<?php echo e(asset('img/Icons/'.$dish->image_dish.'')); ?>" class="dish_etiqueta"/>
                            <?php echo e($dish->name_dish); ?>

                        </div> 

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                   
                </div>
            </div>

        </div>
    
        

        

    </div>


    <br/><br/>

    <div class="row">
        <div class="col-12 d-flex justify-content-center" >
            <?php if($clone==1): ?>
                <button id="clone-dieta" class="button-3 btn-search">Clonar dieta</button> 
                  
            <?php else: ?>
                <button id="edita-dieta" class="button-3 btn-search">Edita dieta</button>
            <?php endif; ?>          
        </div>
    </div>
    <button id="prova" class="button-3 btn-search " style="display:none;">Prova</button>


    <div style="marin-top:100px;">
    
    </div>


</div><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/diet_see.blade.php ENDPATH**/ ?>