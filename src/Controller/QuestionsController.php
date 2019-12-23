<?php

namespace App\Controller;

use App\DataTransformer\QuestionsTransformer;
use App\Dto\Request\questionRequest;
use App\Entity\Question;
use App\Services\googleTranslateService;
use App\Services\questionsService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;




class QuestionsController extends AbstractController
{

    /**
     * @var googleTranslateService
     */
    private $googleTranslateService;
    /**
     * @var questionsService
     */
    private $questionsService;

    public function __construct(
        googleTranslateService $googleTranslateService,
        questionsService $questionsService
    )
    {
        $this->googleTranslateService = $googleTranslateService;
        $this->questionsService = $questionsService;
    }

    /**
     * @Route("/questions", name="Translate questions GET", methods={"GET"})
     * @param Request            $request
     * @param ValidatorInterface $validator
     *
     * @access public
     * @return JsonResponse
     * @throws \Exception
     */
    public function translateQuestions(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $lang = $request->query->get('lang');
        $localeConstraint = new Assert\Locale();
        $notNullConstrain = new Assert\NotNull();
        $notBlankConstrain = new Assert\NotBlank();

        // use the validator to validate the value
        $validationErrors = $validator->validate(
            $lang,
            [$localeConstraint, $notNullConstrain, $notBlankConstrain]
        );

        if (count($validationErrors) > 0) {
            return $this->json($validationErrors[0]->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $questions = $this->questionsService->translateAllQuestions($lang);
        return $this->json($questions->getQuestions(),Response::HTTP_OK);
    }

    /**
     * @Route("/questions", name="Translate questions POST", methods={"POST"})
     * @ParamConverter("questionRequest", converter="fos_rest.request_body")
     * @throws \Exception
     */
    public function createQuestion(questionRequest $questionRequest, ConstraintViolationListInterface $validationErrors): JsonResponse
    {
//        var_dump($questionRequest);
//        var_dump(Request::createFromGlobals()->getContent());
        $questionTransFormer =  new QuestionsTransformer();
        $question = $questionTransFormer->dtoToQuestion($questionRequest, new Question());
        $this->questionsService->addQuestion($question);
        $questions = $this->questionsService->getAllQuestions();
        if (count($validationErrors) > 0) {
            return $this->json($validationErrors, Response::HTTP_BAD_REQUEST);
        }
        return $this->json($questions->getQuestions(),Response::HTTP_OK);

    }
}
