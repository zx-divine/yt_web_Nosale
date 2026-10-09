# NG BLOX YT Website

Responsive black-and-red creator website with social links and a PHP/PHPMailer contact form.

## Deploy
1. Upload the website files to PHP hosting.
2. Add the official PHPMailer source files at `PHPMailer/src/Exception.php`, `PHPMailer/src/PHPMailer.php`, and `PHPMailer/src/SMTP.php` from https://github.com/PHPMailer/PHPMailer/tree/master/src.
3. Copy `private-config.example.php` to `private-config.php` on the host only and fill in SMTP values privately. Never commit the real config.
4. Confirm HTTPS and outbound SMTP port 587 support.
5. Test delivery in the receiving inbox.

**Current status:** the PHPMailer source files are not yet in this repository, so `contact.php` will return the error toast until they are added and the private config is created on the PHP host. GitHub Pages cannot execute PHP; keep the contact handler on PHP hosting.
