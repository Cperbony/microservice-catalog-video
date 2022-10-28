<?php

namespace Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;

class DomainValidationUnitTest extends TestCase
{

    public function testNotNull()
    {
        try {
            $value = 'teste';
            DomainValidation::notNull($value, 'claus');

            $this->assertTrue((bool)false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);

        }
    }

    public function testNotNullCustomMessageException()
    {
        try {
            $value = 'teste';
            DomainValidation::notNull($value, 'Custom Message');

            $this->assertTrue((bool)false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message');

        }
    }

    public function testStrMaxlength()
    {
        try {
            $value = 'teste';
            DomainValidation::strMaxLength($value, 5, 'Custom Message');

            $this->assertTrue((bool)false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message');

        }
    }

//    public function testStrMinlength()
//    {
//        try {
//            $value = 'teste';
//            DomainValidation::strMinLength($value, 2, 'Custom Message');
//
//            $this->assertTrue((bool)false);
//        } catch (\Throwable $th) {
//            $this->assertInstanceOf(expected: EntityValidationException::class, actual: $th, message: 'Custom Message');
//
//        }
//    }

    public function testStrCanNullAndMaxlength()
    {
        try {
            $value = 'teste';
            DomainValidation::strCanNullAndMaxlength($value, 3, 'Custom Message');

            $this->assertTrue((bool)false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(expected: EntityValidationException::class, actual: $th, message: 'Custom Message');

        }
    }


}