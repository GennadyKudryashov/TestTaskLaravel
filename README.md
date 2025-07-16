# TestTaskLaravel
TestTask for Laravel

Тестовое задание для фреймворка Laravel

Привет, это простое задание, суть задания оценить ваши навыки в работе с laravel, изучить стилистику написания кода.

Создать 3 миграции в базу данных с помощью Artisan:
Таблица “Жанры” с полями:
ID
Название жанра
Таблица Фильмы с полями :
ID
Название фильма
Статус публикации 
Ссылка на постер
Таблица связи фильмы с жанрами
Создать seeds для тестового заполнения вышеуказанных таблиц
Создать модели, контроллеры, для создания, вывода, редактирования и удаления записей.
При создании записи в таблицу фильмы, должна происходить загрузка изображения с постером фильма ( если изображение отсутствует, к записи должно прикрепляться дефолтное изображение. Так же фильм не должен быть опубликован, публикация записи должна быть предусмотрена отдельным методом.
Создать контроллеры REST API для выборки и пагинации данных в формате json
жанры ( выводит список всех жанров)
жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы
фильмы - выводит все фильмы с разбивкой на страницы
фильмы/id - выводит определенный фильм по ID

	Фильм всегда в себе должен содержать жанры к которым относится и ссылку на изображение

Внимание в контроллерах должно быть минимальное количество логики. Все входящие по реквесту данные должны быть отвалидированы, особенно файлы.



Steps to solve 
-----------------

create new project and clone it with git clone
` git clone https://github.com/GennadyKudryashov/TestTaskLaravel.git `

add docker config /laradock/ : 

``` git submodule add https://github.com/Laradock/laradock.git ```

go to laradok folder and create env file : 

``` cp .env.example .env ```

run docker envirument :

``` sudo docker-compose up -d nginx mysql ```
``` sudo docker-compose exec --user=laravel workplace bash ```

after that we jump to command line inside docker-in-docker contaiter. 

create new application , named my-test-app: 

``` composer create-project laravel/laravel my-test-app "12.*"```

set up DB_ settings in config database .


edit .env and replace line with ```APP_CODE_PATH_HOST=../my-test-app/```

run container and resetup data with npm install && npm build && composer run dev 

than we can see an https:\\localhost:8000 page with "WELCOME LaRAVEL" page data.

lets add migrations to DB: 

```php artisan make:model Film -m```

this will add mew model and mgration. 

edit migration data : add field with film name - call this column "name" string 250 (we belive there are no long names to films)

same to film genre :

```php artisan make:model Genre -m```

migrate data to DB : 

``` php artisan migrate ```

check that data exist : 

``` mysql -u default -psecret -h mysql default ```

``` SHOW DATABASES```

+--------------------+
| Database           |
+--------------------+
| default            |
| information_schema |
| performance_schema |
+--------------------+
3 rows in set (0.00 sec)

``` use default ```

Database changed

``` show tables ```

here we can see that all data is evaliable. 
lets check genres table :

``` show create table genres; ```
as we can see structure of table is ok;

now switsh to model genre and add fillable fields :

also create new resource controller for Films model:

``` php artisan make:controller FilmController --resource --model=Film  ```

  INFO  Controller [app/Http/Controllers/FilmController.php] created successfully.  

  now we add to web route new route for controller :

  ``` Route::resource('film', FilmController::class);```

  and after filling all controller methods we add views like this :

  ``` php artisan make:view films.index ```

   INFO  View [resources/views/films/index.blade.php] created successfully. 

   

