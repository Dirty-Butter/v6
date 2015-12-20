/* Custom javascript to ajax query for
 * stock level for the selected option
 * combo.
 * FOUNDATION SKIN ONLY!
 */

	var selectors = $('form.add_to_basket input[type="hidden"][name^="productOptions"],'+
	                  'form.add_to_basket input[type="radio"],'+
	                  'form.add_to_basket input[type="checkbox"],'+
	                  'form.add_to_basket select');
	var indicator = $('#stock_level_check');
	var product_id       = $('form.add_to_basket input[name="add"]').val();

	console.log(selectors);
	console.log(selectors.length);

	function ccOptionAjax(){ console.log("Doing ccOptionAjax");
		var assignArr = [];
		var arrCount = 0;
		var action = $('form.add_to_basket').attr("action");
		var goAjax = true;
		
		$('form.add_to_basket input[type="hidden"][name^="productOptions"],'+
	    'form.add_to_basket input[type="radio"]:checked,'+
	    'form.add_to_basket input[type="checkbox"]:checked,'+
	    'form.add_to_basket select').each(function(){
			if(/* $(this).length > 0 && */ $(this).val() > 0 ){
				console.log('Hit.');
				arrCount++
				assignArr.push($(this).val());
				console.log(assignArr);
				goAjax = goAjax && true;
			} else {
				console.log('No Hit.');
				$('#stock_level_good').fadeOut();
				$('#stock_level_bad').fadeOut();
				$('#stock_level_choose').fadeIn();
				goAjax = false;
			} console.log('This round, goAjax is: ' + goAjax);
		});
		console.log('Finally, goAjax is: ' + goAjax);
		if(goAjax){
			var ois_data = $.param({ois: assignArr, pid: product_id});
			console.log('Doing the goAjax');
			console.log('What data?',assignArr);
			console.log('Parameterized:',ois_data);
			$.ajax(
				{
					url: action + '?_g=rm&type=plugins&module=ajaxoptions&cmd=call',
					type: 'POST',
					cache: false,
					data: ois_data,
					complete: function(returned)
					{
						console.log(returned.responseText);
						if (returned.responseText === '0')
						{
							$('#stock_level_bad').fadeOut();
							$('#stock_level_holder,#stock_level_choose,#stock_level_good').fadeOut();
							$('#stock_level_bad').fadeIn();
						} else { /* Anything other than '0' is assumed to be in stock, or stock levels are not used. */
							$('#stock_level_good').fadeOut();
							$('#stock_level_holder,#stock_level_choose,#stock_level_bad').fadeOut();
							$('#stock_level_good').fadeIn();
						}
						/* indicator.effect("shake", { times:4, distance: 3 }, 70); */
					}
				}
			);

		}
	}
	
	jQuery(document).ready(function(e){ console.log("Document ready.");
		if ( $('div#stock_level_check').length > 0
		  && $('form.add_to_basket input[name="add"]').length > 0 )
		{ console.log("Triggers exist.");
			$('#stock_level_holder').fadeOut();
			$('#stock_level_choose').fadeIn();
			selectors.on('change', function() {  console.log("Something changed.");
				ccOptionAjax();
			});
		}
	});
