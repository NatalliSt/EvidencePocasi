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

var btn = document.getElementById("addData");
var btn2 = document.getElementById("newDataLink");

// const newDataForm = document.getElementById("newData");

btn.addEventListener("click", addNewData);
btn2.addEventListener("click", addNewData);

const newDataForm = document.getElementById("newDataForm");
const container = document.getElementById("gridContainer");

newDataForm.style.visibility = "hidden";
container.style.visibility = "visible";

function addNewData () {
    
    console.log(newDataForm);

     if (newDataForm.style.visibility == "hidden" && container.style.visibility == "visible") {
        newDataForm.style.visibility = "visible";
        container.style.visibility = "hidden";
        btn.value = "Zpět";
      //  console.log(newDataForm.style.visibility);
    } else {
        newDataForm.style.visibility = "hidden";
        container.style.visibility = "visible";
        btn.value = "Přidat nová data";
      //  console.log(newDataForm.style.visibility);
    } }

    




