<?php

declare(strict_types=1);

namespace Tests\Integration\Models;

use App\Models\FaqCategoryModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * Smoke tests for FaqCategoryModel. Extend with persistence scenarios as
 * domain behavior solidifies.
 *
 * @internal
 */
final class FaqCategoryModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = true;
    protected $refresh     = true;
    protected $namespace   = 'App';

    public function testModelReportsCorrectTable(): void
    {
        $model = new FaqCategoryModel();

        $this->assertSame('faq_categories', $model->getTable());
    }
}
