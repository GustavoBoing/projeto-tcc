// const hidden = document.querySelectorAll('.hidden')

// console.log(hidden)

const observe = document.querySelectorAll('.hidden')

console.log(observe)

const myObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('show')
        } else {
            entry.target.classList.remove('show')
        }
    })
}) 

const hiddens = document.querySelectorAll('.hidden')

hiddens.forEach((hidden) => 
myObserver.observe(hidden))

