<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// week4
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\QuizController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PostController;

// week8
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\UserController;  
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/homepage", function() {
    return "<h1>This is home page</h1>";
   });

Route::get("/blog/{id}", function($id) {
    return "<h1>This is blog page : {$id} </h1>" ;
});

Route::get( "/blog/{id}/edit" , function($id) {
 	return "<h1>This is blog page : {$id} for edit</h1>" ;
});

Route::get("/product/{a}/{b}/{c}", function($a, $b, $c) {
    return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>" ;
});

Route::get("/category/{a?}", function($a = "mobile") {
    return "<h1>This is category page : {$a} </h1>" ;
});

Route::get("/myorder/create", function() {
    return "<h1>This is order form page : ". request("username") ."</h1>" ;

});

Route::get("/myorder/create", function() {
    return "<h1>This is order form ". request("id")." page : ". request("username") ."</h1>" ;

});

Route::get("/good_route" , function(){
    return view("test/index");
    });

Route::get("/hello", function () {	
        return view("hello");
        });

        
Route::get('/greeting', function () {

	$name = 'James';
$last_name = 'Mars';

return view('greeting', compact('name','last_name') );
});

Route::get( "/gallery" , function(){
$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
$bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg"; 
$cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
$god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg"; 
$spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg"; 

return view("test/index", compact("ant","bird","cat","god","spider") );
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});

//week 3

Route::get("/teacher" , function (){
	return view("teacher");
});

Route::get("/student" , function (){
	return view("student");
});

Route::get("/theme" , function (){
	return view("theme");
});

// Route Template Inheritance
Route::get("/teacher/inheritance", function () {
    return view("/inheritance/teacher-inheritance");
});
Route::get("/student/inheritance", function () {
    return view("/inheritance/student-inheritance");
});

// Route Template Component
Route::get("/teacher/component", function () {
    return view("/components/teacher-component");
});
Route::get("/student/component", function () {
    return view("/components/student-component");
});


Route::get('/components/tables', function () {
    return view('/components/tables');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/inheritance/tables', function () {
    return view('/inheritance/tables');
});

// week4
Route::get("/myprofile/create",[ MyProfileController::class , "create" ]);
Route::get("/myprofile/{id}/edit", [ MyProfileController::class , "edit" ]);
Route::get("/myprofile/{id}", [ MyProfileController::class , "show" ]);
Route::get( "/coronavirus" ,[ MyProfileController::class , "coronavirus" ] );


/*Route::get('study-question', function () {
    $questions = json_decode(file_get_contents("https://raw.githubusercontent.com/arc6828/cs/master/json/sci-mbti.json"));    
    return view("study/question", compact('questions'));
})->name('study-question');

Route::post('study-match', function (Request $request) {
    $summary = [ "CS" => 0, "IT" => 0, "DISE" => 0, "HE" => 0, "NU" => 0, "FB" => 0, "SET" => 0, "OHS" => 0 ];
    $majors = [
        "CS" => "วิทยาการคอมพิวเตอร์ (CS)",
        "IT" => "เทคโนโลยีสารสนเทศ (IT)",
        "DISE" => "นวัตกรรมดิจิทัลและวิศวกรรมซอฟต์แวร์ (DISE)",
        "HE" => "คหกรรมศาสตร์ (HE)",
        "NU" => "โภชนาการและการกำหนดอาหาร (NU)",
        "FB" => "นวัตกรรมอาหารและเครื่องดื่มเพื่อสุขภาพ (FB)",
        "SET" => "วิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม (SET)",
        "OHS" => "อาชีวอนามัยและความปลอดภัย (OHS)",
    ];
    foreach ($_POST as $key => $value) {
        if(!str_contains($key, "flexRadioDefault")) continue;
        [$code, $answer] = explode("-", $value);
        if ($answer == "yes") {            // if-yes
            $summary[$code] = isset($summary[$code]) ? $summary[$code] + 1 : 1;
        } else {            // if-no
            $summary[$code] = isset($summary[$code]) ? $summary[$code] + 0 : 0;
        }
    }
    $codes = array_keys($summary);
    $values = array_values($summary);

    return view("study/match", compact('codes','values','majors'));
})->name('study-match');*/

Route::get("study-question", [ QuizController::class, "question" ])->name("study-question");
Route::post("study-match", [ QuizController::class, "match" ])->name("study-match");

//week 6
Route::get("/product", [ProductController::class, "index"])->name('product.index');
Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
Route::post("/product", [ProductController::class, "store"])->name('product.store');
Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

// Route::resource('/product', ProductController::class );

Route::resource('/staff', StaffController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    
    require __DIR__ . '/auth.php';
    Route::middleware(['auth'])->group(function () {
        Route::middleware(['role:admin'])->group(function () {
        Route::get('/teacher', function () {
            return view('teacher/index');
        });
        
        Route::resource('/covid19','Covid19Controller');
        });
        });
        Route::middleware(['auth', 'role:admin,teacher,student'])->group(function () {
            Route::get('/teacher', function () {
                return view('teacher/index');
            });
            
            Route::resource('/covid19', 'Covid19Controller');
            });

           
                                      
        
Route::resource('post', 'PostController');

Route::resource('post', PostController::class);
//Route::resource('profile', 'ProfileController');
//Route::resource('user', 'UserController');
//Route::resource('vehicle', 'VehicleController');

Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);