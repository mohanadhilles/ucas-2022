<template>
   <div>
       <aside>
    <div class="remain-balance">
        <div class="float-right">
            <div> الأرباح اليومية </div>
            <div> {{incomes}} ₪</div>
        </div>
        <div class="float-left">
            <img src="img/remain-balance.png"/>
        </div>
        <div class="clear"></div>
    </div>
    <div class="left-menu">
        <div class="div-title">
            <div>روابط سريعة<i class="fa fa-link"></i></div>
        </div>
        <ul>
            <li>
                <router-link to="contact">
                    <span>جهات الإتصال</span>
                    <i class="fa fa-user"></i>
                </router-link>
            </li>
            <li>
                <router-link to="services">
                    <span>التصنيفات</span>
                    <i class="fa fa-clipboard"></i>
                </router-link>
            </li>
            <li class='has-sub'>
                <router-link to='#'>
                    <span>التقارير</span><i class="fa fa-file-text"></i>
                </router-link>

                <div class="arrow-3"></div>
                <ul>
                    <li>
                        <router-link to='reports'>
                            <span>تصدير جهات الاتصال</span>
                            <i style="font-size: 15px;" class="fa fa-mobile fa-2x"></i>
                        </router-link>
                    </li>
                    <li>
                        <router-link to='sms_report'>
                            <span>تقارير SMS</span>
                            <i style="left: 0px" class="fa fa-envelope"></i>
                        </router-link>
                    </li>
                    <li>
                        <router-link to='incomes'>
                            <span>تقارير الايرادات</span>
                            <span class="income-lef-nav img"></span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to='msrofat'>
                            <span>تقارير المصروفات</span>
                            <span class="expense-lef-nav img"></span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li>
                <router-link to="Instructions">
                    <span>سياسة الخصوصية</span>
                    <i class="fa fa-info-circle"></i>
                </router-link>
            </li>
            <li>
                <router-link to="contact_us">
                    <span>إتصل بنا</span>
                    <i class="fa fa-phone"></i>
                </router-link>
            </li>
        </ul>
    </div>

    <div class="speed-sms">
        <div class="div-title">
            <div>رسالة البريد الالكتروني <i class="fa fa-envelope"></i></div>
        </div>
        <form method="post">
            <input name="" type="text" v-model="Data.address_msg" placeholder="أدخل عنوان الرسالة ">
            <textarea rows="3" name="" v-model="Data.message" placeholder="أدخل الرسالة هنا"></textarea>

            
            <div class="balance-class" style="margin-top: 6px;">
                <router-link to="#">
                    <select class="balance-class" v-model="Data.name_cus" style="width: 100%;font: 13px / 20px ourFont;">
                        <option v-for="item in dataContact" :key="item.id" :value="item.name">{{item.name}}</option>
                    </select>
                </router-link>
            </div>
            <input  type="submit" @click.prevent="sendMessage()" value="إرسال">

        </form>
    </div>
</aside>

   </div>
</template>

<script>
    export default {
        name: 'MyFooter',
        data(){
            return {
                dataContact: [],
                Data:{
                  name_cus:'',
                  address_msg:'',
                  message:'',
                  id:'',
                },
                incomes: localStorage.getItem('arbah') ,
                setUser: '',
            }
        },
        methods: {
            getCon: function(){
                var token = localStorage.getItem("token");
                
                axios.get('api/getContact?token=' + token)
                .then(res =>{
                    this.dataContact = res.data.data;
                })
                .catch((err)=>{
                console.log(err)
                })   
                
            },
        sendMessage: function(){
            var token = localStorage.getItem("token");
            const Data = {
                name_cus: this.Data.name_cus,
                address_msg: this.Data.address_msg,
                message: this.Data.message,
                user_id: this.setUser.id,
            };
            axios.post("api/sendMessage?token=" + token , Data)
            .then(res=>{
                    console.log(res.data) 
                    this.Data.name_cus = ''
                    this.Data.address_msg = ''
                    this.Data.message = ''
                
			})
            },
        },
        mounted(){
            this.getCon()
        },

        created(){
		axios.get('http://127.0.0.1:8000/api/user',{
			headers: {
				Authorization : 'Bearer ' + localStorage.getItem('token')
			}
		
		})
		.then(res => {
            this.setUser = res.data
            console.log(res.data)
        } )
		.catch(err => console.error( err + ': Not User |  Unauthorized') );
        
  	    },
    }
</script>
