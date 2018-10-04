var app = angular.module('BlankApp', ['ngMaterial', 'ngMessages','ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
    .when("/Teacher_List", {
        templateUrl : "templates/admin_TeachersList.php"
    })
    .when("/Student_List", {
        templateUrl : "templates/admin_StudentsList.php"
    })
     .when("/Section_List", {
        templateUrl : "templates/admin_SectionsList.php"
    })   
     .when("/teacher_section", {
        templateUrl : "templates/teacher_section.php"
    })   



     
});