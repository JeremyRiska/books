Aplikacia kniznica.

Pre spustenie aplikacie:
    1. po naklonovani adresara treba spustis composer install pre build framworku.
    2. pre spustenie docker kontainerov prikaz: vendor/bin/sail up
    3. pre pustenie migracii a seedu sa treba dostat priamo do kontainera s aplikaciou.
    4. prikaz docker ps - pre vylistovanie kontainerov. - treba skopirovat id aplikacneho kontainera - image sail-8.2/app
    5. docker exec -it "skopirovane ID" bash 
    6. vo vnutri sme v adresari var/www/html - tu pustime php artisan migrate a php artisan db:seed --class=CategorySeeder aby sa nam vytvorili tabulky a pridali kategorie
