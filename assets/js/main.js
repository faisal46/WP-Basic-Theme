;(function($){
    $(document).ready(function(){

        // Single post feature image open popup featherlight box 
        $('.popup').each(function(){
            var image = $(this).find('img').attr('src');
            $(this).attr('href', image);
        });

    });
})(jQuery);