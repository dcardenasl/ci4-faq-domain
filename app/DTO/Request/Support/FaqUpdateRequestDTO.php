<?php

declare(strict_types=1);

namespace App\DTO\Request\Support;

use dcardenasl\Ci4ApiCore\Dto\BaseRequestDTO;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FaqUpdateRequest')]
readonly class FaqUpdateRequestDTO extends BaseRequestDTO
{
    #[OA\Property(description: 'question', type: 'string', nullable: true)]
    public ?string $question;
    #[OA\Property(description: 'answer', type: 'string', nullable: true)]
    public ?string $answer;
    #[OA\Property(description: 'category_id', type: 'integer', nullable: true)]
    public ?int $category_id;
    #[OA\Property(description: 'is_published', type: 'boolean', nullable: true)]
    public ?bool $is_published;
    #[OA\Property(description: 'sort_order', type: 'integer', nullable: true)]
    public ?int $sort_order;

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'question' => 'permit_empty|string|max_length[255]',
            'answer' => 'permit_empty|string',
            'category_id' => 'permit_empty|is_natural_no_zero|is_not_unique[faq_categories.id]',
            'is_published' => 'permit_empty|boolean_like',
            'sort_order' => 'permit_empty|integer',
        ];
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function map(array $data): void
    {
        $this->question = $data['question'] ?? null;
        $this->answer = $data['answer'] ?? null;
        $this->category_id = isset($data['category_id']) ? (int) $data['category_id'] : null;
        $this->is_published = isset($data['is_published']) ? (bool) $data['is_published'] : null;
        $this->sort_order = isset($data['sort_order']) ? (int) $data['sort_order'] : null;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return array_filter([
            'question' => $this->question,
            'answer' => $this->answer,
            'category_id' => $this->category_id,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
        ], static fn (mixed $value): bool => $value !== null);
    }
}
