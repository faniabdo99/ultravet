<?php
declare(strict_types=1);
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\SystemVariablesScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
//User
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
//Roles
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
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
// Orders
Route::screen('orders', \App\Orchid\Screens\OrderScreen::class)->name('platform.orders');
Route::screen('order/{id}', \App\Orchid\Screens\SingleOrderScreen::class)->name('platform.order');
Route::screen('order/edit/{id}', \App\Orchid\Screens\EditOrderScreen::class)->name('platform.order.edit');

// System variables
Route::screen('system-variables', SystemVariablesScreen::class)->name('platform.system-variables');
