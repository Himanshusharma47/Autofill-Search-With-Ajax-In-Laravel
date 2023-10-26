<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>AutoFill Search</title>
</head>
<body>
    <h2>Autofill Search</h2>
    <div class="search-container">
        <!-- Input field for user to type their search query -->
        <input type="text" name="search" id="search" autofocus>
        <div class="list"></div>
    </div>
    <!-- Include jquery  -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        //jquery function
        $(document).ready(function(){
            
            $('#search').on('keyup', function(){
                // Get the value entered by the user
                let val = $(this).val();
                // Send an AJAX request to the 'search' route with the search query
                $.ajax({
                    url: '{{ route("search") }}',
                    type: 'post',
                    data: 'name='+val+'&_token={{csrf_token()}}',
                    success: function(data){
                        $('.list').html(data);
                    }
                });
            });

            // Attach a click event listener to the list items
            $('.list').on('click','li',function(){
                let val = $(this).text();
                let cid = $(this).val();
                // Set the search input field value to the clicked item's text
                $('#search').val(val);
                // Clear the list of search results
                $('.list').html('');               
            }); 
        });
    </script>
</body>
</html>
