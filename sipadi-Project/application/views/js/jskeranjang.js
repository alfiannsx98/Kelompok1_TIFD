var i=0;
$("#beli").live("click", function(){
    var nama=$(this).attr('nama');
    var harga=$(this).attr('harga');
    var total=harga+harga;
    i++;
   $('.keranjang').append('<p>'+i+' | ' +nama+ ' | ' +harga +'<button class="rm">Batal</button></p>');
    
   return false;
});

$(".rm").live("click", function(){
    $(this).parents('p').remove();i--;
});
