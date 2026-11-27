# AGENTS.md

## Repo state
- This is a stock Laravel 9 / PHP 8.1 skeleton: the only app route is `GET /` → `resources/views/welcome.blade.php`. There is no MiniBook domain code yet; `README.md` is boilerplate, not project documentation.
- The working spec is `agent/prd.md` + `agent/design.md` (currently untracked). Read both before touching data models, routes, or UI; there is no `opencode.json` or other repo-local instruction config.
- `agent/task-instruction.md` requires updating `.agents/tasklist.md` after each task/group (`[x] ✅`, progress %, short file-change note) before reporting done. That path does not exist and the docs live in `agent/`, so confirm/create the intended file before claiming progress.
- Bootstrap 5 is mandated by `agent/design.md`, but `package.json` has no `bootstrap` / `@popperjs/core`. Add them or use a CDN before building Blade views.

## Commands and verification
- `vendor/` is gitignored; run `composer install` if it is missing. `.env` is gitignored and already has `APP_KEY` plus MySQL `DB_DATABASE=mini-book` (root, no password); if absent, `copy .env.example .env` then `php artisan key:generate`. Docroot is `public/`; use `php artisan serve` or XAMPP.
- `php artisan test` passes with the two placeholder tests. Focus one with `php artisan test --filter=ExampleTest` or `vendor/bin/phpunit tests/Feature/ExampleTest.php`.
- `phpunit.xml` sets `APP_ENV=testing` and array cache/session/mail/queue, but the SQLite DB overrides are commented out. DB-backed tests hit the `.env` MySQL database: start MySQL and create/migrate `mini-book` before using `RefreshDatabase`.
- No CI, pre-commit, lint, typecheck, or formatter scripts exist. `.styleci.yml` (Laravel preset, PHP 8) is the only style reference. `npm run dev` / `watch` / `prod` are Laravel Mix only.

## Domain constraints to preserve
- One-hour slots; tariff categories and 20% student rate are in `agent/prd.md` §8. New bookings start `Menunggu Verifikasi`; admin approves/rejects; customer cancellation carries a 50% penalty; double booking must be prevented atomically.
- Enforce customer/admin/owner permissions server-side; `agent/design.md` explicitly rejects relying on the mockup role selector. Guest vs login booking and exact slot/tariff boundaries are still open questions—ask before hardcoding them.
- Admin maintenance/open slot changes must be reflected on the customer schedule, and status must always include text or icons, not color alone.

## Build artifacts
- `webpack.mix.js` compiles `resources/js/app.js` and `resources/css/app.css` into `public/js` and `public/css`. `node_modules/` and built assets are ignored; run `npm install && npm run dev` after JS/CSS dependency changes.
