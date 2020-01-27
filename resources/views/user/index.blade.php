<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>index page</title>
    </head>
    <body>
        <header>
            <h3 class="text-align-left mt-3 ml-3">{{$user->name}}</h3>
        
            <ul class="nav justify-content-end mr-5">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{action('AdminUserController@index')}}">Login Page</a>
                </li>
            </ul>
        </header>
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><a href="{{action('WorkController@index')}}" class="text-secondary">Work</a></h5>
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{"total contents amount: ".$user->works()->get()->count()}}</p>
                    </div>
                </div>
                </div>
                <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><a href="{{action('StudyController@index')}}" class="text-secondary">Study</a></h5>
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{"total contents amount: ".$user->studies()->get()->count()}}</p>
                    </div>
                </div>
                </div>
                <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><a href="{{action('FamilyController@index')}}" class="text-secondary">Family</a></h5>
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{"total contents amount: ".$user->families()->get()->count()}}</p>
                    </div>
                </div>
                </div>
                <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><a href="{{action('HobbyController@index')}}" class="text-secondary">Hobby</a></h5>
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{"total contents amount: ".$user->hobbies()->get()->count()}}</p>
                    </div>
                </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><a href="{{action('CookingController@index')}}" class="text-secondary">Cooking</a></h5>
                        </div>
                    <div class="card-body">
                        <p class="card-text">{{"total contents amount: ".$user->cooks()->get()->count()}}</p>
                    </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><a href="{{action('SportController@index')}}" class="text-secondary">Sport</a></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{"total contents amount: ".$user->sports()->get()->count()}}</p>
                    </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>