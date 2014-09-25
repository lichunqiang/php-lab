<?php

/**
 * A simple counter
 *
 * @return    int
 */
 function  counter1 ()
{
    static  $c  =  0 ;
    return ++ $c ;
}

/**
 * Another simple counter
 *
 * @return    int
 */
 $counter2  = function()
{
    static  $d  =  0 ;
    return ++ $d ;

};

function  dumpReflectionFunction ( $func )
{
     // Print out basic information
     printf (
         "\n\n===> The %s function '%s'\n" .
         "     declared in %s\n" .
         "     lines %d to %d\n" ,
         $func -> isInternal () ?  'internal'  :  'user-defined' ,
         $func -> getName (),
         $func -> getFileName (),
         $func -> getStartLine (),
         $func -> getEndline ()
    );

     // Print documentation comment
     printf ( "---> Documentation:\n %s\n" ,  var_export ( $func -> getDocComment (),  1 ));

     // Print static variables if existant
     if ( $statics  =  $func -> getStaticVariables ())
    {
         printf ( "---> Static variables: %s\n" ,  var_export ( $statics ,  1 ));
    }
}

// Create an instance of the ReflectionFunction class
 dumpReflectionFunction (new  ReflectionFunction ( 'counter1' ));
 dumpReflectionFunction (new  ReflectionFunction ( $counter2 ));


 function hello($name, $age)
 {
 	echo "Hello {$name}, I am {$age} years old.";
 }

 $hello_func = new ReflectionFunction('hello');

 $hello_func->invoke('light', 12);

 $hello_func->invokeArgs(array('light', 14));
