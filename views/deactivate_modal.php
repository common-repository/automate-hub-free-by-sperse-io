<?php 
$awp_deactivate_nonce = wp_create_nonce('awp-deactivate-nonce');
?>


<style type="text/css">
	.automate-hub-free-by-sperse-io-hidden{

      overflow: hidden;
    }
    .automate-hub-free-by-sperse-io-popup-overlay .automate-hub-free-by-sperse-io-internal-message{
      margin: 3px 0 3px 22px;
      display: none;
    }
    .automate-hub-free-by-sperse-io-reason-input{
      margin: 3px 0 3px 22px;
      display: none;
    }
    .automate-hub-free-by-sperse-io-reason-input input[type="text"]{

      width: 100%;
      display: block;
    }
  .automate-hub-free-by-sperse-io-popup-overlay{

    background: rgba(0,0,0, .8);
    position: fixed;
    top:0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1000;
    overflow: auto;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .automate-hub-free-by-sperse-io-popup-overlay.automate-hub-free-by-sperse-io-active{
    opacity: 1;
    visibility: visible;
  }
  .automate-hub-free-by-sperse-io-serveypanel{
    width: 600px;
    background: #fff;
    margin: 0 auto 0;
    border-radius: 3px;
  }
  .automate-hub-free-by-sperse-io-popup-header{
    background: #f1f1f1;
    padding: 20px;
    border-bottom: 1px solid #ccc;
  }
  .automate-hub-free-by-sperse-io-popup-header h2{
    margin: 0;
    text-transform: uppercase;
  }
  .automate-hub-free-by-sperse-io-popup-body{
      padding: 10px 20px;
  }
  .automate-hub-free-by-sperse-io-popup-footer{
    background: #f9f3f3;
    padding: 10px 20px;
    border-top: 1px solid #ccc;
  }
  .automate-hub-free-by-sperse-io-popup-footer:after{

    content:"";
    display: table;
    clear: both;
  }
  .action-btns{
    float: right;
  }
  .automate-hub-free-by-sperse-io-anonymous{

    display: none;
  }
  .attention, .error-message {
    color: red;
    font-weight: 600;
    display: none;
  }
  .automate-hub-free-by-sperse-io-spinner{
    display: none;
  }
  .automate-hub-free-by-sperse-io-spinner img{
    margin-top: 3px;
  }
  .automate-hub-free-by-sperse-io-pro-message{
    padding-left: 24px;
    color: red;
    font-weight: 600;
    display: none;
  }
  .automate-hub-free-by-sperse-io-popup-header{
    background: none;
        padding: 18px 15px;
    -webkit-box-shadow: 0 0 8px rgba(0,0,0,.1);
    box-shadow: 0 0 8px rgba(0,0,0,.1);
    border: 0;
}
.automate-hub-free-by-sperse-io-popup-body h3{
    margin-top: 0;
    margin-bottom: 30px;
        font-weight: 700;
    font-size: 15px;
    color: #495157;
    line-height: 1.4;
    text-tranform: uppercase;
}
.automate-hub-free-by-sperse-io-reason{
    font-size: 13px;
    color: #6d7882;
    margin-bottom: 15px;
}
.automate-hub-free-by-sperse-io-reason input[type="radio"]{
margin-right: 15px;
}
.automate-hub-free-by-sperse-io-popup-body{
padding: 30px 30px 0;

}
.automate-hub-free-by-sperse-io-popup-footer{
background: none;
    border: 0;
    padding: 29px 39px 39px;
}
  .col-md-4{
        width: 33.3333333%;
        float: left;
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
  }

.better-reason,.other-reason{
	margin-top: 10px;
}
</style>



<div class="automate-hub-free-by-sperse-io-popup-overlay">
  <div class="automate-hub-free-by-sperse-io-serveypanel">
    <form action="#" method="post" id="automate-hub-free-by-sperse-io-deactivate-form">
    <div class="automate-hub-free-by-sperse-io-popup-header">
      <h2>Quick feedback about Automate HUB | Ultimate</h2>
    </div>
    <div class="automate-hub-free-by-sperse-io-popup-body">
      <h3>If you have a moment, please let us know why you are deactivating:</h3>
      <input type="hidden" class="Triad_Mark_deactivate_nonce" name="Triad_Mark_deactivate_nonce" value="<?php echo esc_attr($awp_deactivate_nonce ) ?>">
      <ul id="automate-hub-free-by-sperse-io-reason-list">
        
        <li class="automate-hub-free-by-sperse-io-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="1">
            </span>
            <span>I only needed the plugin for a short period</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
        </li>


        <li class="automate-hub-free-by-sperse-io-reason has-input" data-input-type="textfield">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="8">
            </span>
            <span>Couldn't find the required platform in the list</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
          <div class="automate-hub-free-by-sperse-io-reason-input" style="display: none;"><span class="message error-message " style="display: none;">Kindly tell us the platform that you couldn't find.</span><input class="better-reason" type="text" name="automate-hub-free-by-sperse-iocannot_find_app_h3" placeholder="What's the platform name ?"></div>
        </li>


        <li class="automate-hub-free-by-sperse-io-reason has-input" data-input-type="textfield">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="2">
            </span>
            <span>I found a better plugin</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
          <div class="automate-hub-free-by-sperse-io-reason-input" style="display: none;"><span class="message error-message " style="display: none;">Kindly tell us the Plugin name.</span><input class="better-reason" type="text" name="automate-hub-free-by-sperse-iobetter_plugin_h3" placeholder="What's the plugin's name?"></div>
        </li>
        <li class="automate-hub-free-by-sperse-io-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="3">
            </span>
            <span>The plugin broke my site</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
        </li>
        <li class="automate-hub-free-by-sperse-io-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="4">
            </span>
            <span>The plugin suddenly stopped working</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
        </li>
        <li class="automate-hub-free-by-sperse-io-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="5">
            </span>
            <span>I no longer need the plugin</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
        </li>
        <li class="automate-hub-free-by-sperse-io-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="6">
            </span>
            <span>It's a temporary deactivation. I'm just debugging an issue.</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
        </li>
        <li class="automate-hub-free-by-sperse-io-reason has-input" data-input-type="textfield">
          <label>
            <span>
              <input type="radio" name="automate-hub-free-by-sperse-io-selected-reason" value="7">
            </span>
            <span>Other</span>
          </label>
          <div class="automate-hub-free-by-sperse-io-internal-message"></div>
          <div class="automate-hub-free-by-sperse-io-reason-input" style="display: none;"><span class="message error-message " style="display: none;">Kindly tell us the reason so we can improve.</span><input class="other-reason" type="text" name="automate-hub-free-by-sperse-ioother_reason_h3" placeholder="Kindly tell us the reason so we can improve."></div>
        </li>
      </ul>
    </div>
    <div class="automate-hub-free-by-sperse-io-popup-footer">
      <label class="automate-hub-free-by-sperse-io-anonymous"><input type="checkbox">Anonymous feedback</label>
        <input type="button" class="button button-secondary button-skip automate-hub-free-by-sperse-io-popup-skip-feedback" value="Skip &amp; Deactivate">
      <div class="action-btns">
        <span class="automate-hub-free-by-sperse-io-spinner"><img src="http://automatehubultimate.faizanjaved.com/wp-admin/images/spinner.gif" alt="Sperse Loader"></span>
        <input type="submit" class="button button-secondary button-deactivate automate-hub-free-by-sperse-io-popup-allow-deactivate" value="Submit &amp; Deactivate" disabled="disabled">
        <a href="#" class="button button-primary automate-hub-free-by-sperse-io-popup-button-close">Cancel</a>

      </div>
    </div>
  </form>
    </div>
  </div>

<script>
    (function( $ ) {

      jQuery(function() {

       
        // Code to fire when the DOM is ready apna.
        jQuery(document).on('click', 'tr[data-slug="automate-hub-free-by-sperse-io"] .deactivate', function(e){
          e.preventDefault();
          
          $('.automate-hub-free-by-sperse-io-popup-overlay').addClass('automate-hub-free-by-sperse-io-active');
          $('body').addClass('automate-hub-free-by-sperse-io-hidden');
        });
        $(document).on('click', '.automate-hub-free-by-sperse-io-popup-button-close', function () {
          close_popup();
        });
        $(document).on('click', ".automate-hub-free-by-sperse-io-serveypanel,tr[data-slug='automate-hub-free-by-sperse-io'] .deactivate",function(e){
            e.stopPropagation();
        });

        $(document).click(function(){
          close_popup();
        });
        $('.automate-hub-free-by-sperse-io-reason label').on('click', function(){
          if($(this).find('input[type="radio"]').is(':checked')){
            //$('.bsp-anonymous').show();
            $(this).next().next('.automate-hub-free-by-sperse-io-reason-input').show().end().end().parent().siblings().find('.automate-hub-free-by-sperse-io-reason-input').hide();
          }
        });
        $('input[type="radio"][name="automate-hub-free-by-sperse-io-selected-reason"]').on('click', function(event) {
          $(".automate-hub-free-by-sperse-io-popup-allow-deactivate").removeAttr('disabled');
          $(".automate-hub-free-by-sperse-io-popup-skip-feedback").removeAttr('disabled');
          $('.message.error-message').hide();
          $('.automate-hub-free-by-sperse-io-pro-message').hide();
        });

        $('.automate-hub-free-by-sperse-io-reason-pro label').on('click', function(){
          if($(this).find('input[type="radio"]').is(':checked')){
            $(this).next('.automate-hub-free-by-sperse-io-pro-message').show().end().end().parent().siblings().find('.automate-hub-free-by-sperse-io-reason-input').hide();
            $(this).next('.automate-hub-free-by-sperse-io-pro-message').show()
            $('.automate-hub-free-by-sperse-io-popup-allow-deactivate').attr('disabled', 'disabled');
            $('.automate-hub-free-by-sperse-io-popup-skip-feedback').attr('disabled', 'disabled');
          }
        });
        $(document).on('submit', '#automate-hub-free-by-sperse-io-deactivate-form', function(event) {
          event.preventDefault();

          var _reason =  $('input[type="radio"][name="automate-hub-free-by-sperse-io-selected-reason"]:checked').val();
          var _reason_details = '';

          var deactivate_nonce = $('.Triad_Mark_deactivate_nonce').val();

          if ( _reason == 2 ) {
            _reason_details = jQuery("input[type='text'][name='automate-hub-free-by-sperse-iobetter_plugin_h3']").val();
          } else if ( _reason == 7 ) {
            _reason_details = jQuery("input[type='text'][name='automate-hub-free-by-sperse-ioother_reason_h3']").val();
          }
          else if ( _reason == 8 ) {
            _reason_details = jQuery("input[type='text'][name='automate-hub-free-by-sperse-iocannot_find_app_h3']").val();
          }



          if ( ( _reason == 7 || _reason == 2 || _reason == 8 ) && _reason_details == '' ) {
            $('.message.error-message').show();
            return ;
          }
          $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
              action        : 'awp_deactivate_feedback',
              reason        : _reason,
              reason_detail : _reason_details,
              security      : deactivate_nonce
            },
            beforeSend: function(){
              $(".automate-hub-free-by-sperse-io-spinner").show();
              $(".automate-hub-free-by-sperse-io-popup-allow-deactivate").attr("disabled", "disabled");
            }
          })
          .done(function() {
            $(".automate-hub-free-by-sperse-io-spinner").hide();
            $(".automate-hub-free-by-sperse-io-popup-allow-deactivate").removeAttr("disabled");
            window.location.href =  $("tr[data-slug='automate-hub-free-by-sperse-io'] .deactivate a").attr('href');
          });

        });

        $('.automate-hub-free-by-sperse-io-popup-skip-feedback').on('click', function(e){
          // e.preventDefault();
          window.location.href =  $("tr[data-slug='automate-hub-free-by-sperse-io'] .deactivate a").attr('href');
        })

        function close_popup() {
          $('.automate-hub-free-by-sperse-io-popup-overlay').removeClass('automate-hub-free-by-sperse-io-active');
          $('#automate-hub-free-by-sperse-io-deactivate-form').trigger("reset");
          $(".automate-hub-free-by-sperse-io-popup-allow-deactivate").attr('disabled', 'disabled');
          $(".automate-hub-free-by-sperse-io-reason-input").hide();
          $('body').removeClass('automate-hub-free-by-sperse-io-hidden');
          $('.message.error-message').hide();
          $('.automate-hub-free-by-sperse-io-pro-message').hide();
        }
        });

        })( jQuery ); // This invokes the function above and allows us to use '$' in place of 'jQuery' in our code.
</script>