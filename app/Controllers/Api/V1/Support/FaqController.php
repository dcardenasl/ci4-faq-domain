<?php

declare(strict_types=1);

namespace App\Controllers\Api\V1\Support;

use App\DTO\Request\Support\FaqCreateRequestDTO;
use App\DTO\Request\Support\FaqIndexRequestDTO;
use App\DTO\Request\Support\FaqUpdateRequestDTO;
use App\Interfaces\Support\FaqServiceInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use dcardenasl\Ci4ApiCore\Dto\SecurityContext;
use dcardenasl\Ci4ApiCore\Http\ApiController;

class FaqController extends ApiController
{
    protected FaqServiceInterface $faqService;

    protected function resolveDefaultService(): FaqServiceInterface
    {
        $this->faqService = Services::faqService();

        return $this->faqService;
    }

    protected array $statusCodes = [
        'store' => 201,
    ];

    public function index(): ResponseInterface
    {
        return $this->handleRequest('index', FaqIndexRequestDTO::class);
    }

    public function create(): ResponseInterface
    {
        return $this->handleRequest('store', FaqCreateRequestDTO::class);
    }

    public function update(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (FaqUpdateRequestDTO $dto, SecurityContext $context): mixed => $this->faqService->update($id, $dto, $context),
            FaqUpdateRequestDTO::class
        );
    }

    public function show(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (array $dto, SecurityContext $context): mixed => $this->faqService->show($id, $context)
        );
    }

    public function delete(int $id): ResponseInterface
    {
        return $this->handleRequest(
            fn (array $dto, SecurityContext $context): mixed => $this->faqService->destroy($id, $context)
        );
    }
}
