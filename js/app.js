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
     .when("/student_lesson", {
        templateUrl : "templates/student_lesson.php"
    })  
     
     .when("/student_all_section", {
        templateUrl : "templates/student_all_section.php"
    })  

     .when("/student_enrolled_section", {
        templateUrl : "templates/student_enrolled_section.php"
    })  

     .when("/student_pending_section", {
        templateUrl : "templates/student_pending_section.php"
    })  

     .when("/exams", {
        templateUrl : "templates/student_exam.php"
    })  
     .when("/teacher_students", {
        templateUrl : "templates/teacher_students.php"
    })  
     





     
});