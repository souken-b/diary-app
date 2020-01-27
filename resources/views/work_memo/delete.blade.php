<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>work index page</title>
    </head>
    <body>

        <header>
            <h3 class="text-left mt-3 ml-3">Work Content</h3>
            <ul class="nav justify-content-end mr-5">
                <li class="nav-item">
                <a class="nav-link active" href="{{url('usertop')}}">トップページへ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{action('WorkController@show',['work'=>$work]))}}">記事に戻る</a>
                </li>
                
            </ul>
        </header>
        <div class="container ">
            <div class="row-cols-1 mt-5">

                @foreach($user->works()->select('id','title','content','created_at','updated_at')->get() as $work)
                <div class="card mb-2">
                    <div class="card-header">
                        @if($work->title != null)
                        <span class="text-left"><h4><a class="text-secondary" href="{{action('WorkController@show',['work'=>$work])}}">{{$work->title}}</a></h4></span>
                        <div class="text-right">
                            <span class=" mr-3">{{"前回の編集　".$work->updated_at->format('Y年m月d日H時i分')}}</span>
                            <span class="">{{"投稿の作成日　".$work->created_at->format('Y年m月d日H時i分')}}</span>
                            
                        </div> 
                        @else
                        <span class="text-left"><h4><a class="text-secondary" href="{{action('WorkController@index')}}">タイトルがありません</a></h4></span>
                        @endif

                    </div>
                
                    @if($work->content != null)
                        <div class="card-body text center">{{$work->content}}</div>
                    @else
                        <div class="card-body text center">内容が記入されていません</div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </body>
</html>


