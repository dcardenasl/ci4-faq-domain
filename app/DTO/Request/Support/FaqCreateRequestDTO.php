<?php

declare(strict_types=1);

namespace App\DTO\Request\Support;

use dcardenasl\Ci4ApiCore\Dto\BaseRequestDTO;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FaqCreateRequest')]
readonly class FaqCreateRequestDTO extends BaseRequestDTO
{
    #[OA\Property(description: 'question', type: 'string')]
    public string $question;
    #[OA\Property(description: 'answer', type: 'string')]
    public string $answer;
    #[OA\Property(description: 'category_id', type: 'integer')]
    public int $category_id;
    #[OA\Property(description: 'is_published', type: 'boolean')]
    public bool $is_published;
    #[OA\Property(description: 'sort_order', type: 'integer')]
    public int $sort_order;

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'question' => 'required|string|max_length[255]',
            'answer' => 'required|string',
            'category_id' => 'required|is_natural_no_zero|is_not_unique[faq_categories.id]',
            'is_published' => 'required|boolean_like',
            'sort_order' => 'required|integer',
        ];
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function map(array $data): void
    {
        $this->question = (string) ($data['question'] ?? '');
        $this->answer = (string) ($data['answer'] ?? '');
        $this->category_id = (int) ($data['category_id'] ?? 0);
        $this->is_published = (bool) ($data['is_published'] ?? false);
        $this->sort_order = (int) ($data['sort_order'] ?? 0);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
            'category_id' => $this->category_id,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
        ];
    }
}
