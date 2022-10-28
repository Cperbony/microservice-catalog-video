<?php

namespace Unit\Domain\Entity;


use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

class CategoryUnitTest extends TestCase
{
    /**
     * @throws EntityValidationException
     */
    public function testAttributes()
    {
        $category = new Category(
            id: 123,
            name: 'New Cat',
            description: 'New Desc',
            isActive: true
        );

        $this->assertEquals('New Cat', $category->name);
        $this->assertEquals('New Desc', $category->description);
        $this->assertTrue(true, $category->isActive);

    }

    public function testActived()
    {
        $category = new Category(
            id: 123,
            name: 'Ne',
            isActive: false
        );

        $this->assertFalse(condition: $category->isActive);
        $category->activate();
        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            id: '12',
            name: 'New Cat',
            isActive: true
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);
    }

    /**
     * @throws EntityValidationException
     */
    public function testUpdate()
    {
        $uuid = 'uuid.vale';

        $category = new Category(
            id: $uuid,
            name: 'New Cat',
            description: 'New Desc',
            isActive: true
        );

        $category->update(
            name: 'new_name',
            description: 'New task'
        );

        self::assertEquals('new_name', $category->name);
    }

    public function testExceptionName()
    {
        try {
            $category = new Category(
                name: "Ni",
                description: 'New Desc'
            );
            $this->assertTrue((bool)false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);

        }
    }

}