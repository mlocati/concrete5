<?php
namespace Concrete\Core\Application\UserInterface\Menu\Item;

/**
 * @since 5.7.2.1
 */
interface ControllerInterface
{
    /**
     * Determine whether item should be displayed.
     *
     * @return bool
     */
    public function displayItem();

    /**
     */
    public function registerViewAssets();

    /**
     * @return \HtmlObject\Traits\Tag
     */
    public function getMenuItemLinkElement();

    /**
     * @param ItemInterface $item
     */
    public function setMenuItem(ItemInterface $item);

    /**
     * @return ItemInterface
     */
    public function getMenuItem();
}
