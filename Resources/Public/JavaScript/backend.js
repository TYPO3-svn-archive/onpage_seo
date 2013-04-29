/**
 * Created with JetBrains PhpStorm.
 * User: Arne Lorenz
 * Date: 27.04.13
 * Time: 19:30
 * To change this template use File | Settings | File Templates.
 */

jQuery(function(){
    startEdit();
});

function startEdit(){
    jQuery('table.tx_onpageseo_be td').each(function(){
        if( jQuery(this).hasClass('title') || jQuery(this).hasClass('description') ){
            mkEdit(this);
        }
    });

    jQuery('table.tx_onpageseo_be td.uid').each(function(){
        jQuery(this).parent().data('uid', jQuery(this).html() );
    });

}

function mkEdit(elem){
    var tdElem = jQuery(elem);
    tdElem.dblclick(function(){
        submitEdit( false );

        var oldValue = tdElem.find('span').html();
        if(oldValue == undefined) oldValue = tdElem.html();

        tdElem.data('val', oldValue);
        tdElem.html('<textarea>' + oldValue + '</textarea><span class="submitVal">x</span>');

        tdElem.find('.submitVal').click(function(){
            submitEdit( true );
        });
    });
}

function submitEdit(withSubmit){
    jQuery('table.tx_onpageseo_be td textarea').each(function(){
        var inputElem = jQuery(this);
        var inputVal = inputElem.val();

        if(withSubmit == true){
            jQuery.ajax({
                type: "POST",
                url: ajaxUrl,
                data: {
                    theid: jQuery(inputElem).parents('tr').data('uid'),
                    thedata: inputVal,
                    theaction: jQuery(inputElem).parent().attr('class')
                }
            }).done(function( data ) {
                inputElem.parent().html( data );
            });
        } else {
            inputElem.parent().html('<span>' + inputVal + '</span>');
        }

    });
}

function submitAllEdit(){

}