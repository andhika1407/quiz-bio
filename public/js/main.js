function openNav(el){
    $(el).next().addClass('block');
    $(el).next().removeClass('hidden');
    $(el).addClass('hidden');
    $(el).removeClass('block');

    $('nav').removeClass('hidden');
    $('nav').parent().next().removeClass('hidden');
    $('nav').parent().next().addClass('flex');

    $('aside').addClass('min-h-screen');
}

function closeNav(el){
    $(el).prev().addClass('block');
    $(el).prev().removeClass('hidden');
    $(el).addClass('hidden');
    $(el).removeClass('block');

    $('nav').addClass('hidden');
    $('nav').parent().next().addClass('hidden');
    $('nav').parent().next().removeClass('flex');

    $('aside').removeClass('min-h-screen');
}