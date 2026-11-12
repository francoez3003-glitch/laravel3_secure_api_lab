Name: Angel Britney M. Franco
Section: BSICT-3B

CHECKLIST:
DONE - Role column migrated with student as default
DONE - Admin and student test accounts configured securely
DONE - CheckRole checks one or multiple allowed roles
DONE - AdminMiddleware restricts admin-only routes
DONE - Both middleware aliases registered in bootstrap/app.php
DONE - Routes protected by Sanctum and the correct role middleware
DONE - All eight Postman tests show expected results
DONE - Eight screenshots captured with secrets hidden
DONE - GitHub repository pushed and accessible to instructor
DONE - Reflection answers included

**REFLECTION:**
**What is the difference between authentication and authorization?**

Authentication is the process of verifying who a user is, while authorization determines what that user is allowed to do. In this project, Laravel Sanctum handles authentication by checking the Bearer token returned from the login endpoint. Once the user is identified, the `CheckRole` and `AdminMiddleware` classes handle authorization by checking the user's `role` before allowing access to a route.

**Why does a student receive 403 on the admin dashboard, but a request without a token receives 401?**

A request without a token receives a 401 Unauthenticated response because the server cannot identify who is making the request. A student, on the other hand, sends a valid token, so the server knows who they are. However, the student's role is `student` and not `admin`, so `AdminMiddleware` blocks the request and returns a 403 Forbidden response. In short, 401 means the user is not recognized, while 403 means the user is recognized but not permitted to access the resource.

GitHub Link: https://github.com/francoez3003-glitch/laravel3_secure_api_lab
