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
     
        .when("/exam_list", {
            templateUrl: "templates/student_exam_list.php"
        })


        .when("/exam_take_quiz", {
            templateUrl: "templates/student_exam_list_quiz.php"
        }) 
        .when("/result", {
            templateUrl: "templates/student_result.php"
        }) 
        .when("/aboutus", {
            templateUrl: "templates/student_aboutus.php"
        })
     
            .when("/scores", {
            templateUrl: "templates/teacher_result.php"
        })
        .when("/scores_quizzes", {
            templateUrl: "templates/teacher_result_quiz.php"
        })
        .when("/scores_quizzes_view", {
            templateUrl: "templates/teacher_result_quiz_view.php"
        })
   

        .when("/scores_all", {
            templateUrl: "templates/admin_result.php"
        })
        .when("/scores_all_quizzes", {
            templateUrl: "templates/admin_result_quiz.php"
        })
        .when("/scores_all_quizzes_view", {
            templateUrl: "templates/admin_result_quiz_view.php"
        })




});
