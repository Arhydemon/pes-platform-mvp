#!/bin/bash

echo "🚀 Старт установки Цифрового Пространства ПЭС..."

# Проверка Docker
if ! command -v docker &> /dev/null
then
    echo "❌ Docker не найден. Установи Docker и попробуй снова."
    exit 1
fi

# Проверка Docker Compose
if ! command -v docker-compose &> /dev/null
then
    echo "❌ Docker Compose не найден. Установи docker-compose и повтори."
    exit 1
fi

# Подтягиваем образы
echo "📦 Скачиваем образы..."
docker-compose pull

# Запускаем в фоне
echo "🔧 Запускаем контейнеры..."
docker-compose up -d

echo "✅ Установка завершена!"
echo ""
echo "📌 Сервисы доступны по адресам:"
echo "➡️  Nextcloud:       http://localhost:8080"
echo "➡️  Collabora:       http://localhost:9980"
echo "➡️  Keycloak:        http://localhost:8081"
echo "➡️  Moodle:          http://localhost:8082"
echo "➡️  Gitea:           http://localhost:3000"
echo "➡️  Nexus:           http://localhost:8083"
echo "➡️  Jitsi Meet:      https://localhost:8443"
