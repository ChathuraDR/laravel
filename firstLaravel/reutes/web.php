<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|----------------------------------------------------------
| ->name() will assign a name to specific route
|----------------------------------------------------------
|SENDING RESPONSES
|1.return view('blog.post'); //return a view
|2.return 'just some text';  //could return some plain text
|3.return Response::json(['name' => 'chathura']); //return or send JSON(when we're reachin out to a certain route with an AJAX request),when we're building a API
|4.return redirect()->route('index'); //redirecting a user to another route
|------------------------------------------------------------
| return view('blog.post'); //Response::view()
| return redirect()->route('index'); // Response::redirect();
-------------------------------------------------------------
|Route::get('/', function () {
|    return view('blog.index');
|})->name('blog.index');
|instead of using this we could update it with using controller class
|Route::get('/','<controller name>@<action in the controller class>')->name('blog.index');
| these controllers are loaded when the app is run,and controllers are find by the "RouteServiceProvider.php" class inside the Provider directory
-------------------------------------------------------------------------
| There's another way of using this,
|Route::get('/','postController@getIndex')->name('blog.index');
|
|Route::get('/',[
| uses is a keyword in laravel.as is a keyword which allows you to name the route. Advantage of use this is code will shrink.
|   'uses' => 'postController@getIndex',
|   'as' => 'blog.index'
]);
*/
Route::get('/',[
    'uses' => 'postController@getIndex',
    'as' => 'blog.index'
]);
// Route::HTTPRequestType(path in your url,the code which should get executed whenever a request reaches this path)

/*
 * Route::get('post/{id}', function ($id) {
    if ($id == 1) {
        $post = [
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you when the id is 1!'
        ];
    } else {
        $post = [
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you whe the id is not equal to 1'
        ];
    }
    //return view('blog.post');
    //return $post['content'];
    return view('blog.post', ['post' => $post]);
})->name('blog.post');
*/

Route::get('post/{id}',[
    'uses' => 'postController@getPost',
    'as' => 'blog.post'
]);


//about page's route
Route::get('about', function () {
    return view('other.about');
})->name('other.about');

/*admin related routes
|grouping admin related routes,this way your 1 change will affect to the whole group
|OPTION 1 : prefix
|OPTION 2 : middleware
|This way,it'll add prefix,(in here the prefix is admin) to the routing path to the whole group,as an example,
|if it's routing "create" page, it'll add prefix as "admin" and the real routing path will be "admin/create"
|
*/
Route::group(['prefix'=>'admin'],function (){
    /*Route::get('', function () {
        return view('admin.index');
    })->name('admin.index');
    */
    Route::get('', [
        'uses' => 'postController@getAdminIndex',
        'as' => 'admin.index'
    ]);
    /*
    Route::get('create', function () {
        return view('admin.create');
    })->name('admin.create');
    */
    Route::get('create',[
        'uses' => 'postController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    /*
     * Request $request //since we have a post request,we're not passing any data in the URL,insted it's always passed
     *into the request body. And to get access to this request body,we need access to the request,and we can get this access by
     * adding this argument to the function.
     *
     * Dependency Injection / Facades Table
     * https://laravel.com/docs/5.3/facades#facade-class-reference
     *
     * */

    /*
    Route::post('create', function (\Illuminate\Http\Request $request,\Illuminate\Validation\Factory $validator) {
        //make(<data you want to validate.in here we're getting only the data from whole request>,<associative array where we specify the rules we want to use> )
        $validation = $validator->make($request->all(),[
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);// title rule says that the title field is required and minimum length should be 5 characters
        if ($validation-> fails()){
            return redirect()->back()->withErrors($validation); //if the validation fails,user will redirect to the page where he is coming from with a validation error
        }
        return redirect()
            ->route('admin.index')
            ->with('info','Post Created, Title: '.$request->input('title'));
    })->name('admin.create');
    */
    Route::post('create', [
        'uses' => 'postController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    /*
    Route::get('edit/{id}', function ($id) {
        if ($id == 1) {
            $post = [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you when the id is 1!'
            ];
        } else {
            $post = [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you whe the id is not equal to 1'
            ];
        }
        //return view('admin.edit');
        return view('admin.edit', ['post' => $post]);
    })->name('admin.edit');
    */
    Route::get('edit/{id}', [
        'uses' => 'postController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    /*
    Route::post('edit', function (\Illuminate\Http\Request $request,\Illuminate\Validation\Factory $validator) { // or you can just user Request $request
        $validation = $validator->make($request->all(),[
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);// title rule says that the title field is required and minimum length should be 5 characters
        if ($validation-> fails()){
            return redirect()->back()->withErrors($validation); //if the validation fails,user will redirect to the page where he is coming from with a validation error
        }

        return redirect()
            ->route('admin.index')
            ->with('info','Post edited,new Title: '.$request->input('title')); //redirecting user to another route with a session variable
    })->name('admin.update'); //here you can't use admin/edit, coz get route expects a parameter and that would lead to problems.

    */
    Route::post('edit', [
        'uses' => 'postController@postAdminUpdate',
        'as' => 'admin.update'
    ]);
});
