<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class FaqEntity extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'question' => 'string',
        'answer' => 'string',
        'category_id' => 'int',
        'is_published' => 'bool',
        'sort_order' => 'int',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
