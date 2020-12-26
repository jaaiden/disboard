<?php

use App\Models\Project;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'app.home')->name('app.home');

Route::view('/user', 'app.user')->middleware('auth')->name('app.user');

Route::prefix('/docs')->group(function ()
{
    Route::view('/', 'docs.home')->name('docs.home');
    Route::get('{category}/{page}', function($category, $page)
    {
        return view("docs.$category.$page") ?? abort(404);
    });
});

Route::prefix('/projects')->group(function ()
{
    Route::view('/', 'projects.home')->name('projects.home');
    Route::get('/add', [ProjectController::class, 'addProject'])->name('projects.add');
    Route::post('/add', [ProjectController::class, 'post_addProject'])->name('projects.add');
    Route::get('/view/{id}', function ($id)
    {
        if ($project = Project::firstWhere('uuid', $id))
        {
            views($project)->record();
            return view('projects.view', [ 'project' => $project]);
        }
        abort(404);
    });
    Route::get('/{category}', function ($category)
    {
        return view("projects.category", [ 'projects' => Project::fromCategory($category)->paginate(10), 'category' => $category ]) ?? abort(404);
    });
});