@extends('template')
@section('title', 'Профиль')
@section('content')
    <style>
        #nameChangeBtn, #lastNameChangeBtn, #nameSaveBtn, #lastNameChangeBtn{
            color: #0d6efd;
            cursor: pointer;
        }
        #nameChangeBtn:hover, #lastNameChangeBtn:hover, #nameSaveBtn:hover, #lastNameSaveBtn:hover{
            color: #006a81;
        }
    </style>
    <div class="row">
        <div class="col-4">
            <img width="90%" src="{{auth()->user()->img}}" alt="">
            <form action="/changeAvatar" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="userAvatar">
                <input type="submit" class="btn btn-primary" value="Сменить изображение">
            </form>
        </div>
        <div class="col-8">
            <p>
                <strong>Имя: </strong>
                <span id="nameSpan">{{auth()->user()->name}}</span>
                <span id="nameChangeBtn" onclick="renderInput('nameSpan')">[изменить]</span>
                <span id="nameSaveBtn" hidden onclick="saveData('nameSpan')">[сохранить]</span>
            </p>
            <p>
                <strong>Фамилия: </strong>
                <span id="lastNameSpan">{{auth()->user()->lastname}}</span>
                <span id="lastNameChangeBtn" onclick="renderInput('lastNameSpan')">[изменить]</span>
                <span id="lastNameSaveBtn" hidden onclick="saveData('lastNameSpan')">[сохранить]</span>
            </p>
            <p><strong>E-mail: </strong> {{auth()->user()->email}}</p>
            <p>
                <a href="/addArticle" class="btn-primary btn">Добавить статью</a>
            </p>
        </div>
    </div>
    <script>
        // renderInput - это придуманная нами функция
        function renderInput(elementId){

            let span = document.getElementById(elementId);
            let value = span.innerText;
            span.innerHTML = `<input type='text' value="${value}">`;
            if(elementId === "nameSpan"){
                let saveBtn = document.getElementById('nameSaveBtn');
                let nameChangeBtn = document.getElementById('nameChangeBtn');
                saveBtn.hidden = false;
                nameChangeBtn.hidden = true;
            }else{
                let saveBtn = document.getElementById("lastNameSaveBtn");
                let lastNameChangeBtn = document.getElementById("lastNameChangeBtn");
                saveBtn.hidden = false;
                lastNameChangeBtn.hidden = true;
            }
        }
        function saveData(elementId){
            let span = document.getElementById(elementId);
            let input = span.firstChild;
            let token = document.querySelector('[name="_token"]').value;
            let formData = new FormData();
            formData.append('_token', token);
            if(elementId === "nameSpan"){
                formData.append('name', input.value);
            }else{
                formData.append('lastname', input.value);
            }
            fetch('/changeUserData', {
                method: "POST",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result === 'success'){
                        location.reload();
                    }
                });
        }
    </script>
@endsection
