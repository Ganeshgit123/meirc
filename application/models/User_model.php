<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
    }

 
    

    function getRows($params = array()){

         

        $this->db->select('a.*, b.product_name,b.program_title_arabic, group_concat(start_date)coursedate, cat_icon, icon_bg_color,');
        $this->db->from('schedule a');
        
          $this->db->join('courses b', 'a.course_id = b.id');
          $this->db->join('category c', 'a.category_id = c.id');
        //filter data by searched keywords
         

         if(!empty($params['search']['searchtext'])){
           
            //$this->db->where_in('category_id',$params['search']['category']);

            $this->db->where('b.product_name like "%'.$params['search']['searchtext'].'%" ');
        }

         

        if(!empty($params['search']['category'])){
           
            //$this->db->where_in('category_id',$params['search']['category']);

            $this->db->where('a.category_id In('.$params['search']['category'].')');
        }

         


        if(!empty($params['search']['subcategory'])){
           $this->db->where('a.sub_cat_id In('.$params['search']['subcategory'].')');
        }


        if(!empty($params['search']['type'])){
           
            //$this->db->where_in('category_id',$params['search']['category']);

            $type = explode(',', $params['search']['type']) ;
            
   
  


            $this->db->group_start(); // Open bracket
            foreach ($type as $value) {
               $this->db->or_where('type',$value);
            }
            $this->db->group_end(); // Close bracket
            
        }


       // $this->db->where('start_date >= ',date('Y-m-d'));
       
        $this->db->where('status','a');

        if(!empty($params['search']['sortby'])){

            $sortby = $params['search']['sortby'] ;

if( $sortby=='newest_first'){
    $this->db->order_by("start_date","desc");

}elseif($sortby=='oldest_first'){
     $this->db->order_by("start_date","asc");
}elseif($sortby=='course_title_az'){

    $this->db->order_by("product_name","asc");
    
}elseif($sortby=='course_title_za'){
    $this->db->order_by("product_name","desc");
}
            

         //$this->db->where('category_id In('.$params['search']['category'].')');
        }else{
    
     $this->db->order_by("product_name","asc");
}
      


      
 $this->db->group_by('a.course_id');

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        


        //get records
        $query = $this->db->get();
        //return fetched data

 //echo $this->db->last_query() ;
//print_r($this->db->last_query());
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }


function gettrainings($params = array()){

 
         

        $this->db->select('a.*, b.*');
        $this->db->from('training_courses a');
        
          $this->db->join('companies b', 'a.company_id = b.id');
         
         if(!empty($params['search']['searchtext'])){
           
            //$this->db->where_in('category_id',$params['search']['category']);

            $this->db->where('b.training_name like "%'.$params['search']['searchtext'].'%" ');
        }

         

        if(!empty($params['search']['company'])){
           
            $this->db->where('a.company_id In('.$params['search']['company'].')');
        }

         

 

        


       // $this->db->where('start_date >= ',date('Y-m-d'));
       
       // $this->db->where('status','a');

         $this->db->order_by("training_name","asc");


       
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        


        //get records
        $query = $this->db->get();
        //return fetched data
  
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
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

    function getServiceScheduleSlots($duration, $start,$end)
{
        $start = new DateTime($start);
        $end = new DateTime($end);
        $start_time = $start->format('H:i');
        $end_time = $end->format('H:i');
        $i=0;
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;
            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] = $start;
                $time[$i]['end'] = $end;
            }
        }
        return $time;
  }

}