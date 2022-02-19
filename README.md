# PDC-Final-Project
# Project Requirement 
* Install Xamp package.
* * https://www.apachefriends.org/download.html
* Install Composer.
* * https://getcomposer.org/download/
* Install npm (node package manager)
* * https://nodejs.org/en/

# How to setup git in local computer?
* git config --global user.name "name"
* git config --global user.email "Email@gmail.com"
# How to make git folder locally in computer?
* git init
# How to clone the remote git repositry?
* git clone https://github.com/SMEMY/PDC-Final-Project.git
# Add remote repositry
* git remote add origin https://github.com/SMEMY/PDC-Project.git
when ever you have clone the project for the first time, so your Laravel (php artisan serve) command don't work. beacuse i just upload the project code not the laravel frame work code.  soooooooooo if you want to the laravel project. then type these commands in your CMD or terminal step by step. (be sure that you are connected with the #Internet.)
# 1- composer install
# 2- npm install
# 3- cp .env.example .env
# 4- php artisan key:generate
# For authentication INSTALL (fortify) 
* composer require laravel/fortify
* php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
# then add this line in ( config/app.php ) file:
* App\Providers\FortifyServiceProvider::class,
* ![image](https://user-images.githubusercontent.com/57432794/154793426-de1a0418-721c-420c-ad03-c5486280b32a.png)




# After all configuration, test the command (php artisan serve).
* NOTE: these steps requires when you are cloning the project for the first time.
# making new branch.
* git branch (new branch name)
# change the branche for using.
* git checkout (type the new created branch that you want to use it for development)
# How to add files and folders to be trace by git?
* git add . (this cammand used for all new changes that did with files)
# OR
* git add --a (this cammand used for all new changes that did with files)
# OR adding every file at once.
* git add (fileName)
# After adding all files for tracing, these files should be commited(mean should clearify what changes done to the files?)
* git commit -m "the message you should write."
# Now you able to push the new changes to the remote repositry.
* git push -u origin (current branch name)
