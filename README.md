# x.369usa.com

PHP app with MySQL, run locally via Docker and deployed to DreamHost on push to `main`.

## Local development

### Prerequisites

- Docker and Docker Compose

### Run locally

```bash
docker-compose up --build
```

- **App:** http://localhost:18080  
- **phpMyAdmin:** http://localhost:18081  

### Shell into the PHP container local

```bash
docker exec -it x-369usa-com /bin/bash
```

