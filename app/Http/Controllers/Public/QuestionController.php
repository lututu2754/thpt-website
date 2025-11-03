<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
        $faqs = Question::where('status', 'answered')
            ->where('is_public', true)
            ->latest()
            ->get();
        return view('qa.index', compact('faqs'));
    }
    public function store(StoreQuestionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = 'new';
        $validatedData['is_public'] = false;
        try {
            Question::create($validatedData);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['general' => 'Đã có lỗi xảy ra, vui lòng thử lại sau.']);
        }
        return redirect()->route('qa.index')
            ->with('success', 'Gửi câu hỏi thành công! Chúng tôi sẽ trả lời sớm nhất.');
    }
}
