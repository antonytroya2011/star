<style>
    .reserved-label-red {
    color: red;  
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Buscar Propiedades</h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Propiedades</h4>
                        <p class="card-description"> Bengi S.A</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Imagen</th>
                                        <th>Ubicación</th>
                                        <th>Precio</th>
                                        <th>Habitaciones</th>
                                        <th>Descripción</th>
                                        <th>Distancia a la Universidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($propiedades)): ?>
                                        <?php foreach ($propiedades as $propiedad): ?>
                                            <tr class="text-center">
                                                <td>
                                                    <?php if (!empty($propiedad['nombre_archivo'])): ?>
                                                        <img src="<?php echo base_url('uploads/habitaciones/' . $propiedad['nombre_archivo']); ?>" alt="Imagen de la propiedad" class="property-image">
                                                    <?php else: ?>
                                                        No disponible
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo isset($propiedad['ubicacion']) ? htmlspecialchars($propiedad['ubicacion']) : 'Ubicación no disponible'; ?></td>
                                                <td><?php echo isset($propiedad['precio']) ? htmlspecialchars($propiedad['precio']) : 'Precio no disponible'; ?></td>
                                                <td><?php echo isset($propiedad['habitaciones']) ? htmlspecialchars($propiedad['habitaciones']) : 'Número de habitaciones no disponible'; ?></td>
                                                <td><?php echo isset($propiedad['descripcion']) ? htmlspecialchars($propiedad['descripcion']) : 'Descripción no disponible'; ?></td>
                                                <td><?php echo isset($propiedad['distancia_universidad']) ? htmlspecialchars($propiedad['distancia_universidad']) . ' km' : 'Distancia no disponible'; ?></td>
                                                <td>
                                                    <?php if ($propiedad['reservada'] == 0): ?>
                                                        <a href="<?php echo site_url('propiedades/reservar/' . $propiedad['id']); ?>" class="btn btn-success">Reservar</a>
                                                        <a href="<?php echo site_url('propiedades/borrar/' . $propiedad['id']); ?>" class="btn btn-danger">Eliminar</a>

                                                    <?php else: ?>
                                                        <a href="<?php echo site_url('propiedades/liberar/' . $propiedad['id']); ?>" class="btn btn-warning">Liberar Reserva</a>
                                                        <button class="btn " disabled><span class="reserved-label reserved-label-red">Reservada</span></button>
                                                        <?php endif; ?>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">No se encontraron propiedades que cumplan con los criterios de búsqueda.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

