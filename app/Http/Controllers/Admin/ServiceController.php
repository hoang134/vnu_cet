<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Fields;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function index()
    {
        $listServices = Service::all();
        return view('admin.service.index', [
            'listServices' => $listServices
        ]);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function save(Request $request)
    {

        DB::beginTransaction();
        try {
            $fields = $request->fields;

            $service = new Service();
            $service->name = $request->name;
            $service->fee = $request->fee;
            $service->save();

            foreach ($fields as $item) {

                $field = new Fields();
                $field->service_id = $service->id;
                $field->name = $item['name'];
                $field->type = $item['type'];
                $field->validate = $item['validate'];
                $field->value = array_key_exists('values', $item) ? json_encode($item['values']) : '';
                $field->save();
            }

            DB::commit();
            return redirect()->route('admin.service.index')->with('success', 'Success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.service.index')->with('error', 'Error');
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $fields = $request->fields;

            $service = Service::find($id);
            $service->name = $request->name;
            $service->fee = $request->fee;
            $service->save();

            $service->fields()->delete();

            foreach ($fields as $item) {

                $field = new Fields();
                $field->service_id = $service->id;
                $field->name = $item['name'];
                $field->type = $item['type'];
                $field->validate = $item['validate'];
                $field->value = array_key_exists('values', $item) ? json_encode($item['values']) : '';
                $field->save();
            }

            DB::commit();
            return redirect()->route('admin.service.index')->with('success', 'Success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.service.index')->with('error', 'Error');
        }
    }

//    public function SaveConfig(Request $request)
//    {
//        //dd($request->all());
//        $fields = new Fields();
//        $fields->service_id = $request->id;
//        $fields->name = $request->name;
//        $fields->type = $request->type;
//        if ($request->createGroup != null)
//            $fields->group = $request->createGroup;
//        else
//            $fields->group = $request->group;
//        $fields->save();
//    }

    public function lisRegister()
    {
        $listStudentServices = UserService::orderBy('created_at', 'DESC')->get();
        return view('admin.service.list-student-service', [
            'listStudentServices' => $listStudentServices
        ]);
    }

    public function handle($id)
    {
        $userService = UserService::find($id);
        $student = $userService->user;
        $service = Service::find($userService->service_id);
        //$service->fields->first()->resultsFeld->content;
        return view('admin.service.handle',[
            'student' => $student,
            'service' => $service,
        ]);
    }
}
