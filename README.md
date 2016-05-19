<<<<<<< HEAD
<<<<<<< HEAD
Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations 前后台和命令行通用的公共配置文件
    mail/                contains view files for e-mails 前后台和命令行通用的跟邮件相关的布局和模板文件
    models/              contains model classes used in both backend and frontend 前后台和命令行共用的model文件，也是common中最主要部分，承担重任。

console
    config/              contains console configurations 
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS 前端资源包php类，用于管理js/css等

    config/              contains frontend configurations  前端应用配置文件，包含main.php的主配置文件和params.php的全局参数配置文件

    controllers/         contains Web controller classes 前端应用的控制器文件
    models/              contains frontend-specific model classes 前端应用的模型文件
    runtime/             contains files generated during runtime 
    web服务器具有777权限的目录，写入运行时临时文件

    views/               contains view files for the Web application  前端应用视图文件
    web/                 contains the entry script and Web resources  web用户可以访问的目录，此外所有目录均不可暴露给web用户

    widgets/             contains frontend widgets  前端应用的小挂件
vendor/                  contains dependent 3rd-party packages 
第三方库和yii框架本身，修改composer.json ，就可以将第三方工具安装到此目录

environments/            contains environment-based overrides  
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```
=======
#yii2-advanced
>>>>>>> f61475636b411a7b567de128cd91c97a706fe6bc
=======
#booking
>>>>>>> dbb122ae6c72d26108bc475ffb178591177df5a7
