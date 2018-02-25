// JavaScript Document
var page = 'post.php';
var style_ul1="position:absolute; width:300px; display:block;color:blue; background:black; padding:10px; z-index:15; left:130px;top:20px";
var style_ul2="position:absolute; width:300px; display:block;color:white; background:blue; padding:10px; z-index:15; left:150px;top:20px";
var style_li="position:relative; margin-left:10px;";
var style_li2="position:relative; margin-left:10px;";


$(function(){
	$('div').delegate('a.getMenu', 'click', function(){
		li_last = $(this).parent().parent('li');	
		
		var value = $(this).parent('p').html().split('-');
		var id = parseInt(value[0]);
		var nome = value[1].trim().split(' ');
		var ct_ul = li_last.children('ul.infinite_menu');
		
		if(ct_ul.length == 0){ //Verifica se o elemento já existe no documento
			
		$.post(page, { id:id , data:'getInfo'}, function(x){
           
			li_last.append('<ul class="infinite_menu"  style="'+style_ul1+'"  >');
			
			 var ul = li_last.children('ul.infinite_menu');
			
			for(i in x){
				
				ul.append('<li  style="'+style_li+'"    ><p>'+x[i].autor+'-'+x[i].titulo+'<a class="getMenu">[+]</a><a class="getMenu2">Infos</a></p></li>');
			}
			
			 li_last.append('</ul>');
			
			},'json');
			
		}else{
			if(ct_ul.is(':visible')){
				ct_ul.hide('fast');
			}else{
				ct_ul.show('fast');
			}
		
			
		}
		
		return false;
		});

		
		
		$('div').delegate('a.getMenu2', 'click', function(){
		li_last = $(this).parent().parent('li');	
		
		var value = $(this).parent('p').html().split('-');
		var id = parseInt(value[0]);
		var nome = value[1].trim().split(' ');
		var ct_ul = li_last.children('ul.infinite_menu2');
		
		if(ct_ul.length == 0){ 
			
		$.post(page, { id:id , data:'getInfo'}, function(x){
           
			li_last.append('<ul class="infinite_menu2" style="'+style_ul2+'" >');
			
			 var ul = li_last.children('ul.infinite_menu2');
			
			for(i in x){
				
				ul.append('<li style="'+style_li2+'" ><p>'+x[i].autor+'-'+x[i].titulo+'<a class="getMenu">[+]</a><a class="getMenu2">Infos</a></p></li>');
			}
			
			 li_last.append('</ul>');
			
			},'json');
			
		}else{
			if(ct_ul.is(':visible')){
				ct_ul.hide('fast');
			}else{
				ct_ul.show('fast');
			}
			
			
		}
		return false;
		});
		
	});


