function Alert(a,b){if(typeof b=="undefined"){Materialize.toast(a);}else{Materialize.toast(a,b);}}
var ElementLoader="#loading_famicodes";
function Up(id){setTimeout(function(){$('html, body').animate({scrollTop:$(id).offset().top-200}
, 600);
}
,200);
}
function Up2(id){setTimeout(function(){$('html, body').animate({scrollTop:$(id).offset().top}
, 600);
}
,200);
}
function C(obj){



function Desaparecer()
{

   if($(obj.l).length>0){$(obj.l).html(o);}
   else{if($(ElementLoader).length>0){$(ElementLoader).hide();
}
}
if(obj.up){switch(obj.up){case 'top':Up2(obj.e);
break;
case 'none':break;
default:Up(obj.e);
break;
}
}
else{Up(obj.e);
}
}
/*desaparecer()*/var o="";
if($(obj.l).length>0){o=$(obj.l).html();
if(!obj.m){obj.m="Cargando...";
}
$(obj.l).html(obj.m);
}
else{if($(ElementLoader).length>0){$(ElementLoader).show();
}
}
if(obj.r){for(i=0;
i<$(obj.r).length;
i++){if($(obj.r)[i]){if($.trim($(obj.r+':eq('+i+')').val())==""){$(obj.r+':eq('+i+')').removeClass("Alert");
setTimeout(function(){$(obj.r+':eq('+i+')').addClass("Alert");
Materialize.toast($(obj.r+':eq('+i+')').attr("name"),2000);
}
,200);
$('html, body').animate({scrollTop:$(obj.r+':eq('+i+')').offset().top-100,}
, 600);
Desaparecer();
 return false;
}
}
}
}
var URL='';
if(obj.u){URL=""+obj.u;
}
else if(obj.op){URL='?op='+obj.op;
}
var formData='';
if(obj.f){formData=new FormData($(obj.f)[0]);
}

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$.ajax({url:URL,type:'POST',data:formData,cache: false,async:true,contentType: false,processData: false,success: function(data)
{ 
if(obj.reset){history.replaceState("","",URL);}
if(obj.add){
	if(obj.f){$(obj.f).remove();}
	$(obj.e).append(data);
	}
else{$(obj.e).html(data);}

if($(obj.e).hasClass("f-show"))
{
$(".f-show").hide();
$(obj.e).show();
}
}
,error:function(){
	
if(typeof obj.error=="function"){obj.error();}else{
if($('#alert_mo').length==1){$('#alert_mo').openModal();}
else{$('html').append('<div id="alert_mo" class="modal modal-fixed-footer"><div class="modal-content"><h4><i class="material-icons N small">add_alert</i></h4><p class="N">En Construcción</p></div><div class="modal-footer"><a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a></div></div><script>$(\'#alert_mo\').openModal();</script>');}
}

/*error*/},
complete : function(xhr, status){Desaparecer();}
/*$.ajax*/});
/*C*/}
