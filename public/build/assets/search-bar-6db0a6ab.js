jQuery(function(e){u(),window.addEventListener("load",function(){p()}),e("#search-input").keyup(function(){p()}),e("#search-form .dropdown-item").click(function(s){h(s)});function u(){const s=e('input[name = "search_target"]:checked').parent().text().trim(),n=e('input[name = "search_type"]:checked').parent().text().trim(),c="text-info",t="text-success",d="border-success";e("#search-target-button").text(s),e('input[name="search_target"]:checked').parent().addClass(c),e("#search-type-button").text(n),e('input[name="search_type"]:checked').parent().addClass(t+" "+d),e("#search-target-button").addClass(d),e("#search-type-button").addClass(d)}function h(s){const n="#search-target-button",c="#search-type-button";let t='input[name = "search_target"]';e(s.target).attr("name")==="search_type"&&(t='input[name = "search_type"]');const d="text-info",o={and:"text-success",or:"text-warning"},a={and:"border-success",or:"border-warning"},l=e(s.target).parent().text().trim();for(let r=0;r<e(t).length;r++){let i=e(t+`:eq(${r})`).val();e(t+`:eq(${r})`).prop("checked")?i==="and"?(e(c).addClass(o.and+" "+a.and).text(l),e(t+`:eq(${r})`).parent().addClass(o.and+" "+a.and),e(n).addClass(a.and)):i==="or"?(e(c).addClass(o.or+" "+a.or),e(t+`:eq(${r})`).parent().addClass(o.or+" "+a.or),e(n).addClass(a.or)):(e(t+`:eq(${r})`).parent().addClass(d),e(n).text(l)):i==="and"?(e(c).removeClass(o.and+" "+a.and).text(l),e(t+`:eq(${r})`).parent().removeClass(o.and+" "+a.and),e(n).removeClass(a.and)):i==="or"?(e(c).removeClass(o.or+" "+a.or),e(t+`:eq(${r})`).parent().removeClass(o.or+" "+a.or),e(n).removeClass(a.or)):(e(t+`:eq(${r})`).parent().removeClass(d),e(n).text(l))}}function p(){let s=e("#search-input").val();s.replace("　"," "),s.trim()?e("#search-button").prop("disabled",!1):e("#search-button").prop("disabled",!0)}});
