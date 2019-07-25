<?php

namespace AdventistCommons\Domain\Request;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ParameterCollection extends AbstractCollection
{
    protected function validate($item): void
    {
        $item;
    }

    public static function buildFromRequestsParams(array $params): self
    {
        foreach ($params as $key => $value) {
            if (substr($key, -3) === '_id') {
                $realKey          =  substr($key, 0, -3);
                $params[$realKey] = $value
                    ? ['id' => $value]
                    : null;
                unset($params[$key]);
            }
        }
        $collection = new self();
        foreach ($params as $key => $value) {
            $collection->offsetSet($key, $value);
        }
        
        return $collection;
    }
}
