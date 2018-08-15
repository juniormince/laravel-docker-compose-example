# Docker Compose Laravel Example

Code for a demo of [Docker Compose](https://docs.docker.com/compose/) I gave at
a local meetup. See the [accompanying slides](https://mlo.io/talks/mnphp-containers/).

Don't pay too much attention to the Laravel code. I chose Laravel because I
could setup "complex" use cases (mail and queuing) with minimal effort.

Files of interest:

* `docker-compose.yaml`
* `Dockerfile`
* `docker/nginx/nginx.conf`

To start the application run `docker-compose up --detach --build`.

To test mail, open [Mailhog](http://localhost:8025) and visit [/mail](http://localhost:8000/mail).

To see queues in action, open the [Horizon Dashboard](http://localhost:8000/horizon)
and trigger a job by visiting [/queue](http://localhost:8000/queue).

Run the app container with `docker-compose run --rm app bash`.
