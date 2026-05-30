<?php

declare(strict_types=1);

namespace Tests\Integration\Models;

use App\Models\FaqModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * Smoke tests for FaqModel. Extend with persistence scenarios as
 * domain behavior solidifies.
 *
 * @internal
 */
final class FaqModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = true;
    protected $refresh     = true;
    protected $namespace   = 'App';

    public function testModelReportsCorrectTable(): void
    {
        $model = new FaqModel();

        $this->assertSame('faqs', $model->getTable());
    }
}
