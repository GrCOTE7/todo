

let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name')
let modifBtn = document.getElementById('btnDelModif')

let initialValue = nameElt.value

let newValue = ''
nameElt.addEventListener('input', function (e) {
  newValue = nameElt.value;
  if (newValue != initialValue) {
    modifBtn.classList.remove("hidden")
  }
  else {
    modifBtn.classList.add("hidden")
  }
})

document.getElementById('btnDelModif').addEventListener('click', () => {
  modifBtn.classList.add("hidden")
})
