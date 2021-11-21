// Begin Calc

// var prod_array = {
// 	0: {'prod_name':'Аммиачная селитра N 34,4', 'prod_azot': 34.4},
// 	1: {'prod_name':'Карбамид N 46,2', 'prod_azot': 46.2},
// 	2: {'prod_name':'Сульфат аммония 21:24', 'prod_azot': 21, 'prod_sera': 24},
// 	3: {'prod_name':'КАС 30-32%', 'prod_azot': 30},
// 	4: {'prod_name':'NPK(S) 15:15:15(10)', 'prod_azot': 15, 'prod_phosphor': 15, 'prod_kalii': 15},
// 	5: {'prod_name':'Аммофос NP 10:46', 'prod_azot': 10, 'prod_phosphor': 46},
// 	6: {'prod_name':'Аммофос NP 12:52', 'prod_azot': 12, 'prod_phosphor': 52},
// 	7: {'prod_name':'Аммофос NP 10:33', 'prod_azot': 10, 'prod_phosphor': 33},
// 	8: {'prod_name':'Сульфоаммофос NP(S) 20:20(14)', 'prod_azot': 20, 'prod_phosphor': 20, 'prod_sera': 14},
// 	9: {'prod_name':'Диаммонийфосфат NP 18:46', 'prod_azot': 18, 'prod_phosphor': 46},
// 	10: {'prod_name':'Диамммофоска NPK(S) 10:26:26(2)', 'prod_azot': 10, 'prod_phosphor': 26, 'prod_kalii': 26},
// 	11: {'prod_name':'Калий хлористый', 'prod_kalii': 60},
// 	12: {'prod_name':'ЖКУ 11:37', 'prod_azot': 11, 'prod_phosphor': 37}
// };

var prod_array = {
	0: ['Аммиачная селитра N 34,4', 34.4, '', '', ''],
	1: ['Карбамид N 46,2', 46.2, '', '', ''],
	2: ['Сульфат аммония 21:24', 21, '', '', 24],
	3: ['КАС 30-32%', 30, '', '', ''],
	4: ['NPK(S) 15:15:15(10)', 15, 15, 15, ''],
	5: ['Аммофос NP 10:46', 10, 46, '', ''],
	6: ['Аммофос NP 12:52', 12, 52, '', ''],
	7: ['Аммофос NP 10:33', 10, 33, '', ''],
	8: ['Сульфоаммофос NP(S) 20:20(14)', 20, 20, '', 14],
	9: ['Диаммонийфосфат NP 18:46', 18, 46, '', ''],
	10: ['Диамммофоска NPK(S) 10:26:26(2)', 10, 26, 26, ''],
	11: ['Калий хлористый','', '', 60, ''],
	12: ['ЖКУ 11:37', 11, 37, '', '']
};

var kul_name, kul_azot, kul_phosphor, kul_kalii, kul_sera;
var agro_table = '';

$('.agro_calc_btn').on("click", function(){
	var tonn_urozhai = $('#urozhai').val();
	var kultura = $('#kultura').val();
	var reg_sel = $('#reg_sel').val();

	kul_name = $('#kultura').children('option:selected').text();
	kul_azot = $('#kultura').children('option:selected').attr('data-azot');
	kul_phosphor = $('#kultura').children('option:selected').attr('data-phosphor');
	kul_kalii = $('#kultura').children('option:selected').attr('data-kalii');
	kul_sera = $('#kultura').children('option:selected').attr('data-sera');

	agro_table = '<div class="title">Рассчет нормы внесения</div> <p class="calc_text">Объем удобрений в ф.в., кг/га</p>';

	if( tonn_urozhai == '' || kultura == 0 || kultura == null || reg_sel == null ){
		$('html, body').stop().animate({ scrollTop: $('.agro_calc').offset().top - 150 }, 1300, 'swing', function(){});
	} else{

		kul_azot = kul_azot * tonn_urozhai;
		kul_phosphor = kul_phosphor * tonn_urozhai;
		kul_kalii = kul_kalii * tonn_urozhai;
		kul_sera = kul_sera * tonn_urozhai;

		agro_table += '<div class="calc_table_block"><table class="ago_calc_table">';
		agro_table += '<thead><tr><th>' + kul_name + '</th><th>средняя</th></tr></thead><tbody>';

		for( var prod in prod_array ){

			var val_index = 0;
			var val_total = 0;
			agro_table += '<tr>';

			for( i=0; i<6; i++ ){

				if( prod_array[prod][i] != '' ){

					if( i == 1 ){
						// agro_table += '<td>' + Math.round( (kul_azot * 100) / prod_array[prod][i] ) + '</td>';
						val_index++;
						val_total += Math.round( (kul_azot * 100) / prod_array[prod][i] );
					} else if( i == 2 ){
						// agro_table += '<td>' + Math.round( (kul_phosphor * 100) / prod_array[prod][i] ) + '</td>';
						val_index++;
						val_total += Math.round( (kul_phosphor * 100) / prod_array[prod][i] );
					} else if( i == 3 ){
						// agro_table += '<td>' + Math.round( (kul_kalii * 100) / prod_array[prod][i] ) + '</td>';
						val_index++;
						val_total += Math.round( (kul_kalii * 100) / prod_array[prod][i] );
					} else if( i == 4 ){
						// agro_table += '<td>' + Math.round( (kul_sera * 100) / prod_array[prod][i] ) + '</td>';
						val_index++;
						val_total += Math.round( (kul_sera * 100) / prod_array[prod][i] );
					} else if( i == 5){

						// расчет ср. знач. если значений больше 1, иначе пустая ячейка

						// if( val_index > 1 ){ 
						// 	agro_table += '<td>'+ (val_total / val_index ).toFixed(2) +'</td>';
						// } else{
						// 	agro_table += '<td>&nbsp;</td>';
						// }

						agro_table += '<td>'+ (val_total / val_index ).toFixed(2) +'</td>';
						
					} else{
						agro_table += '<td>' + prod_array[prod][i] + '</td>';
					}
				} else{
					// agro_table += '<td>&nbsp;</td>';
				}
			}

			agro_table += '</tr>';
		}

		agro_table += '</tbody></table></div> <a class="more_btn orange_btn" onclick="agro_calc_table();" href="javascript:;" data-fancybox data-src="#zayavka">Оставить заявку </a>';

		$('.agro_table').html(agro_table);
		$('.agro_table').show();
		$('html, body').stop().animate({ scrollTop: $('.agro_table').offset().top - 150 }, 1300, 'swing', function(){});
	}

});

function agro_calc_table(){
	var res_table = '<table border="1" cellspacing="0" cellpadding="5">' + $('.ago_calc_table').html() + '</table>';
	var region = '<p>Регион: ' + $('#reg_sel option:selected').text() + '</p><br>\n';

	$('#calc_area').text( region + res_table );
}


// END Calc