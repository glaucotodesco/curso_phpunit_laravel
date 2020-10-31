<?php
namespace Deployer;


require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/glaucotodesco/curso_phpunit_laravel.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


//host('your_server_ip')
//    ->user('deployer')
//    ->identityFile('~/.ssh/deployerkey')
//    ->set('deploy_path', '/var/www/html/laravel-app');



// Hosts
host('ubuntu@18.233.9.228')
    ->set('deploy_path', '/home/ubuntu');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

