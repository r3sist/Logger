# PSR-3 DB Logger for Fat Free Framework powered apps

This repository is for personal use, there is no real value in it.

## Installation & Requirements

+ This library uses dependency injection, which is not the default behaviour of Fat Free Framework powered apps.
+ `$f3->LOG` must be set to e.g. `tmp/log/` with the write access of *error.log* file

### MySQL Schema

```mysql
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `level` varchar(9) NOT NULL DEFAULT 'alert',
  `message` text NOT NULL DEFAULT '',
  `context` text NOT NULL DEFAULT '',
  `user_ip` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_name` varchar(256) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `log` ADD PRIMARY KEY (`id`);

ALTER TABLE `log` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
```

## Usage

Use like a simple PSR-3 implementation.

The log entry creator methods:

+ use `log` table
+ store the value of `$f3->uname` or `$context['uname']` in `user_name` column
+ store the value of `$f3->uid` or `$context['uid']` in `user_id` column
+ if it's set add the value of `$f3->ALIAS` route name to `$context['ALIAS']`
+ store `$conetxt` array as JSON in `context` column
+ save an entry also in *error.log* file if log level is `critical` or `emergency`
+ save SQL error in *error.log*

For API documentation and custom features (like using mapper, different table etc.) [see API.md](API.md).

## License

GNU General Public License v3.0