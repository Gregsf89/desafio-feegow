<?php

namespace App\Traits;

trait ValidateUrlParams
{
    /**
     * Get data to be validated from the request. From Route URL
     *
     * @return array
     */
    public function validationData(): array
    {
        if (method_exists($this->route(), 'parameters')) {
            $this->request->add($this->route()->parameters());
            $this->query->add($this->route()->parameters());

            return array_merge($this->route()->parameters(), $this->all());
        }

        return $this->all();
    }
}