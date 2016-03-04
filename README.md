

    Set up db
    In config/autoload/doctrine.global.php give correct db credentials

    Set up apache vhost

 <VirtualHost *:8080>
        ServerName prozigleague.localhost
        DocumentRoot "/var/www/prozigleague/public"
        <Directory /var/www/prozigleague/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>

    Add prozigleague.localhost to etc/hosts

    restart apache


