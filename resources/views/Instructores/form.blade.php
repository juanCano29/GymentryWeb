<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Instructor Form</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="comment">Content:</label>
                                <textarea class="form-control" rows="5" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
