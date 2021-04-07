jQuery(function($){
    $("#phone").mask("+7 (999) 999-9999");
 });

 jQuery(function($){
    $("#product").mask("99/99/9999",{placeholder:" "});
 });

 jQuery(function($){
    $("#product").mask("99/99/9999",{completed:function(){alert("Вы ввели: "+this.val());}});
 });