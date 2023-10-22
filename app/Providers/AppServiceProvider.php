<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(
                [
                    'icon' => 'fas fa-chart-area',
                    'text' => 'Dashboard',
                    'url' => '/home'
                ]
            );
            $event->menu->add(['header' => 'USER MANAGEMENT', 'classes' => 'font-weight-bold']);

            $event->menu->add(
                [
                    'icon' => 'fas fa-users',
                    'url' => '#',
                    'text' => 'Users',
                    'id' => 'users',
                    'key' => 'users',
                    'active' => ['users*']
                ],
            );
            $event->menu->addIn('users',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/users'
                ]
            );
            $event->menu->addIn('users',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New User',
                    'url' => '/users/create'
                ]
            );

            $event->menu->add(['header' => 'REPORT MANAGEMENT', 'classes' => 'font-weight-bold']);
            $event->menu->add(
                [
                    'icon' => 'fas fa-flag',
                    'text' => 'Reports',
                    'url' => '#',
                    'id' => 'reports',
                    'key' => 'reports',
                ]
            );
            $event->menu->addIn('reports',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/reports'
                ]
            );

            $event->menu->add(
                [
                    'icon' => 'fas fa-sync-alt',
                    'text' => 'Report Statuses',
                    'url' => '#',
                    'id' => 'report-st',
                    'key' => 'report-st',
                    'active' => ['report-statuses*']
                ]
            );
            $event->menu->addIn('report-st',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/report-statuses'
                ]
            );
            $event->menu->addIn('report-st',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New Report Status',
                    'url' => '/report-statuses/create'
                ]
            );

            $event->menu->add(
                [
                    'icon' => 'fas fa-comment-alt',
                    'text' => 'Report Types',
                    'url' => '#',
                    'id' => 'report-t',
                    'key' => 'report-t',
                    'active' => ['report-types*']
                ]
            );
            $event->menu->addIn('report-t',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/report-types'
                ]
            );
            $event->menu->addIn('report-t',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New Report Type',
                    'url' => '/report-types/create'
                ]
            );


            $event->menu->add(['header' => 'FORUM MANAGEMENT', 'classes' => 'font-weight-bold']);
            $event->menu->add(
                [
                    'icon' => 'fas fa-comments',
                    'text' => 'Forum',
                    'url' => '#',
                    'id' => 'forum',
                    'key' => 'forum'
                ]
            );
            $event->menu->addIn('forum',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/forums'
                ]
            );

            $event->menu->add(
                [
                    'icon' => 'fas fa-folder',
                    'text' => 'Forum Categories',
                    'url' => '#',
                    'id' => 'forum-c',
                    'key' => 'forum-c',
                    'active' => ['forum-categories*']
                ]
            );
            $event->menu->addIn('forum-c',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/forum-categories'
                ]
            );
            $event->menu->addIn('forum-c',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New Forum Category',
                    'url' => '/forum-categories/create'
                ]
            );


            $event->menu->add(['header' => 'RESOURCE MANAGEMENT', 'classes' => 'font-weight-bold']);
            $event->menu->add(
                [
                    'icon' => 'fas fa-paste',
                    'text' => 'Resources',
                    'url' => '#',
                    'id' => 'resources',
                    'key' => 'resources'
                ]
            );
            $event->menu->addIn('resources',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/resources'
                ]
            );

            $event->menu->add(
                [
                    'icon' => 'fas fa-folder',
                    'text' => 'Resource Categories',
                    'url' => '#',
                    'id' => 'resource-c',
                    'key' => 'resource-c',
                    'active' => ['resource-categories*']
                ]
            );
            $event->menu->addIn('resource-c',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/resource-categories'
                ]
            );
            $event->menu->addIn('resource-c',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New Resource Category',
                    'url' => '/resource-categories/create'
                ]
            );

            $event->menu->add(['header' => 'GRADE MANAGEMENT', 'classes' => 'font-weight-bold']);
            $event->menu->add(
                [
                    'icon' => 'fas fa-list-ol',
                    'text' => 'Grades',
                    'url' => '#',
                    'id' => 'grades',
                    'key' => 'grades',
                    'active' => ['grades*']
                ]
            );
            $event->menu->addIn('grades',
                [
                    'icon' => 'fas fa-table',
                    'text' => 'View All',
                    'url' => '/grades'
                ]
            );
            $event->menu->addIn('grades',
                [
                    'icon' => 'fas fa-plus',
                    'text' => 'New Grade',
                    'url' => '/grades/create'
                ]
            );


        });
    }
}
