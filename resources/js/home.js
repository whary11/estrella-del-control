new Vue({
    el:'#temas',
    data:{
        fin_contador:3,
        resp:"",
        descripcion:"",
        active:false,
        detalle:{
            hora:"06:55 amm",
            tiempT:'1000',
            puntos:0,
            nivel:1,
        },
        pregunta:{
           id:283947,
           nombre:'¿ Cuales son los subsistemas de la Secretaría Distrital de Integración Social. ?',
           respuestas:[
            {nombre:'SIG y Gestión del talento humano', tipo:'incorrecta'},
            {nombre:'Ambiental y PIGA', tipo:'incorrecta'},
            {nombre:'Gestión Ambiental, gestión documental, responsabilidad social, seguridad y salud en el trabajo', tipo:'correcta'},
            {nombre:'Poblacional y territorial', tipo:'incorrecta'},
           ],
        }
    },
    created(){
         // document.addEventListener('DOMContentLoaded', function() {
         //   var s = document.querySelectorAll('.sidenav');
         //   var sidenav = M.Sidenav.init(s, {});
         // });
      },
      mounted(){
         /////////////////Contador ///////////////////////
         let elem = document.querySelector('#conteo');
         let conteo = M.Modal.init(elem,{
            dismissible:false,
            opacity:1,
            endingTop:30
         });
         conteo.open();
         let contador = 0;
         // Tiempo en en el que deseas que redireccione la funcion.
         setInterval(()=>{
            this.hora()
            if (contador >= this.fin_contador) {
               conteo.close()
               // setInterval(this.hora(),500)
           }else{
               this.fin_contador = this.fin_contador-1 
           }
       },1000);
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