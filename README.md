# pushlyphp

Pushly is a simple service for sending push notifications from your project to your smartphone

## Usage

```php
<?php
require __DIR__.'/vendor/autoload.php';

Pushly\push('http://pushly.de/abcdef0', 'message (optional)');
```
