<?php 

  session_start();

  if(isset($_SESSION['username'])){

    // echo $_SESSION['username'];
?>
  


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
  </head>

  <body style="body-pad">


    <header>

      <nav class="navbar bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-white" style="font-size:32px" >
           Welcome  <?php echo $_SESSION['username'];?>
          </a>
         
            
            <button class="btn btn-outline-success" id ="log_out">LOG OUT</button>
         
        </div>
    </nav>

  </header>

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>

      <div class="modal-body">
        
        <form id="update_form">

             <div class="row">


                        <div class="col-md-12 mb-4">
                            <label for="inputName" class="form-label"
                                  style="font-size: 18px; padding-left: 10px;">
                                    Full Name <span style="">(required)</span> </label>

                                   <input type="text" class="form-control" name="update_name" id="update_name"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                             </div>

                        </div>


                        <div class="col-md-12 mb-4">
                            <label for="inputEmail" class="form-label"
                                  style="font-size: 18px; padding-left: 10px;">
                                    Email <span style="">(required)</span> </label>

                                   <input type="email" class="form-control" name="update_email" id="update_email"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                             </div>


                        

                        <div class="col-lg-12 p-4">
                             <button type="button" class="close_btn btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="submit_btn btn btn-primary">Save changes</button>

                        </div>

               </div>

        </form>
      
      </div>

      
      
    </div>
  </div>
</div>

    <div class="container cust-container" style="">

       <div class="row" style="align-items: center; ">

                <div class="col-md-8 offset-md-2">

                    <div class="col-lg-12 text-white" style="padding-bottom: 20px;">


                       

                        <h2 class="heading-text" style="">  DATA STORING SOFTWARE </h2>


                        <div id="result"></div>


                        </div>

                        <div class="col-lg-12">

                            <form id="myForm">


                                <div class="row">


                                    <div class="col-md-6 mb-4">
                                        <label for="inputName" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Full Name <span style="">(required)</span> </label>

                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label for="inputEmail" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Email <span style="">(required)</span> </label>

                                        <input type="email" class="form-control" id="email" name="email"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>


                                    <div class="col-md-12 mb-4">
                                        <label for="inputNumber" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Phone <span style="">(required)</span> </label>

                                        <input type="number" class="form-control" id="phn_number" name="phn_number"
                                            style="padding: 10px; background: whitesmoke; border-radius: 20px;" required>
                                    </div>




                                





                                    <div class="col-md-12 mb-4">
                                        <label for="inputCompanyName" class="form-label"
                                            style="font-size: 18px; padding-left: 10px;">
                                            Your Message </label>

                                        <textarea cols="80" rows="5" class="form-control" id="message" name="message"
                                            style="background: whitesmoke; border-radius: 20px;"></textarea>
                                    </div>


                                    <div class="button text-center  " style="margin-top: 10px; ">
                                        <button type="submit" class="btn cust_btn mt-2 shadow"
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


    <div class="container pt-4 mt-4">
        
        <div id="show-table">
    


        </div>

    </div>



   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>

    //    $("#log_out").click(function(e){

    //     console.log("lpg out clicked");
        
    // })

    </script>


  </body>
</html>

<?php 

  }

  else {
  header("Location: index.php"); // or echo a message
  exit();
}

  ?>