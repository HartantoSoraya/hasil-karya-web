<?php

namespace App\Repositories;

use App\Interfaces\FrequentlyAskedQuestionRepositoryInterface;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\DB;

class FrequentlyAskedQuestionRepository implements FrequentlyAskedQuestionRepositoryInterface
{
    public function getAllFrequentlyAskedQuestion()
    {
        return FrequentlyAskedQuestion::all();
    }

    public function getFrequentlyAskedQuestionById(string $id)
    {
        return FrequentlyAskedQuestion::findOrFail($id);
    }

    public function createFrequentlyAskedQuestion(array $data)
    {
        DB::beginTransaction();

        try {
            $frequentlyAskedQuestion = FrequentlyAskedQuestion::create($data);

            DB::commit();

            return $frequentlyAskedQuestion;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateFrequentlyAskedQuestion(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $frequentlyAskedQuestion = FrequentlyAskedQuestion::findOrFail($id);

            $frequentlyAskedQuestion->update($data);

            DB::commit();

            return $frequentlyAskedQuestion;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteFrequentlyAskedQuestion(string $id)
    {
        DB::beginTransaction();

        try {
            FrequentlyAskedQuestion::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
