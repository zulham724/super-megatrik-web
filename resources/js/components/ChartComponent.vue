<script>
    import { Bar } from 'vue-chartjs';
    export default {
        extends:Bar,
        props:['year'],
        data(){
            return{
                orders:[0,0,0,0,0,0,0,0,0,0,0,0]
            }
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/api/orders').then(res=>{
                $.each(res.data,(o,order)=>{
                    let dt = new Date(order.created_at);
                    let mnth = dt.getMonth();
                    // if(dt.getYear() == this.year){
                        this.orders[mnth]+=1;
                    // }
                });
                this.renderChart({
                  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                  datasets: [
                    {
                      label: 'GitHub Commits',
                      backgroundColor: '#f87979',
                      data: this.orders
                    }
                  ]
                });
            });
        }
    }
</script>
