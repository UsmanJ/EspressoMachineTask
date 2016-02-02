<?php

/**
 * For this test someone has written a lot of crap PHP code!
 * List all the problems you can find with this code and why it is a problem
 *
 */
function countVowelsInFile($f)
{
  $handle = fopen($f);
  while (!feof($handle)) $buf = fgets($handle, 4096);  // there should be curly braces after the while statement otherwise the while loop is empty

  for ($i = 0; $i < strlen($buf); $i++)   // the entire for loop should be indented once for readability reasons
  {
    if ($buf[$i] == 'a') $a++; //switch statements should be used rather than so many if stataments because you are checking the if statement for the same letter each time
    if ($buf[$i] == 'e') $e++;
    if ($buf[$i] == 'i') $i++;  // the variables $a, $e, $i, $o and $u have not been defined so therefore can not me incremented
    if ($buf[$i] == 'o') $o++;
    if ($buf[$i] == 'u') $u++;
    if ($buf[$i] == 'e') $e++;  // if statement for 'e' is repeated twice
  }
  fclose($handle);

  return $a + $e + $i + $o + $u;  // not returning anything because these variables are not defined
}

countVowelsInFile(__FILE__);
//missing closing php sign




//  Should look something like the one below:


<?php
function countVowelsInFile($f)
{
  $a = 0;
  $e = 0;
  $i = 0;
  $o = 0;
  $u = 0;
  $handle = fopen($f);

  while (!feof($handle))
  {

  $buf = fgets($handle, 4096);

    for ($i = 0; $i < strlen($buf); $i++)
    {
      $letter = $buf[$i];
      switch ($letter) {
          case 'a':
              $a++;
              break;
          case 'e':
              $e++;
              break;
          case 'i':
              $i++;
              break;
          case 'o':
              $o++;
              break;
          case 'u':
              $u++;
      }
    }
  }
  fclose($handle);

  return $a + $e + $i + $o + $u;
}

countVowelsInFile(__FILE__);

?>
