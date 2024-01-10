# TLE1-Team11
Repository for TLE1

## Links
- CMGT Showcase: https://cmgt.hr.nl/projecten/young-choices
- Tijdelijke live omgeving: http://206.189.111.199/

## Hoe installeer je het project

### Vereiste software
- PHP 8.1.11
- NodeJS 20.10.0 (LTS)
- Composer

### Clone het project

- Dit is de link naar het **[project](https://github.com/MarkDeKraker/TLE1-Team11.git)**

Pull het project

### Laad files in

Start XAMPP / WAMP. Zorg dat de databaseserver aanstaat. Wil je dit zeker weten start dan ook de Apache server en navigeer naar http://localhost/phpmyadmin/. Als je de databases kan zien betekent dit dat de server draait.

### Projectsettings

Open het `.env.example` bestand en dupliceer deze in dezelfde map (Verander de naam van de nieuwe `.env.example` file naar `.env`)

#### Database
Voor de applicatie is een database verplicht (MySQL). Daarom is het belangrijk dat in de .env file de juiste configuratie ingevuld is voor de database.

#### Installatie van het project
Voer de volgende commandos uit in je terminal:

```bash
npm install
```

```bash
composer install
```

```bash
php artisan migrate:fresh --seed
```
```bash
npm run dev
```

```bash
php artisan serve
```

De server wordt gestart en het url wordt weergegeven in de terminal. Met CTRL / CMD + click kun je het url openen in je browser. (Als er een error staat over een missing app_key klik op `Generate app key` en refresh de pagina)

Als het goed is zie je nu de de applicatie.

**Gefeliciteerd, de installatie is geslaagd!**
