<!DOCTYPE html>
<html>
<head>
	<title>Bank_login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?=base_url() ?>Assets/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/all.min.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/all.css" />
    <link rel="icon" href="<?=base_url() ?>Assets/images/bank1.png" sizes="16x16" type="image/png">
    <script>var base_path="<?php echo base_url();?>";</script>
</head>
<style>
    
   

@media (min-width: 768px) {
    .infinity-container {
        background: url('bg.png') center no-repeat;
    }
    .infinity-form {
        box-shadow: 0 3px 6px hsla(0, 0%, 0%, 0.1);
        border-radius: 10px;
        width: 28rem;
    }
 
}

.infinity-form{
    background: #ffdbcae0;
}

.infinity-form h4 {
    font-weight: bold;
}

.infinity-form .form-input
{
    position: relative;
}

.infinity-form .form-input input
{
    width: 100%;
    margin-bottom: 20px;
    height: 40px;
    border: none;
    border-bottom: 2px solid #777;
    outline: none;
    background: transparent;
    padding-left: 40px;
    font-weight: bold;
    color: #777;
}

.infinity-form .form-input span {
    position: absolute;
    top: 8px;
    padding-left: 10px;
    color: #777;
}

.infinity-form .form-input input::placeholder {
    padding-left: 0px;
}

.infinity-form .form-input input:focus,
.infinity-form .form-input input:valid
{
    border-bottom: 2px solid #57b894;
}

.infinity-form .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #4ea585 !important;
  border:0px;
}

.infinity-form button[type="submit"] {
    margin-top: 10px;
    border: none;
    cursor: pointer;
    border-radius: 20px;
    background: linear-gradient(45deg, #4ea585, #57b894);
    color: #fff;
    font-weight: bold;
    transition: 0.5s;
    margin-bottom: 10px;
}


*{
    margin:0;padding:0;
}
body{
     background-image:url('Assets/images/loginbg3.jpg');
     background-size:cover;
     background-repeat:no-repeat;
     font-family: 'Poppins', sans-serif;
     /* background-position:center; */

}
.card{
    border-radius: 17px!important;
    padding: 20px 10px!important;
    border: 2px solid #E91E63;
    background: white;
}
.loginbg{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}
#toggle_pwd  {
            float: right;
    margin-top: -30px;
    position: relative;
    z-index: 2;
    right: 14px;
    font-size: 17px;
    cursor: pointer;
    color: black!important;

}
/* #form label{
    font-family: 'EuclidCircularA';
}
#form input{
    font-family: 'EuclidCircularA';
}
#form .head{
    font-family: 'EuclidCircularA';
}
#form p{
    font-family: 'EuclidCircularA';
} */

.head{
    color: #0c0000;
    text-align: center;
    padding: 15px;
}

    </style>
<body>
	<div class="container loginbg ">
			
			<!-- FORM BEGIN -->
			<div class="col-lg-5 col-md-10 col-sm-12 col-xs-12   mx-auto">
		<div class="card">

				<!-- Company Logo -->
				<div class="text-center  ">
					<img src="<?=base_url() ?>Assets/images/bank1.png" style="margin:0 auto;height: 55px;">
				</div>
				<div class="text-center mb-4">
					<h4 class="head">Login into account</h4>
				</div>
				<!-- Form -->
                <form class="px-3" id="form">
					<!-- Input Box -->

                    <div class="text-center" style="color:red;font-size:16px;font-weight: bold;" id="errorLogin"></div>
					<div class="form-input mb-1">
						<label for="">Enter Username <span style="color:red">*</span></label>
						<input class="mb-0 form-control"  type="text" name="username" id="username" placeholder=" Enter Username" >
                   </div>
                    <p style="color:red;font-size:15px;font-weight:bold;text-align:left" id="erroruname"></p>
					<div class="form-input mb-1">
                    <label for="">Enter password <span style="color:red">*</span></label>

						<input class="mb-0 form-control"  type="password" name="password" id="password" placeholder="Enter Password" >

					</div>
                    <div id="toggle_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                    <p style="color:red;font-size:15px;font-weight:bold;text-align:left" id="errorpassword"></p>
					
			   	    <!-- Login Button -->
		            <div class="mb-3 text-center"> 
                    <button type="button" class="btn btn-primary py-2 px-3 shadow-sm text-white" id="btn_login" name="btn_login" style="font-size: 16px;background: #E91E63;
                        border: 0px; padding: 7px 20px!important;">Log In</button>
					</div>
				
				</form>
			</div>
			<!-- FORM END -->
	
		</div>
	</div>

</body>
</html>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>          -->
<script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
 <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/ComLogin_Create.js"></script>
   



<script type="text/javascript">
         $(function () {
            $("#toggle_pwd").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
        </script>