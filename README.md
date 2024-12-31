# PiGLy（確認テスト）

### 環境構築

#### Dockerビルド
1.	`git clone git@github.com:knyys/Pigly.git`
2.	`cd Pigly` 
3.	`docker-compose up -d --build` 
4.	`code .` 

※MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

#### Laravel構築環境
1. `docker-compose exec php bash`  
2. `cp .env.example .env`
3. 環境変数を変更
```
DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass
```
4. `composer install`  
5. `php artisan key:generate`  
6. `php artisan migrate`  
7. `php artisan db:seed`  

#### ER図
![pigly](https://github.com/user-attachments/assets/a3e35934-7566-4fbb-9cf8-0460fd633503)


#### 使用技術
- PHP 8.3.12
- Laravel 8.83.29
- Mysql  8.0.26
