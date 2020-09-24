<script>
      new Vue({
            el: '#app',
            data: {
                  comment : '',
                  comments : [],
            },
            created(){
                  this.comments();
            },
            methods:{
                  comments(){
                       axios.get('/2/comments').then(res=>this.comments = res.data.comments);
                  }
            }
      });    
</script>