<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Append Input and Textarea with jQuery</title>
  <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
    input[type="text"] {
        margin-bottom: 14px;
    }

  textarea{
    margin-bottom: 10px;
}
#container{
    text-align: center;
    background: #8080803b;
    width: 19%;
    padding: 21px;
    border-radius: 14px;
    margin-right: auto; 
    margin-left: auto;
}
#btn1{
    padding: 12px;
    border-radius: 8px;
    margin-right: auto;
    margin-left: auto;
    border: 1px solid #8080803b;
    margin-top: 22px;
}
</style>
</head>
<body>

<div id="container">
  
<form id="cont">
   <button type="button" class="btn btn-primary" id="btn" onclick="submitForm()">Submit</button>

</form>
</div>
<button id="btn1">Add More</button>

<script>
  // Create input element
  $(document).ready(function() {
    $("#btn1").click(function(){
    $("#cont").append('<b><input type="text" name="question" /></b><br> <textarea col="5" rows="10" name="answer"></textarea><br>');

    function submitForm() {
        // Get form data
        var formData = new FormData(document.getElementById('cont'));

        // Send an AJAX request
        fetch('{{ url("append-store-data") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data as needed
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }


  });

  // Append both elements to the container
});
</script>

</body>
</html>
