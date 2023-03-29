<?php declare(strict_types=1);

namespace App\Repository;

class MagicRepository
{
    /**
     * @return string[]
     */
    public function emails(): array
    {
        return [
            'SMTP mail, ASCII text, with CRLF line terminators',
            'SMTP mail, ASCII text, with CRLF, CR line terminators',
            'SMTP mail, ASCII text, with very long lines, with CRLF line terminators',
            'SMTP mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'SMTP mail, ISO-8859 text, with CRLF line terminators',
            'SMTP mail, ISO-8859 text, with very long lines, with CRLF line terminators',
            'SMTP mail, Non-ISO extended-ASCII text, with CRLF line terminators',
            'SMTP mail, UTF-8 Unicode text, with CRLF line terminators',
            'SMTP mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
            'news or mail, ASCII text, with CRLF line terminators',
            'news or mail, ASCII text, with CRLF line terminators, with escape sequences',
            'news or mail, ASCII text, with CRLF, CR line terminators',
            'news or mail, ASCII text, with very long lines, with CRLF line terminators',
            'news or mail, ASCII text, with very long lines, with CRLF line terminators, with escape sequences',
            'news or mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'news or mail, ISO-8859 text, with CRLF line terminators',
            'news or mail, ISO-8859 text, with CRLF, CR line terminators',
            'news or mail, UTF-8 Unicode text, with CRLF line terminators',
            'news or mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
            'news or mail, UTF-8 Unicode text, with very long lines, with CRLF, LF line terminators',
            'RFC 822 mail, ASCII text, with CRLF line terminators',
            'RFC 822 mail, ASCII text, with CRLF, CR line terminators',
            'RFC 822 mail, ASCII text, with very long lines, with CRLF line terminators',
            'RFC 822 mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'RFC 822 mail, ISO-8859 text, with CRLF line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with CRLF line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with CRLF, CR line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
        ];
    }
}
