<?php
namespace Concrete\Core\Page\Stack;

use Concrete\Core\Multilingual\Page\Section\Section;
use Concrete\Core\Page\Stack\Folder\Folder;
use Concrete\Core\Site\Tree\TreeInterface;
use Loader;
use Concrete\Core\Page\PageList;
use Concrete\Core\Search\StickyRequest;

class StackList extends PageList
{
    /**
     * @since 8.0.0
     */
    protected $foldersFirst;

    public function __construct()
    {
        parent::__construct();
        $this->foldersFirst = false;
        $this->query->leftJoin('p', 'Stacks', 's', 's.cID = p.cID');
        $this->ignorePermissions();
        $this->filterByPath(STACKS_PAGE_PATH);
        $this->filter(false, '(s.stMultilingualSection is null or s.stMultilingualSection = 0)');
        $this->includeSystemPages();
        $this->sortByName();
    }

    /**
     * @since 8.0.0
     */
    public function setSiteTreeObject(TreeInterface $tree)
    {
        parent::setSiteTreeObject($tree);
        $this->query->andWhere('s.siteTreeID = :siteTreeID or s.siteTreeID is null');
    }

    /**
     * @since 8.0.0
     */
    public function setupAutomaticSorting(StickyRequest $request = null)
    {
        parent::setupAutomaticSorting($request);
        if ($this->foldersFirst) {
            $previousOrderBy = $this->query->getQueryPart('orderBy');
            $this->query->orderBy('pt.ptHandle', 'desc');
            $this->query->add('orderBy', $previousOrderBy, true);
        }
    }

    /**
     * @since 5.7.5
     */
    public function filterByLanguageSection(Section $ms)
    {
        $this->filter('stMultilingualSection', $ms->getCollectionID());
    }

    /**
     * Should we list stack folders first?
     *
     * @param bool $value
     * @since 8.0.0
     */
    public function setFoldersFirst($value)
    {
        $this->foldersFirst = (bool) $value;
    }

    /**
     * Should we list stack folders first?
     *
     * @return bool
     * @since 8.0.0
     */
    public function getFoldersFirst()
    {
        return $this->foldersFirst;
    }

    /**
     * @since 8.0.0
     */
    public function filterByFolder(Folder $folder)
    {
        $this->filterByParentID($folder->getPage()->getCollectionID());
    }

    public function filterByGlobalAreas()
    {
        $this->filter('stType', Stack::ST_TYPE_GLOBAL_AREA);
    }

    /**
     * @since 8.0.0
     */
    public function excludeGlobalAreas()
    {
        $this->filter(false, 'stType != '.Stack::ST_TYPE_GLOBAL_AREA.' or stType is null');
    }

    public function filterByUserAdded()
    {
        $this->filter('stType', Stack::ST_TYPE_USER_ADDED);
    }

    /**
     * @since 5.7.5
     */
    public function filterByStackCategory(StackCategory $category)
    {
        $this->filterByParentID($category->getPage()->getCollectionID());
    }

    /**
     * @param $queryRow
     *
     * @return \Stack
     * @since 8.0.0
     */
    public function getResult($queryRow)
    {
        $stack = Stack::getByID($queryRow['cID'], 'ACTIVE');

        return $stack ?: parent::getResult($queryRow);
    }

}
