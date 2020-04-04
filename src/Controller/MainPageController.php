<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\InputDataType;
use App\Service\InputDataService;
use App\Utils\Utils;

class MainPageController extends AbstractController 
{

    /**
     * @param Request $request
     * @param InputDataService $inputDataService
     * @param Utils $utils
     * @return Response
     */
    public function index(Request $request, InputDataService $inputDataService, Utils $utils):Response
    {
        $message = '';
        $form = $this->createForm(InputDataType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data = $form->getData();
            $number = $data['sizeOfSequence'];

            // check if number is it range
            if ($utils->checkIfNumberIsInRange($number)) { 
                // get greatest value               
                $greatestValue = $inputDataService->getGreatestValueOfSequence($number);

                $message = 'Największa wartość ciągu wynosi: ' . $greatestValue;
            } else {
                $message = 'Podana liczba musi być z zakresu od ' . $utils::MIN_RANGE . ' do ' . $utils::MAX_RANGE;
            }
        }

        return $this->render('inputDataForm.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }
    
}