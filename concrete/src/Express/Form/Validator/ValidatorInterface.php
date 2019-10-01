<?php

namespace Concrete\Core\Express\Form\Validator;

use Concrete\Core\Entity\Express\Form;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Express\Form\Validator\Routine\RoutineInterface;

/**
 * @since 8.2.0
 */
interface ValidatorInterface
{

    function addRoutine(RoutineInterface $routine);

    /**
     * @return bool
     */
    function validate(Form $form, $requestType);


    /**
     * @return ErrorList
     */
    function getErrorList();

}