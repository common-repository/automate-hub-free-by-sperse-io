
function makedropable(fielddata=''){
        if(!(fielddata) && !(typeof fieldData == 'undefined')){
            fielddata = fieldData;
        }
        var dragged_obj = '';
        Array.prototype.remove = function() {
                var what, a = arguments, L = a.length, ax;
                while (L && this.length) {
                    what = a[--L];
                    while ((ax = this.indexOf(what)) !== -1) {
                        this.splice(ax, 1);
                    }
                }
                return this;
            };
        jQuery( ".form_fields_name" ).draggable({
            revert : function(event, ui) {
                jQuery(this).data("uiDraggable").originalPosition = {
                    top : 0,
                    left : 0
                };
                return !event;
            },
            //connectToSortable: ".sortable",
            // revert :"invalid",
            helper: "clone",
             start: function(event, ui){
                dragged_obj = jQuery(this);
             },
             drag:function(event, ui){
                dragged_obj = jQuery(this);
                      ui.helper.removeClass("end-draggable");
             },
             stop: function( event, ui ){
                var marginTop = 10;
      			ui.helper.addClass("end-draggable");
             }
        });

        jQuery( ".form_fields_db_name" ).draggable({
            revert : function(event, ui) {
                if(!(typeof jQuery(this).data("uiDraggable") =='undefined')){
                    jQuery(this).data("uiDraggable").originalPosition = {
                        top : 0,
                        left : 0
                    };
                }
                return !event;
            },
            //revert :"invalid",
            helper: "clone",
            start: function(){
                dragged_obj = jQuery(this);
            },
             drag:function(){
                dragged_obj = jQuery(this);
             },
        });

        jQuery( ".sperse_reverse_draggable" ).droppable({
           tolerance: 'touch',
           greedy: true,
          drop: function( event, ui ) {
            if(dragged_obj){
                if(typeof int_id != 'undefined'){
                    var maaped_value = dragged_obj.attr('data-name');
                    var fieldname = dragged_obj.closest('.sperse_dropped').find("input").attr('data-field');
                    if(!(fieldname)){
                        fieldname = dragged_obj.attr('data-field');
                    }
                    var field_data = awpNewIntegration.fieldData;
                    var filteredfordisplaystored = field_data[fieldname+'dis'];
                    var mapped_pr_value = '{{'+maaped_value;
                    maaped_value = '{{'+maaped_value+'}}';
                    var already_value = dragged_obj.closest('.sperse_dropped').find("input").val();
                    if(!(already_value)){
                        already_value = field_data[fieldname];
                    }
                    if(already_value){
                         maaped_value = already_value.replace(maaped_value,'');
                    }
                    if(filteredfordisplaystored){
                        filteredfordisplaystored.remove(mapped_pr_value);
                    }
                    dragged_obj.closest('.sperse_dropped').find("input").val(maaped_value);
                    jQuery("input[data-field='"+fieldname+"']").val(maaped_value);
                    field_data[fieldname] = maaped_value;
                    field_data[fieldname+'dis'] = filteredfordisplaystored;
                    awpNewIntegration.fieldData = field_data;
                    if(!(maaped_value)){
                        dragged_obj.parent().find( ".fx-placeholder-label" ).show();
                        jQuery("input[data-field='"+fieldname+"']").parent().find( ".fx-placeholder-label" ).show();
                        jQuery("input[data-field='"+fieldname+"']").parent().removeClass('sperse_dropped'); 
                        dragged_obj.parent().removeClass('sperse_dropped'); 
                    }
            }else{
                    var maaped_value = dragged_obj.attr('data-name');
                    var fieldname = dragged_obj.closest('.sperse_dropped').find("input").attr('data-field');
                    if(!(fieldname)){
                        fieldname = dragged_obj.attr('data-field');
                    }
                    var field_data = awpNewIntegration.fieldData;
                    var filteredfordisplaystored = field_data[fieldname+'dis'];
                    var mapped_pr_value = '{{'+maaped_value;
                    maaped_value = '{{'+maaped_value+'}}';
                    var already_value = dragged_obj.closest('.sperse_dropped').find("input").val();
                    if(!(already_value)){
                        already_value = field_data[fieldname];
                    }
                    if(already_value){
                         maaped_value = already_value.replace(maaped_value,'');
                    }
                    if(filteredfordisplaystored){
                        filteredfordisplaystored.remove(mapped_pr_value);
                    }
                    dragged_obj.closest('.sperse_dropped').find("input").val(maaped_value);
                    jQuery("input[data-field='"+fieldname+"']").val(maaped_value);
                    field_data[fieldname] = maaped_value;
                    field_data[fieldname+'dis'] = filteredfordisplaystored;
                    awpNewIntegration.fieldData = field_data;
                    if(!(maaped_value)){
                        dragged_obj.parent().find( ".fx-placeholder-label" ).show();
                        jQuery("input[data-field='"+fieldname+"']").parent().find( ".fx-placeholder-label" ).show();
                        jQuery("input[data-field='"+fieldname+"']").parent().removeClass('sperse_dropped'); 
                        dragged_obj.parent().removeClass('sperse_dropped'); 
                    }
            }
            dragged_obj = '';
            }
          },
         out: function(event, ui) {
            if(dragged_obj){
            }
         }
        });

        jQuery( ".form_field_dropable" ).droppable({
            tolerance: 'touch',
            greedy: true,
            drop: function( event, ui ) {
            if(dragged_obj){
                
                // Edit integration
                if(typeof int_id != 'undefined'){
                    
                    var maaped_value = dragged_obj.attr('data-name');
                    var bac_mapped_value = maaped_value;
                    var mapped_pr_value = '{{'+maaped_value;
                    maaped_value = '{{'+maaped_value+'}}';
                    var field_data = awpNewIntegration.fieldData;
                    var action =awpNewIntegration.action;
                    var  dropedfieldname = jQuery(this).find('input').attr('data-field');
                    var fromfieldName = dragged_obj.attr('data-field');
                 
                    if(fromfieldName){
                      
                        if(!(fromfieldName==dropedfieldname) ){
                         
                           var previous_form_field =  field_data[fromfieldName];
                           var previous_form_field_ar =  field_data[fromfieldName+'dis'];
                            if(previous_form_field && !(dropedfieldname=='answerQ1' || dropedfieldname=='answerQ2' || dropedfieldname=='answerQ3') && !(fromfieldName=='answerQ1' || fromfieldName=='answerQ2' || fromfieldName=='answerQ3') ){
                               
                                 previous_form_field = previous_form_field.replace(maaped_value,'');
                            }else{
                               
                                previous_form_field = [];
                            }
                            if(previous_form_field_ar && !(dropedfieldname=='answerQ1' || dropedfieldname=='answerQ2' || dropedfieldname=='answerQ3') && !(fromfieldName=='answerQ1' || fromfieldName=='answerQ2' || fromfieldName=='answerQ3')  ){
                            
                                previous_form_field_ar.remove(mapped_pr_value);
                            }else{
                            
                                previous_form_field_ar = [];
                            }
                          
                            field_data[fromfieldName] = previous_form_field;
                            field_data[fromfieldName+'dis'] =  previous_form_field_ar;
                            jQuery("input[data-field='"+fromfieldName+"']").val(previous_form_field);
                            if((previous_form_field.length==0)){
                           
                                jQuery("input[data-field='"+fromfieldName+"']").closest('.form_field_dropable').removeClass('sperse_dropped');
                                jQuery("input[data-field='"+fromfieldName+"']").closest('.fx-placeholder-label').show();
                            }
                    
                        }
                 
                    }
               
                    var fordisplaynames = field_data[dropedfieldname];
                    var fordisplaystored = [];
                    var already_value = jQuery(this).find('input').val();
                    if(already_value){
               
                        var  calready_value =  already_value.split(" ").join("");
                         maaped_value = maaped_value.split(" ").join("");
                        if(calready_value.indexOf(maaped_value) !== -1){
                        
                            maaped_value = already_value;
                        }else{
                        
                             maaped_value = already_value+maaped_value;
                        }
                     
                    }
                    if(dropedfieldname=='answerQ1' || dropedfieldname=='answerQ2' || dropedfieldname=='answerQ3' ){
                        var question = awpNewIntegration.trigger.formFields[bac_mapped_value];
                        field_data[dropedfieldname] = [question,bac_mapped_value];
                        jQuery(this).find('input').val(question+','+'{{'+bac_mapped_value+'}}');
                        var back_mapped_value = bac_mapped_value;
                        fordisplaystored = back_mapped_value.split('}}');
                        var filteredfordisplaystored = fordisplaystored.filter(function (el) {
                          return el != "";
                        });
                        dragged_obj.attr('data-field',fieldname);
                        field_data[dropedfieldname+'dis'] = filteredfordisplaystored;
                    }else{
                
                        var back_mapped_value = maaped_value.trim();
                        fordisplaystored = back_mapped_value.split('}}');
                        var filteredfordisplaystored = fordisplaystored.filter(function (el) {
                          return el != "";
                        });
                        dragged_obj.attr('data-field',dropedfieldname);
                        jQuery(this).find('input').val(maaped_value);
                        field_data[dropedfieldname+'dis'] = filteredfordisplaystored;
                        field_data[dropedfieldname] = maaped_value;
                        jQuery(this).find('input').val(maaped_value);
                    
                    }
             
                    awpNewIntegration.fieldData = field_data;
                    jQuery(this).find(".fx-placeholder-label" ).hide();
                    jQuery(this).addClass('sperse_dropped');
                    if(dragged_obj.hasClass('form_fields_db_name')){
                        //dragged_obj.remove();
                    }
               
                }else{
               
                        var clone_obj = ui.draggable.clone();
                        jQuery( clone_obj ).find('.field-actions').removeClass('hide');
                        var maaped_value = clone_obj.attr('data-name');
                        var count = jQuery(this).find('div').length;
                        var that = jQuery(this).find('.sortable');
                        jQuery( clone_obj ).attr('id', 'draggeddd'+count).addClass('fx-controls-in-zone').removeClass('ui-draggable ui-draggable-handle');
                        jQuery( clone_obj ).removeAttr('style');
                        clone_obj.draggable({
                            revert : function(event, ui) {
                                jQuery(this).data("uiDraggable").originalPosition = {
                                    top : 0,
                                    left : 0
                                };
                                return !event;
                            },
                            helper: "clone",
                            start: function(event, ui){
                                dragged_obj = jQuery(this);
                            },
                            drag:function(event, ui){
                                dragged_obj = jQuery(this);
                                ui.helper.removeClass("end-draggable");
                            },
                            stop: function( event, ui ){
                                ui.helper.addClass("end-draggable");
                            }
                        });
                        clone_obj.appendTo(that);
                        var bac_mapped_value = maaped_value;
                        var mapped_pr_value = '{{'+maaped_value;
                        maaped_value = '{{'+maaped_value+'}}';
                        var field_data = awpNewIntegration.fieldData;
                        //console.log(field_data);
                        var action =awpNewIntegration.action;
                        var fieldname = jQuery(this).find('input').attr('data-field');
                        var fromfieldName = jQuery( clone_obj ).attr('data-field');
                        if(fromfieldName){
                            if(!(fromfieldName==fieldname)){
                            var previous_form_field =  field_data[fromfieldName];
                            var previous_form_field_ar =  field_data[fromfieldName+'dis'];
                            if(previous_form_field && !(fieldname=='answerQ1' || fieldname=='answerQ2' || fieldname=='answerQ3') ){
                                    previous_form_field = previous_form_field.replace(maaped_value,'');
                                }else{
                                    previous_form_field = [];
                                }
                                if(previous_form_field_ar && !(fieldname=='answerQ1' || fieldname=='answerQ2' || fieldname=='answerQ3')  ){
                                    previous_form_field_ar.remove(mapped_pr_value);
                                }else{
                                        previous_form_field_ar = [];
                                }
                                field_data[fromfieldName] = previous_form_field;
                                field_data[fromfieldName+'dis'] =  previous_form_field_ar;
                                jQuery("input[data-field='"+fromfieldName+"']").val(previous_form_field);
                                if(previous_form_field.length==0){
                                    jQuery("input[data-field='"+fromfieldName+"']").closest('.form_field_dropable').removeClass('sperse_dropped');
                                    jQuery("input[data-field='"+fromfieldName+"']").closest('.fx-placeholder-label').show();
                                }
                            }
                        }
                        var fordisplaynames = field_data[fieldname];
                        var fordisplaystored = [];
                        var already_value = jQuery(this).find('input').val();
                        if(already_value){
                            if(already_value.indexOf(maaped_value) !== -1){
                                maaped_value = already_value;
                            }else{
                                maaped_value = already_value+maaped_value;
                            }
                        }
                        if(fieldname=='answerQ1' || fieldname=='answerQ2' || fieldname=='answerQ3' ){
                            var question = awpNewIntegration.trigger.formFields[bac_mapped_value];
                            field_data[fieldname] = [question,bac_mapped_value];
                            jQuery(this).find('input').val(question+','+'{{'+bac_mapped_value+'}}');
                            var back_mapped_value = bac_mapped_value;
                            fordisplaystored = back_mapped_value.split('}}');
                            var filteredfordisplaystored = fordisplaystored.filter(function (el) {
                            return el != "";
                            });
                            jQuery( clone_obj ).attr('data-field',fieldname);
                            field_data[fieldname+'dis'] = filteredfordisplaystored;
                        }else{
                            var back_mapped_value = maaped_value;
                            fordisplaystored = back_mapped_value.split('}}');
                            var filteredfordisplaystored = fordisplaystored.filter(function (el) {
                            return el != "";
                            });
                            jQuery( clone_obj ).attr('data-field',fieldname);
                            jQuery(this).find('input').val(maaped_value);
                            field_data[fieldname+'dis'] = filteredfordisplaystored;
                            field_data[fieldname] = maaped_value;
                            jQuery(this).find('input').val(maaped_value);
                        }
                        awpNewIntegration.fieldData = field_data;
                        jQuery(this).find(".fx-placeholder-label" ).hide();
                        jQuery(this).addClass('sperse_dropped');
                        jQuery( clone_obj ).find('.field-actions').removeClass('hide');
                        if(jQuery( clone_obj ).hasClass('form_fields_db_name')){
                            //dragged_obj.remove();
                        }
                        ui.draggable.hide();
                }
                dragged_obj = '';
            }
          },
         out: function(event, ui) {
            if(dragged_obj){
            }
         }
        });
}


Vue.component('editable-field', {
    props: ["trigger", "action", "fielddata", "field","fields"],
    template: '#editable-field-template',
    data: function() {
        return{
            selected: ''
        }
    },
    methods: {
        Premap:function(field){
           
            var that = this;
            if(that.trigger.formProviderId=='woocommerce'){
                var profile_reset = {
                    'email':'billing_email',
                    'email_id':'billing_email',
                    'Email':'billing_email',
                    'cemail':'billing_email',
                    'firstName':'billing_first_name',
                    'fname':'billing_first_name',
                    'FirstName':'billing_first_name',
                    'firstname':'billing_first_name',
                    'FNAME':'billing_first_name',
                    
                    'name':'billing_first_name',
                    'Name':'billing_first_name',
                    'first_name':'billing_first_name',
                    'family_name':'billing_first_name',
                    'firstmame':'billing_first_name',
                    'lastName':'billing_last_name',
                    'given_name':'billing_last_name',
                    'lname':'billing_last_name',
                    'LNAME':'billing_last_name',

                    'LastName':'billing_last_name',
                    'last_name':'billing_last_name',
                    'lastname':'billing_last_name',
                    'phoneNumber':'billing_phone',
                    'Phone':'billing_phone',
                    'msisdn':'billing_phone',
                    'mobile':'billing_phone',
                    'phone_number':'billing_phone',
                    'phoneNumbers':'billing_phone',
                    'primaryPhone':'billing_phone',
                    'phone':'billing_phone',
                    'mailingStreet':'billing_address_1',
                    'addresses':'billing_address_1',
                    'street':'billing_address_1',
                    'address':'billing_address_1',
                    'company':'billing_company',
                    'companyName':'billing_company',
                    'line':'billing_address_1',
                    'address1':'billing_address_1',
                    'billing_address_1':'billing_address_1',
                    'streetAddress':'billing_address_1',
                    'stateName':'billing_state',
                    'streetAddressOne':'billing_address_1',
                    'line_1':'billing_address_1',
                    'address2':'billing_address_2',
                    'streetAddressTwo':'billing_address_2',
                    'billing_address_2':'billing_address_2',
                    'mailingCity':'billing_city',
                    'city':'billing_city',
                    'city_name':'billing_city',
                    'billing_city':'billing_city',
                    'mailingState':'billing_state',
                    'state':'billing_state',
                    'region':'billing_state',
                    'region_name':'billing_state',
                    'billing_state':'billing_state',
                    'mailingPostalCode':'billing_postcode',
                    'zip':'billing_postcode',
                    'postcode':'billing_postcode',
                    'postCode':'billing_postcode',
                    'postalZip':'billing_postcode',
                    'billing_postcode':'billing_postcode',
                    'zipCode':'billing_postcode',
                    'postal_code':'billing_postcode',
                    'mailingCountry':'billing_country',
                    'countryId':'billing_country',
                    'country':'billing_country',
                    'billing_country':'billing_country',
                    'country_name':'billing_country',
                };
    
            }else if(that.trigger.formProviderId=='webhooksinbound'){
                var profile_reset = {
                    'email':'email_address',
                    'email_id':'email_address',
                    'Email':'email_address',
                    'cemail':'email_address',
                    'firstName':'first_name',
                    'fname':'first_name',
                    'FirstName':'first_name',
                    'firstname':'first_name',
                    'name':'first_name',
                    'Name':'first_name',
                    'first_name':'first_name',
                    'family_name':'first_name',
                    'firstmame':'first_name',
                    'lastName':'last_name',
                    'given_name':'last_name',
                    'lname':'last_name',
                    'LastName':'last_name',
                    'last_name':'last_name',
                    'lastname':'last_name',
                    'phoneNumber':'phone',
                    'Phone':'phone',
                    'msisdn':'phone',
                    'mobile':'phone',
                    'phone_number':'phone',
                    'phoneNumbers':'phone',
                    'primaryPhone':'phone',
                    'phone':'phone',
                    'mailingStreet':'street_address',
                    'addresses':'street_address',
                    'street':'street_address',
                    'address':'street_address',
                    'company':'company',
                    'companyName':'company',
                    'line':'street_address',
                    'address1':'street_address',
                    'billing_address_1':'street_address',
                    'streetAddress':'street_address',
                    'stateName':'state',
                    'streetAddressOne':'street_address',
                    'line_1':'street_address',
                    'address2':'billing_address_2',
                    'streetAddressTwo':'billing_address_2',
                    'billing_address_2':'billing_address_2',
                    'mailingCity':'city',
                    'city':'city',
                    'city_name':'city',
                    'billing_city':'city',
                    'mailingState':'state',
                    'state':'state',
                    'region':'state',
                    'region_name':'state',
                    'billing_state':'state',
                    'mailingPostalCode':'zipcode',
                    'zip':'zipcode',
                    'postcode':'zipcode',
                    'postCode':'zipcode',
                    'postalZip':'zipcode',
                    'billing_postcode':'zipcode',
                    'zipCode':'zipcode',
                    'postal_code':'zipcode',
                    'mailingCountry':'2_letter_country_code',
                    'countryId':'2_letter_country_code',
                    'country':'2_letter_country_code',
                    'billing_country':'2_letter_country_code',
                    'country_name':'2_letter_country_code',
                };
            }else{
                var profile_reset = {
                    'email':'email',
                    'billing_email':'email',
                    'first_name':'first_name',
                    'firstName':'first_name',
                    'middleName':'middle_name',
                    'name' :'first_name',
                    'lastName':'last_name',
                    'last_name':'last_name',
                    'line':'billing_address1',
                    'title':'job_title',
                    'phoneNumbers':'phone',
                    'company':'company',
                    'phone':'phone',
                    'phoneNumber':'billing_phone',
                    'addresses':'street_address',
                    'address':'street_address',
                    'address1':'street_address',
                    'address2':'street_address2',
                    'country':'country_code',
                    'websites':'website_url',
                    'url':'website_url',
                    'state':'state',
                    'zip':'zipcode',
                    'city':'city'
                };
    
            }
          
            var fields = that.fields;

            for(i in fields){
               
               
                //console.log(typeof profile_reset[fields[i].value] !='undefined');
                if(typeof profile_reset[fields[i].value] !='undefined'){
                    
                    var maaped_value = profile_reset[fields[i].value];
                    var bac_mapped_value = maaped_value;
                    maaped_value = maaped_value.replace(/[{}]/g, "");
                    var field_name = fields[i].value;
                    that.fields[i]['preload'] = maaped_value;
                    if(typeof that.trigger.formFields[maaped_value] !='undefined'){
                        if(that.trigger.formFields[maaped_value]){
                            jQuery("li[data-name='"+maaped_value+"']").addClass("hide").hide();
                        }
                        jQuery("li[data-field='"+field_name+"']").removeClass("drag_hide");
                       
                        var mapped_pr_value = '{{'+maaped_value;
                        maaped_value = '{{'+maaped_value+'}}';
                        var field_data = awpNewIntegration.fieldData;
                        var action =awpNewIntegration.action;    
                        var back_mapped_value = maaped_value;
                        fordisplaystored = back_mapped_value.split('}}');
                        var filteredfordisplaystored = fordisplaystored.filter(function (el) {
                        return el != "";
                        });
                        jQuery("input[data-field='"+field_name+"']").parent().find('input').val(maaped_value);
                        jQuery("input[data-field='"+field_name+"']").val(back_mapped_value);
                        field_data[field_name+'dis'] = filteredfordisplaystored;
                        field_data[field_name] = maaped_value;

                    }

                }
            }
            return field;
        },
        say:function(event){
            
            var $this = jQuery('#'+event.target.id);
            var forfieldname = $this.attr('data-name');
            var tomappedfieldname = $this.attr('data-field');
            var field_data = awpNewIntegration.fieldData;
            var already_value = field_data[tomappedfieldname];
            var filteredfordisplaystored = field_data[tomappedfieldname+'dis'];
            var mapped_pr_value = '{{'+forfieldname;
            var maaped_value = '{{'+forfieldname+'}}';
            maaped_value=maaped_value.replace('----',' ');
            mapped_pr_value=mapped_pr_value.replace('----',' ');
            already_value=already_value.replace('----',' ');
            var temp =filteredfordisplaystored.map(function(item,index){
              return item.replace('----',' ');

            });
            filteredfordisplaystored=temp;
            
            // console.log('1111');
            // console.log($this);
            // console.log('2222');
            // console.log(forfieldname);
            // console.log('3333');
            // console.log(tomappedfieldname);
            // console.log('4444');
            // console.log(field_data);
            // console.log('5555');
            // console.log(already_value);
            // console.log('6666');
            // console.log(filteredfordisplaystored);
            // console.log('7777');
            // console.log(mapped_pr_value);
            // console.log('8888');
            // console.log(maaped_value);
            // console.log('9999');
            // console.log(awpNewIntegration.fieldData);
            
            if(tomappedfieldname=='answerQ1' || tomappedfieldname=='answerQ2' || tomappedfieldname=='answerQ3' ){
            	maaped_value='';
            	filteredfordisplaystored=[];
            }else{
	            if(already_value){
	                maaped_value = already_value.replace(maaped_value,'');
	            }
	            if(filteredfordisplaystored){
	                filteredfordisplaystored.remove(mapped_pr_value);
	            }
            }
            field_data[tomappedfieldname] = maaped_value;
            field_data[tomappedfieldname+'dis'] = filteredfordisplaystored;
            awpNewIntegration.fieldData = field_data;
            maaped_value = maaped_value.trim();
            if((maaped_value.length==0)){
                jQuery("input[data-field='"+tomappedfieldname+"']").closest('.form_field_dropable').removeClass('sperse_dropped'); 
            }
        },
        updateFieldValue: function(e) {
            if(this.selected || this.selected == 0) {
                if (this.fielddata[this.field.value] || "0" == this.fielddata[this.field.value]) {
                    this.fielddata[this.field.value] += ' {{' + this.selected + '}}';
                } else {
                    this.fielddata[this.field.value] = '{{' + this.selected + '}}';
                }
                if(this.action.actionProviderId=='sperse' && (this.action.task=='createLead' || this.action.task=="createUser") ){
                    var question = this.trigger.formFields[this.selected];
                    if(this.field.value=='answerQ1'){
                        this.fielddata[this.field.value]=[question,'{{' + this.selected + '}}'];
                    }
                    if(this.field.value=='answerQ2'){
                        this.fielddata[this.field.value]=[question,'{{' + this.selected + '}}'];
                    }
                    if(this.field.value=='answerQ3'){
                        this.fielddata[this.field.value]=[question,'{{' + this.selected + '}}'];
                    }
                }
            }
        },
        inArray: function(needle, haystack) {
             if(haystack){           
            var length = haystack.length;
            for(var i = 0; i < length; i++) {
                if(haystack[i] == needle) return true;
            }}
            return false;
        },
        parseFieldValue:function(item_value){
            item_value = item_value.replace(/[{}]/g, "");
            item_value = item_value.replace(' ','----');
            return item_value;
        },
        parsedFormFieldValue:function(field_value){
            var nfield_value = field_value.replace(/[{}]/g, "");
            nfield_value = nfield_value.replace('----',' ');
            nfield_value =  nfield_value.trim();
            var field_name = this.trigger.formFields[nfield_value];
            var static_or_copy_found='';


            if(typeof field_name == "undefined" && nfield_value.search('copied_') > -1){
                
                
                var crop_index=nfield_value.indexOf('_',7);
                nfield_value=nfield_value.substring(crop_index+1);
                static_or_copy_found='true';
                //first check if we could find it in field_name
                if(typeof this.trigger.formFields[nfield_value] !== 'undefined' || this.trigger.formFields[nfield_value] === null){
                    //yes it's in formfields so we will return this value directly
                    nfield_value=this.trigger.formFields[nfield_value];
                }
                
               
            }

            //special handling for static fields as they are not in the forms
            if(typeof field_name == "undefined" && nfield_value.search('static_') > -1){

                var nfield_value= nfield_value.replace(/_/g,' ');
                nfield_value=nfield_value.replace('static ','');
                static_or_copy_found='true';
                //first check if we could find it in field_name
                if(typeof this.trigger.formFields[nfield_value] !== 'undefined' || this.trigger.formFields[nfield_value] === null){
                    //yes it's in formfields so we will return this value directly
                    nfield_value=this.trigger.formFields[nfield_value];
                }
             
            }
            
            

            if(static_or_copy_found != ''){
                return nfield_value;
            }
            else{
                return field_name;
            }
        },

    },
    updated:function () {
        makedropable(this.fielddata);
    },
    mounted: function() {
        
        setTimeout(function () {
 
          makedropable();
          triggerStaticFieldsWork();
      
        }, 1200);
    },

});


Vue.component('hubspot', {
    props: ["trigger", "action", "fielddata"],
    data: function () {
        return {
            listLoading: false,
            fields: [
                {type: 'text', value: 'email', title: 'Email', task: ['add_contact'], required: true},
                {type: 'text', value: 'firstName', title: 'First Name', task: ['add_contact'], required: false},
                {type: 'text', value: 'lastName', title: 'Last Name', task: ['add_contact'], required: false},
                {type: 'text', value: 'phone', title: 'Phone Number', task: ['add_contact'], required: false},
                {type: 'text', value: 'company', title: 'Company', task: ['add_contact'], required: false},
                {type: 'text', value: 'website', title: 'Website', task: ['add_contact'], required: false},
            ]

        }
    },
    methods: {

           CheckinDatabase:function(item,name){

            var not_match = true;

            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){

                    if(fieldaa[i]){

                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){

                            if(fieldaa[i].length==2){
                                
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }

                        }else{

                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){

                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }

                    }
                 }
                
            }

            return not_match;
        },
    },
    created: function() {

    },
    mounted: function() {
        var that = this;

        
        //reset activeplatformid value when new component mounts
        if(typeof editable_field == 'undefined' && this.fielddata.activePlatformId){
            this.fielddata.activePlatformId='';
        }
        this.fielddata=setComponentFieldData(this.fielddata,this.fields);
    },
    template: '#hubspot-action-template'
});


Vue.component('mailchimp', {
    props: ["trigger", "action", "fielddata"],
    data: function () {
        return {
            listLoading: false,
            fields: [
                {value: 'email', title: 'Email', task: ['subscribe', 'unsubscribe'], required: true},
                {value: 'FNAME', title: 'First Name', task: ['subscribe'], required: false},
                {value: 'LNAME', title: 'Last Name', task: ['subscribe'], required: false}
            ]

        }
    },
    methods: {

        CheckinDatabase:function(item,name){

            var not_match = true;

            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){

                    if(fieldaa[i]){

                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){

                            if(fieldaa[i].length==2){
                                
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }

                        }else{

                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){

                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }

                    }
                 }
                
            }

            return not_match;
        },
        getMailchimpList:function(){
            this.listLoading = true;
            var that = this;
            var listRequestData = {
                'action': 'awp_get_mailchimp_list',
                'platformid':this.fielddata.activePlatformId,
                '_nonce': awp.nonce
            };

            jQuery.post( ajaxurl, listRequestData, function( response ) {
                that.fielddata.list = response.data;
                that.listLoading = false;
            });
        }

    },
    created: function() {

    },
    mounted: function() {
        var that = this;

        
        
        //reset activeplatformid value when new component mounts
        if(typeof editable_field == 'undefined' && this.fielddata.activePlatformId){
            this.fielddata.activePlatformId='';
        }
        this.fielddata=setComponentFieldData(this.fielddata,this.fields);

    },
    template: '#mailchimp-action-template'
});


Vue.component('aweber', {
    props: ["trigger", "action", "fielddata"],
    data: function () {
        return {
            accountLoading: false,
            listLoading: false,
            fields: [
                {value: 'email', title: 'Email', task: ['subscribe', 'unsubscribe'], required: true},
                {value: 'firstName', title: 'First Name', task: ['subscribe'], required: false},
                {value: 'lastName', title: 'Last Name', task: ['subscribe'], required: false}
            ]

        }
    },
    methods: {
        getLists: function() {
            var that = this;
            this.listLoading = true;
            var listData = {
                'action': 'awp_get_aweber_lists',
                '_nonce': awp.nonce,
                'platformid':this.fielddata.activePlatformId,
                'accountId': this.fielddata.accountId,
                'task': this.action.task
            };
            jQuery.post( ajaxurl, listData, function( response ) {
                console.log(response);
                var lists = response.data;
                that.fielddata.lists = lists;
                that.listLoading = false;
            });
        },
        CheckinDatabase:function(item,name){

            var not_match = true;

            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){

                    if(fieldaa[i]){

                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){

                            if(fieldaa[i].length==2){
                                
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }

                        }else{

                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){

                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }

                    }
                 }
                
            }

            return not_match;
        },

        getAweberAccounts:function(){
            this.accountLoading = true;
            var that = this;
            var accountRequestData = {
                'action': 'awp_get_aweber_accounts',
                'platformid':this.fielddata.activePlatformId,
                '_nonce': awp.nonce
            };

            jQuery.post( ajaxurl, accountRequestData, function( response ) {
                console.log(response);
                that.fielddata.accounts = response.data;
                that.accountLoading = false;
            });
        }

    },
    created: function() {

    },
    mounted: function() {
        var that = this;

        
        //reset activeplatformid value when new component mounts
        if(typeof editable_field == 'undefined' && this.fielddata.activePlatformId){
            this.fielddata.activePlatformId='';
        }
        this.fielddata=setComponentFieldData(this.fielddata,this.fields);

    },
    template: '#aweber-action-template'
});


Vue.component('sperse', {
    props: ["trigger", "action", "fielddata"],
    components: {
    "vue-select": VueSelect.VueSelect
    },
    watch: {
        'action.task':{
            handler: function(val, oldVal) {
                //this.foo(); // call it in the context of your component object
            },
            deep: true
        }
        
    },
    data: function () {
        return {
            listLoading: false,
            lisstLoading: false,
            StagesLoading:false,
            tagLoading:false,
            usesLoading: false,
            sperseLoading:false,
            roleLoading:false,
            entryUrl:false,
            referrerUrl:false,
            userAgent:false,
            redirectUrl:false,
            sections:[],
            mappedProducts:[],
            connectAccount: false,
            mappedProductLoading:false,
            // sperseTimeDuration: [{id:'Piece', value:'Lifetime Access'},{id:'Year', value:'Year'},{id:'Month', value:'Month'}],


            fields: [
                {value: 'affiliateCode', title: 'Affiliate Code'       , task: ['createLead','createUser'], required: false },
                {value: 'systemType',    title: 'System Type'       , ztask: ['loginUser'], required: true },
                {value: 'email'        , title: 'Email'                , task: ['createLead','createUser','loginUser'], required: true },
                {value: 'fullName'     , title: 'Full Name'            , task: ['createLead','createUser'], required: false},                
                {value: 'firstName'    , title: 'First Name'           , task: ['createLead','createUser'], required: false},
                {value: 'lastName'     , title: 'Last Name'            , task: ['createLead','createUser'], required: false},
                {value: 'companyName'  , title: 'Company Name'         , task: ['createLead','createUser'], required: false},                
                {value: 'jobTitle'     , title: 'Job Title'            , task: ['createLead','createUser'], required: false},
                {value: 'industry'     , title: 'Industry'             , task: ['createLead','createUser'], required: false},                                
                {value: 'phoneNumber'  , title: 'Phone'                , task: ['createLead','createUser'], required: false},
                {value: 'bankCode'     , title: 'BANKCODE'             , task: ['createLead','createUser'], required: false},
                {value: 'note'         , title: 'Comments'             , task: ['createLead','createUser'], required: false},                
                {value: 'streetAddress', title: 'Street Address'       , task: ['createLead','createUser'], required: false},                
                {value: 'city'         , title: 'City or Town'         , task: ['createLead','createUser'], required: false},                
                {value: 'stateName'    , title: 'State Name'           , task: ['createLead','createUser'], required: false},
                {value: 'stateId'      , title: '2-Letter State Code'  , task: ['createLead','createUser'], required: false},                
                {value: 'countryId'    , title: '2-Letter Country Code', task: ['createLead','createUser'], required: false}, 
                {value: 'zipCode'      , title: 'Zip or Postal Code'   , task: ['createLead','createUser'], required: false},                               
                {value: 'webURL'       , title: 'Your Website URL'     , task: ['createLead','createUser'], required: false},                               
                {value: 'answerQ1'     , title: 'Question1 Answer'     , task: ['createLead','createUser'], required: false},                               
                {value: 'answerQ2'     , title: 'Question2 Answer'     , task: ['createLead','createUser'], required: false},                               
                {value: 'answerQ3'     , title: 'Question3 Answer'     , task: ['createLead','createUser'], required: false},  
                {value: 'password'     , title: 'Password'             , task: ['loginUser' ], required: true }
            ]
        }
    },
    methods: {
        say:function(event){

            var $this = jQuery('#'+event.target.id);
            var forfieldname = $this.attr('data-name');
            var tomappedfieldname = jQuery("li[data-name='"+forfieldname+"']").attr('data-field');
            var field_data = awpNewIntegration.fieldData;
            var already_value = field_data[tomappedfieldname];
            var filteredfordisplaystored = field_data[tomappedfieldname+'dis'];
            var mapped_pr_value = '{{'+forfieldname;
            var maaped_value = '{{'+forfieldname+'}}';
            
           if(tomappedfieldname=='answerQ1' || tomappedfieldname=='answerQ2' || tomappedfieldname=='answerQ3' ){

           		maaped_value='';
           		filteredfordisplaystored=[];
           }else{

	            if(already_value){
	                maaped_value = already_value.replace(maaped_value,'');
	            }
	            if(filteredfordisplaystored){
	                filteredfordisplaystored.remove(mapped_pr_value);
	            }

           }

            field_data[tomappedfieldname] = maaped_value;
            field_data[tomappedfieldname+'dis'] = filteredfordisplaystored;
           awpNewIntegration.fieldData = field_data;
            jQuery("li[data-name='"+forfieldname+"']").css({
                'left':'unset',
                'top' :'unset'
            }); 
            jQuery("li[data-name='"+forfieldname+"']").find('.field-actions').addClass('hide');
            if(!(maaped_value)){
                jQuery("input[data-field='"+tomappedfieldname+"']").closest('.form_field_dropable').removeClass('sperse_dropped'); 
            }
        },
        mountSelect2Box:function(selectvar){
            //used dict to project front-end names of select elements with vue variables 
            var dict={
                "fielddata.list":"list_id",
                "fielddata.stages":"stages_id",
                "fielddata.ausers":"user_id",
                "fielddata.lists":"tags_listing",
                "fielddata.tags":"tag_id",
            };

            // if(dict[selectvar]){
            //     jQuery('select[name="'+dict[selectvar]+'"]').select2();

            //     jQuery('select[name="'+dict[selectvar]+'"]').on('select2:select', function (e) {
               
            //         var data = e.params.data;
                    
            //         jQuery(this).val(data.id);
            //     });
                

            // }
            
            
        },
        removeProductMapping: function(wpProductId,sperseProductCode){
            var that = this;
             var sperse_data = {
                action : 'awp_sperse_mapping_remove',
                '_nonce': awp.nonce,
                
                'id':this.fielddata.sperse_accountId,
                'task': this.action.task,
                wpProductId:wpProductId,
                sperseProductCode:sperseProductCode
            };
            
            jQuery.post( ajaxurl, sperse_data, function( response ) {
                
                response = JSON.parse(response);
                
                alert(response.message);
            });
            
               that.mappedProductLoading = true;
                    var tagRequestData = {
                'action': 'awp_get_mapped_products',
                '_nonce': awp.nonce,
                'id':this.fielddata.sperse_accountId,
            };
           // var that = this;
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                    
                    that.mappedProductLoading = false;
                    that.fielddata.mappedProducts = response.data;
                    // that.sections = response.data;
                     that.sections = (response.data) ? response.data : [];
               // that.productLoading = false;
            });
            
            
        },
        saveProductMapping: function(colIndex,rowIndex) {
                    // console.log(rowIndex);
                    // console.log(colIndex);
                    var that = this;
                    // this.mappedProductLoading = true;
                    var wpProductId = jQuery('#wpProductId'+rowIndex).attr('wpProductId'+rowIndex);
                    var wpProductName = jQuery('#wpProductId'+rowIndex+' .vs__selected').text().trim();
                    var sperseProductCode = jQuery('#sperseProductId'+rowIndex+colIndex).attr('sperseProductId'+rowIndex+colIndex);
                    var sperseProductName = jQuery('#sperseProductId'+rowIndex+colIndex+' .vs__selected').text().trim();
                    // var sperseTimeDurationId = jQuery('#sperseTimeDurationId'+rowIndex+colIndex).attr('sperseTimeDurationId'+rowIndex+colIndex);
                    // var sperseTimeDurationValue = jQuery('#sperseTimeDurationId'+rowIndex+colIndex+' .vs__selected').text().trim();
                    
                    if(!wpProductId){
                        alert("Please Select Worpress Product");
                        return;
                    }
                    if(!sperseProductCode){
                        alert("Please Select Sperse Product");
                        return;
                    }
                    // if(!sperseTimeDurationId){
                    //     alert("Please Select Sperse Product Time Duration");
                    //     return;
                    // }
                    if(wpProductId && sperseProductCode){
                        var sperse_data = {
                            action : 'awp_save_sperse_mapping',
                            '_nonce': awp.nonce,
                            // 'accountId': this.fielddata.accountId,
                            'id':this.fielddata.sperse_accountId,
                            'task': this.action.task,
                            wpProductId:wpProductId,
                            wpProductName:wpProductName,
                            sperseProductCode:sperseProductCode,
                            sperseProductName:sperseProductName,
                            // sperseTimeDurationId:sperseTimeDurationId,
                            // sperseTimeDurationValue:sperseTimeDurationValue
                        };
                        
                        jQuery.post( ajaxurl, sperse_data, function( response ) {
                            response = JSON.parse(response);
                            // that.mappedProductLoading = false;
                            alert(response.message);
                             that.sections.splice(rowIndex, 1);
                            // that.sections[rowIndex].additionals.splice(rowIndex,1);
                            // document.getElementById('dropdown_sperse_account').dispatchEvent(new Event('change'));
                        });
                    }
                    
                    that.mappedProductLoading = true;
                    var tagRequestData = {
                'action': 'awp_get_mapped_products',
                '_nonce': awp.nonce,
                'id':this.fielddata.sperse_accountId,
            };
           // var that = this;
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                   
                    that.mappedProductLoading = false;
                    that.fielddata.mappedProducts = response.data;
                    // that.sections = response.data;
                     that.sections = (response.data) ? response.data : [];
               
            });
                    
                },

        removeSperseElement: function(rowIndex,index) {
            this.sections[rowIndex].sperseProducts.splice(index,1);
        },  
        removeElement: function(index) {
            // this.rows.splice(index, 1);
            this.sections.splice(index, 1);
        },
        addRow:function(event){
            
             this.sections.push({
                wpProduct: '',
                sperseProducts: []
                // additionals: []
            })
            
        },
        addNewItem:function(id){
            
            this.sections[id].sperseProducts.push({
                sperseProduct: ''
            });
            
            
            
        },
        saveNewItem: function(id){
            
            var productsValidation = false;
            if(this.sections[id].wpProduct == '' || this.sections[id].wpProduct == null){
                
                jQuery('#wpProductRow'+[id]).after("<span style='color:red'>This field is required.</span>");
                productsValidation = true;
                
            }else{
                
                jQuery('#wpProductRow'+[id]).next().remove();
                
                if(this.sections[id].sperseProducts.length === 0){
                    jQuery('.mapAndSaveBtns').after("<span style='color:red'>This field is required.</span>");
                    productsValidation = true;
                }else{
                     
                     jQuery('.mapAndSaveBtns').next().remove();
                    
                    jQuery.each(this.sections[id].sperseProducts, function(index, item) {
                        
                        if(item.sperseProduct == '' || item.sperseProduct == null){
                            jQuery('#sperseProductCol'+[id]+index).after("<span style='color:red'>This field is required.</span>");
                            productsValidation = true;
                        }else{
                             productsValidation = false;
                             jQuery('#sperseProductCol'+[id]+index).next().remove();
                        }  
                    });
                    
                    // if(this.sections[id].sperseProducts[0].sperseProduct != ''){
                        
                    // }else{
                    //      jQuery('#sperseProductCol'+[id]+'0').after("<span style='color:red'>This field is required.</span>");
                    // }    
                }
                
            }
            
            Array.prototype.unique = function() {
                var a = this.concat();
                for(var i=0; i<a.length; ++i) {
                    for(var j=i+1; j<a.length; ++j) {
                        if(a[i] === a[j])
                            a.splice(j--, 1);
                    }
                }
            
                return a;
            };
            if(!productsValidation){ 
              
              var sperse_data = {
                            action : 'awp_save_sperse_mapping',
                            '_nonce': awp.nonce,
                            // 'accountId': this.fielddata.accountId,
                            'id':this.fielddata.sperse_accountId,
                            'task': this.action.task,
                            'productMappingObj': JSON.stringify(this.sections.concat(this.fielddata.mappedProducts).unique().filter(n => n))
                            // sperseTimeDurationId:sperseTimeDurationId,
                            // sperseTimeDurationValue:sperseTimeDurationValue
                        };
                        
                        jQuery.post( ajaxurl, sperse_data, function( response ) {
                            response = JSON.parse(response);
                            // that.mappedProductLoading = false;
                            alert(response.message);
                            //  this.sections = ;
                            // that.sections[rowIndex].additionals.splice(rowIndex,1);
                            // document.getElementById('dropdown_sperse_account').dispatchEvent(new Event('change'));
                        });
              
            }
             
        },
        parseFieldValue:function(item_value){
            item_value = item_value.replace(/[{}]/g, "");
            return item_value;
        },
        CheckinDatabase:function(item,name){


            var not_match = true;

            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){

                    if(fieldaa[i]){

                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){

                            if(fieldaa[i].length==2){
                                
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }

                        }else{

                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){

                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }

                    }
                 }
                
            }

            return not_match;
        },
        getLists: function() {
            var that = this;
            this.listLoading = true;
            var listData = {
                'action': 'awp_get_sperse_lists',
                '_nonce': awp.nonce,
                'accountId': this.fielddata.accountId,
                'task': this.action.task
            };
            jQuery.post( ajaxurl, listData, function( response ) {
                // var lists = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.lists = data;
                // that.fielddata.lists = lists;
                that.listLoading = false;
            });
        },
        getWpProducts: function() {
            var that = this;
            // this.listLoading = true;
            var listData = {
                'action': 'awp_get_sperse_wpproducts',
                '_nonce': awp.nonce,
                // 'accountId': this.fielddata.accountId,
                'task': this.action.task
            };
            jQuery.post( ajaxurl, listData, function( response ) {
                var lists = response.data;
                that.fielddata.wpproducts = lists;
                // that.listLoading = false;
            });  
        },
        setPMId:function(event,id){
            jQuery(('#'+id)).attr(id, event);
        },
        increaseCount:function(event){
            
            var that = this;
            that.fielddata.list = [];
            that.connectAccount = false;
            
            var sperse_account_id = event; 
	        this.listLoading = true;
	        var listRequestData = {
	            'action': 'awp_get_sperse_list',
	            '_nonce': awp.nonce,
	            'id':sperse_account_id
	        };
	        jQuery.post( ajaxurl, listRequestData, function( response ) {
	            
	           let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.list = data;
	            that.listLoading = false;
	            that.connectAccount = true;
                that.mountSelect2Box('fielddata.list');
	        });
	        this.StagesLoading = true;
	        var stagesRequestData = {
	            'action': 'awp_get_sperse_stages',
	            '_nonce': awp.nonce,
	            'id':sperse_account_id,
	            'groupId':(that.fielddata.listId) ? that.fielddata.listId : 'C'
	        };
	        jQuery.post( ajaxurl, stagesRequestData, function( response ) {
	           // that.fielddata.stages = response.data;
	           let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                //console.log(data);
                that.fielddata.stages = data;
	            that.StagesLoading = false;
                that.mountSelect2Box('fielddata.stages');
	        });
	        
	        this.tagLoading = true;
	        var tagRequestData = {
	            'action': 'awp_get_sperse_tags',
	            '_nonce': awp.nonce,
	            'id':sperse_account_id
	        };
	        jQuery.post( ajaxurl, tagRequestData, function( response ) {
	           // that.fielddata.tags = response.data;
	            let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.tags = data;
	            that.tagLoading = false;
                that.mountSelect2Box('fielddata.tags');
	        });

	        this.lisstLoading = true;
	        var listsRequestData = {
	            'action': 'awp_get_sperse_lists',
	            '_nonce': awp.nonce,
	            'id':sperse_account_id
	        };
	        jQuery.post( ajaxurl, listsRequestData, function( response ) {
	           // that.fielddata.lists = response.data;
	           // that.lisstLoading = false;
	           let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.lists = data;
                that.lisstLoading = false;
                that.mountSelect2Box('fielddata.lists');
	        });

	        this.usesLoading = true;
	        var UsersRequestData = {
	            'action': 'awp_get_sperse_ausers',
	            '_nonce': awp.nonce,
	            'id': sperse_account_id
	        };
	        jQuery.post( ajaxurl, UsersRequestData, function( response ) {
	           // that.fielddata.ausers = response.data;
	           let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.ausers = data;
	            that.usesLoading = false;
                that.mountSelect2Box('fielddata.ausers');
	        });

            this.productLoading = true;
            var tagRequestData = {
                'action': 'awp_get_sperse_products',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                console.log(response);
                if(response.data.result != undefined){
                    that.fielddata.sperseProducts = response.data.result;
                    that.productLoading = false;
                    that.mountSelect2Box('fielddata.sperseProducts');
                }
            });

            this.mappedProductLoading = true;
            var tagRequestData = {
                'action': 'awp_get_mapped_products',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                that.fielddata.mappedProducts = response.data;
                that.sections = (response.data) ? response.data : [];
                that.mappedProductLoading = false;
               // that.productLoading = false;
            });


                this.roleLoading = true;
                var rolesRequestData = {
                    'action': 'awp_get_sperse_roles',
                    '_nonce': awp.nonce,
                };
                if(!(typeof integration_id === "undefined")){
                    rolesRequestData['id']=integration_id;
                }

                jQuery.post( ajaxurl, rolesRequestData, function( response ) {
                    
                    let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.roles = data;
                    that.roleLoading = false;
                });

        },
        changeContactGroup:function(event){
             var that = this;
            // var sperse_contact_group = event.target.value;
            if(jQuery('.selectedStagesClassW button').attr('title') == 'Clear Selected') { jQuery('.selectedStagesClassW button').click(); }
            var sperse_contact_group = event; 
            this.StagesLoading = true;

            that.fielddata.stages =[];
              var stagesRequestData = {
                'action': 'awp_get_sperse_stages',
                '_nonce': awp.nonce,
                'id':this.fielddata.sperse_accountId,
                'groupId':sperse_contact_group
            };   
            jQuery.post( ajaxurl, stagesRequestData, function( response ) { 
                // that.fielddata.stages = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                 //console.log(data);
                that.fielddata.stages = data;
                that.StagesLoading = false;
                that.mountSelect2Box('fielddata.stages');
            });
            this.tagLoading = true;
            var tagRequestData = {
                'action': 'awp_get_sperse_tags',
                '_nonce': awp.nonce,
                'id':this.fielddata.sperse_accountId,
                'groupId':sperse_contact_group
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                // that.fielddata.tags = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.tags = data;
                that.tagLoading = false;
                that.mountSelect2Box('fielddata.tags');
            });

            this.lisstLoading = true;
            var listsRequestData = {
                'action': 'awp_get_sperse_lists',
                '_nonce': awp.nonce,
                'id':this.fielddata.sperse_accountId,
                'groupId':sperse_contact_group

            };
            jQuery.post( ajaxurl, listsRequestData, function( response ) {
                // that.fielddata.lists = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.lists = data;
                that.lisstLoading = false;
                that.mountSelect2Box('fielddata.lists');
            });

            this.usesLoading = true;
            var UsersRequestData = {
                'action': 'awp_get_sperse_ausers',
                '_nonce': awp.nonce,
                'id': this.fielddata.sperse_accountId,
                'groupId':sperse_contact_group

            };
            jQuery.post( ajaxurl, UsersRequestData, function( response ) {
                // that.fielddata.ausers = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.ausers = data;
                that.usesLoading = false;
                that.mountSelect2Box('fielddata.ausers');
            });
            
        },
        triggerAssignmentData:function(){
            var that = this;
            var sperse_account_id=this.fielddata.activePlatformId;
            this.listLoading = true;
            var listRequestData = {
                'action': 'awp_get_sperse_list',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, listRequestData, function( response ) {
                
               let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.list = data;
                that.listLoading = false;
                that.connectAccount = true;
                that.mountSelect2Box('fielddata.list');
            });
            this.StagesLoading = true;
            var stagesRequestData = {
                'action': 'awp_get_sperse_stages',
                '_nonce': awp.nonce,
                'id':sperse_account_id,
                'groupId':(that.fielddata.listId) ? that.fielddata.listId : 'C'
            };
            jQuery.post( ajaxurl, stagesRequestData, function( response ) {
               // that.fielddata.stages = response.data;
               let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                //console.log(data);
                that.fielddata.stages = data;
                that.StagesLoading = false;
                that.mountSelect2Box('fielddata.stages');
            });
            
            this.tagLoading = true;
            var tagRequestData = {
                'action': 'awp_get_sperse_tags',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
               // that.fielddata.tags = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.tags = data;
                that.tagLoading = false;
                that.mountSelect2Box('fielddata.tags');
            });

            this.lisstLoading = true;
            var listsRequestData = {
                'action': 'awp_get_sperse_lists',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, listsRequestData, function( response ) {
               // that.fielddata.lists = response.data;
               // that.lisstLoading = false;
               let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.lists = data;
                that.lisstLoading = false;
                that.mountSelect2Box('fielddata.lists');
            });

            this.usesLoading = true;
            var UsersRequestData = {
                'action': 'awp_get_sperse_ausers',
                '_nonce': awp.nonce,
                'id': sperse_account_id
            };
            jQuery.post( ajaxurl, UsersRequestData, function( response ) {
               // that.fielddata.ausers = response.data;
               let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.ausers = data;
                that.usesLoading = false;
                that.mountSelect2Box('fielddata.ausers');
            });

            this.productLoading = true;
            var tagRequestData = {
                'action': 'awp_get_sperse_products',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                console.log(response);
                if(response.data.result != undefined){
                    that.fielddata.sperseProducts = response.data.result;
                    that.productLoading = false;
                    that.mountSelect2Box('fielddata.sperseProducts');
                }
            });

            this.mappedProductLoading = true;
            var tagRequestData = {
                'action': 'awp_get_mapped_products',
                '_nonce': awp.nonce,
                'id':sperse_account_id
            };
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                that.fielddata.mappedProducts = response.data;
                that.sections = (response.data) ? response.data : [];
                that.mappedProductLoading = false;
               // that.productLoading = false;
            });


                this.roleLoading = true;
                var rolesRequestData = {
                    'action': 'awp_get_sperse_roles',
                    '_nonce': awp.nonce,
                };
                if(!(typeof integration_id === "undefined")){
                    rolesRequestData['id']=integration_id;
                }

                jQuery.post( ajaxurl, rolesRequestData, function( response ) {
                    
                    let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.roles = data;
                    that.roleLoading = false;
                });
        },
    },
    beforeMount: function() {
        this.getWpProducts();
    },
    updated:function () {
        makedropable();
      
    },
    created: function() {
        //console.log('hit');
    },

    mounted: function() {
        var that = this;
        if (typeof this.fielddata.systemType    == 'undefined') { this.fielddata.systemType    = ''; }
        if (typeof this.fielddata.affiliate_code    == 'undefined') { this.fielddata.affiliate_code    = ''; }  

        if (typeof this.fielddata.entryUrl    == 'undefined') { this.fielddata.entryUrl    = awp.entryUrl; }
        if (typeof this.fielddata.referrerUrl    == 'undefined') { this.fielddata.referrerUrl    = awp.referrerUrl; }   
        if (typeof this.fielddata.userAgent    == 'undefined') { this.fielddata.userAgent    = awp.userAgent; }
        if (typeof this.fielddata.redirectUrl    == 'undefined') { this.fielddata.redirectUrl    = awp.redirectUrl; }
        
        if (typeof this.fielddata.email         == 'undefined') { this.fielddata.email         = ''; }
        if (typeof this.fielddata.fullName      == 'undefined') { this.fielddata.fullName      = ''; }
        if (typeof this.fielddata.firstName     == 'undefined') { this.fielddata.firstName     = ''; }
        if (typeof this.fielddata.lastName      == 'undefined') { this.fielddata.lastName      = ''; }
        if (typeof this.fielddata.companyName   == 'undefined') { this.fielddata.companyName   = ''; }
        if (typeof this.fielddata.jobTitle      == 'undefined') { this.fielddata.jobTitle      = ''; }
        if (typeof this.fielddata.industry      == 'undefined') { this.fielddata.industry      = ''; }
        if (typeof this.fielddata.phoneNumber   == 'undefined') { this.fielddata.phoneNumber   = ''; }
        if (typeof this.fielddata.bankCode      == 'undefined') { this.fielddata.bankCode      = ''; }
        if (typeof this.fielddata.password      == 'undefined') { this.fielddata.password      = ''; }
        if (typeof this.fielddata.note          == 'undefined') { this.fielddata.note          = ''; }
        if (typeof this.fielddata.streetAddress == 'undefined') { this.fielddata.streetAddress = ''; }
        if (typeof this.fielddata.city          == 'undefined') { this.fielddata.city          = ''; }
        if (typeof this.fielddata.stateName     == 'undefined') { this.fielddata.stateName     = ''; }
        if (typeof this.fielddata.stateId       == 'undefined') { this.fielddata.stateId       = ''; }
        if (typeof this.fielddata.countryId     == 'undefined') { this.fielddata.countryId     = ''; }
        if (typeof this.fielddata.zipCode       == 'undefined') { this.fielddata.zipCode       = ''; }
        if (typeof this.fielddata.webURL        == 'undefined') { this.fielddata.webURL        = ''; }        
        if (typeof this.fielddata.answerQ1      == 'undefined') { this.fielddata.answerQ1      = ''; }        
        if (typeof this.fielddata.answerQ2      == 'undefined') { this.fielddata.answerQ2      = ''; }        
        if (typeof this.fielddata.answerQ3      == 'undefined') { this.fielddata.answerQ3      = ''; }       
        //reset activeplatformid value when new component mounts
        if(typeof editable_field == 'undefined' && this.fielddata.activePlatformId){
            this.fielddata.activePlatformId='';
        }
        this.fielddata=setComponentFieldData(this.fielddata,this.fields);
        this.sperseLoading = true;
        var SperseRequestData = {
            'action': 'awp_get_sperse_account',
            '_nonce': awp.nonce,
        };

        if(typeof editable_field != 'undefined'){
            jQuery.post( ajaxurl, SperseRequestData, function( response ) {
                that.fielddata.sperseAccounts = response.data;
                that.sperseLoading = false;
            });    
        }
        

        this.listLoading = true;
        var listRequestData = {
            'action': 'awp_get_sperse_list',
            '_nonce': awp.nonce,
        };

        if(!(typeof integration_id === "undefined") ){
        	listRequestData['id']=integration_id;
        }

        if(typeof editable_field != 'undefined'){
            jQuery.post( ajaxurl, listRequestData, function( response ) {
                // that.fielddata.list = response.data;
                let data = [];
                let lists = response.data;
                for (var key in lists) {
                    if (lists.hasOwnProperty(key)) {
                        data.push({id: key, name: lists[key]});
                    }
                }
                that.fielddata.list = data;
                that.listLoading = false;
            });

        }
        


        this.StagesLoading = true;
        var stagesRequestData = {
            'action': 'awp_get_sperse_stages',
            '_nonce': awp.nonce,
            'groupId':(that.fielddata.listId) ? that.fielddata.listId : 'C'
        };

        if(!(typeof integration_id === "undefined")){
        	stagesRequestData['id']=integration_id;
        }

        if(typeof editable_field != 'undefined'){
            jQuery.post( ajaxurl, stagesRequestData, function( response ) {
                // that.fielddata.stages = response.data;
                let data = [];
                    let lists = response.data;
                    for (var key in lists) {
                        if (lists.hasOwnProperty(key)) {
                            data.push({id: key, name: lists[key]});
                        }
                    }
                     //console.log(data);
                    that.fielddata.stages = data;
                that.StagesLoading = false;
                that.mountSelect2Box('fielddata.stages');
            });
        }
        
        
        this.tagLoading = true;
        var tagRequestData = {
            'action': 'awp_get_sperse_tags',
            '_nonce': awp.nonce,
        };

        if(!(typeof integration_id === "undefined")){
        	tagRequestData['id']=integration_id;
        }

        if(typeof editable_field != 'undefined'){
            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                // that.fielddata.tags = response.data;
                let data = [];
                    let lists = response.data;
                    for (var key in lists) {
                        if (lists.hasOwnProperty(key)) {
                            data.push({id: key, name: lists[key]});
                        }
                    }
                    that.fielddata.tags = data;
                that.tagLoading = false;
                that.mountSelect2Box('fielddata.tags');
            });

        }
        

        this.lisstLoading = true;
        var listsRequestData = {
            'action': 'awp_get_sperse_lists',
            '_nonce': awp.nonce,
        };
        if(!(typeof integration_id === "undefined")){
        	listsRequestData['id']=integration_id;
        }
        if(typeof editable_field != 'undefined'){

            jQuery.post( ajaxurl, listsRequestData, function( response ) {
                // that.fielddata.lists = response.data;
                let data = [];
                    let lists = response.data;
                    for (var key in lists) {
                        if (lists.hasOwnProperty(key)) {
                            data.push({id: key, name: lists[key]});
                        }
                    }
                    that.fielddata.lists = data;
                that.lisstLoading = false;
                that.mountSelect2Box('fielddata.lists');
            });

        }
        
   

        this.roleLoading = true;
        var rolesRequestData = {
            'action': 'awp_get_sperse_roles',
            '_nonce': awp.nonce,
        };
        if(!(typeof integration_id === "undefined")){
            rolesRequestData['id']=integration_id;
        }
        

        if(typeof editable_field != 'undefined'){
            jQuery.post( ajaxurl, rolesRequestData, function( response ) {
          
                let data = [];
                    let lists = response.data;
                    for (var key in lists) {
                        if (lists.hasOwnProperty(key)) {
                            data.push({id: key, name: lists[key]});
                        }
                    }
                that.fielddata.roles = data;
                that.roleLoading = false;
            });

        }
        


        this.usesLoading = true;
        var UsersRequestData = {
            'action': 'awp_get_sperse_ausers',
            '_nonce': awp.nonce,
        };
        if(!(typeof integration_id === "undefined")){
        	UsersRequestData['id']=integration_id;
        }
        if(typeof editable_field != 'undefined'){

            jQuery.post( ajaxurl, UsersRequestData, function( response ) {
                // that.fielddata.ausers = response.data;
                let data = [];
                    let lists = response.data;
                    for (var key in lists) {
                        if (lists.hasOwnProperty(key)) {
                            data.push({id: key, name: lists[key]});
                        }
                    }
                    that.fielddata.ausers = data;
                that.usesLoading = false;
                that.mountSelect2Box('fielddata.ausers');
            });

        }
        

        // this.productLoading = true;
        // var tagRequestData = {
        //     'action': 'awp_get_sperse_products',
        //     '_nonce': awp.nonce,
        //   // 'id':1
        // };
        // if(!(typeof integration_id === "undefined")){
        // tagRequestData['id']=integration_id;
        // }
        // jQuery.post( ajaxurl, tagRequestData, function( response ) {
        //     console.log(response);
        //         console.log(response.data.result);
        //     that.fielddata.sperseProducts = response.data.result;
        //     that.productLoading = false;
        // });

        this.mappedProductLoading = true;
            var tagRequestData = {
                'action': 'awp_get_mapped_products',
                '_nonce': awp.nonce
            };
            if(!(typeof integration_id === "undefined")){
            tagRequestData['id']=integration_id;
        }
        if(typeof editable_field != 'undefined'){

            jQuery.post( ajaxurl, tagRequestData, function( response ) {
                that.fielddata.mappedProducts = response.data;
                 that.sections = (response.data) ? response.data : [];
                that.mappedProductLoading = false;
               // that.productLoading = false;
            });

        }
        


        //added by faizan
        this.fielddata.inviteOptions=[{'id': 'false', 'name': 'false'},{'id': 'true', 'name': 'true'}];
        //end faizan

    },
    template: '#sperse-action-template'
});



    Vue.component('cl-main', {
    props: ["trigger", "action", "fielddata"],
    template: '#cl-main-template',
    data: function() {
        return{}
    },
    methods: {
        clAddCondition: function(event) {
            var conditionL = awpNewIntegration.action.cl.conditions.length;
            awpNewIntegration.action.cl.conditions.push({id: conditionL+1, field: "", operator: "equal_to", value: ""});
        }
    }
});

Vue.component('conditional-logic', {
    props: ["trigger", "action", "fielddata", "condition"],
    template: '#conditional-logic-template',
    data: function() {
        return{}
    },
    methods: {
        clRemoveCondition: function(condition) {
            const conditionIndex = awpNewIntegration.action.cl.conditions.indexOf(condition);
            awpNewIntegration.action.cl.conditions.splice(conditionIndex, 1);
        }
    }
});

var awpNewIntegration;
if(document.getElementById("awp-new-integration")){
    awpNewIntegration = new Vue({
        el: '#awp-new-integration',
        components: {
        "vue-select": VueSelect.VueSelect
        },
        data: {
            trigger: {
                integrationTitle: '',
                formProviderId: '',
                forms: [],
                formId: '',
                formName: '',
                formFields: [],
                backupformFields: [],
                totalForms:'',
            },
            formValidated: 0,
            actionValidated: 0,
            
            action: {
                actionProviderId: '',
                task: '',
                cl: {
                    active: "no",
                    match: "any",
                    conditions: []
                },
                tasks: [],
                paltformConnected: 'loading',
                accountList:{},
                platformList:[],
                formProviderList:[],
            },
            formLoading: false,
            fieldLoading: false,
            actionLoading: false,
            functionLoading: false,
            fieldData: {},
            

        },
        methods: {
            
            getAllFormProviders: function(){
                this.formLoading=true;
                var platformAccountsRequestDat2a = {
                    'action': 'awp_get_allFormProviders',
                    '_nonce': awp.nonce,
                };
                var that = this;
              jQuery.post( ajaxurl, platformAccountsRequestDat2a, function( response ) {   
                console.log(response);                 
                that.formLoading=false;
                data = response.data;
                data = data.sort(function(a, b) {
                    //var textA = a.id.toUpperCase();
                    //var textB = b.id.toUpperCase();
                    var textA = a.disable;
                    var textB = b.disable;

                    //return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                    return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                });
                  awpNewIntegration.action.formProviderList = data;
                    
                });
            },
            getAllPlatforms: function(){
                var platformAccountsRequestDat1a = {
                    'action': 'awp_get_actionProviders',
                    '_nonce': awp.nonce,
                };
                jQuery.post( ajaxurl, platformAccountsRequestDat1a, function( response ) {   
                    console.log(response);                 
                    data = response.data;
                    data = data.sort(function(a, b) {
                        //var textA = a.id.toUpperCase();
                        //var textB = b.id.toUpperCase();
                        var textA = a.disable;
                        var textB = b.disable;

                        //return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                        return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                    });
                    awpNewIntegration.action.platformList = data;
                });
            },
            saveIntegration: function(event) {
                event.preventDefault();
                var submissionData = {
                    'action': 'awp_save_integration',
                    'nonce': awp.nonce,
                    'formData': jQuery('#new-integration').serialize(),
                    'triggerData': this.trigger,
                    'actionData': this.action,
                    'fieldData': JSON.stringify(this.fieldData)
                }
                //console.log(this.fieldData);
                //console.log(jQuery('#new-integration').serialize());
                //console.log(this.trigger);
                //console.log(this.action);
                //console.log( JSON.stringify(this.fieldData));
                params = new URLSearchParams(window.location.search);
                if(window.isSibling){
                    submissionData['willHaveSibling']=true;
                }
                if(params.has('parent_id')){
                    submissionData['parentID']=params.get('parent_id');
                }
              
                jQuery.post( ajaxurl, submissionData, function( response ) {
                    console.log(response);
                    
                    if(typeof response != 'object'){
                        response= JSON.parse(response);
                    }

                    // for ultimate version start
                        window.location.href = response.redirectUrl;
                    // for ultimate version end

                    // for limited version start (disable ultimate version condition first)
                        // if(response.success){
                        //     window.location.href = awp.list_url;
                        // }
                        // else{

                        //     alert(response.msg);
                        //     window.location.href = awp.licenseUrl;
                        // }
                    // for limited version end
                });
                

                
            },
            changeFormProvider: function(event) {
                this.formValidated  = 1;
                awpNewIntegration.formLoading = true;
                this.trigger.formId = '';
                
                if(this.trigger.formProviderId == '') {
                    awpNewIntegration.trigger.forms = [];
                    awpNewIntegration.formValidated = 0;
                    awpNewIntegration.formLoading = false;
                }
                var formProviderData = {
                    'action': 'awp_get_forms',
                    'nonce': awp.nonce,
                    'formProviderId': this.trigger.formProviderId
                };

                jQuery.post( ajaxurl, formProviderData, function( response ) {
                    var forms = response.data;
                    if(Object.keys(forms).length>0){
                        var sortable = [];
                        for (var form in forms) {
                            sortable.push({t:forms[form],o:form});
                        }
                        sortable.sort(function (o1, o2) { return o1.t.toUpperCase() > o2.t.toUpperCase() ? 1 : o1.t.toUpperCase() < o2.t.toUpperCase() ? -1 : 0; });  
                        var sortable2 = sortable;
                        var new_check_array = [];
                        var new_check_array2 = {};
                        for(var i=0;i<sortable2.length;i++){
                            new_check_array2[' '+sortable2[i].o] = sortable2[i].t;
                        }
                        awpNewIntegration.trigger.forms         = new_check_array2;
                        awpNewIntegration.trigger.totalForms = Object.keys(forms).length;
                    }else{
                        awpNewIntegration.trigger.forms         = forms;
                        awpNewIntegration.trigger.totalForms =forms.length;
                    }
                    let data=[];
                    let formsn = forms;
                    for (var key in formsn) {
                        if (formsn.hasOwnProperty(key)) {
                            
                            data.push({id: key, name: formsn[key]});
                        }
                    }
                    awpNewIntegration.trigger.forms           = data;
                    awpNewIntegration.formValidated = 0;
                    awpNewIntegration.formLoading = false;
                    if(Object.keys(forms).length==1){
                        awpNewIntegration.trigger.formId = Object.keys(forms)[0];
                        awpNewIntegration.changedForm(jQuery("#form_default"));
                    }
                    jQuery("#ActionTaskList").trigger('change');

                    
                });
            },
            changeFormProvider1: function(event,defaultForm) {
                this.formValidated  = 1;
                awpNewIntegration.formLoading = true;
                this.trigger.formId = '';
                
                if(this.trigger.formProviderId == '') {
                    awpNewIntegration.trigger.forms = [];
                    awpNewIntegration.formValidated = 0;
                    awpNewIntegration.formLoading = false;
                }
                var formProviderData = {
                    'action': 'awp_get_forms',
                    'nonce': awp.nonce,
                    'formProviderId': this.trigger.formProviderId
                };

                jQuery.post( ajaxurl, formProviderData, function( response ) {
                    var forms = response.data;
                    if(Object.keys(forms).length>0){
                        var sortable = [];
                        for (var form in forms) {
                            sortable.push({t:forms[form],o:form});
                        }
                        sortable.sort(function (o1, o2) { return o1.t.toUpperCase() > o2.t.toUpperCase() ? 1 : o1.t.toUpperCase() < o2.t.toUpperCase() ? -1 : 0; });  
                        var sortable2 = sortable;
                        var new_check_array = [];
                        var new_check_array2 = {};
                        for(var i=0;i<sortable2.length;i++){
                            new_check_array2[' '+sortable2[i].o] = sortable2[i].t;
                        }
                        awpNewIntegration.trigger.forms         = new_check_array2;
                        awpNewIntegration.trigger.totalForms = Object.keys(forms).length;
                    }else{
                        awpNewIntegration.trigger.forms         = forms;
                        awpNewIntegration.trigger.totalForms =forms.length;
                    }
                    let data=[];
                    let formsn = forms;
                    for (var key in formsn) {
                        if (formsn.hasOwnProperty(key)) {
                            
                            data.push({id: key, name: formsn[key]});
                        }
                    }
                    awpNewIntegration.trigger.forms           = data;
                    awpNewIntegration.formValidated = 0;
                    awpNewIntegration.formLoading = false;
                    if(Object.keys(forms).length==1){
                        awpNewIntegration.trigger.formId = Object.keys(forms)[0];
                        awpNewIntegration.changedForm(jQuery("#form_default"));
                    }
                    jQuery("#ActionTaskList").trigger('change');

                    if(typeof defaultForm !== 'undefined'  && defaultForm !=''){
                        awpNewIntegration.trigger.formId=defaultForm;
                  
                        awpNewIntegration.formValidated=2;
                    }
                    else{
                        awpNewIntegration.formValidated=0;
                    }
                });
            },
            enable_search_form_fields:function(){
                //console.log(jQuery('.sperse_reverse_draggable').length>0 && !(jQuery('.form_fields .filter-input-wrap').length>0));
                if(jQuery('.sperse_reverse_draggable').length>0 && !(jQuery('.form_fields .filter-input-wrap').length>0)) {
                    jQuery('.form_fields ul').before("<div class='filter-input-wrap'><input class='filter-input' placeholder='Type here to search by field name in your source form'></input></div>");
                    
                    function filter(filter, query) {
                        query = jQuery.trim(query);
                        jQuery(filter).each(function () {
                        (jQuery(this).text().search(new RegExp(query, "i")) < 0) ? jQuery(this).hide().removeClass('name') :
                        jQuery(this).show().addClass('name');
                            });
                        }
                        
                    jQuery('.filter-input').on('input', function (event) {
                        if (event.keyCode == 27 || jQuery(this).val() == '') {
                        jQuery(this).val('');
                        jQuery('.form_fields li').removeClass('name').show().addClass('name');
                        }
                        else {
                        filter('.form_fields li', jQuery(this).val());
                        }
                    });
                }

            },

            changeActiontask:function(event){
               // console.log(event);
               // jQuery(document).resize();
               // makedropable();

            },
             cleanObj:function(obj) {
              for (var propName in obj) {
            
                if (obj[propName] ==="" || obj[propName] === null || obj[propName] === undefined) {
                  delete obj[propName];
                }
              }
              return obj
            },
            changedForm: function(event) {

                awpNewIntegration.fieldLoading = true;
                var formData = {
                    'action': 'awp_get_form_fields',
                    'formProviderId': this.trigger.formProviderId,
                    'nonce': awp.nonce,
                    'formId': this.trigger.formId
                };
                //console.log(formData);
                jQuery.post( ajaxurl, formData, function( response ) {
                   // console.log(response);
                    var fields             = response.data;
                    var cleanobj =  awpNewIntegration.cleanObj(fields);
                    awpNewIntegration.trigger.formFields = cleanobj;
                    awpNewIntegration.trigger.backupformFields = cleanobj;
                    awpNewIntegration.fieldLoading = false;
                    awpNewIntegration.checkDroppedFields();

                    
                    
                });

            },
            checkDroppedFields:function(){

                if(Object.keys(this.fieldData).length>0 ){
                    var field_data = this.fieldData;
                    var formfields = awpNewIntegration.trigger.backupformFields;
                    for(i in field_data){

                            if(!(field_data[i]=="")){
                                

                                if(typeof field_data[i] != 'undefined'){

                                                                    if(!(typeof field_data[i] === 'object')){

                                    var fielddata_i = field_data[i];
                                    if(Array.isArray(fielddata_i)){
                                        fielddata_i = fielddata_i[0];
                                    }
                                    var res= fielddata_i.match(/{{/g);
                                    if(res){
                                        jQuery('.sperse_inner').find("li[data-field='"+i+"']").remove();
                                        jQuery('.form_field_dropable').removeClass('sperse_dropped');
                                        field_data[i]='';
                                    }
                                }
                                }
                            }
                    }

                awpNewIntegration.fieldData = field_data;

                }

                if(awpNewIntegration.action.task){
                    setTimeout(function(){ 
                        makedropable();
                       awpNewIntegration.enable_search_form_fields();

                    }, 550);

                        
                    }



            },
            changeActionProvider: function(event) {

                this.actionValidated  = 1;
                awpNewIntegration.actionLoading = true;
                this.action.task = '';
                if(this.actionProviderId == '') {
                    awpNewIntegration.action.tasks = '';
                    awpNewIntegration.actionValidated = 0;
                    awpNewIntegration.actionLoading = false;
                }

                var actionProviderData = {
                    'action': 'awp_get_tasks',
                    'nonce': awp.nonce,
                    'actionProviderId': this.action.actionProviderId
                };

                jQuery.post( ajaxurl, actionProviderData, function( response ) {
                        let dataN = [];
                        let tasks = response.data;
                        for (var key in tasks) {
                            if (tasks.hasOwnProperty(key)) {
                                dataN.push({id: key, name: tasks[key]});
                            }
                        }
                        awpNewIntegration.action.tasks = dataN;
                        awpNewIntegration.actionValidated = 0;
                        awpNewIntegration.actionLoading = false;
                        if(Object.keys(response.data).length>0){
                            awpNewIntegration.action.task = Object.keys(response.data)[0];
                            console.log(awpNewIntegration.trigger.formProviderId && !(awpNewIntegration.trigger.formId) );
                            if((awpNewIntegration.trigger.formProviderId) && !(awpNewIntegration.trigger.formId) ){
                                awpNewIntegration.changedForm(jQuery("#form_default"));
                            }
                        }
                });




                awpNewIntegration.action.paltformConnected='loading';
                awpNewIntegration.action.accountList={};

                
                // temp variable is used because googlesheets and googlecalendar shares same table so currently both the data are saved under googlesheets name
                var tempActionProviderId;
                if(this.action.actionProviderId == 'googlecalendar'){
                    tempActionProviderId ='googlesheets';
                }
                else{
                    tempActionProviderId =this.action.actionProviderId;
                }
                var platformAccountsRequestData = {
                    'action': 'awp_get_platform_accounts',
                    'platform':tempActionProviderId,
                    '_nonce': awp.nonce,
                };
                var that=this;
                jQuery.post( ajaxurl, platformAccountsRequestData, function( response ) {

                    if(response.data.isConnected){
                        let data = [];
                        let accounts = response.data.accounts;
                        for (var key in accounts) {
                            if (accounts.hasOwnProperty(key)) {
                                data.push({accountId: key, accountName: accounts[key]});
                            }
                        }
                        //console.log(that);
                        if(that.action.actionProviderId == 'sperse'){
                            awpNewIntegration.action.accountList = data;
                        }
                        else{
                            awpNewIntegration.action.accountList=response.data.accounts;
                        }
                        awpNewIntegration.action.accountList=response.data.accounts;
                        awpNewIntegration.action.paltformConnected = true;
                    }
                    else{
                        awpNewIntegration.action.paltformConnected = false;
                    }
                    
                });





                
                
                // var platformConnectedData = {
                //     'action': 'awp_get_platform_status',
                //     'nonce': awp.nonce,
                //     'actionProviderId': this.action.actionProviderId
                // };


                // jQuery.post( ajaxurl, platformConnectedData, function( response ) {
                //     if(response.success){
                //         awpNewIntegration.action.paltformConnected = response.success;
                //     }
                //     else{
                //         alert("Error requesting server please referesh your page");
                //     }
                    
                // });


            }
        },
        mounted: function() {
            if (typeof integrationTitle != 'undefined') {
                this.trigger.integrationTitle = integrationTitle;
            }        if (typeof triggerData != 'undefined') {
                this.trigger = triggerData;
            }
            if (typeof actionData != 'undefined') {
                this.action = actionData;
            }
            if (typeof fieldData != 'undefined') {
                this.fieldData = fieldData;
            }

        this.getAllPlatforms();
        this.getAllFormProviders();

        },
        watch: {
            'trigger.formId': function(val) {
                let formName = (this.trigger.forms.find(o => o.id === val)) ? this.trigger.forms.find(o => o.id === val).name : '';
                
                awpNewIntegration.trigger.formName = formName;
            },
        beforeMount: function() {
            this.getAllPlatforms();
            this.getAllFormProviders();
        },    
            
            
        }
        
        
    });  
}


if(jQuery('#awp-new-message').length>0){
var awpNewMessage = new Vue({
    el: '#awp-new-message',
    data: {
        trigger: {
            messageTitle: '',
            formProviderId: '',
            forms: '',
            formId: '',
            formName: '',
            formFields: [],
            backupformFields: [],
            isformFields:false,
            totalForms:'',
            subjectName:''
        },
        formValidated: 0,
        actionValidated: 0,
        action: {
            actionProviderId: '',
            task: '',
            tasks: []
        },
        formLoading: false,
        fieldLoading: false,
        actionLoading: false,
        functionLoading: false,
        fieldData: {}
    },
    methods: {
CheckinDatabase:function(item,name){
            var not_match = true;
            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){
                    if(fieldaa[i]){
                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){
                            if(fieldaa[i].length==2){                               
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }
                        }else{
                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){
                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }
                    }
                 }              
            }
            return not_match;
        },
         changedForm: function(event) {
            awpNewIntegration.fieldLoading = true;
            var formData = {
                'action': 'awp_get_form_fields',
                'formProviderId': this.trigger.formProviderId,
                'nonce': awp.nonce,
                'formId': this.trigger.formId
            };
            jQuery.post( ajaxurl, formData, function( response ) {
                var fields             = response.data;
                awpNewMessage.trigger.formFields = fields;
                awpNewMessage.trigger.backupformFields = fields;
                awpNewMessage.trigger.isformFields = true;
                awpNewMessage.fieldLoading = false;
            });



        },
        changeFormProvider: function(event) {
            this.formValidated  = 1;
            awpNewMessage.formLoading = true;
            this.trigger.formId = '';
            if(this.trigger.formProviderId == '') {
                awpNewMessage.trigger.forms = [];
                awpNewMessage.formValidated = 0;
                awpNewMessage.formLoading = false;
            }

            var formProviderData = {
                'action': 'awp_get_forms',
                'nonce': awp.nonce,
                'formProviderId': this.trigger.formProviderId
            };

            jQuery.post( ajaxurl, formProviderData, function( response ) {

                var forms = response.data;
                if(Object.keys(forms).length>0){
                    var sortable = [];
                    for (var form in forms) {
                        sortable.push({t:forms[form],o:form});
                    }
                    sortable.sort(function (o1, o2) { return o1.t.toUpperCase() > o2.t.toUpperCase() ? 1 : o1.t.toUpperCase() < o2.t.toUpperCase() ? -1 : 0; });  
                    var sortable2 = sortable;
                    var new_check_array = [];
                    var new_check_array2 = {};
                    for(var i=0;i<sortable2.length;i++){
                        new_check_array2[' '+sortable2[i].o] = sortable2[i].t;
                    }
                    awpNewMessage.trigger.forms         = new_check_array2;
                    awpNewMessage.trigger.totalForms = Object.keys(forms).length;
                }else{
                    awpNewMessage.trigger.forms         = forms;
                    awpNewMessage.trigger.totalForms =forms.length;
                }

                let data=[];
                let formsd = forms;
                    for (var key in formsd) {
                        if (formsd.hasOwnProperty(key)) {
                            data.push({id: key, name: formsd[key]});
                        }
                    }

                awpNewMessage.trigger.forms         = formsd;
                awpNewMessage.formValidated = 0;
                awpNewMessage.formLoading = false;
                jQuery("#ActionTaskList").trigger('change');
            });

        },
        saveMessage: function(event) {
            var submissionData = {
                'action': 'awp_save_message',
                'nonce': awp.nonce,
                'formData': jQuery('#new-message').serialize(),
                'triggerData': this.trigger,
                'actionData': this.action,
                'fieldData': this.fieldData
            }
            
            jQuery.post( ajaxurl, submissionData, function( response ) {
                
                window.location.href = awp.message_template_url;
            });

        },
    },
    mounted: function() {
        if (typeof messageTitle != 'undefined') {
            this.trigger.messageTitle = messageTitle;
        }

        if (typeof triggerData != 'undefined') {
            this.trigger = triggerData;
        }


        if (typeof actionData != 'undefined') {
            this.action = actionData;
        }


        if (typeof fieldData != 'undefined') {
            this.fieldData = fieldData;
        }

    },
});
}





Vue.component('googlesheets', {
    props: ["trigger", "action", "fielddata"],
    components: {
    "vue-select": VueSelect.VueSelect
    },
    data: function () {
        return {
            googleSheetloading: false,
            listLoading: false,
            worksheetLoading: false,
            fields: this.getCols(),
        }
    },

    methods: {
        CheckinDatabase:function(item,name){
            var not_match = true;
            var saved_item = '{{'+item+'}}';
            if(!(typeof fieldData == 'undefined')){
                 var fieldaa = this.fielddata;
                 for(i in fieldaa){
                    if(fieldaa[i]){
                        if(i=='answerQ1' || i=='answerQ2' || i=='answerQ3'){
                            if(fieldaa[i].length==2){                               
                                if(fieldaa[i][1]==item){
                                    not_match = false;
                                }
                            }
                        }else{
                            if(fieldaa[i] &&  (typeof fieldaa[i]==='string')  ){
                                if(fieldaa[i].includes(saved_item)){
                                    not_match = false;
                                }
                            }
                        }
                    }
                 }
            }
            return not_match;
        },
        getSpreadSheets: function() {
            if(!this.fielddata.googleaccountID) {
                return;
            }
            this.$set(this.fielddata, 'spreadsheetId', "");
            var that = this;
            this.listLoading = true;
            var listRequestData = {
                'action': 'awp_get_spreadsheet_list',
                'accountid':this.fielddata.googleaccountID,
                '_nonce': awp.nonce
            };
            jQuery.post( ajaxurl, listRequestData, function( response ) {
                that.$set(that.fielddata, 'spreadsheetList', vueArrayObjectMaker(response.data));
                //that.fielddata.spreadsheetList = vueArrayObjectMaker(response.data);
                that.listLoading = false;

            });
            
        },
        getWorksheets: function() {
            

            if(!this.fielddata.spreadsheetId) {
                return;
            }
            
            this.$set(this.fielddata, 'worksheetId','');
            console.log(this.fielddata.worksheetId);
            this.fields = [];
            var that = this;
            this.worksheetLoading = true;
            var listData = {
                'action': 'awp_googlesheets_get_worksheets',
                '_nonce': awp.nonce,
                'spreadsheetId': this.fielddata.spreadsheetId,
                 'accountid':this.fielddata.googleaccountID,
                'task': this.action.task
            };
            jQuery.post( ajaxurl, listData, function( response ) {
                that.$set(that.fielddata, 'worksheetList',response.data);
                that.worksheetLoading = false;
            });
        },
        getCols:function(){
            var temp =[];

            if(this.fielddata.worksheetId == 0 || this.fielddata.worksheetId) {
        
                
                var that = this;
                this.$set(that.fielddata, 'worksheetName', this.fielddata.worksheetId);
                
                var requestData = {
                    'action': 'awp_googlesheets_get_headers',
                    '_nonce': awp.nonce,
                    'spreadsheetId': this.fielddata.spreadsheetId,
                    'worksheetName': this.fielddata.worksheetName,
                     'accountid':this.fielddata.googleaccountID,
                    'task': this.action.task
                };
                jQuery.post( ajaxurl, requestData, function( response ) {
                    if(response.success) {
                        
                        if(Object.keys(response.data).length) {
                            for(var key in response.data) {
                         
                                temp.push({value: key, title: response.data[key], task: ['add_row'], required: false});
                            }
                        }
                        else{
                            
                            temp.push({value: "A", title: "Col A", task: ['add_row'], required: false});
                            
                            temp.push({value: "B", title: "Col B", task: ['add_row'], required: false});
                            
                            temp.push({value: "C", title: "Col C", task: ['add_row'], required: false});
                            
                            temp.push({value: "D", title: "Col D", task: ['add_row'], required: false});
                            
                            temp.push({value: "E", title: "Col E", task: ['add_row'], required: false});
                            
                            temp.push({value: "F", title: "Col F", task: ['add_row'], required: false});
                            
                            temp.push({value: "G", title: "Col G", task: ['add_row'], required: false});
                            
                            temp.push({value: "H", title: "Col H", task: ['add_row'], required: false});
                            
                            temp.push({value: "I", title: "Col I", task: ['add_row'], required: false});
                        }
                    }
                  
                });


            }
            return temp;

        },
        getHeaders: function() {

            if(this.fielddata.worksheetId == 0 || this.fielddata.worksheetId) {
          
                this.$set(this, 'fields', []);
                var that = this;
                this.worksheetLoading = true;
                this.$set(this.fielddata, 'worksheetName',this.fielddata.worksheetId);
                var requestData = {
                    'action': 'awp_googlesheets_get_headers',
                    '_nonce': awp.nonce,
                    'spreadsheetId': this.fielddata.spreadsheetId,
                    'worksheetName': this.fielddata.worksheetName,
                     'accountid':this.fielddata.googleaccountID,
                    'task': this.action.task
                };
                jQuery.post( ajaxurl, requestData, function( response ) {
                    if(response.success) {
                        
                        if(Object.keys(response.data).length) {
                            for(var key in response.data) {

                                that.fielddata[key] = '';
                                that.fields.push({value: key, title: response.data[key], task: ['add_row'], required: false});
                            }
                        }
                        else{
                            that.fielddata["A"] = '';
                            that.fields.push({value: "A", title: "Col A", task: ['add_row'], required: false});
                            that.fielddata["B"] = '';
                            that.fields.push({value: "B", title: "Col B", task: ['add_row'], required: false});
                            that.fielddata["C"] = '';
                            that.fields.push({value: "C", title: "Col C", task: ['add_row'], required: false});
                            that.fielddata["D"] = '';
                            that.fields.push({value: "D", title: "Col D", task: ['add_row'], required: false});
                            that.fielddata["E"] = '';
                            that.fields.push({value: "E", title: "Col E", task: ['add_row'], required: false});
                            that.fielddata["F"] = '';
                            that.fields.push({value: "F", title: "Col F", task: ['add_row'], required: false});
                            that.fielddata["G"] = '';
                            that.fields.push({value: "G", title: "Col G", task: ['add_row'], required: false});
                            that.fielddata["H"] = '';
                            that.fields.push({value: "H", title: "Col H", task: ['add_row'], required: false});
                            that.fielddata["I"] = '';
                            that.fields.push({value: "I", title: "Col I", task: ['add_row'], required: false});
                        }
                    }
                    that.worksheetLoading = false;
                });
            }
        },
        refreshLists:function(){
            this.getSpreadSheets();
        },

        addSpreadSheet:function(){
            var that=this;
            Swal.fire({
              title: 'Enter Spreadsheet Name',
              html: '<input type="text" name="spredsheet_add" class="spreadsheet_add" id="spreadsheet_add" required>',
              showCancelButton: true,
              customClass: {
               title:'swal-title-set',
               popup:'swal-wide-set', 
              },
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Create Spreadsheet',
              showLoaderOnConfirm: true,
              preConfirm: (login) => {
                if(jQuery("#spreadsheet_add").val()==""){
                    return Swal.showValidationMessage(
                      `Spreadsheet name cannot be empty`
                    );
                }


                var googleSheetRequestData = {
                    'action': 'awp_googlesheets_create_spreadsheet',
                    '_nonce': awp.nonce,
                    'accountId':this.fielddata.googleaccountID,
                    'task': this.action.task,
                    'spreadsheetName':jQuery("#spreadsheet_add").val(),
                };

                var form_data = new FormData();
                for ( var key in googleSheetRequestData ) {
                    form_data.append(key, googleSheetRequestData[key]);
                }

                return fetch(ajaxurl,{
                      method: 'POST',
                      contentType : false,
                      body: form_data,
                    }
                )
                .then(response => {

                    if (!response.ok) {
                        return Swal.showValidationMessage(
                            `Please try again`
                        );
                    }
                   
                    this.getSpreadSheets();
                });



                
              },

            }).then((result) => {
              
            });    
        },

        addWorksheet:function(){
            var that=this;
            Swal.fire({
              title: 'Enter Worksheet Name',
              html: '<input type="text" name="worksheet_add" class="worksheet_add" id="worksheet_add" required>',
              showCancelButton: true,
              customClass: {
               title:'swal-title-set',
               popup:'swal-wide-set', 
              },
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Create Worksheet',
              showLoaderOnConfirm: true,
              preConfirm: (login) => {
                if(jQuery("#worksheet_add").val()==""){
                    return Swal.showValidationMessage(
                      `Worksheet name cannot be empty`
                    );
                }

                if(this.fielddata.spreadsheetId==""){
                    return Swal.showValidationMessage(
                      `Please select spreadsheet first`
                    );
                }


                var googleSheetRequestData = {
                    'action': 'awp_googlesheets_create_worksheet',
                    '_nonce': awp.nonce,
                    'accountId':this.fielddata.googleaccountID,
                    'task': this.action.task,
                    'worksheetName':jQuery("#worksheet_add").val(),
                    'spreadsheetId':this.fielddata.spreadsheetId,
                };

                var form_data = new FormData();
                for ( var key in googleSheetRequestData ) {
                    form_data.append(key, googleSheetRequestData[key]);
                }

                return fetch(ajaxurl,{
                      method: 'POST',
                      contentType : false,
                      body: form_data,
                    }
                )
                .then(response => {

                    if (!response.ok) {
                        return Swal.showValidationMessage(
                            `Please try again`
                        );
                    }
                   
                    this.getWorksheets();
                });



                
              },

            }).then((result) => {
              
            });    
        }

    },
    created: function() {
    },
    updated:function () {
        makedropable(this.fielddata);
        
    },
    mounted: function() {
        
        var that = this;

        if (typeof this.fielddata.spreadsheetId == 'undefined') {
            this.$set(this.fielddata, 'spreadsheetId','');
        }

        if (typeof this.fielddata.worksheetId == 'undefined') {
            this.$set(this.fielddata, 'worksheetId','');
        }
        
        if (typeof this.fielddata.spreadsheetId == 'undefined') {
            this.$set(this.fielddata, 'spreadsheetId','');
        }

        if(typeof this.fielddata.worksheetName == 'undefined') {
            this.$set(this.fielddata, 'worksheetName','');
        }
        if(typeof this.fielddata.googleaccountID == 'undefined') {
            this.$set(this.fielddata, 'googleaccounts','');
        }
        if(typeof this.worksheetLoading == 'undefined') {
            this.worksheetLoading = false;
        }
        
        //reset activeplatformid value when new component mounts
        if(typeof editable_field == 'undefined' && this.fielddata.activePlatformId){
            this.$set(this.fielddata, 'activePlatformId','');
        }
        
        if (this.fielddata.worksheetId !== '') {
            //console.log(this.fields);
            //console.log("coming ere");
            //console.log(this.getCols);
            //this.getHeaders();
        }
        this.googleSheetloading = true;
        var googleSheetRequestData = {
            'action': 'awp_get_gsheet_accounts',
            '_nonce': awp.nonce,
        };


        jQuery.post( ajaxurl, googleSheetRequestData, function( response ) {
            that.$set(that.fielddata, 'gsheetaccounts',response.data);
            that.googleSheetloading = false;
        });
        

        if(this.fielddata.spreadsheetId && this.fielddata.worksheetName ) {
            var that = this;
            this.worksheetLoading = true;
            var requestData = {
                'action': 'awp_googlesheets_get_headers',
                '_nonce': awp.nonce,
                'spreadsheetId': this.fielddata.spreadsheetId,
                'worksheetName': this.fielddata.worksheetName,
                'task': this.action.task
            };
            jQuery.post( ajaxurl, requestData, function( response ) {
                if(response.success) {
                    if(response.data) {
                        for(var key in response.data) {
                            that.fields.push({value: key, title: response.data[key], task: ['add_row'], required: false});
                        }
                    }
                }
                that.worksheetLoading = false;
            });
        }
    },
    watch: {
        
    },
    template: '#googlesheets-action-template'
});


function awp_delete_integration(e,spot_count){
    e = e || window.event;
    if(spot_count>0){
        delete_confirm="Please be aware any integration Spots using this account will no longer work.";
    }
    else{
        delete_confirm="Are you sure to delete this account?";
    }
    

    if(confirm(delete_confirm)) {
            return;
    } else {
            e.preventDefault();
    }
}

function awp_delete_integration2(e){
    e = e || window.event;
    delete_confirm="Are you sure to delete this integration?";
    
    if(confirm(delete_confirm)) {
            return;
    } else {
            e.preventDefault();
    }
}
jQuery(document).ready(function() {

    triggerStaticFieldsWork();
    jQuery(document).on('click','.dx-button-content',function(){
        var $this = jQuery(this);
        jQuery('.showdropdownlist').hide();
        $this.parent().parent().next('.showdropdownlist').show();
        jQuery('.basedonfieldlist').hide();
    }); 

    jQuery(document).on('click','.dx-additonal-condition',function(){
        var $this = jQuery(this);
        $this.hide();
        jQuery('.dynamiccross').show();
        
        $this.next('.basedonfieldlist').show();
        jQuery('.showdropdownlist').hide().addClass('test');
    });

    jQuery(document).on('click','.dynamiccross',function(){
        var $this = jQuery(this);
        
        $this.parent().hide();
        $this.parent().prev('.dx-additonal-condition').show();
        $this.hide();
        // $this.prev('.basedonfieldlist').hide();
        // $this.prev('.dx-additonal-condition').show();
        // jQuery('.showdropdownlist').hide().addClass('test');
    });



    jQuery(document).on('focusin','input[name="awp_sperse_api_key"], input[name="aws_sperse_api_key"] ',function(){
        var $this = jQuery(this);
      const type = $this.attr('type') === 'password' ? 'text' : 'password';
        $this.attr('type', type);

    });
    jQuery(document).on('focusout','input[name="awp_sperse_api_key"], input[name="aws_sperse_api_key"]',function(){
        var $this = jQuery(this);     
      const type = 'password';
        $this.attr('type', type);
    });

    if(typeof int_id == 'undefined'){
        jQuery(document).on("click",".fx-controls-in-zone .delete-confirm",function(event){

            var $this = jQuery('#'+event.target.id);
            $this =jQuery(this).closest('li');

            //special handling for static fields
            //check is it is static field
            if($this.find(".staticTag")){
                if($this.find(".staticTag").text() == 'Insert Static Value'){
                    $this.remove();
                    //console.log(jQuery(this));
                    //console.log(jQuery(this).closest("li").siblings().length);
                    if(!jQuery(this).closest("li").siblings().length){
                        jQuery(this).closest('.form_field_dropable').removeClass('sperse_dropped');
                    }
                    return;
                }
                
            }
            //end

            var forfieldname = $this.attr('data-name');
            var tomappedfieldname = $this.attr('data-field');
            var field_data = awpNewIntegration.fieldData;

            var already_value = field_data[tomappedfieldname];
            var filteredfordisplaystored = field_data[tomappedfieldname+'dis'];
            var mapped_pr_value = '{{'+forfieldname;
            var maaped_value = '{{'+forfieldname+'}}';  
            

            if(tomappedfieldname=='answerQ1' || tomappedfieldname=='answerQ2' || tomappedfieldname=='answerQ3' ){
            		maaped_value='';
            		filteredfordisplaystored=[];
            }else{
	             if(already_value){
	                 maaped_value = already_value.replace(maaped_value,'');
	             }
	             if(filteredfordisplaystored){
	                 filteredfordisplaystored.remove(mapped_pr_value);
	             }

            }
            field_data[tomappedfieldname] = maaped_value;
            field_data[tomappedfieldname+'dis'] = filteredfordisplaystored;


            //saving new values after deleting the selected one
            awpNewIntegration.fieldData = field_data;
            jQuery(".sperse_reverse_draggable li[data-name='"+forfieldname+"']").css({
                'left':'unset',
                'top' :'unset',
                'display':'block'
            }); 

            if(!jQuery(this).closest("li").siblings().length){
                jQuery(this).closest('.form_field_dropable').removeClass('sperse_dropped')
            }
            
            //saving new value in textbox as well
            jQuery($this.parent().parent().find("input")).val(maaped_value);
    
            jQuery(this).closest("li[data-name='"+forfieldname+"']").remove();
 
            
            jQuery("li[data-name='"+forfieldname+"']").find('.field-actions').addClass('hide');
            if(!(maaped_value)){
                jQuery("input[data-field='"+tomappedfieldname+"']").closest('.form_field_dropable').removeClass('sperse_dropped'); 
            }


        });

    	//var back_field_data = awpNewIntegration.fieldData;
	    jQuery(document).on('change','#ActionTaskList',function(){
	        var selected_value = jQuery(this).val();
	    	var platform_list = jQuery('#PlatformList').val();
	    	if(selected_value && platform_list=='sperse' && (jQuery('.sperse_reverse_draggable ul').children('.end-draggable').length==0)){
	    		var back_field_data = awpNewIntegration.fieldData;
	    	}
	    	if(selected_value && platform_list=='sperse' && (jQuery('.sperse_reverse_draggable ul').children('.end-draggable').length>0)){
	    		if(confirm('WARNING : Dragged Form Fields will reset.')){
	    			var fielsd = awpNewIntegration.fieldData;
	    			jQuery('.sperse_reverse_draggable ul').children('.end-draggable').each(function(){
		    			var key = jQuery(this).attr('data-field');
		    			fielsd[key]='';
		    			fielsd[key+'dis']=[];
		    		});
		    		awpNewIntegration.fieldData = fielsd;
		    		jQuery('.sperse_reverse_draggable ul').children('.end-draggable').find('.field-actions').addClass('hide');
		    		jQuery('.sperse_reverse_draggable ul').children('.end-draggable').removeClass('end-draggable').removeAttr('style').css('position', 'relative');
		    		jQuery('.form_field_dropable').removeClass('sperse_dropped');		    	
	    		}
	    	}
             if(Object.keys(awpNewIntegration.trigger.forms).length==1){

                awpNewIntegration.changedForm(jQuery("#form_default"));
            }
	    });
	}
    else{
        //this part is added for special handling of static dblclick fields remove button for edit integration page only as on edit integration page fields are created with in vue components so "insert static value" could not be accessed with vue component 
        // this code only remove "static fields that do no given any value" otherwise if static field is given proper value it is added on vue component this handled from that part of the code
            jQuery(document).on("click",".fx-controls-in-zone .delete-confirm",function(event){
                var $this = jQuery('#'+event.target.id);
                $this =jQuery(this).closest('li');

                //special handling for static fields
                //check is it is static field
                if($this.find(".staticTag")){
                    if($this.find(".staticTag").text() == 'Insert Static Value'){
                        $this.remove();
                        //console.log(jQuery(this));
                        //console.log(jQuery(this).closest("li").siblings().length);
                        if(!jQuery(this).closest("li").siblings().length){
                            jQuery(this).closest('.form_field_dropable').removeClass('sperse_dropped');
                        }
                        return;
                    }
                    
                }
                //end    
            });
            
    }
    makedropable();
   


    jQuery(document).on('click',".tablinks",function(event){
          var i, tabcontent, tablinks;
          tabcontent = jQuery(".tabcontent");
          var target_id = jQuery(this).attr('data-content');
          jQuery(".tabcontent").each(function(){
            jQuery(this).hide();
          });
          jQuery(".tablinks").each(function(){
            jQuery(this).removeClass('active');
          });
        jQuery('#'+target_id).show();
        jQuery(this).addClass('active');
    });
    jQuery('#defaultOpen').trigger('click');

/*    if(jQuery("#awp_codebreaker_user_id").length>0){
        jQuery('#awp_codebreaker_user_id').select2({
          placeholder: 'Select an option'
        }).on('select2:open',function(){
            $('.select2-dropdown--above').attr('id','fix');
            $('#fix').removeClass('select2-dropdown--above');
            $('#fix').addClass('select2-dropdown--below');

        });;
    }*/

function enable_search_form_fields(){
    if(jQuery('.sperse_reverse_draggable').length>0) {
        //console.log(jQuery('.form_fields .filter-input-wrap').length)
        jQuery('.form_fields ul').before("<div class='filter-input-wrap'><input class='filter-input' placeholder='Type here to search by field name in your source form'></input></div>");
        function filter(filter, query) {
            query = jQuery.trim(query);
            jQuery(filter).each(function () {
            (jQuery(this).text().search(new RegExp(query, "i")) < 0) ? jQuery(this).hide().removeClass('name') :
            jQuery(this).show().addClass('name');
                });
            }            
        jQuery('.filter-input').on('input', function (event) {
            if (event.keyCode == 27 || jQuery(this).val() == '') {
            jQuery(this).val('');
            jQuery('.form_fields li').removeClass('name').show().addClass('name');
            }
            else {
            filter('.form_fields li', jQuery(this).val());
            }
        });
    }
}
enable_search_form_fields();
});



function isObjEmpty (obj) {
    for (key in obj) return false;
    return true
  };




/* new part */ 

    // Burger
    if (jQuery('.header__burger').length) {
        let headerNav = jQuery('.menu-top-wrap ul');
        let burger = jQuery('.header__burger');

        burger.on('click', function (e) {
            headerNav.toggleClass('is-show');
            burger.toggleClass('header__burger--active');
            e.stopPropagation();
        });

        headerNav.on('click', function (e) {
            e.stopPropagation();
        });

        jQuery('.menu-top-wrap ul a').on('click', function (e) {
            headerNav.removeClass('is-show');
            burger.removeClass('header__burger--active');
            e.stopPropagation();
        });

        jQuery(document).on('click', function () {
            headerNav.removeClass('is-show');
            burger.removeClass('header__burger--active');
        });
    }

    // Scroll to top
    if (jQuery('.scrollup').length) {
        let scrollBtn = jQuery('.scrollup');
        jQuery(window).on('scroll', function () {
            if (jQuery(this).scrollTop() > 50) {
                scrollBtn.removeClass('scrollup__hide');
            } else {
                scrollBtn.addClass('scrollup__hide');
            }
        });
        scrollBtn.on('click', function (e) {
            e.preventDefault();
            jQuery('body,html').animate({ scrollTop: 0 }, 500);
        });
    }

//  Integrations toggler
    if (jQuery('.view-toggler').length) {
        let toggler = jQuery('.view-toggler');
        let leftForm = jQuery('.form-wrapper-left');
        let rightForm = jQuery('.form-wrapper-right');
		let formTitles = jQuery('.table-form-left h3, .table-form-right h3');
		        
        toggler.on('click', function(){
            jQuery(this).toggleClass('is-active');
            leftForm.slideToggle();
            rightForm.slideToggle();
			formTitles.toggleClass('is-active');
        });
    }

if (jQuery('.nav-tab__toggler').length) {
	let tabsToggler = jQuery('.nav-tab__toggler');
	let tabsButtons = jQuery('.nav-tab-wrapper .nav-tab');
		
	tabsToggler.on('click', function(){
		jQuery(this).toggleClass('is-active');
		tabsButtons.toggleClass('is-active');
	})
}




function setComponentFieldData (fielddata,fields){
    for (var i = 0; i < fields.length; i++) {
        temp=fields[i].value;
        if(!fielddata.hasOwnProperty(temp)){
            fielddata[temp]='';
        }
    }

    // list id was used on multiple platforms so for double save we are declaring it to be on save side
    if(!fielddata.hasOwnProperty('listId')){
            fielddata['listId']='';
        }
    return fielddata;
}
var debug;
function triggerCopyFieldsWork(){
    var copyCount=0;
    //copy element work
    jQuery(document).on("click",".sperse_inner .copy-confirm",function(event){
        copyCount=copyCount+1;
        var box=`
        <li data-name="" data-fname="" data-field="" class="copied_li_tag form_fields_name fx-controls-in-zone ui-draggable ui-draggable-handle" >
            <div class="field-actions">
                <a type="remove" id="" data-name="" data-field="" title="Remove Element" class="copied-del-btn del-button btn formbuilder-icon-cancel delete-confirm">
                
                </a>
            </div> 
            <span class="copiedTag input-group-addon fx-dragdrop-handle"></span>
        </li>`;

        that=jQuery(this);
        debug=jQuery(this);
        var originalElement=that.parent().parent();
        // var ul=originalElement.parent();
        // if(ul.find('li:last').length){
        //     jQuery(originalElement[0].outerHTML).insertAfter(ul.find('li:last'));
        // }
        if(typeof editable_field == 'undefined'){
            var textbox=that.parent().parent().parent().parent().find('input[type=hidden]');
        }
        else{
            var textbox=that.parent().parent().parent().find('input[type=hidden]');
        }
        var dataAttrVal='copied_'+copyCount+'_'+originalElement.attr('data-name');
        var droppedFieldName=textbox.attr('data-field');
        var existing=textbox.val();
        var newVal=existing+'{{'+dataAttrVal+"}}";
        if(typeof editable_field == 'undefined'){
            
            //setting up data-attributes and text for the box (var box=) on new integration page only
            
            var libox=jQuery(box);
            libox.attr('data-name',dataAttrVal);
            libox.attr('data-fname',dataAttrVal);
            libox.attr('data-field',droppedFieldName);
            var removebtn=libox.find('.copied-del-btn');
            removebtn.attr('data-name',dataAttrVal);
            removebtn.attr('data-field',droppedFieldName);
            var spandisplay=libox.find('.copiedTag');
            spandisplay.text(originalElement.find('.fx-dragdrop-handle').text()).show();
            var ul=originalElement.parent();
            if(ul.find('li:last').length){
                jQuery(libox).insertAfter(ul.find('li:last'));
            }
            textbox.val(newVal);
        }
        else{
            jQuery('.static_li_tag').hide();
        }
            
        
        var field_data = awpNewIntegration.fieldData;
        field_data[droppedFieldName]=newVal;
        newArr=newVal.split('}}');
        const disarray = newArr.filter((a) => a);
        field_data[droppedFieldName+'dis']=disarray;

        makedropable();
    });
}

triggerCopyFieldsWork();


function triggerStaticFieldsWork(){

jQuery('.sperse_inner').off('dblclick',);
jQuery('.sperse_inner').on('dblclick', function (e) {
    //prevent dbl click trigger inside child
    //console.log(e.target);
    //console.log(e.currentTarget);

    if(e.target !== e.currentTarget && (!jQuery(event.target).hasClass('sortable') ) ){
        return;
    }

    that=jQuery(this);
    var box=`
    <li data-name="" data-fname="" data-field="" class="static_li_tag form_fields_name fx-controls-in-zone ui-draggable ui-draggable-handle" >
        <div class="field-actions">
            
            <a type="remove" id="" data-name="" data-field="" title="Remove Element" class="static-del-btn del-button btn formbuilder-icon-cancel delete-confirm">
            
            </a>
        </div> 
        <span class="staticTag input-group-addon fx-dragdrop-handle">Insert Static Value</span>
    </li>`;


    if(that.find('li:last').length){
        jQuery(box).insertAfter(that.find('li:last'));
    }
    else{
        if(typeof editable_field == 'undefined'){
            that.find('ul').append(box);
        }
        else{
            jQuery(box).insertBefore(that.find('ul'));
        }
        
        
    }
    that.parent().addClass('sperse_dropped');
    
 
});


jQuery('.form-select-account-wrapper').off('click');
jQuery('.form-select-account-wrapper').on('click',".staticTag", function (e) {
    that=jQuery(this); 
    //if this button already holds a value then do not change it
    if(that.text() != 'Insert Static Value'){
        return;
    }
    that.hide();
    that.parent().append(`<input class="valuestorer" type="text">`);
});


jQuery('.form-select-account-wrapper').off('focusout');
jQuery('.form-select-account-wrapper').on('focusout',".valuestorer", function (e) {
    that=jQuery(this);
    var val=that.val(); 
    if(val==''){
        that.parent().find('.field-actions a[type="remove"]').trigger("click");
        return;
    }else{
        that.parent().find('.field-actions').prepend(`<a type="copy"   id="" data-name="" data-field="" class="copy-img del-button btn formbuilder-icon-cancel copy-confirm" title="Copy Element"></a>`);
    }
    var backend_unique_val=val.replace(/ /g,'_');
    if(typeof editable_field == 'undefined'){
        var textbox=that.parent().parent().parent().find('input[type=hidden]');
    }
    else{
        var textbox=that.parent().parent().find('input[type=hidden]');
    }
    
    var droppedFieldName=textbox.attr('data-field');

    that.hide();

    dataAttrVal='static_'+backend_unique_val;
    var existing=textbox.val();
    var newVal=existing+'{{'+dataAttrVal+"}}";
    
    if(typeof editable_field == 'undefined'){
        
        //setting up data-attributes and text for the box (var box=) on new integration page only
        var libox=that.parent();
        libox.attr('data-name',dataAttrVal);
        libox.attr('data-fname',dataAttrVal);
        libox.attr('data-field',droppedFieldName);
        var removebtn=that.parent().find('.static-del-btn');
        removebtn.attr('data-name',dataAttrVal);
        removebtn.attr('data-field',droppedFieldName);
        var spandisplay=that.parent().find('.staticTag');
        spandisplay.text(val).show();
        
        textbox.val(newVal);
    }
    else{
        jQuery('.static_li_tag').hide();
    }


    
        
    
    var field_data = awpNewIntegration.fieldData;
    field_data[droppedFieldName]=newVal;
    newArr=newVal.split('}}');
    const disarray = newArr.filter((a) => a);
    field_data[droppedFieldName+'dis']=disarray;

    
    makedropable();

    


});


}


jQuery('.awp-integration-quickedit').on('click', function (event) {
    event.preventDefault();
    //handling for existing opened quickedits
        jQuery(".original-row").show();
        jQuery(".my-row").hide();
    //

    let self = jQuery(this);
    let tr=self.parents('tr');
    let integrationID=self.attr('data-integration-id');
    let existingName=self.attr('data-integration-existing-name');
    let submitUrl=self.attr('data-integration-submit-url');
    tr.addClass("original-row");
    tr.hide();

    let mytr=`<tr class="my-row">
                <th></th>
                <td><label>Integration Name:</label></td>
                <td><input data-submit-url="`+submitUrl+`" class="quick-edit-text" style="margin-left: 15px;" type=text value="`+existingName+`"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td><div class="btn btn-primary cancel-integration" >cancel</div></td>
                <td><div class="btn btn-primary update-integration" >Update</div></td>
              </tr>`;
    tr.after(mytr);

});

jQuery('.wp-list-table').on('click','.update-integration', function (event) {
    let self=jQuery(this);
    let textbox=self.parent().parent().find('.quick-edit-text');
    let integrationName=encodeURIComponent(textbox.val());

    let url=textbox.attr('data-submit-url')+'&integration_name='+integrationName;
    
    window.location.replace(url);

});

jQuery('.wp-list-table').on('click','.cancel-integration', function (event) {
    let self=jQuery(this);
    let mytr=self.parent().parent();
    mytr.hide();
    jQuery(".original-row").show();
   

});




// jQuery('.form-select-account-wrapper').on('click',".static-del-btn", function (e) {
//     that=jQuery(this); 
//     that.parent().parent().remove();
//     var textbox=that.parent().parent().parent().find('input[type=hidden]');
//     var existing=textbox.val();
//     var newVal=existing+'{{static_'+val+"}}";
//     textbox.val(newVal);
    
// });


jQuery('.logFilter').click(function(e){
    e.preventDefault();
    var from=jQuery('select[name="log_form_provider"]').val();
    var to=jQuery('select[name="log_action_provider"]').val();
    if(from=="" && to==""){
        from=jQuery('select[name="log_form_provider"]').eq(1).val();
        to=jQuery('select[name="log_action_provider"]').eq(1).val();
    }
    window.location.href ='?page=automate_hub_log&form_provider='+from+'&action_provider='+to;
});



jQuery(document).on("mouseenter", ".sperse_inner li", function(e) {
    if(jQuery(this).find("a[type='copy']").length){
        if(!jQuery(this).find("a[type='copy']").attr('id').includes('copied')){
            jQuery(this).find("a[type='copy']").removeClass('copy-img');
            jQuery(this).find("a[type='copy']").addClass('show-copy-img');  
         }
    }
});

jQuery(document).on("mouseleave", ".sperse_inner li", function(e) {
    if(jQuery(this).find("a[type='copy']").length){
        if(!jQuery(this).find("a[type='copy']").attr('id').includes('copied')){
            jQuery(this).find("a[type='copy']").addClass('copy-img');
            jQuery(this).find("a[type='copy']").removeClass('show-copy-img');   
        }    
    }

     
});



jQuery(document).on('click','.button-next-step',function(){
    var $this = jQuery(this);
    nextStep=true;

    message="This step will be saved as it is and you will be moved to the next one";
    if(awpNewIntegration.trigger.formProviderId==""|| awpNewIntegration.trigger.formId ==""  || awpNewIntegration.action.actionProviderId == "" || awpNewIntegration.action.task ==""){
        message='Please complete this step first';
        nextStep=false;
    }

    if(!nextStep){
        Swal.fire({
            title:'Cannot move to next step',
            text:'This integration is not complete',
            icon:'error',
        });
    }
    else{

        Swal.fire({
          title: 'Are you sure?',
          text: message,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Go to next step'
        }).then((result) => {
          if (result.isConfirmed) {

            if(nextStep){
                window.isSibling=true;
                jQuery("input[name='save_integration']").click();
            }
          }
        });    
    }

    
    window.isSibling=false;
}); 

/**
 * Popup video in apps header
 */
jQuery("#videobtn").click(function(){
    jQuery("#myModal").modal('show');
    jQuery("#dynamicappname").text(jQuery("#videobtn").data('appname'));
});
jQuery("#exclusive-offer-btn").click(function(){
    jQuery("#promobox").modal('show');
});
jQuery('#myModal').on('hidden.bs.modal', function () {
    // do something…
          jQuery('#popup-iframe-parent').html(`<iframe  src="https://sperse.io/setupvideo.php?appname=<?php echo sanitize_text_field($appname);?>" height="650" scrolling="no" marginwidth="0" marginheight="0"  loading="lazy" frameborder="0" style="border:none;overflow: hidden;"></iframe>`);
});

/**
 * context menu
 */
 var menu = document.querySelector('.menu-platform');
 var menu_form_provider=document.querySelector('.menu-form-source');
 var menu_form_name=document.querySelector('.menu-form-name');
 
 function showMenu(x, y,menu){
     menu.style.left = x + 'px';
     menu.style.top = y + 'px';
     menu.classList.add('menu-show');
 }
 
 function hideMenu(menu){
     menu.classList.remove('menu-show');
 }
 
 function onContextMenu(e,menuType){
     e.preventDefault();
     left=e.pageX;
     top=e.pageY;
     //dropdown_location=left-(col_width*0.56);
 
     showMenu( ( e.pageX-150 ),(e.pageY-20),menuType );
     //document.addEventListener('mousedown', onMouseDown, false);
 }
 
 function onMouseDown(e){
     hideMenu();
     document.removeEventListener('mousedown', onMouseDown);
 }
 jQuery(".form_provider .column_integration_id .form_provider_text").mouseover(function(e){
   onContextMenu(e,menu_form_provider);
 });
 jQuery(".form_name .form_name_text").mouseover(function(e){
   onContextMenu(e,menu_form_name);
 });
 jQuery(".action_provider .column_integration_id .action_provider_text").mouseover(function(e){
   onContextMenu(e,menu);
 });
 
 
 
 jQuery(".column-action_provider").mouseleave(function(e){
     if (jQuery('.menu:hover').length == 0) {
         hideMenu(menu);
     }
   
 });
 
 jQuery(".column-form_provider").mouseleave(function(e){
     if (jQuery('.menu:hover').length == 0) {
         hideMenu(menu_form_provider);
     }
   
 });
 jQuery(".column-form_name").mouseleave(function(e){
     if (jQuery('.menu:hover').length == 0) {
         hideMenu(menu_form_name);
     }
   
 });
 
 jQuery(".menu").mouseleave(function(e){
     if (jQuery('.menu:hover').length == 0) {
         hideMenu(menu_form_provider);
         hideMenu(menu_form_name);
         hideMenu(menu);
 
         jQuery('.menu-edit-integration').removeClass('menu-show');
         jQuery('.menu-delete-integration').removeClass('menu-show');
     }
   
 });
 
 
 
 //document.addEventListener('contextmenu', onContextMenu, false);
 
 
 //jquery for hover items edit,delete
 jQuery(".edit .edit-integration-href").mouseover(function(e){
     jQuery('.menu-edit-integration').addClass('menu-show');
   
 });
 jQuery(".edit .edit-integration-href").mouseleave(function(e){
     setTimeout(() => {
 
         if (jQuery('.menu:hover').length == 0) {
             jQuery('.menu-edit-integration').removeClass('menu-show');
         }
 
     }, 200);
     
     
   
 });
 jQuery(".delete .delete-integration-href").mouseover(function(e){
     jQuery('.menu-delete-integration').addClass('menu-show');
   
 });
 jQuery(".delete .delete-integration-href").mouseleave(function(e){
     setTimeout(() => { 
 
         if (jQuery('.menu:hover').length == 0) {
             jQuery('.menu-delete-integration').removeClass('menu-show');
         }
 
     }, 200);
 });
 

 function vueArrayObjectMaker(data){
    if( 
    typeof data === 'object' &&
    !Array.isArray(data) &&
    data !== null){
    
        let objectsArray = [];
        let lists = data;
        for (var key in lists) {
            if (lists.hasOwnProperty(key)) {
                objectsArray.push({id: key, name: lists[key]});
            }
        }

        return objectsArray;
    }


    return data;
    
}

function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("navTabSearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("navTabWrapper");
    li = ul.getElementsByTagName("a");
	
	for (let i of li){
		      if (i.innerText.toUpperCase().indexOf(filter) > -1) {
				  console.log(i.innerText);
            i.style.display = "";
        } else {
            i.style.display = "none";
        }
	}
}


params = new URLSearchParams(window.location.search);
if(params.has('page') && params.get('page') == 'awp_app_directory'){
    var data = {
        'action': 'awp_refresh_app_directory',
        '_nonce': awp.nonce,
    };
    jQuery.post( ajaxurl, data, function( response ) {
        console.log(response);  
    });
}   




jQuery('#awp-new-integration').on('click','.rssfeedbtn', function (event) {
    let self=jQuery(this);
    
    if(jQuery("#rssfeedtxt").val() == '' || jQuery("#rssfeedtxt").val() == undefined){
        jQuery(".rsserrormsg").text("Please enter url");
        return;
    }


    var data = {
        'formProviderId': awpNewIntegration.trigger.formProviderId,
        'formId': awpNewIntegration.trigger.formId,
        'action': 'awp_get_form_fields',
        '_nonce': awp.nonce,
        'awp_feed_url':jQuery("#rssfeedtxt").val(),
        'awp_feed_cron':jQuery("#rssfeedInterval").val(),

    };
    jQuery.post( ajaxurl, data, function( response ) {
        var fields             = response.data;
        if(response.data == ""){
            jQuery(".rsserrormsg").text("Valid RSS Feed not found");
        }
        var cleanobj =  awpNewIntegration.cleanObj(fields);
        awpNewIntegration.trigger.formFields = cleanobj;
        awpNewIntegration.trigger.backupformFields = cleanobj;
        awpNewIntegration.fieldLoading = false;
        awpNewIntegration.checkDroppedFields();
    });
   

});