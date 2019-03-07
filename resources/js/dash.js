new Vue({
    el:'#dash',
    data:{
        temas:'',
    },
    created(){
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {});
            var botonesFlotantes = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(botonesFlotantes, {});
        });
         // document.addEventListener('DOMContentLoaded', function() {
         //   var s = document.querySelectorAll('.sidenav');
         //   var sidenav = M.Sidenav.init(s, {});
         // });
         
      },
      mounted(){
        this.getTemas();
//////////////////////////Contador////////////////   
    },
    methods:{
        editTema(tema){
            swal({
                buttons: [false, "Guardar"],
                content:{
                    element:'input',
                    attributes: {
                        placeholder: "Edita el tema",
                        type: "text",
                        value:tema.nombre
                    }
                },
            })
            .then((value) => {
                if ( value == '' || value == tema.nombre) {
                    swal(`No hay nada por actualizar`);
                }else if( value == null ){
                    swal(`Has cancelado.`);
                }else{
                    let url = '/apis/temas/edit';
                    let data = {
                        id:tema.id,
                        nombre: value
                    }
                    axios.put(url, data).then(resp=>{
                        tema.nombre = value;
                        tema.url = resp.data.url;
                        swal(`Hemos actualizado el tema a '${value}' `)
                    })
                }
            });   
        },
        getTemas(){
            let url = '/apis/temas';
            axios.get(url).then(resp=>{
                this.temas = resp.data;
            })

            
        }
    }
})