    function updateCoupon(reqid) {


        $("codeField").insert("<span class='loading'>&nbsp;&nbsp;Loading...</span>");

        var reqid;

        if(reqid == 2) {  $('coupon_code').setValue('');  }

        $('discount-coupon-form').request({

        method: 'post',

        onComplete: function(){
            payment.onComplete;
            $$("#codeField .loading").remove();
        },

        onSuccess: payment.onSave,

        onFailure: checkout.ajaxFailure.bind(checkout),

        })

    }

