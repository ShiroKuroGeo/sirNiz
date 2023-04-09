const { createApp } = Vue;
createApp({
    data(){
        return{
            name:'',
            email:'',
            website:'',
            comment:'',
            upload:'',
            users:[]
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
                    // alert('User successfully saved');
                    alert(r.data);
                    vue.getGuest();
                    document.querySelector(".submitForm").reset();
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
            data.append('method','getUsers');
            axios.post('includes/model.php',data)
            .then(function(r){
                vue.users = [];
                for(var v of r.data){
                    vue.users.push({
                        fullname: v.fullname,
                        username: v.username,
                        role: v.role,
                        dateInserted: v.dateInserted,
                        userid: v.userid,
                        profilepic: v.profilepic
                    })
                }
                // r.data.forEach(function(v){
                    
                // })
            })
        }
    }
}).mount('#app')