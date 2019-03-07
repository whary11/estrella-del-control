new Vue({
    el:'#temas',
    data:{
        
    },
    created(){
         // document.addEventListener('DOMContentLoaded', function() {
         //   var s = document.querySelectorAll('.sidenav');
         //   var sidenav = M.Sidenav.init(s, {});
         // });
      },
      mounted(){
         /////////////////Contador ///////////////////////
         
//////////////////////////Contador////////////////   
    },
    methods:{
      validar(){
///////////////Inicio de la validación///////////////
         if (this.resp.tipo == "incorrecta") {
            swal({
               title:'Upps..',
               text: 'Lo sentimos, haz perdido. \n Te invatmos a seguir estudiando.',
               icon: "error",
               // Mostrar la puntuación final y solicitar los datos
               // que sean necesarios para luego enviar a la vista
               // para que seleccione un nuevo tema y siga participando.
               // {
               //    tiempoT:this.datelle.tiempoT,
                  
               // }
            });
         }else if(this.resp.tipo == "correcta"){
            swal({
               title:'Enhorabuena...',
               text: 'Su respuesta es correcta, pasas al siguiente nivel.',
               icon: "success",
               button:'Siguiente pregunta'
            });
            this.detalle.puntos = this.detalle.puntos + 50
            this.detalle.nivel++

            this.pregunta = {
               id:8767,
               nombre:'¿ Cuál no es subsistema de la Secretaría Distrital de Integración Social. ?',
               respuestas:[
                  {nombre:'SIG y Gestión del talento humano', tipo:'incorrecta'},
                  {nombre:'Ambiental y PIGA', tipo:'incorrecta'},
                  {nombre:'Gestión Ambiental, gestión documental, responsabilidad social, seguridad y salud en el trabajo', tipo:'correcta'},
                  {nombre:'Poblacional y territorial', tipo:'incorrecta'},
               ],
            }
            /////////////////////Instrucciones para tener en cuenta///////////////////////////////
            // {
            //    tema:'',
            //    preguntaAnteriro:''
            //    nivel:''
            // }
            // Hacer la petición y traer una nueva pregunta, la consulta debe hacerce con varios parametros,
            // se debe crear un metodo que espere el tema como parametro obligatorio, y la preguntaAnterior
            // opcional para que sea versatil y se pueda utilizar para solicitar la pregunta inicial que no
            // tendría una pregunta anterior.
            // Después de hacer la petición, se debe almacenar la pregunta en la propiedad pregunta para que sea renderizada en la vista de inmediato.
            // Animaciones aquí

         }else{
            swal("Debes seleccionar una respuesta.")
         }
/////////////////fin de la validación////////////////////
      },
      capturar(respuesta){
         this.resp = respuesta
         console.log(respuesta);
      },
      hora(){
         let today=new Date();
         let h=today.getHours();
         let m=today.getMinutes();
         let s=today.getSeconds();
         m= this.checkTime(m);
         s= this.checkTime(s);
         this.detalle.hora = h+":"+m+":"+s;
      },
      checkTime(i){
         {if (i<10) {i="0" + i;}return i;}
      },
      cambiarEstadoClase(){
         this.active = !this.active
      }
    }
})