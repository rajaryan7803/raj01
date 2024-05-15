<?php


class Datamodel extends CI_Model {

//     public function Usermodel($name,$status,$file_name){
//               $array=array(
                                                                
//                   'name'=>$name,
//                   'status'=>$status,
//                    'file_name'=>$file_name

//               );
//          return $this->db->insert('create_web',$array);
//                                                           // inserting.........   
//    }

   public function Usermodel($data){
    
   $result=$this->db->insert('create_web',$data);
    return $result;
    
   }

  //  public function Upload_data($data){
  //   return $this->db->insert('image_table',$data);
  //  }

   public function Updatemodel($id, $data){                         
    $this->db->where('id', $id);
    return $this->db->update('create_web', $data);
}


public function deleteUser($id) {
  return $this->db->delete('create_web', array('id' => $id));

}

// for article.......

 public function Articlemodel($data){
  $result=$this->db->insert('article_web',$data);
  return $result;

 }

 //for delete article.....

 public function Updatearticle($id, $data){                         
  $this->db->where('id', $id);
  return $this->db->update('article_web', $data);
}

public function deleteArticle($id){

  return $this->db->delete('article_web',array('id'=>$id));
}



// Lgin otp.........
public function insert_otp_data($mobile,$data)
{
   $this->db->where('mobile_number',$mobile);
    return $this->db->update('my_otp',$data);            //insert in database.......
} 

   public function verifyOtp_data($mobile,$otp){
     
    $this->db->where('mobile_number',$mobile);
    $query = $this->db->get('my_otp');                    // get in codeineter......
    $row  = $query->row();
     
    if($row->otp === $otp){
      $this->db->where('mobile_number',$mobile);
      return  $this->db->update('my_otp',array('otp'=>' '));
      
    }
    
     
   }


 }
?>