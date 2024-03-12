<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFrequentlyAskedQuestionRequest;
use App\Http\Requests\UpdateFrequentlyAskedQuestionRequest;
use App\Interfaces\FrequentlyAskedQuestionRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class FrequentlyAskedQuestionController extends Controller
{
    protected $frequentlyAskedQuestionRepository;

    public function __construct(FrequentlyAskedQuestionRepositoryInterface $frequentlyAskedQuestionRepository)
    {
        $this->frequentlyAskedQuestionRepository = $frequentlyAskedQuestionRepository;
    }

    public function index(Request $request)
    {
        $frequentlyAskedQuestions = $this->frequentlyAskedQuestionRepository->getAllFrequentlyAskedQuestion();

        return view('pages.admin.frequently-asked-question.index', compact('frequentlyAskedQuestions'));
    }

    public function create()
    {
        return view('pages.admin.frequently-asked-question.create');
    }

    public function store(StoreFrequentlyAskedQuestionRequest $request)
    {
        $data = $request->validated();
        $this->frequentlyAskedQuestionRepository->createFrequentlyAskedQuestion($data);
        Swal::toast('Frequently asked question created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.frequently-asked-question.index');
    }

    public function show($id)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionRepository->getFrequentlyAskedQuestionById($id);

        return view('pages.admin.frequently-asked-question.show', compact('frequentlyAskedQuestion'));
    }

    public function edit($id)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionRepository->getFrequentlyAskedQuestionById($id);

        return view('pages.admin.frequently-asked-question.edit', compact('frequentlyAskedQuestion'));
    }

    public function update(UpdateFrequentlyAskedQuestionRequest $request, $id)
    {
        $data = $request->validated();
        $this->frequentlyAskedQuestionRepository->updateFrequentlyAskedQuestion($data, $id);
        Swal::toast('Frequently asked question updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.frequently-asked-question.index');
    }

    public function destroy($id)
    {
        $this->frequentlyAskedQuestionRepository->deleteFrequentlyAskedQuestion($id);
        Swal::toast('Frequently asked question deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.frequently-asked-question.index');
    }
}
