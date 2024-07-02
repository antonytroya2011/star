<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propiedades extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Propiedad_model');
        $this->load->model('Astar_model'); 
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['propiedades'] = $this->Propiedad_model->get_propiedades();
        $this->load->view('templates/header');
        $this->load->view('propiedades/index', $data);
        $this->load->view('templates/footer');
    }

    public function add() {
        // Configuración para la carga de archivos
        $config['upload_path'] = APPPATH . '../uploads/habitaciones/'; // Ruta de subida de archivos
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size'] = 5 * 1024; // Definir el peso máximo de subida (5MB)
        $nombre_aleatorio = "habitaciones_foto" . time() * rand(100, 10000); // Creando un nombre aleatorio
        $config['file_name'] = $nombre_aleatorio; // Asignando el nombre al archivo subido
    
        $this->load->library('upload', $config); // Cargando la librería UPLOAD
    
        if ($this->input->post()) {
            // Intentar subir el archivo
            if ($this->upload->do_upload("habitacion")) {
                // Capturar información del archivo subido
                $dataArchivoSubido = $this->upload->data();
                $nombre_archivo_subido = $dataArchivoSubido["file_name"]; // Obtener el nombre del archivo
            } else {
                $nombre_archivo_subido = ""; // Cuando no se sube el archivo el nombre queda vacío
            }
    
            // Recoger otros datos del formulario
            $data = array(
                'ubicacion' => $this->input->post('ubicacion'),
                'precio' => $this->input->post('precio'),
                'habitaciones' => $this->input->post('habitaciones'),
                'descripcion' => $this->input->post('descripcion'),
                'distancia_universidad' => $this->input->post('distancia_universidad'),
                'reservada' => 0,
                'nombre_archivo' => $nombre_archivo_subido // Guardar el nombre del archivo en la base de datos
            );
    
            // Insertar la propiedad con los datos recogidos
            $this->Propiedad_model->insert_propiedad($data);
    
            // Redireccionar a la página principal de propiedades
            redirect('propiedades/index');
        } else {
            // Cargar la vista para agregar una nueva propiedad
            $this->load->view('templates/header');
            $this->load->view('propiedades/add');
            $this->load->view('templates/footer');
        }
    }
    

    public function borrar($id) {
        $this->Propiedad_model->eliminar($id);  
        redirect("propiedades/index");
    }
    

    public function search() {
        $this->load->view('templates/header');
        $this->load->view('propiedades/search');
        $this->load->view('templates/footer');
    }

    public function do_search() {
        $precio_max = $this->input->post('precio_max');
        $habitaciones = $this->input->post('habitaciones');
        $distancia_max = $this->input->post('distancia_universidad');
    
        // Criterios exactos para la búsqueda
        $criteria = array();
        if (!empty($precio_max)) {
            $criteria['precio <='] = $precio_max;
        }
        if (!empty($habitaciones)) {
            $criteria['habitaciones >='] = $habitaciones;
        }
    
        // Obtener propiedades que coincidan con los criterios exactos
        $propiedades = $this->Propiedad_model->get_propiedades($criteria, 'distancia_universidad ASC');
    
        if (empty($propiedades)) {
            $data['message'] = "No se encontraron propiedades que cumplan con los criterios de búsqueda.";
        } else {
            // Filtrar propiedades que tienen distancia igual o menor a la especificada
            $filtered_propiedades = array_filter($propiedades, function($propiedad) use ($distancia_max) {
                return $distancia_max === null || $propiedad['distancia_universidad'] <= $distancia_max;
            });
    
            if (empty($filtered_propiedades)) {
                $data['message'] = "No se encontraron propiedades que cumplan con los criterios de búsqueda.";
            } else {
                $data['propiedades'] = array_values($filtered_propiedades); // Reindexar el array
            }
        }
    
        $this->load->view('templates/header');
        $this->load->view('propiedades/search_result', $data);
        $this->load->view('templates/footer');
    }

    public function view($id) {
        $data['propiedad'] = $this->Propiedad_model->get_propiedad($id);
        if (empty($data['propiedad'])) {
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('propiedades/view', $data);
        $this->load->view('templates/footer');
    }

    public function reservar($id) {
        $this->Propiedad_model->reservar_propiedad($id);
        redirect('propiedades/index');
    }

    public function liberar($id) {
        $this->Propiedad_model->liberar_propiedad($id);
        redirect('propiedades/index');
    }

    private function build_location_graph($propiedades) {
        $graph = array();
        foreach ($propiedades as $propiedad) {
            $ubicacion = $propiedad['ubicacion'];
            $distancia = $propiedad['distancia_universidad'];
            $graph[$ubicacion][] = array('propiedad' => $propiedad, 'costo' => $distancia);
        }
        return $graph;
    }

    private function order_by_proximity($optimal_path, $propiedades) {
        return $propiedades;
    }

    private function find_optimal_property($propiedades) {
        $optimal_property_id = null;
        $optimal_cost = PHP_INT_MAX;

        foreach ($propiedades as $id => $propiedad) {
            $costo_actual = $this->calculate_cost($propiedad);
            if ($costo_actual < $optimal_cost) {
                $optimal_cost = $costo_actual;
                $optimal_property_id = $id;
            }
        }

        return $optimal_property_id;
    }

    private function calculate_cost($propiedad) {
        $peso_distancia = 0.5;
        $peso_precio = 0.3;
        $peso_habitaciones = 0.2;

        $costo_distancia = $propiedad['distancia_universidad'];
        $costo_precio = $propiedad['precio'];
        $costo_habitaciones = $propiedad['habitaciones'];

        $total_cost = ($peso_distancia * $costo_distancia) + ($peso_precio * $costo_precio) + ($peso_habitaciones * $costo_habitaciones);

        return $total_cost;
    }
}
?>
