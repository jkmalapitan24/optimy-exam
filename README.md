PHP Verion: 8.1.6
MySql: 8.1.6

Changes:
1. Updates the file systems in MVC approach. (did not include view since there will be no file in there)
2. Added namespace above of the classes
3. uses extends on models to eliminate repetitive codes.
4. Created a Config/config.php which may includes all possible constants to be use
5. Comments are added on some code areas for code readability
6. Modified the index.php to include use of classes
7. Modified the index.php to include instantiation of connection, model and controller
8. Modified logic also on index on fetching, that remove the fetching of comments inside the foreach of the news, this reduces the repetitive fetching. instead all the news and comments are loaded ahead of the loop.

Suggestions:
1. Better to have a file like .env that may contain a config for each environment being used. (development, staging, sandbox, production, etc)
2. have a file like .htaccess to remove the .php file if ever will become a web app.
3. have a log file for any kind of error encountered
4. avoid usage of single character variable, better to use naming convention like pascal case, ex: $NewsArticle, $NewsComments, etc. 
5. Better to have as much comments as possible on some code areas
6. reuse existing functions/codes if possible or make some codes reusable.
7. Logical: AVOID queries or fetching from DB inside a loop. to much memory to be use and not a good practice.
8. Always have a checking before loops if there is a value.
9. Better to have a unit test, this may help to avoid errors before being deployed. Less turnover time from QA means less time needed for the cod to be deployed.
