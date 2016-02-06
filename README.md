# oldosuserver
A remake of the osu! build 99 (2007) PHP code. The source is available under the [MPL-2.0 license](https://tldrlegal.com/license/mozilla-public-license-2.0-(mpl-2)).

If you would like to "re-implement" the server yourself, [information is available on the wiki](https://github.com/iceblade112/oldosuserver/wiki).

## Screenshots
TO-DO

## Instructions

### Requirements for usage
* Administrator access
* PHP 5+
* PDO (and the MySQL PDO extension)
* MySQL, MariaDB, etc.
* The released 2007 client

### Setting up the server
Import the SQL file and change `web/includes/sql.php`. The `web` folder goes in the root of the web server.

### Setting up the client
Redirect `osu.ppy.sh` to your server's IP using the hosts file.

## Other information

### User account storage
All user passwords are hashed using MD5. Very secure, yes!

### TO-DO
* Validation and security
* Maybe a PHP GUI for creating user accounts, viewing user details, etc?

### What does peppy think about this?
He thinks this is a silly concept (it is, though. lol) but he won't stop me.
