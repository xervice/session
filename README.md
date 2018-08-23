Xervice: Session
==================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/session/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/session/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/session/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/session/?branch=master)

Simple session handler for xervice components.


Installation
---------------
```
composer require xervice/session
```


Configuration
----------------
You must add the plugin \Xervice\Session\Communication\Plugin\SessionService to you Kernel stack.


Usage
--------------
```php
$session = Locator::getInstance()->session()->facade();

$session->set('key', 'value');
$session->get('key')
$session->has('key')
$session->remove('key')

```