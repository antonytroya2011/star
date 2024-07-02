
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Buscar Propiedades</h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Busca tu propiedad</h4>
                    <p class="card-description">Reservas Bengi</p>
                    <?php if (isset($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>
                    <form class="forms-sample" action="<?php echo site_url('propiedades/do_search'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="precio_max">Precio que disponga</label>
                                    <input type="number" id="precio_max" name="precio_max" min="0" type="text" class="form-control" placeholder="Ingrese el precio que disponga" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="habitaciones">Número de Habitaciones</label>
                                    <input type="number" id="habitaciones" name="habitaciones" min="0" require class="form-control"  placeholder="Ingrese el numero de habitaciones " />
                                </div>
                            </div>
                            
                        </div>
                                <div class="form-group">
                                    <label for="distancia_universidad">Distancia hacia la universidad</label>
                                    <input type="number" id="distancia_universidad" name="distancia_universidad" min="0" step="0.1" class="form-control"  placeholder="Ingrese la distancia en km" />
                                </div>
                        
                        <button type="submit"  class="btn btn-primary mr-2"> Buscar </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reservas Bengi S.A</h4>
            <p class="card-description">Reservas Bengi</p>
            <div class="row">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToSo5dzdwxNKacCaJcyx87bRZrfr_fJ-iXxQ&s" alt="Descripción de la imagen" class="img-fluid mx-auto d-block">
            </div>
        </div>
    </div>
</div>


    </div>
</div>