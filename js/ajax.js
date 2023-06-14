

			function ajaxcomplete(functionname, attriname)
					{
						var attr = attriname; 
						var searchterm = document.getElementById(attriname).value;
						var myKeyVals = { attr : searchterm};
						
						if(searchterm.length > 2 && searchterm.length < 7)
						{
						var saveData = $.ajax({
											  type: 'GET',
											  url: 'admin.php?action='+functionname,
											  data: myKeyVals,
											  dataType: 'text',
											  success: function(resultData) {
												  console.log(resultData);
											  document.getElementById(attr+'_suggestions').innerHTML = resultData;
											  }
										});
						}				
						
					}
