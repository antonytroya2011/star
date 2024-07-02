<?php
class Propiedad_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_propiedades($criteria = array(), $orden = null) {
        if (!empty($criteria)) {
            $this->db->where($criteria);
        }

        if (!empty($orden)) {
            switch ($orden) {
                case 'precio_asc':
                    $this->db->order_by('precio', 'ASC');
                    break;
                case 'precio_desc':
                    $this->db->order_by('precio', 'DESC');
                    break;
                case 'habitaciones_asc':
                    $this->db->order_by('habitaciones', 'ASC');
                    break;
                case 'habitaciones_desc':
                    $this->db->order_by('habitaciones', 'DESC');
                    break;
                case 'distancia_asc':
                    $this->db->order_by('distancia_universidad', 'ASC');
                    break;
                case 'distancia_desc':
                    $this->db->order_by('distancia_universidad', 'DESC');
                    break;
                default:
                    // Orden por defecto si no se selecciona ninguna opción
                    $this->db->order_by('precio', 'ASC');
                    break;
            }
        }

        $query = $this->db->get('propiedades');
        return $query->result_array();
    }

    public function get_propiedad($id) {
        $query = $this->db->get_where('propiedades', array('id' => $id));
        return $query->row_array();
    }

    public function insert_propiedad($data) {
        return $this->db->insert('propiedades', $data);
    }

    public function update_propiedad($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('propiedades', $data);
    }

    
    public function eliminar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('propiedades');
    }
    


    public function update_distancia_universidad($id, $distancia) {
        $this->db->where('id', $id);
        return $this->db->update('propiedades', array('distancia_universidad' => $distancia));
    }

    public function reservar_propiedad($id) {
        $data = array(
            'reservada' => true // Marcamos la propiedad como reservada
        );
        $this->db->where('id', $id);
        return $this->db->update('propiedades', $data);
    }

    public function liberar_propiedad($id) {
        $data = array(
            'reservada' => false // Marcamos la propiedad como no reservada
        );
        $this->db->where('id', $id);
        return $this->db->update('propiedades', $data);
    }
}
?>
