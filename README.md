<p> <b> Aplikacia kniznica. </b> </p>

<p>Pre spustenie aplikacie: </p>
<ul>
    <li>  1. po naklonovani adresara treba spustis composer install pre build framworku. </li>
    <li>  2. pre spustenie docker kontainerov prikaz: vendor/bin/sail up </li>
    <li>  3. pre pustenie migracii a seedu sa treba dostat priamo do imagu s aplikaciou. </li>
    <li>  4. prikaz docker ps - pre vylistovanie kontainerov. - treba skopirovat id aplikacneho imagu - image sail-8.2/app </li>
    <li>  5. docker exec -it "skopirovane ID" bash - prikaz na vstup do aplikacneho imagu </li>
    <li>  6. vo vnutri sme v adresari var/www/html - tu pustime php artisan migrate a php artisan db:seed --class=CategorySeeder aby sa nam vytvorili tabulky a pridali kategorie </li>
</ul>