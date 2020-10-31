$(document).ready(function(){
    
    // add form admin
    $('#add_admin').submit(function (e){
        e.preventDefault();
        let nama_admin = $("#nama_admin").val();
        let username_admin = $("#username_admin").val();
        let password_admin = $("#password_admin").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url:"/admin/add_admin",
            type:"POST",
            data:{
                nama_admin:nama_admin,
                username_admin:username_admin,
                password_admin:password_admin,
                _token:_token
            },
            success:function(response){
                if(response){
                    $("#example1 tbody").prepend(
                        '<tr id=id'+response.id_admin+'><td>'+response.nama_admin+'</td><td>'+response.username_admin+'</td><td>'+response.password_admin+'</td><td><a href="javascript:void(0)" onclick="editAdmin('+response.id_admin+')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" onclick="deleteAdmin('+response.id_admin+')" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a></td></tr>'
                    );
                    $("#add_admin")[0].reset();
                    $('#exampleModal').modal('hide');
                }
            }

        });

    });

    $("#edit_admin").submit(function(e){
        e.preventDefault();
        let id_admin = $("#id_admin").val();
        let nama_admin = $("#nama_admin2").val();
        let username_admin = $("#username_admin2").val();
        let password_admin = $("#password_admin2").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url:"/admin/edit_admin",
            type:"POST",
            data:{
                id_admin:id_admin,
                nama_admin:nama_admin,
                username_admin:username_admin,
                password_admin:password_admin,
                _token:_token
            },
            success:function(response){
                $('#id'+response.id_admin +' td:nth-child(1)').text(response.nama_admin);
                $('#id'+response.id_admin +' td:nth-child(2)').text(response.username_admin);
                $('#id'+response.id_admin +' td:nth-child(3)').text(response.password_admin);
                $('#exampleModalEdit').modal('toggle');
                $('#edit_admin')[0].reset();
                
                
            }
        });
    });

    
});

function editAdmin(id_admin){
    $.get('/admin/edit_admin/'+id_admin,function(admin){
        $("#id_admin").val(admin.id_admin);
        $("#nama_admin2").val(admin.nama_admin);
        $("#username_admin2").val(admin.username_admin);
        $("#password_admin2").val(admin.password_admin);
        $("#exampleModalEdit").modal('toggle');
    });
    
}

function deleteAdmin(id_admin){
    if(confirm("Apakah Mau Menghapus Data Berikut ?")){
        $.ajax({
            url:'/admin/delete_admin/'+id_admin,
            type:"GET",
            data:{
                _token : $("input[name=_token]").val()
            },
            success:function(response){
                $("#id"+id_admin).remove();
            }
        });
    }
}