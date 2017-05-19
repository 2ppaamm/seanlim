function validateForm() {
    var x = document.forms["searchForm"]["searchInput"].value;
    if (x == null || x == "") {
        alert("Fill search");
        return false;
    }
}

$(".submitdeleteform").submit(function(){
	alert("Submitted");
});

function deleteMessage(){
		alert('ple');
}
