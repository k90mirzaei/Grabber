<?php

namespace codefarm\Grabber;

class Grabber
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * Merges an array of fields into the fields variable.
     *
     * @param array $fields
     */
    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    /**
     * Returns the list of available fields in reverse order.
     *
     * @return array
     */
    public function availableFields(): array
    {
        return $this->fields;
    }
}
