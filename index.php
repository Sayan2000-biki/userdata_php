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

  <body class="body-pad-login">

    <nav class="navbar bg-dark p-4">
        <div class="container-fluid">
          <a class="navbar-brand text-white text-center" style="font-size:28px" >
           Welcome To Data Storing App
          </a>
         
            
            <!-- <button class="btn btn-outline-success" id ="log_out">LOG OUT</button> -->
         
        </div>
    </nav>

    <div class="container cust-container">

       <div class="row" style="align-items: center; ">

                <div class="col-md-8 offset-md-2">

                    <div class="col-lg-12 text-white" style="padding-bottom: 20px;">

                        <h2 class="heading-text" style=""> LOG IN PAGE</h2>


                        <div id="result"></div>


                        </div>

                        <div class="col-lg-8 offset-md-2">

                            <form id="loginForm">


                                <div class="row">


                                    <div class="col-md-12 mb-4">
                                        <label for="inputName" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                             User Name <span style="">(required)</span> </label>

                                        <input type="text" class="form-control" name="user_name" id="user_name"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>


                                    <div class="col-md-12 mb-4">
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

                                   




                                    <div class="button text-center d-flex  " style="margin-top: 10px; justify-content:center ">

                                        <button type="submit" id="submit_btn" class="btn cust_btn mt-2 shadow mx-4"
                                            style="">

                                            LOG IN
                                        </button>
                                        
                                        <a href="register.php"  id="create_btn" class="btn cust_btn mt-2 shadow"
                                            style="">

                                            CREATE AN ACCOUNT
                                        </a>

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

           


             $("#user_pass").on("keydown", function (e) {
            // Block space (32), Enter (13)
            if (e.key === " " || e.key === "Enter") {
                e.preventDefault();
                alert("Spaces, Enter, and Backspace are not allowed in the password.");
            }
            });

             $("#loginForm").submit(function(e){

                    e.preventDefault(); // Prevent default form submission

            
                     var formData = $(this).serialize(); // Serialize form data
                    //  console.log(formData);

                     $.ajax({

                        type:"POST",
                        url:"validate.php",
                        data:formData,

                        success: function(response) {

                         //   console.log(response);
                            

                            if (response.includes("user found successfully")) {
                            window.location.href = "homepage.php"; 
                            } 

                            // else if (response.includes("user found successfully but table creation failed")) {
                            // window.location.href = "index.php"; 
                            // } 
                            
                            else {

                            // alert(response);
                            $("#loginForm")[0].reset();

                             let html = `<h5 class='text-center text-white pt-4 pb-4'>
                             Username or password mismatched if you don't have an account <a href='register.php'>kindly create an account</a>
                             </h5>`;

                            $("#result").html(html);

                            }
                        },

                        error: function(xhr, status, error) {
                            // Handle errors, e.g., display an error message
                            alert("Error: " + error);
                        }

                     })
                

               

                

             })
        })


        





        



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