ninq
====

My first MVC called ninq, based on Lydia by Mikael Roos. Made for the university course PHPMVC at Blekinge Tekniska Högskola Spring 2014

Installation
============
Börja med att ladda ner ramverket från GitHub, öppna sedan .htaccess filen i ninq mappen och ändra 

RewriteBase så den pekar på ninq mappen på din webbplats, ladda sedan upp ramverket på din server. Du kan 

även välja att clona ramverket med Git Bash med koden git clone git://github.com/ninqie/ninq.git


När ramverket är färdigladdat så pekar du din webbläsare till mappen där det ligger, du kommer nu komma 

till en välkomstsida som länkar till installationen. Innan du sätter igång installationen måste du ändra 

rättigheter på site/data mappen, den behöver ha skriva, läsa och körrättigheter, alltså chmod 777. Klicka 

sedan på installationslänken module/install och följ instruktionerna där!

Grundinställningar
==================
Som default skapas två användare, en admin med inlogg root:root och en vanlig användare med inlogg doe:doe.

Det skapas även diverse demosidor som nås via menyn.

Anpassa ramverket
=================
I config filen som ligger i site mappen kan ett antal inställningar ändras, bland annat logga och footern. 

För att göra dessa lokalisera config filen i site mappen och öppna i exempelvis jEdit, scrolla längst ner i 

filen tills du hittar raden som innehåller $ninq->config['theme'] eller sök efter denna term i filen. 

Läs vidare i koden tills du hittar 'data', här finns den kod du vill ändra.
Värdet som ändras är det på höger sida om => och skall vara inom enkel fnuttar, t.ex 'värde'.

Webbplatsens titel ändras genom att ändra 'header' värdet från ninq till det du önskar, glöm inte heller 

att ändra 'slogan' värdet till passande slogan.

Webbplatsens logga ändras genom att ändra 'logo' värdet, glöm inte att lägga din logga i 

site/themes/mytheme mappen!
Du kan även ändra dimensioner på din logga, 'logo_width' sätter värdet för loggans bredd och 'logo_height' 

sätter värdet för loggans höjd. 

Webbplatsens footer ändras genom att ändra 'footer' värdet.

För att ändra navigeringsmenyn så letar du reda på $ninq->config['menus'] eller söker efter den termen. 

Leta i koden efter 'my-navbar', det är den navigeringsmenyn du vill ändra.
För att skapa en länk på navigeringsmenyn så följer du mönstret för de övriga länkarna, t.ex
'min_sida'   => array('label'=>'Min sida', 'url'=>'sida/min'),
Du ger din nya länk ett namn, min_sida, label är den text som kommer visas på din webbsida och url är 

länken till sidan.

Du kan anpassa ramverket ytterligare genom att ändra i style.css som ligger i mappen site/themes/mytheme. 

Här kan du ändra bakgrundsfärg, textfärg, länkfärg m.m. Om du vill anpassa grundtemat ligger dennes 

style.css i mappen themes/grid, där kan du ändra all styling.


Skapa en blogg
==============
Det skapas automatiskt en demoblog när ramverket installeras med ett flertal inlägg. För att skapa ett 

blogginlägg så klickar du på login på din webbplats, här väljer du Create user för att skapa en egen 

användare, eller använd admin om du hellre vill det! När du nu är inloggad, kontrollera högst upp till 

höger, så klickar du på Modules i navbaren. Leta sedan reda på content under Enabled controllers och klicka 

dig in på create. Här kan du skapa din bloggpost, ett tips för Key är att använda titeln och slopa åäö samt 

använda bindestreck istället för mellanslag. Under Type skriver du post för att det ska bli en bloggpost 

och under Filter kan du välja mellan bbcode, markdown, htmlpurify, typography samt plain som modifierare 

för texten. För att spara inlägget klickar du på Create! För att se inlägget i bloggen så klickar du på My 

Blog i navbaren.


Skapa en sida
=============
Principen är samma för att skapa en sida som att skapa en blogg, om du inte skapat en användare eller 

loggat in så gör detta enligt stegen ovan. När du är inloggad klickar du in på Modules i navbaren och 

vidare till create under content som ovan. Här fyller du i som i steget ovan med undantag för Type, för att 

skapa en sida ger du type värdet page. När du skapat din sida kan du klicka på View för att se din sida och 

även se länken till den i adressfältet. Länken är page/view/id där id är idnumret för sidan. För att skapa 

en länk i navbaren till din nya sida så följ stegen för att ändra navigeringsmenyn här ovanför!
