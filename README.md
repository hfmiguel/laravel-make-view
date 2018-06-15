# laravel-make-view
Laravel commands to create a new view file

# create a new command : php artisan make:command MakeView --command=make:view or clone the file https://github.com/hfmiguel/laravel-make-view.git into app\Console\Commands 

# Add 'App\Console\Commands\MakeView' into protected method $commands in app\Console\Kermel.php
# execute php artisan optimize

### Usage 

# Usage:
#  make:view <fileName> [<path>] [<pageName>]

# Arguments:
#  fileName              Name of the new file
#  path                  Path of the new file [default: "resources.views"]
#  pageName              Name that show in the view [default: "null"]

# Examples
# php artisan make:view Create Configurations.Roles Create_new_role
## return Nova ciew criada com sucesso!

# Laravel create a new view file into resources/views/Configurations/Roles with name Create.blade.php and a section name {pagename} with value "Create new role"

# php artisan make:view Configurations.Role.Create
## return Nova ciew criada com sucesso!

# Laravel create a new view file into resources/views/Configurations/Roles with name Create.blade.php
