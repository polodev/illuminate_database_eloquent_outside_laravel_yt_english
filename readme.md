
# making a website with illuminate database package outside laravel     


### installing illuminate/database package  with dependancy   

~~~bash
composer require illuminate/database illuminate/events 
~~~

### connect with database (db.php)

~~~php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'college',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent(); 
~~~


### adding db.php file to composer.json file to autolaod and doing `composer dump-autoload` command 

~~~php
"autoload": {
  "files": ["db.php"]
}
~~~


### creating table using schema builder    

~~~php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;


Manager::schema()->dropIfExists('departments');
Manager::schema()->create('departments', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->timestamps();
});


Manager::schema()->dropIfExists('subjects');
Manager::schema()->create('subjects', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->integer('department_id')->unsigned();
  $t->timestamps();
});

~~~

### Create 2 models - Subject and Department with relationship        

for 2 tables we have to make 2 models. By convention model name is singular form of table name. 

~~~php

# Department

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
  protected $guarded = [];

  public function subjects () {
    return $this->hasMany(Subject::class);
  }
}

# Subject
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {
  protected $guarded = [];
  public function department () {
    return $this->belongsTo(Department::class);
  }
}

~~~


Relation between 2 models is, subject belongs to Department and Department has many subjects. 

### adding model folder to composer.json file to autolaod all models and doing `composer dump-autoload`  command    

~~~php
"autoload": {
  "classmap": ["Models"]
}
~~~

### inserting data using model    

~~~php
Model::insert([
  "key" => $value
])
~~~


### getting value from database using model    

~~~php
# for getting all results    
Model::all();
~~~


### fetching data using relationship    

~~~php
<?php foreach($departments as $department): ?>
  <h4><?= $department->name ?></h4>
  <?php foreach($department->subjects as $subject): ?>
    <li class="list-group-item mb-2"><?= $subject->name ?></li>
  <?php endforeach; ?>
<?php endforeach; ?>
~~~


### How to run this source code in your pc

I hope you already have npm(node package manager) and composer install in your pc. If its not your case just download node js from https://nodejs.org/en/ and download composer from  https://getcomposer.org/doc/00-intro.md#installation-windows.    

Once you have installed both software in your pc you just do following command in terminal.       




To install jquery, bootstrap, popper.js   

~~~bash
npm install 
~~~

To install illuminate/database illuminate/events     

~~~bash
composer install 
~~~

Login to your mysql account and make a database name `college`    

Now serve using any server. You can use php mini server like mine.   

~~~php
php -S localhost:8000     
~~~

Here 8000 could be any 4 digit.      

<hr>

My name in shibu deb polo       
Thanks for watching       
Please subscribe my channel       
Take care



















