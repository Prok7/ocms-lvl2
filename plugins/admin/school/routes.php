<?php
    use Admin\School\Models\Student;

    Route::get("api/students", function() {
        return Student::all();
    });

    // create new student with get or post request
    Route::match(["get", "post"], "api/create/student", function() {
        $name = input("name");
        $student = new Student;
        $student->name = $name;
        $student->save();
        return $student;
    });