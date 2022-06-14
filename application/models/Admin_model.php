<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
    }


// Read data using username and password
    public function login($data) {
        $sql = 'SELECT * FROM users WHERE uname = ? AND ustatus = ? ';
            $binds = array($data['username'],'A');
            $query = $this->db->query($sql, $binds);
        
       
        $password_hash = md5($data['password']) ;
        if ($query->num_rows() > 0) {
            $rw_password = $query->result();
 // echo $rw_password[0]->upassword .'<br/>' ;
 //  echo $password_hash ;
           // echo json_encode($rw_password);
            if($password_hash == $rw_password[0]->upassword){
               $userid =  $rw_password[0]->id ;
                return $userid;     
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function select_html($from,$fieldid, $name, $field, $type, $class, $e_match = '', $condition = '', $c_match = '', $onchange = '', $condition_type = 'single', $is_none = '')
    {
        $return = '';
        $other = '';
        $multi = 'no';
        $phrase = 'Choose a ' . $name;
        if ($class == 'demo-cs-multiselect') {
            $other = 'multiple';
            $name = $name . '[]';
            if ($type == 'edit') {
                $e_match = json_decode($e_match);
                if ($e_match == NULL) {
                    $e_match = array();
                }
                $multi = 'yes';
            }
        }
        $return = '<select name="' . $name . '" onChange="' . $onchange . '(this.value,this)" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" data-hide-disabled="true" >';
        if (!is_array($from)) {
            if ($condition == '') {
                $all = $this->db->get($from)->result_array();
            } else if ($condition !== '') {
                if ($condition_type == 'single') {
                    $all = $this->db->get_where($from, array(
                        $condition => $c_match
                    ))->result_array();
                } else if ($condition_type == 'multi') {
                    $this->db->where_in($condition, $c_match);
                    $all = $this->db->get($from)->result_array();
                }
            }
            if ($is_none == 'none') {
                $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
            } else {
                $return .= '<option value="">Choose one</option>';
            }
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row[$fieldid] . '">' . $row[$field] . '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row[$fieldid] . '" ';
                    if ($multi == 'no') {
                        if ($row[$fieldid] == $e_match) {
                            $return .= 'selected=."selected"';
                        }
                    } else if ($multi == 'yes') {
                        if (in_array($row[$fieldid], $e_match)) {
                            $return .= 'selected=."selected"';
                        }
                    }
                    $return .= '>' . $row[$field] . '</option>';
                }
            endforeach;
        } else {
            $all = $from;
            if ($is_none == 'none') {
                $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
            } else {
                $return .= '<option value="">Choose one</option>';
            }
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row . '">';
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->Admin_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    $return .= '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row . '" ';
                    if ($row == $e_match) {
                        $return .= 'selected=."selected"';
                    }
                    $return .= '>';
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->Admin_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    $return .= '</option>';
                }
            endforeach;
        }
        $return .= '</select>';
        return $return;
    }
    

    function get_type_name_by_id($type,$fieldid, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $fieldid => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }
        }
    }

    public function clean_post($post_name) {
       $name = trim($post_name);
       $Evalue = array('-','alert','<script>','</script>','</php>','<php>','<p>','\r\n','\n','\r','=',"'",'/','cmd','!',"('","')", '|');
       $post_name = str_replace($Evalue, '', $name); 
       $post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
      // $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");
       
       return $post_name;
    }
 

    //  function fetch_service()
    // {
       
    //     $query = $this->db->query('SELECT id,service_name,description FROM services');


    //     return $query->result();

    // }

     function fetch_service()
   {
    $query = $this->db->query('SELECT id,service_name,description FROM services');
    return $query->result();
   }


   function save_upload($service_name,$service_image){
        $data = array('service_name'     => $service_name,
                'service_image'     => $service_image
            );  
        $result= $this->db->insert('services',$data);
        return $result;
    }

       public function translate($string)
  {   

 $session = $this->session->userdata('language');


     if(empty($session)){ 
    $this->session->set_userdata('language', 'English');
      $this->session->set_userdata('dir', 'ltr');
    }  

     $language =  $this->session->userdata('language');


    if($language=='English'){
        $language='English' ;
    }elseif($language=='Arabic'){
        $language='Arabic' ;
    }
    $translatedstring = "";
     $translatedstring =  $this->Admin_model->get_type_name_by_id('translation_strings','string', $string, $language);

     if($translatedstring==""){
         return $string  ;
     }else{
         return  $translatedstring ;
     }
    
  }

  
  public function check_package_count($userid='',$refid='',$type='')
  {
     if($type=='buyer'){

        

     }else if($type=='supplier'){
        
     }
  }


 
      
    
     function insert_shipment($data) {
           $this->db->select('id');
        $this->db->from('shipment_det');
        $this->db->where('invoice_no', $data['invoice_no']);
        $number =  $data['invoice_no'];

        $query = $this->db->get();
        $row = $query->row();
      if ($query->num_rows() > 0) {
         
 $this->db->where('invoice_no', $number);
 $this->db->delete('shipment_det');

 
 
    $insert = $this->db->insert('shipment_det', $data); 
      }
      else
      {
    $insert = $this->db->insert('shipment_det', $data);
              
      }
        $id = $this->db->insert_id();
      /*  $this->db->select('airbillno');
        $this->db->from('shipment_det');
        $this->db->where('id', $id);
        $this->db->like('airbillno', "AIR", 'both'); 
       
        $query = $this->db->get();
        $row = $query->row();
      if ($query->num_rows() > 0) {
            
             $this->db->update('shipment_det', array('item_type' => "air"));
        } else {
          $this->db->update('shipment_det', array('item_type' => "sea"));
        } */
        
        
        
      return $id ;
      
    }
 
    

  

}