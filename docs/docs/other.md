# Other
- Setting HTTP Headers
    - X-Frame-Options:deny
    - X-XSS-Protection:1;mode=block
    - X-Content-Type-Options:nosniff
    - Referrer-Policy:no-referrer
    - Cache-Control: max-age=31536000, must-revalidate
- The changelog.txt file is removed to eliminate the message indicating that the site's security is not in order.
- Files named ht.access in the root and in the /core/ folder are renamed to enable friendly URLs.
- Changing the content of the base template