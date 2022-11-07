let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name')
let contentElt = document.getElementById('content')
let modifBtn = document.getElementById('btnDelModif')

let init=[];
init['nameElt'] = nameElt.value
init['contentElt'] = contentElt.value

const watchingElts = [nameElt, contentElt]

watchingElts.forEach(elt => {
  elt.addEventListener('input', function (e) {
    let newValue = elt.value;
    if (newValue != init[elt.name+'Elt']) {
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
