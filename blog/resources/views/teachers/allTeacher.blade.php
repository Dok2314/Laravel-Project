<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все учителя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Главная</a></li>
          <li><a href="{{route('user.admin')}}" class="nav-link px-2 text-white">Админка</a></li>
        </ul>


        <div class="text-end">
          <a href="{{route('user.logout')}}"><button type="button" class="btn btn-warning">Выйти</button></a>
        </div>
      </div>
    </div>
  </header>
    <h1>Список Учителей</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Имя</th>
      <th scope="col">Выбрать Предмет</th>
      <th scope="col">Удалить Учителя</th>
    </tr>
  </thead>
  @include('session.success')
  <tbody>
      @foreach($teachers as $teacher)
    <tr>
      <th scope="row">{{$teacher->id}}</th>
      <td>{{$teacher->name}}</td>
      <td><a href="{{route('findTeacher',$teacher->id)}}"><button class="btn btn-primary">Предметы</button></a></td>
      <td><a href="{{route('delete',$teacher->id)}}"><button class="btn btn-danger">Удалить</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>