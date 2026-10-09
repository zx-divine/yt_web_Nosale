# Read Me — NG BLOX YT

Responsive gaming creator website with a PHP contact form.

## Contact form setup
- PHP hosting is required; GitHub Pages cannot execute PHP.
- The contact endpoint expects PHPMailer at `PHPMailer/src/Exception.php`, `PHPMailer/src/PHPMailer.php`, and `PHPMailer/src/SMTP.php`.
- **Those library source files are not yet present in this repository.** Add the official files from https://github.com/PHPMailer/PHPMailer/tree/master/src before expecting email delivery.
- Copy `private-config.example.php` to `private-config.php` on the server only and fill SMTP username, app password, and recipient privately. Never commit real credentials.
- If sending fails, check the PHP error log, confirm the library and private config exist, and verify outbound Gmail SMTP on port 587 with STARTTLS is allowed.
