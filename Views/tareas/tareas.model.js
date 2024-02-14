class Clase_Tareas_js {
  constructor(tarea, ruta) {
    this.tarea = tarea;
    this.ruta = ruta;
  }

  todos() {
    var html = "";
    $.get(
      "../../Controllers/tareas.controller.php?op=" + this.ruta,
      (res) => {
        console.log(res);
        res = JSON.parse(res);
        $.each(res, (index, tarea) => {
          html += `<tr>
            <td>${index + 1}</td>
            <td>${tarea.descripcion}</td>
            <td>${tarea.fecha_limite}</td>
            <td>${tarea.completada}</td>
            <td><button class='btn btn-success' onclick='uno(${
              tarea.id
            })'>Editar</button>
            <button class='btn btn-danger'>Eliminar</button> </td>
            </tr>`;
        });
        console.log(html);
        $("#tablatareas").html(html);
      }
    );
  }

  uno(tareaId) {
    $.post(
      "../../Controllers/tareas.controller.php?op=" + this.ruta,
      { id: tareaId },
      (task) => {
        console.log({ conPOO: task });
      }
    );
  }

  insertar() {
    $.ajax({
      url: '../../Controllers/tareas.controller.php?op=' + this.ruta,
      type: 'POST',
      data: this.tarea,
      processData: false,
      contentType: false,
      cache: false,
      success: (res) => {
        res = JSON.parse(res);
        if (res) {
          alert("Se guardó la tarea");
        } else {
          alert("Error al guardar la tarea");
        }
      },
    });
  }
}

