<?php

declare(strict_types=1);

/** @var \CodeIgniter\Router\RouteCollection $routes */

$routes->group('support', ['namespace' => '\App\Controllers\Api\V1\Support'], function ($routes): void {

    // Auth & Rate Limiting Group
    $routes->group('', ['filter' => ['domainauth', 'throttle']], function ($routes): void {

        // FaqCategory Read Routes
        $routes->group('', ['filter' => 'permission:faqCategory.read'], function ($routes): void {
            $routes->get('faq-categories', 'FaqCategoryController::index');
            $routes->get('faq-categories/(:num)', 'FaqCategoryController::show/$1');
        });

        // FaqCategory Write Routes
        $routes->group('', ['filter' => 'permission:faqCategory.write'], function ($routes): void {
            $routes->post('faq-categories', 'FaqCategoryController::create');
            $routes->put('faq-categories/(:num)', 'FaqCategoryController::update/$1');
        });

        // FaqCategory Delete Routes
        $routes->group('', ['filter' => 'permission:faqCategory.delete'], function ($routes): void {
            $routes->delete('faq-categories/(:num)', 'FaqCategoryController::delete/$1');
        });

        // Faq Read Routes
        $routes->group('', ['filter' => 'permission:faq.read'], function ($routes): void {
            $routes->get('faqs', 'FaqController::index');
            $routes->get('faqs/(:num)', 'FaqController::show/$1');
        });

        // Faq Write Routes
        $routes->group('', ['filter' => 'permission:faq.write'], function ($routes): void {
            $routes->post('faqs', 'FaqController::create');
            $routes->put('faqs/(:num)', 'FaqController::update/$1');
        });

        // Faq Delete Routes
        $routes->group('', ['filter' => 'permission:faq.delete'], function ($routes): void {
            $routes->delete('faqs/(:num)', 'FaqController::delete/$1');
        });

    });
});
