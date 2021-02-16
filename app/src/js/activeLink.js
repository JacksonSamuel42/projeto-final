const nav = document.querySelectorAll('.nav1 li');

nav.forEach(el => {
    el.addEventListener('click', () => {
        nav.forEach(el => {
            el.classList.remove('active');
        });
        el.classList.add('active');
    })
})

