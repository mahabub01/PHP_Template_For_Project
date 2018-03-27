 
$(function(){
var d = $('.drop');

d.on('dragover',function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border','3px solid green');
});


d.on('drop',function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border','3px dashed blue');

    var files = e.originalEvent.dataTransfer.files;
    var file = files[0];

    upload(file);

});


function upload(file) {
    
}








});


























/*
 $(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm({ 
                beforeSend:function(){
                	$(".progress").show();
                },
                uploadProgress:function(event,position,total,percentComplete){
                	$('.progress-bar').width(percentComplete+'%');
                	$('.sr-only').html(percentComplete+'%');
                },
                success:function(){
                	$(".progress").hide();
                },
                complete:function(){}
            }); 

            $(".progress").hide();
  });

  */