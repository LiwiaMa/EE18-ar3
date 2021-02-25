const eLosen = document.addEventListener(".lösen");  
const eSvar = document.addEventListener(".svar");  
const eKnapp = document.addEventListener(".button");  

var telefonummer = "0704037890";
var losen = elosen.value;
eKnapp.addEventListener("click", function () {

   if (eLosen.value == 9) {
       eSvar.value = telefonummer;
   } else {
        eLosen = "fel";
   }
});
