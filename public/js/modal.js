function agregarModal(titulo_anteproyecto, resumen_anteproyecto, codigo_modalidad, codigo_grupo, tema) {
    $('#editar').modal('show');
    document.getElementById("datos1").value = titulo_anteproyecto;
    document.getElementById("datos2").value = resumen_anteproyecto;
    document.getElementById("datos5").value = codigo_modalidad;
    document.getElementById("datos4").value = codigo_grupo;
    document.getElementById("datos3").value = tema;
}