<?php

return [
    'subject/create' => 'subject/create',
    'subject/update/([0-9]+)' => 'subject/update/$1',
    'subject/delete/([0-9]+)' => 'subject/delete/$1',
    'subject' => 'subject/index',


    'student/create' => 'student/create',
    'student/update/([0-9]+)' => 'student/update/$1',
    'student/delete/([0-9]+)' => 'student/delete/$1',
    'student' => 'student/index',

    'mark/create' => 'mark/create',
    'mark/update/([0-9]+)' => 'mark/update/$1',
    'mark/delete/([0-9]+)' => 'mark/delete/$1',
    'mark' => 'mark/index',

    'group/create' => 'group/create',
    'group/update/([0-9]+)' => 'group/update/$1',
    'group/delete/([0-9]+)' => 'group/delete/$1',
    'index.php' => 'group/index',
    'group' => 'group/index',
    '' => 'group/index',
];