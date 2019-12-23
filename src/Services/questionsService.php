<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Choice;
use App\Entity\Question;
use App\Entity\QuestionList;
use Symfony\Component\Filesystem\Filesystem;

class questionsService
{
    private $questionsPath = "../public/questions.json";

    private $questions;

    /**
     * @var googleTranslateService
     */
    private $googleTranslateService;
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(googleTranslateService $googleTranslateService, Filesystem $filesystem)
    {
        $this->googleTranslateService = $googleTranslateService;

        $questionsJson = file_get_contents($this->questionsPath);
        $questions = json_decode($questionsJson, true);
        $this->questions = array_reverse($questions);
        $this->filesystem = $filesystem;
    }

    /**
     *
     *
     * @return QuestionList
     * @throws \Exception
     * @access
     */
    public function getAllQuestions(): QuestionList
    {
        $questionList =  new QuestionList();
        $questions = [];
        foreach ($this->questions as $questionData)
        {
            $question = new Question();
            $question->setText($questionData['text']);
            $choices = [];
            foreach ($questionData['choices'] as $choiceData) {
                $choice = new Choice();
                $choice->setText($choiceData['text']);
                $choices[] = $choice;
            }
            $question->setChoices($choices);
            $question->setCreatedAt(new \DateTime($questionData['createdAt']));
            $question->setText($questionData['text']);
            $questions[] = $question;
        }
        $questionList->setQuestions($questions);
        return $questionList;
    }

    public function translateAllQuestions(string $target): QuestionList
    {
        $questionList =  new QuestionList();
        $questions = [];
        foreach ($this->questions as $questionData)
        {
            $question = new Question();
            $question->setText($this->googleTranslateService->translate($questionData['text'], $target));
            $choices = [];
            foreach ($questionData['choices'] as $choiceData) {
                $choice = new Choice();
                $choice->setText($this->googleTranslateService->translate($choiceData['text'], $target));
                $choices[] = $choice;
            }
            $question->setChoices($choices);
            $question->setCreatedAt(new \DateTime($questionData['createdAt']));
            $question->setText($this->googleTranslateService->translate($questionData['text'], $target));
            $questions[] = $question;
        }
        $questionList->setQuestions($questions);
        return $questionList;
    }

    public function  addQuestion(Question $question)
    {
        try {
            $questionList = $this->getAllQuestions();
        } catch (\Exception $e) {
        }
        $questionList->addQuestion($question);
//        var_dump(json_encode($questionList, JSON_FORCE_OBJECT));exit;

        file_put_contents($this->questionsPath, json_encode($questionList, JSON_FORCE_OBJECT));
//        $this->filesystem->dumpFile($this->questionsPath, json_encode($questionList, JSON_FORCE_OBJECT));
    }

}
