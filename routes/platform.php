<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
//User
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
//Roles
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
//Articles
use App\Orchid\Screens\Article\ArticleEditScreen;
use App\Orchid\Screens\Article\ArticleListScreen;
//Pets
use App\Orchid\Screens\Pet\PetEditScreen;
use App\Orchid\Screens\Pet\PetListScreen;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/
// Main
Route::screen('/main', PlatformScreen::class)->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)->name('platform.profile');

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)->name('platform.systems.users.edit');

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)->name('platform.systems.users.create');

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)->name('platform.systems.users');

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)->name('platform.systems.roles');

//Blog (Article) Screens
Route::screen('articles', ArticleListScreen::class)->name('platform.article.list');
Route::screen('article/{article?}', ArticleEditScreen::class)->name('platform.article.edit');
//Pets Screens
Route::screen('pets', PetListScreen::class)->name('platform.pet.list');
Route::screen('pet/{pet?}', PetEditScreen::class)->name('platform.pet.edit');