<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ResultsFields;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ServiceController extends Controller
{

    public function index()
    {
        $listServices = Service::all();

        return view('user.service.index', [
            'listServices' => $listServices
        ]);
    }

    public function listRequite()
    {
        $listStudentServices = UserService::orderBy('created_at', 'DESC')->get();
        return view('user.service.list-service', [
            'listStudentServices' => $listStudentServices
        ]);
    }

    public function createRequiteService(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $fields = $request->fields;
            foreach ($fields as $key => $field) {
                $resultsField = new ResultsFields();
                $resultsField->fields_id = $key;
                $resultsField->user_id = Auth::id();
                $resultsField->content = $field instanceof UploadedFile ? $this->handleFile($field) : $field;
                $resultsField->save();
            }

            $user_service = new UserService();
            $user_service->user_id = Auth::id();
            $user_service->service_id = $id;
            $user_service->status = UserService::STATUS_INCOMPLETE;
            $user_service->payment_status = UserService::FEE_UNPAID;
            $user_service->save();

            DB::commit();
            return redirect()->route('student.service')->with('success', 'Success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('student.service')->with('error', 'Fail');
        }
    }

    public function handleFile($file)
    {
        $nameFile = Carbon::now()->timestamp . $file->getClientOriginalName();

        Storage::putFileAs('service/student',$file,"$nameFile");
        return $url = 'service/student/' . $nameFile;
    }
}
