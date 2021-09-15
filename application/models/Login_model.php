<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username,$password)  {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario_login', $username);
        $this->db->where('estado_id', 1);
        $this->db->where('usuario_clave', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login2($usuario_login,$usuario_clave){
         $login = $this->db->query("SELECT admin_login as loguear from administrativo WHERE admin_login='".$usuario_login."' ")->row_array();
         if(!empty($login)){
         if ($login['loguear']==$usuario_login){

        $query = $this->db->query("SELECT
                                                    admin_id as usuario_id, tipousuario_id, estado_id,
                                                    concat(admin_nombre,' ', admin_apellido) as usuario_nombre,
                                                    admin_email as usuario_email, admin_login as usuario_login,
                                                    admin_clave as usuario_clave, admin_imagen as usuario_imagen
                                                    from administrativo
                                                    WHERE admin_login='".$usuario_login."' AND admin_clave = '".md5($usuario_clave)."' and estado_id=9 ");
       return $query->row(); 
    } } }

    public function read_user_information($username) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario_login', $username);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}