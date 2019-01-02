# sceleton
Vårt eget skelett tema som alla sajter som byggs från grunden ska utgå ifrån.

Användning
---------------------

### CSS
Vi använder [SASS](http://sass-lang.com/) som CSS extension language.
Det låter oss använda funktionalitet så som mixins, variabler, nesting etc. 

Majoriteten av all riktad CSS i ett projekt bör ske i `style.scss`
Denna kompileras och minifieras automatiskt av Codekit till `style.css` och läses av hemsidan. 
Utöver `style.scss` har vi ett antal s.k. includes. Dessa är per default:
* `_defaults.scss` – WordPress default styling för bilder, Clearfix samt accessibility relaterad CSS.
* `_grid.scss` – Ett egetbyggt grid-system m.h.a mixins för att snabbt skapa kolumner. Kan med fördel tas bort om inget behov finns.
* `_media-queries.scss` – Alla media queries för responsiva breakpoints.
* `_print.scss` – Print-specifik styling. Kan med fördel tas bort om inget behov finns.
* `_reset.scss` – Reset CSS från Eric Meyer samt Normalize för att ge inputs ett default utseende i alla webbläsare.
* `_typography.scss` – Bas-styling för typografiska element som h1-h4 (h5 och h6 bör ej behövas i en hemsida), paragraf, länkar etc.
* `_variables.scss` – Variabler för användning i övriga sass filer. Exempelvis färger och typsnitts-familjer.

Vid användning av fler externa CSS filer som t.ex. [Flexslider](http://www.woothemes.com/flexslider/) finns två alternativ. Antingen ändrar du dess filnamn till `_flexslider.scss` och inkluderar i botten av `style.scss` eller så lägger du `flexslider.css` i `/css/` mappen och inkluderar via `wp_enqueue_script()` i `functions.php`.
Vår tumregel är att längre CSS filer bör inkluderas för sig i `functions.php` medan kortare CSS snippets kan inkluderas i `style.scss`.

För kompilering används [libsass](http://sass-lang.com/libsass) istället för den officiella Ruby kompilatorn. Libsass kräver inte Ruby och är snabbare. Om du stöter på problem med kompileringen som kan vara pga. detta kan libsass slås av i inställningarna för projektet i Codekit under `languages > Sass` "Use the libsass compiler instead of the official Ruby compiler".

Inkluderat
---------------------
Dessa bör ses över minst var sjätte månad för att säkerställa att vi använder senaste versionen.

### Config
I temat finns en färdig konfigurationsfil för CodeKit. Denna bör *inte* raderas eller ändras på något sätt då den är förinställd på de inställningar vi använder.
Om du tycker att något där borde ändras så ska det först föreslås och läggas in som ett issue i repo.

### Inkluderade externa CSS komponenter
* CSS Reset: [ http://meyerweb.com/eric/tools/css/reset/](http://meyerweb.com/eric/tools/css/reset/)
* Normalize: [https://necolas.github.io/normalize.css/](https://necolas.github.io/normalize.css/)

### Inkluderade externa JS komponenter
* Modernizr (inkl. html5shiv): [https://modernizr.com/](https://modernizr.com/)
* Picturefill: [http://scottjehl.github.io/picturefill/](http://scottjehl.github.io/picturefill/)
* Respond: [https://github.com/scottjehl/Respond](https://github.com/scottjehl/Respond)
* Selectivizr: [http://selectivizr.com/](http://selectivizr.com/)

### Övrigt
Vi använder Composer för att hämta in dependencies/packages automatiskt från diverse ställen. Med Composer kan vi direkt hämta Sceleton här från repot vid uppsättning av en ny sajt så att nya sajter alltid har den senaste versionen. Vi hämtar även automatiskt in ACF Pro och WP Migrate DB Pro från deras egna packages. 


Problem/vidareutveckling
---------------------
Problem osv. kan diskuteras i Slack. Sådant som bör åtgärdas eller ändringar/tillägg som vi kommit överens om ska läggas in som tickets under "issues" i vårt Github repository.
Då kan dessa tas om hand av vem som helst av oss genom att man först assignar den personen och sedan görs ändringar lokalt och pushas upp.

I framtiden har vi även planer på att skapa mer specialiserade versioner av Sceleton för ännu snabbare uppstart av projekt där man redan vet vad man behöver. Detta kommer troligtvis ske i branches men är ännu i idé-stadiet. Med branches vore det i så fall så enkelt som att ändra en rad i composer.json innan man kör vagrant provision för att få ut just den version av temat man vill ha. 