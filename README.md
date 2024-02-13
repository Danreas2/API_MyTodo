<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About
Aplikasi Web Service yang dibuat menggunakan laravel 8 dengan penerapan JWT untuk login

## Response List
422 - Validator Error<br>
201 - Register Success<br>
200 - Auth & Process Success<br>
401 - Unauthotized<br>
409 - Register Vailed<br>

## Route
POST /login<br>
POST /register<br>
POST /logout<br>
POST /task<br>
GET /task<br>
PUT /task/{id}<br>
DELETE /task/{id}<br>

## Parameter Header
headers: {<br>
        'Accept': 'application/json',<br>
        'Content-Type': 'application/json',<br>
        'Authorization': 'Bearer $token'<br>
},
