<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$teacher->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align:center;">Вы выбираете предметы для учителя <span style="color:blue;">({{$teacher->name}})</span></h1>
    <form action="" method="POST">
        @csrf
    <table>
        @foreach($subjects as $subject)
        <tr>                                           
            <td><input type="checkbox" value="{{$subject->id}}" name="subject_id[]" <?php if(in_array($subject->id,$subject_ids)) echo 'checked="TRUE"';?>></td>
            <td>{{$subject->subject}}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
   <input type="submit" class="btn btn-success">
   </form>
</body>
</html>