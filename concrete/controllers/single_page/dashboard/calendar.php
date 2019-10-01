<?php
namespace Concrete\Controller\SinglePage\Dashboard;

use Concrete\Core\Page\Controller\DashboardPageController;
use Concrete\Core\Calendar\Utility\Preferences;

/**
 * @since 8.3.0
 */
class Calendar extends DashboardPageController
{
    public function view()
    {
        $preferences = $this->app->make(Preferences::class);
        /**
         * @var $preferences Preferences
         */
        $this->redirect($preferences->getPreferredViewPath());
    }
}
