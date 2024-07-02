<!-- Vista buscar_propiedades.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Buscar Propiedades</title>
    <!-- Estilos CSS -->
    <style>
        /* Estilos para el formulario */
        .search-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .search-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .search-form input[type="text"],
        .search-form input[type="number"],
        .search-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .search-form input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        .search-form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Buscar Propiedades</h1>
    
    <!-- Formulario de búsqueda -->
    <form action="<?php echo site_url('propiedades/search'); ?>" method="post" class="search-form">
        <label for="precio_max">Precio Máximo:</label>
        <input type="number" id="precio_max" name="precio_max" min="0">

        <label for="habitaciones">Número de Habitaciones:</label>
        <input type="number" id="habitaciones" name="habitaciones" min="0">

        <label for="distancia_max">Distancia Máxima a la Universidad (km):</label>
        <input type="number" id="distancia_max" name="distancia_max" min="0">

        <label for="orden">Ordenar por:</label>
        <select id="orden" name="orden">
            <option value="precio_asc">Precio más bajo</option>
            <option value="precio_desc">Precio más alto</option>
            <option value="habitaciones_asc">Número de habitaciones (menor a mayor)</option>
            <option value="habitaciones_desc">Número de habitaciones (mayor a menor)</option>
            <option value="distancia_asc">Distancia a la universidad (menor a mayor)</option>
            <option value="distancia_desc">Distancia a la universidad (mayor a menor)</option>
        </select>

        <input type="submit" value="Buscar Propiedad">
    </form>

</body>
</html>
