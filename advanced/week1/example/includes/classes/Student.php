<?php

/**
 * Class Student
 */
class Student
{
    /**
     * Student constructor.
     *
     * @param string $name
     * @param string $number
     * @param string $classNumber
     */
    public function __construct(
        public string $name,
        public string $number,
        public string $classNumber
    ) {
    }
}
