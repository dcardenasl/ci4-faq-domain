<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Support;

use App\Interfaces\Support\FaqServiceInterface;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * Smoke tests for FaqService. Extend with domain-specific assertions
 * as business rules accumulate in the service.
 *
 * @internal
 */
final class FaqServiceTest extends CIUnitTestCase
{
    public function testServiceImplementsItsInterface(): void
    {
        $service = Services::faqService(false);

        $this->assertInstanceOf(FaqServiceInterface::class, $service);
    }
}
