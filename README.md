### Файл hosts
Добавить в файл следующее:
`{Локальный ip}  rt-chat.local`

Например:
`192.168.88.253  rt-chat.local`

### Docker
В папке проекта выполнить:
`docker-compose up --build -d`

### Сборка проекта
В папке проекта выполнить:
`docker-compose exec app php  build/phing.phar -f build/backend.xml`

### Зависимости frontend
В папке app/frontend выполнить:
`yarn install` или `npm install`

### Сервер разработки frontend
В папке app/frontend выполнить:
`quasar dev -H rt-chat.local`
(в случае если quasar CLI установлен, но не найден `export PATH="$(yarn global bin):$PATH"`)

### Тестовый пользователь
Логин для входа: `test@test.ru`
Пароль: `123123123`

