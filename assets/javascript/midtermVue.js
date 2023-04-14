const { createApp } = Vue;
createApp({
    data(){
        return{
            fullname:'',
            username:'',
            password:'',
            role:'',
            users:[],
            userid:0
        }
    },
    methods:{
        insertGuest:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","doInsertGuest");
            axios.post('includes/midtermVue.php',data)
            .then(function(r){
                if(r.data == 0){
                    vue.getGuest();
                    // document.querySelector(".userForm").reset();
                    location.reload();
                }
                else if(r.data == 1){
                    alert('User already exists');
                }
                else{
                    alert("Error saving user");
                }
            });
        },
        getGuest:function(){
            var data = new FormData();
            const vue = this;
            data.append('method','doGetGuest');
            axios.post('includes/midtermVue.php',data)
            .then(function(r){
                vue.users = [];
                for(var v of r.data){
                    vue.users.push({
                        guest_name: v.guest_name,
                        email: v.email,
                        website: v.website,
                        comment: v.comment,
                        dateinserted: v.dateinserted,
                        photo: v.photo
                    })
                }
            })
        }
    },
    created:function(){
        this.getGuest();
    }
}).mount('#app')