/*delete alert*/
function confirm_option(action){
   if(!confirm("Are you sure to "+action+", this record!")){
      return false;
   }

   return true;

}