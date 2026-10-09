# Read Me — NG BLOX YT

Responsive gaming creator website with a PHP contact form.

## Contact form setup
- PHP hosting is required; GitHub Pages cannot execute PHP.
- PHPMailer source is included in `PHPMailer/src/`.
- Copy `private-config.example.php` to `private-config.php` on the server only.
- Fill SMTP username, SMTP app password, and recipient privately on the server. Never commit the real config.
- If sending fails, check the PHP error log, confirm PHPMailer files exist, and verify outbound Gmail SMTP on port 587 with STARTTLS is allowed.
