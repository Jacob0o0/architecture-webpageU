$(document).ready(function(){
    // Obtenemos todos los elementos 'category-item'
    const categoryItems = document.querySelectorAll('.category-item');

    // Iteramos sobre cada elemento para agregar el evento 'click'
    categoryItems.forEach(item => {
        item.addEventListener('click', (event) => {
            event.preventDefault(); // Evitamos el comportamiento predeterminado del enlace
        });
    });

    // Agregando un active al primer elemento 
    $('.category-list .category-item[category="All"]').addClass('ct-item-active');

    $('.category-item').click(function(){
        var categoryCard = $(this).attr('category');
        // console.log(categoryCard);

        // Agregar clase active al enlace seleccionado
        $('.category-item').removeClass('ct-item-active');
        $(this).addClass('ct-item-active');

        // Filtros:
        $('.edif-card').css('transform', 'scale(0)');
        // $('.edif-card').hide(); // Oculta las tarjetas de edificios
        function hideCard(){
            $('.edif-card').hide();
        }setTimeout(hideCard, 400);

        function showCard(){
            $('.edif-card[category = "'+ categoryCard +'"]').show();
            $('.edif-card[category = "'+ categoryCard +'"]').css('transform', 'scale(1)');
        }setTimeout(showCard, 400);
    });

    $('.category-item[category="All"]').click(function(){
        // Filtros:
        function showCards(){
            $('.edif-card').show(); // muestra a todas las tarjetas
            $('.edif-card').css('transform', 'scale(1)');
        }setTimeout(showCards, 400);
    });
});