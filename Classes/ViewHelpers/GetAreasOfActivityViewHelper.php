<?php
declare(strict_types = 1);
namespace JWeiland\Masterplan\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\Masterplan\Configuration\ExtConf;
use JWeiland\Masterplan\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Extbase\Domain\Model\Category;
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
     * Get direct child categories of defined root category in extConf
     *
     * @param array $areasOfActivity
     * @return array
     */
    public function render(array $areasOfActivity = []): array
    {
        $rootCategory = $this->extConf->getRootCategory();
        $categories = [];
        // make sure to have only categories which are direct children of rootCategory
        if ($areasOfActivity !== []) {
            /** @var \TYPO3\CMS\Extbase\Domain\Model\Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory instanceof Category && $parentCategory->getUid() === $rootCategory) {
                    $categories[] = $areaOfActivity;
                }
            }
        } else {
            /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categoryResult */
            $categoryResult = $this->categoryRepository->findByParent($rootCategory);
            // we need an Array as collection for usort and not an ObjectStorage
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
