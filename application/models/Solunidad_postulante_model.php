<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Solunidad_postulante_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    /*
     * Get solunidad_postulante by solunidad_id
     */
    function get_solunidad_postulante($solunidad_id)
    {
        return $this->db->get_where('solunidad_postulante',array('solunidad_id'=>$solunidad_id))->row_array();
    }
    /*
     * Get solunidad_postulante by postulante_id
     */
    function esreg_solunidad_postulante($postulante_id)
    {
        $esregistrado = $this->db->query("
            SELECT
                sp.*, u.unidad_nombre, u.unidad_dependencia, u.unidad_responsable, su.solicitud_unidad
            FROM
                `solunidad_postulante` sp
            left join solicitud_unidades su on sp.solicitud_id = su.solicitud_id
            left join unidad u on su.unidad_id = u.unidad_id
            WHERE
                sp.`postulante_id` = $postulante_id
        ")->row_array();
        
        return $esregistrado;
    }
    /*
     * function to add new solunidad_postulante
     */
    function add_solunidad_postulante($params)
    {
        $this->db->insert('solunidad_postulante',$params);
        return $this->db->insert_id();
    }
    /*
     * function to update solunidad_postulante
     */
    function update_solunidad_postulante($solunidad_id,$params)
    {
        $this->db->where('solunidad_id',$solunidad_id);
        return $this->db->update('solunidad_postulante',$params);
    }
    /*
     * function to delete solunidad_postulante
     */
    function delete_solunidad_postulante($solunidad_id)
    {
        return $this->db->delete('solunidad_postulante',array('solunidad_id'=>$solunidad_id));
    }
}
