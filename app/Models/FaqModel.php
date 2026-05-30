<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\FaqEntity;
use dcardenasl\Ci4ApiCore\Models\BaseAuditableModel;
use dcardenasl\Ci4ApiCore\Models\Traits\Filterable;
use dcardenasl\Ci4ApiCore\Models\Traits\Searchable;

class FaqModel extends BaseAuditableModel
{
    use Filterable;
    use Searchable;

    protected $table = 'faqs';
    protected $primaryKey = 'id';
    protected $returnType = FaqEntity::class;
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['question', 'answer', 'category_id', 'is_published', 'sort_order'];

    /** @var array<int, string> */
    protected array $searchableFields = ['question'];

    /** @var array<int, string> */
    protected array $filterableFields = ['id', 'category_id', 'is_published', 'sort_order'];

    /** @var array<int, string> */
    protected array $sortableFields = ['id', 'created_at', 'question', 'category_id', 'is_published', 'sort_order'];

    protected $validationRules = [
        'question' => 'required|string|max_length[255]',
        'answer' => 'required|string',
        'category_id' => 'required|is_natural_no_zero|is_not_unique[faq_categories.id]',
        'is_published' => 'required|boolean_like',
        'sort_order' => 'required|integer',
    ];
}
