<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\model_has_roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('employeeAvailable');
        $employees = Employees::join('Organization', 'Employees.Id_organization', '=', 'Organization.id')
        ->orderBy('Employees.id')
        ->get([
            'Organization.organization_name',
            'Employees.id',
            'Employees.name',
            'Employees.surname',
            'Employees.patronymic',
            'Employees.bth',
            'Employees.photo',
            'Employees.type_position',
        ]);
        // dd($employees);
        return view('/employees/index', compact('employees'));
    }

    public function userHasRole(User $user){
        $this->authorize('employeeAvailable');
        return $user->role->count() > 0;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('employeeAvailable');
        $listOrganizations = Organization::all();
        return view('employees.create', compact('listOrganizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('employeeAvailable');
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'bth' => 'required',
            'type_position' => 'required',
            'Id_organization' => 'required',
	    'password' => 'required',
            'email' => 'required'
        ]);

       $check = Employees::where([
            ['name', '=', $request->name],
            ['surname', '=', $request->surname],
            ['patronymic', '=', $request->patronymic],
            ['bth', '=', $request->bth]
        ])
        ->get();
        if( !sizeof($check) ){
            $employee = new Employees();
            $employee->id = request('id');
            $employee->name = request('name');
            $employee->surname = request('surname');
            $employee->patronymic = request('patronymic');
            $employee->bth = request('bth');
            $employee->Id_organization = request('Id_organization');
            if($request->hasFile('photo')){
                $employee->photo = $request->file('photo')->store('photos');
            }else{
                return '<h1>Фото НЕ загружено</h1>';
            }
            $employee->type_position = request('type_position');
            $employee->save();
            $user = new User();
            $user->name = $request->surname.' '.$request->name.' '.$request->patronymic;
            $user->email = $request->email;
            $user->password_text = $request->password;
            $user->password = Hash::make($request->password);
            $user->save();
            $model_has_role = new model_has_roles();
            switch (request('type_position')){
                case 1:
                    $filterType = 'Бухгалтер';
                    $model_has_role->role_id = 3;
                    $model_has_role->model_type = 'App\Models\User';
                    $model_has_role->model_id = $user->id; 
                    $model_has_role->save();
                    break;
                case 2:
                    $filterType = 'Администратор';
                    $model_has_role->role_id = 1;
                    $model_has_role->model_type = 'App\Models\User';
                    $model_has_role->model_id = $user->id; 
                    $model_has_role->save();
                    break;
                case 3:
                    $filterType = 'Менеджер';
                    $model_has_role->role_id = 4;
                    $model_has_role->model_type = 'App\Models\User';
                    $model_has_role->model_id = $user->id; 
                    $model_has_role->save();
                    break;
            }
	    return redirect()->route('employees.index');
        }else{
            // тут говорим что сотрудник уже существует
            return redirect()->route('employees.index')->with([
                'flash_message' => "Сотрудник ".$request->name." ".$request->surname." ".$request->patronymic." уже существует!",
                'flash_message_important' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee)
    {
        $this->authorize('employeeAvailable');
        return view('employees.index', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        $this->authorize('employeeAvailable');
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employee)
    {
        $this->authorize('employeeAvailable');
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'bth' => 'required',
            'type_position' => 'required'
        ]);
        if ($request->hasFile('photo')) {
            Storage::delete($employee->photo);
            $path = $request->file('photo')->store('photos');
            $photoParams = $request->all();
            $photoParams['photo'] = $path;
            $employee->update($photoParams);
            $data = [
                'name' => $request->name, 
                'surname' => $request->surname, 
                'patronymic' => $request->patronymic, 
                'bth' => $request->bth, 
                'type_position' => $request->type_position
            ];
            $employee->update($data);
            return redirect()->route('employees.index')->with('message','employee updated successfully');
        }else{
            $data = [
                'name' => $request->name, 
                'surname' => $request->surname, 
                'patronymic' => $request->patronymic, 
                'bth' => $request->bth, 
                'type_position' => $request->type_position
            ];
            $employee->update($data);
            return redirect()->route('employees.index')->with('message','employee updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        $this->authorize('employeeAvailable');
        $employee->delete();

       return redirect()->route('employees.index')->with('success','employee deleted successfully');
    }
    public function search(Request $request){
        $this->authorize('employeeAvailable');
        $text = $request->text;
        $employees = Employees::where('surname', 'LIKE' , "%{$text}%")->orderBy('name', 'ASC')->get();
        return view('/employees/index', compact('employees'));
    }
    public function filter(Request $request){
        $this->authorize('employeeAvailable');
        $filterType = $request->filter;
        switch ($filterType){
            case 1:
                $filterType = 'Бухгалтер';
                break;
            case 2:
                $filterType = 'Администратор';
                break;
            case 3:
                $filterType = 'Менеджер';
                break;
        }
        $employees = Employees::where('type_position', "{$filterType}")
	->join('Organization', 'Employees.Id_organization', '=', 'Organization.id')
        ->orderBy('Employees.id')
        ->get();;
        return view('/employees/index', compact('employees'));
    }
}
