var body = document.getElementById('page_mask');
var editar = document.querySelector('.editar');
var cerrar = document.getElementById('cerrar2');
var ver_editar = document.getElementById('editar');
var btn_editar = document.getElementById('aceptar');
var ver_usuario = document.getElementById('usuarios');
var usuario = document.querySelector('.usuario');

/*_______*/

var agregar = document.querySelector('.agregar');
var ver_agregar = document.getElementById('agregar');
var cerrar2 = document.getElementById('cerrar3');
var cerrar5 = document.getElementById('cerrar5');
var btn_agregar = document.getElementById('btn_agregar');
var btn_user = document.getElementById('btn_user');
/*_______*/

var vender = document.querySelector('.vender');
var ver_vender = document.getElementById('vender');
var cerrar3 = document.getElementById('cerrar4');
var btn_vender = document.getElementById('btn_vender');

ver_editar.onclick=function(){
editar.style.display="block";
body.style.display="block";
}

cerrar.onclick=function(){
editar.style.display="none";
body.style.display="none";
}

ver_agregar.onclick=function(){
agregar.style.display="block";
body.style.display="block";
}

cerrar2.onclick=function(){
agregar.style.display="none";
body.style.display="none";
}

ver_vender.onclick=function(){
vender.style.display="block";
body.style.display="block";
}

cerrar3.onclick=function(){
vender.style.display="none";
body.style.display="none";
}


ver_usuario.onclick=function(){
usuario.style.display="block";
body.style.display="block";
}

cerrar5.onclick=function(){
usuario.style.display="none";
body.style.display="none";
}

/*_______*/

btn_editar.onclick=function(){

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '¡Producto modificado con éxito!',
  confirmButtonText: 'Aceptar',
  confirmButtonColor: '#F3C622'

})
}

btn_agregar.onclick=function(){

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '¡Producto ingresado con éxito!',
  confirmButtonText: 'Aceptar',
  confirmButtonColor: '#F3C622'

})
}

btn_vender.onclick=function(){

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '¡Venta realizada correctamente!',
  confirmButtonText: 'Aceptar',
  confirmButtonColor: '#F3C622'

})
}

btn_user.onclick=function(){

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '¡Usuario añadido con éxito!',
  confirmButtonText: 'Aceptar',
  confirmButtonColor: '#F3C622'

})
}