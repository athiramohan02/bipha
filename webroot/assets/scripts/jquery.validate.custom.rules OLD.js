$(document).ready(function(){
	$.validator.addMethod("regexname", function(value, element) {
			//return this.optional(element) || /^[A-Z][a-zA-Z ']*[A-Za-z]$/i.test(value);
			return this.optional(element) || /^[a-zA-Z ']*$/i.test(value);
	}, "");
	
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
		   return this.optional(element) || /^[0-9.]*$/i.test(value);
	}, "");
	
	/*$.validator.addMethod("regexalphanumeric", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 ]+$/i.test(value);
	}, "");*/
	
	//Regex to check atleast one alphanumeric character
	$.validator.addMethod("regexalphanumeric", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 ]+[A-Za-z0-9 \- \(\)\.\,\'\:\;\@\/ ]*$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexalphanumericspace", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 \/\n]*$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexplace", function(value, element) {
		   return this.optional(element) || /^[A-Za-z][a-zA-Z0-9 '.-]*[A-Za-z0-9]+$/i.test(value);
	}, "");
	
	/*$.validator.addMethod("regextitle", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \; \? \- \! \s]+$/i.test(value);		    
	}, "");*/
	
	$.validator.addMethod("regextitle", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \- \s]+$/i.test(value);		    
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
	}, "");
	
	$.validator.addMethod("regexmeta", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \- \, \/ \' \" \. ]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexmetakeywords", function(value, element) {
		return this.optional(element) || /^[A-Za-z0-9,+\£ ]*$/i.test(value);
	}, "");
	
	$.validator.addMethod("regexmetadescription", function(value, element) {
		   return this.optional(element) || /^[\w\.\_\'\:\(\)\[\]\"\,\.\£\<\>\/ ]+$/i.test(value);
	}, "");	
	
	$.validator.addMethod("regextransactionid", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 {}-]+$/i.test(value);
	}, "");
	
	$.validator.addMethod("UKPostcode", function(value, element) { 
		return this.optional(element) || /[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}/i.test(value);
	}, "");
	
	$.validator.addMethod("regexsalespricetext", function(value, element) {
		   return this.optional(element) || /^[A-Za-z0-9 \' \. \, \" \: \& \/ \- \! \+ \£ \( \)\– \ @ \s]+$/i.test(value);		    
	}, "");
	
});