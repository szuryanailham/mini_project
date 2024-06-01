<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Mini project</title>
</head>
 {{--  =======================  END SIDEBAR SECTION ================ --}}
<body class="bg-black text-white">
    @yield('container-fluid')
    {{--  =======================  END SIDEBAR SECTION ================ --}}
    <script>
$( "#replay" ).on( "click", function() {
    $(this).closest("article").find("form").toggleClass("hidden");
} );
    </script>
</body>
</html>