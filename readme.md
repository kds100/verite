Verite Survey Dashboard
-----------------------
This is a laravel app that consumes data from a Qualtrics API, crunches some numbers, and displays a searchable dashboard to Verite Analysts.

### Getting set up locally

* Clone this repo:
```bash
git clone git@github.com/hackforwesternmass/verite
```

* The repo contains a `.lando.yml` file that provides the local dev environment
  * If you don't have lando install it via these directions: [Install Lando](https://docs.devwithlando.io)

* Now run:
```bash
lando start
```
This will start the app and pull in the `node` and `php` dependencies automatically.
