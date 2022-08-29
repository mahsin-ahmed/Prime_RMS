<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- all script code here -->
<script type="text/javascript">
    $("#search_student").on("submit", function(event) {
        event.preventDefault();

        var student_id = $("#search_student").serialize();
        
        $(".loading-img").css("display", "block");
        $.ajax({
            url: "get_result",
            method: "POST",
            data: student_id,
            success: function(result) {
            $(".loading-img").css("display", "none");
                document.getElementById("result_table").innerHTML = result;
            }
        })

    });
   

    // reset the ID input field
    function reset_sid() {
        document.getElementById("check_student").reset();
    }

    function reset_sid_1() {
        document.getElementById("search_student").reset();
    }
    function reset_sid_2() {
        document.getElementById("ch_update_form").reset();
    }
    function reset_sid_result_view() {
        document.getElementById("search_student").reset();
    }
    
</script>