# mongodb-odm-benchmarks

By defaul commands output execution time. If you want to see detailed XHProf report - uncomment in command lines related to `XHProfHelper`.

# Instructions
1. Clone project to your PC.
2. Create in root of your project `.env` file from `.env.dist`. 
3. Set your own values for environment variables related to MongoDB.
4. Set required version of ODM lobrary in `composer.json`.
5. Install dependencies.
6. If you dont know from where to start - type `./bin/console` for showing full list of available commands. Commands with benchmarks prefixed with `app:`
