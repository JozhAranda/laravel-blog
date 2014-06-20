## Laravel Blog Application

This is a pet project of a blog application made with Laravel 4

## Environment Variables

Create a file called .env.local.php in your application root and paste the following snippet. Remember to replace the placeholders with your database and mail preferences.

```php
<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	*/

	'DB_HOSTNAME'   => 'your database host name or ip',

	'DB_DATABASE'   => 'your database name',

	'DB_USERNAME'   => 'your database username',

	'DB_PASSWORD'   => 'your database password',

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	*/
	
	'MAIL_HOST'       => 'your mail host',

	'MAIL_FROM'       => 'the sender address',

	'MAIL_NAME'       => 'The sender name',

	'MAIL_ENCRYPTION' => 'tls',

	'MAIL_USERNAME'   => 'your mail host username',

	'MAIL_PASSWORD'   => 'your mail host password'

);
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
