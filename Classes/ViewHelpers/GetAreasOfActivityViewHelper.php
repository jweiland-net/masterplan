<?php

declare(strict_types = 1);

/*
 * This file is part of the package jweiland/masterplan.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Masterplan\ViewHelpers;

use JWeiland\Masterplan\Configuration\ExtConf;
use JWeiland\Masterplan\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * With this VH you get all direct child categories of a given parent category.
 * Seems to be the same as GetTargetsViewHelper:
 * Additionally this VH can retrieve child categories directly from CategoryRepository
 */
class GetAreasOfActivityViewHelper extends AbstractViewHelper
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ExtConf;
     */
    protected $extConf;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param ExtConf $extConf
     */
    public function injectExtConf(ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * Initialize all VH arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument(
            'areasOfActivity',
            'array',
            'Predefined list of available categories to filter for',
            false,
            []
        );
    }

    /**
     * Get direct child categories of defined root category in extConf
     *
     * @return array
     */
    public function render(): array
    {
        $rootCategory = $this->extConf->getRootCategory();
        $categories = [];
        // make sure to have only categories which are direct children of rootCategory
        if (!empty($this->arguments['areasOfActivity'])) {
            /** @var Category $areaOfActivity */
            foreach ($this->arguments['areasOfActivity'] as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory instanceof Category && $parentCategory->getUid() === $rootCategory) {
                    $categories[] = $areaOfActivity;
                }
            }
        } else {
            /** @var QueryResultInterface $categoryResult */
            $categoryResult = $this->categoryRepository->findByParent($rootCategory);
            // we need an Array as collection for usort
            $categories = $categoryResult->toArray();
        }
        usort($categories, ['self', 'sortCategoriesByTitle']);
        return $categories;
    }

    /**
     * Sort categories
     *
     * @param Category $categoryA
     * @param Category $categoryB
     * @return int
     */
    protected function sortCategoriesByTitle(Category $categoryA, Category $categoryB): int
    {
        if ($categoryA->getTitle() === $categoryB->getTitle()) {
            return 0;
        }
        if ($categoryA->getTitle() > $categoryB->getTitle()) {
            return 1;
        }
        return -1;
    }
}
