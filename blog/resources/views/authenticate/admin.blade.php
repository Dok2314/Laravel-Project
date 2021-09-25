<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
@include('session.success')
  @if($alert = session()->pull('alert'))
  <div class="alert alert-success mb-0 py-2" style="text-align:center; font-size:15px; font-weight:bold;">
  {{$alert}}
  </div>
  @endif
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Главная</a></li>
          @can('create-teacher-view')
          <a href="{{route('createTeacher')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Создать Учителя</button></a>
          @endcan
          @can('create-teacher-view')
          <a href="{{route('createSubject')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Создать Предмет</button></a>
          @endcan
          @can('create-teacher-view')
          <a href="{{route('allTeacher')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Все Учителя</button></a>
          @endcan
          @can('create-teacher-view')
          <a href="{{route('newQuestion')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Создать Вопрос</button></a>
          @endcan
          @can('create-teacher-view')
          <a href="{{route('viewAnswer')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Создать Ответ</button></a>
          @endcan
        </ul>

        <div class="text-end">
          <a href="{{route('user.logout')}}"><button type="button" class="btn btn-warning">Выйти</button></a>
        </div>
      </div>
    </div>
  </header>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/first.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/second.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/third.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
    @can('create-teacher-view')
    <h1>Это страница админа!</h1>
    @endcan
    @can('create-teacher-view')
    <h2>Здесь вы можете создать посты, учителей, предметы, вопросы, ответы!</h2>
    @endcan
    @cannot('create-teacher-view')
    <h1>Гостевая</h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/7lcNXqR2RyA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endcannot
    @can('create-teacher-view')
    <a href="{{route('index')}}"><button type="button" class="btn btn-primary" style="margin-left:20px;">Создать Пост</button></a>
    @endcan
</body>
</html>