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
        <input type="text" name="search" id="search" autofocus>
        <div class="list"></div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#search').on('keyup', function(){
                let val = $(this).val();
                $.ajax({
                    url: '{{ route("search") }}',
                    type: 'post',
                    data: 'name='+val+'&_token={{csrf_token()}}',
                    success: function(data){
                        // Use console.log to output data to the console, not echo.
                        $('.list').html(data);
                    }
                });
            });
            $('.list').on('click','li',function(){
                let value = $(this).text();
                $('#search').val(value);
                $('.list').html('');

            });
        });
    </script>
</body>
</html>
