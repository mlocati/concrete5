<?php

declare(strict_types=1);

namespace Concrete\Core\Support\Symbol\AttributedItemListGenerator;

defined('C5_EXECUTE') or die('Access Denied.');

final class AttributeKey
{
    /**
     * @var string
     */
    private $categoryHandle;

    /**
     * @var string
     */
    private $handle;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $categoryHandle, string $handle, string $name = '')
    {
        $this->categoryHandle = $categoryHandle;
        $this->handle = $handle;
        $this->name = $name;
    }

    public function getCategoryHandle(): string
    {
        return $this->categoryHandle;
    }

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
