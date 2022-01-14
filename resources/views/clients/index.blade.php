@extends ('layout')
@section ('content')

<div class="d-flex flex-row justify-content-between">
    <div><h2>Список клиентов</h2></div>
    <div class="d-flex justify-content-end" style="align-self: center; padding: 10px; background-color: #17D7A0; border-radius: 15px; box-shadow: 0px 1px 12px 2px rgba(34, 60, 80, 0.4);"><a href="clients/create" class="" style="color: #FFF; text-decoration: none; ">Добавить нового клиента</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center mt-3">
@if (count($clients) > 0)
    @foreach ($clients as $client)
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 card" style="width: 100%; background-color: #F2FFE9; border-radius: 20px; box-shadow: 0px 2px 8px 0px rgba(34, 60, 80, 0.2);">
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Имя:</strong>
                <p>{{ $client->name }}</p>
                <strong>Фамилия:</strong>
                <p>{{ $client->surname }}</p>
                <strong>Отчество:</strong>
                <p>{{ $client->patronymic }} </p>
                <strong>Дата рождения:</strong>
                <p>{{ $client->bth }} </p>
                <strong>Серия паспорта:</strong>
                <p>{{ $client->series_passport}} </p>
                <strong>Номер паспорта:</strong>
                <p>{{$client->number_passport }} </p>
            </div>
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Дата выдачи паспорта:</strong>
                <p>{{$client->date_of_issue }} </p>
                <strong>Дата окончания срока действия</strong>
                <p>{{$client->expiration_date }} </p>
                <strong>Орган выдавший документ:</strong>
                <p>{{$client->government_agency }} </p>
                <strong>Место рождения:</strong>
                <p>{{$client->place_of_birth }} </p>
                <strong>Пол:</strong>
                <p>{{$client->type_sex }} </p>
                <strong>Статус клиента:</strong>
                <p>{{$client->type_client }}</p>
            </div>
            <div class="p-2 bd-highlight d-flex  align-items-end">
                <div style="padding: 10px; background-color: #009DAE; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4);">
                    <a class="" href="{{ route('clients.edit', $client->id) }}" style="color: #FFF; text-decoration: none;">Изменить</a>
                </div>
                <div>
                    <form action="{{ route('clients.destroy',$client->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  type="submit"  class="btn btn-danger ms-2" style="padding: 10px; background-color: #CD1818; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4);">Удалить</button>
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
    <form class="d-flex" method="get" action="/clients/filter">
        <select id="typeClient" name='filter' class="form-select" aria-label="Default select example" required >
                <option disabled>Фильтр по статусу </option>
                <option value="1">VIP</option>
                <option value="2">Привилегированный</option>
                <option value="3">Обычный</option>
        </select>
        <button type='submit' class="btn btn-outline-primary" style="margin-left:10px; margin-right:20px;">Фильтр</button>
    </form>
    <form class="d-flex" method="get" action="/clients/search">
        <input class="form-control me-2" type="text" id="search" name="text" placeholder="Поиск по фамилии" aria-label="Search">
        <button type='submit' class="btn btn-outline-primary">Поиск</button>
    </form>
@endsection

@section ('title')
<title>Клиенты</title>
@endsection