<?php
require_once 'settings.php';
require_once 'classes/StudentsList/SchoolClasses/HRClass.php';
require_once 'classes/StudentsList/SchoolClasses/CMGTClass.php';
require_once 'classes/StudentsList/Persons/Person.php';
require_once 'classes/StudentsList/Persons/Student.php';

try {
    //Load data & convert to PHP Arrays
    $studentsRawData = file_get_contents(DATA_PATH . 'students.json');
    $studentsRawList = json_decode($studentsRawData, true);

    //Create new instance for class & add students
    $cmgtClass = new \StudentsList\SchoolClasses\CMGTClass();
    foreach ($studentsRawList as $studentRaw) {
        $cmgtClass->addStudent($studentRaw);
    }

    //Get variables for template
    $students = $cmgtClass->getStudents();
    $totalStudents = $cmgtClass->getTotalStudents();
} catch (Exception $e) {
    //Set error variable for template
    $error = 'Oops, try to fix your error please: ' .
        $e->getMessage() . ' on line ' . $e->getLine() . ' of ' .
        $e->getFile();
}

