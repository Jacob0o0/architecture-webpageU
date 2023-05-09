window.onload = function() {
    let section = document.querySelectorAll('.seccion_Pag')
    let lists = document.querySelectorAll('.nav-item');
    
    function activeLink(li) {
        lists.forEach((item) => item.classList.remove('active'));
        li.classList.add('active');
    }
    lists.forEach((item) =>
        item.addEventListener('click', function(){
            activeLink(this);
        }));
    
    window.addEventListener('scroll', ()=>{
        const scrollY = window.scrollY;
        section.forEach((current) =>{
            const sectionHeight =current.offsetHeight;
            const sectionTop = current.offsetTop - 100;
            const sectionId = current.getAttribute('id');
    
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                const target = document.querySelector(`[href='#${sectionId}']`).parentElement;
                activeLink(target);
            } else {
                // document.querySelector('li a[href*="' + sectionId + '"]').classList.remove('active');
            }
        });
    });
}