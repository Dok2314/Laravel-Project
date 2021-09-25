<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align:center;">Вы тестируете учителя <span style="color:blue;">{{$teacher->name}}</span></h1>
    <h2 style="text-align:center;">Предметы учителя: ( @foreach($subject_of_teacher as $subject){{$subject->subject}} @endforeach)</h2>
    <div class="alert alert-info">
    <h1>@foreach($first_question as $question) {{$question->question}} @endforeach</h1>
    <form action="" method="POST" class="my-form">
        @csrf
        @foreach($first_and_second_answer as $answer)
        <input type="radio" name="answer_id[]" value="{{$answer->id}}">{{$answer->answer}}
        <br>
        @error('answer_id')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        @endforeach
        <br>
        <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
        <input type="submit" class="btn btn-success">
        <div class="mess"></div>
        </form>
    </div>
</body>
</html>