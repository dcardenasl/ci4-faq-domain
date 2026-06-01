# Changelog

All notable changes to the CI4 FAQ Domain template will be documented in this file.

## [Unreleased]

## [1.1.0] — 2026-05-31

### Added

- **`template.json`** — machine-readable manifest declaring domain `entities`, `permissions`, and `admin_modules` for kickstart v1.11.0+ to scaffold the admin side automatically at install time.
- **`admin_modules` schema** — each module entry specifies `entity`, `service` (`hub` or `domain`), `fields`, and `ui_mode`; kickstart reads this to generate matching admin module scaffolding.
- **`permissions[]` with `roles[]`** — each permission entry carries a `roles[]` array declaring which hub roles receive it at provisioning time (e.g. `admin`, `user`), enabling zero-touch IAM setup during `install.sh`.

### Changed

- **`template.json` permissions format** — migrated from a flat string array to object format: `{"code": "...", "roles": [...]}`. Requires kickstart v1.11.0+.

### Fixed

- **`hub.appCode`** — set to `'faq'` in `.env.example` to align with the hub seeder's domain registration (TEMPL-010).

## [1.0.1] — 2026-05-30

### Fixed
- Test directory case sensitivity: renamed `tests/Feature/` → `tests/feature/` and `tests/Integration/` → `tests/integration/` for Linux CI compatibility
- Updated `phpunit.xml` to reference lowercase test directory paths

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
