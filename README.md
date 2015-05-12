# CPSC431-TermProject
## Target installation environment
* Dokku-alt

## Installing on Dokku
Assumes you already have a server setup and your current system is able to push to it
1. git clone https://github.com/Zaephor/CPSC431-TermProject.git
2. cd CPSC431-TermProject
3. git remote add dokku dokku@<yourserver.com>:cpsc431
4. git push dokku remote
5. ssh dokku@<yourserver.com> config:set cpsc431 BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-php
6. ssh dokku@<yourserver.com> mariadb:create cpsc431
7. ssh dokku@<yourserver.com> mariadb:link cpsc431 cpsc431
8. ssh dokku@<yourserver.com> run cpsc431 php artisan migrate

## Installing on XAMPP(Technically untested)
1. Download https://github.com/Zaephor/CPSC431-TermProject/archive/master.zip
2. Extract all files to XAMPP root directory(htdocs?)
3. Install the sql file in /db to mysql(command line is advised, this may take a while)
4. Create a file at root called ".env" and enter the following into it:

> DATABASE_URL:   mysql2://<user>:<password>@localhost:3306/cpsc431

5. Create .htaccess file at root containing:

> RewriteEngine On

>  RewriteBase /

>  RewriteCond %{REQUEST_URI} !^/public/

>  RewriteCond /public/%{REQUEST_URI} -d

>  RewriteCond %{REQUEST_URI} !(.*)/$

>  RewriteRule ^(.*)$ /public/$1/

>  RewriteBase /

>  RewriteCond %{REQUEST_URI} !^/public/

>  RewriteCond %{REQUEST_FILENAME} !-f

>  RewriteCond %{REQUEST_FILENAME} !-d

>  RewriteRule ^(.*)$ /public/$1

>  RewriteBase /

>  RewriteRule ^(/)?$ /public/index.php [L]
