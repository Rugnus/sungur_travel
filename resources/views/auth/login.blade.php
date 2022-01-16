@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Авторизация</div>

                <div class="card-body" style="background-color: #D3E4CD;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="margin-bottom: 15px">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="text-align: end;">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="text-align: end;">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="margin-bottom: 15px">
                                        Запомнить меня
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="padding: 10px; color: #fff; background-color: #009DAE; border-radius: 15px; box-shadow: 0px 1px 12px 2px rgba(34, 60, 80, 0.4);">
                                    Войти
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='card mt-4'>
                    <div class="card-header">Роли</div>
                    <div class="card-body">
                        <table class="table">
                        <thead style="background-color: #B4FE98;">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Должность</th>
                            <th scope="col">Login</th>
                            <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #F6F6F6;">
                              <?php
                            use App\Models\User;
                            use Illuminate\Support\Facades\DB;

                            $users = User::join('model_has_roles', 'users.id','=','model_has_roles.model_id')
                             ->join('roles', 'model_has_roles.role_id','=','roles.id')
                             ->orderBy('users.id')
                             ->get([
                                 DB::raw('roles.name AS type_position'),
                                 'users.id',
                                 'users.name',
                                 'users.email',
                                 'users.password_text',
                             ]);
                            
                            ?>
                            @foreach($users as $user)
                            <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->type_position }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password_text }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
