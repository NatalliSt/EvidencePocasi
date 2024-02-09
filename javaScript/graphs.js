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


/*
  zobrazení formuláře pro přidání nových dat
*/

var btn = document.getElementById("newDataLink");
var back = document.getElementById("back");


// const newDataForm = document.getElementById("newData");

btn.addEventListener("click", addNewData);
back.addEventListener("click", goBack);


const newDataForm = document.getElementById("newDataForm");
const container = document.getElementById("gridContainer");
const calendar = document.getElementById("calendar");

newDataForm.style.visibility = "hidden";
container.style.visibility = "visible";

function addNewData () {
    
    console.log(newDataForm);

     if (newDataForm.style.visibility == "hidden" && container.style.visibility == "visible") {
        calendar.style.visibility = "hidden";
        newDataForm.style.visibility = "visible";
        container.style.visibility = "hidden";
        navBar.style.visibility = "hidden";
       
      //  console.log(newDataForm.style.visibility);
    } else {
      newDataForm.style.visibility = "hidden";
      container.style.visibility = "visible";
      calendar.style.visibility = "visible";
    }
  }

function goBack() {
  newDataForm.style.visibility = "hidden";
  container.style.visibility = "visible";
  calendar.style.visibility = "visible";
}