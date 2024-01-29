

## Mercado bitcoin challenge

### Etapas para iniciar o app com docker
- docker-compose up -d --build
- cp .env.example .env
- docker exec -it app php artisan key:generate
- docker exec -it app php artisan migrate --seed
