<?php

namespace Unit\Domain\Entity;


use Throwable;
use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;

class CategoryUnitTest extends TestCase
{
    /**
     * @throws EntityValidationException
     */
    public function testAttributes()
    {
 
        $uuid = (String) Uuid::uuid4()->toString();
        
        $category = new Category(
            id: $uuid,
            name: 'New Cat',
            description: 'New Desc',
            isActive: true
        );

        var_dump($category);
        
        $this->assertNotEmpty($category->createdAt());
        $this->assertNotEmpty($category->id());
        $this->assertEquals('New Cat', $category->name);
        $this->assertEquals('New Desc', $category->description);
        $this->assertTrue(true, $category->isActive);

    }

    // public function testActived()
    // {
    //     $category = new Category(
    //         id: '123',
    //         name: 'Ne',
    //         isActive: false,
    //         createdAt: '2022-11-01 12:12:12'
    //     );

    //     $this->assertFalse($category->isActive);
    //     $category->activate();
    //     $this->assertTrue(false, $category->isActive);
    // }

    public function testDisabled()
    {
        $uuid = (String) Uuid::uuid4()->toString();
        
        $category = new Category(
            id: $uuid,
            name: 'New Cat',
            description: 'New Desc',
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
        $uuid = (String) Uuid::uuid4()->toString();

        $category = new Category(
            id: $uuid,
            name: 'New Cat',
            description: 'New Desc',
            isActive: true,
            createdAt: '2022-11-01 12:12:12'
        );

        $category->update(
            name: 'new_name',
            description: 'New task'
        );

        // $this->assertEquals($uuid, $this->id);
        self::assertEquals('new_name', $category->name);
    }

    public function testExceptionName()
    {
        try {
            $category = new Category(
                name: "NiM Love ",
                description: 'New Desc'
            );
            $this->assertTrue((bool)false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);

        }
    }

}