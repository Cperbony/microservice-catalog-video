<?php

namespace Tests\Unit\UseCase\Category;

use Mockery;
use stdClass;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\UseCase\Category\CreateCategoryUseCase;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    
    public function testCreateNewCategory()
    {
        $categoryId = '1';
        $categoryName = 'Name Cat';
        
        // Mockar a entidade
        $this->mockEntity = Mockery::mock(Category::class, [
            $categoryId,
            $categoryName
        ]);
        
        // Mockar o repositorio
        $this->mockRepo = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepo->shouldReceive('insert')->andReturn($this->mockRepo);
         
        $useCase = new CreateCategoryUseCase($this->mockRepo);
        $useCase->execute();
        
        $this->assertTrue(true);
        
        Mockery::close();
        
    }
}