<?php

declare(strict_types=1);

namespace App\Services\Support;

use App\Entities\FaqEntity;
use App\Interfaces\Support\FaqServiceInterface;
use dcardenasl\Ci4ApiCore\Mappers\ResponseMapperInterface;
use dcardenasl\Ci4ApiCore\Repositories\RepositoryInterface;
use dcardenasl\Ci4ApiCore\Services\BaseCrudService;

/**
 * @extends BaseCrudService<FaqEntity>
 */
class FaqService extends BaseCrudService implements FaqServiceInterface
{
    /**
     * @param RepositoryInterface<FaqEntity> $faqRepository
     */
    public function __construct(
        RepositoryInterface $faqRepository,
        ResponseMapperInterface $responseMapper
    ) {
        parent::__construct($faqRepository, $responseMapper);
    }

    /**
     * Domain Hooks
     *
     * Implement beforeStore, afterStore, beforeUpdate, etc.,
     * to add specific business logic while keeping the service layer clean.
     */

    // Custom methods declared in FaqServiceInterface must be implemented here.
    // Until fully implemented, throw to avoid silent incorrect behavior:
    //   throw new \BadMethodCallException(__METHOD__ . ' not implemented');
}
