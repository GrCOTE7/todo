# ToDo

---

```
browser-sync start --proxy "todo" --files "**/*.html, **/*.twig, **/*.css, **/*.js, **/*.php"
```

# Installation

Mise en place (Ici pour une installation complète, par exemple sur un autre PC):

1. a) Fork du projet
   
   http://prntscr.com/Z-gNRi-h0eDC
   
   http://prntscr.com/rEIyBU79NpgT
   
   b) Clone ton Fork
   

2. Installer les dépendances
   
   (Dans le dossier, en CLI)
   
   ``` 
   composer update
   ```
   
3. Faire tes Settings (config/settings.php)
   
    À partir du fichier config/settings_exemple.php

4. Créer la Database "todo" et lancer les migrations
   
   Linux

   ``` 
   vendor\bin\phinx.bat migrate
   ```
   Windows
   
   ```
   ./vendor/bin/phinx.bat migrate
   ```
   
   → http://prntscr.com/ZyRaDBIEZFZs
   
   → http://prntscr.com/FtCAjw4VO-Wh
   
Bien-sûr, le table **todo** est vide... À nous de la peupler localement ;-)