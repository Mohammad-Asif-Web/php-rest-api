$(document).ready(function(){
// Fetch all record by api
function loadTable(){
    $.ajax({
        url : "http://localhost/php-rest-api/read_all_data.php" ,
        type: "GET",
        success: function(data){
            let sl = 1;
            if(data.status == false){
                $("#load-table").append("<tr><td colspan='6'><h2>"+data.message+"</h2></td></tr>")
            } else{
                $.each(data, function(key, value){
                    // string literal method
                    $("#load-table").append(`
                    <tr>
                        <td>${sl++}</td>
                        <td>${value.student_name}</td>
                        <td>${value.age}</td>
                        <td>${value.city}</td>
                        <td>
                            <button class='edit-btn btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' data-eid='${value.id}'>Edit</button>
                        </td>
                        <td>
                            <button class='delete-btn btn btn-sm btn-warning' data-eid='${value.id}'>Delete</button>
                        </td>
                    </tr>
                    `)
                    // below concatanate method, how to use in jquery
                //     $("#load-table").append("<tr>"
                //     + "<td>" + value.id + "</td>"
                //     + "<td>" + value.student_name + "</td>"
                //     + "<td>" + value.age + "</td>"
                //     + "<td>" + value.city + "</td>"
                //     + "<td><button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' data-eid='"+ value.id +"'>Edit</button></td>"
                //     + "<td><button class='btn btn-sm btn-warning' data-id='"+ value.id+"'>Delete</button></td>"
                // + "</tr>")
                })
            }
        }
    })
}
loadTable();

// Fetch Single Records in api
$(document).on("click",".edit-btn", function(){
    var studentId = $(this).data("eid");
    var obj = {sid : studentId}
    var myJSON = JSON.stringify(obj)
    console.log(myJSON);
})








})


