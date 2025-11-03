<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Http\Requests\StoreAdmissionRequest;
use Carbon\Carbon;

class AdmissionController extends Controller
{
    public function create()
    {
        return view('admissions.create');
    }
    public function store(StoreAdmissionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['student_dob'] = Carbon::createFromFormat('d/m/Y', $validatedData['student_dob'])->format('Y-m-d');
        $validatedData['status'] = 'new';
        try {
            Admission::create($validatedData);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['general' => 'Đã có lỗi xảy ra, vui lòng thử lại sau.']);
        }
        return redirect()->route('admissions.create')
            ->with('success', 'Đăng ký thành công! Nhà trường sẽ liên hệ lại với bạn sớm nhất.');
    }
}
