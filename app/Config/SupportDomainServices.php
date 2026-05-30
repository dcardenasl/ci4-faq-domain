<?php

declare(strict_types=1);

namespace Config;

trait SupportDomainServices
{
    public static function faqCategoryResponseMapper(bool $getShared = true): \dcardenasl\Ci4ApiCore\Mappers\ResponseMapperInterface
    {
        if ($getShared) {
            return static::getSharedInstance('faqCategoryResponseMapper');
        }
        return new \dcardenasl\Ci4ApiCore\Mappers\DtoResponseMapper(\App\DTO\Response\Support\FaqCategoryResponseDTO::class);
    }
    public static function faqCategoryService(bool $getShared = true): \App\Interfaces\Support\FaqCategoryServiceInterface
    {
        if ($getShared) {
            return static::getSharedInstance('faqCategoryService');
        }
        return new \App\Services\Support\FaqCategoryService(new \dcardenasl\Ci4ApiCore\Repositories\GenericRepository(model(\App\Models\FaqCategoryModel::class)), static::faqCategoryResponseMapper());
    }
    public static function faqResponseMapper(bool $getShared = true): \dcardenasl\Ci4ApiCore\Mappers\ResponseMapperInterface
    {
        if ($getShared) {
            return static::getSharedInstance('faqResponseMapper');
        }
        return new \dcardenasl\Ci4ApiCore\Mappers\DtoResponseMapper(\App\DTO\Response\Support\FaqResponseDTO::class);
    }
    public static function faqService(bool $getShared = true): \App\Interfaces\Support\FaqServiceInterface
    {
        if ($getShared) {
            return static::getSharedInstance('faqService');
        }
        return new \App\Services\Support\FaqService(new \dcardenasl\Ci4ApiCore\Repositories\GenericRepository(model(\App\Models\FaqModel::class)), static::faqResponseMapper());
    }
}
