<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{

    /**
     * @throws EntityValidationException
     */
    public static function notNull(string $value, string $exceptionMessage = null)
    {
        if(empty($value)) {
            throw new EntityValidationException(($exceptionMessage ?? 'Should not empty or null!'));
        }
    }

    /**
     * @throws EntityValidationException
     */
    public static function strMaxLength(string $value, int $length = 255, string $exceptionMessage = null)
    {
        if(strlen($value) >= $length) {
            throw new EntityValidationException(($exceptionMessage ??  "The value must not be greater than {$length} characteres"));
        }
    }

    /**
     * @throws EntityValidationException
     */
    public static function strMinLength(string $value, int $length = 3, string $exceptionMessage = null)
    {
        if(strlen($value) < $length) {
            throw new EntityValidationException(($exceptionMessage ?? "The value must not be greater than {$length} characteres"));
        }
    }

    /**
     * @throws EntityValidationException
     */
    public static function strCanNullAndMaxlength(string $value, $length = 255, $exceptionMessage = null)
    {
        if(empty($value) && strlen($value) > $length) {
            throw new EntityValidationException(($exceptionMessage ?? "The value must not be greater than {$length} characteres"));
        }
    }
}