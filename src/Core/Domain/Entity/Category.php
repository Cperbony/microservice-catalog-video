<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTraits;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

class Category
{
    use MethodsMagicsTraits;

    /**
     * @param string $id
     * @param string $name
     * @param string $description
     * @param bool $isActive
     * @throws EntityValidationException
     */

    public function __construct(
        protected string $id = 'id',
        protected string $name,
        protected string $description = '',
        protected bool $isActive = true
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    /**
     * @throws EntityValidationException
     */
    public function update(string $name, string $description = '')
    {
        $this->name = $name;
        $this->description = $description;
        $this->validate();
    }

    /**
     * @throws EntityValidationException
     */
    public function validate()
    {
        DomainValidation::notNull($this->name);
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strMinLength($this->description);
    }

}