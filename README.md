
 <VirtualHost *:8080>
        ServerName prozigleague.localhost
        DocumentRoot "D:/xampp/htdocs/prozigleague/public"
        <Directory D:/xampp/htdocs/prozigleague/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>


