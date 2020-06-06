<?php  
 class Main_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           $this->db->where('username', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('users');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      } 
     
     function access_uid($username)
     {
         $this->db->select('uid');
         $this->db->from('users');
         $this->db->where('username', $username);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
         echo $query ;
     }
 }  