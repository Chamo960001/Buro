<?php

/*
    *                    // Match all request URIs
    [i]                  // Match an integer
    [i:id]               // Match an integer as 'id'
    [a:action]           // Match alphanumeric characters as 'action'
    [h:key]              // Match hexadecimal characters as 'key'
    [:action]            // Match anything up to the next / or end of the URI as 'action'
    [create|edit:action] // Match either 'create' or 'edit' as 'action'
    [*]                  // Catch all (lazy, stops at the next trailing slash)
    [*:trailing]         // Catch all as 'trailing' (lazy)
    [**:trailing]        // Catch all (possessive - will match the rest of the URI)
    .[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional
 */

/*
 * https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode
 * Method:
 *  GET
 *  POST
 *  GET|POST
 * --------------------------------------------------------------------------------------------*
 *  By exemple if you want to change the name of the user will with the id 3                   *
 *  you will have a get method with a parameters i:id afther you have change the name          *
 *  you will have a post method with all the new informations to update the user with the id 3 *
 * --------------------------------------------------------------------------------------------*
 */

//Home
$router->map('GET','/','HomeController@index');

//Programs
$router->map('GET', '/programme', 'ProgramController@index', 'indexProgram');

//Admin
$router->map('GET', '/admin', 'AdminController@index', 'indexAdmin');
$router->map('POST', '/admin/confirmation', 'AdminController@confirm', 'confirmAdmin');

//Cours
$router->map('GET', '/cours', 'CoursesController@index', 'CoursesIndex');
