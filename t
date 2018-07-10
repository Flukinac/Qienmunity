[1mdiff --git a/app/Http/routes.php b/app/Http/routes.php[m
[1mindex 998839f..29d15ff 100644[m
[1m--- a/app/Http/routes.php[m
[1m+++ b/app/Http/routes.php[m
[36m@@ -24,9 +24,9 @@[m [mRoute::group(['middleware' => 'auth'], function () {[m
         return view('nieuws');[m
     });[m
 [m
[31m-    Route::get('/resources', function () {[m
[31m-        return view('resources');[m
[31m-    });[m
[32m+[m[32m//    Route::get('/resource', function () {[m
[32m+[m[32m//        return view('resource/resource');[m
[32m+[m[32m//    });[m
 [m
     Route::get('/dashboard', function () {[m
         return view('dashboard');[m
[36m@@ -49,6 +49,8 @@[m [mRoute::group(['middleware' => 'auth'], function () {[m
     Route::resource('post','PostIdController');[m
 [m
     Route::resource('communitypost','CommunityController');[m
[32m+[m[41m    [m
[32m+[m[32m    Route::resource('resource','ResourceController');[m
 [m
     [m
     [m
[1mdiff --git a/resources/views/layouts/app.blade.php b/resources/views/layouts/app.blade.php[m
[1mindex 5b56c43..7ebd487 100644[m
[1m--- a/resources/views/layouts/app.blade.php[m
[1m+++ b/resources/views/layouts/app.blade.php[m
[36m@@ -56,6 +56,8 @@[m
                     <li><a href="{{ url('/profiles') }}">Profielen</a></li>[m
                     <li><a href="{{ url('/nieuwsposts') }}">Nieuws</a></li>[m
                     <li><a href="{{ url('/communitypost') }}">Community</a></li>[m
[32m+[m[32m                    <li><a href="{{ url('/resource') }}">Resource</a></li>[m
[32m+[m[32m                    <li><a href="{{ url('/events') }}">Events</a></li>[m
                     <li><a href="{{ url('/contact') }}">Contact</a></li>[m
                 </ul>[m
                 @endif[m
