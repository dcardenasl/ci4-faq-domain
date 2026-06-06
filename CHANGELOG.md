# Changelog

All notable changes to the CI4 FAQ Domain template will be documented in this file.

## [Unreleased]

### Fixed

- **Test directory casing** — renamed `tests/unit`, `tests/integration`, `tests/feature` to PascalCase (`tests/Unit`, `tests/Integration`, `tests/Feature`) and aligned `phpunit.xml` accordingly. The lowercase directories did not match the PascalCase namespaces (`Tests\Unit\…`) under the `"Tests\\": "tests/"` PSR-4 root, so on case-sensitive filesystems the test classes failed to autoload and the suites were silently empty.

## [1.3.0] — 2026-06-05

### Added

- **`mirror_to_hub` field in `template.json`** — new optional boolean field set to `true`; signals kickstart to also mirror domain permissions under hub app `self` (`application_id=1`) for admin UI gating. Requires kickstart v1.13.0+ which reads this field during `apply_template()`.

### Fixed

- **Permission codes for FaqCategory** (`DomainPermissions.php`, `Routes/v1/support.php`, `template.json`) — renamed `faqCategory.*` codes to `faq-category.*` to follow the dot-separated, kebab-case convention enforced by `check-template-contracts.sh`; route filters and template permission entries updated to match.
- **`FaqCategory` module and sidebar refs in `template.json`** — corrected `admin_modules[0].module` from `"Faq"` to `"FaqCategory"`, updated `category_id` relation route slug from `faqCategories` to `faq-categories`, and fixed the sidebar entry's `module` reference to match the renamed module.
- **`HubClient::findRoleByCode()`** — now reads `data.items[]` from the paginated hub response instead of assuming the bare `data[]` is a flat array; returns `null` when `items` is empty. Covered by two new unit tests.
- **`init.sh` CLI arg parsing** — added `=`-form alternatives for `--docker-container`, `--admin-token`, and `--assign-to-role` flags; spark permission-sync args are now built as a proper bash array to prevent word-splitting on values with spaces.

## [1.2.0] — 2026-06-01

### Added

- **Unit tests for SyncPermissions and ConfigWireman** — comprehensive test coverage for permission sync command and config AST manipulation wiring.

### Changed

- **CLAUDE.md documentation** — clarified permission sync flow, template configuration prerequisites, hub integration requirements, and enhanced setup guidance for domain app initialization.

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
- Domain permission codes: `faq.read`, `faq.write`, `faq.delete`, `faq-category.read`, `faq-category.write`, `faq-category.delete`
- Integration with `ci4-api-core` v0.9.2 for base infrastructure

### Fixed
- Domain permission codes to use FAQ-specific names instead of generic items
- Type casting for `created_at` and `updated_at` timestamps in response DTOs to ensure proper serialization

## Comparison

[Full commit history](https://github.com/dcardenasl/ci4-faq-domain/compare/cc6c9db...main)
