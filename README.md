
# 🚀 MVP цифрового пространства ПЭС

**Проект представляет собой минимально жизнеспособный продукт (MVP) для цифрового рабочего пространства ПЭС, предназначенного для удобного совместного использования документов, коммуникаций, обучения и управления проектами.**

---

## 🧩 Цели проекта

Основная цель проекта — развернуть интегрированную платформу на базе Open Source-решений, чтобы обеспечить сотрудников компании или студентов ВУЗа удобным цифровым инструментом для совместной работы и взаимодействия.

---

## ⚙️ Архитектура системы

Проект использует микросервисную архитектуру на базе Docker Compose и состоит из следующих компонентов:

| Сервис         | Описание                                                                                               | Порт                           | Назначение                                               |
| -------------------- | -------------------------------------------------------------------------------------------------------------- | ---------------------------------- | ------------------------------------------------------------------ |
| **Nextcloud**  | Хранение, обмен файлами, управление проектами и календарями | `8080`                           | Совместная работа, хранение данных   |
| **Collabora**  | Онлайн-редактор документов                                                             | `9980`                           | Редактирование документов                  |
| **Keycloak**   | Централизованная аутентификация (SSO)                                            | `8081`                           | Управление доступом                              |
| **Moodle**     | Платформа дистанционного обучения                                               | `8082`                           | Организация обучения                            |
| **Gitea**      | Git-репозитории, управление кодом и проектами                              | `3000`                           | Хранилище кода, управление версиями |
| **Nexus**      | Менеджер репозиториев и бинарных пакетов                                   | `8083`                           | Хранение и распространение ПО            |
| **Jitsi Meet** | Система видеоконференцсвязи                                                          | `8443`(HTTPS)                    | Видео- и аудио-общение                           |
| **OpenLDAP**   | Сервис каталогов и учётных записей                                               | `389`,`636`                    | Хранение данных пользователей           |
| **PostgreSQL** | Реляционная база данных                                                                   | без внешнего порта | Хранение данных платформы                   |

---

## 🚦 Предварительные требования

Убедитесь, что на вашей машине установлены следующие компоненты:

* [Docker](https://docs.docker.com/get-docker/)
* [Docker Compose](https://docs.docker.com/compose/install/)

---

## 📥 Установка

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/yourusername/pes-digital-space-mvp.git
cd pes-digital-space-mvp
```

### 2. Настройте переменные окружения

Отредактируйте файл `.env` под свои потребности:

```env
# PostgreSQL
POSTGRES_DB=nextcloud
POSTGRES_USER=nc_user
POSTGRES_PASSWORD=nc_pass

# OnlyOffice JWT
ONLYOFFICE_JWT_ENABLED=true
ONLYOFFICE_JWT_SECRET=supersecret123
ONLYOFFICE_DOC_SECRET=supersecret123

# Nextcloud ADMIN
NEXTCLOUD_ADMIN_USER=admin
NEXTCLOUD_ADMIN_PASSWORD=ChangeMe123!
NEXTCLOUD_TRUSTED_DOMAINS=localhost
```

### 3. Запуск через скрипт

```bash
chmod +x install.sh
./install.sh
```

Или вручную:

```bash
docker-compose pull
docker-compose up -d
```

---

## 🌐 Доступ к сервисам

После запуска доступны следующие сервисы:

* **Nextcloud:** [http://localhost:8080](http://localhost:8080/)
* **Collabora:** [http://localhost:9980](http://localhost:9980/)
* **Keycloak:** [http://localhost:8081](http://localhost:8081/)
* **Moodle:** [http://localhost:8082](http://localhost:8082/)
* **Gitea:** [http://localhost:3000](http://localhost:3000/)
* **Nexus:** [http://localhost:8083](http://localhost:8083/)
* **Jitsi Meet:** [https://localhost:8443](https://localhost:8443/)

---

## 📚 Документация

Полная документация доступна в каталоге [`docs/`](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/docs):

* [Инструкция по установке](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/docs/Installation.md)
* [Архитектура и взаимодействие сервисов](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/docs/Architecture.md)
* [Использование системы](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/docs/Usage.md)
* [Планы расширения проекта](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/docs/Expansion.md)

---

## 🔮 Планы на будущее

Возможные направления развития:

* Интеграция дополнительных сервисов (Mattermost, MinIO, ELK Stack)
* Реализация автоматического резервного копирования
* Внедрение CI/CD с помощью GitLab Runner или GitHub Actions
* Оркестрация через Kubernetes (k3s) для production-окружения
* Внедрение мониторинга (Prometheus, Grafana)

---

## 📄 Лицензия

Проект распространяется под лицензией  **MIT** . Подробнее см. файл [LICENSE](https://chatgpt.com/g/g-p-6863078c7a1c8191b67ac674d71f72ff-mvp-tsifrovogo-prostranstva-pes-na-baze-docker/c/LICENSE).
