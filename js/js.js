/*
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
*/

function generate()
{
	$.ajax({
		type: 'post',
		data: {'link':$('#link').attr('value')},
			url: 'generate/process',
			success: function(data) {
					alink = $('#alink');
  				alink.html(data);
  				alink.attr("href", data);
			},
			error: function(data) {
				alert("error: " + data);
			}
	});
}
