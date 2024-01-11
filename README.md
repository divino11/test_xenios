# How to start
- Clone from github git clone git@github.com:divino11/test_xenios.git
- composer install for install all packages
- ./vendor/bin/sail up -d for build containers and run docker
- docker compose exec laravel.test php artisan key:generate generate new application key
- docker compose exec laravel.test php artisan migrate migrate database

# Тестовое задание по Laravel:

Создать примитивный мессенджер

Неоходимо реализовать

1. Бекенд сервисы для создания, редактирования, удаления и получения групп (чатов) и сообщений

Группа должна иметь:
- название
- дату создания

Сообщения должны иметь:
- текст сообщения
- связь с группой
- имя пользователя
- дату создания
- дату редактирования

2. API эндпоинты для работы с бекенд сервисами

API эндпоинт для получения списка всех групп должен возвращать группы отсортированные в соответствии с последним входящим сообщением. Т.е. если в группе есть новое сообщение, то эта группа должна быть первой в списке
