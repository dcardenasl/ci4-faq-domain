<?php

declare(strict_types=1);

namespace App\DTO\Response\Support;

use dcardenasl\Ci4ApiCore\Dto\DataTransferObjectInterface;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FaqResponse',
    title: 'Faq Response',
    required: ["id","question","answer","category_id","is_published","sort_order"]
)]
final readonly class FaqResponseDTO implements DataTransferObjectInterface
{
    public function __construct(
        #[OA\Property(description: 'Unique identifier', example: 1)]
        public int $id,
        #[OA\Property(description: 'question', type: 'string')]
        public string $question,
        #[OA\Property(description: 'answer', type: 'string')]
        public string $answer,
        #[OA\Property(description: 'category_id', type: 'integer')]
        public int $category_id,
        #[OA\Property(description: 'is_published', type: 'boolean')]
        public bool $is_published,
        #[OA\Property(description: 'sort_order', type: 'integer')]
        public int $sort_order,
        #[OA\Property(property: 'created_at', description: 'Creation timestamp', example: '2026-02-26 12:00:00', nullable: true)]
        public ?string $createdAt = null,
        #[OA\Property(property: 'updated_at', description: 'Last update timestamp', example: '2026-02-26 12:00:00', nullable: true)]
        public ?string $updatedAt = null
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static
    {
        return new static(
            id: (int) ($data['id'] ?? 0),
            question: (string) ($data['question'] ?? ''),
            answer: (string) ($data['answer'] ?? ''),
            category_id: (int) ($data['category_id'] ?? 0),
            is_published: (bool) ($data['is_published'] ?? false),
            sort_order: (int) ($data['sort_order'] ?? 0),
            createdAt: $data['created_at'] ?? null,
            updatedAt: $data['updated_at'] ?? null,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            'category_id' => $this->category_id,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
