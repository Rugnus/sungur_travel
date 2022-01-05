@extends ('layout')
@section ('content')

<div class="d-flex flex-row justify-content-between">
    <div><h2>Список сотрудников</h2></div>
    <div class="d-flex justify-content-end" style="align-self: center;"><a href="employees/create" class="btn btn-success mb-2">Добавить нового сотрудника</a></div>
</div>
@if (\Session::has('flash_message'))
    <div class="alert alert-danger">
        <p>{!! \Session::get('flash_message') !!}</p>
    </div>
@endif
<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
    @if (count($employees) > 0)
    @foreach ($employees as $employee)
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 card" style="width: 50rem;">
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Имя:</strong>
                <p>{{ $employee->name }}</p>
                <strong>Фамилия:</strong>
                <p>{{ $employee->surname }}</p>
                <strong>Отчество:</strong>
                <p>{{ $employee->patronymic }} </p>
                <strong>Дата рождения:</strong>
                <p>{{ $employee->bth }} </p>
                <strong>Должность сотрудника:</strong>
                <p>{{$employee->type_position }} </p>
                <strong>Организация:</strong>
                <p>{{$employee->organization_name}}</p> 
            </div>
            <div class="p-2 bd-highlight" >
                <strong>Фото сотрудника:</strong>
                <p><img src="{{ asset('storage/' .$employee->photo) }}" alt="photo" height='200px'> </p>
		<a href="{{ Storage::url($employee->photo) }}" download class="btn btn-outline-success">Скачать изображение</a>
            </div>
            <div class="p-2 bd-highlight d-flex  align-items-end">
                <div>
                    <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Изменить</a>
                </div>
                <div>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  type="submit"  class="btn btn-danger ms-2">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @else
        <p>Записей не найдено...</p>
    @endif
    </div>
@endsection

@section ('form')
    <form class="d-flex" method="get" action="/employees/filter">   
        <select id="position" name='filter' class="form-select" aria-label="Default select example" required >
            <option disabled>Фильтр по должности</option>
            <option value="1">Бухгалтер</option>
            <option value="2">Администратор</option>
            <option value="3">Менеджер</option>
        </select>
        <button type='submit' class="btn btn-outline-primary" style="margin-left:10px; margin-right:20px;">Filter</button>
    </form>
    <form class="d-flex" method="get" action="/employees/search">
        <input class="form-control me-2" type="text" id="search" name="text" placeholder="Поиск по фамилии" aria-label="Search">
        <button type='submit' class="btn btn-outline-primary">Search</button>
    </form>
    
@endsection

@section ('title')
<title>Сотрудники</title>
@endsection
    
