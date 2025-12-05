<?php

class EmailValidator
{
    /**
     * Sanitize input using allow-listing of legal ASCII email characters.
     */
    public function sanitize(string $email): string
    {
        // Remove illegal characters and trim
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return trim($email);
    }

    /**
     * Validate syntactic correctness (Latin-only ASCII)
     */
    public function isValidSyntax(string $email): bool
    {
        // Must be ASCII only
        if (preg_match('/[^\x00-\x7F]/', $email)) {
            return false;
        }

        // Reject punycode domains (xn--)
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return false;
        }

        [$local, $domain] = $parts;

        if (stripos($domain, 'xn--') === 0) {
            return false;
        }

        // Length checks
        if (strlen($local) > 63 || strlen($email) > 254) {
            return false;
        }

        // Allow-list: letters, digits, hyphen, dot for domain
        if (!preg_match('/^[A-Za-z0-9.-]+$/', $domain)) {
            return false;
        }

        // Domain cannot start or end with hyphen or dot, no consecutive dots
        if (
            preg_match('/(^[\.-]|[\.-]$)/', $domain) ||
            preg_match('/\.\./', $domain)
        ) {
            return false;
        }

        // Simple regex for local@domain validation
        if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
            return false;
        }

        return true;
    }

    /**
     * Normalize email: lowercase domain, keep local part intact
     */
    public function normalize(string $email): string
    {
        [$local, $domain] = explode('@', $email, 2);
        return $local . '@' . strtolower($domain);
    }

    /**
     * Optional: DNS/MX check for semantic validation
     */
    public function dnsCheck(string $email): bool
    {
        $domain = substr(strrchr($email, '@'), 1);

        return (
            checkdnsrr($domain, 'MX') ||
            checkdnsrr($domain, 'A') ||
            checkdnsrr($domain, 'AAAA')
        );
    }

    /**
     * Validate and return normalized email or error
     */
    public function validate(string $email, bool $checkDNS = false): array
    {
        $sanitized = $this->sanitize($email);

        if (!$this->isValidSyntax($sanitized)) {
            return [
                'success' => false,
                'error' => 'Invalid email syntax or non-Latin characters detected.'
            ];
        }

        $normalized = $this->normalize($sanitized);

        if ($checkDNS && !$this->dnsCheck($normalized)) {
            return [
                'success' => false,
                'error' => 'Domain does not appear to accept mail (DNS check failed).'
            ];
        }

        return [
            'success' => true,
            'email_raw' => $email,
            'email_sanitized' => $sanitized,
            'email_normalized' => $normalized
        ];
    }

    /**
     * Safe output for HTML
     */
    public function escapeForHtml(string $email): string
    {
        return htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    }
}