$("#frmAcceso").on('submit',function(e)
{
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();

    $.post("controladores/usuario_controller.php?op=verificar",
        {"logina":logina,"clavea":clavea},
        function(data)
    {
      console.log(data);
        if (data!="null")
        {
            $(location).attr("href","vistas/escritorio.php");
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    });
})
