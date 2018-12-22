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
        pregunta:''
    },
    created(){
       this.pregunta = pregunta;
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
         if (this.resp.tipo == "INCORRECTA") {

            swal({
               title: "Upps..",
               text: "Lo sentimos, haz perdido. \n Te invatmos a seguir estudiando.",
               icon: "warning",
               buttons: "Volver a intentar",
               // dangerMode: true,
             })
             .then((willDelete) => {
               // if (willDelete) {
               //   swal("Poof! Your imaginary file has been deleted!", {
               //     icon: "success",
               //   });
               // } else {
               //   swal("Your imaginary file is safe!");
               // }
               location.href ="/home";
               
             });





            // swal({
            //    title:'Upps..',
            //    text: 'Lo sentimos, haz perdido. \n Te invatmos a seguir estudiando.',
            //    icon: "error",
            //    // Mostrar la puntuación final y solicitar los datos
            //    // que sean necesarios para luego enviar a la vista
            //    // para que seleccione un nuevo tema y siga participando.
            //    // {
            //    //    tiempoT:this.datelle.tiempoT,
                  
            //    // }
            // });

            





         }else if(this.resp.tipo == "CORRECTA"){
            swal({
               title:'Enhorabuena...',
               text: 'Su respuesta es correcta, pasas al siguiente nivel.',
               icon: "success",
               button:'Siguiente pregunta'
            });

            this.resp = ''
            this.detalle.puntos = this.detalle.puntos + 50
            this.detalle.nivel++
            ///////Obtiene una pregunta aleatoria////////////////
            this.getPregunta(this.pregunta.tema_id, this.pregunta.id)
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
            // Después de hacer la petición, se debe almacenar la pregunta en la propiedad pregunta para que sea renderizada en la vista de inmediato simulación de realtime.
            // Animaciones aquí

         }else{
            swal("Debes seleccionar una respuesta.")
         }
/////////////////fin de la validación////////////////////
      },
      getPregunta(idTema, idPreguntaAnterior, nivel){
         let url = '/juego/preguntas';
         if (idPreguntaAnterior) {
            axios.post(url, {
               idTema:idTema,
               idPreguntaAnterior: idPreguntaAnterior,
               nivel: nivel
             })
             .then((resp)=>{
               // console.log(resp.data);
               this.pregunta = resp.data;
             })
             .catch((error)=>{
               console.log('Estamos teniendo errores, nuestro equipo ya está trabajando para resolverlo.');
             });
         }else{




         }
         
      },
      capturar(respuesta){
         this.resp = respuesta
         // console.log(respuesta);
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