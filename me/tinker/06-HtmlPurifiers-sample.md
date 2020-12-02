## HTMLPurifier for Laravel 5



## 1. Define a value, with a parragraph and also a javascript script

      1.1 >>> $str = "<p> Hello world</p> <script> alert('soy un codigo malicioso') </script>"
          => "<p> Hello world</p> <script> alert('soy un codigo malicioso') </script>"
          1.2 >>> clean($str)
          => "<p> Hello world</p> "

      You can also call like this way

          >>> Purifier::clean($trs)
          PHP Notice:  Undefined variable: trs in Psy Shell code on line 1
          >>> Purifier::clean($str)
          => "<p> Hello world</p> "



## 2.1 Redefine the variable, with a specific style, the style attribute will still exists

          >>> $str = "<p style='font-weight:bold'> Hello world</p> <script> alert('soy un codigo
           malicioso') </script>"
          => "<p style='font-weight:bold'> Hello world</p> <script> alert('soy un codigo malicioso') </script>"
          >>> clean($str)
          => "<p style="font-weight:bold;"> Hello world</p> "
          >>>


## 2.3 However if you redefine the variable with  a specific class it wont work, because in our config (purifier.php) file the class property is not allow...I will fix this in the next commit.


        => "<p class='foo'> Hello world</p> <script> alert('soy un codigo malicioso') </script>"
        >>> clean($str)
        => "<p> Hello world</p> "
        >>>