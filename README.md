# Mouud
**[Mouud](http://mouud.sarahmauriaucourt.fr/)**, the sound of your mood !
Mouud is a collaborative music website, where each user can share his musical projects.

[![Watch the demonstration](https://sarahmauriaucourt.fr/public/assets/mockups/xmouud2020.jpg.pagespeed.ic.Cyr72lhabK.webp)](https://youtu.be/ElBJXa_3eu8)

## Table of contents
* [Context](#context)
* [Built With](#built-with)
* [Functionalities](#functionalities)
* [Getting Started](#getting-started)
* [Author](#author)
* [Sources](#sources)
* [Project status](#project-status)

## Context
Au travers de ce projet, je voulais créer un site reposant où on peut exprimer ses émotions par la musique. Pour cela, j’ai choisi des couleurs chaleureuses créant une ambiance tamisée et les animations permettent de créer de la fluidité dans le parcours du site.

## Built With

* [Laravel](https://laravel.com/) - PHP framework
* [Pjax](https://github.com/defunkt/jquery-pjax) - Ajax & PushState jQuery plugin
* [Bootstrap](https://getbootstrap.com/) - CSS framework

## Functionalities

### Each user can :
- like, add, modify, delete a **music**
- receive a **notification** 
    - when someone likes your music
- create, modify, delete a **playlist**
- create, modify, delete his **profile**
- **search** users and/or songs
- **subscribe** or **unsubscribe** to other users

### Security: 
- email :
    - verification when creating an account
    - to change your password

## Getting Started

Install dependencies.

```
$ npm install
$ composer install
```

Image package manager.

```
composer require intervention/image
```

Start the server.

```
php artisan serve
```

Running migrations & seedings.

```shell
$ php artisan migrate
$ php artisan migrate --seed
```

Open [http://localhost:8000](http://localhost:8000) to view it in the browser.

## Author

* **Sarah Mauriaucourt** - *Developer & webdesigner* - [sarah-mrcrt](https://github.com/sarah-mrcrt)

## Sources
* Illustrations : 
    - Camille Glaçon (logo & homepage)
    - [Undraw](https://undraw.co/)
* Photographies : [Pixabay](https://pixabay.com/), [Pexels](https://www.pexels.com/)
* Web resources :
    - Copyright (c) 2020 [Aaron Iker](https://codepen.io/aaroniker/pen/PowZbgb)
    - Copyright (c) 2013 [Bootsnipp.com](https://bootsnipp.com/snippets/N6pp4)
    - Copyright (c) 2017 [Toastr](https://github.com/CodeSeven/toastr)

## Project status
The development of the application has paused.