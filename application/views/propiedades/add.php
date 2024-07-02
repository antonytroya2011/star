
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Agregar Propiedades</h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Agrega tus propiedades</h4>
                    <p class="card-description">Reservas Bengi</p>
                    <form enctype="multipart/form-data" class="forms-sample" action="<?php echo site_url('propiedades/add'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación</label>
                                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ingrese su ubicación" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" id="precio" name="precio" min="0" required class="form-control" placeholder="Ingrese el precio" />
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="habitaciones">Habitaciones</label>
                                    <input type="number" id="habitaciones" name="habitaciones" min="0" require class="form-control"  placeholder="Ingrese el numero de habitaciones" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="distancia_universidad">Distancia hacia la universidad</label>
                                    <input type="number" id="distancia_universidad" name="distancia_universidad" min="0" step="0.1" class="form-control"  placeholder="Ingrese la distancia en km" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="habitacion">Imagen de la Habitación</label>
                            <input type="file" class="file-upload-default" id="habitacion" name="habitacion">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Suba la imagen" />
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-success" type="button"> Subir </button>
                            </span>
                            </div>
                        </div>                        
                        <button type="submit" value="Agregar Propiedad" class="btn btn-primary mr-2"> Agregar Propiedad </button>
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