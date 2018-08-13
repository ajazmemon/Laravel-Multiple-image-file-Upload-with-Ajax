<!doctype html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Laravel Uploading</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <style>

            .container {

                margin-top:2%;

            }

        </style>

    </head>

    <body>

        @if (count($errors) > 0)

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <div class="container">

            <div class="row">

                <div class="col-md-2"> <img src="/32114.svg" width="80" /></div>

                <div class="col-md-8"><h2>Laravel Multiple File Uploading With Bootstrap Form</h2>

                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">

                    <form action="/multiuploads" method="post" enctype="multipart/form-data" id="btnsubmit">

                        {{ csrf_field() }}

                        <div class="form-group">

                            <label for="Product Name">Product Name</label>

                            <input type="text" name="name" class="form-control" id="name" >

                        </div>

                        <label for="Product Name">Product photos (can attach more than one):</label>

                        <br />

                        <input type="file" class="form-control" name="photos[]" multiple id="image" />

                        <br /><br />

                        <input type="submit" class="btn btn-primary" value="Upload" id="upload123" />

                    </form>

                </div>

            </div>

        </div>

    </body>

</html>
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
    
    $("#btnsubmit").on('submit', function (e) {
        e.preventDefault();
        
        var form = $('#btnsubmit')[0];
        var formData = new FormData(form);
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'multiuploads',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
                alert(response.status);
            }
        });

    });
});
</script>