<!-- 
 HOW TO RUN
 1. Install PHPUnit (if not alreday): composer require --dev phpunit/phpunit
 2. Run test: vendor/bin/phpunit EmailValidatorTest.php
-->

<?php
use PHPUnit\Framework\TestCase;

require_once 'EmailValidator.php';

class EmailValidatorTest extends TestCase
{
    private EmailValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new EmailValidator();
    }

    /**
     * Test valid Latin-only emails
     */
    public function testValidEmails(): void
    {
        $validEmails = [
            'john.doe@example.com',
            'user+123@sub.domain.co.uk',
            'abc_def@example.org',
            'user-name@example.io',
        ];

        foreach ($validEmails as $email) {
            $result = $this->validator->validate($email);
            $this->assertTrue($result['success'], "Failed on: $email");
            $this->assertSame($result['email_normalized'], $this->validator->normalize($email));
        }
    }

    /**
     * Test emails with Unicode characters (should fail)
     */
    public function testUnicodeEmailsRejected(): void
    {
        $invalidEmails = [
            'josé@example.com',         // accented character
            'müller@domain.com',        // umlaut
            '用户@例子.公司',              // full Chinese
            'δοκιμή@παράδειγμα.ελ',      // Greek
            'пользователь@почта.рф',     // Cyrillic
        ];

        foreach ($invalidEmails as $email) {
            $result = $this->validator->validate($email);
            $this->assertFalse($result['success'], "Should fail: $email");
        }
    }

    /**
     * Test punycode domains rejected
     */
    public function testPunycodeDomainRejected(): void
    {
        $punycodeEmails = [
            'user@xn--mller-kva.de',   // punycode of müller.de
            'test@xn--fsqu00a.xn--55qx5d', // punycode of 例子.公司
        ];

        foreach ($punycodeEmails as $email) {
            $result = $this->validator->validate($email);
            $this->assertFalse($result['success'], "Should reject punycode: $email");
        }
    }

    /**
     * Test email normalization
     */
    public function testNormalization(): void
    {
        $email = 'John.Doe@Example.COM';
        $normalized = $this->validator->normalize($email);
        $this->assertSame('John.Doe@example.com', $normalized);
    }

    /**
     * Test HTML escaping
     */
    public function testHtmlEscaping(): void
    {
        $email = 'user@example.com';
        $escaped = $this->validator->escapeForHtml($email);
        $this->assertSame('user@example.com', $escaped);

        $emailWithChars = 'user<doe>@example.com';
        $escaped = $this->validator->escapeForHtml($emailWithChars);
        $this->assertSame('user&lt;doe&gt;@example.com', $escaped);
    }

    /**
     * Test DNS check (basic)
     * Note: This depends on network and actual DNS resolution.
     * For proper unit testing, consider mocking checkdnsrr().
     */
    public function testDnsCheck(): void
    {
        $validDomainEmail = 'test@gmail.com';
        $invalidDomainEmail = 'test@nonexistent-domain-xyz123.com';

        $this->assertTrue($this->validator->dnsCheck($validDomainEmail));
        $this->assertFalse($this->validator->dnsCheck($invalidDomainEmail));
    }
}