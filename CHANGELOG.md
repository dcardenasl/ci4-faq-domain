# Changelog

All notable changes to the CI4 FAQ Domain template will be documented in this file.

## [1.0.0] — 2026-05-30

### Added
- Initial release of the FAQ domain template
- Faq and FaqCategory CRUD modules with scaffolded controllers, DTOs, services, and models
- Database migrations for `faq_categories` and `faqs` tables
- Comprehensive test suites for controllers, models, and services
- OpenAPI documentation for all FAQ endpoints
- Internationalization support (English and Spanish)
- Domain permission codes: `faq.read`, `faq.write`, `faq.delete`, `faqCategory.read`, `faqCategory.write`, `faqCategory.delete`
- Integration with `ci4-api-core` v0.9.2 for base infrastructure

### Fixed
- Domain permission codes to use FAQ-specific names instead of generic items
- Type casting for `created_at` and `updated_at` timestamps in response DTOs to ensure proper serialization

## Comparison

[Full commit history](https://github.com/dcardenasl/ci4-faq-domain/compare/cc6c9db...main)
