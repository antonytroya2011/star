<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Buscar Propiedades</h3>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Reservas Bengi S.A</h2>
                        <p class="card-description">Reservas Bengi</p>
                        
                        <?php
                        // Suponiendo que $propiedades es tu arreglo de propiedades
                        // Ordenar $propiedades por distancia a la universidad de forma ascendente
                        if (!empty($propiedades)) {
                            $distancias = array_column($propiedades, 'distancia_universidad');
                            array_multisort($distancias, SORT_ASC, $propiedades);
                        }
                        ?>

                        <?php if (!empty($propiedades)): ?>
                            <ul class="property-list">
                                <?php foreach ($propiedades as $propiedad): ?>
                                    <li class="property-item">
                                        <p><strong>Ubicación:</strong> <?php echo isset($propiedad['ubicacion']) ? htmlspecialchars($propiedad['ubicacion']) : 'Ubicación no disponible'; ?></p>
                                        <p><strong>Precio:</strong> <?php echo isset($propiedad['precio']) ? htmlspecialchars($propiedad['precio']) : 'Precio no disponible'; ?></p>
                                        <p><strong>Habitaciones:</strong> <?php echo isset($propiedad['habitaciones']) ? htmlspecialchars($propiedad['habitaciones']) : 'Número de habitaciones no disponible'; ?></p>
                                        <p><strong>Descripción:</strong> <?php echo isset($propiedad['descripcion']) ? htmlspecialchars($propiedad['descripcion']) : 'Descripción no disponible'; ?></p>
                                        <p><strong>Distancia a la universidad:</strong> <?php echo isset($propiedad['distancia_universidad']) ? htmlspecialchars($propiedad['distancia_universidad']) . ' km' : 'Distancia no disponible'; ?></p>
                                        <p><strong>Imagen de la vivienda</strong></p>
                                        <?php if (!empty($propiedad['nombre_archivo'])): ?>
                                            <img src="<?php echo base_url('uploads/habitaciones/' . $propiedad['nombre_archivo']); ?>" alt="Imagen de la propiedad" class="img-fluid property-image">
                                        <?php else: ?>
                                            <img src="<?php echo base_url('uploads/default.jpg'); ?>" alt="Imagen por defecto" class="img-fluid property-image">
                                        <?php endif; ?>
                                        <br><br>

                                        <!-- Verificar si la propiedad está reservada -->
                                        <?php if ($propiedad['reservada']): ?>
                                            <p><strong>Estado:</strong> Reservada</p>
                                        <?php else: ?>
                                            <a class="btn btn-success" href="<?php echo site_url('propiedades/reservar/' . $propiedad['id']); ?>" class="btn">Reservar</a>
                                        <?php endif; ?>
                                        <a class="btn btn-danger" href="<?php echo site_url('propiedades/search');?>" >Buscar otra Propiedad</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No se encontraron propiedades que cumplan con los criterios de búsqueda.</p>
                        <?php endif; ?>
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
