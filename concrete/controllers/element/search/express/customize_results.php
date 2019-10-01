<?php
namespace Concrete\Controller\Element\Search\Express;

use Concrete\Controller\Element\Search\CustomizeResults as BaseCustomizeResultsController;

/**
 * @since 8.2.1
 */
class CustomizeResults extends BaseCustomizeResultsController
{

    public function getElement()
    {
        return 'express/search/customize_results';
    }

}
