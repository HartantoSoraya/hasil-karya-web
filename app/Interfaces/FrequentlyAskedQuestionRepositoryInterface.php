<?php

namespace App\Interfaces;

interface FrequentlyAskedQuestionRepositoryInterface
{
    public function getAllFrequentlyAskedQuestion();

    public function getFrequentlyAskedQuestionById(string $id);

    public function createFrequentlyAskedQuestion(array $data);

    public function updateFrequentlyAskedQuestion(array $data, string $id);

    public function deleteFrequentlyAskedQuestion(string $id);
}
