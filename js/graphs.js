/* 
  zobrazení menu 
*/

const hamburger = document.querySelector(".hamburger");
const navBar = document.querySelector(".navBar");

/* navBar.style.visibility = "hidden"; */

hamburger.addEventListener("click", () => {
  if (navBar.style.visibility == "visible") {
    navBar.style.visibility = "hidden";
     /* console.log(navBar.style.visibility); */
  } else {
    navBar.style.visibility = "visible";
  }
}) 

