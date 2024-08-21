*Middleware* 
acts as a bridge between a request and a response. It is a type of filtering mechanism.
It means that when the user requests the server then the request will pass through the middleware, and then the middleware verifies whether the request is authenticated or not.

If the user's request is authenticated then the request is sent to the backend. If the user request is not authenticated, then the middleware will redirect the user to the login screen.

*notice that there are middleware for*
* all methods
* only methods
* except methods

There are two types of Middleware in Laravel:
* Global Middleware
* Route Middleware

* Global Middleware will run on every HTTP request of the application, whereas 
* the Route Middleware will be assigned to a specific route. 

The middleware can be registered at app/Http/Kernel.php. This file contains two properties $middleware and $routeMiddleware. $middleware property is used to register Global Middleware and $routeMiddleware property is used to register route specific middleware.

* Terminable Middleware
Terminable middleware performs some task after the response has been sent to the browser. This can be accomplished by creating a middleware with terminate method in the middleware. Terminable middleware should be registered with global middleware.