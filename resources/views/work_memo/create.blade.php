<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <title>user main ui</title>

</head>
<body>


    <form method="POST" action="{{action('WorkMemoController@store')}}">
            @csrf 
            <input name="work_id" type="hidden" value="{{$work->id}}">

            <label for="content">
                メモ
            </label>
            <textarea id="content" name="content" rows=4 placeholder="メモの内容を入力してください"></textarea>
        <button type="submit">送信する</button>
    </form>
   
</body>
</html>