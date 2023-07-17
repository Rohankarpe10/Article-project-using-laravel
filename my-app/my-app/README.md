Command need to run to start the application

This will install the php version-----
	sudo apt update; sudo apt install php8.1
Then Git clone the project-----
	git clone 
	cd Article-project-using-laravel/my-app/my-app	
 

Then remove the vendor folder so that the composer command can be run----
	rm -rf vendor/
	composer require laravel/sail --dev --ignore-platform-req=*
Make a composer Update----
	composer update --no-scripts
Sail install---
	php artisan sail:install
Then connect to the docker--- and the application will be started
	./vendor/bin/sail up
new terminal
Run this command so that the tables are migrated
	./vendor/bin/sail artisan migrate



