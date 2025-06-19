<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" 
     rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



   <link rel="stylesheet" href="assets/css/style.css">

    <title>Contact Form</title>

    <style>

        .red_border{
            border:2px solid red !important;
        }

        

    </style>

  </head>

  <body class="register-pad">

     <nav class="navbar bg-dark p-4">
        <div class="container-fluid">
          <a class="navbar-brand text-white text-center" style="font-size:28px" >
           Welcome To Data Storing App
          </a>
         
            
            <a href="index.php" class="btn btn-outline-success" id ="">HOME</a>
         
        </div>
    </nav>

    <div class="container cust-container">

       <div class="row" style="align-items: center; ">

                <div class="col-md-8 offset-md-2">

                    <div class="col-lg-12 text-white" style="padding-bottom: 20px;">

                        <h2 class="heading-text" style=""> REGISTER FORM </h2>


                        <div id="result"></div>


                        </div>

                        <div class="col-lg-12">

                            <form id="registerForm">


                                <div class="row">


                                    <div class="col-md-12 mb-4">
                                        <label for="inputName" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                             User Name <span style="">(required)</span> </label>

                                        <input type="text" class="form-control" name="user_name" id="user_name"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label for="password" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Password <span style="">(required)</span> </label>

                                        <div class="position-relative mt-2">
                                         <input type="password" class="form-control" id="user_pass" name="user_pass"
                                                style="padding: 10px 40px 10px 10px; background: whitesmoke; border-radius: 20px;" required>

                                        <i class="fa-solid fa-eye toggle-password" id="toggleCheckPass"
                                            style="position: absolute; top: 50%; right: 15px;
                                             transform: translateY(-50%); cursor: pointer; color: #555;"></i>
                                        </div>

                                    </div>

                                     <div class="col-md-6 mb-4">
                                        <label for="confirm_password" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                           Confirm Password <span style="">(required)</span> </label>

                                       <div class="position-relative mt-2">
                                         <input type="password" class="form-control" id="check_pass" name="check_pass"
                                                style="padding: 10px 40px 10px 10px; background: whitesmoke; border-radius: 20px;" required>

                                        <i class="fa-solid fa-eye toggle-password" id="toggleCheckConPass"
                                            style="position: absolute; top: 50%; right: 15px;
                                             transform: translateY(-50%); cursor: pointer; color: #555;"></i>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-4">
                                        <label for="inputNumber" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Phone <span style="">(required)</span> </label>

                                        <input type="number" class="form-control" id="user_phn" name="user_phn"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>




                                    <div class="button text-center  " style="margin-top: 10px; ">
                                        <button type="submit" id="submit_btn" class="btn cust_btn mt-2 shadow"
                                            style="">

                                            SUBMIT 
                                        </button>
                                    </div>



                                </div>
                            </form>
                        </div>


                </div>
         </div>

    </div>


   






    <script>

        $(document).ready(function(){

            //toggling password

             $("#toggleCheckPass").on("click", function(){

                pass_toggle("user_pass", "#toggleCheckPass");
            })

            $("#toggleCheckConPass").on("click", function(){

                pass_toggle("check_pass", "#toggleCheckConPass");
            })


             $("#user_pass, #check_pass, #user_name" ).on("keydown", function (e) {
            // Block space (32), Enter (13)
            if (e.key === " " || e.key === "Enter") {
                e.preventDefault();
                alert("Spaces, Enter, and Backspace are not allowed.");
            }
            });

             $("#registerForm").submit(function(e){

                e.preventDefault(); // Prevent default form submission

                

                if(form_validate() == true && validate_phn() == true){
                     var formData = $(this).serialize(); // Serialize form data
                    //  console.log(formData);

                     $.ajax({

                        type:"POST",
                        url:"user_data.php",
                        data:formData,

                        success : function (response) {
                            
                            // console.log(res);
                             $("#registerForm")[0].reset();

                             if (response.includes("New record created successfullly")) {

                                 let html = "<h4 class='text-center text-dark pt-4 pb-4'>Redirection to Log in page...<i class='fa-solid fa-spinner fa-beat'></i></h4>";
                                 $("#result").html(html);

                            setTimeout(() => {
                                window.location.href = "index.php"; 
                            }, 5000);

                            


                            }
                            
                            else if(response.includes("username already in used")){

                                alert("User name already exist!!!")

                            }
                            
                            
                            else {
                            alert(response);
                            }
                            
                        },

                        error: function(xhr, status, error) {
                            // Handle errors, e.g., display an error message
                            alert("Error: " + error);
                        }

                     })
                }

               

                

             })
        })




        //password validate

        function form_validate(){
            var pass = $("#user_pass").val();
        var conn_pass = $("#check_pass").val();

             // Reset red border first
            $("#user_pass, #check_pass").removeClass("red_border");

            if (pass === conn_pass) {
                console.log("password matched");
                return true;
                
            }else{
                
                $("#user_pass, #check_pass").addClass("red_border");
                alert("password and confirm password doesn't match");

                
                
            }
        }


        //validating phone number

        function validate_phn(){

            let phn_num = $("#user_phn").val(); //important val();

           let phn_num_length = phn_num.length; 


             // Reset red border first
            $("#user_phn").removeClass("red_border");

            if(phn_num_length == 10){
                
                return true;
                
            }else{

                $("#user_phn").addClass("red_border");

               alert("please enter valid phone number without any prefix code");

                
            }

        }



        //toggling password view system

        function pass_toggle(cont_id, cont_class){

            let input = document.getElementById(cont_id);

            if(input.type == "password"){

                input.type = "text";

                $(cont_class).removeClass("fa-eye");
                $(cont_class).addClass("fa-eye-slash");

            }

            else{
                input.type = "password";
                 $(cont_class).removeClass("fa-eye-slash");
                $(cont_class).addClass("fa-eye");
            }


        }

       

        
        

      


    </script>


  </body>
</html>