About Laravel:

php artisan serve-> to turn on the localhost server

php artisan-> list all the commands of php artisan

php artisan tinker-> interact with the application directly
php artisan config:cache-> go to config cache which view the data of config file
php artisan optimize:clear-> clear all the bootstrap

api doesnt use csrfToken because api are stateless.

Router methods:
#1 Route::get($uri, $callback); //getting the data (showing in url)
#2 Route::post($uri, $callback); //getting the data safely
#3 Route::put($uri, $callback);
#4 Route::patch($uri, $callback);
#5 Route::delete($uri, $callback);
#6 Route::option($uri, $callback);

#7 Route::match($uri, $callback);

[::NoteBox:: Forexample, if you have a product with id like products/45, donot put it before the actual product/create page 
otherwise the product/{$id} page will open instead of product/create page].

php artisan config:cache;[this will create the cache of configuration file only [Create a cache file for faster 
configuration loading]-> have to restart the localhost. php artisan serve]

php artisan optimize:clear [this will clear all the files from cache or Remove the cached bootstrap files]

php artisan tinker -> directly interact with the application

## mostly used keywords
php artisan serve
php artisan tinker
php artisan make:controller [controller name]
php artisan config:cache

## for debugging the code in laravel 
dump(); //helpers for debugging the code in laravel
dd(); //dump and die [helpers for debugging the code in laravel]

difference between dump and dd
dd after dumping the data is going to die and will eventually stop the execution of the framework completely.

dd is mostly used for debugging	

## config cache and clear
config:cache         Create a cache file for faster configuration loading
config:clear         Remove the configuration cache file

## 2/8/2021 -date
open the xampp and start the apache server and mysql
open the localhost/phpmyadmin
create a database
now go to cmd, php artisan make:migration CreateProductsTable
php artisan migrate
check in the localhost/phpmyadmin, all the tables get migrated into the database


## inserting data to database --> 2/09/2021
using factories-> (insert data to database)automatically generate fake instances of model

## using query builder --> 1/10/2021
there are some terms like get, find, where, first etc. in query builder.
$product= DB::table('tablename')->get(); //get all the attributes in an array
$product= DB::table('tablename eg. products')->where('id', 5)->first(); //get the attribute in an array for id 5 
$product= DB::table('tablename eg. products')->find($parameter); //find the specific product of an id of passed parameter


## using DB Model 
Using database model is a good practice during programming as sometimes during the alteration of the database table, the table 
can be modified in the model page which is quick and easy. 

query builder can be replaced by database model.
note:: donot forget to use the path of the specified model (ex. App\Product or App\User) 



## Displaying information in the view using with (with array)
In order to put the html tag in the view, first the html code should be written in the controller page which will lead to the 
view page. And in view, put single '{' with '!!' on start and end point with variable ($variable from controller) in between.
Example: controller page: 'subtitle'=>'<h2>Something</h2>'.
view page: 
{!!$subtitle!!} [::Escape the information]

* commenting in blade file: 
{-- these are the comments --}
[::note- Donot use html commenting style as html commenting style will also display the content in .blade.php file
(<!-- -->)]

* for displaying the JS framework content use, @ 
Eg. @{{name}} //name is the variable name of the .js file



## inserting data from a form

the form should be created using html and css (bootstrap)
add the route in the form action-- action=" {{ route('products.store') }} "
add @csrf, this must be added in the form in order to maintain the security

* in the controller page, call the product model and use create method to create a new product into the database
in this case, $product= Product::create(request()->all()); //all is for all the attributes of the form, request comes from Request.php


## editing the data from a form
before editing, make sure that the data exists in database.
updating the data is abit different as the method Post doesn't work in the form.
In order to make the POST work within the form, make sure to add @method('PUT') or @method('PATCH') (for updating the data
put or patch is required) . @csrf must be included within the form for generating csrf token.

## deleting data from database
to delete the data from database, the form must be createad for method spoofing which is done by adding @csrf (csrf is done for security reason 
and @method('DELETE'). 

## when the user put wrong information in the form, send user a message using session
use flash for sending the message to the user saying what happen after submitting the form
if there is error, send the error message else edit or create the new product

## validating data before doing any modification
for validating the information create the rules in the controller page.

## validating the forms 
during validating the form when user put the wrong credentials (like 0 stock and is available) then it throws an error but
the details should not be deleted except the wrong credential one.

## In laravel, before creating the migration first we should know the order of the database schema. Following the order is the 
must as the migration has the created at timestamp which matters a lot. If you make database model in a shuffle way by mistake then 
the migration can be managed by renaming the created at timestamp. 
The model, controller (resource controller) , seeders, factory can be created using:
 [ php artisan make:model --all -> Generate a migration, seeder, factory, and resource controller for the model]


## For the path of the image, randomElement can be used with the array inside with a specific path for the image.
$factory->define(Image::class, function (Faker $faker) {
    $filename= $this->faker->numberBetween(1, 10). '.jpg';
    return [
        'path'=>$this->faker->randomElement(["img/products/{$filename}", "img/users/{$filename}"]),
    ];
});

## Create factories whilst insert into database
--> $cart= factory(App\Cart::class)->create(); 
or make the instance of cart in the database using : $cart= factory(App\Cart::class)->make(); 


## One to one relationship using eloquent realtionship
in one to one relationship, the one which has foreign key belongs to the another model (model with fk name). In this case,
Payment has the order_id which belongs to the Order table (model).

## important thing to know in one to many relationship
In one to many relationship, there needs to be consistency in name. Laravel wants consistency. The User table must have the
foreign key with the name user_id, but in this case there is customer_id (that means database is not always consistent so 
we need to adapt in this kinda situation). In order to use the customer_id as fk with User table, Laravel throws an error
so we need to specify the fk name in function inside paranthesis. 
example: public function orders(){
	return $this->hasMany(Order::class, 'customer_id'); //it is mandatory for both part [in this case, for orders & user]
}

## Many to many relationship
In many to many relationship, we need to create the intermediary table, known as pivot table in order to store the foreign key
pointing to each related pair of records. The name of pivot table should be the singular names of both table with the correct
alphabetical order. example if there is categories and products table, the name of pivot table should be "category_product".

## One to One polymorphic relationship
one to one polymorphic relationship is created when there is no foreign key (complex relationship/ db model) like when there is 
image and user then there formed a one to one polymorphic relationship. In this relationship, morph is the important keyword.
In the migration, there should be imageable as the morphs. 

## One to many polymorphic realtionship

## Many to many polymorphic realtionship
In this realtionship, there should be only one migration table with a name (if for product then productables). If a product exists
in multiple order and in a multiple cart at the same time then there forms many to many polymorphic realtionship. It is a complex
relationship.




 


