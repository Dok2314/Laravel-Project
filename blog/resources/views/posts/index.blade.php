<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Посты</title>
        <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


</head>
<style>
    body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
</style>
<body>
    <h1 class="alert alert-info" style="text-align:center;">Новый Пост</h1>
    <div class='container-fluid'>
    <div class="row">
        <div class="col-lg-6">
        <form action="" class="form-control" style="border-radius:20px;">
        
        <span id="addP">Добавить Новый Пост</span>
            <span id="updateP">Обновить Пост</span>
        <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input type="text" name="name" id="name" placeholder="Имя" class="form-control">
        </div>
        <span class="text-danger" id="nameError"></span>
        <div class="form-group">
            <label for="email">Ваш e-mail:</label>
            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
        </div>
        <span class="text-danger" id="emailError"></span>
        <div class="form-group">
            <label for="message">Пост:</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Пост" class="form-control"></textarea>
        </div>
        <span class="text-danger" id="messageError"></span>
        <br>
        <input type="hidden" id="id">
        <button type="submit" id="updateButton" onclick="updateData()" class="btn btn-primary">Обновить</button>
        <button class="btn btn-success"  id="addButton" onclick="addData()" type="submit">Создать</button>
    </form>
        </div>
        <div class="col-lg-6 box-content">
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>


    <script>
        $('#addP').show();
        $('#addButton').show();
        $('#updateButton').hide();
        $('#updateP').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        function allData(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/posts/all",
                success:function(response){
                    var data = ""
                    $.each(response, function(key,value){
                        data = data + "<tr>"
                        data = data + "<td>"+value.id+"</td>"
                        data = data + "<td>"+value.name+"</td>"
                        data = data + "<td>"+value.email+"</td>"
                        data = data + "<td>"+value.message+"</td>"
                        data = data + "<td>"
                        data = data + "<button class='btn btn-sm btn-primary mr-2' onclick='editData("+value.id+")'>Редактировать</button>"
                        data = data + "<button class='btn btn-sm btn-danger' onclick='deleteData("+value.id+")'>Удалить</button>"
                        data = data + "</td>"
                        data = data + "</tr>"
                    });
                    $('tbody').html(data);
                }
            });
        }
        allData();
        function clearData(){
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');   
            $('#nameError').text('');
            $('#emailError').text('');
            $('#messageError').text('');
        }
        $('#addButton').click(function(e){
            e.preventDefault();
        });
        function addData(){
           var name = $('#name').val();
           var email = $('#email').val();
           var message = $('#message').val();           
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {name:name,email:email,message:message},
                url: "/post/store/",
                success:function(data){
                    allData();
                    clearData();
                    const Msg = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Пост успешно сохранен!',
                    showConfirmButton: false,
                    timer: 1500 
                    })  
                    Msg.fire({
                    icon: 'success',
                    title: 'Пост успешно сохранен!',
                    })                      
                },
                error:function(error){
                    Swal.fire({
                    icon: 'error',
                    title: 'Ой...',
                    text: 'Что-то пошло не так',
                    })
                   $('#nameError').text(error.responseJSON.errors.name);
                    $('#emailError').text(error.responseJSON.errors.email);
                    $('#messageError').text(error.responseJSON.errors.message);
                }
            });
        }
        function editData(id){
           $.ajax({
            type: "GET",
            dataType: "json",
            url: "/posts/edit/"+id,
            success:function(data){
            $('#addP').hide();
            $('#addButton').hide();
            $('#updateButton').show();
            $('#updateP').show();

            $('#id').val(data.id);
            
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#message').val(data.message); 
            console.log(data);  
            }
           });
        }
        $('#updateButton').click(function(e){
            e.preventDefault();
        });
        $('#updateButton').click(function(e){
            e.preventDefault();
        });
        function updateData(){
            
           var id = $('#id').val();
           var name = $('#name').val();
           var email = $('#email').val();
           var message = $('#message').val(); 

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {name:name,email:email,message:message},
                url: "/posts/update/"+id,
                success:function(data){
                    $('#addP').hide();
                    $('#addButton').hide();
                    $('#updateButton').show();
                    $('#updateP').show();
                    clearData();
                    allData();
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Пост успешно обновлен!',
                    showConfirmButton: false,
                    timer: 1500
                    }) 
                },
                error:function(error){
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#emailError').text(error.responseJSON.errors.email);
                    $('#messageError').text(error.responseJSON.errors.message);
                    Swal.fire({
                    icon: 'error',
                    title: 'Ой...',
                    text: 'Что-то пошло не так!',
                    })
                }
            }); 
        }
        function deleteData(id){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/posts/delete/"+id,
                success:function(data){
                    $('#addP').show();
                    $('#addButton').show();
                    $('#updateButton').hide();
                    $('#updateP').hide();
                    clearData();
                    allData();
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Пост успешно удален!',
                    showConfirmButton: false,
                    timer: 1500
                    }) 
                    console.log(data);
                },
                error:function(error){
                    console.log(error);
                }   
            }); 
        }
    </script>
</body>
</html>