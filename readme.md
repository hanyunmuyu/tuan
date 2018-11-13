写在前面

如果没有接触过laravel的童鞋可以去[这里](https://laravelacademy.org/laravel-docs-5_7)了解laravel的基本配置方法


如何启动

1、复制工程根目录下面的 .env.example 为   .env，修改.env
```angular2html

APP_URL=http://[你的ip]:[你采用的端口号]

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1 数据库地址
DB_PORT=3306    数据库端口号
DB_DATABASE=tuan    你的数据库名称
DB_USERNAME=hanyun  数据库用户名
DB_PASSWORD=    数据库密码


```

2、安装依赖包
```angular2html

    composer install
    
```

3、生成网站的加密串
```angular2html

php artisan key:generate

```
4、初始化数据库
```angular2html

php artisan  migrate:refresh --seed

```

5、启动PHP内置server，可以避免安装server
```angular2html
php artisan serve [--port=你采用的端口号]

```