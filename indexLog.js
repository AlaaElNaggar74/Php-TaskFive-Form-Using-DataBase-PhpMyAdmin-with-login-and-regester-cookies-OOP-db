let x= document.querySelectorAll(".dnone");

x.forEach(element => {
    // console.log(element);
  setTimeout(() => {
    element.style.display="none";
  }, 2000);
    
});
