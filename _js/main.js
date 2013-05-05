$(document).ready(function(){
	
	// insert e-mail address
	
	$('#emailLink').attr("href", 'mailto:' + 'mail' + '@' + 'leislschrader.com');
     
    // initialize Typekit
    
    try{Typekit.load();}catch(e){}
    
    // scrollTo
    
    $('a[href^="#"]').on('click', function(){
    
        $('body').scrollTo($(this).attr('href'), 500);
    })
 });