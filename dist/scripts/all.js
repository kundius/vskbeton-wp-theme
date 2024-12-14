jQuery(document).ready(function ($) {
    
    //Mask
    $('input[type="tel"]').attr("placeholder", "+7 (___) ___ __ __");
    //$('input[type="tel"]').attr("placeholder", "+7 (___) ___ __ __").val("").focus().blur();
    $('input[type="tel"]').mask("+7 (999) 999 99 99");
	
	// select styled
	$('.styled').selectmenu({
		position: {
			my: "left top", // default
			at: "left bottom", // default
			// "flip" will show the menu opposite side if there
			// is not enough available space
			collision: "flip"  // default is ""
		},
	});
    
    $("#ui-id-2").selectmenu({ disabled: true });
    
    $('#ui-id-1').selectmenu({
		change:function(event,ui) {
        	if(ui.item.value != 'Не выбрано') {
        	    $("#ui-id-2").selectmenu( "enable" );
            	$("#ui-id-2 > option").addClass("option-hide");
                var $select_type = $("#ui-id-1 > option:selected").data("tip");	
                $("#ui-id-2 > option").each(function() {
                    var $select_marka = $(this).data("tip");
                    if ($select_marka == $select_type) {
                        $(this).removeClass("option-hide");
                        $(this).removeClass("ui-state-disabled");
                        $(this).attr("disabled", false);
                    }
                    else { 
                    	$(this).attr("disabled", true); $(this).addClass("option-hide");
					}
               });
               $("#ui-id-2").selectmenu('refresh');
               $('#ui-id-2 option[value="Не выбрано"]').prop('selected', true);
               $('#ui-id-2-button .ui-selectmenu-text').text('Выбрать');
               $('input[name="ptip"]').val($("#ui-id-1 > option:selected").text());
               calc();
			} else {
			    $('input[name="ptop"]').val('Не выбрано');
			    $('input[name="pmark"]').val('Не выбрано');
			    $('input[name="bvalue"]').val('');
			    $('b.pmat').text('0 рублей');
			    $('b.pdel').text('0 рублей');
			    $('input[name="pobm"]').val('Не выбрано');
			    $('input[name="pmat"]').val('0 рублей');
			    $('input[name="pdel"]').val('0 рублей');
			    $('input[name="fullp"]').val('0 рублей');
			    $('.calc-total b').text('0 рублей');
			    $("#ui-id-2").selectmenu({ disabled: true });
			    $('#ui-id-2 option[value="Не выбрано"]').prop('selected', true);
			    $('#ui-id-2-button .ui-selectmenu-text').text('Выбрать');
			    $('#ui-id-2-menu').each(function() {
                    $( this ).removeClass('ui-state-disabled');
                });
            }
        }
	});
    
    $('#ui-id-2').selectmenu({
		change:function(event,ui) {
        	if(ui.item.value != 'Не выбрано') {
                //console.log(ui.item.value);
                calc();
                $('input[name="pmark"]').val($("#ui-id-2 > option:selected").text());
			}
        }
	});
    
    $('#ui-id-3').selectmenu({
		change:function(event,ui) {
        	if(ui.item.value != 'Не выбрано') {
                //console.log(ui.item.value);
                calc();
                $('input[name="pdel"]').val($("#ui-id-3 > option:selected").text());
			}
        }
	});
    
    $('input[name="bvalue"]').on('change', function() {
    	$('input[name="pobm"]').val($(this).val());
        calc();
    });
    
    
    function calc() {
		let calc = 0;
        let calc_del = 0;
		let marka = 0;
        let obm = 0;
        let del = 0;
        let fullprice = 0;
        
		marka = $('#ui-id-2').val();
        obm = $('input[name="bvalue"]').val();
        del = $('#ui-id-3').val();
        
        calc += marka;
        
        if(obm == '0' || obm == '') {
        	obm = 0.1;
            $('input[name="bvalue"]').val('0.1');
            $('input[name="pobm"]').val('0.1');
        }
        else {
        	calc = calc * obm;
            $('input[name="pobm"]').val(obm);
        }
        
        if(del != 'Не выбрано') {
        	//console.log(del);
            if(obm >= 7) {
        		calc_del = obm * parseInt(del);
			} else {
            	obm = 7;
                calc_del = parseInt(obm) * parseInt(del);
			}
        	
        }
        
        //console.log(calc);
        //console.log(obm);
        //console.log(del);
        //console.log(calc_del);
        
        $('.pmat').text(calc.toLocaleString('ru') + ' рублей');
        $('.pdel').text(calc_del.toLocaleString('ru') + ' рублей');
        
        fullprice = calc + calc_del;
        
        $('.calc-total b').text(fullprice.toLocaleString('ru') + ' рублей');
        
        $('input[name="ptip"]').val();
        $('input[name="pmark"]').val();
        $('input[name="pobm"]').val();
        $('input[name="pdel"]').val();
        $('input[name="pmat"]').val(calc + ' рублей');
        $('input[name="pdeliv"]').val(calc_del + ' рублей');
        $('input[name="fullp"]').val(fullprice + ' рублей');
	};
    

});