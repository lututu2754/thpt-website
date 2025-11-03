<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_read'] = false;
        try {
            Contact::create($validatedData);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['general' => 'Đã có lỗi xảy ra, vui lòng thử lại sau.']);
        }
        return redirect()->route('contact.create')
            ->with('success', 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.');
    }
}
