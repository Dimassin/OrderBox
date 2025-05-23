# Установка и запуск проекта

## Команды для запуска:

1. Установка зависимостей:
```bash
composer install
```

2. Настройка окружения:
```bash
cp .env.example .env
```

3. Настройка БД (отредактируйте .env вручную):
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

4. Генерация ключа:
```bash
php artisan key:generate
```

5. Миграции и сиды:
```bash
php artisan migrate --seed
```

6. Запуск сервера:
```bash
php artisan serve
```
