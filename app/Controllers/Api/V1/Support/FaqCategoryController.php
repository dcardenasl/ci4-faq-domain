<?php

declare(strict_types=1);

namespace App\Controllers\Api\V1\Support;

use App\DTO\Request\Support\FaqCategoryCreateRequestDTO;
use App\DTO\Request\Support\FaqCategoryIndexRequestDTO;
use App\DTO\Request\Support\FaqCategoryUpdateRequestDTO;
use App\Interfaces\Support\FaqCategoryServiceInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use dcardenasl\Ci4ApiCore\Dto\SecurityContext;
use dcardenasl\Ci4ApiCore\Http\ApiController;

class FaqCategoryController extends ApiController
{
    protected FaqCategoryServiceInterface $faqCategoryService;

    protected function resolveDefaultService(): FaqCategoryServiceInterface
    {
        $this->faqCategoryService = Services::faqCategoryService();

        return $this->faqCategoryService;
    }

    protected array $statusCodes = [
        'store' => 201,
    ];

    public function index(): ResponseInterface
    {
        return $this->handleRequest('index', FaqCategoryIndexRequestDTO::class);
    }

    public function create(): ResponseInterface
    {
        return $this->handleRequest('store', FaqCategoryCreateRequestDTO::class);
    }

    public function update(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (FaqCategoryUpdateRequestDTO $dto, SecurityContext $context): mixed => $this->faqCategoryService->update($id, $dto, $context),
            FaqCategoryUpdateRequestDTO::class
        );
    }

    public function show(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (array $dto, SecurityContext $context): mixed => $this->faqCategoryService->show($id, $context)
        );
    }

    public function delete(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (array $dto, SecurityContext $context): mixed => $this->faqCategoryService->destroy($id, $context)
        );
    }
}
