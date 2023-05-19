<?php
/*
Plugin Name: Ajax Search in a Table
*/
function func_ajax_search(){
    echo '
    <div class="search-box">
        <input style="font-family: Rubik, sans-serif;" type="text" autocomplete="off" placeholder="Cerca prestazione..." />
        <div id="divResult" class="result sc_item_columns sc_item_columns_3 trx_addons_columns_wrap columns_padding_bottom" style="display:none;border: 1px solid #cfcbcf;border-radius: 20px 20px 20px 20px;width: 100%;margin-top: 20px;"></div>
    </div>';
    ?>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = jQuery(this).val();
        var resultDropdown = jQuery(this).siblings(".result");
        if (inputVal.length>=3){
            if(inputVal.length){
                jQuery.get("/wp-content/plugins/ajax-search-in-a-table/ajax-search-backend.php", {term: inputVal}).done(function(data){
                    resultDropdown.html(data);
					document.getElementById("divResult").style.display="block";
                });
            } else{
                resultDropdown.empty();
				document.getElementById("divResult").style.display="none";
            }
        }else{
			    resultDropdown.empty();
				document.getElementById("divResult").style.display="none";
		}
    });
    jQuery(document).on("click", ".result p", function(){
        jQuery(this).parents(".search-box").find('input[type="text"]').val(jQuery(this).text());
        jQuery(this).parent(".result").empty();
    });
});
</script>
<?php
}
add_shortcode('sc_ajax_search', 'func_ajax_search');
?>