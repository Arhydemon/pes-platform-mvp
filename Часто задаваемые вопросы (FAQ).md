# Часто задаваемые вопросы (FAQ)

## 1. Порты заняты или сервис не запускается

**Проблема:** При выполнении `docker-compose up -d` возникает ошибка об уже занятом порте.

**Решение:**

1. Проверьте, какие процессы слушают порт:
   ```bash
   sudo lsof -iTCP -sTCP:LISTEN -P | grep :8080
   ```
2. Остановите лишний сервис или измените порт в `docker-compose.yml` и в `README.md`/`.env`.
3. Перезапустите контейнеры:
   ```bash
   docker-compose down
   docker-compose up -d
   ```

---

## 2. Docker или Docker Compose не найдены

**Проблема:** Скрипт `install.sh` выдал сообщение “Docker не найден” или “Docker Compose не найден”.

**Решение:**

* Установите Docker:
  * **Ubuntu/Debian:**
    ```bash
    sudo apt update && sudo apt install docker.io -y
    ```
  * **Windows/Mac:** Скачайте и установите [Docker Desktop](https://www.docker.com/products/docker-desktop).
* Установите Docker Compose:
  ```bash
  sudo apt install docker-compose -y
  ```
* Убедитесь, что службы запущены:
  ```bash
  sudo systemctl enable docker && sudo systemctl start docker
  ```

---

## 3. Контейнеры падают сразу после запуска

**Проблема:** Контейнеры имеют статус `Exited` или `Restarting`.

**Решение:**

1. Просмотрите логи конкретного контейнера:
   ```bash
   docker logs <container_name>
   ```
2. Частые причины:
   * Неправильные параметры в `.env` (пароль базы, имена).
   * Недоступность базы данных или LDAP.
3. Исправьте значения и перезапустите:
   ```bash
   docker-compose down && docker-compose up -d
   ```

---

## 4. Nextcloud не подключается к базе данных

**Проблема:** Nextcloud выдает ошибку `Database connection failed`.

**Решение:**

1. Проверьте переменные окружения:
   ```env
   POSTGRES_HOST=db
   POSTGRES_DB=nextcloud
   POSTGRES_USER=nc_user
   POSTGRES_PASSWORD=nc_pass
   ```
2. Проверьте, что сервис `db` (PostgreSQL) запущен и доступен:
   ```bash
   docker-compose exec db pg_isready -U nc_user
   ```
3. Перезапустите Nextcloud после исправления:
   ```bash
   docker-compose restart nextcloud
   ```

---

## 5. Collabora не открывает документы или выдает предупреждение HTTPS

**Проблема:** Редактор документов недоступен или браузер блокирует из-за HTTP/HTTPS.

**Решение:**

* Убедитесь, что в `docker-compose.yml` указано:
  ```yaml
  - extra_params=--o:ssl.enable=false
  ```
* Используйте HTTP (порт `9980`) или настройте прокси с TLS (Traefik/Nginx + Let's Encrypt).

---

## 6. Keycloak не принимает логин администратора

**Проблема:** Не получается авторизоваться в Keycloak.

**Решение:**

1. Убедитесь, что значения:
   ```env
   KEYCLOAK_ADMIN=admin
   KEYCLOAK_ADMIN_PASSWORD=admin123
   ```
2. При изменении пароля нужно пересоздать контейнер Keycloak:
   ```bash
   docker-compose down keycloak
   docker-compose up -d keycloak
   ```

---

## 7. Moodle не показывает курсы и не подключается к LDAP

**Проблема:** Moodle не видит пользователей из LDAP или Keycloak.

**Решение:**

1. Проверьте настройки LDAP и SSO в админ‑панели Moodle.
2. Убедитесь, что OpenLDAP доступен на порту `389`.
3. Проверьте логи Moodle:
   ```bash
   docker-compose logs moodle
   ```

---

## 8. Общие рекомендации

* **Всегда проверяйте логи** через `docker logs` или `docker-compose logs -f`.
* **Используйте `docker-compose down`** при внесении изменений в `.env` или `docker-compose.yml`.
* **Обновляйте образы:** `docker-compose pull && docker-compose up -d`.
* **Чистите ненужные тома и сети:**
  ```bash
  docker system prune -a --volumes
  ```
