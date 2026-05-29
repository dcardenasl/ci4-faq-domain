<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Support;

use App\Interfaces\Support\FaqCategoryServiceInterface;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * Smoke tests for FaqCategoryService. Extend with domain-specific assertions
 * as business rules accumulate in the service.
 *
 * @internal
 */
final class FaqCategoryServiceTest extends CIUnitTestCase
{
    public function testServiceImplementsItsInterface(): void
    {
        $service = Services::faqCategoryService(false);

        $this->assertInstanceOf(FaqCategoryServiceInterface::class, $service);
    }
}
