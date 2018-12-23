new Vue({
    el:'#dash',
    data:{
        temas:'',
    },
    created(){
         // document.addEventListener('DOMContentLoaded', function() {
         //   var s = document.querySelectorAll('.sidenav');
         //   var sidenav = M.Sidenav.init(s, {});
         // });
         this.getTemas();
      },
      mounted(){
//////////////////////////Contador////////////////   
    },
    methods:{
        getTemas(){
            let url = '/apis/temas';

            axios.get(url).then(resp=>{
                console.log(resp.data);

                this.temas = resp.data;
                
            })

            
        }
    }
})