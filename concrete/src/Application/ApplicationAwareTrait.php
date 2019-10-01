<?php

namespace Concrete\Core\Application;

/**
 * Trait ApplicationAwareTrait
 * A trait used with ApplicationAwareInterface
 * @since 8.0.0
 */
trait ApplicationAwareTrait
{

    /** @var \Concrete\Core\Application\Application */
    protected $app;

    /**
     * Setter method for the application
     * @param \Concrete\Core\Application\Application $app
     */
    public function setApplication(Application $app)
    {
        $this->app = $app;
    }

}
