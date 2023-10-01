let x= document.querySelectorAll(".dnone");

x.forEach(element => {
    // console.log(element);
  setTimeout(() => {
    element.style.display="none";
  }, 2000);
    
});



imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file);
    blah.style.width="100px";
    blah.style.height="100px";

  }
}