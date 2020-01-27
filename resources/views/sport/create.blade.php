<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>sport index page</title>
    </head>
    <body>

        <header>
            <h3 class="text-left mt-3 ml-3">Create post</h3>
        </header>
        <div class="container ">
            <div class="row-cols-1 mt-5">
                <form method="POST" action="{{action('SportController@store')}}">
                    @csrf 
                    <input name="user_id" type="hidden" value="{{$user->id}}">
                    <div class="card ">
                        <div class="card-header ">
                            <textarea id="title" name="title" class="py-1" style="min-width: 100%" rows=1 placeholder="タイトルを入力してください"></textarea>
                        </div>
                        <div class="card-body text center">
                            <textarea id="content" name="content" class="py-1" style="min-width: 100%" rows=7 placeholder="本文を入力してください"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary mt-3">Submit</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="location.href='{{action('SportController@index')}}'">cancel</button>

                    
                </form>
                
            </div>
        </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>    
    </body>
</html>