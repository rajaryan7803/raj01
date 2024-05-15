<?php

class Admin extends CI_Controller{

    public function Categiryview(){
        $this->load->model('Datamodel');
        // $data['tableData'] = $this->db->query("SELECT * FROM `create_web`")->result_array();
        $data['tableData']=$this->db->get('create_web')->result_array();
        $this->load->view('myweb',$data);
    }

    public function Login(){
        
        $this->load->view('Login');
    }

    public function Created(){
        $this->load->view('Create');
    }

    // for Article.....

    public function Art(){
        $this->load->view('Article');
      }

      // for_article.php....

    public function Articlelist(){
        $this->load->model('Datamodel');
        $data['element']=$this->db->get('article_web')->result_array();
        $this->load->view('myarticle',$data);

    }

    public function LoginCategiry() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == false) {
            // If validation fails, handle the error
            // For example, you can reload the login view with the validation errors
            redirect('Admin/Login');
        } else {
            // If validation succeeds, process the form data
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // Add your login logic here

            if ($username === 'rajaaryan' && $password === 'raj@123'){
                // Redirect to dashboard or another page on successful login
                $data['tableData']=$this->db->get('create_web')->result_array();
                $this->load->view('myweb.php',$data);
                
                    // redirect('Admin/Login');

                } else {
                // Show error message or redirect back to the login page with an error message
             
                $this->session->set_flashdata('msg','Invalid username or password');
                redirect('Admin/Login');
               }
        }

       
     }

     public function CreateFormValidate(){
        $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');
        // $this->form_validation->set_rules('file_name','Image','trim|required');
        $this->form_validation->set_rules('status','Status','required');
        
        if($this->form_validation->run()){

                $name=$this->input->post('name');
                $file_name=$this->input->post('file_name');
                $status=$this->input->post('status');

                $created_at=date('Y-m-d H:i:s');

                $this->load->model('Datamodel');


                $config=[
                    'upload_path'=>"./upload/",
                    'allowed_types'=>"jpg|png|jpeg",
                    'max_size'=>'2048',
                ];

                $this->load->library('upload',$config);

                if($this->upload->do_upload('file_name')){
                    $img=$this->upload->data();
                    $image=$img['file_name'];

                $data=array(
                     
                    'name'=>$name,
                    'file_name'=>$image,
                    'status'=>$status
                );

               $insert=$this->Datamodel->Usermodel($data);
    
               if($insert){
               $this->session->set_flashdata('msg','Category Added Successfully');
               redirect('Admin/Categiryview');

              }

              else{
                redirect('Admin/Categiryview');

            }

        }
        else{
            redirect('Admin/Categiryview');
        }

    }
    else{
       echo validation_errors();
    }

     }

     public function Editcontroller($id) {
        // Load a user's data for editing
        // $data['element'] = $this->Datamodel->get('user',$id); 
        $data['tableData']=$this->db->query("SELECT * FROM `create_web` where id = '$id'")->result_array();       // for oneo table.....
        $this->load->view('Updateweb', $data);
    
    }

    public function Updatecontroller(){

        // Handle the form submission to update the record.
            $name = $this->input->post('name');
            $file_name= $this->input->post('file_name');
            $status=$this->input->post('status');
            $id = $this->input->post('id');

            $config=[
                'upload_path'=>"./upload/",
                'allowed_types'=>"jpg|png|jpeg",
                'max_size'=>'2048',
            ];
            $this->load->library('upload',$config);

            if($this->upload->do_upload('file_name')){
                $img=$this->upload->data();
                $image=$img['file_name'];
                
          $data=array(
            'name'=>$name,
            'file_name'=>$image,
            'status'=>$status
         );
         
         $this->load->model('Datamodel');
         $result = $this->Datamodel->Updatemodel($id, $data);
     
         if ($result) {
             
            $this->session->set_flashdata('update_msg', ' Your Data Has Been Updated Successfully');
             redirect('Admin/Categiryview');
            //  redirect('Admin/Main');
         } else {
            //  echo "Not updated";
             redirect('Admin/Updatecontroller');
         }
        }
        else{
            echo 'error';
        }
  }

  public function Deletecontroller($id){
    $this->load->model('Datamodel');
    $this->Datamodel->deleteUser($id);
    $this->session->set_flashdata('delete_msg', 'Your Data Has Been Deleted Successfully');
    redirect('Admin/Categiryview');
}

// for  Now Article......

   public function ArticleValidate(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('title','Title','required');
    $this->form_validation->set_rules('description','Decription','required');
    // $this->form_validation->set_rules('file_name','File','required');
    $this->form_validation->set_rules('author','Author','required');
    $this->form_validation->set_rules('created_at','Created','required');
    $this->form_validation->set_rules('status','Status','required');

       if($this->form_validation->run()){


        $title=$this->input->post('title');
        $description=$this->input->post('description');
        $file_name=$this->input->post('file_name');
        $author=$this->input->post('author');
        $created=$this->input->post('created_at');
        // $created_at=date('Y-m-d H:i:s');
        
        $status=$this->input->post('status');
        $id=$this->input->post('id');
        

        $config=[
            'upload_path'=>"./upload/",
            'allowed_types'=>"jpg|png|jpeg",
            'max_size'=>'2048',
        ];

        $this->load->library('upload',$config);

        if($this->upload->do_upload('file_name')){
            $img=$this->upload->data();
            $image=$img['file_name'];
    
        $data=array(
              
            'title'=>$title,
            'description'=>$description,
            'file_name'=>$image,
            'author'=>$author,
            'status'=>$status
        );

        $this->load->model('Datamodel');
        $insert=$this->Datamodel->Articlemodel($data,);
        

        if($insert){
            $this->session->set_flashdata('msg','Articles Has Been Added Successfully');
            redirect('Admin/Articlelist');
            // echo "Data insert";

           }

           else{
            //  redirect('Admin/Categiryview');
             echo "Data not insert";


         }

     }
     else{
          echo "Hello";
     }

 }
 else{
    echo validation_errors();
 }



}
     
//  Now for artical


public function Editcontrollers($id) {
    // Load a user's data for editing
    // $data['element'] = $this->Datamodel->get('user',$id); 
    $data['element']=$this->db->query("SELECT * FROM `article_web` where id = '$id'")->result_array();       // for oneo table.....
    $this->load->view('Updatearticle', $data);

}


public function Updatecontrollers(){


    // Handle the form submission to update the record.....

    $title=$this->input->post('title');
    $description=$this->input->post('description');
    $file_name=$this->input->post('file_name');
    $author=$this->input->post('author');
    $created=$this->input->post('created_at');
    // $created_at=date('Y-m-d H:i:s');
    $status=$this->input->post('status');
    $id=$this->input->post('id');
    

        $config=[
            'upload_path'=>"./upload/",
            'allowed_types'=>"jpg|png|jpeg",
            'max_size'=>'2048',
        ];
        $this->load->library('upload',$config);

        if($this->upload->do_upload('file_name')){
            $img=$this->upload->data();
            $image=$img['file_name'];
       
      $data=array(
        'title'=>$title,
        'description'=>$description,
        'file_name'=>$image,
        'author'=>$author,
        // 'created_at'=>$created,
        'status'=>$status

     );
     
     $this->load->model('Datamodel');
     $result = $this->Datamodel->Updatearticle($id, $data);
 
     if ($result) {
         
        $this->session->set_flashdata('update_msg', 'Article List has been Updated');
         redirect('Admin/Articlelist');
         redirect('Admin/Main');

        echo "Article List Has Been Successfully Updated";
     } else {
        //  echo "Not updated";
        //  redirect('Admin/Updatecontrollers');
        echo "Not Update";
     }
    }
}

  // for delete Articledata.....

  public function Deletecontrollers($id) {
    $this->load->model('Datamodel');
    $this->Datamodel->deleteArticle($id);
    $this->session->set_flashdata('delete_msg', 'Article Data Has Been Successfully Deleted');
    redirect('Admin/Articlelist');
}

public function mobile()     //also releted to persue file
	{
        $this->load->model('Datamodel');
		$mobile = $this->input->post('mobile_number');
        $otp = $this->input->post('Otp');                    // input
        $checkmobile = $this->db->get_where('my_otp',array('mobile_number'=>$mobile));       //How to cheak mobile number in Database...
        $row = $checkmobile->row();
        if($row){
           $data = array(
            'otp'=>$otp                     // table column....
           );

           $updateotp = $this->Datamodel->insert_otp_data($mobile,$data);
           if($updateotp){
            echo json_encode('success');
           }
           else{
            echo json_encode('failed');
           }
        }
        else{
            echo json_encode('not');
        }
	    	 
	}

    
    public function verifyOTP(){
    $mobile = $this->input->post('mobile_number');
    $otp = $this->input->post('Otp');

    $this->load->model('Datamodel');

    $checked = $this->Datamodel->verifyOtp_data($mobile,$otp);
    if($checked){
        echo json_encode('success');
    }
    else{
        echo json_encode('failed');
    }
    }

}



?>