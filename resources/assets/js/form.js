


let status = document.getElementsByClassName('status')
let nameElt = document.getElementById('name')
let contentElt = document.getElementById('content')
let modifBtn = document.getElementById('btnDelModif')

let initialNameValue = nameElt.value
let initialContentValue = contentElt.value

const watchingElts = [ 'name', 'content']

watchingElts.forEach(elt=> {
  console.log(${elt+'Elt'})
  // item.addEventListener('input', (e) => {
  //   console.log(`${item} is this value: ${e.target.value}`);
  //   item.nextElementSibling.textContent = e.target.value;
  // });
})

// console.log(watchingElts)
// watchingElts.forEach((elt, init) => {
//   console.log(123)

for (const k in watchingElts) {
  // console.log(`${property}: ${watchingElts[property]}`);
  // console.log(`${watchingElts[k]+'Elt'}`);
}
// let v = ''
// elt.addEventListener('input', function (evt) {
//   newEltValue = elt.value;
//   if (newEltValue != initialNameValue) {
//     modifBtn.classList.remove("hidden")
//   }
//   else {
//     modifBtn.classList.add("hidden")
//   }
// })

// })
// console.log(nameElt);
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
