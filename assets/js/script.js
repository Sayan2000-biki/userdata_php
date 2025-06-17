 $(document).ready(function(){

   //log out logic

    $("#log_out").click(function (e) {
    e.preventDefault();
    window.location.href = "logout.php";
    });

    $("#myForm").submit(function(e){

        e.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);

        

        let phn_number = $("#phn_number").val();

        if(phn_number.length > 10){

            alert("Phn number is greater than 10 digit")
        }
       

        else{
             $.ajax({

            type:"POST",
            url:"submit.php",
            data:formData,
           

            success: function (response) {

                console.log(response);
                 $("#myForm")[0].reset();

                 let html = "<h4 class='text-center text-dark pt-4 pb-4'>Data saved successfully</h4>";
                 $("#result").html(html);

                 cust_fetch();

                 setTimeout(() => {
                    $("#result").html('');
                }, 5000);
                
                

            },

            error: function(xhr, status, error) {
                    // Handle errors, e.g., display an error message
                    alert("Error: " + error);
                }
                });

                return false; // Prevent further execution
        }

      
      

    })


     function cust_fetch(){
            
            $.ajax({

                type:"GET",
                url:"fetch.php",
                dataType:"json",

                success: function (response) {
                        
                    console.log("data received successfully");

                    var html = "<table class='table table-bordered table-hover'>";

                    html+= "<tr><th>Name</th><th>Email</th><th>Actions</th></tr>";

                    $.each(response, function(index, item){

                   html += "<tr><td>" + item.full_name + "</td><td>" + item.email + "</td><td class='d-flex'>"
                        + "<button class='delete_btn' value='" + item.id + "'>"
                        + "<i class='fa-solid fa-trash text-danger fa-2x'></i></button>"
                        + "<button class='update_btn' value='" + item.id + "'>"
                        + "<i class='fa-solid fa-pen text-primary fa-2x'></i></button></td></tr>";

                        
                   
                    })

                     html+= "</table>";

                    $("#show-table").html(html);

                     $(".delete_btn").on("click",function(){

                        var data = $(this).val();

                        var row = $(this).closest("tr");

                       
                        

                        console.log(data);

                        cust_delete(data, row);
                         
                    
                            
                
                     })

                     $(".update_btn").on("click", function(){

                        $(".modal").show();
                         var id_data = $(this).val();
                        

                      
                         

                         var row = $(this).closest("tr");

                        var inner_data = (row.find('td'));

                        var name_update = (inner_data[0].innerText);

                        var email_update = (inner_data[1].innerText);

                        $("#update_name").val(name_update);
                        $("#update_email").val(email_update);



                       

                      
                       

                   
                       


                       
                         


                         console.log(id_data);

                          $("#update_form").off("submit").on("submit", function(e){

                            e.preventDefault();

                            var formdata = $(this).serialize();

                            $(".modal").hide();


                            $.ajax({
                                
                                type:"POST",
                                url:"update.php",
                                data:formdata +'&formId=' + id_data, // Send the form ID as a separate parameter

                                success: function (response) {

                                    console.log(response + "update" + id_data);
                                    
                                    $("#update_form")[0].reset();

                                    

                                     cust_fetch();

                                    // let html = "<h4 class='text-center text-dark pt-4 pb-4'>Data saved successfully</h4>";
                                    // $("#result").html(html);

                                    
                                    
                                    

                                },

                            error: function(xhr, status, error) {
                                        // Handle errors, e.g., display an error message
                                        alert("Error: " + error);
                                    }

                            })

                            


                         })
                         

                     })

                     $(".close_btn").on("click", function(){

                        $(".modal").hide();
                     })

                },

                 error: function(xhr, status, error) {
                    // Handle errors, e.g., display an error message
                    alert("Error: " + error);
                }
            })

        }


     function cust_delete(data, element){

            $.ajax({

                type:"POST",
                url:"delete.php",
                data: {item:data},

                success: function (response) {
                    
                    console.log(response);
                    element.remove();
                    
                },

                 error: function(xhr, status, error) {
                    // Handle errors, e.g., display an error message
                    alert("Error: " + error);
                }
            })

     }

    // $("#update_form").submit(function(e){

    //     e.preventDefault();

    //     var formdata = $(this).serialize();

    //     $.ajax({
            
    //          type:"POST",
    //         url:"update.php",
    //         data:formdata,

    //           success: function (response) {

    //             console.log(response);

    //              $("#update_form")[0].reset();

    //              let html = "<h4 class='text-center text-dark pt-4 pb-4'>Data saved successfully</h4>";
    //              $("#result").html(html);

                
                
                

    //         },

    //        error: function(xhr, status, error) {
    //                 // Handle errors, e.g., display an error message
    //                 alert("Error: " + error);
    //             }

    //     })

    // })



      

    cust_fetch();



 })


 
    



 