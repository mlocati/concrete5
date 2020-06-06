<?php
namespace Concrete\Controller\Element\Dashboard\Navigation\Panel;

use Concrete\Core\Application\UserInterface\Dashboard\Navigation\FavoritesNavigationFactory;
use Concrete\Core\Application\UserInterface\Dashboard\Navigation\FullNavigationFactory;
use Concrete\Core\Controller\ElementController;
use Concrete\Core\Navigation\Modifier\NavigationStartingPointModifier;
use Concrete\Core\Navigation\Modifier\OpenToCurrentPageModifier;
use Concrete\Core\Navigation\Modifier\TopLevelOnlyModifier;
use Concrete\Core\Navigation\NavigationModifier;
use Concrete\Core\Page\Page;

class Section extends ElementController
{

    /**
     * @var FullNavigationFactory
     */
    protected $factory;

    /**
     * @var Page
     */
    protected $currentPage;

    /**
     * @var Page
     */
    protected $section;

    public function getElement()
    {
        return 'dashboard/navigation/nav';
    }

    public function __construct(Page $section, Page $currentPage, FullNavigationFactory $factory)
    {
        $this->section = $section;
        $this->currentPage = $currentPage;
        $this->factory = $factory;
    }


    public function view()
    {
        $navigation = $this->factory->createNavigation();
        $modifier = new NavigationModifier();
        $modifier->addModifier(new NavigationStartingPointModifier($this->section));
        $modifier->addModifier($this->app->make(OpenToCurrentPageModifier::class, ['currentPage' => $this->currentPage]));
        $this->set('navigation', $modifier->process($navigation));
    }

}
