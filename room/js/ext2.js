$(document).ready(function(){
alert('helo');
$('.drag').draggable({containment:'document',revert:true,
start:function(){
   contents:$(this).attr('data-fullsrc');
   

}
});
$('.slide-out-div').droppable({hoverclass:'border',accept:'.drag',
drop:function(){
   $('.drop').append( contents <br/> );

}
});
});

