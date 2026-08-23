# Running HOPn in Docker

This spins up the full site (Laravel app + MySQL database) in containers, so
anyone with Docker installed can run it with one command — no PHP, Composer,
or MySQL needs to be installed on their machine.

## 1. Install Docker Desktop

Download and install from https://www.docker.com/products/docker-desktop/
(Windows, Mac, and Linux are all supported). Open it once after installing
so the Docker engine is running.

## 2. Get the code

If you already have the repo cloned, just make sure it's up to date:

```bash
git pull origin main
```

Otherwise, clone it:

```bash
git clone https://github.com/VedantHage1210/hopn-corporate.git
cd hopn-corporate
```

## 3. Build and start the containers

From the project root (where `docker-compose.yml` is):

```bash
docker compose up --build
```

The first run will take a few minutes — it's downloading PHP/MySQL images,
installing dependencies, and setting up the database (migrations + demo
data) automatically. You'll see log output scrolling; wait until you see
`Ready. Starting Apache...` and then Apache's startup lines.

Leave this terminal window open — it's running the containers in the
foreground. To run it in the background instead, use:

```bash
docker compose up --build -d
```

## 4. Open the site

Once it's up, open in a browser:

```
http://localhost:8080
```

Admin panel:

```
http://localhost:8080/admin
```

Admin login: `superadmin@hopn.eu` / `Admin@123`

## 5. Stopping it

```bash
docker compose down
```

This stops the containers but keeps the database data (it's stored in a
Docker volume). To wipe everything and start completely fresh next time
(fresh database too):

```bash
docker compose down -v
```

## Sharing this with someone else

They only need Docker Desktop and the repo — no other setup. Send them
this file (or point them to the repo's `DOCKER.md`) and steps 1–4 above are
everything they need to run.

## Troubleshooting

- **Port 8080 already in use** — edit `docker-compose.yml`, change the app
  service's ports line to something like `"8081:80"`, then use
  `http://localhost:8081` instead.
- **Port 3307 already in use** — same idea, change the db service's ports
  line (this only matters if you want to connect an external DB tool to it;
  the app talks to the DB internally regardless).
- **Changes to the code not showing up** — rebuild with
  `docker compose up --build` (the `--build` flag forces a rebuild).
- **Want a totally clean slate** — `docker compose down -v` then
  `docker compose up --build` again.
