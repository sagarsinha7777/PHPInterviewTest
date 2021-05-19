//This is called when the checkbox is ticket in the todos page
function markDone(id){
    console.log("CLICKED ON "+id)
    $.ajax({
        method: "POST",
        url: "/todos?action=done",
        data: { id: id }
      })
        .done(function() {
          location.href = "/todos"
        });
}
