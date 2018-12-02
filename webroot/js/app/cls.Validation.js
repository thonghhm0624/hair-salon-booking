// JavaScript Document
//Validate function
function clsValidate(){
	this.init = function(){
		$.validator.addMethod("checkEmail", function(value, element) 
		{ 
			return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,40}$/i.test(value); 
		}, "Please enter a valid email address.");
        
		$.validator.addMethod("validatorDate",
            function(value, element) {
                return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
            },
            "Please enter a date in the format dd/mm/yyyy!"
        );	
			
        this.validationContactForm();
        this.validationNewsletterForm();
        this.fallBackPlaceHolder('init');
	}
    this.validationContactForm = function(){
        //$("input[name=phone], input[name=nr], input[name=postcode], input[name=answer]").numeric();
        $('#contact-form').validate({
            rules: {
                'name': {
                    required: true
                },
                'email': {
                    required: true
                },
                'message': {
                    required: true
                },
                'g-recaptcha-response': {
                    min:1,
                    required: true
                }
            },
            submitHandler: function(form) {
                if($(form).find("#g-recaptcha-response").val() !== ''){
                    form.submit();
                }else{

                }
            },
            focusInvalid: false,
            invalidHandler: function(form, validator) {},
            errorPlacement: function(error, element) {},
            highlight: function(element, errorClass, validClass) {
                $(element).removeClass(validClass).addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        });

    }
    this.validationNewsletterForm = function(){
        //$("input[name=phone], input[name=nr], input[name=postcode], input[name=answer]").numeric();
        $('#newsletter-form').validate({
            rules: {
                'email': {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            },
            focusInvalid: false,
            invalidHandler: function(form, validator) {},
            errorPlacement: function(error, element) {},
            highlight: function(element, errorClass, validClass) {
                $(element).removeClass(validClass).addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        });

    }
    this.fallBackPlaceHolder = function(type)
    {
        //Contest
        var is_support_xplaceholder = this.xplaceholderSupported();
        if (is_support_xplaceholder == false)
        {
            if(type && type == 'init')
            {
                $('input[placeholder], textarea[placeholder]').each(function(){
                    if($(this).val() == '') {
                        $(this).val($(this).attr('placeholder'));
                    }
                })
                    .on('focus', function(){
                        var rel_str = $(this).attr('placeholder');
                        if($(this).val() == rel_str) {
                            $(this).val('');
                        }
                    })
                    .on('blur', function(){
                        var rel_str = $(this).attr('placeholder');
                        if($(this).val() == '') {
                            $(this).val(rel_str);
                        }
                    });
            }
            else
            {
                $('input[placeholder], textarea[placeholder]').each(function(){
                    if($(this).val() == '') {
                        $(this).val($(this).attr('placeholder'));
                    }
                });
            }
        }
    }
    this.xplaceholderSupported = function() {
        var i = document.createElement("input");
        return ('placeholder' in i);
    }
	this.get_data_form =  function(form_ids)
	{
		var parentObj = this;
		var params = {}; 
		var temp_name = ''
		$(form_ids).find("input[type=radio]:checked,input[type=checkbox], input[type='text'], input[type='hidden'],input[type='email'],input[type='password'], select, textarea").each(function() 	
		{ 
			//alert(this.name);
			if(this.type == 'checkbox')
			{
				if(temp_name != this.name)
				{
					params[this.name] = parentObj.get_values_checkbox(this.name);
					temp_name =  this.name;
				}
			}				
			else
			{
				if(this.value != $(this).attr('placeholder'))
				{
					params[this.name] = this.value;	
				}
				else
				{
					params[this.name] = '';
				}			
			}
					
		});
		return params;
	}
	this.get_values_checkbox = function(name)
	{
		var allVals = [];
		$('[name="'+name+'"]:checked').each(function() {
			allVals.push($(this).val());
		});
		return allVals.join(',');   
	}
}
var validateObj = new clsValidate();
$(document).ready(function(e) {
    
});
