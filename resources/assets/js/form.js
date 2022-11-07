


let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name')
let contentElt = document.getElementById('content')
let modifBtn = document.getElementById('btnDelModif')

let initialNameValue = nameElt.value
let initialContentValue = contentElt.value

let newNameValue = ''
nameElt.addEventListener('input', function (e) {
  newNameValue = nameElt.value;
  if (newNameValue != initialNameValue) {
    modifBtn.classList.remove("hidden")
  }
  else {
    modifBtn.classList.add("hidden")
  }
})

let newContentValue = ''
contentElt.addEventListener('input', function (e) {
  newContentValue = contentElt.value;
  if (newContentValue != initialContentValue) {
    modifBtn.classList.remove("hidden")
  }
  else {
    modifBtn.classList.add("hidden")
  }
})

document.getElementById('btnDelModif').addEventListener('click', () => {
  modifBtn.classList.add("hidden")
})
