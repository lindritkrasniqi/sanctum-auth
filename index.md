## Welcome to sanctum-auth

This legacy package is a very simple authentication scaffolding built on the Laravel Sanctum.

### Installation
The sanctum-auth package provided by [@lindritkrasniqi](https://github.com/lindritkrasniqi) is located in the `lindritkrasniqi/sanctum-auth` Composer package, which may be installed using Composer:

```
  composer require lindritkrasniqi/sanctum-auth
```

Once the `lindritkrasniqi/sanctum-auth` package has been installed, you may install the backend scaffolding using the `sanctum-auth` Artisan command:

```
  // Generate scaffolding...
  php artisan sanctum-auth:install

  // Remove scaffolding...
  php artisan sanctum-auth:uninstall
```


### Api documentation

Checkout the api [docs](https://www.postman.com/lindritkrasniqi/workspace/sanctum-auth) and the endpoints with the response examples.

- [x] ``` /api/login ```
- [x] ``` /api/register ```
- [x] ``` /api/me ```
- [x] ``` /api/forgot ```
- [x] ``` /api/reset ```
- [x] ``` /api/logout ```

### Supported Versions

The table below lists compatible Laravel versions:

| Versions                                                  | Laravel Version |
| -------------                                             | --------------- |
| [1.x](https://github.com/lindritkrasniqi/sanctum-auth)    | 8.x             |

