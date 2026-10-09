<div align="center">

# Třídní web T1

**Webové stránky třídy T1** — rozvrh, kalendář akcí, organizace třídy a jednoduchý chat.

![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-MySQL-777BB4?logo=php&logoColor=white)

</div>

---

## Stránky

| Stránka | Obsah |
| :--- | :--- |
| `index.html` | Úvod třídy |
| `rozvrh.html` | Rozvrh hodin |
| `kalendar.html` | Kalendář akcí a testů |
| `organizace.html` | Organizace třídy |
| `chat.html` | Třídní chat (backend `api.php` + MySQL) |

## Spuštění

Statické stránky stačí otevřít v prohlížeči. Chat potřebuje PHP s MySQL:

```bash
cp config.example.php config.php   # doplňte přístup k databázi
php -S localhost:8000
```

`config.php` s přístupovými údaji je v `.gitignore` — do repozitáře se nikdy nedostane.

---

<div align="center"><sub>© 2025 Adam Bukač</sub></div>
