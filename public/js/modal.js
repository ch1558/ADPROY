function agregarModal(titulo_anteproyecto, resumen_anteproyecto, codigo_modalidad, codigo_grupo, tema, codigo_anteproyecto) {
    $('#editar').modal('show');
    document.getElementById("titulo").value = titulo_anteproyecto;
    document.getElementById("resumen").value = resumen_anteproyecto;
    document.getElementById("modalidad").value = codigo_modalidad;
    document.getElementById("grupo").value = codigo_grupo;
    document.getElementById("tema").value = tema;
    document.getElementById("codigo").value = codigo_anteproyecto;
    document.getElementById("editable").value = '1';
}