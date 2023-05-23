<?php echo $__env->make('nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js/third_party/just-validate.production.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pacient_see.js')); ?>"></script>
    <script src="<?php echo e(asset('js/third_party/canvas.js')); ?>"></script>

    <script>
        // global app configuration object
        var config = {
            routes: {
                zone_afegir_pacient: "<?php echo e(route('pacient.add')); ?>",
                zone_pacients: "<?php echo e(route('pacients')); ?>",
                //zone_canvia_dieta: " route('canvia_dieta') ",
            },
            vars: {
                nutricionist: "<?php echo e(Auth::user()->id); ?>",
                data_points: "<?php echo e(json_encode($grafic_progres_actual)); ?>",
                pacient: "<?php echo e($pacient->id_pacient); ?>",
            }
        };


        let data_points_historics = [];
        let data_points_historics_chest = [];
        let data_points_historics_leg = [];
        let data_points_historics_arm = [];
        let data_points_historics_hip = [];
    </script>

    

   

    <div class="container">

        <div class="breadcrumbs">
            <a href="<?php echo e(route('home')); ?>" class="brdcr_link">Inici</a> >
            <a href="<?php echo e(route('pacients')); ?>" class="brdcr_link">Pacients</a> >
            <a href="" class="brdcr_link brdcr_selected">Pacient</a>
        </div>

        <br/>

        <h1><?php echo e($pacient->name_user); ?> <?php echo e($pacient->lastname_user); ?></h1>



        <div class="form_border">

            <div class="row form-group">
                <div class="col-6">
                    <label for="pacient_email"><i class="fa-solid fa-envelope"></i></label>
                    <span><?php echo e($pacient->email_patient); ?></span>
                </div>

                <div class="col-6">
                    <label for="pacient_phone"><i class="fa-solid fa-phone"></i></label>
                    <span><?php echo e($pacient->phone_patient); ?></span>
                </div>

            </div>
            <br/>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <div class="container">

            <!-- Button to trigger modal -->
            
             
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Canvi de dieta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background-color:white !important;border:3px solid white !important;">x</button>
                            
                        </div>
                        <div class="modal-body">

                            

                            <?php $__currentLoopData = $dietes_no_assignades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dietes_no_assignades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <input type="radio" id="d-<?php echo e($dietes_no_assignades->id_diet); ?>" name="radio" value="<?php echo e($dietes_no_assignades->id_diet); ?>" /> <?php echo e($dietes_no_assignades->name); ?> 
                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           
                        

                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Tanca</button>-->
                            <button type="button" class="btn btn-primary" id="canvia_dieta" disabled>Canvia dieta</button>
                        </div>
                    </div>
                </div>
            </div>
              
              
        </div>


        <?php if($current_diet!=null): ?>
            <br/><br/>
            <div class="row">
                <div class="col-2">
                    <h2>Dieta actual</h2>
                </div>
               
                <div class="col-3">
                    <a href="#myModal" class="btn btn-primary" data-toggle="modal">Canvia de dieta</a>
                </div>
                
                
                
            </div>
            
            <hr/>

            <button class="collapsible"><h2><?php echo e($current_diet->name); ?></h2></button>
            <div class="content">
                <br/>
                <div class="row">
                    <div class="col-9">
                        <p><?php echo e($current_diet->description); ?></p>
                    </div>
                    <div class="col-3 d-flex justify-content-end" >
                        <b><?php echo e($current_diet->calories/1000); ?> kcal</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        Tipus de dieta: <?php echo e($type_diet->name_type); ?>

                    </div>
                </div>

                <br/><br/>
                <div id="chartContainer_historic_actual" style="height: 370px; width: 100%;"></div>
                
                <br/>
            </div>
            
        <?php endif; ?>



        
       
        <?php 
        
    ?>


        

        <br/>
        <h2>Dietes acabades</h2>

        <div id="dietes_acabades">
            
            <?php $i=0;
                //var_dump($dietes_acabades[0]['historial']);die();
            ?>
            <?php $__currentLoopData = $dietes_acabades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dieta_acabada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                
                <button class="collapsible"><h2><?php echo e($dieta_acabada['dieta']->name); ?></h2></button>
                <div class="content">
                    <br/>
                    <div class="row">
                        <div class="col-9">
                            <p><?php echo e($dieta_acabada['dieta']->description); ?></p>
                        </div>
                        <div class="col-3 d-flex justify-content-end" >
                            <b><?php echo e($dieta_acabada['dieta']->calories/1000); ?> kcal</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            Tipus de dieta: <?php echo e($dieta_acabada['dieta']->name_type); ?>

                        </div>
                    </div>

                    <br/><br/>
                    <div id="chartContainer_historic_acabat<?php echo e($i); ?>" style="height: 370px; width: 100%;"></div>
                    <br/><br/><br/>
                    <div id="chartContainer_historic_acabat_body<?php echo e($i); ?>" style="height: 370px; width: 100%;"></div>

                    <br/><br/><br/>
                </div>

                <script>
                    data_points_historics.push("<?php echo e(json_encode($dieta_acabada['historial'])); ?>");
                    data_points_historics_chest.push("<?php echo e(json_encode($dieta_acabada['chest'])); ?>");
                    data_points_historics_leg.push("<?php echo e(json_encode($dieta_acabada['leg'])); ?>");
                    data_points_historics_arm.push("<?php echo e(json_encode($dieta_acabada['arm'])); ?>");
                    data_points_historics_hip.push("<?php echo e(json_encode($dieta_acabada['hip'])); ?>");
                </script>


                <?php $i++; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <script>
                console.info(data_points_historics);
            </script>

        </div> 

    </div>


    


    <!-- 
        Resum dels camps d'usuari més importants
        Ordenar de més recent a més antic

        Titol: dieta actual
        Mostrar (amb detall) (en cas que tingui current_diet != null) la informació de la dieta que està fent 
            ->Informació bàsica de la dieta(diet)
            ->Tipus de dieta(type_diets)
            ->Recolliment de dades introduïdes per l'usuari(historial pacient), il·lustrat amb gràfics
    

        Titol: dieta anterior
        Mostrar (mode amagat) les anteriors dietes realitzades,
            ->Sense mostrar tot ha de sortir: nom dieta i gràfic del progrès realitzat. Indicar GRÀFICAMENT
        
        Mostrar (mode expandit) 
            ->Totes les dades introduides pel pacient (historial pacient)

        Per cada dieta, opció: Exporta els resultats de la dieta

        ->Genera un PDF amb tota la informació de la dieta, resulats i gràfica


    --><?php /**PATH C:\xampp\htdocs\Projecte3\dietapp_web\resources\views/pacient_see.blade.php ENDPATH**/ ?>