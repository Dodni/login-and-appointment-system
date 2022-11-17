/*

This small js file is created for celndar-login-navigation.

*/


function registrationFirst() {
  var retVal = confirm("Please for the booking login first!");
               if( retVal == true ) {
                  window.location = 'login.php';
                  return true;
               } else {
                  return false;
               }
}
