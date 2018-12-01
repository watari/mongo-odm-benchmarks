<?php
declare(strict_types = 1);


namespace App\Helper;

use Doctrine\Common\Collections\Collection;

class CollectionHelper
{
    public static function setElementsForCollection(Collection $collection, array  $items): void
    {
        $collection->clear();
        foreach ($items as $index => $item) {
            $collection->set($index, $item);
        }
    }
}
