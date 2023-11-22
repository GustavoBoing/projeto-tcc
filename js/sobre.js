// const hidden = document.querySelectorAll('.hidden')

// console.log(hidden)

// const isShowAdded = localStorage.getItem('showAdded');

const observe = document.querySelectorAll('.hidden')

console.log(observe)

const myObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('show')
            // localStorage.setItem('showAdded', 'true');
        } else {
            entry.target.classList.remove('show')
        }
    })
}) 

const hiddens = document.querySelectorAll('.hidden')

hiddens.forEach((hidden) => 
myObserver.observe(hidden))


