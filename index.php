<?php
    include "connection.php"; 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Chat Box</title>
</head>
<script>

    $(document).ready(function() {
        $('#btnsave').click(function() {
            
            var message = $('#message').val();
            if ($.trim(message) != '') {
               
                $.ajax({

                    url: "insert.php",
                    method: "POST",
                    data: {
                        hi: message
                    },
                    dataType: "text",
                    success: function(data) {       
                        $('#message').val("");
                    }
                });
                
            }
         
        });
       
    });
    
  
    setInterval(() => {
        
        $('#content').load("data.php");

    }, 1000);

</script>


<body>

<div class="border border-primary container my-4 rounded"> 
     
    <div class="container bg-dark text-center text-white my-4 p-2 rounded">
            <h1> Heroku Demo </h1> 
    </div>

    <div class="container bg-dark text-black p-3 my-4 overflow-auto rounded" id="content" style="overflow:scroll;height:350px;word-wrap: break-word;width:100%;">
    
    </div>
    
    <div class="container my-4 bg-dark text-white p-3 rounded">
        <form method="post" name="my_message">
            <div class="form-group">

                <label for="text">Message  <span id='size_of_message'></span> </label>
                <input type="text" class="form-control" name="message" id="message" placeholder="Enter your message" maxlength="100" required>
            
            </div>
           <input type="button" id="btnsave" name="btnsave" class="btn btn-primary float-right my-sm-0" value="Send">
        </form>
        <form method="post"> 
        <input type="submit" name="clear"  value="Clear data" class="btn btn-primary  my-sm-0"/>
        </form>
    </div>   
</div>
                                   
</body>

</html>

<?php
        if(isset($_POST['clear'])) 
        { 
            include "connection.php";
            $clear = " TRUNCATE TABLE message " ;
            mysqli_query($con, $clear);
        } 
?> 