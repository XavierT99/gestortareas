function init() {
    $("#tareas_Form").on("submit", (e) => {
      insertar(e);
    });
  }
  
  $().ready(() => {
    cargarTabla();
  });
  
  var cargarTabla = () => {
    var tareasModelojs = new Clase_Tareas_js("", "todos");  
    tareasModelojs.todos();
  };
  
  var uno = (tareaId) => {
    var tareasModelojs = new Clase_Tareas_js("", "uno"); 
    tareasModelojs.uno(tareaId);
  };
  
  var insertar = (e) => {
    e.preventDefault();
    var tarea_form = new FormData($("#tareas_Form")[0]); 
    var tareasModelojs = new Clase_Tareas_js(tarea_form, "insertar"); 
    tareasModelojs.insertar();
  };
  
  init();
  