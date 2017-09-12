$(document).ready(function(){
	$.validator.addMethod("regexname", function(value, element) {
			return this.optional(element) || /^[A-Za-z]+[a-zA-Z '.]*[A-Za-z]*$/i.test(value);
	}, "Only alphabets, spaces, single quotes allowed. ");
	
	$.validator.addMethod("essentialName", function(value, element) {
			return this.optional(element) || /^[a-z](?:_?-?.?[a-z0-9]+)*$/i.test(value);
	}, "Only alphabets, numbers, space, hyphen, underscore, period allowed. ");
	

	$.validator.addMethod("regexalphabet", function(value, element) {
			return this.optional(element) || /^[A-Za-z ]*$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexphone", function(value, element) {
		   return this.optional(element) || /^(\+?[0-9])[\-?\d]*\d+$/i.test(value);
	}, "");

	$.validator.addMethod("regexnumber", function(value, element) {
		   return this.optional(element) || /^[0-9]*$/i.test(value);
	}, "");
	$.validator.addMethod("regexprice", function(value, element) {
		   return this.optional(element) || /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/i.test(value);
	}, "");
	
	//Regex to check atleast one alphanumeric character
	$.validator.addMethod("regexalphanumeric", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 ]+[A-Za-z0-9 \- \(\)\.\,\'\:\;\@\/ ]*$/i.test(value);
	}, "Please enter alphabets or numbers.");


	//Regex to check atleast one alpha number character
	$.validator.addMethod("regexalphanumbers", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 ]+[A-Za-z0-9]*$/i.test(value);
	}, "Please enter alphabets or numbers.");



	
	$.validator.addMethod("regexalphanumericspace", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 \/\n]*$/i.test(value);
	}, "Please enter alphabets, numbers or spaces only.");
	
	$.validator.addMethod("regexplace", function(value, element) {
		   return this.optional(element) || /^[A-Za-z][a-zA-Z0-9 '.-]*[A-Za-z0-9]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("regextitle", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \; \? \- \! \s]+$/i.test(value);		    
	}, "");
	
	$.validator.addMethod("regexproductname", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \& \/ \- \! \+ \£ \( \)\– \s]+$/i.test(value);		    
	}, "");
	
	$.validator.addMethod("regexaddress", function(value, element) {
		   return this.optional(element) || /^[\w\.\_\-\'\&\:\(\)\[\]\"\,\.\<\>\/ ]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexamount", function(value, element) {
		   return this.optional(element) || /^[0-9][0-9]*[\.?]\d+$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexusername", function(value, element) {
			return this.optional(element) || /^[\w\.\_]+$/i.test(value);
	}, "");

	$.validator.addMethod("colorcode", function(value, element) {
			return this.optional(element) || /^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i.test(value);
	}, "Please choose a valid colour.");
	
	$.validator.addMethod("regexcompanyname", function(value, element) {
			return this.optional(element) || /^[\w\.\_\&\' ]+$/i.test(value);
	}, "");	
	
	$.validator.addMethod("regexukdate", function(value, element) {		
		return this.optional(element) || /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/i.test(value);
	}, " Please enter a valid date.");
	
	$.validator.addMethod("regexdeci", function(value, element) {		
		//return this.optional(element) || /^[0-9]{1,8}\.?[0-9]{0,2}$/i.test(value);
		//alert(value)
		if(value<100000000){
			return true;
		}else
		return false;
	}, "<br/>Please enter a value less than 100000000.");	
	
	$.validator.addMethod("regexsefurl", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9\_\-\/]*$/i.test(value);
	}, "Please avoid symbols and special characters in sefurl.");
	
	$.validator.addMethod("regexmeta", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \- \, \/ \' \" \. ]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexmetakeywords", function(value, element) {
		return this.optional(element) || /^[A-Za-z0-9,+\£ ]*$/i.test(value);
	}, "Please enter valid meta keywords.");
	
	$.validator.addMethod("regexmetadescription", function(value, element) {
		   return this.optional(element) || /^[\w\.\_\'\:\(\)\[\]\"\,\.\£\<\>\/ ]+$/i.test(value);
	}, "Please enter valid meta description");	


		$.validator.addMethod("regexphonespacewords", function(value, element) {
		return this.optional(element) || /^[0-9,+\- ]*$/i.test(value);
	}, "Please enter valid meta keywords.");



	
	$.validator.addMethod("regextransactionid", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 {}-]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("UKPostcode", function(value, element) { 
		return this.optional(element) || /[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}/i.test(value);
	}, "");
	
	$.validator.addMethod("regexsalespricetext", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \& \/ \- \! \+ \£ \( \)\– \ @ \s]+$/i.test(value);		    
	}, "");

	$.validator.addMethod("BIC", function(value, element) {
		   //return this.optional(element) || /^[a-zA-Z]{6}/{2}(/{3})$/i.test(value);
		                                    // ^[a-zA-Z]{6}\w{2}(\w{3})?$

		   return this.optional(element) || /^[A-Za-z]{6}\w{2}/i.test(value);			    
	}, "");

	$.validator.addMethod("IBAN", function(value, element) {
		 //  return this.optional(element) || /^[a-zA-Z]{2}\d{2}\s*(\w{4}\s*){2,7}\w{1,4}\s*$/i.test(value);

		    return this.optional(element) || /^[A-Za-z]{2}\d{2}\s*(\w{4}\s*){2,7}\w{1,4}\s*$/i.test(value);
	}, "");

	$.validator.addMethod("regexlatlon", function(value, element) {
			return this.optional(element) || /^([\+ 0-9.-]+).+?([0-9.-]+)$/i.test(value);
	}, "");
	$.validator.addMethod("regexpincode", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 \- \( \) ]*$/i.test(value);
	}, "");

	$.validator.addMethod("pincode", function(value, element) {
			return this.optional(element) || /^[0-9]*$/i.test(value);
	}, "");

	$.validator.addMethod('IP4Checker', function(value, element) {
                return this.optional(element) || /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/i.test(value);
    }, 'Invalid IP address');
	$.validator.addMethod("atleastonealphanumeric", function(value, element) {
			return this.optional(element) || /[a-zA-Z0-9]/i.test(value);
	}, "Atleast one alphanumeric character required.");

	$.validator.addMethod("greaterThan", 
		function(value, element, params) {
		    if (!/Invalid|NaN/.test(new Date(value))) {
		        return new Date(value) >= new Date($(params).val());
		    }

	    return isNaN(value) && isNaN($(params).val()) 
	        || (Number(value) >= Number($(params).val())); 
	},'Must be greater than {0}.');

	$.validator.addMethod("phone", function(value, element) {
			return this.optional(element) || /^\d*[0-9](|.\d*[0-9])(|.\d*[0-9])?$/i.test(value);
	}, "Please enter a valid telephone number.");

	$.validator.addMethod("websiteurl", function(value, element) {
			return this.optional(element) || /^(http|https|ftp):\/\/|[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(value);
	}, "Please enter a valid url.");

	$.validator.addMethod("greaterThan", function(value, element, params) {
	    if (!/Invalid|NaN/.test(new Date(value))) {
	        return new Date(value) > new Date($(params).val());
		    }

	    return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
	},'Must be greater than {0}.');
	$.validator.addMethod("strictName", function(value, element) {
		   return this.optional(element) || /^[a-z0-9](?:_?-?.?[a-z0-9]+)*$/i.test(value);
	}, "Invalid chracters entered.");
	$.validator.addMethod('filesize', function(value, element, param) {
	    // param = size (en bytes) 
	    // element = element to validate (<input>)
	    // value = value of the element (file name)
    	return this.optional(element) || (element.files[0].size <= param) 
	});
	$.validator.addMethod("lessThan",function(value, element, param) {
            var i = parseFloat(value);
            var j = parseFloat(param);
            return (i < j) ? true : false;
        }
    );
    $.validator.addMethod("regexyoutubeurl", function(value, element) {
		   return this.optional(element) || /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/i.test(value);
	}, "");


	


	
}); 

