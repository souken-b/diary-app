<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>family page</title>
    </head>
    <body>
        <header class="mt-5">
            <h3 class="ml-5">{{"No.".$family->id}}</h3>
            <ul class="nav justify-content-end mr-5">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('usertop')}}">Top page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{action('FamilyController@index')}}">Back to index</a>
            </li>
            </ul>
        </header>
        <div class="container mb-5">
           
            <div class="row-cols-1 mt-5">
            <div class="btn-group mb-3" role="group">
                <form method="POST" action="{{action('FamilyController@edit',['family'=>$family])}}">
                    @csrf 
                    @method('GET')
                    <button class="btn btn-default mr-2">Edit</button>
                </form>
                <form method="POST" action="{{action('FamilyController@destroy',['family'=>$family])}}">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-default"　onclick="return ">Delete post</button>
                </form> 
            </div>
                <div class="card ">

                    <div class="card-header">
                        <span class="text-left"><h4>{{$family->title}}</h4></span>
                        <div class="text-right">
                            <span class=" mr-2">{{"last modified　".$family->updated_at->format('Y年m月d日H時i分')}}</span>
                            <span >{{"upload　".$family->created_at->format('Y年m月d日H時i分')}}</span>
                        </div> 
                    </div>
                
                    
                    <div class="card-body text-center">{{$family->content}}</div>
                </div>
            </div>
            <div class="row row-cols-2 mt-5">
                <div class="accordion col-7" id="accordionExample">
                
                    @if($family->family_memos()->select('content')->get() != null)
                        @foreach($family->family_memos()->select('id','content')->get() as $memo)
                            <div class="card ">
                                <div class="card-header" id="{{'heading'.$memo->id}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{'#collapse'.$memo->id}}" aria-expanded="true" aria-controls="{{'collapse'.$memo->id}}">
                                            {{str_limit($memo->content, 25)}}
                                            
                                        </button>
                                    </h2>
                                </div>
                            
                                <div id="{{'collapse'.$memo->id}}" class="collapse" aria-labelledby="{{'heading'.$memo->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{$memo->content}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
                <div class="card col-4 ml-3 px-0">
                    <div class="card-body text-center px-1 py-1 ">
                    <form method="POST" class="px-0 pt-0" action="{{action('FamilyMemoController@store')}}">
                        @csrf 
                        <input name="family_id" type="hidden" value="{{$family->id}}">
                            <textarea id="content" class="mx-0 " style="min-width: 100%" name="content" rows=15 placeholder="メモの内容を入力してください"></textarea>
                            <br>
                            <button type="submit" class="btn btn-default">
                                Add memo
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
                
            </div>
            

        </div>
    </body>
</html>

