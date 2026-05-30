<?php

declare(strict_types=1);

namespace App\Services\Support;

use App\Entities\FaqCategoryEntity;
use App\Interfaces\Support\FaqCategoryServiceInterface;
use dcardenasl\Ci4ApiCore\Mappers\ResponseMapperInterface;
use dcardenasl\Ci4ApiCore\Repositories\RepositoryInterface;
use dcardenasl\Ci4ApiCore\Services\BaseCrudService;

/**
 * @extends BaseCrudService<FaqCategoryEntity>
 */
class FaqCategoryService extends BaseCrudService implements FaqCategoryServiceInterface
{
    /**
     * @param RepositoryInterface<FaqCategoryEntity> $faqCategoryRepository
     */
    public function __construct(
        RepositoryInterface $faqCategoryRepository,
        ResponseMapperInterface $responseMapper
    ) {
        parent::__construct($faqCategoryRepository, $responseMapper);
    }

    /**
     * Domain Hooks
     *
     * Implement beforeStore, afterStore, beforeUpdate, etc.,
     * to add specific business logic while keeping the service layer clean.
     */

    // Custom methods declared in FaqCategoryServiceInterface must be implemented here.
    // Until fully implemented, throw to avoid silent incorrect behavior:
    //   throw new \BadMethodCallException(__METHOD__ . ' not implemented');
}
