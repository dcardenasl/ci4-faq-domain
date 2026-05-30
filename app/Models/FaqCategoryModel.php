<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\FaqCategoryEntity;
use dcardenasl\Ci4ApiCore\Models\BaseAuditableModel;
use dcardenasl\Ci4ApiCore\Models\Traits\Filterable;
use dcardenasl\Ci4ApiCore\Models\Traits\Searchable;

class FaqCategoryModel extends BaseAuditableModel
{
    use Filterable;
    use Searchable;

    protected $table = 'faq_categories';
    protected $primaryKey = 'id';
    protected $returnType = FaqCategoryEntity::class;
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['name', 'slug', 'is_active'];

    /** @var array<int, string> */
    protected array $searchableFields = [];

    /** @var array<int, string> */
    protected array $filterableFields = ['id', 'is_active'];

    /** @var array<int, string> */
    protected array $sortableFields = ['id', 'created_at', 'is_active'];

    protected $validationRules = [
        'name' => 'required|string|max_length[255]|is_unique[faq_categories.name]',
        'slug' => 'required|string|max_length[255]|is_unique[faq_categories.slug]',
        'is_active' => 'required|boolean_like',
    ];
}
