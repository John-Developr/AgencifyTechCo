# AgencifyTechCo

Healthcare staffing portal built on CodeIgniter 3 with HMVC modules. Admins, independent contractors, staffing agencies and facility staffing coordinators use it to manage work schedules, staff, documents and timesheets.

## Tech stack

- PHP with CodeIgniter 3.1.10 (`system/`)
- HMVC via Modular Extensions (`application/third_party/MX`)
- MySQL (`mysqli` driver)
- AdminWrap / AdminLTE front-end themes (`assets/`)
- DOMPDF for PDF generation (`application/libraries/dompdf`)
- SendGrid SMTP for email, Twilio and SpringEdge for SMS

## User roles

The `type` column in `sp_users` sets the role:

| Type | Role | Profile table |
|------|------|---------------|
| 0 | Admin | — |
| 1 | Independent contractor | `sp_userdata_independent_contractors` |
| 2 | Staffing agency | `sp_userdata_staffing_agencies` |
| 3 | Facility staffing coordinator | `sp_userdata_facilities_staffing_coordinator` |

## Modules

Each module is in `application/modules/<name>/` and has its own `controllers/` and `views/`.

| Module | Purpose |
|--------|---------|
| `account` | Login, registration, forgot/change password |
| `dashboard` | Landing page (default route) |
| `home` | Home view |
| `eventcalendar` | Schedule calendar |
| `workschedules` | Create/update work schedules, email notifications |
| `schedule` | Pending and declined schedule requests |
| `coordinatorsched` | Coordinator schedule view |
| `contractors` | Manage independent contractors |
| `agencies` | Manage staffing agencies |
| `coordinators`, `staffingcoordinators` | Manage facility staffing coordinators |
| `staff` | Agency staff records |
| `allusers` | User list |
| `personal` | Personal documents |
| `timesheets` | Upload and view timesheets/documents |
| `admintimesheet` | Admin view of documents and timesheets |
| `profile` | Edit profile and password |
| `cronjob` | Schedule status updater (currently commented out) |
| `logout` | End session |

## Project structure

```
application/
  config/       App, database, Twilio and autoload config
  core/         MY_Controller, MY_Model, MY_Loader, MY_Router
  helpers/      global_helper (getrow, post, session, json), sendsms_helper
  libraries/    Pdf, Twilio, dompdf
  modules/      Feature modules (see above)
  views/        Shared layouts (includes/), email templates (template/), errors
assets/         CSS, JS, images and theme plugins
db/             SQL schema template
system/         CodeIgniter core (do not edit)
upload/         User-uploaded files
index.php       Front controller, DB host and table prefix
```

## Setup

1. Serve the project folder with Apache and `mod_rewrite` enabled. The root `.htaccess` removes `index.php` from URLs.
2. Create a MySQL database and import `db/custom_template.sql`. This file only holds the `company_details` and `users` tables. The `sp_*` tables used by the app are not included yet.
3. Set the environment variables listed in `.env.example`. PHP does not load `.env` files on its own, so set them with Apache `SetEnv`, your hosting panel or your PHP-FPM pool config:

   | Variable | Used in |
   |----------|---------|
   | `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`, `DB_DATABASE` | `index.php`, `application/config/database.php` |
   | `ENCRYPTION_KEY` | `application/config/config.php` |
   | `SENDGRID_API_KEY` | `application/modules/account/controllers/Account.php` |
   | `TWILIO_ACCOUNT_SID`, `TWILIO_API_KEY`, `TWILIO_API_SECRET`, `TWILIO_FROM_NUMBER` | `application/config/twilio.php` |
   | `SMS_GATEWAY_API_KEY` | `application/helpers/sendsms_helper.php` |

4. Make `upload/` and `application/cache/` writable by the web server.
5. Set `$isProduction = true;` in `index.php` on production to hide errors.

`base_url` is detected automatically from the request, so no change is needed in `config.php`.

## Conventions

- All app tables use the `sp_` prefix through the `PREFIX` constant (`index.php`).
- Use the `global_helper` shortcuts: `getrow()`, `insert()`, `update()`, `delete()`, `post('field', true)` and `session('key')`. See `Changelog.txt` for details.
- Never commit credentials. Read them with `getenv()`.

## License

CodeIgniter is released under the MIT License (`license.txt`).
