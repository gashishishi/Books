jQuery(function(t){t(".rental-icon").length>0&&t(".rental-icon").fadeIn("slow"),t(".return-icon").length>0&&t(".return-icon").fadeIn("slow"),c(),o(),t(".rental-icon").click(function(n){e(n)}),t(".return-icon").click(function(n){e(n)});function e(n){t(n.target).parent("form").submit()}function c(){const n=t(".rental-icon");t(".return-icon");for(let i of n)0<parseInt(t(i).text(),10)?t(i).html('<i class="fa-regular fa-circle text-info"></i>レンタルする'):t(i).html('<i class="fa-solid fa-xmark text-danger"></i>貸出中')}function o(){const n=t(".time-over").length,i=t(".time-within").length;n&&t(".time-over").addClass("bg-danger text-light"),i&&t(".time-within").addClass("bg-info text-light")}});