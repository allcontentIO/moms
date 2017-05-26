<script>
function validEmail(e) 
{
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    return String(e).search (filter) != -1;
}

function isnum(evt){ 
//alert("OKKKKK");
var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode != 46 && charCode > 31 
&& (charCode < 48 || charCode > 57))
    return false;
    return true;
}
</script>