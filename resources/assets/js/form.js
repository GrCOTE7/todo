// let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name')
let contentElt = document.getElementById('content')
let modifBtn = document.getElementById('btnDelModif')
let init=[];

const watchingElts = [nameElt, contentElt]

watchingElts.forEach(elt => {
  init[elt] = elt.value
  elt.addEventListener('input', function (e) {
    let newValue = elt.value;
    if (newValue != init[elt]) {
      modifBtn.classList.remove("hidden")
    }
    else {
      modifBtn.classList.add("hidden")
    }
  })
})

document.getElementById('btnDelModif').addEventListener('click', () => {
  modifBtn.classList.add("hidden")
})
