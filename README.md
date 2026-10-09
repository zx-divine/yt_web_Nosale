# NG BLOX YT Website

Responsive black-and-red creator website with social links and a PHP/PHPMailer contact form.

## Deploy
1. Upload repository files to PHP hosting.
2. Copy `private-config.example.php` to `private-config.php` on the host only and fill in SMTP values privately.
3. Ensure `PHPMailer/src/Exception.php`, `PHPMailer.php`, and `SMTP.php` exist.
4. Confirm HTTPS and outbound SMTP port 587 support.
5. Test delivery in the receiving inbox.

GitHub Pages cannot execute PHP. Keep the contact handler on PHP hosting.
