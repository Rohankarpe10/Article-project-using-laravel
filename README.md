# Article-project-using-laravel
Article website with login, registration and search and filter page 
Command need to run to start the application

1. This will install the php version-----
	sudo apt update; sudo apt install php8.1
2. Then Git clone the project-----
	git clone 
	cd Article-project-using-laravel/my-app/my-app	
 

3. Then remove the vendor folder so that the composer command can be run----
	rm -rf vendor/
	composer require laravel/sail --dev --ignore-platform-req=*
4. Make a composer Update----
	composer update --no-scripts
5. Sail install---
	php artisan sail:install
6. Then connect to the docker--- and the application will be started
	./vendor/bin/sail up
new terminal
7. Run this command so that the tables are migrated
	./vendor/bin/sail artisan migrate



About this project:
1. In this project there is a registration page where the user can login.
2. Then after successful registration then the user can login 
3. Then on the home page the user can search for article and also filter the article 
4. And also after login the user will have a personalized category where the user selected the category when registration 


