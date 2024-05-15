
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Codeineter Web Application</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url();?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-dark login-page">
   
        <div class="login-box">
  
  <?php echo form_open('Admin/LoginCategiry');?> 

  <div class="login-logo">
    <a href="../../index2.html"><strong style="font-weight:bold; color:white">MY WEB APPLICATION</strong></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <?php if(!empty($this->session->flashdata('msg'))){
        ?>
      <p class="login-box-msg text-danger"> <?php
      echo $this->session->flashdata('msg');
    }
        ?></p>


      <form>
       
        <div class="input-group mb-3">
          <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter your mobile number">
          <div class="input-group-append">
            <div class="input-group-text" id="text">
           <!-- <span class="bx bxs-user-circle" style="font-size:18px;"></span>  -->
           <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="number"  id="otp" name="otp" class="form-control" placeholder=" Enter Otp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-dark">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
              <button type="button" class="btn btn-outline-dark mb-2" id="btnlogin"  style="margin: -44px 0 0 257px;">Login</button>
              <button type="button" class="btn btn-outline-dark mt-2" id="btnOtp"  style="margin: -44px 0 0 264px;">Otp</button>
            </div> 
          </div>
  </form>
          <!-- /.col -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
            
  $(document).ready(function(){
      $('#btnOtp').on('click',function(e){
      
  
        event.preventDefault();
        
        let Digits = '123456789';

        let otp ='';

        for(let i = 0;i<4;i++){
          otp +=Digits[Math.floor(Math.random()*9)];
        }

       let  Otp = otp;
       const FormData = {
       mobile_number : $('#mobile_number').val(),
     Otp : Otp
     }

     $.ajax({


      url: "<?php echo base_url('Admin/mobile'); ?>",
            method: "POST",
            data: FormData,
            success: function(response) {
              let data = JSON.parse(response);
                if (data == "success") {
    
                    alert(Otp);
                }
                
                else if(data =='not')
            {

             alert('invalid mobile number');
 
        }
              else {

                 alert("Failed to generate OTP. Please try again.");  
                 
                }
            }
        });
    });

    });

</script>
<script>

$(document).ready(function(){
  
      
        $("#btnlogin").click(function() {
       
          const FormData = {
      mobile_number : $('#mobile_number').val(),
     Otp : $('#otp').val()
     }
    const  Otp = $('#otp').val();
    

        $.ajax({
            url: "<?php echo base_url('Admin/verifyOTP'); ?>",
            method: "POST",
            data: FormData,
            success: function(response) {
              let data = JSON.parse(response);
                if (data === "success") {
                    alert("OTP verification successful!");
                    location.href = '<?= base_url('Admin/Categiryview')?>'
                    // Proceed with your logic after successful verification
                } else if(data === 'failed'){
                    alert("OTP verification failed. Please try again.");
                }
            }
        });

  
    });
  });


</script>


<!-- jQuery -->
<script src="<?= base_url();?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>public/dist/js/adminlte.min.js"></script>

</body>
</html>
