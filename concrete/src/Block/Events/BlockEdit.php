<?php
namespace Concrete\Core\Block\Events;

use Concrete\Core\Block\Block;
use Concrete\Core\Page\Page;

/**
 * @since 5.7.5.9
 */
class BlockEdit extends BlockEvent
{

    public function __construct(Block $block, Page $page, array $arguments = array())
    {
        parent::__construct($block, $arguments);
        $this->setArgument('page', $page);
    }

}
