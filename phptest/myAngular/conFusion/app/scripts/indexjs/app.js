'use strict';
angular.module('confusionApp', ['ngRoute'])
.config(function($routeProvider) {
        $routeProvider
            // route for the contactus page
            .when('/contactus', {
                templateUrl : 'tmplContactUs.html',
                controller  : 'ContactController'
            })
            // route for the menu page
            .when('/menu', {
                templateUrl : 'tmplMenu.html',
                controller  : 'MenuController'
            })
            // route for the dish details page
            .when('/menu/:id', {
                templateUrl : 'tmplDishDetail.html',
                controller  : 'DishDetailController'
            })
            .otherwise('/contactus');
    });