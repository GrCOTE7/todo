

let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name');

let initialValue = nameElt.value;



console.log(initialValue)
// console.log(nameValue)
// console.log(name.value)

let newValue='';

nameElt.addEventListener('input', function (e) {
  newValue = nameElt.value;
  if (newValue != initialValue){
    document.getElementById('btnDelModif').classList.remove("hidden") 
    console.log(initialValue)
  }
  else {
    document.getElementById('btnDelModif').classList.add("hidden") 
      }
  
  
})



window.load = (() => {
  console.log(status)
  // status.addEventListener('click', ()=>{
  //   console.log('clicked')
  // })

})
