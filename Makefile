
# Variables
DOCKER_COMPOSE = docker-compose --file=docker-compose.yml --project-name hismith

# Build Docker images
build:
	@echo "Building docker images..."
	$(DOCKER_COMPOSE) build

# Start Docker containers
start:
	@echo "Starting docker containers..."
	$(DOCKER_COMPOSE) up -d

# Stop Docker containers
stop:
	@echo "Stopping docker containers..."
	$(DOCKER_COMPOSE) stop

# Remove Docker containers, volumes, and networks
remove:
	@echo "Removing docker containers, volumes, networks..."
	$(DOCKER_COMPOSE) down -v

# Restart Docker containers
restart:
	@echo "Recreating all Docker containers..."
	$(DOCKER_COMPOSE) up -d --force-recreate

# Initialize project
init:
	@echo "Installing composer packages..."
	@docker exec -it php-fpm_hismith composer install

	@echo "Running database migrations..."
	@docker exec -it php-fpm_hismith php artisan migrate

# Run PHP container's shell
php_sh:
	@echo "Running PHP container's shell..."
	@docker exec -it php-fpm_hismith sh

# Run seeders
seed:
	@echo "Running seeders..."
	@docker exec -it php-fpm_hismith php artisan db:seed | grep -v "RUNNING"
