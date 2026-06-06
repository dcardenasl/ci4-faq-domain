<?php

declare(strict_types=1);

namespace Config;

/**
 * Source of truth for the permissions exposed by this domain app.
 *
 * Add an entry here, then run:
 *
 *     php spark domain:sync-permissions
 *
 * to register them in the hub. The command is idempotent — pre-existing codes
 * are left untouched.
 *
 * Permission codes use `.` as separator (NOT `:`) because CodeIgniter splits
 * filter arguments on `:` (`permission:foo:bar` would be parsed as filter=foo,
 * arg=[bar], silently dropping the rest).
 */
class DomainPermissions
{
    /**
     * @var list<array{code: string, resource: string, action: string, description?: string}>
     */
    public const PERMISSIONS = [
        ['code' => 'items.read',         'resource' => 'items',          'action' => 'read',   'description' => 'Base read access for FAQ routes'],
        ['code' => 'faq.read',            'resource' => 'faqs',           'action' => 'read',   'description' => 'Read FAQs'],
        ['code' => 'faq.write',           'resource' => 'faqs',           'action' => 'write',  'description' => 'Create/Update FAQs'],
        ['code' => 'faq.delete',          'resource' => 'faqs',           'action' => 'delete', 'description' => 'Delete FAQs'],
        ['code' => 'faq-category.read',   'resource' => 'faqcategories',  'action' => 'read',   'description' => 'Read FAQ Categories'],
        ['code' => 'faq-category.write',  'resource' => 'faqcategories',  'action' => 'write',  'description' => 'Create/Update FAQ Categories'],
        ['code' => 'faq-category.delete', 'resource' => 'faqcategories',  'action' => 'delete', 'description' => 'Delete FAQ Categories'],
    ];
}
