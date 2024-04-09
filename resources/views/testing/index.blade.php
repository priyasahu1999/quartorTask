<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form id="myForm" action="{{ url('submit') }}" method="post"> 
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <button type="submit" id="submitBtn">Submit</button>
        </form> 
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#submitBtn').on('click', function () {
                var formData = $('#myForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/submit', // Replace with your Laravel route
                    data: formData,
                    success: function (data) {
                        console.log('Data submitted successfully');
                        // Handle success response
                    },
                    error: function (error) {
                        console.log('Error submitting data');
                        // Handle error response
                    }
                });
            });
        });
    </script>

</body>
</html>